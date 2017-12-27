<?php
/* @var $this yii\web\View */
$this->title ='File Manager';
$baseUrl = str_replace('/frontend/web','',Yii::$app->urlManager->baseUrl);
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><?php
            echo $this->title;
            ?> </h3>
    </div>
    <div class="panel-body">
        <iframe src="<?php
        echo $baseUrl;
        ?>/file/dialog.php" style="width: 100%; height: 500px; border: none;"></iframe>
    </div>
</div>