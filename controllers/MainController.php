<?php

namespace app\controllers;

use app\models\Product;
use yii\data\Pagination;

class MainController extends \yii\web\Controller
{
    public $layout = 'main';
    
    public function actionIndex()
    {
        // $products = Product::find()->all();
        $query = Product::find();
        $p = new Pagination(['totalCount' => $query->count(), 'pageSize' = 3]);
        $products = $query->offset($p->offset)->limit($p->limit)->all();
        return $this->render('index', ['products' => $products, 'p' => $p]);
    }

    public function actionView($id)
    {
        $product = Product::findOne($id);
        return $this->render('view', compact('product'));
    }

    public function actionCart()
    {
        return $this->render('cart');
    }

}
