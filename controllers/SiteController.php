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
        return $this->render('index');
    }
    
    public function actionMain()
    {
        Yii::$app->session->set('pageId', 'Main');
        
        $model = new SearchForm();
        $model->main();

        return $this->render('repo', array('model' => $model));

    }

    public function actionHelloWorld()
    {
        return 'Hello World';
    }
    
    public function actionSay($message = 'Hello')
    {
        return $this->render('say', ['message' => $message]);
    }
    
    public function actionTest()
    {
        return 'test';
    }
    
    public function actionEntry()
    {
        $model = new EntryForm;
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // данные в $model удачно проверены

            // делаем что-то полезное с $model ...

            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('entry', ['model' => $model]);
        }
    }
}
