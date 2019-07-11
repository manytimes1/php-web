<?php /** @var App\Data\UserDTO $data */ ?>
<h1>REGISTER NEW USER</h1>
<?php foreach ($errors as $error): ?>
<p style="color:red"><?= $error; ?></p>
<?php endforeach; ?>
<form method="post">
    Email: <input type="text" value="<?= $data !== null ? $data->getEmail() : "" ?>" name="email" required="required"/><br/>
    Password: <input type="password" name="password" required="required"/><br/>
    Confirm Password: <input type="password" name="confirm_password" required="required"/><br/>
    Name: <input type="text" value="<?= $data !== null ? $data->getName() : "" ?>" name="name" required="required"/><br/>
    Phone: <input type="text" value="<?= $data !== null ? $data->getPhone() : "" ?>" name="phone" required="required"/><br/>
    <input type="submit" name="register" value="Register"/>
</form>