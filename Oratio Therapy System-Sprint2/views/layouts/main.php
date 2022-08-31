<?php

/** @var yii\web\View $this */
/** @var string $content */


use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;


use app\assets\AppAsset;
AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

<style>
  .sf {
    background-color:cornsilk;
     color:red
  }
  .tf {
    font-size:15px;
    font-style: normal;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: black;
    background-color: cornsilk;
  }

.ro {
  background-color:cornsilk;
     color:red
}

  .ro>a {
    background-color: red;
    color:white;
  }

  .ro>a:hover {
    background-color: white;
    color:red;
  }

</style>

</head>
<body class="d-flex flex-column h-100" style="background-color:cornsilk;" onload="clock()">
<!-- <div style="color:cornflowerblue" id="date"></div>  -->
<?php $this->beginBody() ?>


<script>
    var nameOfDay = new Array('Domenica','Lunedi','Martedi','Mercoledi','Giovedi','Venerdi','Sabato');
    var nameOfMonth = new Array('Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre');
    var data = new Date();
    function clock()
    {

    var hou = data.getHours();
    var min = data.getMinutes();
    var sec = data.getSeconds();
    if(hou<10){ hou= "0"+hou;}
    if(min<10){ min= "0"+min;}
    if(sec<10){ sec= "0"+sec;}


        data.setTime(data.getTime()+1000)
        setTimeout("clock();",1000);
    document.getElementById('date').innerHTML = nameOfDay[data.getDay()] + ", "   + data.getDate() +  " " + nameOfMonth[data.getMonth()] +  " " + data.getFullYear() + " ore " + hou+":"+min+":"+sec;;
    }
</script>

   



<header>
<?php

    NavBar::begin([
      'brandLabel' => '<img style="display:inline; vertical-align: top;width:300px;height:30px;" src="/css_a/images_a/logo_large.png" class="img-responsive"/>',  
      //'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-light fixed-top',
            'style' => 'background-color:cornsilk'
        ],
    ]);

    $pagina='';
    $prof='';
    if(!Yii::$app->user->isGuest){
      if(Yii::$app->user->identity->role_id == 1){
        $pagina='/user';
        $prof ='';
      }if(Yii::$app->user->identity->role_id == 2){
        $pagina='/site/homeutente';
        $prof ='|Menù Utente|';
      }else if(Yii::$app->user->identity->role_id == 3){
        $pagina='/site/homelogopedista';
        $prof ='|Menù Logopedista|';
      }else if(Yii::$app->user->identity->role_id == 4){
        $pagina='/site/homecaregiver';
        $prof ='|Menù Caregiver|';
      }
    }
 
   

  

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ',
      ],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index'], ],
            ['label' => 'Chi Siamo', 'url' => ['/site/about']],
            ['label' => 'Contatti', 'url' => ['/site/contact']],
            ['label' => $prof, 'url' => $pagina, 'visible' => !Yii::$app->user->isGuest,  ],
            ['label' => 'Recapiti', 'url' => ['/site/recapiti']],
            Yii::$app->user->isGuest ?
              ['label' => 'Login', 'url' => ['/user/login'],   'items' => [
                      ['label' => 'Logopedista', 'url' => ['/user/login', 'tag' => 'logopedista']],
                      ['label' => 'Caregiver', 'url' => ['/user/login', 'tag' => 'caregiver']],
                      ['label' => 'Utente', 'url' => ['/user/login', 'tag' => 'utente']],   
                ]] : 
              ['label' => 'Logout (' . Yii::$app->user->identity->cognome . ' ' . Yii::$app->user->identity->nome .  ')', //' ' . Yii::$app->user->identity->codFisc .
                      'url' => ['/user/logout'], 
                      'linkOptions' => ['data-method' => 'post', 'style' => 'color: blue;'],
                      ],
            ['label' => 'Registra Logopedista', 'url' => ['/user/register'], 'visible' => Yii::$app->user->isGuest,],   
        ],
    ]);
    echo "<br /><div style='position:absolute;left:500px;top:0px ;color:cornflowerblue;font-size:15px' id='date'></div>";
    NavBar::end();
    
   
  
  
   ?>

</header>

<br>
<main role="main" class="flex-shrink-0">
    <div class="container">
      <br><br><br>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>


<footer class="u-align-center u-clearfix u-footer u-white u-footer" style="background-color:cornsilk" id="sec-2bc3">

  <div class="u-clearfix u-sheet u-sheet-1">
    <hr size="10">  
   
    <h6 class="u-align-center u-text u-text-1">Progetto di <span style="font-style: italic;"></span>studio</h6>
        <h6 class="u-align-center u-text u-text-2">Università degli studi di Bari Aldo Moro</h6>
        <p class="u-align-center u-small-text u-text u-text-variant u-text-3">Copyright&nbsp; @2022 - Tutti i diritti riservati</p> 
  </div>


</footer>




<?php $this->endBody() ?>


</body>


</html>
<?php $this->endPage() ?>