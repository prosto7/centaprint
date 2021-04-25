<?php include("connect.php");
session_start();
    include_once("classes.php");
    include_once("header.php");
    
    // форма логина
$echo = "<div class='container table'>
<div class='tale-wrapper'>
            <div class='table-title'><h4>Войти в панель администратора</h4></div>
            <div class='mb-3 table-content'>
          
                        <form method='post' id='login-form' class=''>
                        <label for='exampleInputEmail1' class='form-label'>Login</label><br>
                                      <input type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp'  name='login' required><br>
                                        <label for='exampleInputPassword1' class='form-label'>Password</label>
                                     <input type='password' placeholder='Пароль' class='form-control'
                                       name='password' required><br>
                                    <input type='submit' value='Войти' class='btn btn-primary'>
                      </form>
             </div>
</div>
</div>";



// начало формы выбора и добавления категории 2 переменные - форм и форм2 между ними запрос в БД, для вывода в селект
$form = '<form id="cat_num" action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="category">
<select name="catid" id="category">';


$form2 = '</select>
<input type="text" name="category" id="category_text" placeholder="Категория">
<input type="submit" name="add_cat" id="add_cat" class="btn btn-sm btn-primary" value="Добавить">
<input type="submit" name="del_cat" value="Удалить" value="Удалить" class="btn btn-sm btn-danger">
</label><h5 id="errorMessCat"></h5>';




$title_form = '<div class="container-fluid"> <form action="" method="post"><div class="row form-group">';



$title_form_2 = '<label for="name">Name:
        <input type="text" name="name_news" id="name_news" placeholder="Название статьи">
    </label>
    <label for="name">Описание:
        <input type="text" name="title" id="title">
    </label>
    <label for="name">Дата:
        <input type="date" name="date" id="date">
    </label>
    </div>
    <div class="row form-group">
  <label for="info">Текст статьи:
    <textarea name="info" id="info" cols="50" rows="5"></textarea>
  </label>
</div>
<input type="submit" name="add_news" id="add_news" class="btn btn-sm btn-success" value="Добавить">
</div>
</form>
</div>';

if (isset($_POST['login']) && isset($_POST['password'])) {

$users = Tools::checkUser($_POST['login'],$_POST['password']); 

}

//  если зареган, то появляется кнопка выход
if(isset($_SESSION['register'])) {


    $echo = null;

echo "<form method='post' class=''><input type='submit' class='btn btn-danger'  name='exit' id='exit' value='Exit' ></form>";

echo "<br>";

//  вывод формы с селектом
echo $form;

$pdo = Tools::connect();
$ps = $pdo->query("SELECT * FROM categories");
while ($row = $ps->fetch()) {
  echo "<option value='{$row["id"]}'>{$row['category']}</option>";
}
echo $form2;

$del_news = MyNews::changeNews();
echo $title_form;


echo $title_form_2;



// выход
if (isset($_POST['exit'])) {
    session_destroy();
}



if (isset($_POST['add_news'])) {

    $add = new MyNews(trim($_POST['name_news']),$_POST['title'], $_POST['info'], $_POST['info']);
    $add->addToDb();
    var_dump($_POST);
    // echo '<script>window.location=document.URL</script>';
} else {
    echo "error";
}

// добавление новой категории
if (isset($_POST['add_cat'])) {
    try {
    $pdo = Tools::connect();
    $ps = $pdo->prepare("INSERT INTO `categories` (`category`) VALUES (:category)");
    $ps->bindParam(':category', $category);
    $category = $_POST['category'];
    $ps->execute();
    } 
      catch (PDOException $e) {
        echo $e->getMessage();
        return false;
  }
  echo '<script>window.location=document.URL</script>';
}

//  удаление категории "DELETE FROM table WHERE id = :id"
if (isset($_POST['del_cat'])) {
    try {
    $pdo = Tools::connect();
    $ps = $pdo->prepare("DELETE FROM `categories` WHERE category = :category");
    $ps->bindParam(':category', $category);
    $category = $_POST['category'];
    $ps->execute();
    } 
      catch (PDOException $e) {
        echo $e->getMessage();
        return false;
  }
  echo '<script>window.location=document.URL</script>';

}

if (isset($_POST['del_news'])) {
    try {
    $pdo = Tools::connect();
    $ps = $pdo->prepare("DELETE FROM `main_news` WHERE id = :id");
    $ps->bindParam(':id', $id);
    $id = $_POST['news_name'];
    $ps->execute();
    var_dump($_POST['news_name']);
    } 
      catch (PDOException $e) {
        echo $e->getMessage();
        return false;
  }
  echo '<script>window.location=document.URL</script>';
}



}
?>





<!DOCTYPE html>
<html>

<head>
    <title>Админка</title>
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class='wrapper'>
        <main class='main' id='main'>
            <?php echo $echo;?>
        </main>
    </div>




</body>
</html>
