<?php

        
//        https://github.com/ornicar/php-github-api/blob/master/README.markdown
//        https://github.com/KnpLabs/php-github-api/tree/master/doc

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\EntryForm;
use app\models\SearchForm;


class SiteController extends Controller
{
    public function actionIndex()
    {
        $this->redirect('/site/main');
//        return $this->render('index');
        
    }
    
    public function actionMain()
    {
        Yii::$app->session->set('pageId', 'Main');
        
        $model = new SearchForm();
        $model->main();

        return $this->render('repo', array('model' => $model));

    }
    
    public function actionSearch($search)
    {
        Yii::$app->session->set('pageId', 'Search');
        
        $model = new SearchForm();
        $res = $model->search($search);
        return $this->render('search', array('data' => $res));
    }
}
