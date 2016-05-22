<?php

use yii\widgets\ListView;
echo \yii\widgets\ListView::widget([

         'dataProvider' => $provider,
         'summary' => 	false,
         'itemView' => function($model)
         {
         	return '<div class="list-group">
         	<a href ="#" class="list-group-item active">
         	<h4 class="list-group-item heading "> '.$model ->id.' </h4>
         	  <p class="list-group-item text">'.$model  ->new_title.' </p>
         <p class="list-group-item text">'.$model ->category.' </p>
           <p class="list-group-item text">'.$model ->content.' </p>
        
        </a>
        </div>';
    }
	]);



?>