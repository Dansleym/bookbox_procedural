<?php

class Catalog
{
    const SHOW_BY_DEFAULT = 4;
    /**
     * Returns books list by genre id
     * @param integer $id, $page = 1
     */
    public static function getCatalogItemById($id, $page = 1)
    {
        $db = Db::getConnection();
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $result = $db->query('SELECT books.id, books.name_book, books.description, books.price, 
                                books.image, books.author_id, GROUP_CONCAT(authors.name_author SEPARATOR ", ") 
                                AS name_author FROM books 
                                INNER JOIN authors ON books.author_id = authors.id
                                WHERE books.genre_id='.$id.'
                                GROUP BY name_book 
                                LIMIT ' . self::SHOW_BY_DEFAULT
                                . ' OFFSET ' . $offset);
            
        $catalogItems = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $catalogItems[$i]['id'] = $row['id'];
            $catalogItems[$i]['name_book'] = $row['name_book'];
            $catalogItems[$i]['description'] = $row['description'];
            $catalogItems[$i]['price'] = $row['price'];
            $catalogItems[$i]['image'] = $row['image'];
            $catalogItems[$i]['author_id'] = $row['author_id'];
            $catalogItems[$i]['name_author'] = $row['name_author'];
            $i++;
        }

        return $catalogItems;
    }
}


