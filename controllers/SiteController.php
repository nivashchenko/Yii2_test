<?php

        
//        https://github.com/ornicar/php-github-api/blob/master/README.markdown
//        https://github.com/KnpLabs/php-github-api/tree/master/doc

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\EntryForm;
use app\models\SearchForm;
use yii\base\ErrorException;


class SiteController extends Controller
{
    public function actionIndex()
    {
        Yii::$app->session->set('pageId', 'Main');
        
        $model = new SearchForm();
        $model->repo('yiisoft', 'yii2');

        return $this->render('repo', array('model' => $model));  
    }
    
    public function actionRepo($group, $project)
    {
        Yii::$app->session->set('pageId', 'Browser');
        
        $model = new SearchForm();
        $model->repo($group, $project);
        
        return $this->render('repo', array('model' => $model));
    }
    
    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
            if ($exception !== null) {
                return $this->render('error', ['exception' => $exception]);
            }
    }
}
