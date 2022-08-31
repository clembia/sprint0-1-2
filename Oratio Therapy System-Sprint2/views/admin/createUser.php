<?php

use yii\helpers\Html;


/**
 * @var yii\web\View $this
 * @var amnah\yii2\user\models\User $user
 * @var amnah\yii2\user\models\Profile $profile
 */

$this->title = 'Inserimento nuovo utente';
$this->params['breadcrumbs'][] = ['label' => 'Menù Logopedista', 'url' => ['/site/homelogopedista']];
$this->params['breadcrumbs'][] = ['label' => 'Gestione Utenti', 'url' => ['utente']];
$this->params['breadcrumbs'][] = $this->title;

$this->title = Yii::t('user', 'Inserimento nuovo Utente', [
  'modelClass' => 'User',
]);
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formUser', [
        'user' => $user,
        'profile' => $profile,
    ]) ?>

</div>