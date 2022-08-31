<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AccessoAsset;


use yii\helpers\Url;
AccessoAsset::register($this);

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var amnah\yii2\user\models\forms\LoginForm $model
 */

$this->title = Yii::t('user', 'Accesso');
$request = Yii::$app->request;
$tipo = $request->get('tag');
?>


  <?php if (Yii::$app->session->hasFlash('errore')): ?>
    <br><br><br><br><br>
    <div class="alert alert-danger">
    <?= Yii::$app->session->getFlash('errore') ?>
  </div>
</div>


<?php else: ?>

<div class="user-default-login">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
    ]); ?>
    

    <?php if (Yii::$app->get("authClientCollection", false)): ?>
            <?= yii\authclient\widgets\AuthChoice::widget([
                'baseAuthUrl' => ['/user/auth/login']
            ]) ?>
     
    <?php endif; ?>
   
    <br><br>
    <section class="u-clearfix u-custom-color-1 u-section-1" id="sec-9af2">
      <div class="u-align-left u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-container-style u-custom-color-1 u-group u-group-1">
          <div class="u-container-layout u-valign-bottom u-container-layout-1">
            <div class="u-container-style u-group u-palette-1-base u-radius-50 u-shape-round u-group-2">
              <div class="u-container-layout u-container-layout-2">
                <span class="u-file-icon u-icon u-icon-1" data-animation-name="customAnimationIn" data-animation-duration="1000">
                   <?= Html::img(Url::to('@web/css_a/images_a/4924682.png'), ['alt' => 'My logo' ]) ?>  
                  </span>
                <h2 class="u-align-center u-text u-text-palette-2-base u-text-1">
                <?php if ($tipo =='logopedista'): ?> 
                  Login Logopedista
                <?php endif; ?>
                <?php if ($tipo =='utente'): ?> 
                  Login Utente
                <?php endif; ?>
                <?php if ($tipo =='caregiver'): ?> 
                  Login Caregiver
                <?php endif; ?>
                    
                </h2>
                <h4 class="u-text u-text-palette-2-light-2 u-text-2">Email/Username * </h4>
                <div >
                   <?= $form->field($model, 'email')->textInput(['class' =>'u-palette-4-light-2 u-radius-47 u-shape u-shape-round u-shape-1', 'autofocus' => true , 'placeholder' => 'Inserisci la tua Email'])->label(false) ?>
                </div>
                <h4 class="u-text u-text-palette-2-light-2 u-text-3">Password * </h4>
                <div >
                <?= $form->field($model, 'password')->passwordInput(['class' =>'u-custom-color-2 u-radius-47 u-shape u-shape-round u-shape-2', 'autofocus' => true , 'placeholder' => 'Inserisci la tua Password'])->label(false) ?>
                </div>
                <h5 class="u-text u-text-4">
                <?= $form->field($model, 'rememberMe', [])->checkbox()?>
                </h5>
                <?= Html::submitButton(Yii::t('user', 'Accedi'), ['class' => 'u-border-none u-btn u-btn-round u-button-style u-hover-palette-2-light-2 u-palette-2-base u-radius-50 u-btn-1']) ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" value="" name="recaptchaResponse">
    </section>

    <?php ActiveForm::end(); ?>
</div>
<?php endif;  ?> 