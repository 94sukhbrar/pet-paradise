<?php

use yii\helpers\Url;
?>
<style>
  .hero-fixed {
    position: relative;
    height: 90vh;
    background:
      linear-gradient(rgba(31, 191, 183, 0),
        rgba(31, 191, 183, 0)),
      url('<?= $this->theme->getUrl("/img/bg_1.jpg") ?>') center center / cover no-repeat;

    background-attachment: fixed;
    display: flex;
    align-items: center;
    color: #fff;
  }

  .hero-fixed h1 {
    font-size: 3.2rem;
    font-weight: 700;
    /* color: #009688; */
  }

  .hero-fixed p {
    font-size: 1.15rem;
    margin: 20px 0 30px;
  }


  .btn-hero:hover {
    background: #0c3f3c;
    color: #fff;
  }

  .services-style {
    background: #f8f9fa;
    padding: 80px 0;
    margin-top: -120px;
    /* pulls cards up near hero */
  }

  .service-card {
    background: #fff;
    padding: 60px 35px 50px;
    text-align: center;
    border-radius: 8px;
    position: relative;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: .4s;
    height: 100%;
  }

  .service-card:hover {
    transform: translateY(-8px);
  }

  .service-card.active {
    background: #009688;
    color: #fff;
  }

  .service-card h3 {
    margin-top: 30px;
    font-weight: 600;
  }

  .service-card p {
    font-size: 15px;
    line-height: 1.8;
    margin-top: 15px;
  }

  .service-card.active p {
    color: #eafff3;
  }

  /* ICON CIRCLE */
  .icon-circle {
    width: 90px;
    height: 90px;
    background: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: -45px;
    left: 50%;
    transform: translateX(-50%);
  }

  .icon-circle i {
    font-size: 34px;
    color: #009688;
  }

  /* ARROW BUTTON */
  .arrow-btn {
    width: 50px;
    height: 50px;
    background: #009688;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    bottom: -25px;
    left: 50%;
    transform: translateX(-50%);
  }

  .service-card.active .arrow-btn {
    background: #fff;
    color: #009688;
  }

  .why-choose-us {
    padding: 90px 0;
    background: #ffffff;
  }

  .section-title {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 40px;
  }

  .why-img {
    max-width: 90%;
  }

  .why-box {
    display: flex;
    gap: 18px;
  }

  .why-icon {
    width: 65px;
    height: 65px;
    background: #009688;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .why-icon i {
    color: #fff;
    font-size: 26px;
  }

  .why-text h5 {
    font-weight: 600;
    margin-bottom: 6px;
  }

  .why-text p {
    font-size: 15px;
    color: #777;
    line-height: 1.6;
  }

  /* COUNTER BAR */
  .counter-bar {
    background: #009688;
    padding: 60px 0;
    color: #fff;
  }

  .counter-bar h2 {
    font-size: 42px;
    font-weight: 700;
    color:#fff
  }

  .counter-bar p {
    margin-top: 8px;
    font-size: 16px;
  }

  /* FAQ SECTION */
  .faq-section {
    padding: 100px 0;
    background: #f8f9fa;
  }

  .faq-title {
    font-size: 32px;
    font-weight: 700;
  }

  .faq-desc {
    color: #777;
    margin: 20px 0 40px;
  }

  /* FAQ ITEM */
  .faq-item {
    background: #fff;
    border-radius: 40px;
    margin-bottom: 20px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
  }

  .faq-question {
    padding: 18px 25px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #009688;
  }

  .faq-question span {
    font-size: 22px;
    color: #009688;
  }

  .faq-answer {
    display: none;
    padding: 0 25px 20px;
    font-size: 15px;
    color: #666;
  }

  .faq-item.active .faq-answer {
    display: block;
  }

  /* IMAGE + PLAY BUTTON */
  .faq-image {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
  }

  .play-btn {
    width: 70px;
    height: 70px;
    background: #009688;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #fff;
    font-size: 22px;
    cursor: pointer;
  }
  .faq-question span.toggle-icon{
  font-size:26px;
  color:#009688;
  font-weight:700;
  transition:0.3s;
}

/* When accordion is open */
.faq-item.active .faq-question span.toggle-icon{
  content:"-";
  color: #009688;
}
.features-divine{
  padding:90px 0;
  background:#f7fbfa;
}

.feature-title{
  font-size:34px;
  font-weight:700;
}

.feature-subtitle{
  max-width:750px;
  margin:15px auto 0;
  color:#666;
}

.feature-card{
  background:#fff;
  border-radius:16px;
  padding:35px 25px;
  text-align:center;
  height:100%;
  transition:0.3s;
  box-shadow:0 8px 25px rgba(0,0,0,0.06);
}

.feature-card:hover{
  transform:translateY(-8px);
  box-shadow:0 12px 35px rgba(0,0,0,0.1);
}

.feature-icon{
  width:70px;
  height:70px;
  background:#009688;
  color:#fff;
  font-size:32px;
  border-radius:50%;
  display:flex;
  align-items:center;
  justify-content:center;
  margin:0 auto 20px;
}

.feature-card h5{
  font-weight:600;
  margin-bottom:10px;
}

.feature-card p{
  font-size:15px;
  color:#555;
  line-height:1.6;
}


</style>
<!-- HERO FIXED BACKGROUND -->
<section class="hero-fixed">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <h1>Premium Pet Care Services</h1>
        <p>
          Trusted pet sitting, walking & grooming — because your pet deserves the best.
        </p>
        <a href="#services" class="btn ">Get Started</a>
      </div>
    </div>
  </div>
</section>

<!-- SERVICES SECTION -->
<section class="services-style">
  <div class="container">
    <div class="row">

      <!-- Service 1 (Active / Green) -->
      <div class="col-md-4 mb-4">
        <div class="service-card active">
          <div class="icon-circle">
            <i class="fas fa-walking"></i>
          </div>
          <h3>Dog Walking</h3>
          <p>
            Professional, safe, and energetic walks tailored to your dog’s pace, improving physical health, mental stimulation, social behavior, and daily happiness with trusted handlers.
          </p>
          <div class="arrow-btn">
            <i class="fas fa-arrow-right"></i>
          </div>
        </div>
      </div>

      <!-- Service 2 -->
      <div class="col-md-4 mb-4">
        <div class="service-card">
          <div class="icon-circle">
            <i class="fas fa-dog"></i>
          </div>
          <h3>Pet Daycare</h3>
          <p>
            A secure, playful daycare environment where pets socialize, exercise, and relax under expert supervision, giving owners complete peace of mind during busy schedules.
          </p>
          <div class="arrow-btn">
            <i class="fas fa-arrow-right"></i>
          </div>
        </div>
      </div>

      <!-- Service 3 -->
      <div class="col-md-4 mb-4">
        <div class="service-card">
          <div class="icon-circle">
            <i class="fas fa-cut"></i>
          </div>
          <h3>Pet Grooming</h3>
          <p>
           Premium grooming services including bathing, trimming, nail care, and hygiene treatments, ensuring your pet looks great, feels comfortable, and stays healthy year-round.
          </p>
          <div class="arrow-btn">
            <i class="fas fa-arrow-right"></i>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- WHY CHOOSE US -->
<section class="why-choose-us">
  <div class="container">
    <div class="row align-items-center">

      <!-- LEFT IMAGE -->
      <div class="col-md-5 mb-4 mb-md-0 text-center">
        <img src="<?= $this->theme->getUrl("/img/about-1.jpg") ?>"
          alt="Happy Dog"
          class="img-fluid why-img">
      </div>

      <!-- RIGHT CONTENT -->
      <div class="col-md-7">
        <h2 class="section-title">Why Choose Us?</h2>

        <div class="row">

          <div class="col-md-6 mb-4">
            <div class="why-box">
              <div class="why-icon">
                <i class="fas fa-stethoscope"></i>
              </div>
              <div class="why-text">
                <h5>Care Advices</h5>
                <p>Expert tips on nutrition, hygiene, training, and wellness to keep your pet healthy, happy, and safe every day.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 mb-4">
            <div class="why-box">
              <div class="why-icon">
                <i class="fas fa-headset"></i>
              </div>
              <div class="why-text">
                <h5>Customer Supports</h5>
                <p>Our dedicated support team is always available to assist pet parents with questions, services, bookings, and community support needs.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 mb-4">
            <div class="why-box">
              <div class="why-icon">
                <i class="fas fa-ambulance"></i>
              </div>
              <div class="why-text">
                <h5>Emergency Services</h5>
                <p>24/7 rapid-response support for pet emergencies, connecting you instantly with nearby vets, clinics, and lifesaving assistance.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 mb-4">
            <div class="why-box">
              <div class="why-icon">
                <i class="fas fa-user-md"></i>
              </div>
              <div class="why-text">
                <h5>Veterinary Help</h5>
                <p>Access trusted veterinarians for checkups, vaccinations, emergency care, and expert medical guidance to keep pets healthy always.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->render('_features') ?>
<!-- COUNTER BAR -->
<section class="counter-bar">
  <div class="container">
    <div class="row text-center">

      <div class="col-md-3 col-6 mb-4 mb-md-0">
        <h2>50</h2>
        <p>Customer</p>
      </div>

      <div class="col-md-3 col-6 mb-4 mb-md-0">
        <h2>8,500</h2>
        <p>Professionals</p>
      </div>

      <div class="col-md-3 col-6">
        <h2>20</h2>
        <p>Products</p>
      </div>

      <div class="col-md-3 col-6">
        <h2>50</h2>
        <p>Pets Hosted</p>
      </div>

    </div>
  </div>
</section>

<!-- FAQ SECTION -->
<section class="faq-section">
  <div class="container">
    <div class="row align-items-center">

      <!-- LEFT FAQ -->
      <div class="col-md-6 mb-5 mb-md-0">
        <h2 class="faq-title">Frequently Asks Questions</h2>
        <p class="faq-desc">
          Far far away, behind the word mountains, far from the countries
          Vokalia and Consonantia, there live the blind texts.
        </p>

        <div class="faq-item active">
          <div class="faq-question">
            Can pet owners post their pets and content for free?
            <span class="toggle-icon">-</span>
          </div>
          <div class="faq-answer">
            Yes, pet owners can create pet profiles and share posts on Divine Paws completely free of charge.
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
           Are pet service providers verified on Divine Paws?
            <span class="toggle-icon">+</span>
          </div>
          <div class="faq-answer">
           Yes, all listed service providers go through a verification process for safety and trust.
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            How does the lost and found pet feature work?
            <span class="toggle-icon">+</span>
          </div>
          <div class="faq-answer">
           Users can instantly post lost or found pet alerts to reach nearby community members.
          </div>
        </div>
        <div class="faq-item">
          <div class="faq-question">
            Can I book pet grooming and daycare services through the platform?
            <span class="toggle-icon">+</span>
          </div>
          <div class="faq-answer">
           Yes, Divine Paws allows easy discovery and booking of local pet services in one place.
          </div>
        </div>

      </div>

      <!-- RIGHT IMAGE -->
      <div class="col-md-6 text-center">
        <div class="faq-image">
          <img src="https://images.unsplash.com/photo-1548199973-03cce0bbc87b" class="img-fluid" alt="">
          <div class="play-btn">
            <i class="fas fa-play"></i>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- FEATURES SECTION -->


<script>
document.querySelectorAll('.faq-question').forEach(question => {
  question.addEventListener('click', () => {

    const parent = question.parentElement;
    const icon = question.querySelector('.toggle-icon');

    // Close other accordions (optional)
    document.querySelectorAll('.faq-item').forEach(item => {
      if(item !== parent){
        item.classList.remove('active');
        item.querySelector('.toggle-icon').textContent = '+';
      }
    });

    // Toggle current
    parent.classList.toggle('active');

    if(parent.classList.contains('active')){
      icon.textContent = '−'; // minus
    }else{
      icon.textContent = '+';
    }

  });
});
</script>
