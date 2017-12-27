<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
//if(isset($_SESSION['RF']['verify'])){
//    $_SESSION['RF']['verify']='ABCDEFGH';
//}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        $homeUrl = str_replace('/frontend/web','',Yii::$app->urlManager->baseUrl);
    ?>
    <script type="text/javascript">
        function homeUrl() {
            return '<?php echo $host.$homeUrl;?>';
        }
        //console.log('homeURL: ',homeUrl());
    </script>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap bg-info">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-static-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 aside-left bg-info">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <?php
                            $route = Yii::$app->controller->route;
                            $control = Yii::$app->controller->id;
                        ?>
                        <ul class="list-group" id="manager-menu">
                            <li class="list-group-item">
                                <?php
                                echo Html::a('<span class="glyphicon glyphicon-home"></span>Home',['/site'],[
                                        'class'=>($control=='site')?'list-group-item active':'list-group-item'
                                ])
                                ?>
                            </li>
                            <li class="list-group-item">
                                <?php
                                echo Html::a('<span class="glyphicon glyphicon-th-list"></span>Category',['/category'],[
                                    'class'=>($control=='category')?'list-group-item active':'list-group-item'
                                ])
                                ?>
                            </li>
                            <li class="list-group-item">
                                <?php
                                echo Html::a('<span class="glyphicon glyphicon-book"></span>Post',['/post'],[
                                    'class'=>($control=='post')?'list-group-item active':'list-group-item'
                                ])
                                ?>
                            </li>
                            <li class="list-group-item">
                                <?php
                                echo Html::a('<span class="glyphicon glyphicon-book"></span>File',['/file'],[
                                    'class'=>($control=='file')?'list-group-item active':'list-group-item'
                                ])
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10 admin-right" style="background: #ffffff">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode('Watson for Oncology') ?> <?= date('Y') ?></p>

        <p class="pull-right">FIVE9 VIET NAM &amp; IBM</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
