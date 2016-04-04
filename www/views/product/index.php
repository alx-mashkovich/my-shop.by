<?php include(ROOT . '/views/layout/header.php'); ?>

<?php
if (isset($errors) && is_array($errors)):

    foreach ($errors as $error) {
        echo $error . '<br>';
    }
else:
     $link = Product::getLink($result['id']);
    ?>
    <div class="container">
        <!-- Example row of columns -->
        <div class="row product-item">
            <div class="col-md-9">
                <h2 class=""><a href="<?php echo $link; ?>"><?php echo $result['name']; ?></a></h2>
                <div class="image">
                    <img style="width:400px;" src="<?php echo $result['image']; ?>" alt="<?php echo $resilt['name'] ?>" />
                </div>
                <div class="price">
                    <?php echo $result['price'];?> руб.
                </div>
                <div class="desc">
                    <?php echo $result['description'];?>
                </div>
                <div class="order">
                    <a href="#" class="btn btn-info">Заказать</a>
                </div>
            </div>
        </div>  
    </div>

<?php endif; ?>

<?php include(ROOT . '/views/layout/footer.php'); ?>