<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\EntryForm;

use app\module\Github\Client;


class SiteController extends Controller
{
    public function actionIndex()
    {
        return "test";
        return $this->render('index');
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
        
        Yii::$app->session->set('pageId', 'Main');
        
        $client = new Client();
        
        $repositories = $client->api('user')->repositories('ornicar');
        
//        $AuthGitHub = $github->authenticate(nivashchenko, 'Qeyuio00', AUTH_HTTP_PASSWORD);
//        
//        $repositories = $client->api('user')->repositories('ornicar');
//        
//        var_dump($AuthGitHub);
        
        var_dump($repositories);
        
//        https://github.com/ornicar/php-github-api/blob/master/README.markdown

        
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
