<?php

namespace app\models;

use \yii\db\ActiveRecord;

class Like extends ActiveRecord
{
    
    public function rules()
    {
        return [
//            [['id', 'status'], 'required'],
//            ['id', 'string'],
//            ['status', 'string'],
//            ['status' => ['true', 'false']]
        ];
    }
    
}