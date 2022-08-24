<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;


$this->title = 'Contatti';

?>

<div class="site-contact">
    <br>
    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
        <br><br>
        <div class="alert alert-success">
            Grazie per averci contattato. Il nostro staff le risponderà appena possibile.
        </div>

      <!-- <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_yyjaansa.json"  background="transparent"  speed="1"  style="width: 100%;"  loop autoplay></lottie-player>
    -->
        <p>
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                <!--Poiche' l'applicazione e' ancora in fase di sviluppo, la mail non e' stata inviata ma  salvata come file nella directory -->
                
            <?php endif; ?>
        </p>

    <?php else: ?>

        <section><br>
        <h1 style="text-align: center;">CONTATTACI</h1>         
        
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data' ]]); ?>
                      <div class="u-form-group u-form-partition-factor-2">
                        
                  
                        <table style="width:100%;">
                        <tr>
                        <td><div style="display: block; height:20px"></div></td>
                        </tr>
                        <tr>

                          <td>
                            <?= $form->field($model, 'name')->textInput([ 'class' => 'u-border-2 u-border-grey-75 u-custom-font u-font-montserrat u-input u-input-rectangle u-radius-15' , 'autofocus' => true , 'placeholder' => 'Cognome e Nome'])->label(false) ?>
                          </td>
                         </tr>
                         <tr>
                        <td><div style="display: block; height:30px"></div></td>
                        </tr>
                         <table style="width:100%;">
                         <tr>
                          <td>
                             <?= $form->field($model, 'subject')->textInput([ 'class' => 'u-border-2 u-border-grey-75 u-custom-font u-font-montserrat u-input u-input-rectangle u-radius-15' , 'autofocus' => true , 'placeholder' => 'Oggetto'])->label(false) ?>
                          </td>
                        </tr>
                        </table>
                      </div>
                     
                      <?= $form->field($model, 'email')->textInput([ 'class' => 'u-border-2 u-border-grey-75 u-custom-font u-font-montserrat u-input u-input-rectangle u-radius-15' , 'autofocus' => true , 'placeholder' => 'Email'])->label(false) ?>
                    

                     

                        <?= $form->field($model, 'body')->textarea(['class' => 'u-border-2 u-border-grey-75 u-custom-font u-font-montserrat u-input u-input-rectangle u-radius-15' , 'rows' => 7 , 'cols' => '50', 'placeholder' => 'Scrivi il contenuto della email'])->label(false) ?>
                  

                      <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                            'template' => '
                                <div class="row">
                                    <div class="col-lg-2">{image}</div>
                                    <div class="col-lg-6">{input}</div>
                                </div>',
                                'options' => [
                                  'placeholder' => 'Per favore, scrivi le lettere mostrate affianco' ,
                                
                         
                                    
                             ]
                        ])->label('Codice di sicurezza')?>
        
                        




        <div style="text-align: center;"> 
                        <?= Html::submitButton('INVIA EMAIL AL TEAM DI SVILUPPO', ['class' => 'btn btn-primary u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-color-3 u-hover-custom-color-6 u-radius-50 u-text-custom-color-6 u-text-hover-white u-btn-1', 'name' => 'contact-button'],) ?>
                                </div> 
                      <?php ActiveForm::end(); ?>
                
    </section>





    <?php endif; ?>
</div>






