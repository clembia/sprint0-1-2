<?php

/** @var yii\web\View $this */

$this->title = 'Oratio Therapy System';
use app\assets\UtenteAsset;
UtenteAsset::register($this);


?>
<br><br>
<div class="site-index">
<section class="u-align-center u-clearfix u-image u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-section-1" id="carousel_59cc" data-image-width="1980" data-image-height="1114">
      <div class="u-clearfix u-gutter-0 u-layout-wrap u-layout-wrap-1">
        <div class="u-layout" >
          <div class="u-layout-row" >
            <div class="u-container-style u-layout-cell u-left-cell u-shape-rectangle u-size-20-lg u-size-20-xl u-size-23-md u-size-23-sm u-size-23-xs u-size-xs-60 u-layout-cell-1" src="">
              <div class="u-container-layout u-container-layout-1">
                <h1 class="u-align-center u-text u-text-white u-text-1">Benvenuto</h1>
                <h1 class="u-align-left u-text u-text-palette-2-base u-text-2" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-direction="Left" data-animation-delay="250"> <?= \Yii::$app->user->identity->nome ?> <?= \Yii::$app->user->identity->cognome ?></h1>
                <p class="u-align-justify u-text u-text-body-alt-color u-text-3" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-direction="Up" data-animation-delay="250">Il tuo logopedista ha preparato una serie di esercizi di cui ti sarà fornita la soluzione corretta.&nbsp;<br>Ti invitiamo ad esegurli entro 3 giorni dalla data di assegnazione.&nbsp;
                </p>
                <a href="/exerciseutente/" class="u-border-none u-btn u-btn-round u-button-style u-palette-3-base u-radius-10 u-text-palette-1-base u-btn-1" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-direction="Up" data-animation-delay="500">ESEGUI ESERCIZI</a>
              </div>
            </div>
            <div class="u-container-style u-image u-layout-cell u-right-cell u-size-37-md u-size-37-sm u-size-37-xs u-size-40-lg u-size-40-xl u-size-xs-60 u-image-1" data-image-width="1422" data-image-height="900">
              <div class="u-container-layout u-container-layout-2" src=""></div>
            </div>
          </div>
        </div>
      </div>
    </section>
 
</div>