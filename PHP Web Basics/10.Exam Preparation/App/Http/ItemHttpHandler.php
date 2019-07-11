<?php

namespace App\Http;

use App\Data\AddItemDTO;
use App\Data\ItemDTO;
use App\Data\EditItemDTO;
use App\Service\Category\CategoryServiceInterface;
use App\Service\Item\ItemServiceInterface;
use App\Service\User\UserServiceInterface;
use Core\Http\Session\SessionInterface;
use Core\Template\TemplateInterface;
use Core\Util\DataBinderInterface;

class ItemHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var ItemServiceInterface
     */
    private $itemService;

    /**
     * @var CategoryServiceInterface
     */
    private $categoryService;

    /**
     * @var UserServiceInterface
     */
    private $userService;

    public function __construct(TemplateInterface $template,
                                DataBinderInterface $dataBinder,
                                SessionInterface $session,
                                ItemServiceInterface $itemService,
                                CategoryServiceInterface $categoryService,
                                UserServiceInterface $userService)
    {
        parent::__construct($template, $dataBinder, $session);
        $this->itemService = $itemService;
        $this->categoryService = $categoryService;
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
            $item = $this->dataBinder->bind($formData, ItemDTO::class);
            $addDTO = new AddItemDTO();
            $addDTO->setItem($item);
            $addDTO->setCategories($this->categoryService->getAll());
            return $this->render('item/add', $addDTO);
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
            /** @var ItemDTO $itemData */
            $itemData = $this->dataBinder->bindReflection($getData, ItemDTO::class);
            $item = $this->itemService->getOneById($itemData->getId());
            $categories = $this->categoryService->getAll();
            $editDTO = new EditItemDTO();
            $editDTO->setItem($item);
            $editDTO->setCategories($categories);
            return $this->render('item/edit_item', $editDTO);
        }
    }

    public function remove($getData = [])
    {
        if (!$this->userService->isLogged()) {
            return $this->redirect('login.php');
        }

        /** @var ItemDTO $itemData */
        $itemData = $this->dataBinder->bind($getData, ItemDTO::class);
        $currentItem = $this->itemService->getOneById($itemData->getId());
        $currentUser = $this->userService->getCurrentUser();

        if ($currentUser->getId() === $currentItem->getUser()->getId()) {
            $this->itemService->erase($itemData->getId());
            return $this->redirect('my_items.php');
        } else {
            $myItems = $this->itemService->getAllByAuthor();
            return $this->render('item/all_items', $myItems, ['Cannot delete this item!']);
        }
    }

    public function view($getData = [])
    {
        if (!$this->userService->isLogged()) {
            return $this->redirect('login.php');
        }

        /** @var ItemDTO $itemData */
        $itemData = $this->dataBinder->bind($getData, ItemDTO::class);
        $item = $this->itemService->getOneById($itemData->getId());
        return $this->render('item/view_item', $item);
    }

    public function allItemsByAuthor()
    {
        if (!$this->userService->isLogged()) {
            return $this->redirect('login.php');
        }

        $items = $this->itemService->getAllByAuthor();
        return $this->render('item/my_items', $items);
    }

    public function allItems()
    {
        if (!$this->userService->isLogged()) {
            return $this->redirect('login.php');
        }

        $items = $this->itemService->getAll();
        return $this->render('item/all_items', $items);
    }

    private function addProcess($formData)
    {
        try {
            /** @var ItemDTO $item */
            $item = $this->dataBinder->bind($formData, ItemDTO::class);
            $category = $this->categoryService->getOneById($item->getCategoryId());
            $currentUser = $this->userService->getCurrentUser();
            $item->setCategory($category);
            $item->setUser($currentUser);
            $this->itemService->create($item);
            return $this->redirect('my_items.php');
        } catch (\PDOException $e) {
            $item = $this->dataBinder->bindReflection($formData, ItemDTO::class);
            $addDTO = new AddItemDTO();
            $addDTO->setItem($item);
            $addDTO->setCategories($this->categoryService->getAll());
            return $this->render('item/add', $addDTO,
                [$e->getMessage()]);
        }
    }

    private function editProcess($formData, $getData)
    {
        try {
            /** @var ItemDTO $data */
            /** @var ItemDTO $item */
            $data = $this->dataBinder->bind($getData, ItemDTO::class);
            $item = $this->dataBinder->bind($formData, ItemDTO::class);
            $category = $this->categoryService->getOneById($item->getCategoryId());
            $user = $this->userService->getCurrentUser();
            $item->setCategory($category);
            $item->setUser($user);
            $this->itemService->edit($item, $data->getId());
            return $this->redirect('my_items.php');
        } catch (\PDOException $e) {
            $item = $this->dataBinder->bindReflection($formData, ItemDTO::class);
            $editDTO = new EditItemDTO();
            $editDTO->setItem($item);
            $editDTO->setCategories($this->categoryService->getAll());
            return $this->render('item/edit_item', $editDTO, [$e->getMessage()]);
        }
    }
}