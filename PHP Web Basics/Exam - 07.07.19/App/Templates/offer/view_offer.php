<?php /** @var \App\Data\OfferDTO $data */ ?>
<h1>Offer №<?= $data->getId(); ?></h1>
<a href="profile.php">My Profile</a><br/><br/>
<img src="<?= $data->getPictureUrl(); ?>" alt="None" width="400" height="200"/><br/><br/>
Town: <?= $data->getTown()->getName(); ?><br/><br/>
Room: <?= $data->getRoom()->getType(); ?><br/><br/>
Description: <?= $data->getDescription(); ?><br/><br/>
Days: <?= $data->getDays(); ?><br/><br/>
Price: $<?= $data->getPrice(); ?><br/><br/>
Is Available: <?= $data->getIsOccupied(); ?><br/><br/><hr/>
Offer Author: <?= $data->getUser()->getAuthorName(); ?><br/><br/>
Offer Phone: +<?= $data->getUser()->getPhone(); ?>

