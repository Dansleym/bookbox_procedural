<?php
    define('ROOT', dirname(__FILE__));

    require('../../data/genres.php');
    $genresList = getGenresList();

    require('../../data/books.php');
    $booksItem = getBooksItemById($_GET['book_id']);
?>

<?php include ROOT . '/../loyouts/header.php';?>
<div class="rightside">
    <ul>
        <?php foreach ($genresList as $genresItem): ?>
            <li><a href="/views/catalog/?category=<?php echo $genresItem['id'];?>"><?php echo $genresItem['name_genre'];?></a></li>
        <?php endforeach;?>
    </ul>
</div>

    <div class="nav">

        <div class="book-container">

            <div class="book">
                <div class="book-img">
                    <?php echo '<img src="../../assets/img/'.$booksItem["image"].'" title="'.$booksItem["name_book"].'">' ;?>
                </div>
                <div class="book-info">

                    <a href="/views/books/author.php?author_id=<?php echo $booksItem["author_id"]?>" style="text-decoration: none; color: black;">
                        <h3 class="book-author"><?php echo $booksItem['name_author'];?></h3>
                    </a>

                    <h3 class="book-name"><?php echo $booksItem['name_book'];?></h3>
                    <p class="book-price"><?php echo $booksItem['price'];?>$</p>
                    <br>
                    <a href="/views/buyform?id=<?php echo $booksItem["id"]?>" class="buy-button">КУПИТЬ</a>
                  
                </div>
            </div>

            <h2>Описание книги</h2>
            <div class="fullbook-description">
                <p class="idbook-description"><?php echo $booksItem['description'];?></p>
            </div>
            
        </div>
    </div>

<?php include ROOT . '/../loyouts/footer.php';?>


                