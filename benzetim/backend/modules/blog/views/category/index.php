<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\blog\models\CategorynameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorynames';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoryname-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Categoryname', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'category',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
