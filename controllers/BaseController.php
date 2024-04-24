<?php

namespace app\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Json; 

class BaseController extends \yii\web\Controller
{


    protected function setMessage($result, $key)
    {
        $fileContent = file_get_contents('../messages.json');
        $messages = Json::decode($fileContent); 
        $type = $result ? 'success' : 'error';
        $text = $messages[$type][$key];
        Yii::$app->session->setFlash($type, $text);
        // if ($result) {
        //     $text = $messages['success'][$key];
        //     Yii::$app->session->setFlash('success', $text);
        // } else {
        //     $text = $messages['error'][$key];
        //     Yii::$app->session->setFlash('error', $text);
        // }
        // dd($text);
    }
}
