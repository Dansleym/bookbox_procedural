<?php

return array(
    //books routes
    'books/([0-9]+)' => 'books/view/$1',
    'author/([0-9]+)' => 'books/author/$1',
    'books' => 'books/index',
    //calalog routes
    'catalog/([0-9]+)/page-([0-9]+)' => 'catalog/view/$1/$2',
    'catalog/([0-9]+)' => 'catalog/view/$1',
    'catalog' => 'catalog/index',
    //admin routes
    'views/admin/([0-9]+)' => 'admin/view/$1',
    'views/admin/updbook/([0-9]+)' => 'admin/updbook/$1',
    'views/admin/addbook' => 'admin/addBook',
    'views/admin' => 'admin/adminPanel',
    //buying form routes
    'buyform/([0-9]+)' => 'mainpage/buyform/$1',
    //main page routes 
    'bookbox' => 'mainpage/index',   
);