<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        .navbar-custom {
            background-color: #1F4CA4; /* สีฟ้า ตามภาพ */
        }
        .navbar-custom .navbar-brand, 
        .navbar-custom .nav-link {
            color: white !important;
        }
        .navbar-custom .nav-link:hover {
            color: #FFD700 !important; /* เปลี่ยนสี hover เป็นสีทอง */
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => '<span class="text-white">X-ray</span>',  // เปลี่ยนชื่อระบบ
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar navbar-expand-md navbar-custom fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => [
            ['label' => 'dashboard', 'url' => ['/dashboard']],
            ['label' => 'รายงาน', 'url' => ['/login2']],
            ['label' => 'Patients', 'url' => ['/patients'], 'options' => ['class' => 'font-weight-bold']], // ทำให้เด่นขึ้น
            ['label' => 'บริการ', 'url' => ['/services']],
            ['label' => 'สมัครสมาชิก', 'url' => ['/register']],
            Yii::$app->user->isGuest 
    ? '<li class="nav-item"><a href="' . Yii::$app->urlManager->createUrl(['/site/login']) . '" class="nav-link text-white">เข้าสู่ระบบ</a></li>'
    : '<li class="nav-item text-white">ผู้ใช้งาน: ' . Html::encode(Yii::$app->user->identity->username) . '</li>'
        ]
        
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container mt-5">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
