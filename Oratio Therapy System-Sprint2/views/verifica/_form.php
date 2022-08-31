<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\assets\VerificaAsset;
VerificaAsset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Verifica */
/* @var $form yii\widgets\ActiveForm */
?>

<style> 
  .rr{
    color:red;
  }


</style>


<div class="verifica-form">

    <?php $form = ActiveForm::begin(); ?>



    <section class="u-clearfix u-palette-1-base u-section-1" id="carousel_0b67">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-align-center u-custom-font u-font-georgia u-text u-text-palette-2-base u-text-1">Pretest - Coppie Minime</h1>
        <div class="u-container-style u-group u-group-1">
          <div class="u-container-layout u-container-layout-1">
           <div style="position:relative; left:80%">
          <p  >
               <?= $form->field($model, 'cognome')->textInput(['maxlength' => true, 'class'=>'u-align-left u-custom-font u-font-roboto u-text  u-text-2 rr row' ])->label("Cognome") ?>
            </p>
            <p >
                 <?= $form->field($model, 'nome')->textInput(['maxlength' => true, 'class' =>'u-align-left u-custom-font u-font-roboto u-text  u-text-3 rr row'])->label("Nome") ?>    
            </p>
            <p >
            <?= $form->field($model, 'codFisc', ['enableAjaxValidation' => true])->textInput(['maxlength' => true,'class'=>"u-align-left u-custom-font u-font-roboto u-text  u-text-4 rr row" ])->label("Codice Fiscale") ?>
             </p>
            <p >
               <?= $form->field($model, 'email', ['enableAjaxValidation' => true])->textInput(['maxlength' => true, 'class'=>"u-align-left u-custom-font u-font-roboto u-text  u-text-5 rr row"])-> label ("Email") ?>  
            </p>
            </div>
          </div>
        </div>
        <div class="u-container-style u-expanded-width u-group u-group-2">
          <div class="u-container-layout u-container-layout-2">
            <h1 class="u-align-right u-custom-font u-font-georgia u-text u-text-palette-2-base u-text-6">Test nr. 1/5</h1>
            <img src="/css_a/images_a/six.jpg" alt="" class="u-expanded-width u-image u-image-default u-image-1" data-image-width="1280" data-image-height="720">
            <div class="u-list u-list-1">
              <div class="u-repeater u-repeater-1">
                <div class="u-container-style u-list-item u-repeater-item u-list-item-1">
                  <div class="u-container-layout u-similar-container u-container-layout-3">
                    <img class="infinite u-image u-image-default u-preserve-proportions u-image-2" src="/css_a/images_a/44.jpg" alt="" data-image-width="131" data-image-height="138">
                    <div class="u-align-center u-container-style u-group u-palette-2-base u-radius-50 u-shape-round u-group-3">
                      <div class="u-container-layout u-valign-middle">
                        <h2 class="u-custom-font u-text u-text-7">1 </h2>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="u-align-center u-container-style u-list-item u-repeater-item u-list-item-2">
                  <div class="u-container-layout u-similar-container u-container-layout-5">
                    <img class="infinite u-image u-image-default u-preserve-proportions u-image-3" src="/css_a/images_a/45.jpg" alt="" data-image-width="140" data-image-height="150">
                    <div class="u-align-center u-container-style u-group u-palette-2-base u-radius-50 u-shape-round u-group-4">
                      <div class="u-container-layout u-valign-middle">
                        <h2 class="u-custom-font u-text u-text-8">2</h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="u-align-left u-container-style u-group u-group-5">
              <div class="u-container-layout u-container-layout-7">
                <h2 class="infinite u-custom-font u-font-georgia u-text u-text-9" data-animation-name="pulse" data-animation-duration="1000" data-animation-direction="">Ascolta la parola e scegli l'immagine corretta</h2>
              </div>
            </div>
            <div class="u-align-center u-container-style u-group u-group-6">
              <div class="u-container-layout u-valign-middle u-container-layout-8">
                <h3 class="u-custom-font u-font-georgia u-text u-text-10">
                    
                                <figure>
                    <figcaption></figcaption>
                <audio controls>
                    <source src="/esercizi/mp3/e04f7810-1543-11ed-9464-b92f0e07b07f.mp3"  type="audio/mp3">
                        Your browser does not support the
                            <code>audio</code> element.
                    </audio>
                </figure>
                 
                
                </h3>
              </div>
            </div>
            <div class="u-container-style u-group u-group-7">
              <div class="u-container-layout u-valign-middle u-container-layout-9">
                <h3 class="u-align-center u-custom-font u-font-georgia u-text u-text-11">
                <?= $form->field($model, 'ut1')->dropDownList(['1' => 'Immagine 1', '2' => 'Immagine 2' ],['prompt'=>'Immagine corretta?',   ])->label(false) ?>
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-palette-1-base u-section-2" id="sec-9ca7">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-container-style u-expanded-width u-group u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h1 class="u-align-right u-custom-font u-font-georgia u-text u-text-palette-2-base u-text-1">Test nr. 2/5</h1>
            <img src="/css_a/images_a/six.jpg" alt="" class="u-expanded-width u-image u-image-default u-image-1" data-image-width="1280" data-image-height="720">
            <div class="u-list u-list-1">
              <div class="u-repeater u-repeater-1">
                <div class="u-container-style u-list-item u-repeater-item u-list-item-1">
                  <div class="u-container-layout u-similar-container u-container-layout-2">
                    <img class="u-image u-image-default u-preserve-proportions u-image-2" src="/css_a/images_a/46.jpg" alt="" data-image-width="142" data-image-height="150">
                    <div class="u-align-center u-container-style u-group u-palette-2-base u-radius-50 u-shape-round u-group-2">
                      <div class="u-container-layout u-valign-middle">
                        <h2 class="u-custom-font u-text u-text-2">1 </h2>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="u-align-center u-container-style u-list-item u-repeater-item u-list-item-2">
                  <div class="u-container-layout u-similar-container u-container-layout-4">
                    <img class="u-image u-image-default u-preserve-proportions u-image-3" src="/css_a/images_a/47.jpg" alt="" data-image-width="138" data-image-height="150">
                    <div class="u-align-center u-container-style u-group u-palette-2-base u-radius-50 u-shape-round u-group-3">
                      <div class="u-container-layout u-valign-middle">
                        <h2 class="u-custom-font u-text u-text-3">2</h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="u-align-left u-container-style u-group u-group-4">
              <div class="u-container-layout u-container-layout-6">
                <h2 class="infinite u-custom-font u-font-georgia u-text u-text-4" data-animation-name="pulse" data-animation-duration="1000" data-animation-direction="">Ascolta la parola e scegli l'immagine corretta</h2>
              </div>
            </div>
            <div class="u-align-center u-container-style u-group u-group-5">
              <div class="u-container-layout u-valign-middle u-container-layout-7">
                <h3 class="u-custom-font u-font-georgia u-text u-text-5">
                <figure>
                    <figcaption></figcaption>
                <audio controls>
                    <source src="/esercizi/mp3/f080fa10-1543-11ed-9464-b92f0e07b07f.mp3"  type="audio/mp3">
                        Your browser does not support the
                            <code>audio</code> element.
                    </audio>
                </figure>        
            </h3>
              </div>
            </div>
            <div class="u-container-style u-group u-group-6">
              <div class="u-container-layout u-valign-middle u-container-layout-8">
                <h3 class="u-align-center u-custom-font u-font-georgia u-text u-text-6">
                <?= $form->field($model, 'ut2')->dropDownList(['1' => 'Immagine 1', '2' => 'Immagine 2' ],['prompt'=>'Immagine corretta?',   ])->label(false) ?>         
            </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-palette-1-base u-section-3" id="sec-9a7c">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-container-style u-expanded-width u-group u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h1 class="u-align-right u-custom-font u-font-georgia u-text u-text-palette-2-base u-text-1">Test nr. 3/5</h1>
            <img src="/css_a/images_a/six.jpg" alt="" class="u-expanded-width u-image u-image-default u-image-1" data-image-width="1280" data-image-height="720">
            <div class="u-list u-list-1">
              <div class="u-repeater u-repeater-1">
                <div class="u-container-style u-list-item u-repeater-item u-list-item-1">
                  <div class="u-container-layout u-similar-container u-container-layout-2">
                    <img class="u-image u-image-default u-preserve-proportions u-image-2" src="/css_a/images_a/80.jpg" alt="" data-image-width="141" data-image-height="150">
                    <div class="u-align-center u-container-style u-group u-palette-2-base u-radius-50 u-shape-round u-group-2">
                      <div class="u-container-layout u-valign-middle">
                        <h2 class="u-custom-font u-text u-text-2">1 </h2>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="u-align-center u-container-style u-list-item u-repeater-item u-list-item-2">
                  <div class="u-container-layout u-similar-container u-container-layout-4">
                    <img class="u-image u-image-default u-preserve-proportions u-image-3" src="/css_a/images_a/81.jpg" alt="" data-image-width="139" data-image-height="150">
                    <div class="u-align-center u-container-style u-group u-palette-2-base u-radius-50 u-shape-round u-group-3">
                      <div class="u-container-layout u-valign-middle">
                        <h2 class="u-custom-font u-text u-text-3">2</h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="u-align-left u-container-style u-group u-group-4">
              <div class="u-container-layout u-container-layout-6">
                <h2 class="infinite u-custom-font u-font-georgia u-text u-text-4" data-animation-name="pulse" data-animation-duration="1000" data-animation-direction="">Ascolta la parola e scegli l'immagine corretta</h2>
              </div>
            </div>
            <div class="u-align-center u-container-style u-group u-group-5">
              <div class="u-container-layout u-valign-middle u-container-layout-7">
                <h3 class="u-custom-font u-font-georgia u-text u-text-5">
                <figure>
                    <figcaption></figcaption>
                <audio controls>
                    <source src="/esercizi/mp3/4825ffd0-1545-11ed-bfd1-d3ef8b5ea700.mp3"  type="audio/mp3">
                        Your browser does not support the
                            <code>audio</code> element.
                    </audio>
                </figure>
                </h3>
              </div>
            </div>
            <div class="u-container-style u-group u-group-6">
              <div class="u-container-layout u-valign-middle u-container-layout-8">
                <h3 class="u-align-center u-custom-font u-font-georgia u-text u-text-6">
                <?= $form->field($model, 'ut3')->dropDownList(['1' => 'Immagine 1', '2' => 'Immagine 2' ],['prompt'=>'Immagine corretta?',   ])->label(false) ?>
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-palette-1-base u-section-4" id="sec-b4ba">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-container-style u-expanded-width u-group u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h1 class="u-align-right u-custom-font u-font-georgia u-text u-text-palette-2-base u-text-1">Test nr. 4/5</h1>
            <img src="/css_a/images_a/six.jpg" alt="" class="u-expanded-width u-image u-image-default u-image-1" data-image-width="1280" data-image-height="720">
            <div class="u-list u-list-1">
              <div class="u-repeater u-repeater-1">
                <div class="u-container-style u-list-item u-repeater-item u-list-item-1">
                  <div class="u-container-layout u-similar-container u-container-layout-2">
                    <img class="u-image u-image-default u-preserve-proportions u-image-2" src="/css_a/images_a/82.jpg" alt="" data-image-width="141" data-image-height="150">
                    <div class="u-align-center u-container-style u-group u-palette-2-base u-radius-50 u-shape-round u-group-2">
                      <div class="u-container-layout u-valign-middle">
                        <h2 class="u-custom-font u-text u-text-2">1 </h2>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="u-align-center u-container-style u-list-item u-repeater-item u-list-item-2">
                  <div class="u-container-layout u-similar-container u-container-layout-4">
                    <img class="u-image u-image-default u-preserve-proportions u-image-3" src="/css_a/images_a/83.jpg" alt="" data-image-width="141" data-image-height="150">
                    <div class="u-align-center u-container-style u-group u-palette-2-base u-radius-50 u-shape-round u-group-3">
                      <div class="u-container-layout u-valign-middle">
                        <h2 class="u-custom-font u-text u-text-3">2</h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="u-align-left u-container-style u-group u-group-4">
              <div class="u-container-layout u-container-layout-6">
                <h2 class="infinite u-custom-font u-font-georgia u-text u-text-4" data-animation-name="pulse" data-animation-duration="1000" data-animation-direction="">Ascolta la parola e scegli l'immagine corretta</h2>
              </div>
            </div>
            <div class="u-align-center u-container-style u-group u-group-5">
              <div class="u-container-layout u-valign-middle u-container-layout-7">
                <h3 class="u-custom-font u-font-georgia u-text u-text-5">
                <figure>
                    <figcaption></figcaption>
                <audio controls>
                    <source src="/esercizi/mp3/51848740-1545-11ed-bfd1-d3ef8b5ea700.mp3"  type="audio/mp3">
                        Your browser does not support the
                            <code>audio</code> element.
                    </audio>
                </figure>
                </h3>
              </div>
            </div>
            <div class="u-container-style u-group u-group-6">
              <div class="u-container-layout u-valign-middle u-container-layout-8">
                <h3 class="u-align-center u-custom-font u-font-georgia u-text u-text-6">
                <?= $form->field($model, 'ut4')->dropDownList(['1' => 'Immagine 1', '2' => 'Immagine 2' ],['prompt'=>'Immagine corretta?',   ])->label(false) ?> 
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-palette-1-base u-section-5" id="sec-40a1">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-container-style u-expanded-width u-group u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h1 class="u-align-right u-custom-font u-font-georgia u-text u-text-palette-2-base u-text-1">Test nr. 5/5</h1>
            <img src="/css_a/images_a/six.jpg" alt="" class="u-expanded-width u-image u-image-default u-image-1" data-image-width="1280" data-image-height="720">
            <div class="u-list u-list-1">
              <div class="u-repeater u-repeater-1">
                <div class="u-container-style u-list-item u-repeater-item u-list-item-1">
                  <div class="u-container-layout u-similar-container u-container-layout-2">
                    <img class="u-image u-image-default u-preserve-proportions u-image-2" src="/css_a/images_a/70.jpg" alt="" data-image-width="139" data-image-height="150">
                    <div class="u-align-center u-container-style u-group u-palette-2-base u-radius-50 u-shape-round u-group-2">
                      <div class="u-container-layout u-valign-middle">
                        <h2 class="u-custom-font u-text u-text-2">1 </h2>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="u-container-style u-list-item u-repeater-item u-list-item-2">
                  <div class="u-container-layout u-similar-container u-container-layout-4">
                    <img class="u-image u-image-default u-preserve-proportions u-image-3" src="/css_a/images_a/71.jpg" alt="" data-image-width="143" data-image-height="150">
                    <div class="u-align-center u-container-style u-group u-palette-2-base u-radius-50 u-shape-round u-group-3">
                      <div class="u-container-layout u-valign-middle">
                        <h2 class="u-custom-font u-text u-text-3">2</h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="u-align-left u-container-style u-group u-group-4">
              <div class="u-container-layout u-container-layout-6">
                <h2 class="infinite u-custom-font u-font-georgia u-text u-text-4" data-animation-name="pulse" data-animation-duration="1000" data-animation-direction="">Ascolta la parola e scegli l'immagine corretta</h2>
              </div>
            </div>
            <div class="u-align-center u-container-style u-group u-group-5">
              <div class="u-container-layout u-valign-middle u-container-layout-7">
                <h3 class="u-custom-font u-font-georgia u-text u-text-5">
                <figure>
                    <figcaption></figcaption>
                <audio controls>
                    <source src="/esercizi/mp3/dc680f40-1544-11ed-9464-b92f0e07b07f.mp3"  type="audio/mp3">
                        Your browser does not support the
                            <code>audio</code> element.
                    </audio>
                </figure>
                </h3>
              </div>
            </div>
            <div class="u-container-style u-group u-group-6">
              <div class="u-container-layout u-valign-middle u-container-layout-8">
                <h3 class="u-align-center u-custom-font u-font-georgia u-text u-text-6">
                <?= $form->field($model, 'ut5')->dropDownList(['1' => 'Immagine 1', '2' => 'Immagine 2' ],['prompt'=>'Immagine corretta?',   ])->label(false) ?> 
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-valign-middle u-section-6" id="sec-c867">
      <div class="u-container-style u-expanded-width u-group u-palette-1-base u-group-1">
        <div class="u-container-layout u-valign-middle u-container-layout-1">
             <?= Html::submitButton('Termina Test', ['class' => 'btn btn-success', 'Name' => 'PreviewButton', 'class'=>'u-align-center u-border-none u-btn u-btn-round u-button-style u-hover-palette-2-light-3 u-palette-2-dark-1 u-radius-50 u-btn-1']) ?>
        </div>
      </div>
    </section>
    
    

    <?php ActiveForm::end(); ?>

</div>
