<?php

namespace app\controllers;

use yii\rest\ActiveController;

class LikeController extends ActiveController
{
    public $modelClass = 'app\models\Like';
    
//    public function actionLike($id)
//    {
//        return $this->modelClass->find($id);
//    }
}