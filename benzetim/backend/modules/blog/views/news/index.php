<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Controller;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
			 
			],

           
            'new_title',
            'category',
            'content',
          array(
'format' => 'image',
'label' => 'Image',
 'contentOptions'=>[ 'style'=>'width: 10px'], 
'value'=>function($data) { 
              return $data->imageurl;  
			  },

   ),
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
		
</div>
