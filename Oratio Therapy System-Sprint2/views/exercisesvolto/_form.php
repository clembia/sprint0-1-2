<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
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

</style>

 <script>

    function prova()
    {
        alert("prova");
    }

 </script>




<div class="exercisesvolto-form">

    <?php $form = ActiveForm::begin(['method' => 'POST']); ?>
    
    
  
    

    <?= $form->field($model, 'cfUtente')->dropDownList(ArrayHelper::map($g, 'codFisc' , 'codFisc'),['prompt'=>'Seleziona Codice Fiscale utente da associare', ['maxlength' => true]]) ?>

    <?= $form->field($model, 'idEsercizio')->dropDownList($h,['prompt'=>'Seleziona l\'esercizio da assegnare', 'id'=>'idEsercizio',

//'onchange' => '$("#svolto").val($(this).val());',
//$("#svolto").val($("#idEsercizio option:selected").text()); $("#div_im").show();
//'onchange'=>'$.post("'.Yii::$app->urlManager->createUrl('exercisesvolto/update?idAssegn=').'"+$(this).val() );' 
'onchange'=>'this.form.submit()',
])->label('id Esercizio da assegnare'); //'onchange'=>'this.form.submit()' 'onchange'=>'window.location.reload()'


?>

<?= $form->field($model, 'dataAss')->textInput(['readonly'=> true, 'value' => date("Y-m-d")])   ?>

<?php 


if ($model->idEsercizio)
{ 
    //$model->idEsercizio = $model->svolto;
    $d =  Exercise::findone($model->idEsercizio);
    if ($d['rispCorretta']=='parola1')
        $path="/esercizi/mp3/". Parole::findOne($d['idParola1'])->audio;
    else
        $path="/esercizi/mp3/". Parole::findOne($d['idParola2'])->audio;
        $ii1 ='@web/esercizi/img/'.  (Parole::findOne($d['idParola1']))->immagine;
        $ii2 ='@web/esercizi/img/'.  (Parole::findOne($d['idParola2']))->immagine;   
        
}       
else
   {
    $ii1 = '@web/esercizi/vuota.png';
    $ii2 = '@web/esercizi/vuota.png';
    $path="";
   }

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
    </table>
    <br>

 </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'Name' => 'PreviewButton'] ) ?>
    </div>

    <?php ActiveForm::end(); 


        ?>
</div>
