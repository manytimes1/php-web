<?php /** @var App\Data\UserDTO $data */ ?>
<h1>User Login</h1>
<?php foreach ($this->getFlash("success") as $flash): ?>
<p style="color:green"><?= $flash; ?></p>
<?php endforeach; ?>
<?php foreach ($errors as $error): ?>
<p style="color:red"><?= $error; ?></p>
<?php endforeach; ?>
<form method="post">
    Email: <input type="text" value="<?= $data !== null ? $data->getEmail() : "" ?>" name="email" required="required"/><br/>
    Password: <input type="password" value="" name="password" required="required"/><br/>
    <input type="submit" name="login" value="Login"/>
</form>
<p>Don't have an account? <a href="register.php">Register</a></p>