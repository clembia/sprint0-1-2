<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;



/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var amnah\yii2\user\Module $module
 * @var amnah\yii2\user\models\User $user
 * @var amnah\yii2\user\models\User $profile
 * @var string $userDisplayName
 */

$module = $this->context->module;

$this->title = Yii::t('user', 'Registrazione Logopedista');
$this->params['breadcrumbs'][] = $this->title;


$layout1 = <<< HTML
<span class="input-group-text">Data di Nascita</span>
{picker}
{input}
HTML;


?>

<div class="user-default-register">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($flash = Yii::$app->session->getFlash("Register-success")): ?>

        <div class="alert alert-success">
            <p><?= $flash ?></p>
        </div>


    <?php else: ?>

        <?php $form = ActiveForm::begin([
            'id' => 'register-form',
            'options' => ['class' => 'form-horizontal'],
            
            'enableAjaxValidation' => true,
        ]);?>

        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <!--Campi form-->

        <?= $form->field($user, 'cognome')->textInput() ?>
        <?= $form->field($user, 'nome')->textInput() ?>     <!--Aggiunto per aggiungere campo nome-->
        

        <?= $form->field($user, 'dataNascita')->widget(
            DatePicker::class, [
            'name' => 'dataNascita', 
            'value' => date('dd-mm-yyyy', strtotime('+2 days')),
            'options' => ['placeholder' => 'Inserire la data di nascita.....'],
            'layout' =>$layout1,
            'pluginOptions' => [
                'format' => 'dd/mm/yyyy',
                'todayHighlight' => true
                ],
            ]);?>

        <?= $form->field($user, 'codFisc')->textInput(['maxlength' => true]) ?>
        <?= $form->field($user, 'cell')->textInput() ?>

        <?= $form->field($user, 'codLicenza')->textInput(['maxlength' => true]) ?>                

        <!--Rimossa IF per scelta email o username-->
        <?= $form->field($user, 'email') ?>
        <!--Rimossa IF per scelta email o username-->
        <?= $form->field($user, 'username') ?>
        <?= $form->field($user, 'newPassword')->passwordInput() ?>
        
        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

      
        <?php /* uncomment if you want to add profile fields here
        <?= $form->field($profile, 'full_name') ?>
        */ ?>


        <div class="form-group" >
                <?= Html::submitButton(Yii::t('user', 'Registrati'), ['class' => 'btn btn-primary']) ?>

                <br/><br/>
                <?php // Html::a(Yii::t('user', 'Accedi'), ["/user/login"]) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <?php if (Yii::$app->get("authClientCollection", false)): ?>
            <div class="col-lg-offset-2 col-lg-10">
                <?= yii\authclient\widgets\AuthChoice::widget([
                    'baseAuthUrl' => ['/user/auth/login']
                ]) ?>
            </div>
        <?php endif; ?>

    <?php endif; ?>





    
</div>