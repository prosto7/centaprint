<?php

$root = $_SERVER['DOCUMENT_ROOT'] . '/new_site/';
// $main_path = 'http://localhost/new_site/';

include_once "config.php";
class News {
        public $id;
        public $newsname;
        public $info;
        public $imagepath;
        public $newdate;
    function __construct($newsname, $info, $imagepath,
    $newdate, $id) {
        $this->id=$id;
        $this->newsname=$newsname;
        $this->info=$info;
        $this->imagepath=$imagepath;
        $this->newdate=$newdate;   
        }

    static function getNews() {
        try {
                $pdo = Tools::connect();
                // если категория не выбрана на странице саталог то выбираем все товары
                $ps = $pdo->query("SELECT * FROM news ORDER BY id DESC LIMIT 4,10");
                while ($row=$ps->fetch()) {
                $new = new News($row['newsname'],$row['info'],$row['imagepath'],$row['newdate'],$row['id']); 
                // создадим массив экземпляров класса new
                // $news[]=$new;
                $news[] = $new;
            }
                return  $news;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    } 

static function updateToDb() {
    $newsname= $_POST["newsname"];
    $info = $_POST["info"];
    $imagepath = "img/news/".$_FILES['imagepath']['name'];
    $newdate = $_POST["date"];
    $id = $_POST['id'];

    $pdo = Tools::connect();
    $sql = "UPDATE `news` SET `newsname`=:newsname, `info`=:info, `imagepath`=:imagepath, `newdate`=:newdate WHERE `id`=:id";

                    $stmt= $pdo->prepare($sql);
                    $stmt->bindParam(':newsname', $newsname);
                    $stmt->bindParam(':info', $info);
                    $stmt->bindParam(':imagepath', $imagepath);
                    $stmt->bindParam(':newdate', $newdate);
                    $stmt->bindParam(':id', $id);
                    $stmt->execute(); 


}

static function getFourNews($id=0) {
        try {

                $pdo = Tools::connect();
                // если категория не выбрана на странице саталог то выбираем все товары
                $ps = $pdo->query("SELECT * FROM news LIMIT 4");
                while ($row=$ps->fetch()) {
                $new = new News($row['newsname'],$row['info'],$row['imagepath'],$row['newdate'],$row['id']); 
                // создадим массив экземпляров класса item
                // $news[]=$new;
                $news[] = $new;
            }
                return  $news;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    } 
    function drawItem()
    { 
      
        echo '<div class="col-md-3 col-xs-3 col">';
        if (isset($_SESSION['register']))
        {  
            echo "<div style='border: solid 1px gray;'>";
            echo "<a  role='button' class='btn btn-warning m-1' href='/pages/update.php?id={$this->id}'>Редактировать</a>"; 
        }
        else {
        }
        echo "<a class='card-body_href' href='/pages/news.php?id={$this->id}'>";
        echo '   <div class="container-fluid card-body p-0">';
      
        echo "<img class='card-img-top picture' src='{$this->imagepath}' alt=''>";
      
        echo "<div class='text_block'><h5 class=''>$this->newsname</h5></div>";
        echo "<p class='card-text lead'>$this->info</p>";
        echo "<a href='/pages/news.php?id={$this->id}' class='btn_news'>Подробнее</a>";
  
        echo '    </div>';
       
        echo '    </div>';
        echo ' </a>';
       
        if (isset($_SESSION['register']))
        {  
        echo ' </div>';
        }
        else {

        }
    // }
     
    }
    function drawItemOnNewsPage()
    {
   
      
        echo '<div class="row vh-100 mb-3 card cart__news-mini">';
//    echo "<img class='card-img-top picture' src='{$this->imagepath}' alt=''>";
        echo '<div class="col cart__item">';
        echo "<a href='news.php?id={$this->id}' class='exampleModal{$this->id}'>";
        echo "<h5 class='card__item-title'>$this->newsname</h5>";
        echo '</a>'; 
        echo "<img src='../{$this->imagepath}' alt=''>";
        // echo "<h5 class='card__item-name'>$this->newsname</h5>";
        echo "<p class='card__item-text mt-2'>$this->info</p>";
        echo '</div>';

        echo '</div>';
   
         
    }
    function drawItemInfo() {
       echo '<div class="container-fluid item_info">';
       echo '<div class="name_item row p-2 bd-highlight mt-1 bg-light ">';
       echo "<h3>$this->itemname</h3>";
       echo '</div>';
       echo "<div class='d-flex justify-content-center p-2 bd-highlight item-card__img mt-5 row'>";
       echo "<img src='{$this->imagepath}' alt='image' class='img-fluid'>";
       echo '</div>';
       echo  "<div class='item_article container'><p>$this->info</p></div>";
       echo '</div>';
    }
static function getLastNews () {
    try {
        $pdo = Tools::connect();
        // если категория не выбрана на странице саталог то выбираем все товары
        $ps = $pdo->query("SELECT * FROM news ORDER BY id DESC 
        LIMIT 4 ");
        while ($row=$ps->fetch()) {
        $mainnew = new News($row['newsname'],$row['info'],$row['imagepath'],$row['newdate'],$row['id']); 
        // создадим массив экземпляров класса item
        // $news[]=$new;
        $mainnews[] = $mainnew;
    }
        return  $mainnews;
} catch (PDOException $e) {
    echo $e->getMessage();
    return false;
}
}

   static function getIdParameterNews() {
        try {
            $pdo = Tools::connect();
            $stmt = $pdo->prepare("SELECT id FROM news WHERE id=:id");
            $stmt->execute(array(':id'));
            while ($id=$stmt->fetchColumn($id)){
                $mainnew = new News($row['id']); 
                // создадим массив экземпляров класса item
                // $news[]=$new;
                $mainnews[] = $mainnew;
            }
            return  $mainnews;

    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
    }


function drawMainNews() {

    echo '<div class="card cart__news m-md-5" >';
    echo "<a href='news.php?id={$this->id}' class='exampleModal{$this->id}'>
    <div class='card cart__back' style='position:relative;'>";
    echo "<img class='main_card_img'   src='../{$this->imagepath}' alt=''>";
    echo '<div class="card_wrapper"  style="background-color:black; position:absolute; min-height:100%; min-width:100%; opacity:0.25">';
    echo '    </div>';
    echo '    </div></a>';
    echo "<h4 class='title'>$this->newdate</h4>"; 
    echo "<h5 class='card-title'>$this->newsname</h5>";  
    echo '    </div>';
 
    
}
}
// класс в блоке news 
class MyNews extends News {
    function __construct($newsname ,$info,$imagepath,
$newdate ) {
    // $this->category=$category;
    $this->newsname=$newsname;
    $this->info=$info;
    $this->imagepath=$imagepath;
    $this->newdate=$newdate;

    }
static function changeNews() {
    echo '<form id="cat_num" action="" method="post" enctype="multipart/form-data">';
    echo '<div class="form-group"><label for="category"><select name="news_name" id="news_name">';
    $pdo = Tools::connect();
    $ps = $pdo->query("SELECT * FROM news");
    while ($row = $ps->fetch()) {
    echo "<option value='{$row["id"]}'>'{$row["newsname"]}'</option>";
    }
    echo '</select>';
    echo '<input type="submit" name="del_news" value="Удалить" value="Удалить" class="btn btn-sm btn-danger">';
    echo '</div>';
    echo '</form>';
    echo '<br>';
}
            function addToDb() {
                try {
                    $pdo = Tools::connect();
                    $ps = $pdo->prepare("INSERT INTO news (newsname,info,imagepath,newdate)
                    VALUES (:newsname,:info,:imagepath,:newdate)"); 
                    $add = (array)$this;
                    array_shift($add);       
                    $ps->execute($add);       
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
            }



            static function getLastNews () {
                try {
                    $pdo = Tools::connect();
                    
                    // если категория не выбрана на странице саталог то выбираем все товары
                    $ps = $pdo->query("SELECT * FROM news ORDER BY id DESC 
                    LIMIT 3");
                    while ($row=$ps->fetch()) {
                    $mainnew = new MyNews($row['newsname'],$row['info'],$row['imagepath'],$row['newdate'],$row['id']); 
                    // создадим массив экземпляров класса item
                    // $news[]=$new;
                    $mainnews[] = $mainnew;
                }

                    return  $mainnews;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            }
        

}
?>