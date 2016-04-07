<?php include(ROOT . '/views/layout/header.php'); ?>

<?php include(ROOT . '/views/alerts/errors.php'); ?>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row product-item">
            <div class="col-md-9">
                <h2 class=""><?php echo $result['name']; ?></h2>
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
            
            <div class="col-md-9">
                <h3 class="">Контактная информация продавца</h3>
                <label>Email:</label>
                <div class="email">
                    <?php echo $result['email'];?>
                </div>
                <label>Телефон:</label>
                <div class="email">
                    <?php echo $result['phone'];?>
                </div>
                <label>ФИО:</label>
                <div class="email">
                    <?php echo $result['fio'];?>
                </div>
            </div>
            
        </div>  
    </div>

<?php include(ROOT . '/views/layout/footer.php'); ?>