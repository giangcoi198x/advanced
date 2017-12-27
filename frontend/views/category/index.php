<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Category;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SearchCategory */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
            <p class="pull-right">
                <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
                    ['class' => 'yii\grid\CheckBoxColumn',
                        'header'=>'No',
                        'headerOptions'=>[
                            'style'=>'width:15px;text-align:center'
                        ],
                        'contentOptions'=>[
                            'style'=>'width:15px;text-align:center'
                        ]

                    ],
                    [
                        'attribute'=>'id',
                        'label'=>'ID',
                        'headerOptions'=>[
                            'style'=>'width:15px;text-align:center'
                        ],
                        'contentOptions'=>[
                            'style'=>'width:15px;text-align:center'
                        ]
                    ],
                    [
                        'attribute'=>'name',
                        'headerOptions'=>[
                            'style'=>'text-align:center'
                        ],
                        'contentOptions'=>[
                            'style'=>'text-align:center'
                        ]
                    ],
                    [
                        'attribute'=>'slug',
                        'headerOptions'=>[
                            'style'=>'text-align:center'
                        ],
                        'contentOptions'=>[
                            'style'=>'text-align:center'
                        ]
                    ],
                    [
                        'attribute'=>'parent',
                        'label'=>'Parent',
                        'content'=>function($model){
                            if($model->parent==0){
                                return 'Root';
                            }else{
                                $parent = Category::find()->where(['id'=>$model->parent])->one();
                                if($parent){
                                    return $parent->name;
                                }else{
                                    return 'Unknown';
                                }
                            }
                        },
                        'headerOptions'=>[
                            'style'=>'text-align:center'
                        ],
                        'contentOptions'=>[
                            'style'=>'text-align:center'
                        ]
                    ],
                    [
                        'attribute'=>'status',
                        'label'=>'Status',
                        'content'=>function($model){
                            if($model->status==0){
                                return '<span class="label label-danger">Inactive</span>';
                            }else{
                                return '<span class="label label-success">Active</span>';
                            }
                        },
                        'headerOptions'=>[
                            'style'=>'text-align:center'
                        ],
                        'contentOptions'=>[
                            'style'=>'text-align:center'
                        ]
                    ],
                    // 'created_at',
                    // 'updated_at',
                    [
                        'attribute'=>'created_at',
                        'content'=>function($model){
                            return date('d-m-Y',$model->created_at);
                        },
                        'headerOptions'=>[
                            'style'=>'width:150px;text-align:center'
                        ],
                        'contentOptions'=>[
                            'style'=>'width:150px;text-align:center'
                        ]
                    ],
                    [
                        'attribute'=>'updated_at',
                        'content'=>function($model){
                            return date('d-m-Y',$model->updated_at);
                        },
                        'headerOptions'=>[
                            'style'=>'text-align:center'
                        ],
                        'contentOptions'=>[
                            'style'=>'text-align:center'
                        ]
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header'=>'Action',
                        'headerOptions'=>[
                            'style'=>'text-align:center'
                        ],
                        'contentOptions'=>[
                            'style'=>'text-align:center'
                        ],
                        'buttons'=>[
                            'view'=>function($url,$model){
                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>View',$url,['class'=>'btn btn-xs btn-primary']);
                            },
                            'update'=>function($url,$model){
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>Edit',$url,['class'=>'btn btn-xs btn-success']);
                            },
                            'delete'=>function($url,$model){
                                return Html::a('<span class="glyphicon glyphicon-remove"></span>Delete',$url,
                                    [
                                        'class'=>'btn btn-xs btn-danger',
                                        'data-confirm'=>'Are you sure to delete ' .$model->name,
                                        'data-method'=>'post'
                                    ]);
                            }
                        ]
                    ],
                ],
            ]); ?>
        </div>
    </div>

</div>
