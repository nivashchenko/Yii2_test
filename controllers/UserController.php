<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\GitUser;

class UserController extends Controller
{
    private $userInfo;
    
    public function actionInfo($name)
    {
        $model = new GitUser($name);
        
    }
    
    public function actionMain($name)
    {
        
        Yii::$app->session->set('pageId', 'User');
        
        $model = new GitUser($name);
        
        return 'test';

//        return $this->render('repo', array('model' => $model));

    }
}