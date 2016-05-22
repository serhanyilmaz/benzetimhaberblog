<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-abaout">
<h1><?= Html::encode($this->title) ?></h1>

<?= GridView::widget([
'dataProvider' => $provider
]);
?>
<code><?=__FILE__?></code>
</div>