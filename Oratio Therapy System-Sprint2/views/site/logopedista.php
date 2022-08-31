<?php



$this->title = 'Menu Logopedista';
use app\assets\LogopedistaAsset;
LogopedistaAsset::register($this);
use yii\helpers\Html;
use yii\helpers\Url;

//$this->title = 'Menu\' Principale';
//$this->params['breadcrumbs'][] = $this->title;
?>
<br><br>
  <body data-home-page="Home.html" data-home-page-title="Home" class="u-body u-xl-mode" data-lang="it">
    <section class="u-align-center u-clearfix u-section-1" id="carousel_c1e2">
      <!--<div class="u-clearfix u-sheet u-sheet-1"> -->
        <!--<div class="u-clearfix u-expanded-width u-gutter-22 u-layout-wrap u-layout-wrap-1"> -->
          <div class="u-layout">
            <div class="u-layout-col">
              <div class="u-size-40">
                <div class="u-layout-row">
                  <div class="u-size-44">
                    <div class="u-layout-col">
                      <div class="u-align-left u-container-style u-image u-layout-cell u-opacity u-opacity-70 u-radius-20 u-size-60 u-image-1" data-image-width="898" data-image-height="639">
                        <div class="u-container-layout u-valign-bottom u-container-layout-1">
                          <h1 class="u-align-center u-text u-text-palette-2-base u-text-1" data-animation-name="bounceIn" data-animation-duration="1000" data-animation-direction="">Logopedista </h1>
                          <h2 class="u-align-left u-text u-text-palette-5-dark-3 u-text-2" data-animation-name="customAnimationIn" data-animation-duration="1000" data-animation-direction=""><?= \Yii::$app->user->identity->cognome ?> <?= \Yii::$app->user->identity->nome ?></h2>
                          <h3 class="u-align-left u-text u-text-3" data-animation-name="customAnimationIn" data-animation-duration="1000" data-animation-direction=""><?= \Yii::$app->user->identity->email ?></h3>
                          <h3 class="u-align-left u-text u-text-4" data-animation-direction="" data-animation-name="customAnimationIn" data-animation-duration="1000" data-animation-delay="0" data-animation-out="0"><?= \Yii::$app->user->identity->cell ?>&nbsp;</h3>
                          <h3 class="u-align-left u-text u-text-5" data-animation-direction="" data-animation-name="customAnimationIn" data-animation-duration="1000">Id. reg. <?= \Yii::$app->user->identity->codLicenza ?> </h3>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="u-size-16">
                    <div class="u-layout-col">
                      <div class="u-container-style u-layout-cell u-opacity u-opacity-70 u-palette-4-light-2 u-radius-20 u-size-60 u-layout-cell-2">
                        <div class="u-container-layout u-container-layout-2">
                          <h3 class="u-align-center u-custom-font u-font-pt-sans u-text u-text-palette-3-base u-text-6">Esercizi</h3>
                          <div class="u-align-center u-container-style u-expanded-width u-group u-hover-feature u-group-1">
                            <div class="u-container-layout"><span class="u-align-center u-file-icon u-icon u-icon-1" data-href="/exercise/index">
                                        <?= Html::img(Url::to('@web/css_a/images_a/2097055.png'), ['alt' => 'My logo',  ]) ?>   
                            </span>
                              <h5 class="u-text u-text-7">Inserire Esercizio</h5>
                            </div>
                          </div>
                          <div class="u-align-center u-container-style u-expanded-width u-group u-hover-feature u-group-2">
                            <div class="u-container-layout"><span class="u-align-center u-file-icon u-icon u-icon-2" data-href="/exercisesvolto/index">
                            <?= Html::img(Url::to('@web/css_a/images_a/6208579.png'), ['alt' => 'My logo',  ]) ?>     
                            
                        </span>
                              <h5 class="u-text u-text-8">Assegnare Esercizio</h5>
                            </div>
                          </div>
                          <div class="u-align-center u-container-style u-expanded-width u-group u-hover-feature u-group-3">
                            <div class="u-container-layout"><span class="u-align-center u-file-icon u-icon u-icon-3" data-href="/verifica/index">
                            <?= Html::img(Url::to('@web/css_a/images_a/1205526.png'), ['alt' => 'My logo',  ]) ?>   
                            </span>
                              <h5 class="u-text u-text-9">Pre-test</h5>
                            </div>
                          </div>
                          <div class="u-align-center u-container-style u-expanded-width u-group u-hover-feature u-group-4">
                            <div class="u-container-layout"><span class="u-align-center u-file-icon u-icon u-icon-4" data-href="/site/comunica">
                            <?= Html::img(Url::to('@web/css_a/images_a/3500690.png'), ['alt' => 'My logo',  ]) ?>     
                            </span>
                              <h5 class="u-text u-text-10">Creare Storia</h5>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="u-size-20">
                <div class="u-layout-row">
                  <div class="u-container-style u-layout-cell u-opacity u-opacity-70 u-palette-2-light-2 u-radius-20 u-shape-round u-size-15 u-layout-cell-3">
                    <div class="u-container-layout u-container-layout-7">
                      <h3 class="u-align-center u-custom-font u-font-pt-sans u-text u-text-palette-4-base u-text-11">Account</h3>
                      <div class="u-align-center u-container-style u-expanded-width u-group u-hover-feature u-group-5">
                        <div class="u-container-layout"><span class="u-align-center u-file-icon u-icon u-icon-5" data-href="/user/account">
                        <?= Html::img(Url::to('@web/css_a/images_a/6195696.png'), ['alt' => 'My logo',  ]) ?>
                        
                        </span>
                          <h5 class="u-text u-text-12">Cambio&nbsp; Password</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="u-container-style u-layout-cell u-opacity u-opacity-70 u-palette-2-base u-radius-20 u-size-15 u-layout-cell-4">
                    <div class="u-container-layout u-container-layout-9">
                      <h3 class="u-align-center u-custom-font u-font-pt-sans u-text u-text-grey-50 u-text-13">Registrazione</h3>
                      <div class="u-align-center u-container-style u-expanded-width u-group u-hover-feature u-group-6">
                        <div class="u-container-layout"><span class="u-align-center u-file-icon u-icon u-icon-6" data-href="/user/admin/utente"> <!-- data-href="/user/admin/createuser"> -->
                        <?= Html::img(Url::to('@web/css_a/images_a/3135768.png'), ['alt' => 'My logo',  ]) ?>
                        </span>
                          <h5 class="u-text u-text-14">Registrare Utente</h5>
                        </div>
                      </div>
                      <div class="u-align-center u-container-style u-expanded-width u-group u-hover-feature u-group-7">
                        <div class="u-container-layout"><span class="u-align-center u-file-icon u-icon u-icon-7" data-href="/user/admin/caregiver">
                        <?= Html::img(Url::to('@web/css_a/images_a/6625313.png'), ['alt' => 'My logo',  ]) ?>
                        
                        </span>
                          <h5 class="u-text u-text-15">Registrare Caregiver</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="u-align-center u-container-style u-layout-cell u-opacity u-opacity-70 u-palette-1-light-2 u-radius-20 u-size-15 u-layout-cell-5">
                    <div class="u-container-layout u-container-layout-12">
                      <h3 class="u-align-center u-custom-font u-font-pt-sans u-text u-text-palette-1-base u-text-16">Statistiche</h3>
                      <div class="u-align-center u-container-style u-expanded-width u-group u-hover-feature u-group-8">
                        <div class="u-container-layout"><span class="u-align-center u-file-icon u-icon u-icon-8" data-href="/avanzamento">
                        <?= Html::img(Url::to('@web/css_a/images_a/5766287.png'), ['alt' => 'My logo',  ]) ?>
                    
                        </span>
                          <h5 class="u-text u-text-17">Grado di avanzamento</h5>
                        </div>
                      </div>
                      <div class="u-align-center u-container-style u-expanded-width u-group u-hover-feature u-group-9">
                        <div class="u-container-layout"><span class="u-align-center u-file-icon u-icon u-icon-9" data-href="/statistiche">
                        <?= Html::img(Url::to('@web/css_a/images_a/2554278.png'), ['alt' => 'My logo',  ]) ?>
                        
                        </span>
                          <h5 class="u-text u-text-18">Gradimento Esercizio/Efficacia</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="u-align-center u-container-style u-custom-color-1 u-layout-cell u-opacity u-opacity-70 u-radius-20 u-size-15 u-layout-cell-6">
                    <div class="u-container-layout u-container-layout-15">
                      <h3 class="u-align-center u-custom-font u-font-pt-sans u-text u-text-palette-1-base u-text-19">Utilità</h3>
                      <div class="u-align-center u-container-style u-expanded-width u-group u-hover-feature u-group-10">
                        <div class="u-container-layout"><span class="u-align-center u-file-icon u-icon u-icon-10"   data-href="/diagnosi/index"> <!-- data-href="/diagnosi/create"> -->
                        <?= Html::img(Url::to('@web/css_a/images_a/4228719.png'), ['alt' => 'My logo',  ]) ?>
                        
                        </span>
                          <h5 class="u-text u-text-20">Inserire diagnosi</h5>
                        </div>
                      </div>
                      <div class="u-align-center u-container-style u-group u-hover-feature u-group-11">
                        <div class="u-container-layout"><span class="u-align-center u-file-icon u-icon u-icon-11" data-href="/appuntamenti">
                        <?= Html::img(Url::to('@web/css_a/images_a/2907150.png'), ['alt' => 'My logo',  ]) ?>
                        
                        </span>
                          <h5 class="u-text u-text-21">Appuntamenti Caregiver</h5>
                        </div>
                      </div>
                      <div class="u-align-center u-container-style u-expanded-width u-group u-hover-feature u-group-12">
                        <div class="u-container-layout"><span class="u-align-center u-file-icon u-icon u-icon-12" data-href="/utenti">
                        <?= Html::img(Url::to('@web/css_a/images_a/2855081.png'), ['alt' => 'My logo',  ]) ?>
                        
                        </span>
                          <h5 class="u-text u-text-22">Anomalie Utente</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!--</div>-->
     <!-- </div> -->
      
      
      
      
      
      
      
      
      
      
      
      
    </section>
    
    
    

</body></html>





