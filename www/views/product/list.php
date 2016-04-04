<?php include(ROOT . '/views/layout/header.php'); ?>

<?php
if (isset($errors) && is_array($errors)):

    foreach ($errors as $error) {
        echo $error . '<br>';
    }
else:
    ?>
    <div class="container">
        <!-- Example row of columns -->
        <div class="row itemlist">
            <?php
            foreach ($result as $item):
                $link = Product::getLink($item['id']);
                ?> 
                <div class="col-md-3">
                    <div class="image text-center pull-left">
                        <a href="<?php echo $link; ?>">
                            <img src="<?php echo $item['image']; ?>" alt="" />
                        </a>
                    </div>
                    <h2 class="text-center"><a href="<?php echo $link; ?>"><?php echo $item['name']; ?></a></h2>
                    <div class="text-center"><?php echo $item['price']; ?> руб.</div>
                </div>
            <?php endforeach; ?>
        </div>  
    </div>

<?php endif; ?>

<?php include(ROOT . '/views/layout/footer.php'); ?>