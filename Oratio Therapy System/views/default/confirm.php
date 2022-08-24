<?php


/**
 * @var yii\web\View $this
 * @var bool $success
 * @var string $email
 */

$this->title = Yii::t('user', $success ? 'Confirmed' : 'Error');
?>
<div class="user-default-confirm">
    <br><br><br><br>
    <?php if ($success): ?>

        <div class="alert alert-success">

            <p><?= Yii::t("user", "La tua email [ {email} ] è stata confermata. Effettua il login", ["email" => $email]) ?></p>


        </div>

    <?php elseif ($email): ?>

        <div class="alert alert-danger">[ <?= $email ?> ] <?= Yii::t("user", "La tua Email è già attiva") ?></div>

    <?php else: ?>

        <div class="alert alert-danger"><?= Yii::t("user", "Token non valido") ?></div>

    <?php endif; ?>

</div>