<?php include_once("header.php"); 
    include_once("classes.php");

    ?>

<div class="container-fluid m-5">
<div class="row">
<!-- колонка самая широкая -->
<div class="col-6" id="main_news">
<?php 
$mainnews = News::getLastNews();

foreach ($mainnews as $mainnew) {
    $mainnew->drawMainNews();
}

?>
</div>

<div class="col-5">
<div class="row">
<?php
$news = News::getNews();

foreach ($news as $new) {
    $new->drawItem();
}

?>
</div>
<!-- 
<div class="row"></div>
<div class="row"></div> -->
</div>

</div>
</div>

