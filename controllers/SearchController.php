<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\EntryForm;
use app\models\SearchForm;
use yii\base\ErrorException;

class SearchController extends Controller
{
    public function actionIndex($search)
    {
        Yii::$app->session->set('pageId', 'Search');
        
        $model = new SearchForm();
        $res = $model->search($search);
        
        return $this->render('search', array('data' => $res));
    }
}
