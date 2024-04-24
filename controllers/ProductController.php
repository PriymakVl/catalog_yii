<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use app\models\ProductSearch;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends BaseController
{
    public $layout = 'admin';


    /**
     * Lists all Product models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Product(['scenario' => 'create']);
        if (Yii::$app->request->isGet) {
            return $this->render('create', compact('model'));
        }
       
        $model->load($this->request->post());
        $model->img = $this->uploadImage($model);
        
        // if ($model->save()) {
        //     Yii::$app->session->setFlash('success', 'Товар успешно добавлен!');
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }
        // Yii::$app->session->setFlash('error', 'Ошибка при добавлении товара!');
        // return $this->goBack();
        $result = $model->save();
        $this->setMessage($result, 'add');
        $result ? $this->redirect(['view', 'id' => $model->id]) : $this->goBack();
    }

    public function uploadImage($model) 
    {
        $file = UploadedFile::getInstance($model, 'img');
        if (!$file) return;
        $fileName = time() . '.' . $file->extension;
        $uploadPath = Yii::getAlias('@webroot/img/') . $fileName;
        if ($file->saveAs($uploadPath)) {
            return $fileName;
        };
        Yii::$app->session->setFlash('error', 'Ошибка при добавлении файла!');
        return $this->goBack();
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update';

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $filename = $this->uploadImage($model);
            $model->img = $filename ? $filename : $model->img;
            $result  = $model->save();
            $this->setMessage($result, 'edit');
            if ($result) {
                return $this->redirect(['view', 'id' => $model->id])
            } else {
                return $result ?  : $this->goBack();
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $result = $this->findModel($id)->delete();
        $this->setMessage($result, 'delete');
        $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
