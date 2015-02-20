<?php

namespace app\models;

use yii\base\Model;
use app\module\Github\Client;
use app\module\Github\ResultPager;

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
        $this->repo('yiisoft', 'yii2');
        
        return true;
    }
    
    public function repo($group, $project)
    {
        $client = new Client();
        
        $this->contributors = $client->api('repo')->contributors($group, $project);
        $this->repos = $client->api('repo')->show($group, $project);
        
        return true;
    }
    
    public function search($str)
    {
        $client = new Client();

        $repos = $client->api('search')->repositories($str . ' language:php');
        $repos = $repos ? $repos : array('items' => array());
        
        return $repos['items'];
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