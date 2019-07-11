<?php /** @var \App\Data\ItemDTO $data */ ?>
<h1>VIEW ITEM</h1>
<a href="profile.php">My Profile</a><br/><br/>
<b>Title: </b> <?= $data->getTitle(); ?><br/><br/>
<b>Price: </b> <?= $data->getPrice(); ?><br/><br/>
<b>Category: </b> <?= $data->getCategory()->getName(); ?><br/><br/>
<b>Phone: </b> <?= $data->getUser()->getPhone(); ?><br/><br/>
<b>Description: </b> <?= $data->getDescription(); ?><br/><br/>
<img src="<?= $data->getImage(); ?>" alt="None" width="400" height="250" />