<?php

/** @var yii\web\View $this */


$this->title = 'Verifica';
use app\assets\ValutaAsset;
ValutaAsset::register($this);

?>

<style>
.ro {
  color:red;
}

</style>


<section class="u-align-center u-clearfix u-palette-3-base u-section-1" id="carousel_6e1a">
      <div class="u-clearfix u-sheet u-sheet-1">
        <img class="u-image u-image-default u-image-1" src="/css_a/images_a/Untitled-23.png" alt="" data-image-width="800" data-image-height="747">
        <p class="u-text u-text-body-alt-color u-text-1">Caro utente</p>
        <p class="u-custom-font u-font-montserrat u-text u-text-body-alt-color u-text-2">Il TEST a cui hai risposto ha avuto la seguente valutazione:</p>     
        <p class="u-custom-font u-font-montserrat u-text u-text-custom-color-3 u-text-3" data-animation-name="lightSpeedIn" data-animation-duration="2500" data-animation-direction="" data-animation-delay="1250"><?php echo $cont ?>/5 Corrette</p>
        <p class="u-custom-font u-font-montserrat u-text u-text-palette-2-dark-2 u-text-4">Sarai contattato da un logopedista del nostro staff per discutere il risultato </p>
        <a href="/site/index" class="infinite u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-50 u-btn-1" data-animation-name="pulse" data-animation-duration="1000" data-animation-direction="">PREMI per continuare</a>
      </div>
    </section>

