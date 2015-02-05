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

?>

<?= Html::encode('test') ?>

