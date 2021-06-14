<?php session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . '/modules/connect.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/modules/classes.php');
include_once("header.php");

    $product_id = $_GET['id'];
    $link = connect();
    $product = mysqli_query($link, "SELECT * FROM `news` WHERE `id` = '$product_id'");
    $product = mysqli_fetch_assoc($product);


?>


<div style="margin-top: 150px" class="container">
    <h3>Update News</h3>
    <form class="form-group" action="" enctype="multipart/form-data" method="post">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <label for="update_theme">Тема Новости</label>
        <input  id="update_theme" class="form-control" type="text" name="newsname" value="<?= $product['newsname'] ?>">
        <label for="update_desc">Описание новости</label>
        <textarea id="update_desc" class="form-control" name="info"><?= $product['info'] ?></textarea>
        <label for="update_date">Дата</label>
        <input  id="update_date"  class="form-control" type="date" name="date" value="<?= $product['newdate'] ?>">   
        <br>
        <div> Картинка новости</div>
        <img class='card-img-top picture' style="width:20vw" src='/<?=$product['imagepath'] ?>' alt=''>
        <br>
        <br>
        <input id="update_img" type="file" accept="image/*" name="imagepath" value="<?=$product['imagepath'] ?>">
        <br>
        <br>
       
        <br> <br>
        <button type="submit" name="update_news" class="btn btn-info">Update</button>
        <button type="submit" class="btn btn-danger">Cancel</button>
    </form>
    </div>

    <?php 
        var_dump($product['imagepath']);
    include_once("footer.php");
    
    if (isset($_POST['update_news'])) 
    {
        if(!empty($_FILES)) {
            $path = "../img/news/".$_FILES['imagepath']['name'];
            move_uploaded_file($_FILES['imagepath']['tmp_name'], $path);
           
        } else {
           
        }
        $add = new News(trim($_POST['newsname']),$_POST['info'],$path,$_POST['date'],$_POST['id']);
        $add->updateToDb();
        echo '<script>window.location="../index.php"</script>';
    
    }  
    ?>




