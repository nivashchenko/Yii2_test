<?php

namespace app\controllers;

use Yii;
use yii\rest\ActiveController;

class LikeController extends ActiveController
{
    public $modelClass = 'app\models\Like';
    
    
    
    public function actionCreate() {
        $model = new $this->modelClass;
        if ( $model->validate() )
        {
            
            $res = $model->findOne(Yii::$app->request->post('id'));
            if ( is_int($res->id) )
            {
                $res->status = Yii::$app->request->post('status');
                $result = $res->update();
            }
            else 
            {
                $model->id = Yii::$app->request->post('id');
                $model->status = Yii::$app->request->post('status');
                $result = $model->insert();
            }
        }
        return $result;
    }
    
    public function actions()
    {
        $actions = parent::actions();
    
        unset($actions['create']);
        unset($actions['delete']);
        unset($actions['index']);
        unset($actions['update']);
        unset($actions['options']);
        return $actions;
    }
}