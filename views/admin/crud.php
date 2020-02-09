<?php
require_once('../../data/Db.php');

    function addBook($name_book, $description, $price, $name_author, $genre_id, $img)
    {
        $db = getConnection();
        try { 
            //добавляем книгу в таблицу books
            $sql = "INSERT into books(name_book, description, price, image)
                        VALUES ('$name_book', '$description', '$price', '$img')";
            $db->exec($sql);
            $lastbook_id = $db->lastInsertId();

            addAuthor($lastbook_id, $name_author);

            addGenre($lastbook_id, $genre_id);

            echo "Book inserted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $db = null;
    }

    function delBook($id)
    {
        $db = getConnection();
        try {
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "DELETE FROM links_ba WHERE book_id = $id";
            $db->exec($sql);

            $sql2 = "DELETE FROM links_bg WHERE book_id = $id";
            $db->exec($sql2);

            $sql3 = "DELETE FROM books WHERE id = $id";
            $db->exec($sql3);

            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $db = null;
    }

    function updBook($id, $name_book, $description, $price, $name_author, $genre_id, $img)
    {
        $db = getConnection();
        try {   
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE books SET name_book='$name_book', description='$description', price='$price', 
                    image='$img' WHERE id = $id";                
            $db->exec($sql);

            $sql = "DELETE FROM links_ba WHERE book_id = $id";
            $db->exec($sql);

            $sql2 = "DELETE FROM links_bg WHERE book_id = $id";
            $db->exec($sql2);

            addAuthor($id, $name_author);

            addGenre($id, $genre_id);

            echo "<br>Book updated successfully<br>";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $db = null;
    }

    function addAuthor($id, $name_author){
        $db = getConnection();
        try { 

            //разбиваем строку авторов
            $autors = explode(", ", $name_author);
            foreach ($autors as $n_author) {
                //проводим проверку на наличие автора в таблице authors
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $result = $db->query('SELECT id from authors WHERE name_author="' .$n_author .'"');
                $authorItem = $result->fetch();
                $author_id = $authorItem['id'];
                
                
                //добавляем id книги и автора в таблицу links_ba
                if ($author_id) {
                    //если найден автор в таблице authors
                    $sql2 = "INSERT into links_ba(book_id, author_id)
                    VALUES ('$id', '$author_id')";
                    $db->exec($sql2);
                }   else {
                    //если НЕ найден автор в таблице authors
                    //добавляем автора
                    $sql3 = "INSERT INTO authors (name_author) VALUES ('$n_author')";                
                    $db->exec($sql3);
                    $lastauthor_id = $db->lastInsertId();

                    $sql4 = "INSERT into links_ba(book_id, author_id)
                    VALUES ('$id', '$lastauthor_id')";
                    $db->exec($sql4);
                }
            }

            echo "<br>Author inserted successfully<br>";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $db = null;
    }

    function addGenre($id, $genre_id){
        $db = getConnection();
        try { 
            //добавляем id книги и жанра в таблицу links_bg
            $sql5 = "INSERT into links_bg(book_id, genre_id)
            VALUES ('$id', '$genre_id')";
            $db->exec($sql5);

            echo "<br>Genre inserted successfully<br>";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $db = null;
    }