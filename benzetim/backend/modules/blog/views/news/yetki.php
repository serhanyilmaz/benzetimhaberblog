<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\modules\blog\models\User;
use backend\modules\blog\models\AuthItem;
/* @var $this yii\web\View */
/* @var $model backend\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

   <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    
<h4 class="list-group-item-heading">Kullanıcı Adı</h4>
<?= $form->field($model, 'category')->dropDownList(

ArrayHelper::map(User::find()->all(),'id','username'),
['prompt'=>'']
) ?>
<h4 class="list-group-item-heading">Verilmesi İstenen Yetki</h4>
<?= $form->field($model, 'category')->dropDownList(

ArrayHelper::map(AuthItem::find()->all(),'id','name'),
['prompt'=>'']
) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
