<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

            <?php
            $cat = new Category();
            ?>
            <?= $form->field($model, 'parent')->dropDownList(
            //ArrayHelper::map(Category::find()->all(),'id','name'),
                $cat->getParent(),
                [
                    1=>'Active',
                    0=>'Inactive'
                ],
                [
                    'prompt'=>'Select Parent'
                ]
            ) ?>

            <?= $form->field($model, 'status')->dropDownList(
                [
                    1=>'Active',
                    0=>'Inactive'
                ],
                [
                    'prompt'=>'Select Status'
                ]
            ) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
