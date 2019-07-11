<?php /** @var App\Data\UserDTO $data */ ?>
<h1>REGISTER NEW USER</h1>
<?php foreach ($errors as $error): ?>
<p style="color:red"><?= $error; ?></p>
<?php endforeach; ?>
<form method="post">
    Username: <input type="text" value="<?= $data !== null ? $data->getUsername() : "" ?>" name="username" required="required"/><br/>
    Password: <input type="password" name="password" required="required"/><br/>
    Confirm Password: <input type="password" name="confirm_password" required="required"/><br/>
    Full Name: <input type="text" value="<?= $data !== null ? $data->getFullName() : "" ?>" name="full_name" required="required"/><br/>
    Location: <input type="text" value="<?= $data !== null ? $data->getLocation() : "" ?>" name="location" required="required"/><br/>
    Phone: <input type="text" value="<?= $data !== null ? $data->getPhone() : "" ?>" name="phone" required="required"/><br/>
    <input type="submit" name="register" value="Register!"/>
</form>
