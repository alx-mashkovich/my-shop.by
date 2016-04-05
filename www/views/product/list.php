<?php include(ROOT . '/views/layout/header.php'); ?>

<?php include(ROOT . '/views/error/errors.php'); ?>

<div class="container">
    <!-- Example row of columns -->
    <div class="row itemlist">
        <?php foreach ($result as $item): ?> 
            <div class="col-md-3">
                <div class="image text-center pull-left">
                    <a href="<?php echo $item['link']; ?>">
                        <img src="<?php echo $item['image']; ?>" alt="" />
                    </a>
                </div>
                <h2 class="text-center"><a href="<?php echo $item['link']; ?>"><?php echo $item['name']; ?></a></h2>
                <div class="text-center"><?php echo $item['price']; ?> руб.</div>
            </div>
        <?php endforeach; ?>
    </div>  
</div>


<?php include(ROOT . '/views/layout/footer.php'); ?>