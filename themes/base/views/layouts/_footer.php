<?php

use yii\helpers\Url;
?>
<!-- <div class="col-sm-12 text-center">
	<div class="text-center">
		<p class="copyrightmain nofixed">
			<span></span>© <?= date("Y") ?> <a class="footer-queeny-link" href="http://amusoftech.com/">
				Amusoftech Pvt.Ltd.</a> | All Rights Reserved.
		</p>
	</div>

</div> -->
<br>
<br>
<br>
<footer class="footer-section mt-4">
    <div class="container">
        <div class="row">

            <!-- About -->
            <div class="col-md-3 col-sm-6 mb-4">
                <h5><?= Yii::$app->params['websiteName']?></h5>
                <p>
                    A trusted platform for pet adoption, lost & found pets,
                    grooming services and pet care community.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-3 col-sm-6 mb-4">
                <h5>Quick Links</h5>
                <ul class="footer-links">
                    <li><a href="<?= Url::toRoute(['/site/adopt']) ?>">Adopt a Pet</a></li>
                    <li><a href="<?= Url::toRoute(['/site/lost-found']) ?>">Lost & Found</a></li>
                    <li><a href="<?= Url::toRoute(['/site/local-services']) ?>">Pet Services</a></li>
                    <li><a href="<?= Url::toRoute(['/pet/add']) ?>">Post a Pet</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div class="col-md-3 col-sm-6 mb-4">
                <h5>Our Services</h5>
                <ul class="footer-links">
                    <li><a href="<?= Url::toRoute(['/site/adopt']) ?>">Pet Adoption</a></li>
                    <li><a href="#">Pet Grooming</a></li>
                    <li><a href="#">Pet Food & Toys</a></li>
                    <li><a href="<?= Url::toRoute(['/site/alerts']) ?>">Lost Pet Recovery</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="col-md-3 col-sm-6 mb-4">
                <h5>Contact Us</h5>
                <p><i class="fa fa-map-marker"></i> Ferozepur, Punjab</p>
                <p><i class="fa fa-phone"></i> +91 98765 43210</p>
                <p><i class="fa fa-envelope"></i> <?= Yii::$app->params['adminEmail']?></p>

                <!-- <div class="social-icons">
                    <a href="<?= Url::toRoute(['/site/lost-found']) ?>"><i class="fa fa-facebook"></i></a>
                    <a href="<?= Url::toRoute(['/site/lost-found']) ?>"><i class="fa fa-instagram"></i></a>
                    <a href="<?= Url::toRoute(['/site/lost-found']) ?>"><i class="fa fa-twitter"></i></a>
                </div> -->
            </div>

        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="footer-bottom">
        <div class="container text-center">
            © <?= date('Y') ?> Pet Paradise. All Rights Reserved.
        </div>
    </div>
</footer>
