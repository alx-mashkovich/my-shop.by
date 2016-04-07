<?php include(ROOT . '/views/layout/header.php'); ?>

<?php include(ROOT . '/views/alerts/warning.php'); ?>

<div class="container">
    <!-- Example row of columns -->
    <div class="row itemlist">
        <?php foreach ($result as $item): ?> 
            <div class="col-md-8">
                <div class="image text-center pull-left">
                    <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" />
                </div>
                <h2><?php echo $item['name']; ?></h2>
                <div><?php echo $item['price']; ?> руб.</div>
                <div><?php echo $item['description']; ?></div>
                <div class="product-count">Количество: <span><?php echo $item['amount']; ?></span></div>
                <a href="/product/editAjax/<?php echo $item['id']; ?>" data-id="<?php echo $item['id'];?>" class="product-edit btn btn-success">Edit</a>
                <a href="/product/deleteAjax/<?php echo $item['id']; ?>" data-id="<?php echo $item['id'];?>" class="product-delete btn btn-danger">Delete</a>
            </div>
        <?php endforeach; ?>
    </div>  
</div>


<?php include(ROOT . '/views/layout/footer.php'); ?>