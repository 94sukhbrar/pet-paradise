<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Get in Touch</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #e8f0fe;
      font-family: Arial, sans-serif;
    }

    .contact-section {
      padding: 60px 0;
    }

    .contact-box {
      background: #fff;
      border-radius: 10px;
      padding: 25px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .contact-box h5 {
      font-weight: bold;
    }

    .contact-icon {
      font-size: 28px;
      color: #6c63ff;
      margin-right: 15px;
    }

    .btn-send {
      background: #6c63ff;
      color: #fff;
      border-radius: 8px;
      font-weight: bold;
    }

    .btn-send:hover {
      background: #5a54d1;
    }
    .help-block-error{
      color: red;
    }
  </style>
</head>

<body>

  <div class="container contact-section">
    <div class="text-center mb-5">
      <h2 class="font-weight-bold">Get in Touch</h2>
      <p>We’re here to help with any questions about adoption, our pets, or how you can support our mission.</p>
    </div>

    <div class="row">
      <!-- Contact Information -->
      <div class="col-md-1"></div>
      <div class="col-md-5">
        <div class="contact-box">
          <h5>Contact Information</h5>
          <p>Reach out to us directly through any of the channels below.</p>
          <div class="d-flex align-items-center mb-3">
            <span class="contact-icon">&#9993;</span>
            <div>
              <strong>Email Us</strong>
              <p class="mb-0">For inquiries or support</p>
              <a href="mailto:<?= $pet->createdBy->email ?>"><?= $pet->createdBy->email ?></a>
            </div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <span class="contact-icon">&#9742;</span>
            <div>
              <strong>Call Us</strong>
              <p class="mb-0">Mon - Fri, 9am - 5pm</p>
              <span><?= $pet->createdBy->contact_no ?></span>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <span class="contact-icon">&#128205;</span>
            <div>
              <strong>Our Store</strong>
              <p class="mb-0">Come visit us during opening hours</p>
              <span><?= $pet->createdBy->address ?></span>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="col-md-5">
        <div class="contact-box">
          <h5>Send Us a Message</h5>
          <p>Have a specific question? Fill out the form and we’ll get back to you.</p>


          <?php

          use app\components\TActiveForm;

          $form = TActiveForm::begin([
            'id' => 'contact-form',
            'options' => [
              'class' => 'driver-form form-horizontal'
            ],
            'fieldConfig' => [
              'template' => "{label}{input}{error}"
            ]
          ]);
         // echo $form->errorSummary($model);
          ?>
          <div class="row">
            <div class="col-md-6">
              <?php echo $form->field($model, 'name')->textInput(['placeholder' => 'Name'])?>
            </div>
            <div class="col-md-6">
              <?php echo  $form->field($model, 'email')->textInput(['placeholder' => 'Email'])?>
            </div>
          </div>

          <?php echo  $form->field($model, 'subject')->textInput(['placeholder' => 'Subject'])?>
          <?php echo $form->field($model, 'body')->textArea(['rows' => 6, 'placeholder' => 'Message'])?>
          <?php

          echo \yii\helpers\Html::submitButton('Submit', [
            'class' => 'btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light',
            'name' => 'submit-button'
          ]) ?>

          <?php TActiveForm::end(); ?>
        </div>

      </div>
      <div class="col-md-1"></div>
    </div>
  </div>

</body>

</html>