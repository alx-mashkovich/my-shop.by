<?php

return array(
    '^u-([A-Za-z0-9\._]+)$' => 'product/list/$1',
    '^u-([A-Za-z0-9\._]+)/product-([A-Za-z0-9]+)$' => 'product/index/$1/$2',
    'user/login' => 'user/login',
    'user/registration' => 'user/registration',
    '^account$|^account/([0-9]+)$' => 'account/index/$1',
    'user/logout' => 'user/logout',
    '^$|^product$' => 'product/list',
    '^product/deleteAjax/([0-9]+)$' => 'product/deleteAjax/$1',
    '^product/([0-9]+)$' => 'product/index/$1'
);
