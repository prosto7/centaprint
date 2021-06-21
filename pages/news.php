<?php session_start();
include_once("header.php"); 
include_once("../modules/classes.php");
include_once("../modules/connect.php");
    ?>
<div class="container-fluid" id="main_news_container"> 
<div class="container-fluid p-0" >  
<section class="row gx-5" id="box_for_all_news">
    <!-- колонка самая широкая -->

    <div class="col-xl-8" id="main_news">

        <?php 
$mainnews = News::getLastNews();
foreach ($mainnews as $mainnew) {
    $mainnew->drawMainNews();
}
?>

    </div>
    <div class="col-xl-3 mt-5" id="additional_news">
    <div class="container-fluid">
   
   
<?php

$news = News::getNews();
foreach ($news as $new) {
    $new->drawItemOnNewsPage();
}
?>    
       

</div>
    </div>
</section>

</div>
</div>
<script>
        $('.card__item-text').liTextLength({
            length: 200,
            afterLength: '...',
            fullText:true,
            moreText: '<br>..Показать полный текст',
            lessText: '<br>Скрыть полный текст'
        });
    </script>




<?php 
   include_once("footer.php");

//  Модальное окно !!

if (isset($_GET['id'])) {

    $news_id = ($_GET['id']);
    $link = connect();
    $new_id = mysqli_query($link, "SELECT * FROM `news` WHERE id='$news_id'");
    $new_id = mysqli_fetch_all($new_id);
    $news_id_for_draw = $new_id[0];
    echo "<script>$('.exampleModal$news_id_for_draw[0]').ready(function(){
    $('#exampleModal').arcticmodal();});</script>";
}
?>

<div style="display: none;">
    <div class="box-modal" id="exampleModal">
        <div class="box-modal_close arcticmodal-close">закрыть</div>
        <div class="container mt-5">
            <div class="row">
                <div class="container">
                    <h2><?= $news_id_for_draw[2]?></h2>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <p><?= $news_id_for_draw[5]?></p>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <?= $news_id_for_draw[3]?>
                </div>
            </div>
        </div>
        <div class="box-modal_close arcticmodal-close">закрыть</div>
    </div>
</div>