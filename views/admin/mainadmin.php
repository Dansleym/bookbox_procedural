<?php
    require('../../data/books.php');
    $booksList = getBooksList();

    if (count($_POST) > 0) {
        Admin::delBook($_POST['id']);
        echo "submit success";
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bookbox/assets/css/main.css">
    <title>Admin panel</title>
</head>
<body>
<a href="/bookbox" style="position: absolute; color: black; font-size: 20px; left: 200px;">На главную</a>
<a href="/views/admin/addbook.php" style="position: absolute; color: black; font-size: 20px;right: 200px;">Добавить книгу</a>
<div style="display:flex; justify-content: center;">
<form action=""  method="POST">
<ul style="padding: 0;">
    <li style="display: flex; border-bottom: 2px solid black; width: 850px;">
        <div style="width: 200px; padding: 10px;">Автор:</div>
        <div style="width: 200px; padding: 10px;">Книга:</div>
        <div style="width: 100px; padding: 10px;">Цена:</div>
        <div style="width: 50px; padding: 10px;">Код:</div>
        <div style="width: 140px; padding: 10px;"><a href=""></a></div>
        <div style="width: 80px;"><a href=""></a></div>
    </li>

    <?php $i = 0;?>
    <?php foreach($booksList as $booksItem): $i++;?>

        <?php if($i%2 == 0):?>        
            <li style="display: flex; width: 850px;background: #eaeaea;">
                <div style="width: 200px; padding: 10px;"><?php echo $booksItem['name_author'];?></div>
                <div style="width: 200px; padding: 10px;"><?php echo $booksItem['name_book'];?></div>
                <div style="width: 100px; padding: 10px;"><?php echo $booksItem['price'];?>$</div>
                <div style="width: 50px; padding: 10px;"><?php echo $booksItem['id'];?></div>
<div title='update' style="width: 140px; padding: 10px;"><a href="/views/admin/updbook.php?id=<?php echo $booksItem['id'];?>" style="text-decoration: none;">редактировать</a></div>
                <div title='delete' style="padding: 10px;"><button style="cursor: pointer;border: none; background-color: transparent;color: red;" type="submit" name="id" value="<?php echo $booksItem['id'];?>">удалить</button></div>
            </li> 
        <?php else:?> 
            <li style="display: flex; width: 850px;background: white;">
                <div style="width: 200px; padding: 10px;"><?php echo $booksItem['name_author'];?></div>
                <div style="width: 200px; padding: 10px;"><?php echo $booksItem['name_book'];?></div>
                <div style="width: 100px; padding: 10px;"><?php echo $booksItem['price'];?>$</div>
                <div style="width: 50px; padding: 10px;"><?php echo $booksItem['id'];?></div>
                <div title='update' style="width: 140px; padding: 10px;"><a href="/views/admin/updbook.php?id=<?php echo $booksItem['id'];?>" style="text-decoration: none;">редактировать</a></div>
                <div title='delete' style="padding: 10px;"><button style="cursor: pointer;border: none; background-color: transparent;color: red;" type="submit" name="id" value="<?php echo $booksItem['id'];?>">удалить</button></div>
            </li> 
        <?php endif;?>
        
    <?php endforeach;?>    
</ul>
</form>

</div>

</body>
</html>