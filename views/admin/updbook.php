<?php
    require('../../data/books.php');
    require('../../data/genres.php'); 
    require('crud.php');

    $genresList = getGenresList();
    $booksItem = getBooksItemById($_GET['id']);

    if (isset($_POST['submit'])) {
        $img = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp_name, "C:\Users\Dansleym\Desktop\OSPanel_Min\domains\localhost\bookbox\assets\img/" . $img);

        updBook($_GET['id'], $_POST['name_book'], $_POST['textarea'], $_POST['price'], $_POST['name_author'], $_POST['genres'], $img);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/css/main.css">
    <title>Admin panel</title>
</head>
<body>

<a href="/" style="color: black; font-size: 20px; margin-left: 200px;">На главную</a>
<a href="/views/admin/" style="position: absolute; color: black; font-size: 20px;right: 200px;">Админ панель</a>
<h3 style="margin: 0 auto;width: 200px;color: red;">Обновление данных</h3>
<div style="display:flex; justify-content: center;">

    <form action="" method="POST" enctype="multipart/form-data" style="font-family: Courier monospace;font-size: 1.2em;display: flex; flex-direction: column; width: 50%;">
        
        <label for="image" style="margin-top: 20px;">Изображение книги:</label>
        <input id="image" type="file" name='image' style="margin-bottom: 10px;" required >

        <label for="genre">Жанр книги:</label>
        <select id="genre" style="margin-bottom: 10px;" name="genres"  size="3" id="" multiple required> 
            <?php foreach($genresList as $genresItem):?>
                <?php if($genresItem['id']==$booksItem['genre_id']):?>
                    <option type="text" name="<?php echo $genresItem['id'];?>" value="<?php echo $genresItem['id'];?>" style="padding: 5px;" selected>
                        <?php echo $genresItem['name_genre'];?>
                    </option>
                <?php else:?>
                    <option type="text" name="<?php echo $genresItem['id'];?>" value="<?php echo $genresItem['id'];?>" style="padding: 5px;">
                        <?php echo $genresItem['name_genre'];?>
                    </option>
                <?php endif?>
            <?php endforeach;?>
        </select>

        <label for="author">Имя автора:</label>
        <input id="author" name="name_author" type="text" value="<?php echo $booksItem['name_author'];?>" placeholder="П. Петров, И. Иванов" style="margin-bottom: 10px;padding: 10px;" required>
        <label for="name">Название книги:</label>
        <input id="name" name="name_book" type="text" value="<?php echo $booksItem['name_book'];?>" style="margin-bottom: 10px;padding: 10px;" required>
        <label for="price">Цена:</label>
        <input id="price" name="price" value="<?php echo $booksItem['price'];?>" style="margin-bottom: 10px;padding: 10px;" required>
        <label for="info">Информация о книге:</label>
        <textarea id="info" name="textarea" cols="100" rows="6" style="margin-bottom: 10px;padding: 10px;"><?php echo $booksItem['description'];?></textarea>
        <input type="submit" value="обновить даные книги" name="submit" style="width: 200px; margin: 10px;">
    </form>
</div>   
</body>
</html>

