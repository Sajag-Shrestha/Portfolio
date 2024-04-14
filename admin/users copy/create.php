<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">
  <?php

  if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    if ($name != "" && $subject != "" &&  $email != "" && $message != "") {
      $insert = "INSERT INTO contacts(name, email, subject, message)
VALUES('$name', '$email', '$subject', '$message')";
      $result = mysqli_query($con, $insert);

      if ($result) {
  ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Contact is created</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?success\">";
      } else {
      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Contact is not created</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  <?php
        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?error\">";
      }
    } else {
      ?>
      <div class=" container alert alert-danger alert-dismissible fade show" role="alert">
      <strong>All Field must be Filled!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php
      echo "<meta http-equiv=\"refresh\" content=\"2;URL=create.php\">";
    }
  }

  ?>
  <div class="pagetitle">
    <h1>Add Contact</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Contacts</li>
        <li class="breadcrumb-item active">Add Contact</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add Contact</h5>

            <!-- Multi Columns Form -->
            <form class="row g-3" method="POST" enctype="multipart/form-data">
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Your Name</label>
                <input type="text" class="form-control" name="name" id="inputName5">
              </div>
              <div class="col-md-6">
                <label for="inputEmail5" class="form-label">Your Email</label>
                <input type="email" class="form-control" name ="email" id="inputEmail5">
              </div>
              <div class="col-md-12">
                <label for="inputName5" class="form-label">Subject</label>
                <input type="text" class="form-control" name="subject" id="inputName5">
              </div>
              <div class="col-md-12">
                <label for="inputName5" class="form-label">Message</label>
                <textarea class="form-control" id="inputName5" name="message" rows="3"></textarea>
              </div>
              
              <div class="col-md-12">
                <button type="submit" name="register" class="btn btn-primary">Submit</button>
              </div>
            </form><!-- End Multi Columns Form -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php require('../includes/footer.php'); ?>