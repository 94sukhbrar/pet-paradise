 <style>
    body {
      background: #f1f6ff;
      font-family: Arial, sans-serif;
    }
    .search-bar {
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      margin-bottom: 30px;
    }
    .pet-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      overflow: hidden;
      margin-bottom: 25px;
      transition: 0.3s;
    }
    .pet-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    .pet-img {
      background: #ddd;
      width: 100%;
      height: 200px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #666;
      font-size: 20px;
    }
    .pet-body {
      padding: 15px;
    }
    .badge-lost {
      background: #ff4d4f;
      color: #fff;
      padding: 5px 10px;
      border-radius: 6px;
      font-size: 12px;
    }
    .badge-found {
      background: #52c41a;
      color: #fff;
      padding: 5px 10px;
      border-radius: 6px;
      font-size: 12px;
    }
    .btn-contact {
      background: #6c63ff;
      color: #fff;
      border-radius: 8px;
      font-weight: 500;
      padding: 6px 15px;
    }
    .btn-contact:hover {
      background: #574fd6;
    }
  </style>
</head>
<body>

  <div class="container py-5">
    <!-- Header -->
    <div class="text-center mb-4">
      <h3 class="font-weight-bold">Lost/Found Pet Alerts – Help Bring Them Home</h3>
      <p class="text-muted">Browse pets in Berlin. If you have seen or have any important info relating to one, please click on it to see the owner’s post and contact them directly. Let’s help our furry friends return to safety.</p>
    </div>

    <!-- Search & Filter -->
    <div class="search-bar">
      <div class="form-row align-items-center">
        <div class="col-md-4 mb-2">
          <input type="text" class="form-control" placeholder="Enter pet name...">
        </div>
        <div class="col-md-2 mb-2">
          <select class="form-control">
            <option>All Pet Types</option>
            <option>Dog</option>
            <option>Cat</option>
            <option>Bird</option>
          </select>
        </div>
        <div class="col-md-2 mb-2">
          <select class="form-control">
            <option>All Status</option>
            <option>Lost</option>
            <option>Found</option>
          </select>
        </div>
        <div class="col-md-2 mb-2">
          <button class="btn btn-primary btn-block">Search</button>
        </div>
        <div class="col-md-2 mb-2 text-right">
          <button class="btn btn-danger btn-block">Report Lost/Found Pet</button>
        </div>
      </div>
    </div>

    <!-- Pets Grid -->
    <div class="row">
      
      <!-- Pet Card 1 -->
      <div class="col-md-4">
        <div class="pet-card">
          <div class="pet-img">400 x 300</div>
          <div class="pet-body">
            <h6 class="font-weight-bold">Max <span class="badge-lost">Lost</span></h6>
            <p class="text-muted mb-1">Golden Retriever, last seen near Park Street</p>
            <p class="mb-2">📞 Contact: (555) 123-4567</p>
            <button class="btn btn-contact btn-sm">Contact Owner</button>
          </div>
        </div>
      </div>

      <!-- Pet Card 2 -->
      <div class="col-md-4">
        <div class="pet-card">
          <div class="pet-img">400 x 300</div>
          <div class="pet-body">
            <h6 class="font-weight-bold">Chico <span class="badge-lost">Lost</span></h6>
            <p class="text-muted mb-1">Small Chihuahua, brown coat</p>
            <p class="mb-2">📞 Contact: (555) 234-5678</p>
            <button class="btn btn-contact btn-sm">Contact Owner</button>
          </div>
        </div>
      </div>

      <!-- Pet Card 3 -->
      <div class="col-md-4">
        <div class="pet-card">
          <div class="pet-img">400 x 300</div>
          <div class="pet-body">
            <h6 class="font-weight-bold">Found Dog <span class="badge-found">Found</span></h6>
            <p class="text-muted mb-1">Black Labrador found near Main Square</p>
            <p class="mb-2">📞 Contact: (555) 345-6789</p>
            <button class="btn btn-contact btn-sm">Contact Finder</button>
          </div>
        </div>
      </div>

      <!-- Pet Card 4 -->
      <div class="col-md-4">
        <div class="pet-card">
          <div class="pet-img">400 x 300</div>
          <div class="pet-body">
            <h6 class="font-weight-bold">Bella <span class="badge-lost">Lost</span></h6>
            <p class="text-muted mb-1">White Persian Cat, very friendly</p>
            <p class="mb-2">📞 Contact: (555) 456-7890</p>
            <button class="btn btn-contact btn-sm">Contact Owner</button>
          </div>
        </div>
      </div>

      <!-- Pet Card 5 -->
      <div class="col-md-4">
        <div class="pet-card">
          <div class="pet-img">400 x 300</div>
          <div class="pet-body">
            <h6 class="font-weight-bold">Smokey <span class="badge-found">Found</span></h6>
            <p class="text-muted mb-1">Grey Cat found in City Park</p>
            <p class="mb-2">📞 Contact: (555) 567-8901</p>
            <button class="btn btn-contact btn-sm">Contact Finder</button>
          </div>
        </div>
      </div>

      <!-- Pet Card 6 -->
      <div class="col-md-4">
        <div class="pet-card">
          <div class="pet-img">400 x 300</div>
          <div class="pet-body">
            <h6 class="font-weight-bold">Mittens <span class="badge-lost">Lost</span></h6>
            <p class="text-muted mb-1">Tabby Cat with collar</p>
            <p class="mb-2">📞 Contact: (555) 678-9012</p>
            <button class="btn btn-contact btn-sm">Contact Owner</button>
          </div>
        </div>
      </div>

    </div>
  </div>