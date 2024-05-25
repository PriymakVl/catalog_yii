<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class ProductController extends BaseController
{
    public $layout = 'admin';

    public function actionIndex()
    {
        $products = Product::find()->all();
        return $this->render('index', compact('products'));
    }

    public function actionView($id)
    {
        $product = Product::findOne($id);
        return $this->render('view', compact('product'));
    }

    public function actionAdd()
    {
        $product = new Product(['scenario' => 'create']);

        if (Yii::$app->request->isGet) {
            return $this->render('add', compact('product'));
        }
        $product->load($this->request->post());

        $product->img = $this->uploadImage($product);
        
        if ($product->save()) {
            Yii::$app->session->setFlash('success', 'Товар успешно добавлен!');
            // return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect('index');
        }
        Yii::$app->session->setFlash('error', 'Ошибка при добавлении товара!');
        return $this->goBack();

        // метод setMessage
        // $result = $model->save();
        // $this->setMessage($result, 'add');
        // $result ? $this->redirect(['view', 'id' => $model->id]) : $this->goBack();
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

    public function actionEdit($id)
    {
        $product = Product::findOne($id);
        $product->scenario = 'update';

        if ($this->request->isGet) {
            return $this->render('edit', ['product' => $product]);
        }

        $product->load($this->request->post());
        $filename = $this->uploadImage($product);
        $product->img = $filename ? $filename : $product->img;
        $result  = $product->save();
        $this->setMessage($result, 'edit');
        if ($result) {
            // return $this->redirect(['view', 'id' => $product->id]);
            return $this->redirect('/product/index');
        } else {
            return $this->goBack();
        }
    }

    public function actionDelete($id)
    {
        $result = Product::findOne($id)->delete();
        if ($result) {
            Yii::$app->session->setFlash('success', 'Товар успешно удален!');
        } 
        else {
            Yii::$app->session->setFlash('error', 'Ошибка при удалении товара!');
        }
        // $this->setMessage($result, 'delete');
        $this->redirect(['index']);
    }

}
