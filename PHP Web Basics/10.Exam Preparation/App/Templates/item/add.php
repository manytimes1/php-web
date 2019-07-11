<?php /** @var App\Data\AddItemDTO $data */ ?>
<h1>ADD ITEM</h1>
<?php foreach ($errors as $error): ?>
<p style="color: red"><?= $error; ?></p>
<?php endforeach; ?>
<a href="profile.php">My Profile</a><br/><br/>
<form method="post">
    Title: <input type="text" value="<?= $data->getItem()->getTitle(); ?>" name="title" required="required"/><br/>
    Price: <input type="number" step="0.01" value="<?= $data->getItem()->getPrice(); ?>" name="price" required="required"/><br/>
    Category: <select name="category_id">
        <?php foreach ($data->getCategories() as $category): ?>
            <?php if ($data->getItem()->getCategoryId() === $category->getId()): ?>
                <option selected="selected" value="<?= $category->getId(); ?>"><?= $category->getName(); ?></option>
            <?php else: ?>
                <option value="<?= $category->getId(); ?>"><?= $category->getName(); ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select><br/>
    Description: <textarea rows="5" name="description" required="required"><?= $data->getItem()->getDescription(); ?></textarea><br/>
    Image URL: <input type="text" value="<?= $data->getItem()->getImage(); ?>" name="image" required="required"/><br/>
    <input type="submit" name="add" value="Add"/>
</form>