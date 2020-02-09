<?php
    require('../../data/books.php');
    require('crud.php');
    $booksList = getBooksList();

    if (count($_POST) > 0) {
        delBook($_POST['id']);
        echo "<meta http-equiv='refresh' content='0'>";
        echo "submit success";
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/css/main.css">

    <title>Admin panel</title>
</head>
<body>
    <a href="/" style="position: absolute; color: black; font-size: 20px; left: 200px;">На главную</a>
    <a href="/views/admin/addbook.php" style="position: absolute; color: black; font-size: 20px;right: 200px;">Добавить книгу</a>
    <h3 style="margin: 0 auto;width: 200px;color: red;">Админ панель</h3>
    <div style="display:flex; justify-content: center; padding-bottom: 100px;">
        
        <form action=""  method="POST">
            <ul style="padding: 0;">
                <li style="display: flex; border-bottom: 2px solid black; width: 850px;">
                    <div style="width: 26px;"><a href=""></a></div>
                    <div style="width: 200px; padding: 10px;">Автор:</div>
                    <div style="width: 200px; padding: 10px;">Книга:</div>
                    <div style="width: 100px; padding: 10px;">Цена:</div>
                    <div style="width: 50px; padding: 10px;">Код:</div>
                    <div style="width: 140px; padding: 10px;"><a href=""></a></div>
                    <div style="width: 80px;"><a href=""></a></div>
                </li>

                <div class="adminlist">
                <?php foreach($booksList as $booksItem):?>
                    
                        <li style="display: flex; width: 850px;">
                            <?php echo '<img style="width: 24px; height: 45px;margin-left: 2px;" src="../../assets/img/'.$booksItem["image"].'">' ;?>
                            <div style="width: 200px; padding: 10px;"><?php echo $booksItem['name_author'];?></div>
                            <div style="width: 200px; padding: 10px;"><?php echo $booksItem['name_book'];?></div>
                            <div style="width: 100px; padding: 10px;"><?php echo $booksItem['price'];?>$</div>
                            <div style="width: 50px; padding: 10px;"><?php echo $booksItem['id'];?></div>
                            <div title='update' style="width: 140px; padding: 10px;">
                                <a href="/views/admin/updbook.php?id=<?php echo $booksItem['id'];?>" style="text-decoration: none;">
                                    редактировать
                                </a>
                            </div>
                            <div title='delete' style="padding: 10px;">
                                <button data-role="delete" data-id="<?php echo $booksItem['id'];?>"  data-name="<?php echo $booksItem['name_book'];?>"
                                        style="cursor: pointer;border: none; background-color: transparent;color: red;"
                                        type="button" data-toggle="modal" data-target="#exampleModalCenter">
                                    удалить
                                </button>
                            </div>
                        </li>   
                    
                <?php endforeach;?>
                </div>    
            </ul>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Вы уверенны что хотите удалить книгу?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><input type="text" name="id" id="book_id" style="display: none;"></p>
                            <p style="font-size: 1.5em; color: #c50023;" id="book_name"></p>
                        </div>  
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Назад</button>
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </div>
                        </div>
                    </div>
                </div>
        </form>

    </div>

    <!--SCRIPTS-->
    <script src="../../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/main.js"></script>
</body>
    <script>
        $(document).ready(function(){
            $(document).on('click', 'button[data-role=delete]', function(){
                var id = $(this).data('id');
                var name = $(this).data('name');
                $('#book_id').val(id);
                $('#book_name').html(name);
            })
        });
    </script>
</html>