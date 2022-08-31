<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Parole;
use yii\helpers\Url;
use  app\models\Exercise;

/* @var $this yii\web\View */
/* @var $model app\models\Exercisesvolto */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
.t {
  border-spacing: 30px;
  border-collapse: separate;
}
.c {
    text-align: center;
}

</style>





<div class="exercisesvolto-form">

    <?php $form = ActiveForm::begin(['method' => 'POST']); ?>
    
    
  
    
    <?php $model->dataAss = date("d-M-Y",strtotime($model->dataAss )); ?>

<?= $form->field($model, 'dataAss')->textInput(['readonly'=> true])   ?>

<?php 


    //$model->idEsercizio = $model->svolto;
    $d =  Exercise::findone($model->idEsercizio);
    if ($d['rispCorretta']=='parola1')
        $path="/esercizi/mp3/". Parole::findOne($d['idParola1'])->audio;
    else
        $path="/esercizi/mp3/". Parole::findOne($d['idParola2'])->audio;
        $ii1 ='@web/esercizi/img/'.  (Parole::findOne($d['idParola1']))->immagine;
        $ii2 ='@web/esercizi/img/'.  (Parole::findOne($d['idParola2']))->immagine;   
        
?>


<div id="div_im">
    <table class="t" id="ww" >
    <tr>  
        <td>
        <?=  Html::img(Url::to($ii1), ['alt' => 'My logo']) ;?>
        </td>
        <td>
            
    <figure>
        <figcaption> &nbsp; &nbsp;<strong>&nbsp  Ascolta la parola da pronunciare</strong></figcaption>
       <audio controls>
        <source src="<?php echo $path; ?>"  type="audio/mp3">
               Your browser does not support the
                <code>audio</code> element.
        </audio>
    </figure>
        </td>
    <td>
        <?=  Html::img(Url::to($ii2), ['alt' => 'My logo']) ;?>
        </td>
  </tr>
  <tr>
    <td class="c">IMMAGINE A</td>
    <td></td>
    <td class="c">IMMAGINE B</td>
  </tr>
        
    </table>
    <?php
    echo $form->field($model, 'PunteggioOtt')->dropDownList(['0' => 'IMMAGINE A', '1' => 'IMMAGINE B'])->label("Scegli l'immagine della parola pronunciata"); ?>
 </div>
 <br>

   <?=  $form->field($model, 'dataSvolg')->textInput( ['readonly'=> true, 'value' => date("d-m-Y")])->label ('Data in cui sta completando l\'esercizio')   ?>

   <center> <p>Al fine di migliorare la nostra attivita', ti chiediamo di scegliere tra le diverse opzioni qual'è il tuo indice di gradimento? </p></center>
        <div class="row justify-content-center">
        <div class="col-lg-3 mx-auto d-flex flex-column align-items-center" align="center">
        <?= Html::img('@web/css_a/images_a/emoji_satisfaction_survey.png', ['width'=>'70%']);?>
        <div class="col-md-6">
	    <?php $model->IndiceGradimento =100; ?>
        <?=$form->field($model, 'IndiceGradimento')->radioList([20=>'',40=>'',60=>'',80=>'',100=>'' ],['labelOptions' => ['style' => 'display:inline-block', 'separator'=>'----']])->label(false)?>
    </div>
        </div>
        </div>
    

     






    <div class="form-group">
        <?= Html::submitButton('Invia al Logopedista', ['class' => 'btn btn-success', 'Name' => 'PreviewButton'] ) ?>
    </div>

    <?php ActiveForm::end();        ?>
</div>
