<?php

use app\assets\AppAsset;
use app\components\FlashMessage;
use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

?>
<?php

$this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
	<?php

	$this->head() ?>
	<meta charset="<?= Yii::$app->charset ?>" />
	<?= Html::csrfMetaTags() ?>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon icon -->
	<!-- <link rel="icon" type="image/png" sizes="16x16" href="<?= $this->theme->getUrl('/assets/images/favicon-32x32.png') ?>"> -->
	<title><?= Html::encode('Pet Paradise') ?></title>

	<link href="<?= $this->theme->getUrl('css/guestMain.css') ?>" rel="stylesheet">
	<link href="<?= $this->theme->getUrl('css/glyphicon.css') ?>" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body class="theme-turquoise">
	<?php $this->beginBody() ?>
	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<div class="preloader">
		<svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none"
				stroke-width="2" stroke-miterlimit="10" />
		</svg>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark">
		<div class="container">
			<a class="navbar-brand" href="<?= Url::toRoute(['/site/index']) ?>">Divine<span>Paws</span><br>
				<p style="    font-size: 11px;
    font-weight: 400;">Love, Care & Protection for Every Paw</p>
			</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navMenu">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navMenu">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a class="nav-link" href="<?= Url::toRoute(['/site/index']) ?>">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="<?= Url::toRoute(['/site/feed']) ?>">Feed</a></li>
					<li class="nav-item"><a class="nav-link" href="<?= Url::toRoute(['/site/adopt']) ?>">Adopt</a></li>
					<li class="nav-item"><a class="nav-link" href="<?= Url::toRoute('/site/local-services') ?>">Local Services</a></li>
					<li class="nav-item"><a class="nav-link" href="<?= Url::toRoute(['/site/about']) ?>">About</a></li>
					<?php
					if (!Yii::$app->user->isGuest) { ?>
						<li class="nav-item"><a class="nav-link" href="<?= Url::toRoute('/dashboard/index') ?>">Dashboard</a></li>
						<li class="nav-item"><a class="nav-link" href="<?= Url::toRoute('/user/logout') ?>"><i class="fa fa-power-off" title="logout"></i></a></li>
					<?php
					} else {
					?>
						<li class="nav-item"><a class="nav-link" href="<?= Url::toRoute('/user/login') ?>">Login</a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
	<section id="wrapper">
		<?= FlashMessage::widget(['type' => 'toster']) ?>
		<?= $content ?>

	</section>

	<footer class="mt-4">
		<div class="text-center py-3 meta">
			© <strong>PetParadise</strong> — Made with <span style="color:var(--accent)">❤</span>
		</div>
	</footer>
	<?php //$this->render('_footer.php');
	?>



	<!-- ADD FOOTER -->

	<!-- ============================================================== -->
	<!-- End Wrapper -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- All Jquery -->
	<!-- ============================================================== -->
	<script
		src="<?= $this->theme->getUrl('assets/plugins/bootstrap/js/tether.min.js') ?>"></script>
	<!-- slimscrollbar scrollbar JavaScript -->
	<script src="<?= $this->theme->getUrl('js/jquery.slimscroll.js') ?>"></script>
	<!--Wave Effects -->
	<script src="<?= $this->theme->getUrl('js/waves.js') ?>"></script>
	<!--Menu sidebar -->
	<script src="<?= $this->theme->getUrl('js/sidebarmenu.js') ?>"></script>
	<!--stickey kit -->
	<script src="<?= $this->theme->getUrl('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') ?>"></script>
	<!--Custom JavaScript -->
	<script src="<?= $this->theme->getUrl('js/custom.min.js') ?>"></script>
	<!-- ============================================================== -->
	<!-- Style switcher -->
	<!-- ============================================================== -->
	<script src="<?= $this->theme->getUrl('assets/plugins/styleswitcher/jQuery.style.switcher.js') ?>"></script>

	<script>
		// Switch theme by changing body class.
		function setTheme(cls) {
			document.body.className = cls;
		}
	</script>


	<?php

	$this->endBody() ?>
</body>
<?php

$this->endPage() ?>

</html>