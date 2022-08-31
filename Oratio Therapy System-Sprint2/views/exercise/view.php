<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\models\Parole;
use app\models\Exercisesvolto;

/* @var $this yii\web\View */
/* @var $model app\models\Exercise */

$this->title = "Vista Esercizio - coppie minime";
$this->params['breadcrumbs'][] = ['label' => 'Menù Logopedista', 'url' => ['site/homelogopedista']];
$this->params['breadcrumbs'][] = ['label' => 'Esercizi', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'View nr. ' . $model->idEsercizio;
\yii\web\YiiAsset::register($this);
?>


<style>
.t {
  border-spacing: 30px;
  border-collapse: separate;
}

</style>


<div class="exercise-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    <?php 
        $c1=Exercisesvolto::find()->where(['idEsercizio' => $model->idEsercizio, 'svolto'=>1])->count();
        if ($c1==0)
        {
        echo  Html::a('Update', ['update', 'idEsercizio' => $model->idEsercizio], ['class' => 'btn btn-primary']); 
        echo Html::a('Delete', ['delete', 'idEsercizio' => $model->idEsercizio], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);
        
    }
        ?>
    </p>


    <?php

if ($model->rispCorretta=='parola1')
    $path="/esercizi/mp3/". Parole::findOne($model->idParola1)->audio;
else
    $path="/esercizi/mp3/". Parole::findOne($model->idParola2)->audio;           

?>

<table class="t" >
<tr>  
    <td>
    <?=  Html::img(Url::to('@web/esercizi/img/'.  (Parole::findOne($model->idParola1))->immagine), ['alt' => 'My logo']) ;?>
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
    <?=  Html::img(Url::to('@web/esercizi/img/'.  (Parole::findOne($model->idParola2))->immagine), ['alt' => 'My logo']) ;?>
    </td>
    </tr>  
</table>
<br>





    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idEsercizio',
            //'cflog',
            [
             'label' => 'Parola nr.1',
             'value' =>  Parole::findOne($model->idParola1)->parola , 
            ],
           // 'idParola1',
           [
            'label' => 'Parola nr.2',
            'value' =>  Parole::findOne($model->idParola2)->parola , 
            
           ],
           [
            'attribute' => 'rispCorretta',
            'filter'=>array("1"=>"Parola1","2"=>"Parola2"),

           ] 
           ,
        ],
    ]) ?>

</div>
