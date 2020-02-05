<?php

class CatalogController
{
    public function actionIndex()
    {
        $genresList = array();
        $genresList = Genres::getGenresList();
        $catalogList = array();
        $catalogList = Books::getBooksList();

        require_once(ROOT . '/views/catalog/index.php');

        return true;
    }

    public function actionView($catalog, $page = 1)
    {
        $total = Books::getTotalBooksInCategory($catalog);
        $pagination = new Pagination($total, $page, Catalog::SHOW_BY_DEFAULT, 'page=');
        $catalogItems = Catalog::getCatalogItemById($catalog, $page);
        $genresList = array();
        $genresList = Genres::getGenresList();
        $authorsList = array();
        $authorsList = Books::getAuthorsList();
        
        require_once(ROOT . '/views/catalog/view.php');

        return true;
    }

    public function getAuthor($catalog)
    {
        if ($catalog) {
            $catalogItems = Catalog::getCatalogItemById($catalog);
            $genresList = array();
            $genresList = Genres::getGenresList();
            
            require_once(ROOT . '/views/catalog/view.php');
        }

        return true;
    }
}