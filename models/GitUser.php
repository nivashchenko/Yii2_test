<?php

namespace app\models;

use yii\base\Model;
use app\module\Github\Client;

class GitUser
{
    private $client;
    private $userInfo;
    private $name;
    
    public function __construct()
    {
        $this->client = new Client();
    }
    
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getInfo()
    {
        $this->userInfo = $this->client->api('user')->show($this->name);
        return $this->userInfo;
    }
    
}
