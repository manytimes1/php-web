<?php /** @var App\Data\AddOfferDTO $data */ ?>
<h1>Add New Offer</h1>
<?php foreach ($errors as $error): ?>
<p style="color: red"><?= $error; ?></p>
<?php endforeach; ?>
<a href="profile.php">My Profile</a><br/><br/>
<form method="post">
    Town: <select name="town_id">
        <?php foreach ($data->getTowns() as $town): ?>
            <?php if ($data->getOffer()->getTownId() === $town->getId()): ?>
                <option selected="selected" value="<?= $town->getId(); ?>"><?= $town->getName(); ?></option>
            <?php else: ?>
                <option value="<?= $town->getId(); ?>"><?= $town->getName(); ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select><br/>
    Room Type: <select name="room_id">
        <?php foreach ($data->getRooms() as $room): ?>
            <?php if ($data->getOffer()->getRoomId() === $room->getId()): ?>
                <option selected="selected" value="<?= $room->getId(); ?>"><?= $room->getType(); ?></option>
            <?php else: ?>
                <option value="<?= $room->getId(); ?>"><?= $room->getType(); ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select><br/>
    Image URL: <input type="text" value="<?= $data->getOffer()->getPictureUrl(); ?>" name="picture_url" required="required"/><br/>
    Description: <textarea rows="5" name="description" required="required"><?= $data->getOffer()->getDescription(); ?></textarea><br/>
    Days: <input type="number" value="<?= $data->getOffer()->getDays(); ?>" name="days" required="required"/><br/>
    Price: <input type="number" step="0.01" value="<?= $data->getOffer()->getPrice(); ?>" name="price" required="required"/><br/>
    <input type="submit" name="add" value="Add Offer"/>
</form>