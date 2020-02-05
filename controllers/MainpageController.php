<?php

class MainpageController
{
    public function actionIndex()
    {
        $booksList = array();
        $booksList = Books::getBooksList();
        $genresList = array();
        $genresList = Genres::getGenresList();
        $authorsList = Books::getAuthorsList();

        require_once(ROOT . '/views/mainpage/index.php');

        return true;
    }

    public function actionBuyform($id)
    {
        if ($id) {
            $booksItem = Books::getBooksItemById($id);

            require_once(ROOT . '/views/mainpage/buyform.php');
        }

        return true;
    }
}