<?php
    define('ROOT', dirname(__FILE__));

    require('../../data/genres.php');
    $genresList = getGenresList();

    require('../../data/books.php');
    $booksList = getBooksListById($_GET['author_id']);
    $authorsItem = getBooksItemByAuthor($_GET['author_id']);
?>

<?php include ROOT . '/../loyouts/header.php';?>

    <div class="rightside">
        <ul>
            <?php foreach($genresList as $genresItem):?>
                <li><a href="/views/catalog/?category=<?php echo $genresItem['id'];?>"><?php echo $genresItem['name_genre'];?></a></li>
            <?php endforeach;?>
        </ul>
    </div>

    <div class="nav">
        <div class="book-container">
        <h2><?php echo $authorsItem['name_author'];?></h2>
        <?php if($authorsItem['information']):?>
            <div class="fullbook-description">
                <p class="idbook-description"><?php echo $authorsItem['information'];?></p>
            </div>
        <?php else: ?>
            <h3>Информация об авторе отсутствует...</h3><br>
        <?php endif;?>
        
        <?php foreach($booksList as $booksItem):?>
                <div class="book">
                    <div class="book-img">
                        <a href="/views/books/?book_id=<?php echo $booksItem["id"]?>">
                            <?php echo '<img src="../../assets/img/'.$booksItem["image"].'" title="'.$booksItem["name_book"].'">' ;?>
                        </a>
                    </div>
                <div class="book-info">
                      
                        <?php if($_GET['author_id']==$authorsItem['id']):?>
                            <h3 class="book-author"><?php echo $authorsItem['name_author'];?></h3>
                        <?php endif;?>
                   
                    <a href="/views/books/?book_id=<?php echo $booksItem["id"]?>" style="text-decoration: none;">
                        <h3 class="book-name"><?php echo $booksItem['name_book'];?></h3>
                    </a>
                    <p class="book-price"><?php echo $booksItem['price'];?>$</p>
                    <p class="book-description"><?php echo $booksItem['description'];?></p>
                  
                  <a href="/views/books/?book_id=<?php echo $booksItem["id"]?>" style="text-decoration: none;"> Читать&nbsp;далее&nbsp;»</a>
                </div>
            </div>
        <?php endforeach;?>
    </div>

<?php include ROOT . '/../loyouts/footer.php';?>


                