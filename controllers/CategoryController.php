<?php

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;
use app\controllers\AppController;
use yii\data\Pagination;

class CategoryController extends AppController
{
    public function actionIndex()
    {
        $hits = Product::find()->asArray()->where(['hit' => '1'])->all();
        $this->setMeta('my title', 'my keywords', 'my description');

        return $this->render('index', compact('hits'));
    }

    public function actionView($id)
    {
        $id = Yii::$app->request->get('id');
       // myDebug($id);
       // $products = Product::find()->where(['category_id' => $id])->all();
        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 2, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $category = Category::findOne($id);
        $this->setMeta('E-SHOPPER | ' . $category['name'], $category['keywords'], $category['description']);
        return $this->render('view', compact('products', 'pages', 'category'));
    }

}
