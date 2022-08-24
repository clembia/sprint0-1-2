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
</style>

</head>
<body class="d-flex flex-column h-100" style="background-color:cornsilk;">
<?php $this->beginBody() ?>

<header>
<?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-light fixed-top ',
            'style' => 'background-color:cornsilk'
        ],
    ]);

    $pagina='';
    if(!Yii::$app->user->isGuest){
      if(Yii::$app->user->identity->role_id == 1){
        $pagina='/user';
      }if(Yii::$app->user->identity->role_id == 2){
        $pagina='/site/homeutente';
      }else if(Yii::$app->user->identity->role_id == 3){
        $pagina='/site/homelogopedista';
      }else if(Yii::$app->user->identity->role_id == 4){
        $pagina='/site/homecaregiver';
      }
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav tf ',
      ],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Chi Siamo', 'url' => ['/site/about']],
            ['label' => 'Contatti', 'url' => ['/site/contact']],
            ['label' => 'Profilo', 'url' => $pagina, 'visible' => !Yii::$app->user->isGuest ],
            ['label' => 'Recapiti', 'url' => ['/site/recapiti']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/user/login'],   'items' => [
                    ['label' => 'Logopedista', 'url' => ['/user/login', 'tag' => 'logopedista']],
                    ['label' => 'Caregiver', 'url' => ['/user/login', 'tag' => 'caregiver']],
                    ['label' => 'Utente', 'url' => ['/user/login', 'tag' => 'utente']],   //  ['/site/prelogin']] ,
              ]] : // or ['/user/login-email']
                ['label' => 'Logout (' . Yii::$app->user->displayName . ')',
                    'url' => ['/user/logout'],
                    'linkOptions' => ['data-method' => 'post']],
                    ['label' => 'Registra Logopedista', 'url' => ['/user/register'], 'visible' => Yii::$app->user->isGuest,],   
        ],
    ]);
    NavBar::end();
    ?>
</header>

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