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
    <br>
    <h2> ESERCIZIO PRESENTATO DAL LOGOPEDISTA ALL'UTENTE</h2>
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

//['readonly'=> true, 'value' => function($model)  { return $model->convalida== 0 ? 'Non Superato' : 'Superato';}]
$f = Exercise::findone(['idEsercizio' => $model->idEsercizio])->rispCorretta;
if ($model->PunteggioOtt==0)
  {  $t="<div style='color:red'>L'utente non ha superato l'esercizio. Ha selezionato l'immagine: ";
    if ($f=="parola1") $t=$t . 'B';
     else  $t=$t . 'A';
  }
else 
{    
    $t="<div style='color:green'>L'utente ha superato l'esercizio. Ha selezionato l'immagine: ";
    if ($f=="parola1") $t=$t . 'A';
     else  $t=$t . 'B';
}

      ?>
<H3> <?=  $t    ?> </div>
</H3>
    <?php echo $form->field($model, 'convalida')->dropDownList(['0' => 'NON CONVALIDATO', '1' => 'CONVALIDATO'])->label("Convalida l'esercizio"); ?>
 </div>
 <br>




    <div  class="form-group">
        <?= Html::submitButton('Convalida', ['class' => 'btn btn-success', 'Name' => 'PreviewButton'] ) ?>
    </div>

    <?php ActiveForm::end();        ?>
</div>
