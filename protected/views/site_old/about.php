<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    body {
        background: #f7fffd;
        font-family: "Segoe UI", sans-serif;
    }

    .section-title {
        font-size: 32px;
        font-weight: bold;
        color: #009688;
        margin-bottom: 20px;
    }

    .about-box {
        background: #ffffff;
        padding: 35px;
        border-radius: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        margin-bottom: 40px;
    }

    .mission-card {
        background: #ffffff;
        padding: 25px;
        border-radius: 18px;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.1);
        margin-bottom: 25px;
    }

    .mission-card i {
        font-size: 40px;
        color: #009688;
        margin-bottom: 15px;
    }

    .service-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-top: 25px;
    }

    .service-box {
        background: #ffffff;
        padding: 25px;
        border-radius: 18px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .service-box i {
        font-size: 40px;
        color: #009688;
        margin-bottom: 12px;
    }
</style>

<div class="container mt-5">

    <!-- ABOUT SECTION -->
    <div class="about-box">
        <div class="row">

            <div class="col-md-6">
                <img src="<?= $this->theme->getUrl('img/about.png') ?> " alt="" class="w-100">
            </div>
            <div class="col-md-6">
                <h2 class="section-title">About <?= Yii::$app->params['websiteName']?></h2>

                <p class="text-justify">
                    At <?= Yii::$app->params['websiteName']?>, we believe pets are not just animals — they are family.
                    Our mission is to provide a safe, loving, and trusted place where pet parents can find everything their furry companions need to live happy and healthy lives.
                </p>
                <p class="text-justify">
                    From premium pet grooming and quality pet food to toys, clothing, and adoption support, we are committed to offering services that focus on comfort, care, and compassion. Every pet that walks into <?= Yii::$app->params['websiteName']?> is treated with love, patience, and professional attention. </p>

                <p class="text-justify">
                    Based in Ferozepur, we proudly serve our local pet community while also connecting pet lovers through adoption, care guidance, and responsible pet parenting. Our team consists of trained professionals who truly understand pets and their unique needs.
                </p>

                <p class="text-justify">
                    With years of experience in the pet industry, we bring trusted care, professional expertise,
                    and a friendly environment where your pets feel safe and loved.
                </p>
            </div>
        </div>
    </div>


    <!-- MISSION & VISION -->
    <div class="row">

        <div class="col-md-6">
            <div class="mission-card">
                <i class="fa-solid fa-bullseye"></i>
                <h4 class="mb-2">Our Mission</h4>
                <p>
                    To provide world-class pet care services, promote responsible pet parenting,
                    and create a safe community for pet lovers in Ferozepur and beyond.
                    Our mission is to improve the quality of life for pets by providing:
                </p>
                <ul>


                    <li>High-quality grooming and hygiene services</li>

                    <li>Nutritious and trusted pet food brands</li>

                    <li>Safe, fun, and engaging toys and accessories</li>

                    <li>Support for pet adoption, lost & found, and pet awareness</li>

                    <li> We aim to create a caring environment where every pet feels safe and every pet parent feels confident.</li>
                </ul>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mission-card">
                <i class="fa-solid fa-eye"></i>
                <h4 class="mb-2">Our Vision</h4>
                <p>
                    To become a leading pet care brand known for trust, love, premium service quality,
                    and a strong commitment to the well-being of every pet.
                </p>
                <p>We envision a future where:</p>
                <ul>
                    <li>Every pet finds a loving home</li>

                    <li>Pet parents are informed and confident</li>

                    <li>Pets receive the care, respect, and love they deserve</li>
                    
                </ul>
            </div>
        </div>

    </div>


    <!-- OUR SERVICES SECTION -->
    <h2 class="section-title mt-4">Our Services</h2>

    <div class="service-grid">

        <div class="service-box">
            <i class="fa-solid fa-shower"></i>
            <h5>Pet Grooming</h5>
            <p>Complete grooming with trimming, bathing, nail cutting, and hygiene care.</p>
        </div>

        <div class="service-box">
            <i class="fa-solid fa-shirt"></i>
            <h5>Pet Clothes</h5>
            <p>Winter jackets, T-shirts, raincoats, dresses, and accessories for pets.</p>
        </div>

        <div class="service-box">
            <i class="fa-solid fa-bowl-food"></i>
            <h5>Pet Food (Imported)</h5>
            <p>Premium dog/cat food brands like Royal Canin, Farmina & more.</p>
        </div>

        <div class="service-box">
            <i class="fa-solid fa-paw"></i>
            <h5>Pet Toys</h5>
            <p>Chew toys, ropes, balls, squeaky toys, cat teasers & imported collections.</p>
        </div>

        <div class="service-box">
            <i class="fa-solid fa-dog"></i>
            <h5>Pet Training</h5>
            <p>Basic obedience training and behavioral correction.</p>
        </div>

        <div class="service-box">
            <i class="fa-solid fa-house-circle-check"></i>
            <h5>Home Pet Sitting</h5>
            <p>Safe and trusted home pet sitting when you're away.</p>
        </div>

    </div>

</div>