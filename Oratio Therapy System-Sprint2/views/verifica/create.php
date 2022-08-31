<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Verifica */

//$this->title = 'Create Verifica';
//$this->params['breadcrumbs'][] = ['label' => 'Verificas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="verifica-create">

    <h1><?= Html::encode($this->title) ?></h1>
      <?=
      
    $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
