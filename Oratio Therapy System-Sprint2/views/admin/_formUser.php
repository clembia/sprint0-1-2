<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/**
 * @var yii\web\View $this
 * @var amnah\yii2\user\Module $module
 * @var amnah\yii2\user\models\User $user
 * @var amnah\yii2\user\models\Profile $profile
 * @var amnah\yii2\user\models\Role $role
 * @var yii\widgets\ActiveForm $form
 */

$module = $this->context->module;
$role = $module->model("Role");



$layout1 = <<< HTML
<span class="input-group-text">Data di Nascita</span>
{picker}
{input}
HTML;


?>



<div class="user-form id_form">

    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => true]); ?>

    <?= $form->field($user, 'cognome')->textInput(['maxlength' => 255]) ?> 
    
    <?= $form->field($user, 'nome')->textInput(['maxlength' => 255]) ?>


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


    
    <?= $form->field($user, 'codFisc')->textInput(['maxlength' => 16]) ?>

    <?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($user, 'username')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($user, 'newPassword')->passwordInput()?>       

    <?= $form->field($user, 'cfLogAssociato')->textInput(['maxlength' => true, 'value'=>Yii::$app->user->identity->codFisc, 'readonly' => 'true', 'style' => 'display: none'])->label(false); ?>

    <?= $form->field($user, 'role_id')->textInput(['value'=>'2', 'readonly' => 'true', 'style' => 'display: none'])->label(false); ?>

    <?= $form->field($user, 'status')->textInput(['value'=>'1', 'readonly' => 'true', 'style' => 'display: none'])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($user->isNewRecord ? Yii::t('user', 'Create') : Yii::t('user', 'Update'), ['class' => $user->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>          

   


    <?php ActiveForm::end(); ?>

</div>
