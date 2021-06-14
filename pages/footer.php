<?php
if ( is_session_started() === FALSE ) session_start();

include_once($_SERVER['DOCUMENT_ROOT'] . '/modules/classes.php');

?>

<div id="footer_line" class="container-fluid p-0">
    <div class="row">
        <div class="col-md-6 footer">
            <a class="navbar-brand " img="" href="#"><img class="brand_img ml-3" src="/img/1234.png" alt=""></a>
            <img src="/img/432.png" alt="">
        </div>
        <div id="footer_menu" class="m-auto">
            <ul id="bottom_window" class="nav nav-pills nav-fill ">
                <li class="nav-item"><a href="/" class="nav-link">О компании</a></li>
                <li class="nav-item"><a href="/pages/services.php" class="nav-link">Услуги</a></li>
                <li class="nav-item"><a href="/pages/news.php" class="nav-link">Новости</a></li>
                <li class="nav-item"><a href='/pages/recvizit.php' class="nav-link">Реквизиты</a></li>
                
                <?php   
                   if(isset($_SESSION['register'])) {

                echo "<li class='nav-item'><a href='../pages/out.php' class='nav-link'>Выйти</a></li>";
                echo ' </ul>';
                }
                else {
                    echo "<li class='nav-item'><a href='../pages/admin.php' class='nav-link'>Войти</a></li>";
                    echo ' </ul>';
                }
                ?>
            
        </div>
    </div>
</div>