<?php

class Admin
{
    public static function addBook($name_book, $description, $price, $name_author, $genre_id, $img)
    {
        $db = Db::getConnection();
        try { 
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $result = $db->query('SELECT id from authors WHERE name_author="' .$name_author .'"');

            $authorItem = $result->fetch();
            $author_id = $authorItem['id'];
    
            if ($author_id) {
                $sql2 = "INSERT into books(name_book, description, price, author_id, genre_id, image)
                VALUES ('$name_book', '$description', '$price', '$author_id', '$genre_id', '$img')";
                $db->exec($sql2);
            }   else {
                $sql = "INSERT INTO authors (name_author)
                        SELECT * FROM (SELECT '$name_author') AS tmp
                        WHERE NOT EXISTS (
                            SELECT name_author FROM authors WHERE name_author = '$name_author'
                        ) LIMIT 1";
                $db->exec($sql);
                $last_id = $db->lastInsertId();

                $sql2 = "INSERT into books(name_book, description, price, author_id, genre_id, image)
                    VALUES ('$name_book', '$description', '$price', '$last_id', '$genre_id', '$img')";
                $db->exec($sql2);
            }
            echo "Record inserted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $db = null;
    }

    public static function delBook($id)
    {
        $db = Db::getConnection();
        try {
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "DELETE FROM books WHERE id = $id";

            $db->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $db = null;
    }

    public static function updBook($id, $name_book, $description, $price, $author_id, $genre_id, $img)
    {
        $db = Db::getConnection();
        try {   
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE books SET name_book='$name_book', description='$description', price='$price', 
                    author_id='$author_id', genre_id='$genre_id', image='$img' WHERE id = $id";
                   
            $db->exec($sql);
            echo "Record updated successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $db = null;
    }
}


