<?php
namespace app\controllers;

use Yii;
use app\models\Product;
use yii\web\NotFoundHttpException;

class CartController extends BaseController
{

    public function actionView()
    {
        $product_ids = Yii::$app->session->get('cart');
        $products = $product_ids ? Product::findAll($product_ids) : null;
        return $this->render('view', compact('products'));
    }

    public function actionAdd($prod_id) 
    {
        $session = Yii::$app->session;
        // Создаем массив 'cart', если он не существует
        if (!$session->has('cart')) {
            $session->set('cart', []);
        }
        // Добавляем id товара в сессию
        $cart = $session->get('cart');
        // Проверяем, есть ли уже такой товар в корзине
        if (in_array($prod_id, $cart)) {
            Yii::$app->session->setFlash('error', 'Товар есть в корзине!');
        }
        else {
            $cart[] = $prod_id;
            $session->set('cart', $cart);
            Yii::$app->session->setFlash('success', 'Товар добавлен в корзину!');
        }
        $this->goBack();
    }

    

}


