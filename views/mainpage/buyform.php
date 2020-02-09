<?php 
    define('ROOT', dirname(__FILE__));
    require('../../data/genres.php');
    $genresList = getGenresList();

    require('../../data/books.php');
    $booksItem = getBooksItemById($_GET['id']);

    if (isset($_POST['submit'])) {
        $to = "dansleymeplz@gmail.com";
        $from = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $surname = $_POST['surname'];
        $copies = $_POST['copies'];
        $address = $_POST['address'];
        
        $subject = "Form submission";
        $message = "Имя: " .$first_name . "\nФимилия: " . $last_name . "\nОтчество: ". 
        $surname . "\n\nКод книги: ". $booksItem["id"] . "\nКоличество экземпляров: ". $copies . "\nАдрес покупателя: ". $address; 
        $headers = "From:" . $from;
        $headers2 = "From:" . $to;
        mail($to,$subject,$message,$headers);
        echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
        // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>

<?php include ROOT . '/../loyouts/header.php';?>

<style>
.App {
  display: grid;
  grid-template-areas:
    "h h"
    "n n"
    "b b";
  grid-auto-columns: 12fr 0fr;
  
}
form{
    display: flex;
    flex-direction: column;
}
form input{
    width: 100%;
    height: 35px;
}
.buyform{
    min-height: 500px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.name{
    width: 200px;
}
.name:nth-child(2){
    margin-left: 8px;
    margin-right: 8px;
}
</style>


   <div class="buyform" style="background: #EAEAEA;">
            <h2>Оформление заказа</h2>
            <div class="book" style="width: 500px;">
                <div class="book-img" style="width: 30%;">
                    <a href="/views/books/?book_id=<?php echo $booksItem["id"]?>">
                        <?php echo '<img src="../../assets/img/'.$booksItem["image"].'" title="'.$booksItem["name_book"].'">' ;?>
                    </a>
                </div>
                <div class="book-info">
                    <h3 class="book-author"><?php echo $booksItem['name_author'];?></h3>
                    <h3 class="book-name"><?php echo $booksItem['name_book'];?></h3>
                    <p class="book-price"><?php echo $booksItem['price'];?>$</p>              
                </div>
            </div>

            <form action="" method="post">

<div style="display: flex; margin-bottom: 5px;">
    <div class="name">
        <label for="first_name">Имя:</label>
        <input type="text" id="first_name" name="first_name">
    </div>
    <div class="name">
        <label for="last_name">Фамилия:</label>
        <input type="text" id="last_name" name="last_name">
    </div>
    <div class="name">
    <label for="surname">Отчество:</label>
        <input type="text" id="surname" name="surname">
    </div>               
</div>
                

                <label for="copies">Количество экземпляров:</label>
                <input type="number" id="copies" name="copies" value="1" style="margin-bottom: 5px;">

                <label for="address">Адрес:</label>
                <input type="text" id="address" name="address" style="margin-bottom: 5px;">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <input type="submit" value="купить" name="submit" style="border: none;background: #C50023;border-radius: 3px;color: white;font-weight: bold;text-transform: uppercase;margin-top: 30px;margin-bottom: 30px;">
            
            </form>
   </div>


   <?php include ROOT . '/../loyouts/footer.php';?>