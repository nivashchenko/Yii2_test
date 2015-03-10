<?php

foreach ( $data as $res )
{
    $repoUrl = Yii::$app->urlManager->createUrl(['site/repo'
                                            , 'group' => $res['owner']['login']
                                            , 'project' => $res['name']]);
?>
<div class="panel panel-default">
    <div class="panel-body">

            <div class="row">
                <div class="col-lg-4">
                    <a href="<?=$repoUrl?>"><?=$res['name']?></a>
                </div>
                <div class="col-lg-4">
                    <a href="#"><?=$res['homepage']?></a>
                </div>
                <div class="col-lg-4">
                    <a href="#"><?=$res['login']?></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <?=$res['description']?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    Watchers: <?=$res['watchers']?>
                </div>
                <div class="col-lg-4">
                    forks: <?=$res['forks']?>
                </div>
                <div class="col-lg-4">
                    <div class="btn-group btn-group-sm" role="group" aria-label="test">
                        <button type="button" class="btn btn-default like" id="<?=$res['id']?>" value="<?=$res['id']?>">Like</button>
                    </div>
                </div>
            </div>
    </div>
</div>
<?php
    }