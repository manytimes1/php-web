<?php /** @var App\Data\UserDTO $data */ ?>
<h1>LOGIN</h1>
<?php foreach ($this->getFlash("success") as $flash): ?>
<p style="color:green"><?= $flash; ?></p>
<?php endforeach; ?>
<?php foreach ($errors as $error): ?>
<p style="color:red"><?= $error; ?></p>
<?php endforeach; ?>
<form method="post">
    Username: <input type="text" value="<?= $data !== null ? $data->getUsername() : "" ?>" name="username" required="required"/><br/>
    Password: <input type="password" value="<?= $data !== null ? $data->getPassword() : "" ?>" name="password" required="required"/><br/>
    <input type="submit" name="login" value="Login Now!"/>
</form>