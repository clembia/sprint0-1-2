<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


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
?>

<div class="user-form">
<?php 

    

$queryA=(new \yii\db\Query())
->select(['id', 'cfUtAssociato']) 
->from('user')
->where (['not',['cfUtAssociato' =>null]])
->all();



$queryB=(new \yii\db\Query())
->select(['id','codFisc']) 
->from('user')
->where(['role_id' => 2, 'status'=>1, 'cfUtAssociato'=>Yii::$app->user->identity->codFisc ])
->all();



 $g=[];
foreach ($queryB as $b )
{
    $f=0;
    foreach ($queryA as $a )
    { 
      if (strtoupper($a['cfUtAssociato'])== strtoupper($b['codFisc']))
        {
            $f=1;
        }
    }
     if ($f==0) 
     {  
       
        $g[]=['codFisc'=>$b['codFisc']];
     }
}
 



?>


    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($user, 'nome')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($user, 'cognome')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($user, 'dataNascita')->textInput(['placeholder' => 'AAAA-MM-GG']) ?>

    <?= $form->field($user, 'codFisc')->textInput(['maxlength' => 16])->label('Codice Fiscale CAREGIVER') ?>

    <?= $form->field($user, 'cfUtAssociato')->dropDownList(ArrayHelper::map($g, 'codFisc' , 'codFisc'),['prompt'=>'Seleziona Codice Fiscale utente da associare']) ?>

    <?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($user, 'username')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($user, 'newPassword')->passwordInput() ?>

    <?= $form->field($user, 'cfLogAssociato')->textInput(['maxlength' => true, 'value'=>Yii::$app->user->identity->codFisc, 'readonly' => 'true', 'style' => 'display: none'])->label(false); ?>

    <?= $form->field($user, 'role_id')->textInput(['value'=>'4', 'readonly' => 'true', 'style' => 'display: none'])->label(false); ?>

    <?= $form->field($user, 'status')->textInput(['value'=>'1', 'readonly' => 'true', 'style' => 'display: none'])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($user->isNewRecord ? Yii::t('user', 'Create') : Yii::t('user', 'Update'), ['class' => $user->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
