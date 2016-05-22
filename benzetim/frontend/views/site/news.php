<?php
use yii\helpers\Html;
$this->title = 'Haber Sayfası';
$this->params['breadcrumbs'][] = $this->title;

echo \yii\widgets\ListView::widget([

'dataProvider' => $provider,
'itemView' => function($model)
{

	return '

<div class="list-group">
  <a href="#" class="list-group-item active">
  <img  class="list-group-item-image" src="/12052016advanced/backend/web/'.$model->logo.'" alt="">
  <br>
  <br>
    <h2 class="list-group-item-heading">Haber Başlığı:  '.$model->new_title.'</h4>
    <p class="list-group-item-text" style="textsize:15px;"><h5 class=""list-group-item-heading" >  Haber Kategorisi: '.$model->category.'</h5></p>
     <p class="list-group-item-text"> <h5 class=""list-group-item-heading" >  Haber İçeriği:  '.$model->content.' </h5></p>
   <p><a class="btn btn-default" href="/12052016advanced/backend/web/'.$model->logo.'">Tıklayınız</a></p>

      
  </a>
</div>
	';


}

	]);

?>
