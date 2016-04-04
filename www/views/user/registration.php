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
        <h2 class="form-signin-heading">Registration</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
        
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        
        <label for="inputFirstName" class="sr-only">First name</label>
        <input type="text" id="inputFirstName" name="first_name" class="form-control" placeholder="First name" required>
        
        <label for="inputSecondName" class="sr-only">Second name</label>
        <input type="text" id="inputSecondName" name="second_name" class="form-control" placeholder="Second name">
        
        <label for="inputPatronymic" class="sr-only">Patronymic</label>
        <input type="text" id="inputPatronymic" name="patronymic" class="form-control" placeholder="Patronymic">
        
        <label for="inputPhone" class="sr-only">Phone</label>
        <input type="text" id="inputPhone" name="phone" class="form-control" placeholder="Phone namber" required>
        
        <input name="submit" class="btn btn-lg btn-primary btn-block" style="margin-top:20px;" type="submit" value="Создать аккаунт">
    </form>

</div> <!-- /container -->

<?php include(ROOT . '/views/layout/footer.php'); ?>