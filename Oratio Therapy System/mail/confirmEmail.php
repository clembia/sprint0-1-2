<?php

use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var string $subject
 * @var \amnah\yii2\user\models\User $user
 * @var \amnah\yii2\user\models\Profile $profile
 * @var \amnah\yii2\user\models\UserToken $userToken
 */

$url = Url::toRoute(["/user/confirm", "token" => $userToken->token], true);
?>

<h3><?= $subject ?></h3>

<h1>La tua email e': <?=  $user->email   ?> </h1>
<h1>Il tuo username e': <?=  $user->username   ?> </h1>
<h1>La tua password e': <?=  $user->password   ?> </h1>

<p><?= Yii::t("user", "Per piacere conferma il tuo indirizzo email attraverso il link sotto indicato:") ?></p>

<p><?= Html::a($url, $url) ?></p>