<style>
    body {
      background-color: #f5f7ff;
    }
    .section-title {
      text-align: center;
      margin-bottom: 30px;
    }
    .card-custom {
      background: #fff;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0px 2px 5px rgba(0,0,0,0.08);
    }
    .btn-custom {
      border-radius: 20px;
      padding: 5px 15px;
    }
    .sidebar-card {
      background: #fff;
      border-radius: 8px;
      padding: 15px;
      margin-bottom: 20px;
      box-shadow: 0px 2px 5px rgba(0,0,0,0.05);
    }
    .sidebar-card h6 {
      font-weight: 600;
    }
    .comm-card {
      background: #fff;
      border-radius: 8px;
      padding: 20px;
      text-align: left;
      box-shadow: 0px 2px 5px rgba(0,0,0,0.05);
    }
  </style>
</head>
<body>

<div class="container mt-4">
  <!-- Page Title -->
  <div class="section-title">
    <h2>Events & Communities</h2>
    <p>Stay connected with the pet community! Join events, share updates, and meet fellow pet lovers.</p>
  </div>

  <div class="row">
    <!-- Upcoming Events -->
    <div class="col-md-8">
      <h5 class="mb-3">Upcoming Pet Events 🐾</h5>

      <!-- Event 1 -->
      <div class="card-custom">
        <h6>Annual Pet Adoption Drive</h6>
        <p class="mb-1"><small><strong>Date:</strong> 25th Oct, 2025 | <strong>Location:</strong> City Pet Adoption Center</small></p>
        <p>Bring your furry friend or come prepared to adopt! This event has helped hundreds of pets find their forever homes.</p>
        <button class="btn btn-primary btn-sm btn-custom">Register Now</button>
        <button class="btn btn-outline-secondary btn-sm btn-custom">View Details</button>
      </div>

      <!-- Event 2 -->
      <div class="card-custom">
        <h6>Dog Walking Meetup</h6>
        <p class="mb-1"><small><strong>Date:</strong> 1st Nov, 2025 | <strong>Location:</strong> Lakeside Park</small></p>
        <p>Join fellow dog owners for a refreshing walk. A great chance to socialize & enjoy a relaxing day outdoors.</p>
        <button class="btn btn-primary btn-sm btn-custom">Register Now</button>
        <button class="btn btn-outline-secondary btn-sm btn-custom">View Details</button>
      </div>

      <!-- Event 3 -->
      <div class="card-custom">
        <h6>Free Vet Health Camp</h6>
        <p class="mb-1"><small><strong>Date:</strong> 5th Nov, 2025 | <strong>Location:</strong> Community Ground</small></p>
        <p>Free checkups for your pets! Conducted by certified veterinarians. Sponsored by PetHealth Inc.</p>
        <button class="btn btn-primary btn-sm btn-custom">Register Now</button>
        <button class="btn btn-outline-secondary btn-sm btn-custom">View Details</button>
      </div>
    </div>

    <!-- Sidebar -->
    <div class="col-md-4">
      <!-- Host Your Event -->
      <div class="sidebar-card text-center">
        <h6>Host Your Own Event!</h6>
        <p>Want to create your own pet event? Share details and invite community members to join.</p>
        <button class="btn btn-primary btn-sm">Create an Event</button>
      </div>

      <!-- Past Event Highlights -->
      <div class="sidebar-card">
        <h6>Past Event Highlights</h6>
        <div class="row">
          <div class="col-6 mb-2">
            <img src="https://via.placeholder.com/400x300" class="img-fluid rounded">
          </div>
          <div class="col-6 mb-2">
            <img src="https://via.placeholder.com/400x300" class="img-fluid rounded">
          </div>
          <div class="col-6">
            <img src="https://via.placeholder.com/400x300" class="img-fluid rounded">
          </div>
          <div class="col-6">
            <img src="https://via.placeholder.com/400x300" class="img-fluid rounded">
          </div>
        </div>
      </div>

      <!-- Safety & Guidelines -->
      <div class="sidebar-card">
        <h6>Safety & Guidelines</h6>
        <ul class="pl-3 mb-0">
          <li>Always keep your pet on a leash.</li>
          <li>Bring water and essentials for your pet.</li>
          <li>Follow community rules and respect other participants.</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Communication Channels -->
  <div class="mt-5">
    <h5 class="mb-3">Communication Channels 💬</h5>
    <div class="row">
      <div class="col-md-6">
        <div class="comm-card">
          <h6>Community Chat Groups</h6>
          <p>Join active WhatsApp & Telegram groups to stay updated with the latest events & connect with local pet lovers.</p>
          <button class="btn btn-outline-primary btn-sm">Browse Groups</button>
        </div>
      </div>
      <div class="col-md-6">
        <div class="comm-card">
          <h6>Discussion Forums</h6>
          <p>Engage in meaningful discussions, ask questions, and share your pet parenting tips.</p>
          <button class="btn btn-outline-primary btn-sm">Visit Forums</button>
        </div>
      </div>
    </div>
  </div>
</div>