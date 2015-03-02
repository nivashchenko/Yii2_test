<?php

use yii\helpers\Html;

$data = $model->getRepos();
$contributors = $model->getContributors();

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <h2><?= $data['full_name'] ?></h2>
            <br />
        </div>
        <div class="col-lg-6 col-md-6">
            <h2><?= Html::encode('Contributors') ?></h2>
            <br />
        </div>
    </div>

    <div class="row row-height">
        <div class="col-lg-6 col-md-6 height-480">
            <p>Description: <?= $data['description'] ?> </p>
            <p>Watchers: <?= $data['watchers'] ?> </p>
            <p>Forks: <?= $data['forks_count'] ?> </p>
            <p>Open issues: <?= $data['open_issues_count'] ?> </p>
            <p>Home page: <a href="<?= $data['homepage'] ?>"><?= $data['homepage'] ?></a> </p>
            <p>GitHub repo: <a href="<?= $data['html_url'] ?>"><?= $data['html_url'] ?></a> </p>
            <p>Created at: <?= $data['created_at'] ?> </p>
            
            <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-default like" id="<?=$data['id']?>" value="<?=$data['id']?>">Like</button>
            </div>
            
        </div>
        <div class="col-lg-6 col-md-6 height-480">
            <?php
                foreach ( $contributors as $contributor )
                {
                    $url = Yii::$app->urlManager->createUrl(['user/info', 'name' => $contributor['login']]);
                    echo '<p><a href="' . $url . '">' . $contributor['login'] . '</a></p>';
                }
            ?>
        </div>
    </div>
</div>