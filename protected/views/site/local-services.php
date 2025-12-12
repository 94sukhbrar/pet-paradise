<!-- HERO -->
<section class="hero1">
  <h1>Local Pet Services in Ferozepur</h1>
  <p>Professional, trusted & friendly pet care services</p>
</section>

<!-- PAGE LAYOUT -->
<div class="container1">

  <!-- LEFT CONTENT -->
  <div class="services">

    <h2>Our Services</h2>

    <div class="service-grid">

      <div class="service-box">
        <div class="service-icon"><i class="fa-solid fa-shower"></i></div>
        <h3>Pet Grooming</h3>
        <p>Bathing, trimming, styling & complete hygiene care.</p>
      </div>

      <div class="service-box">
        <div class="service-icon"><i class="fa-solid fa-bowl-food"></i></div>
        <h3>Pet Food Delivery</h3>
        <p>Premium pet foods delivered at your doorstep.</p>
      </div>

      <div class="service-box">
        <div class="service-icon"><i class="fa-solid fa-paw"></i></div>
        <h3>Pet Training</h3>
        <p>Obedience training & behaviour correction.</p>
      </div>

      <div class="service-box">
        <div class="service-icon"><i class="fa-solid fa-house-circle-check"></i></div>
        <h3>Home Pet Sitting</h3>
        <p>Safe & friendly pet sitting when you’re away.</p>
      </div>
      <div class="service-box">
        <div class="service-icon"><i class="fa-solid fa-shirt"></i></div>
        <h3>Pet Clothes</h3>
        <p>Winter jackets, fancy dresses, t-shirts and shoes.</p>
      </div>
      <div class="service-box">
        <div class="service-icon"><i class="fa-solid fa-paw"></i></div>
        <h3>Pet Toys (Imported)</h3>
        <p>Chew balls, ropes, cat teasers & durable play toys.</p>
      </div>


    </div>

    <!-- MAP SECTION -->
    <div class="map-box">
      <h2>Find Us on Map</h2>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3421.643703947359!2d74.61474281058699!3d30.952514074372495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3919e9c41481ca15%3A0xbef0a9e91d8295c0!2sPet%20paradise-%20pet%20shop%20in%20Ferozpur!5e0!3m2!1sen!2sin!4v1765535132621!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

  </div>

  <!-- RIGHT SIDEBAR -->
  <div class="sidebar">
    <h3>New Pets</h3>

    <?= \yii\widgets\ListView::widget([
      'dataProvider' => $dataProvider,
      'itemView' => '_new_pets', // your view file for each record
      'options' => [
        'tag' => 'div',
        'class' => 'row',   // remove main wrapper class
      ],
      'itemOptions' => [
        'tag' => 'div',
        'class' => 'pet-card w-100',  // or 'div' with empty class
      ],
      'pager' => ['options' => ['style' => 'display:none']],
      'summary' => false,


    ]) ?>

    

  </div>

</div>

</body>

</html>