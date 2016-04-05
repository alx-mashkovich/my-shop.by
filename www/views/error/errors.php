<?php if (isset($errors) && is_array($errors)): ?>
    <ul style="margin-top:100px;">
        <?php foreach ($errors as $error): ?>
            <li> - <?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

