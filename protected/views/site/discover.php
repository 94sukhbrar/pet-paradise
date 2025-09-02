<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Services | PetAdopt</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f9f9f9; }
    .page-header {
      background: url('https://placedog.net/1200/400?id=15') center/cover no-repeat;
      height: 300px; display: flex; align-items: center; justify-content: center;
      color: white; position: relative;
    }
    .page-header::after {
      content: ""; position: absolute; top:0; left:0; right:0; bottom:0;
      background: rgba(0,0,0,0.5);
    }
    .page-header h1 { z-index: 2; position: relative; font-size: 42px; }
    .services-section { padding: 60px 20px; }
    .service-card {
      background: #fff; padding: 30px; border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: 0.3s; text-align: center; height: 100%;
    }
    .service-card:hover { transform: translateY(-8px); box-shadow: 0 6px 18px rgba(0,0,0,0.15); }
    .service-card i { font-size: 50px; color: #28a745; margin-bottom: 20px; }
    .service-card h4 { font-weight: bold; margin-bottom: 15px; }
  </style>
</head>
<body>

<!-- Header -->
<div class="page-header">
  <h1>Our Services</h1>
</div>

<!-- Services Section -->
<div class="container services-section">
  <div class="row">
    <!-- Pet Adoption -->
    <div class="col-md-6 col-lg-3 mb-4">
      <div class="service-card">
        <i class="fas fa-paw"></i>
        <h4>Pet Adoption</h4>
        <p>Find your perfect furry companion and give pets a loving forever home.</p>
      </div>
    </div>

    <!-- Veterinary Care -->
    <div class="col-md-6 col-lg-3 mb-4">
      <div class="service-card">
        <i class="fas fa-clinic-medical"></i>
        <h4>Veterinary Care</h4>
        <p>Comprehensive health check-ups and treatments to keep your pets happy & healthy.</p>
      </div>
    </div>

    <!-- Pet Training -->
    <div class="col-md-6 col-lg-3 mb-4">
      <div class="service-card">
        <i class="fas fa-bone"></i>
        <h4>Pet Training</h4>
        <p>Professional training programs to help pets learn discipline and good behavior.</p>
      </div>
    </div>

    <!-- Accessories -->
    <div class="col-md-6 col-lg-3 mb-4">
      <div class="service-card">
        <i class="fas fa-shopping-bag"></i>
        <h4>Accessories</h4>
        <p>Shop collars, leashes, toys, and pet essentials at affordable prices.</p>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center p-3">
  <p>© 2025 PetAdopt | All Rights Reserved</p>
</footer>

</body>
</html>
