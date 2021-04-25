<?php
    include_once('connect.php');
    function handleError($errno, $errstr, $errfile, $errline, array $errcontext)
    {
        // error was suppressed with the @-operator
        if (0 === error_reporting())
        {
            return false;
        }
        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    }
    set_error_handler('handleError');

class Tools 
{
    static function connect($host="127.0.0.1", $user='root', $pass='', $dbname='print') 
    {
        // PDO (PHP data object) - механизм взаимодйствия с СУБД(система управления базами данных)
        // PDO - позволяет облегчить рутинные задачи при выполнении запросов и содержит защитные механизмы при работе с СУБД
        // определим DSN(Data source name) - сведения для подключения к БД.
        $cs = "mysql:host=$host;dbname=$dbname;charset=utf8";

        // массив опций для создания PDO
        $options = 
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
        ];

        try 
        {
            $pdo = new PDO($cs, $user, $pass, $options);
            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    static function checkUser($login, $password ) 
    {
        try 
        {
            $pdo = Tools::connect();
            $ps = $pdo->prepare("SELECT COUNT(*) FROM `roles` WHERE `login` = :login AND `pass` = :password;");
            $ps->bindParam(':login', $login);
            $ps->bindParam(':password', $password);       
            $ps->execute();
            $row_count = $ps->fetchColumn();

            if ($row_count == 1) 
            {
                $result=true;
                echo "<h5 class='text-success'>Вход выполнен</h5>";
                $_SESSION['register'] = $login;
                
                               
                return true;
                
            }
            else 
            {
                $result=false;
                echo "<h5 class='text-danger'>Вход невыполнен</h5>";   
                return false;
            }

        }
        catch(PDOException $e) { die("Secured"); }
        $ps = null;
        $pdo = null;
        return $result;   
    }
}



class News {
   
        public $id;
        public $newsname;
        public $info;
        public $imagepath;
        public $newdate;
        

    function __construct($newsname, $info, $imagepath,
    $newdate, $id=0 ) {
        $this->id=$id;
        $this->newsname=$newsname;
        $this->info=$info;
        $this->imagepath=$imagepath;
        $this->newdate=$newdate;
        
        }
        // static function fromDb($id) {
        //     try {
        //         $pdo = Tools::connect();
        //         $ps = $pdo->prepare("SELECT * FROM news WHERE id=?");  // ? - 
        //         $ps->execute([$id]);
        //         $row = $ps->fetch();
        //         $new = new News($row['id'],$row['newsname'],$row['info'],$row['imagepath'],$row['newdate']); 
        //         return $new;
        //     } catch (PDOException $e) {
        //         echo $e->getMessage();
        //         return false;
        
        //     }
        //     }
    static function getNews() {

        try {

                $pdo = Tools::connect();
                // если категория не выбрана на странице саталог то выбираем все товары
                $ps = $pdo->query("SELECT * FROM news");
                while ($row=$ps->fetch()) {
                $new = new News($row['newsname'],$row['info'],$row['imagepath'],$row['newdate']); 
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
       
        echo '<div class="col mb-5 ">';
        echo '<div class="card cart_news" style="width: 20rem; position: relative; ">';
        echo "<img class='card-img-top picture' src='{$this->imagepath}' alt=''>";
        echo '   <div class="card-body">';
        echo "<h5 class='card-title'>$this->newsname</h5>";
        echo "<p class='card-text lead'>$this->info</p>";
        echo '<a style="position: absolute; bottom: 0px;" href="https://xn--80ajghhoc2aj1c8b.xn--p1ai/info/" class="btn btn_news">Подробнее</a>';
        echo '    </div>';
        echo '    </div>';
        echo '    </div>';

      

    
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
        LIMIT 2");
        while ($row=$ps->fetch()) {
        $mainnew = new News($row['newsname'],$row['info'],$row['imagepath'],$row['newdate']); 
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
    echo '<div class="container mb-5">';
    echo '<div class="card cart_news" >';
    echo '<div class="card cart_back"  style="position:relative;">';
    echo "<img class='card-img-top picture'  style='max-height: 400px; object-fit: cover;' src='../{$this->imagepath}' alt=''>";
    echo '<div class="card_wrapper"  style="background-color:black; position:absolute; min-height:100%; min-width:100%; opacity:0.25">';
    echo '    </div>';
    echo '    </div>';
    echo "<h5 class='card-title'style='position:absolute; font-size:36px;top:60%; left:10%; width:80%;color:white' >$this->newsname</h5>";  
    echo '    </div>';
    echo '    </div>';
}


}


class MyNews {


    public $id;
    public $name;
    public $title;
    public $about;
    public $date;
    public $imagepath;

function __construct($name, $title, $about,
$date, $imagepath=0,$id=0) {

    $this->name=$name;
    $this->title=$title;
    $this->about=$about;
    $this->date=$date;
    $this->imagepath=$imagepath;
    $this->id=$id;
    }

static function changeNews() {


    echo '<form id="cat_num" action="" method="post" enctype="multipart/form-data">';
    echo '<div class="form-group"><label for="category"><select name="news_name" id="news_name">';

    $pdo = Tools::connect();
    $ps = $pdo->query("SELECT * FROM main_news");
    while ($row = $ps->fetch()) {
    echo "<option value='{$row["id"]}'>'{$row["name"]}'</option>";
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
                $ps = $pdo->prepare("INSERT INTO main_news (name,title,about,date,imagepath) VALUES (:name,:title,:about,:date,:imagepath)");  // ? - 
                $ar = (array)$this; // $ar = [:name,:title,:about,:date,:imagepath]
                array_shift($ar);
                $ps->execute($ar);

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
        
            }
            }


}

?>