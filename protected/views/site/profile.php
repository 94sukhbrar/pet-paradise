<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Profile | Divine Paws</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
:root{
  --primary:#009688;
  --bg:#f4fbfa;
}

body{
  background:var(--bg);
  font-family:Inter, sans-serif;
}

/* PROFILE LEFT */
.profile-sidebar{
  background:#fff;
  border-radius:22px;
  padding:25px 20px;
  text-align:center;
  box-shadow:0 8px 25px rgba(0,0,0,.08);
  position:sticky;
  top:30px;
}

.profile-sidebar img{
  width:110px;
  height:110px;
  border-radius:50%;
  border:4px solid var(--primary);
  object-fit:cover;
}

.profile-sidebar h5{
  margin-top:15px;
  font-weight:600;
}

.profile-sidebar p{
  font-size:14px;
  color:#666;
}

/* POSTS */
.post-card{
  background:#fff;
  border-radius:22px;
  box-shadow:0 10px 30px rgba(0,0,0,.08);
  margin-bottom:25px;
}

.post-header{
  padding:15px;
  display:flex;
  align-items:center;
  gap:10px;
}

.post-header img{
  width:36px;
  height:36px;
  border-radius:50%;
}

.post-body{
  padding:18px;
  font-size:15px;
}

.post-image{
  width:100%;
  max-height:360px;
  object-fit:cover;
  border-radius:0 0 22px 22px;
}

/* PETS RIGHT */
.pet-card{
  background:#fff;
  border-radius:22px;
  padding:20px;
  box-shadow:0 8px 25px rgba(0,0,0,.08);
  position:sticky;
  top:30px;
}

.pet-item{
  border-bottom:1px solid #eee;
}

.pet-item:last-child{
  border-bottom:none;
}

.pet-header{
  display:flex;
  justify-content:space-between;
  align-items:center;
  padding:12px 5px;
  cursor:pointer;
}

.pet-left{
  display:flex;
  align-items:center;
  gap:12px;
}

.pet-icon{
  width:42px;
  height:42px;
  border-radius:14px;
  background:linear-gradient(135deg,#009688,#26a69a);
  color:#fff;
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:20px;
}

.pet-body{
  display:none;
  padding:0 5px 15px 60px;
  font-size:14px;
  color:#555;
}
</style>
</head>

<body>

<div class="container-fluid my-4 px-4">
  <div class="row">

    <!-- LEFT PROFILE -->
    <div class="col-lg-3 mb-4">
      <div class="profile-sidebar">
        <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1">
        <h5>Sukhwinder Kaur</h5>
        <p>Pet Parent<br>Divine Paws Community</p>
      </div>
    </div>

    <!-- MIDDLE POSTS -->
    <div class="col-lg-5">
      <div class="post-card">
        <div class="post-header">
          <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1">
          <strong>Sukhwinder Kaur</strong>
        </div>
        <div class="post-body">
          Morning walk with Buddy 🐾💚
        </div>
        <img src="https://images.unsplash.com/photo-1558788353-f76d92427f16" class="post-image">
      </div>

      <div class="post-card">
        <div class="post-header">
          <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1">
          <strong>Sukhwinder Kaur</strong>
        </div>
        <div class="post-body">
          Luna enjoying a peaceful afternoon nap 😴🐈
        </div>
      </div>
    </div>

    <!-- RIGHT PETS -->
    <div class="col-lg-4 mb-4">
      <div class="pet-card">
        <h6 class="mb-3">🐾 Pets</h6>

        <div class="pet-item">
          <div class="pet-header">
            <div class="pet-left">
              <div class="pet-icon">🐕</div>
              <strong>Buddy</strong>
            </div>
            <span>+</span>
          </div>
          <div class="pet-body">
            Labrador • 2 Years • Male<br>
            Vaccinated • Friendly<br>
            Location: Ferozepur
          </div>
        </div>

        <div class="pet-item">
          <div class="pet-header">
            <div class="pet-left">
              <div class="pet-icon">🐈</div>
              <strong>Luna</strong>
            </div>
            <span>+</span>
          </div>
          <div class="pet-body">
            Persian • 1.5 Years • Female<br>
            Calm • Vaccinated<br>
            Adoption Available
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

<script>
document.querySelectorAll('.pet-header').forEach(header=>{
  header.addEventListener('click',()=>{
    const body = header.nextElementSibling;
    const icon = header.querySelector('span');

    document.querySelectorAll('.pet-body').forEach(b=>{
      if(b!==body){
        b.style.display='none';
        b.previousElementSibling.querySelector('span').textContent='+';
      }
    });

    if(body.style.display==='block'){
      body.style.display='none';
      icon.textContent='+';
    }else{
      body.style.display='block';
      icon.textContent='−';
    }
  });
});
</script>

</body>
</html>
