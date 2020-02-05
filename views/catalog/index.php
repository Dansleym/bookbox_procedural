<?php include ROOT . '/views/loyouts/header.php';?>

<div class="rightside">
    <ul>
        <?php foreach($genresList as $genresItem):?>
            <li><a href="/bookbox/catalog/<?php echo $genresItem['id'];?>/page-1"><?php echo $genresItem['name_genre'];?></a></li>
        <?php endforeach;?>
    </ul>
</div>

    <div class="nav">
        <h2>Общий каталог</h2>

        <div class="book-container"> 

        <?php foreach($catalogList as $catalogItem):?>
            
            <div class="book">
                <div class="book-img">
                    <a href="/bookbox/books/<?php echo $catalogItem["id"]?>">
                        <?php echo '<img src="\bookbox/assets/img/'.$catalogItem["image"].'" title="'.$catalogItem["name_book"].'">' ;?>
                    </a>
                </div>
                <div class="book-info">

                    <a href="/bookbox/author/<?php echo $catalogItem["name_author"]?>" style="text-decoration: none; color: black;">
                                                
                        <h3 class="book-author"><?php echo $catalogItem['name_author'];?></h3>

                    </a>

                    <a href="/bookbox/books/<?php echo $catalogItem["id"]?>" style="text-decoration: none;">

                        <h3 class="book-name"><?php echo $catalogItem['name_book'];?></h3>

                    </a>

                    <p class="book-price"><?php echo $catalogItem['price'];?>$</p>
                    <p class="book-description"><?php echo $catalogItem['description'];?></p>
                  
                  <a href="/bookbox/books/<?php echo $catalogItem["id"]?>" style="text-decoration: none;"> Читать&nbsp;далее&nbsp;»</a>
                </div>
            </div>
        <?php endforeach;?>

        </div>
    </div>
    
    <?php echo $pagination->get(); ?>

<?php include ROOT . '/views/loyouts/footer.php';?>


                