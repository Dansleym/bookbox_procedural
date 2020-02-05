<?php
    require_once('Db.php');

    function getBooksList()
    {
        $db = getConnection();

        $result = $db->query('SELECT book.id, book.name_book, book.description, book.price,
                            book.image, GROUP_CONCAT(name_author SEPARATOR ", ") AS author_captions 
                            FROM books as book 
                            LEFT JOIN links_ba AS lin 
                            ON ( book.id = lin.book_id ) 
                            LEFT JOIN authors AS auth 
                            ON ( lin.author_id = auth.id ) 
                            GROUP BY id');

        $booksList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $booksList[$i]['id'] = $row['id'];
            $booksList[$i]['name_book'] = $row['name_book'];
            $booksList[$i]['description'] = $row['description'];
            $booksList[$i]['price'] = $row['price'];
            $booksList[$i]['image'] = $row['image'];
            $booksList[$i]['author_id'] = $row['author_id'];
            $booksList[$i]['name_author'] = $row['author_captions'];
            $i++;
        }

        return $booksList;
    }

    /**
     * Returns books list by category id
     * @param integer $id
     */
    function getTotalBooksInCategory($id)
    {
        $id = intval($id);

        if ($id) {
            $db = getConnection();

            $result = $db->query('SELECT count(lin.genre_id)
                                    FROM books as book            
                                    LEFT JOIN links_bg AS lin
                                    ON ( book.id = lin.book_id )
                                    LEFT JOIN genres AS gen
                                    ON ( lin.genre_id = gen.id ) 
                                    WHERE lin.genre_id = ' . $id);

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result->fetch();
    
            return $row['count(lin.genre_id)'];
        }

    }

    /**
     * Returns total count books 
     */
    function getTotalBooksCount()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(*) FROM books');
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count(*)'];
    }

    /**
     * Returns books list by author id
     * @param integer $id
     */
    function getBooksListByAuthor($id)
    {
        $id = intval($id);
        
        if ($id) {
            $db = Db::getConnection();

            $result = $db->query('SELECT books.id, books.name_book, books.description, books.price, 
                                 books.image, authors.name_author, authors.information 
                                 FROM books 
                                 INNER JOIN authors ON books.author_id=authors.id 
                                 WHERE books.id='. $id);
              
            $catalogItems = array();
            $i = 0;
            while ($row = $result->fetch()) {
                $catalogItems[$i]['id'] = $row['id'];
                $catalogItems[$i]['name_book'] = $row['name_book'];
                $catalogItems[$i]['description'] = $row['description'];
                $catalogItems[$i]['price'] = $row['price'];
                $catalogItems[$i]['image'] = $row['image'];
                $catalogItems[$i]['name_author'] = $row['name_author'];
                $catalogItems[$i]['information'] = $row['information'];
                $i++;
            }
    
            return $catalogItems;
        }
    }

    /**
     * Returns book by book id
     * @param integer $id
     */
    function getBooksItemById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = getConnection();

            $result = $db->query('SELECT books.id, books.name_book, books.description, books.price, books.genre_id,
                                 books.image, books.author_id, authors.name_author, authors.information 
                                 FROM books INNER JOIN authors ON books.author_id=authors.id 
                                 WHERE books.id='. $id);

            $booksItem = $result->fetch();
    
            return $booksItem;
        }
    }

    /**
     * Returns book by author id
     * @param integer $id
     */
    function getBooksItemByAuthor($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $result = $db->query('SELECT * from authors WHERE id='. $id);

            $booksItem = $result->fetch();
    
            return $booksItem;
        }
    }

    /**
     * Returns total authors list
     */
    function getAuthorsList()
    {
        $db = getConnection();

        $result = $db->query('SELECT * from authors');

        $authorList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $authorList[$i]['id'] = $row['id'];
            $authorList[$i]['name_author'] = $row['name_author'];
            $authorList[$i]['information'] = $row['information'];
            $i++;
        }

        return $authorList;
    }

     /**
     * Returns books list by author id
     * @param integer $id
     */
    function getBooksListById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $result = $db->query('SELECT * from books WHERE author_id='. $id);

            $booksList = array();
            $i = 0;
            while ($row = $result->fetch()) {
                $booksList[$i]['id'] = $row['id'];
                $booksList[$i]['name_book'] = $row['name_book'];
                $booksList[$i]['description'] = $row['description'];
                $booksList[$i]['price'] = $row['price'];
                $booksList[$i]['author_id'] = $row['author_id'];
                $booksList[$i]['genre_id'] = $row['genre_id'];
                $booksList[$i]['image'] = $row['image'];
                $i++;
            }

            return $booksList;
        }
    }
