<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    .lost-found-header {
        background: #009688;
        color: #fff;
        padding: 40px;
        border-radius: 10px;
        margin-bottom: 40px;
    }

    .lost-found-header h2 {
        font-size: 32px;
        margin-bottom: 10px;
    }

    .pet-form-box {
        background: #ffffff;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        margin-bottom: 30px;
    }

    .pet-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        margin-bottom: 25px;
    }

    .pet-card img {
        border-radius: 10px;
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .badge-lost {
        background: #e91e63 !important;
        font-size: 12px;
    }

    .badge-found {
        background: #4caf50 !important;
        font-size: 12px;
    }

    .form-title {
        font-size: 20px;
        font-weight: bold;
        color: #009688;
        margin-bottom: 15px;
    }
</style>

<div class="container">

    <!-- HEADER -->
    <div class="lost-found-header text-center">
        <h2><i class="fa-solid fa-paw"></i> Lost & Found Pets</h2>
        <p>Help the community by sharing details about missing or found pets.</p>
    </div>


    <div class="row">
        <!-- LOST PET FORM -->
        <div class="col-md-6">
            <div class="pet-form-box">
                <div class="form-title"><i class="fa-solid fa-search"></i> Report Lost Pet</div>

                <form>
                    <div class="form-group">
                        <label>Pet Name</label>
                        <input type="text" class="form-control" placeholder="Enter pet name">
                    </div>

                    <div class="form-group">
                        <label>Pet Type</label>
                        <select class="form-control">
                            <option>Dog</option>
                            <option>Cat</option>
                            <option>Bird</option>
                            <option>Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Last Seen Location</label>
                        <input type="text" class="form-control" placeholder="Example: Mall Road, Ferozepur">
                    </div>

                    <div class="form-group">
                        <label>Date Lost</label>
                        <input type="date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Upload Image</label>
                        <input type="file" class="form-control">
                    </div>

                    <button class="btn btn-success btn-block">Submit Lost Report</button>
                </form>
            </div>
        </div>

        <!-- FOUND PET FORM -->
        <div class="col-md-6">
            <div class="pet-form-box">
                <div class="form-title"><i class="fa-solid fa-dog"></i> Report Found Pet</div>

                <form>
                    <div class="form-group">
                        <label>Pet Type</label>
                        <select class="form-control">
                            <option>Dog</option>
                            <option>Cat</option>
                            <option>Bird</option>
                            <option>Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Found Location</label>
                        <input type="text" class="form-control" placeholder="Example: Bus Stand, Ferozepur">
                    </div>

                    <div class="form-group">
                        <label>Date Found</label>
                        <input type="date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Upload Image</label>
                        <input type="file" class="form-control">
                    </div>

                    <button class="btn btn-primary btn-block">Submit Found Report</button>
                </form>
            </div>
        </div>
    </div>



    <!-- LIST OF LOST & FOUND PETS -->
    <h3 class="mt-5 mb-3" style="color:#009688;">Recent Reports</h3>

    <div class="row">

        <!-- example cards -->
        <div class="col-md-4">
            <div class="pet-card">
                <span class="badge badge-lost">LOST</span>
                <img src="https://placekitten.com/400/300">
                <h5 class="mt-3">Simba (Dog)</h5>
                <p><i class="fa-solid fa-location-dot"></i> Last seen: Model Town, Ferozepur</p>
                <button class="btn btn-outline-danger btn-sm btn-block">View Details</button>
            </div>
        </div>

        <div class="col-md-4">
            <div class="pet-card">
                <span class="badge badge-found">FOUND</span>
                <img src="https://placekitten.com/401/300">
                <h5 class="mt-3">Unknown Cat</h5>
                <p><i class="fa-solid fa-location-dot"></i> Found at: Railway Road</p>
                <button class="btn btn-outline-success btn-sm btn-block">View Details</button>
            </div>
        </div>

    </div>

</div>


