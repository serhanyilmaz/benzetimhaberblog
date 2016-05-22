<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

   <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'new_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category')->dropDownList([ 'Akıllı Cihazlar' => 'Akıllı Cihazlar', 'Bilgisayar' => 'Bilgisayar', 'Giyilebilir Teknoloji' => 'Giyilebilir Teknoloji', 'Donanım Birimleri' => 'Donanım Birimleri', 'Diğer Haberler' => 'Diğer Haberler', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>
	
<?php
if ($model->logo) {
    echo '<img src="'.\Yii::$app->request->BaseUrl.'/'.$model->logo.'" width="90px">&nbsp;&nbsp;&nbsp;';
  
}
?>

    

    <?php ActiveForm::end(); ?>

</div>
