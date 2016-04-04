<?php

return array(
    '^u-([A-Za-z0-9\._]+)$' => 'product/list/$1',
    '^u-([A-Za-z0-9\._]+)/product-([A-Za-z0-9]+)$' => 'product/index/$1/$2',
    'user/login' => 'user/login',
    'user/registration' => 'user/registration',
    '^account$' => 'account/index',
    'user/logout' => 'user/logout',
    '^$|^products$' => 'product/list',
    '^product/([0-9]+)$' => 'product/index/$1'
);
