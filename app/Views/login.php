<!-- app/Views/login.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
</head>

<body>
    <?php if (session()->getFlashdata('error')) : ?>
        <p><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <!-- Cek apakah pengguna atau admin sudah login -->
    <?php if (!session()->get('user_id') || !session()->get('role')) : ?>

        <form action="/login" method="post">
            <?= csrf_field(); ?>
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>

    <?php else : ?>
        <!-- Jika sudah login, tampilkan pesan -->
        <p>You are already logged in as <?= session()->get('role') ?>.</p>
    <?php endif; ?>
</body>

</html>