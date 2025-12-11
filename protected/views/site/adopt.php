<style>
  body {
    background-color: #f9f9f9;
    font-family: 'Poppins', sans-serif;
  }

  .filter-btns {
    text-align: center;
    margin: 30px 0;
  }

  .filter-btns .btn {
    margin: 5px;
    border-radius: 25px;
    padding: 8px 20px;
    font-weight: 500;
  }

  .pet-card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
    background: #fff;
  }

  .pet-card:hover {
    transform: translateY(-5px);
  }

  .pet-card img {
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    height: 200px;
    object-fit: cover;
    width: 100%;
  }

  .price {
    font-weight: bold;
    color: #28a745;
  }

  .quick-view-btn {
    margin-top: 10px;
    border-radius: 25px;
    font-weight: 500;
  }
</style>
</head>

<body>

  <div class="container">
    <!-- Filter Buttons -->
    <div class="filter-btns">
      <button class="btn btn-primary" data-filter="all">All</button>
      <?php
      foreach ($petCategory as $key => $value) {
     ?>
      <button class="btn btn-outline-primary" data-filter="<?=$value->title?>"><?=$value->title?></button>
     <?php
      }
      ?>
      
    </div>

    <!-- Pets Grid -->
    <div class="row" id="pets-grid">

      <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_pet', // your view file for each record
        'options' => [
          'tag' => 'div',
          'class' => 'row',   // remove main wrapper class
        ],
        'itemOptions' => [
          'tag' => 'div',
          'class' => 'col-md-3',  // or 'div' with empty class
        ],
        'summaryOptions' => [
          'tag' => 'div',
          'class' => 'row col-md-12',   // remove summary class
        ],
        'summary' => "Displaying {begin} - {end} of {totalCount} posts",
       'pager' => [
        'firstPageLabel' => 'First',
        'lastPageLabel'  => 'Last',
        'prevPageLabel'  => '<',
        'nextPageLabel'  => '>',
        'maxButtonCount' => 5,

        // Bootstrap 4 pagination classes
       'options' => ['class' => 'pagination pagination-xs row col-md-12'], 
        'linkContainerOptions' => ['class' => 'page-item'],
        'linkOptions' => ['class' => 'page-link'],
    ],
      ]) ?>
    </div>
  </div>

  <!-- Bootstrap + jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Filter Script -->
  <script>
    $(document).ready(function() {
      $(".filter-btns .btn").click(function() {
        let filter = $(this).attr("data-filter");
        $(".filter-btns .btn").removeClass("btn-primary").addClass("btn-outline-primary");
        $(this).removeClass("btn-outline-primary").addClass("btn-primary");

        if (filter === "all") {
          $(".pet-item").show();
        } else {
          $(".pet-item").hide();
          $("." + filter).show();
        }
      });
    });
 

fetch("https://ipapi.co/json/")
  .then(res => res.json())
  .then(data => {
    let country = data.country_name;
    let currency =( data.currency==='INR'?'₹':'$');
   
    $(".symbol").text(currency);
  });
</script>


