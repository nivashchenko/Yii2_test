<?php

namespace app\models;

use yii\base\Model;
use app\module\Github\Client;

class SearchForm extends Model
{
    public $searchStr;
    
    public function rules()
    {
        return [
//            [['searchStr'], 'required'],
        ];
    }
    
    public function search()
    {
        $client = new Client();
        $repositories = $client->api('user')->repositories('ornicar');
    }
}