<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">
  <?php

  if (isset($_POST['register'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    

    if ($title != "" && $description != "") {
      $insert = "INSERT INTO skills(title, description)
VALUES('$title', '$description')";
      $result = mysqli_query($con, $insert);

      if ($result) {
  ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Skill Added</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?success\">";
      } else {
      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Skill not added</strong>
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
    <h1>Add Skill</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Skills</li>
        <li class="breadcrumb-item active">Add Skill</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add Skill</h5>

            <!-- Multi Columns Form -->
            <form class="row g-3" method="POST" enctype="multipart/form-data">
              <div class="col-md-12">
                <label for="inputName5" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="inputName5">
              </div>
              <div class="col-md-12">
                <label for="inputName5" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="inputName5">
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