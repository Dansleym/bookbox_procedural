<?php 
    if (isset($_POST['submit'])) {
        $to = "dansleymeplz@gmail.com";
        $from = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $surname = $_POST['surname'];
        $copies = $_POST['copies'];
        $subject = "Form submission";
        $message = "Имя: " .$first_name . "\nФимилия: " . $last_name . "\nОтчество: ". 
        $surname . "\n\nКод книги: ". $booksItem["id"] . "\nКоличество экземпляров: ". $copies; 
        $headers = "From:" . $from;
        $headers2 = "From:" . $to;
        mail($to,$subject,$message,$headers);
        echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
        // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>

<?php include ROOT . '/views/loyouts/header.php';?>

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
    width: 300px;
    display: flex;
    flex-direction: column;
}
form input{
    width: 100%;
    height: 40px;
}
.buyform{
    min-height: 500px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
</style>


   <div class="buyform" style="background: #EAEAEA;">
            <h2>Оформление заказа</h2>
            <div class="book" style="">
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
               
                </div>
            </div>

            <form action="" method="post">
                <label for="copies">Количество экземпляров:</label>
                <input type="number" id="copies" name="copies" value="1"><br>

                <label for="first_name">Имя:</label>
                <input type="text" id="first_name" name="first_name"><br>
                <label for="last_name">Фамилия:</label>
                <input type="text" id="last_name" name="last_name"><br> 
                <label for="surname">Отчество:</label>
                <input type="text" id="surname" name="surname"><br>

                <label for="address">Адрес:</label>
                <input type="text" id="address" name="address"><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email"><br>
                <input type="submit" value="submit" name="submit" style="border: none;background: #C50023;border-radius: 3px;color: white;font-weight: bold;text-transform: uppercase;margin-top: 30px;">
            </form>
   </div>


<?php include ROOT . '/views/loyouts/footer.php';?>