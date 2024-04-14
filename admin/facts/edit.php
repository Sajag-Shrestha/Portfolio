<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Manage Facts</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Facts</li>
        <li class="breadcrumb-item active">Manage Facts > Edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
              <h5 class="card-title">Manage Facts</h5>
              <a class="fs-3" href="index.php" role="button"><i class="fa-solid fa-circle-chevron-left"></i></a>
            </div>

            <?php

            if (isset($_GET['id'])) {
              $id = $_GET['id'];

              $data = "SELECT * FROM facts where id='$id'";
              $data_result = mysqli_query($con, $data);
              $fetch_data = mysqli_fetch_assoc($data_result);
            }

            if (isset($_POST['register'])) {
              $numbers = $_POST['numbers'];
              $title = $_POST['title'];

              if ($title != "" && $numbers != "") {
                $insert = "UPDATE facts SET numbers='$numbers', title='$title' where id='$id'";
                $result = mysqli_query($con, $insert);

                if ($result) {
            ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Fact Updated</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php
                  echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?success\">";
                } else {
                ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Fact was not Updated</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            <?php
                  echo "<meta http-equiv=\"refresh\" content=\"2;URL=create.php?error\">";
                }
              } else {
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=create.php?empty\">";
              }
            }

            ?>
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Numbers</label>
                <input type="text" class="form-control" name="numbers" value="<?php echo  $fetch_data['numbers']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo  $fetch_data['title']; ?>" id="input1" aria-describedby="emailHelp">
              </div>
              <button type="submit" class="btn btn-danger btn-sm" name="register">Submit</button>
            </form>

          </div>
        </div>

      </div>
    </div>
  </section>

  <?php require('../includes/footer.php') ?>