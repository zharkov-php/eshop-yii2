<?php

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;
use app\controllers\AppController;

class CategoryController extends AppController
{
    public function actionIndex()
    {
        $hits = Product::find()->asArray()->where(['hit' => '1'])->all();
        return $this->render('index', compact('hits'));
    }

    public function actionView($id)
    {
        $id = Yii::$app->request->get('id');
       // myDebug($id);
        $products = Product::find()->where(['category_id' => $id])->all();
        return $this->render('view', compact('products'));
    }

}
