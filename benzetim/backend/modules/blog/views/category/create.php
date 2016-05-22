<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\blog\models\Categoryname */

$this->title = 'Create Categoryname';
$this->params['breadcrumbs'][] = ['label' => 'Categorynames', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoryname-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
