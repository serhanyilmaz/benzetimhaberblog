<?php

namespace backend\modules\blog\controllers;

use Yii;
use backend\modules\blog\models\News;
use backend\modules\blog\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\ForbiddenHttpException;
use yii\filters\AccessControl;
/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
         $behaviors['access'] = [
             'class' => AccessControl::className(),
             'rules' => [
                 [
                         'allow' => true,
                         'roles' => ['@'],
                         'matchCallback' => function ($rule, $action) {
                        
                        $module                 = Yii::$app->controller->module->id; 
                        $action                 = Yii::$app->controller->action->id;
                        $controller         = Yii::$app->controller->id;
                        $route                     = "$module/$controller/$action";
                        $post = Yii::$app->request->post();
                        if (\Yii::$app->user->can($route)) {
                             return true;
                        }
                        }
                 ],
             ],
           ];         return $behaviors;
    }

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        

  
 $model = new News();

        if($model->load(Yii::$app->request->post())){
    $model->file = UploadedFile::getInstance($model, 'file');
    $save_file = '';
    if($model->file){
        $imagepath = 'uploads/logo/'; // Create folder under web/uploads/logo
        $model->logo = $imagepath .rand(10,100).'-'.$model->file->name;
        $save_file = 1;
    }
    
    if ($model->save()) {
            if($save_file){
                $model->file->saveAs($model->logo);
            }
        return $this->redirect(['view', 'id' => $model->id]);
    } 
}else {
    return $this->render('create', [
        'model' => $model,
    ]);
} 

  


        
    }


     public function actionAuth()
    {
        $model = new News();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('auth', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
if($model->load(Yii::$app->request->post())){
                  
    $model->file = UploadedFile::getInstance($model, 'file');
    $save_file = '';
    if($model->file){
        $imagepath = 'uploads/logo/';
        $model->logo = $imagepath .rand(10,100).'-'.$model->file->name;
        $save_file = 1;
    }     if ($model->save()) {
        if($save_file){
                $model->file->saveAs($model->logo);
            }
        return $this->redirect(['view', 'id' => $model->id]);
    } 
} else {
    return $this->render('update', [
        'model' => $model,
    ]);
}
    }
public function actionDeleteimg($id, $field)
{
        
      
         $img = $this->findModel($id)->$field;
        if($img){
            if (!unlink($img)) {
            return false;
        }
    }
    
        $img = $this->findModel($id);
        $img->$field = NULL;
        $img->update();
    
        return $this->redirect(['update', 'id' => $id]);
       
}
    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     public function findUserModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

   
}
