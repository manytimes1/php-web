<h1>All users</h1>

<table border="1">
    <thead>
    <tr style="font-weight:bold;">
        <td>Id</td>
        <td>Username</td>
        <td>Full Name</td>
        <td>Birthday</td>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $user): ?>
            <tr>
                <td><?= $user->getId() ?></td>
                <td><?= $user->getUsername() ?></td>
                <td><?= $user->getFirstName() . " " . $user->getLastName() ?></td>
                <td><?= $user->getBornOn() ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

Go back to your <a href="profile.php">profile</a>.