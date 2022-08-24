<?php

/** @var yii\web\View $this */

$this->title = 'Caregiver';
use app\assets\CaregiverAsset;
CaregiverAsset::register($this);

use yii\helpers\Html;
use yii\helpers\Url;

?>
<br><br>
    <section class="u-align-center u-clearfix u-section-1" id="carousel_c1e2">
     
       
          <div class="u-layout">
            <div class="u-layout-col">
              <div class="u-size-40">
                <div class="u-layout-row">
                  <div class="u-size-44">
                    <div class="u-layout-col">
                      <div class="u-align-left u-container-style u-layout-cell u-opacity u-opacity-70 u-radius-20 u-size-60 u-layout-cell-1">
                        <div class="u-container-layout u-container-layout-1">
                        <?= Html::img(Url::to('@web/css_a/images_a/Caregiver-2.png'), ['alt' => 'My logo',
                         'class' => 'u-image u-image-1'
                        ]) ?>
                         
                          <h2 class="u-align-left u-text u-text-palette-5-dark-3 u-text-1" data-animation-name="customAnimationIn" data-animation-duration="1000" data-animation-direction=""><?= \Yii::$app->user->identity->cognome ?> <?= \Yii::$app->user->identity->nome ?></h2>
                          <h1 class="u-align-center u-text u-text-palette-2-base u-text-2" data-animation-name="bounceIn" data-animation-duration="1000" data-animation-direction="">Caregiver </h1>
                          <h3 class="u-align-left u-text u-text-3" data-animation-name="customAnimationIn" data-animation-duration="1000" data-animation-direction=""><?= \Yii::$app->user->identity->email ?>:</h3>
                          <h3 class="u-align-left u-text u-text-4" data-animation-direction="" data-animation-name="customAnimationIn" data-animation-duration="1000" data-animation-delay="0" data-animation-out="0"><?= \Yii::$app->user->identity->cell ?>:&nbsp;</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="u-size-16">
                    <div class="u-layout-col">
                      <div class="u-container-style u-layout-cell u-opacity u-opacity-70 u-radius-20 u-size-60 u-layout-cell-2">
                        <div class="u-container-layout u-container-layout-2"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="u-size-20">
                <div class="u-layout-row">
                  <div class="u-container-style u-layout-cell u-opacity u-opacity-70 u-palette-2-light-2 u-radius-20 u-shape-round u-size-15 u-layout-cell-3">
                    <div class="u-container-layout u-container-layout-3">
                      <h3 class="u-align-center u-custom-font u-font-pt-sans u-text u-text-palette-4-base u-text-5">Account</h3>
                      <div class="u-align-center u-container-style u-expanded-width u-group u-hover-feature u-group-1">
                        <div class="u-container-layout"><span class="u-align-center u-file-icon u-icon u-icon-1" data-href="/user/account">
                          <?= Html::img(Url::to('@web/css_a/images_a/6195696.png'), ['alt' => 'My logo']) ?>
                        </span>
                          <h5 class="u-text u-text-6">Cambiare Password</h5>
                        </div>
                      </div><span class="u-file-icon u-icon u-icon-2" data-animation-name="customAnimationIn" data-animation-duration="1000" data-animation-direction="">
                        <?= Html::img(Url::to('@web/css_a/images_a/7486753.png'), ['alt' => 'My logo']) ?>
                      </span>
                    </div>
                  </div>
                  <div class="u-container-style u-layout-cell u-opacity u-opacity-70 u-palette-4-light-2 u-radius-20 u-size-15 u-layout-cell-4">
                    <div class="u-container-layout u-container-layout-5">
                      <h3 class="u-align-center u-custom-font u-font-pt-sans u-text u-text-palette-3-base u-text-7">Esercizi</h3><span class="u-file-icon u-icon u-icon-3" data-animation-name="customAnimationIn" data-animation-duration="1000">
                        <?= Html::img(Url::to('@web/css_a/images_a/7486753.png'), ['alt' => 'My logo']) ?>
                      </span>
                      <div class="u-align-center u-container-style u-expanded-width u-group u-hover-feature u-group-2">
                        <div class="u-container-layout"><span class="u-align-center u-file-icon u-icon u-icon-4" data-href="/exerciseconvalida">
                          <?= Html::img(Url::to('@web/css_a/images_a/2097055.png'), ['alt' => 'My logo']) ?>
                        </span>
                          <h5 class="u-text u-text-8">Validare Esercizio</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="u-container-style u-layout-cell u-opacity u-opacity-70 u-palette-1-light-2 u-radius-20 u-size-15 u-layout-cell-5">
                    <div class="u-container-layout u-container-layout-7">
                      <h3 class="u-align-center u-custom-font u-font-pt-sans u-text u-text-palette-1-base u-text-9">Statistiche</h3>
                      <div class="u-align-center u-container-style u-expanded-width u-group u-hover-feature u-group-3">
                        <div class="u-container-layout"><span class="u-align-center u-file-icon u-icon u-icon-5" data-href="/avanzamento">
                          <?= Html::img(Url::to('@web/css_a/images_a/5766287.png'), ['alt' => 'My logo']) ?>
                        </span>
                          <h5 class="u-text u-text-10">Grado di avanzamento</h5>
                        </div>
                      </div><span class="u-file-icon u-icon u-icon-6" data-animation-name="customAnimationIn" data-animation-duration="1000">
                        <?= Html::img(Url::to('@web/css_a/images_a/7486753.png'), ['alt' => 'My logo']) ?>
                      </span>
                    </div>
                  </div>
                  <div class="u-align-center u-container-style u-layout-cell u-opacity u-opacity-70 u-palette-3-light-2 u-radius-20 u-size-15 u-layout-cell-6">
                    <div class="u-container-layout u-container-layout-9">
                      <h3 class="u-align-center u-custom-font u-font-pt-sans u-text u-text-palette-1-base u-text-11">Utilità</h3>
                      <div class="u-align-center u-container-style u-group u-hover-feature u-group-4">
                        <div class="u-container-layout"><span class="u-align-center u-file-icon u-icon u-icon-7" data-href="/appuntamenti/index">
                          <?= Html::img(Url::to('@web/css_a/images_a/2907150.png'), ['alt' => 'My logo']) ?>
                        </span>
                          <h5 class="u-text u-text-12">Prenotazione Logopedista</h5>
                        </div>
                      </div>
                      <div class="u-align-center u-container-style u-expanded-width u-group u-hover-feature u-group-5">
                        <div class="u-container-layout"><span class="u-align-center u-file-icon u-icon u-icon-8" data-href="/site/comunica">
                          <?= Html::img(Url::to('@web/css_a/images_a/1077909.png'), ['alt' => 'My logo']) ?>
                        </span>
                          <h5 class="u-text u-text-13">Comunicazioni</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      
      
      
      
    </section>
    
    
