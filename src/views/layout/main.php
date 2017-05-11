<?php

/* @var $this \Diezz\ModuleAdmin\Components\AdminView */
/* @var $content string */

use Diezz\ModuleAdmin\Widgets\SidebarMenu;
use yii\helpers\Html;
use yii\helpers\Url;

if (!isset($this->subTitle)) {
    $this->subTitle = '';
}

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= Html::encode($this->title) ?></title>
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<style type="text/css">
			.sidebar-logout {
				font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
				padding: 10px 20px 10px 20px;
				font-size: 19px;
				font-weight: 600;
				float: right;
			}

			.sidebar-logout span {
				color: #fff;
			}
		</style>
    </head>
    <body class="hold-transition <?php echo $this->skin ?>">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <header class="main-header">

            <a href="<?php echo $this->homeUrl ?>" class="logo">
                <span class="logo-mini"><b><?php echo $this->shotCompanyName ?></b></span>
                <span class="logo-lg"><b><?php echo $this->companyName ?></b></span>
            </a>

            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <a href="<?php echo Url::toRoute(['/admin/logout']) ?>" class="sidebar-logout" role="button">
                    <span>Signing out (<?= Yii::$app->user->identity->email ?>)</span>
                </a>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <?php echo SidebarMenu::widget($this->sidebarMenuConfig); ?>
            </section>
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    <?php echo $this->title ?>
                    <small><?php echo $this->subTitle ?></small>
                </h1>
                <?php echo \yii\widgets\Breadcrumbs::widget([
                    'tag'      => 'ol',
                    'homeLink' => [
                        'label' => 'Home',
                        'url'   => $this->homeUrl,
                    ],
                    'links'    => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </section>

            <section class="content">
                <?php echo $content ?>
            </section>
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> <?php echo Yii::$app->version ?>
            </div>
            <strong>Copyright &copy; <?php echo date('Y') ?> <?php echo $this->companyName ?></strong>
            All rights reserved.
        </footer>

        <div class="control-sidebar-bg"></div>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>