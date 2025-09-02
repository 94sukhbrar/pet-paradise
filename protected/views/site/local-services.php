<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Local Pet Services</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f1f6ff;
      font-family: Arial, sans-serif;
    }
    .banner {
      width: 100%;
      height: 400px;
      background: #ddd;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 10px;
    }
    .service-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      padding: 20px;
      margin-bottom: 20px;
      transition: 0.3s;
    }
    .service-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    .badge-new {
      background: #ff4d4f;
      color: #fff;
      padding: 5px 10px;
      border-radius: 6px;
      font-size: 12px;
      margin-left: 10px;
    }
    .badge-featured {
      background: #6c63ff;
      color: #fff;
      padding: 5px 10px;
      border-radius: 6px;
      font-size: 12px;
      margin-left: 10px;
    }
    .btn-view {
      background: #6c63ff;
      color: #fff;
      border-radius: 8px;
      font-weight: 500;
      padding: 6px 15px;
    }
    .btn-view:hover {
      background: #574fd6;
    }
  </style>
</head>
<body>

  <div class="container py-5">
    <!-- Header -->
    <div class="mb-4">
      <h3 class="font-weight-bold">Local Pet Services</h3>
      <p class="text-muted">Find vets, shops, and groomers in your area.</p>
    </div>

    <!-- Banner -->
    <div class="banner mb-5">
      <h2>1200 x 600</h2>
    </div>

    <!-- Services Section -->
    <h5 class="mb-4 font-weight-bold">Services Near You</h5>
    <div class="row">
      
      <!-- Card 1 -->
      <div class="col-md-4">
        <div class="service-card">
          <h6 class="font-weight-bold">Paws & Claws Veterinary Clinic</h6>
          <p class="text-muted mb-1">12 Green Street, Berlin</p>
          <p class="mb-2">📞 (555) 123-4567</p>
          <button class="btn btn-view btn-sm">View Info</button>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-4">
        <div class="service-card">
          <h6 class="font-weight-bold">The Groom Room 
            <span class="badge-new">New</span>
          </h6>
          <p class="text-muted mb-1">4 Kings Road, Berlin</p>
          <p class="mb-2">📞 (555) 234-5678</p>
          <button class="btn btn-view btn-sm">View Info</button>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-4">
        <div class="service-card">
          <h6 class="font-weight-bold">Chewie & Co. Pet Supplies</h6>
          <p class="text-muted mb-1">77 Pine Ave, Berlin</p>
          <p class="mb-2">📞 (555) 345-6789</p>
          <button class="btn btn-view btn-sm">View Info</button>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-md-4">
        <div class="service-card">
          <h6 class="font-weight-bold">Canine Meadows Dog Park</h6>
          <p class="text-muted mb-1">9 Park Street, Berlin</p>
          <p class="mb-2">📞 (555) 456-7890</p>
          <button class="btn btn-view btn-sm">View Info</button>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="col-md-4">
        <div class="service-card">
          <h6 class="font-weight-bold">The Healthy Pet Store</h6>
          <p class="text-muted mb-1">22 Oxford St, Berlin</p>
          <p class="mb-2">📞 (555) 567-8901</p>
          <button class="btn btn-view btn-sm">View Info</button>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="col-md-4">
        <div class="service-card">
          <h6 class="font-weight-bold">City Animal Hospital 
            <span class="badge-featured">Featured</span>
          </h6>
          <p class="text-muted mb-1">15 Main Square, Berlin</p>
          <p class="mb-2">📞 (555) 678-9012</p>
          <button class="btn btn-view btn-sm">View Info</button>
        </div>
      </div>

    </div>
  </div>

</body>
</html>
