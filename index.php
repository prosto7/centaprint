<?php

    
include_once ("pages/classes.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="yandex-verification" content="e8460790715d608e" />
    <meta name="description" content="Маркировка по честному знаку. Печать цветных этикеток с кодом DataMatrix. Услуги по маркировке молочной продукции, одежды и других товаров попадающих под обязательную маркировку."> 
    <meta name="Keywords" content="честный знак, маркировка, этикетка, печать этикеток, принтер этикеток, маркировка молочной продукции"> 
    <title>CentaPrint - инновация маркировки.</title>

    <link rel="shortcut icon" href="img/qr.jpg" type="image/jpg">
    <link rel="stylesheet" href="js/modal/jquery.arcticmodal-0.3.css">

    <!-- arcticModal theme -->
    <link rel="stylesheet" href="js/modal/themes/simple.css">
    <!--end modal window  -->

    <link rel="stylesheet" href="style/style.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="js/jquery.liTextLength.js"></script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
    m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(73047748, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
    });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/73047748" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <!-- arcticModal -->
    <script src="js/modal/jquery.arcticmodal-0.3.min.js"></script>

  
</head>

<body>
    <div id="main_container" class="container-fluid p-0">
        <!-- header -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light opacity_menu container-fluid p-0">
        <?php include_once("pages/menu_index.php"); ?>
        </nav>

      
        <header class="header container-fluid p-0">
        <div class="container__description">
            <h3 class="main_title">Маркировка по Честному знаку</h3>
            <p class="main_article">Оказываем услуги по термотрансферной печати для маркировки товаров</p>
            <button class="btn about-title" onclick="window.location.href = '#form_about_div';">УЗНАТЬ ПОДРОБНЕЕ</button>


        </div>
            <!-- overlay -->
            <div class="head_img container-fluid overlay p-0">
          
            </div>

        </header>

        <!-- body -->

    <!-- about us -->
    <div class="container-fluid p-0 about mt-0 mb-5">
        <div class="container">
            <div class="row about_us">
                <h2 class="head about_us mt-5">О нас</h2>
            </div>
            <div class="row">
                <p class="about_title">Наш профиль это оказание услуг по печати этикеток и маркировке по системе Честный
                    знак, также
                    инсталяции, продажа и внедрение готовых кейсов в ваше производство. Честный ЗНАК — Национальная
                    система
                    цифровой маркировки и прослеживаемости товаров Центра развития перспективных технологий, созданного
                    для
                    реализации глобальных проектов в цифровой экономике.По данным ЦРПТ в 2024 году каждый товар будет
                    промаркирован. Маркировка представляет собой зашифрованный DataMatrix QR-Code. Наше производство, может вам предложить
                    цветные этикетки на вашу продукцию с нанесенными кодами маркировки, таким образом вам придется 
                    только наклеить этикетки на вашу продукцию и ввести товар в оборот, на этом все требования по маркировке будут соблюдены. </p>
            </div>
        </div>
    </div>

    <!-- from crpt -->

    <div class="container-fluid from_crpt">


    </div>



    <!-- Partners -->
    <div class="container" id="partners">




    </div>
    <!-- VIDEO _ CONSULTATION  -->

    <div class="fullscreen-bg container-fluid p-0 col">



<video loop="" muted="" autoplay="autoplay" poster="video/plane.jpg" class="fullscreen-bg__video">
            <source src="video/video_markirovka.mp4" type="video/mp4">
            <!-- <source src="/web/video/cfr.mp4" type="video/mp4"> -->
        </video>

        
    </div>

    <!-- VIDEO _ CONSULTATION END _ BLOCK  -->

        <!-- icons -->
        <div class="container mt-5" id="description_mark">
            <div class="row about_us">
                <h2 class="head about_us">Подробнее о маркировке</h2>
            </div>
            <hr>
            <div class="row mt-3">
                <div class="col-2 icon_for_desc">
                    <img src="./img/clothing.png" alt="Маркировка одежды">
                </div>
                <div class="col-9 ">
                    <p><strong>Маркировка товаров легкой промышленности.</strong> С 1 января 2021 все <a href="https://xn--80ajghhoc2aj1c8b.xn--p1ai/business/projects/light_industry/marking_goods/" target="_blank">товары легкой промышленности попадающие под маркировку</a> должны быть 
                    промаркированы кодами Data Matrix, полученными в ЦРПТ Честный знак.
                    Оказываем услуги печати этикеток с марикировкой, а так же услуги маркировки под ключ (от 100 шт.). Цена маркировки одной единицы 1.5 рубля, может меняться в меньшую сторону зависимости от объема </p>
                </div>
            </div>
            <hr>
            <div class="row mt-3">
                <div class="col-2 icon_for_desc">
                    <img src="./img/milk-bottle.png" alt="Маркировка молочной продукции">
                </div>
                <div class="col-9 ">
                    <p> <strong>Маркировка молочной продукции.</strong> С 20 января 2021 года - старт обязательной <a href="https://xn--80ajghhoc2aj1c8b.xn--p1ai/business/projects/dairy/" target="_blank">маркировки молочной продукции</a>, с 1 июня 2021 года маркировка становится обязательной для категорий 
                    "мороженое" и "сыры". Наша компания имеет ряд готовых кейсов по реализации требований маркировки товаров, таких как маркировка под ключ - предоставление готовых цветных этикеток с 
                    кодами Data Matrix, полученными в ЦРПТ Честный знак, а также оказание услуг по внедрению кейс-технологий в ваше производство. 
                    </p>
                </div>
            </div>
            <hr>
            <div class="row mt-3">
                <div class="col-2 icon_for_desc">
                    <img src="./img/water.png" alt="">
    
                </div>
                <div class="col-9">
                    <p><strong>Маркировка упакованной воды.</strong>С 1 апреля 2020 года по 1 марта 2021 года проводится эксперимент по <a href="https://xn--80ajghhoc2aj1c8b.xn--p1ai/business/projects/water/"target="_blank"> маркировке упакованной воды.</a>Мы можем предложить ряд решений по маркировке вашей продукции как под ключ, так и с внедрением в ваше производство.</p>
                </div>
            </div>
            <hr>
            <div class="row mt-3">
                <div class="col-2 icon_for_desc">
                    <img src="./img/beer.png" alt="">
                </div>
                <div class="col-9">
                    <p><strong>Маркировка пива и пивных напитков.</strong>Правительство РФ утвердило проведение эксперимента по <a href="https://xn--80ajghhoc2aj1c8b.xn--p1ai/business/projects/beer/" target="_blank">маркировке пива</a> с 1 апреля 2021 года. Эксперимент ЦПРТ Честный знак затронет все типы упаковки — от стеклянной тары до кег — и завершится к началу сентября.</p>
                </div>
            </div>
            <hr class="mb-5">
        </div>
       
    <!-- end icons -->
    <div class="container-fluid" style="background-color:rgba(70,68,23,0.25);">

    
    <div class="container form_about_div p-5" id="form_about_div">
    <h2>НАПИШИТЕ НАМ</h2>
    <form id="mail_form" action="" >
        <div class="form-group form_on_video" id="form_for_client">
          <label for="exampleFormControlInput1">Ваш Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="name@yandex.ru">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Выберете тему</label>
          <select class="form-control" id="theme" name="theme">
            <option>Маркировка одежды</option>
            <option>Маркировка молочной продукции</option>
            <option>Маркировка упакованной воды</option>
            <option>Маркировка пивных напитков</option>
            <option>Маркировка общие сведения</option>
            <option>Прочие вопросы</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Введите текст</label>
          <textarea class="form-control" id="message" name="message" rows="3"></textarea>
        </div>
        <button id="button_on_video" id="send_message" class="btn button_about ">ОТПРАВИТЬ</button>
      </form>
    <div id="errorMess"></div>
</div>

</div>
<!-- Новости -->
<div class="container">
    <div class="row about_us" id="head_news">
        <h2 class="head_about_us mb-5 mt-5">Новости</h2>
    </div>


<?php
echo '<div class="container mb-4">';
echo '<div id="result" class="row">';

$news = News::getNews();

foreach ($news as $new) {
    $new->drawItem();
}
echo '</div>';

echo '</div>';

?>
<!-- end news block -->


<!-- start contact block -->
<div id="contact " class="container">
    <div class="row about_us mb-5">
        <h2 class="head_about_us">Контакты</h2>
    </div>
    <div class="row mb-5 ">
      <div class="col-md-6">
        <div id="contact_text">
          <p>
            EMAIL: CENTAPRINT@MAIL.RU
          </p><br>
          <p>ТЕЛЕФОН : +7 (905) 955-79-77</p><br>
          <p>АДРЕС: 630009, Г.НОВОСИБИРСК,</p><br>
          <p>УЛ.ЯКУШЕВА,148</p>
        </div>
      </div>
        <div class="col contact_map_mobi">
       <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A9b595c0a069c70db0bc7796fa191ba5ce746cfab928de16940698ae914e4d6d3&amp;width=345&amp;height=255&amp;lang=ru_RU&amp;scroll=true"></script>
          </div> 
       <div class="col-2 contact_map_mini">
       <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A9b595c0a069c70db0bc7796fa191ba5ce746cfab928de16940698ae914e4d6d3&amp;width=530&amp;height=295&amp;lang=ru_RU&amp;scroll=true"></script>
          </div> 
          <div class="col-2 contact_map_se">
       <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A9b595c0a069c70db0bc7796fa191ba5ce746cfab928de16940698ae914e4d6d3&amp;width=300&amp;height=225&amp;lang=ru_RU&amp;scroll=true"></script>
          </div> 
      </div>
    </div>
  </div> 


<!-- footer block  -->

    <?php include_once("pages/footer.php"); ?>
  <!-- footer end -->
</div>




<script>

$('.lead'   ).liTextLength({
    length: 93,									
    afterLength: '...',									
    fullText:false
});

</script>

<script src="js\formMail.js"></script>
</body>

</html>