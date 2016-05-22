<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\blog\models\Categoryname;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

   <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'new_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category')->dropDownList(

ArrayHelper::map(Categoryname::find()->all(),'category_id','category'),
['prompt'=>'Kategori Seç']
    ) ?>

    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'file')->fileInput() ?>



<?php
if ($model->logo) {
    echo '<img src="'.\Yii::$app->request->BaseUrl.'/'.$model->logo.'" width="90px">&nbsp;&nbsp;&nbsp;';
    echo Html::a('Delete Logo', ['deleteimg', 'id'=>$model->id, 'field'=> 'logo'], ['class'=>'btn btn-danger']).'<p>';
}
?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
