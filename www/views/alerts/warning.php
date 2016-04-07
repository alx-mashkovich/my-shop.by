<?php if (isset($errors) && is_array($errors)): ?>
    <div class="alert alert-warning" style="margin-top:100px;">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>