<?php /** @var \App\Data\OfferDTO[] $data */ ?>
<h1>My Offers</h1>
<a href="add_offer.php">Add new offer</a> |
<a href="profile.php">My Profile</a> |
<a href="logout.php">logout</a>
<br/><br/>
<table border="1">
    <thead>
    <tr>
        <th>Town</th>
        <th>Type</th>
        <th>Days</th>
        <th>Price</th>
        <th>Is Available</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $offer): ?>
        <tr>
            <td><?= $offer->getTown()->getName(); ?></td>
            <td><?= $offer->getRoom()->getType() ?></td>
            <td><?= $offer->getDays() ?></td>
            <td>$<?= $offer->getPrice() ?></td>
            <td><?= $offer->getIsOccupied() ?></td>
            <td><a href="edit_offer.php?id=<?= $offer->getId(); ?>">edit offer</a></td>
            <td><a href="delete_offer.php?id=<?= $offer->getId(); ?>">delete offer</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>