<h1>Login</h1>
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
        <input type="submit" name="login" value="Login!"/>
    </div>
</form>
