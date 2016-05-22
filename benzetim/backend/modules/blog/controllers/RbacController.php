<?php

namespace backend\modules\blog\controllers;

use Yii;
use common\modules\auth\models\AuthItem;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * RbacController implements the CRUD actions for AuthItem model.
 */
class RbacController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }


public function actionCreate_rule()
{

    $auth = Yii::$app->authManager;

// add the rule
$rule = new \common\modules\auth\rbac\AuthorRule;
$auth->add($rule);

// add the "updateOwnPost" permission and associate the rule with it.
$updateOwnPost = $auth->createPermission('updateOwnPost');
$updateOwnPost->description = 'Update own post';
$updateOwnPost->ruleName = $rule->name;
$auth->add($updateOwnPost);

 $updatePost = $auth->createPermission('blog/news/update');
// "updateOwnPost" will be used from "updatePost"
$auth->addChild($updateOwnPost, $updatePost);

$author = $auth->createPermission('author');
// allow "author" to update their own posts
$auth->addChild($author, $updateOwnPost);
}


public function actionAssigment()
{
    $auth = Yii::$app->authManager;
      $author = $auth->createRole('author');
       $admin = $auth->createRole('admin');
       $auth->assign($author, 2);
        $auth->assign($admin, 1);
}

public function actionCreate_role()
{
$auth = Yii::$app->authManager;

            $index = $auth->createPermission('blog/news/index');
       

        // add "updatePost" permission
        $create = $auth->createPermission('blog/news/create');
       

        $view = $auth->createPermission('blog/news/view');
         $update = $auth->createPermission('blog/news/update');
      

         $delete = $auth->createPermission('blog/news/delete');
       
         $null = $auth->createPermission('site/index');
           $yetkiview = $auth->createPermission('blog/auth/index');
             $yetkigoster = $auth->createPermission('blog/auth/view');
            $yetkicreate = $auth->createPermission('blog/auth/create');
             $yetkiupdate = $auth->createPermission('blog/auth/update');
              $yetkidelete = $auth->createPermission('blog/auth/delete');

               $categoryview= $auth->createPermission('blog/category/index');
                $categorygoster= $auth->createPermission('blog/category/view');
               $categorycreate= $auth->createPermission('blog/category/create');
               $categoryupdate= $auth->createPermission('blog/category/update');
               $categorydelete= $auth->createPermission('blog/category/delete');
                $haberview= $auth->createPermission('blog/site/news');
       
       
     // add "author" role and give this role the "createPost" permission
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $index);
         $auth->addChild($author, $create);
          $auth->addChild($author, $view);
           $auth->addChild($author, $null);
            $auth->addChild($author, $yetkiview);

               $auth->addChild($author, $categoryview);
            $auth->addChild($author, $haberview);
                
                  
         
        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
         $auth->addChild($admin, $author);
        $auth->addChild($admin, $update);
          $auth->addChild($admin, $delete);
          $auth->addChild($admin, $yetkicreate);
          $auth->addChild($admin, $yetkiupdate);
          $auth->addChild($admin, $yetkidelete);
          $auth->addChild($admin, $categorycreate);
          $auth->addChild($admin, $categoryupdate);
          $auth->addChild($admin, $categorydelete);
           $auth->addChild($author, $yetkigoster);
                 $auth->addChild($author, $categorygoster);
         
        
}


         public function actionCreate_permission()
         {
       $auth = Yii::$app->authManager;

        // add "createPost" permission
        $index = $auth->createPermission('blog/news/index');
        $index->description = 'create a index';
        $auth->add($index);

        // add "updatePost" permission
        $create = $auth->createPermission('blog/news/create');
        $create->description = 'Create post';
        $auth->add($create);

        $view = $auth->createPermission('blog/news/view');
        $view->description = ' view post';
        $auth->add($view);

         $update = $auth->createPermission('blog/news/update');
        $update->description = ' update post';
        $auth->add($update);

         $delete = $auth->createPermission('blog/news/delete');
        $delete->description = ' delete post';
        $auth->add($delete);

 $null = $auth->createPermission('site/index');
        $null->description = ' null';
        $auth->add($null);

        $yetkiview = $auth->createPermission('blog/auth/index');
        $yetkiview->description = ' view yetki';
        $auth->add($yetkiview);

         $yetkigoster = $auth->createPermission('blog/auth/view');
        $yetkigoster->description = ' goster yetki';
        $auth->add($yetkigoster);

        $yetkicreate = $auth->createPermission('blog/auth/create');
        $yetkicreate->description = ' create yetki';
        $auth->add($yetkicreate);

        $yetkiupdate = $auth->createPermission('blog/auth/update');
        $yetkiupdate->description = ' update yetki';
        $auth->add($yetkiupdate);

        $yetkidelete = $auth->createPermission('blog/auth/delete');
        $yetkidelete->description = ' delete yetki';
        $auth->add($yetkidelete);

          $categoryview = $auth->createPermission('blog/category/index');
        $categoryview->description = ' view category';
        $auth->add($categoryview);

         $categorygoster = $auth->createPermission('blog/category/view');
        $categorygoster->description = ' goster category';
        $auth->add($categorygoster);

         $categorycreate = $auth->createPermission('blog/category/create');
        $categorycreate->description = ' create category';
        $auth->add($categorycreate);

         $categoryupdate = $auth->createPermission('blog/category/update');
        $categoryupdate->description = 'update category';
        $auth->add($categoryupdate);

         $categorydelete = $auth->createPermission('blog/category/delete');
        $categorydelete->description = ' delete category';
        $auth->add($categorydelete);

         $haberview = $auth->createPermission('blog/site/news');
        $haberview->description = ' select frontendnews ';
        $auth->add($haberview);

         



         }
    /**
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AuthItem::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
