<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\Parole;


/* @var $this yii\web\View */
/* @var $model app\models\Exercise */
/* @var $form yii\widgets\ActiveForm */


?>




<div class="exercise-form">


<?php $form = ActiveForm::begin([
        ]); //'enableAjaxValidation' => true?>  

    
    <?= $form->field($model, 'cflog')->textInput(['maxlength' => true, 'value'=>Yii::$app->user->identity->codFisc, 'readonly' => 'true'])->label("Logopedista") ?>


<?= $form->field($model, 'idParola1')->dropDownList($list,['prompt'=>'Seleziona la prima parola', 'id'=>'uno',
 'onchange' => 'this.form.submit()'
]); ?>

    <?php if ($model->idParola1) 
         
        $p= '@web/esercizi/img/'. (Parole::findOne($model->idParola1))->immagine;
   else
        $p = '@web/esercizi/vuota.png';

         echo  Html::img(Url::to($p), ['alt' => 'My logo',  'id' => 'img1' ]) ;
     ?>

<?php

    if ($model->idParola1)
        $path="/esercizi/mp3/". Parole::findOne($model->idParola1)->audio;
    else
        $path="/esercizi/vuoto.mp3";            


?>



<figure>
    <figcaption>Ascolta la parola:</figcaption>
   <audio controls>
    <source src="<?php echo $path; ?>"  type="audio/mp3">
           Your browser does not support the
            <code>audio</code> element.
    </audio>
</figure>

    



    <?= $form->field($model, 'idParola2')->dropDownList($list,['prompt'=>'Seleziona la seconda parola',
    'onchange' => 'this.form.submit()'
    ]) ?>

<?php  if ($model->idParola2)

             $p= '@web/esercizi/img/'. (Parole::findOne($model->idParola2))->immagine;
        else
             $p = '@web/esercizi/vuota.png';

        echo  Html::img(Url::to($p), ['alt' => 'My logo',  'id' => 'img2' , ]) ; 
     
     ?> 

<?php

    if ($model->idParola2)

            $path="/esercizi/mp3/". Parole::findOne($model->idParola2)->audio;
    else
            $path="/esercizi/vuoto.mp3";            

?>

<figure>
    <figcaption>Ascolta la parola:</figcaption>
   <audio controls>
    <source src="<?php echo $path; ?>"  type="audio/mp3">
           Your browser does not support the
            <code>audio</code> element.
    </audio>
</figure>





<br>
   

    <?= $form->field($model, 'rispCorretta')->dropDownList([ 'parola1' => 'Parola1', 'parola2' => 'Parola2', ], ['prompt' => 'Parola che sarà pronunciata']) ; ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'Name' => 'PreviewButton'] ) ?>
    </div>

    
    <?php ActiveForm::end(); ?>



</div>









