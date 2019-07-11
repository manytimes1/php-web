<?php /** @var \App\Data\UserDTO $data */ ?>
<h1>USER PROFILE</h1>
<form method="POST">
    <div>
        <label>
            Username: <input type="text" value="<?= $data->getUsername() ?>" name="username"/>
        </label>
    </div>
    <div>
        <label>
            Password: <input type="text" name="password"/>
        </label>
    </div>
    <div>
        <label>
            First Name: <input type="text" value="<?= $data->getFirstName() ?>" name="first_name"/>
        </label>
    </div>
    <div>
        <label>
            Last Name: <input type="text" value="<?= $data->getLastName() ?>" name="last_name">
        </label>
    </div>
    <div>
        <label>
            Birthday: <input type="text" value="<?= $data->getBornOn() ?>" name="born_on">
        </label>
    </div>
    <div>
        <input type="submit" name="edit" value="Edit!">
    </div>
</form>

You can <a href="logout.php">logout</a> or see <a href="users.php">all users</a>.
