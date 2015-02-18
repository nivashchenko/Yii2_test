<?php

//var_dump($data[0]);
$info = $data['info'] ? $data['info'] : $data;
foreach ( $info as $res )
{
?>
<div class="panel panel-default">
    <div class="panel-body">

            <div class="row">
                <div class="col-lg-4">
                    <a href="#"><?=$res['name']?></a>
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
                        <button type="button" class="btn btn-default">Middle</button>
                    </div>
                </div>
            </div>
    </div>
</div>


<?php
}
    if ( is_array($data) )
    {
?>
<div class="row">
    <div class="col-lg-4 col-lg-offset-4">
        <ul class="nav nav-pills">
            <li role="presentation"><a href="#">Previous</a></li>
            <li role="presentation"><a href="#">Show All</a></li>
            <li role="presentation"><a href="#">Next</a></li>
          </ul>
    </div>
</div>
<?php
    }