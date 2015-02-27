<?php

namespace app\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\Response;

class LikeController extends ActiveController
{
    public $modelClass = 'app\models\Like';
    
    public function actionCreate() {
        $model = new $this->modelClass;
        if ( $model->validate() )
        {
            
            $res = $model->findOne(Yii::$app->request->post('id'));
            
            if ( isset($res) && is_int($res->id) )
            {
                if ( true == $res->status )
                {
                    $value = 'Like';
                    $res->value = $value;
                    $res->status = false;
                }
                else
                {
                    $value = 'UnLike';
                    $res->value = $value;
                    $res->status = true;
                }
                $result = $res->update();
            }
            else 
            {
                $model->id = Yii::$app->request->post('id');
                $value = 'UnLike';
                $model->value = $value;
                $model->status = true;
                $result = $model->insert();
            }
        }
        return $value;
    }
    
    public function actions()
    {
        $actions = parent::actions();
    
        unset($actions['create']);
        unset($actions['delete']);
//        unset($actions['index']);
        unset($actions['update']);
        unset($actions['options']);
//        unset($actions['view']);
        return $actions;
    }
}