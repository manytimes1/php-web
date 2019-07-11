<?php

namespace App\Http;

use App\Data\AddOfferDTO;
use App\Data\OfferDTO;
use App\Data\EditOfferDTO;
use App\Data\RentOfferDTO;
use App\Service\Room\RoomServiceInterface;
use App\Service\Town\TownServiceInterface;
use App\Service\Offer\OfferServiceInterface;
use App\Service\User\UserServiceInterface;
use Core\Http\Session\SessionInterface;
use Core\Template\TemplateInterface;
use Core\Util\DataBinderInterface;

class OfferHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var OfferServiceInterface
     */
    private $offerService;

    /**
     * @var TownServiceInterface
     */
    private $townService;

    /**
     * @var RoomServiceInterface
     */
    private $roomService;

    /**
     * @var UserServiceInterface
     */
    private $userService;

    public function __construct(TemplateInterface $template,
                                DataBinderInterface $dataBinder,
                                SessionInterface $session,
                                OfferServiceInterface $offerService,
                                TownServiceInterface $townService,
                                RoomServiceInterface $roomService,
                                UserServiceInterface $userService)
    {
        parent::__construct($template, $dataBinder, $session);
        $this->offerService = $offerService;
        $this->townService = $townService;
        $this->roomService = $roomService;
        $this->userService = $userService;
    }

    public function add(array $formData = [])
    {
        if (!$this->userService->isLogged()) {
            return $this->redirect('login.php');
        }

        if (isset($formData['add'])) {
            return $this->addProcess($formData);
        } else {
            $offer = $this->dataBinder->bind($formData, OfferDTO::class);
            $addDTO = new AddOfferDTO();
            $addDTO->setOffer($offer);
            $addDTO->setTowns($this->townService->getAll());
            $addDTO->setRooms($this->roomService->getAll());
            return $this->render('offer/add', $addDTO);
        }
    }

    public function edit($formData = [], $getData = [])
    {
        if (!$this->userService->isLogged()) {
            return $this->redirect('login.php');
        }

        if (isset($formData['edit'])) {
            return $this->editProcess($formData, $getData);
        } else {
            /** @var OfferDTO $offerData */
            $offerData = $this->dataBinder->bindReflection($getData, OfferDTO::class);
            $offer = $this->offerService->getOneById($offerData->getId());
            $towns = $this->townService->getAll();
            $rooms = $this->roomService->getAll();
            $editDTO = new EditOfferDTO();
            $editDTO->setOffer($offer);
            $editDTO->setTowns($towns);
            $editDTO->setRooms($rooms);
            return $this->render('offer/edit_offer', $editDTO);
        }
    }

    public function remove($getData = [])
    {
        if (!$this->userService->isLogged()) {
            return $this->redirect('login.php');
        }

        /** @var OfferDTO $offerData */
        $offerData = $this->dataBinder->bind($getData, OfferDTO::class);
        $currentOffer = $this->offerService->getOneById($offerData->getId());
        $currentUser = $this->userService->getCurrentUser();

        if ($currentUser->getId() === $currentOffer->getUser()->getId()) {
            $this->offerService->erase($offerData->getId());
            return $this->redirect('my_offers.php');
        } else {
            $myOffers = $this->offerService->getAllByAuthor();
            return $this->render('offer/all_items', $myOffers, ['Cannot delete this offer!']);
        }
    }

    public function view($getData = [])
    {
        if (!$this->userService->isLogged()) {
            return $this->redirect('login.php');
        }

        /** @var OfferDTO $offerData */
        $offerData = $this->dataBinder->bind($getData, OfferDTO::class);
        $offer = $this->offerService->getOneById($offerData->getId());
        return $this->render('offer/view_offer', $offer);
    }

    public function rent($getData = [])
    {
        if (!$this->userService->isLogged()) {
            return $this->redirect('login.php');
        }

        /** @var OfferDTO $offerFromDb */
        $offerFromDb = $this->dataBinder->bind($getData, OfferDTO::class);
        $currentOffer = $this->offerService->getOneById($offerFromDb->getId());
        $currentUser = $this->userService->getCurrentUser();
        $currentUser->setMoneySpent($currentOffer->addTotalPrice());
        $offerFromDb->setIsOccupied(true);
        $this->userService->updateSpentMoney($currentUser, $currentUser->getId());
        $this->offerService->rent($currentOffer, $currentOffer->getId());
        return $this->redirect('all_offers.php');
    }

    public function allOffersByAuthor()
    {
        if (!$this->userService->isLogged()) {
            return $this->redirect('login.php');
        }

        $offers = $this->offerService->getAllByAuthor();
        return $this->render('offer/my_offers', $offers);
    }

    public function allOffers()
    {
        if (!$this->userService->isLogged()) {
            return $this->redirect('login.php');
        }

        $offers = $this->offerService->getAll();
        return $this->render('offer/all_offers', $offers);
    }

    public function allRentsByUser()
    {
        if (!$this->userService->isLogged()) {
            return $this->redirect('login.php');
        }
    }

    private function addProcess($formData)
    {
        try {
            /** @var OfferDTO $offer */
            $offer = $this->dataBinder->bind($formData, OfferDTO::class);
            $town = $this->townService->getOneById($offer->getTownId());
            $room = $this->roomService->getOneById($offer->getRoomId());
            $currentUser = $this->userService->getCurrentUser();
            $offer->setTown($town);
            $offer->setRoom($room);
            $offer->setUser($currentUser);
            $this->offerService->create($offer);
            return $this->redirect('my_offers.php');
        } catch (\PDOException $e) {
            $offer = $this->dataBinder->bindReflection($formData, OfferDTO::class);
            $addDTO = new AddOfferDTO();
            $addDTO->setOffer($offer);
            $addDTO->setTowns($this->townService->getAll());
            $addDTO->setRooms($this->roomService->getAll());
            return $this->render('offer/add', $addDTO,
                [$e->getMessage()]);
        }
    }

    private function editProcess($formData, $getData)
    {
        try {
            /** @var OfferDTO $offerData */
            /** @var OfferDTO $offer */
            $offerData = $this->dataBinder->bind($getData, OfferDTO::class);
            $offer = $this->dataBinder->bind($formData, OfferDTO::class);
            $town = $this->townService->getOneById($offer->getTownId());
            $room = $this->roomService->getOneById($offer->getRoomId());
            $user = $this->userService->getCurrentUser();
            $offer->setTown($town);
            $offer->setRoom($room);
            $offer->setUser($user);
            $offer->setIsOccupied($offer->getIsOccupied());
            $this->offerService->edit($offer, $offerData->getId());
            return $this->redirect('my_offers.php');
        } catch (\PDOException $e) {
            $offer = $this->dataBinder->bindReflection($formData, OfferDTO::class);
            $editDTO = new EditOfferDTO();
            $editDTO->setOffer($offer);
            $editDTO->setTowns($this->townService->getAll());
            $editDTO->setRooms($this->roomService->getAll());
            return $this->render('offer/edit_offer', $editDTO, [$e->getMessage()]);
        }
    }
}