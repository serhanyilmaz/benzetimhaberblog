<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\blog\models\News */

$this->title = 'Yetki Oluşturma';
$this->params['breadcrumbs'][] = ['label' => 'Auth', 'url' => ['rbac/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('yetki', [
        'model' => $model,
    ]) ?>

</div>
