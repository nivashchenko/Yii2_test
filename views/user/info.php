<?php

use yii\helpers\Html;

?>

<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <img src="<?=$data['avatar_url']?>" class="img-thumbnail img-responsive" />
        </div>

        <div class="col-lg-6 col-lg-offset-1">
            <h2><?=$data['name']?></h2>
            <br />
            <p>
                <?=$data['login']?>
            </p>
            <p>
                Company: <?=$data['company']?>
            </p>
            <p>
                Blog: <a href="<?=$data['blog']?>"><?=$data['blog']?></a>
            </p>
            <p>
                Followers: <?=$data['followers']?>
            </p>
        </div>
    </div>
</div>

