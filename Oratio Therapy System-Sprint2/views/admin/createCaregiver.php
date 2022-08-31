<?php

use yii\helpers\Html;


$this->title = 'Inserimento nuovo Caregiver';
$this->params['breadcrumbs'][] = ['label' => 'Menù Logopedista', 'url' => ['/site/homelogopedista']];
$this->params['breadcrumbs'][] = ['label' => 'Gestione Cargiver', 'url' => ['caregiver']];
$this->params['breadcrumbs'][] = $this->title;
/**
 * @var yii\web\View $this
 * @var amnah\yii2\user\models\User $user
 * @var amnah\yii2\user\models\Profile $profile
 */

$this->title = Yii::t('user', 'Inserimento nuovo Caregiver', [
  'modelClass' => 'User',
]);
?>

<div class="user-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formCaregiver', [
        'user' => $user,
        'profile' => $profile,
    ]) ?>

</div>