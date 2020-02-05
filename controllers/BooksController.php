<?php

class BooksController
{

    public function actionIndex()
    {
        $booksList = array();
        $booksList = Books::getBooksList();
        $genresList = array();
        $genresList = Genres::getGenresList();
        
        require_once(ROOT.'/views/books/index.php');

        return true;
    }

    public function actionView($id)
    {
        if ($id) {
            $booksItem = Books::getBooksItemById($id);
            $genresList = array();
            $genresList = Genres::getGenresList();

            require_once(ROOT.'/views/books/view.php');
        }
        return true;
    }

    public function actionAuthor($id)
    {
        if ($id) {
            $authorsList = Books::getBooksItemByAuthor($id);  
            $booksList = array();
            $booksList = Books::getBooksListById($authorsList['id']);   
            $genresList = array();
            $genresList = Genres::getGenresList();
            
            require_once(ROOT.'/views/books/author.php');
        }
        return true;
    }
}