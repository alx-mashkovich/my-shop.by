<?php

/* 
 * Create database
 * and tables
 */


// CREATE INDEX email_password ON client(`email`,`password`)

// INSERT INTO `my_shop`.`client` (`id`, `email`, `password`, `first_name`, `second_name`, `patronymic`, `phone`) 
// VALUES (NULL, 'aleshacasha@gmail.com', '1234', 'alex', 'mashkovich', 'anatolevich', '2545417');


// Product insert
// INSERT INTO `my_shop`.`product` (`id`, `client_id`, `name`, `description`, `access`, `amount`, `price`, `published`, `image`) VALUES 
// (NULL, '1', 'Сандаль', 'Сандаль правый', '1', '1', '25000', CURRENT_TIMESTAMP, 'http://cs419429.vk.me/v419429659/38ff/odYxDvjQJqE.jpg'), 
// (NULL, '1', 'Штанина', 'Штанина за 20 гривен', '1', '5', '20', CURRENT_TIMESTAMP, 'http://i1353.photobucket.com/albums/q672/nakasun/ralph-lauren--p_n_35297_B_zpsf8480593.jpg'); 