<?php

namespace app\models;

use yii\base\Model;
use app\module\Github\Client;

class GitUser
{
    private $userInfo;
    
    public function __construct($name)
    {
        $client = new Client();
        $users = $client->api('user')->show($name);
    }
    
}
