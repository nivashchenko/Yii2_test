<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$form = ActiveForm::begin([
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'offset' => 'col-sm-offset-2',
            'wrapper' => 'col-sm-4',
            'error' => '',
            'hint' => '',
        ],
    ],
]);
    echo $form->field($model, 'searchStr', [
        'inputOptions' => [
            'placeholder' => 'search',
        ],
    ])->label(false);
ActiveForm::end();


$data = $model->getRepos();
$contributors = $model->getContributors();

?>
<!--
<?= Html::encode('test') ?>
-->
<table width="80%" >
    <tr>
        <td>
            <h2><?= $data['full_name'] ?></h2>
            <br />
        </td>
        <td>
            <h2><?= Html::encode('Contributors') ?></h2>
            <br />
        </td>
    </tr>
    <tr>
        <td>
            <p>Description: <?= $data['description'] ?> </p>
            <p>Watchers: <?= $data['watchers'] ?> </p>
            <p>Forks: <?= $data['forks_count'] ?> </p>
            <p>Open issues: <?= $data['open_issues_count'] ?> </p>
            <p>Home page: <a href="<?= $data['homepage'] ?>"><?= $data['homepage'] ?></a> </p>
            <p>GitHub repo: <a href="<?= $data['html_url'] ?>"><?= $data['html_url'] ?></a> </p>
            <p>Created at: <?= $data['created_at'] ?> </p>
        </td>
        <td>
            <?php
                foreach ( $contributors as $contributor )
                {
                    $url = Yii::$app->urlManager->createUrl(['user/info', 'name' => $contributor['login']]);
                    var_dump($url);
                    echo '<p><a href="' . $url . '">' . $contributor['login'] . '</a></p>';
                }
            ?>
        </td>
    </tr>

        
</table>