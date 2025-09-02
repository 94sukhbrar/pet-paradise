 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
 
<style>
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f9f9f9; }
    .page-header {
      background: url('https://images.ctfassets.net/440y9b545yd9/144ynQJFHm4tTX6Muwbil8/b12fca1e55b0cc801ff4cd46c410fa7f/PetAdoptionTips850.jpg') center/cover no-repeat;
      height: 300px; display: flex; align-items: center; justify-content: center;
      color: white; position: relative;
    }
    .page-header::after {
      content: ""; position: absolute; top:0; left:0; right:0; bottom:0;
      background: rgba(0,0,0,0.5);
    }
    .page-header h1 { z-index: 2; position: relative; font-size: 42px; }
    .about-section { padding: 60px 20px; }
    .about-section h2 { font-weight: bold; margin-bottom: 20px; }
    .service-card {
      background: #fff; padding: 20px; border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: 0.3s; text-align: center;
    }
    .service-card:hover { transform: translateY(-5px); }
    .service-card i { font-size: 36px; color: #28a745; margin-bottom: 10px; }
    .services-section { padding: 40px 20px; background: #fff; border-radius: 12px; }
  </style>


<!-- Header -->
<div class="page-header">
  <h1></h1>
</div>

<!-- About Section -->
<div class="container about-section">
  <div class="row">
    <div class="col-md-6">
      <img src="https://www.nationaldaycalendar.com/.image/ar_16:9%2Cc_fill%2Ccs_srgb%2Cg_faces:center%2Cq_auto:eco%2Cw_768/MjA2MDEyNzkwNTUxMzU2Nzk5/website-feature---national-adopt-a-shelter-pet-day--april-30.png" class="img-fluid rounded shadow" alt="Pet Adoption">
    </div>
    <div class="col-md-6">
      <h2>Who We Are</h2>
      <p>
        PetAdopt is a community-driven platform dedicated to helping pets find loving homes. 
        We connect adopters with dogs, cats, birds, and other pets that need care.  
      </p>
      <p>
        Our mission is simple: <strong>Every pet deserves a family.</strong>  
        We work with shelters and individuals to ensure pets get the care, 
        medical attention, and love they need before adoption.
      </p>
      <p>
        We help thousands of pets find loving homes every year. With dedicated care, adoption support, and community love, your pet journey begins here.
      </p>
    </div>
  </div>
</div>

<!-- Our Services Section -->
<div class="container my-5">
  <h2 class="text-center mb-4">Our Services</h2>
  <div class="row">
    <div class="col-md-3 mb-3">
      <div class="service-card">
        <i class="fas fa-paw"></i>
        <h5>Pet Adoption</h5>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="service-card">
        <i class="fas fa-clinic-medical"></i>
        <h5>Veterinary Care</h5>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="service-card">
        <i class="fas fa-bone"></i>
        <h5>Pet Training</h5>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="service-card">
        <i class="fas fa-shopping-bag"></i>
        <h5>Accessories</h5>
      </div>
    </div>
  </div>
</div>