<?php
require_once('Db.php');

const SHOW_BY_DEFAULT = 4;
    /**
     * Returns books list by genre id
     * @param integer $id, $page = 1
     */
    function getCatalogItemById($id, $page = 1)
    {
        $db = getConnection();
        $offset = ($page - 1) * SHOW_BY_DEFAULT;

        $result = $db->query('SELECT book.id, book.name_book, book.description, book.price, book.image, 
                                GROUP_CONCAT(name_author SEPARATOR ", ") AS author_captions
                                FROM books as book 
                                LEFT JOIN links_ba AS lin 
                                ON ( book.id = lin.book_id ) 
                                LEFT JOIN authors AS auth 
                                ON ( lin.author_id = auth.id )            
                                LEFT JOIN links_bg AS ling
                                ON ( book.id = ling.book_id )
                                LEFT JOIN genres AS gen
                                ON ( ling.genre_id = gen.id ) 
                                WHERE ling.genre_id = '.$id.' 
                                GROUP BY id                             
                                LIMIT ' . SHOW_BY_DEFAULT
                               . ' OFFSET ' . $offset);


        // $result = $db->query('SELECT books.id, books.name_book, books.description, books.price, 
        //                         books.image, books.author_id, GROUP_CONCAT(authors.name_author SEPARATOR ", ") 
        //                         AS name_author FROM books 
        //                         INNER JOIN authors ON books.author_id = authors.id
        //                         WHERE books.genre_id='.$id.'
        //                         GROUP BY name_book 
        //                         LIMIT ' . SHOW_BY_DEFAULT
        //                         . ' OFFSET ' . $offset);
            
        $catalogItems = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $catalogItems[$i]['id'] = $row['id'];
            $catalogItems[$i]['name_book'] = $row['name_book'];
            $catalogItems[$i]['description'] = $row['description'];
            $catalogItems[$i]['price'] = $row['price'];
            $catalogItems[$i]['image'] = $row['image'];
            $catalogItems[$i]['name_author'] = $row['author_captions'];
            $i++;
        }

        return $catalogItems;
    }