<?php include(ROOT . '/views/layout/header.php'); ?>

<?php if (isset($errors) && is_array($errors)): ?>
    <ul style="margin-top:100px;">
        <?php foreach ($errors as $error): ?>
            <li> - <?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div class="container" style="margin-top: 20%;">

    <form class="form-signin" method="POST" action="">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <input name="submit" class="btn btn-lg btn-primary btn-block" style="margin-top:20px;" type="submit" value="Войти">
    </form>

</div> <!-- /container -->

<?php include(ROOT . '/views/layout/footer.php'); ?>