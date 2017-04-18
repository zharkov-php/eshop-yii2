<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Category;
use app\models\Product;
use Yii;

class AppController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
