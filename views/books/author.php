<?php include ROOT . '/views/loyouts/header.php';?>

    <div class="rightside">
        <ul>
            <?php foreach($genresList as $genresItem):?>
                <li><a href="/bookbox/catalog/<?php echo $genresItem['id'];?>"><?php echo $genresItem['name_genre'];?></a></li>
            <?php endforeach;?>
        </ul>
    </div>

    <div class="nav">
        <div class="book-container">
        <h2><?php echo $authorsList['name_author'];?></h2>
        <?php if($authorsList['information']):?>
            <div class="fullbook-description">
                <p class="idbook-description"><?php echo $authorsList['information'];?></p>
            </div>
        <?php else: ?>
            <h3>Информация об авторе отсутствует...</h3><br>
        <?php endif;?>
        
        <?php foreach($booksList as $booksItem):?>
                <div class="book">
                    <div class="book-img">
                        <a href="/bookbox/books/<?php echo $booksItem["id"]?>">
                            <?php echo '<img src="\bookbox/assets/img/'.$booksItem["image"].'" title="'.$booksItem["name_book"].'">' ;?>
                        </a>
                    </div>
                <div class="book-info">
                    <a href="/bookbox/author/<?php echo $id;?>" style="text-decoration: none; color: black;">    
                        <?php if($booksItem['author_id']==$authorsList['id']):?>
                            <h3 class="book-author"><?php echo $authorsList['name_author'];?></h3>
                        <?php endif;?>
                    </a>
                    <a href="/bookbox/books/<?php echo $booksItem["id"]?>" style="text-decoration: none;">
                        <h3 class="book-name"><?php echo $booksItem['name_book'];?></h3>
                    </a>
                    <p class="book-price"><?php echo $booksItem['price'];?>$</p>
                    <p class="book-description"><?php echo $booksItem['description'];?></p>
                  
                  <a href="/bookbox/books/<?php echo $booksItem["id"]?>" style="text-decoration: none;"> Читать&nbsp;далее&nbsp;»</a>
                </div>
            </div>
        <?php endforeach;?>
    </div>

<?php include ROOT . '/views/loyouts/footer.php';?>


                