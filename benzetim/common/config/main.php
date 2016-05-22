<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
   'modules' => [
        'auth' => [
            'class' => 'common\modules\auth\Module',
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager', 
             'defaultRoles' => ['site/index'], 
	    // here define your roles
            //'authFile' => '@console/data/rbac.php' //the default path for rbac.php | OLD CONFIGURATION
            
            
	     
        ],
      
    ],
];
