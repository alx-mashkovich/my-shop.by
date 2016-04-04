        
<div class="jumbotron">
    <div class="container">
        <div class="avatar" style="width:100px; margin-top:30px;">
            <img style="border-radius:50%;" src="<?php echo $result['avatar'];?>" />
        </div>
        <h1><?php echo $result['login']; ?></h1>
        <p>Имя: <b><?php echo $result['name']; ?></b></p>
        <p>Статус: <b><?php echo $result['status']; ?></b></p>
        <p><label><?php echo $result['post']; ?> публикаций</label></p>
        <p><label><?php echo $result['follower']; ?> подписчиков</label></p>
        <p><label>Подписки: <?php echo $result['subscriber']; ?></label></p>
        <p><a class="btn btn-primary btn-lg" href="/" role="button">Подписаться</a></p>
    </div>
</div>