<?php include ROOT . '/views/loyouts/header.php';?>
<div class="rightside">
    <ul>
        <?php foreach ($genresList as $genresItem): ?>
            <li><a href="/bookbox/catalog/<?php echo $genresItem['id'];?>"><?php echo $genresItem['name_genre'];?></a></li>
        <?php endforeach;?>
    </ul>
</div>

    <div class="nav">

        <div class="book-container">

            <div class="book">
                <div class="book-img">
                    <a href="/bookbox/books/<?php echo $booksItem["id"]?>">
                        <?php echo '<img src="\bookbox/assets/img/'.$booksItem["image"].'" title="'.$booksItem["name_book"].'">' ;?>
                    </a>
                </div>
                <div class="book-info">

                    <a href="/bookbox/author/<?php echo $booksItem["author_id"]?>" style="text-decoration: none; color: black;">
                        <h3 class="book-author"><?php echo $booksItem['name_author'];?></h3>
                    </a>

                    <h3 class="book-name"><?php echo $booksItem['name_book'];?></h3>
                    <p class="book-price"><?php echo $booksItem['price'];?>$</p>
                    <br>
                    <a href="/bookbox/buyform/<?php echo $booksItem["id"]?>" class="buy-button">buy now</a>
                  
                </div>
            </div>

            <h2>Описание книги</h2>
            <div class="fullbook-description">
                <p class="idbook-description"><?php echo $booksItem['description'];?></p>
            </div>
            
        </div>
    </div>

<?php include ROOT . '/views/loyouts/footer.php';?>


                