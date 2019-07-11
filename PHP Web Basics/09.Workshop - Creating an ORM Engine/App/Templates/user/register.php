<h1>REGISTER NEW USER</h1>
<?php foreach ($errors as $error): ?>
<p style="color:red"><?= $error->getMessage() ?></p>
<?php endforeach; ?>
<form method="post">
    <div>
        <label>
            Username: <input type="text" value="<?= $data !== null ? $data->getUsername() : "" ?>" name="username" required="required"/>
        </label>
    </div>
    <div>
        <label>
            Password: <input type="password" name="password" required="required"/>
        </label>
    </div>
    <div>
        <label>
            Confirm Password: <input type="password" name="confirm_password" required="required"/>
        </label>
    </div>
    <div>
        <label>
            First Name: <input type="text" value="<?= $data !== null ? $data->getFirstName() : "" ?>" name="first_name" required="required"/>
        </label>
    </div>
    <div>
        <label>
            Last Name: <input type="text" value="<?= $data !== null ? $data->getLastName() : "" ?>" name="last_name" required="required"/>
        </label>
    </div>
    <div>
        <label>
            Birthday: <input type="date" value="<?= $data !== null ? $data->getBornOn() : "" ?>" name="born_on" required="required"/>
        </label>
    </div>
    <div>
        <input type="submit" name="register" value="Register!"/>
    </div>
</form>