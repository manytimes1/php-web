<?php /** @var \App\Data\EditItemDTO $data */ ?>
<h1>EDIT ITEM</h1>
<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error; ?></p>
<?php endforeach; ?>
<a href="profile.php">My Profile</a><br/><br/>
<form method="post">
    Title: <input type="text" value="<?= $data->getItem()->getTitle(); ?>" name="title" required="required"/><br/>
    Price: <input type="text" value="<?= $data->getItem()->getPrice(); ?>" name="price" required="required"/><br/>
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
    <img src="<?= $data->getItem()->getImage(); ?>" alt="None" width="200" height="100" /><br/>
    <input type="submit" name="edit" value="Edit"/>
</form>