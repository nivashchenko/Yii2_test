<?php

namespace app\models;

use yii\base\Model;
use app\module\Github\Client;

class SearchForm extends Model
{
    public $searchStr;
    private $repos;
    private $contributors;
    
//    public function rules()
//    {
//        return [
//            [['searchStr'], 'required'],
//        ];
//    }
    
    public function main()
    {
        $client = new Client();

        $repos = $client->api('search')->repositories('yii2 language:php');
        

        foreach ($repos['items'] as $value) 
        {
            if ( 'yiisoft/yii2' == $value["full_name"] )
            {
                $contributors = $client->api('repo')->contributors('yiisoft', 'yii2');
                $this->repos = $value;
                $this->contributors = $contributors;
                break;
            }
            else
                return false;
        }
        return true;
    }
    
    public function search($str)
    {
        $client = new Client();

        $repos = $client->api('search')->repositories($str . ' language:php');
//        $code = $client->api('search')->code($str);
        $issues = $client->api('search')->issues($str);
        $users = $client->api('search')->users($str);
        
        $repos = $repos ? $repos : array();
        $code = $code ? $code : array();
        $issues = $issues ? $issues : array();
        $users = $users ? $users : array();
        
        $result = array_merge($repos, $code, $issues, $users);
        
        return $result;
    }
    
    public function getRepos() 
    {
        return $this->repos;
    }
    
    public function getContributors()
    {
        return $this->contributors;
    }
}