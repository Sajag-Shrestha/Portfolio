<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Manage Contacts</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Contacts</li>
        <li class="breadcrumb-item active">Manage Contacts > Edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
              <h5 class="card-title">Manage Contacts</h5>
              <a class="fs-3" href="index.php" role="button"><i class="fa-solid fa-circle-chevron-left"></i></a>
            </div>

            <?php

            if (isset($_GET['id'])) {
              $id = $_GET['id'];

              $data = "SELECT * FROM contacts where id='$id'";
              $data_result = mysqli_query($con, $data);
              $fetch_data = mysqli_fetch_assoc($data_result);
            }

            if (isset($_POST['register'])) {
              $name = $_POST['name'];
              $email = $_POST['email'];
              $subject = $_POST['subject'];
              $message = $_POST['message'];

              if ($name != "" && $email != "" && $subject != "" && $message != "") {
                $insert = "UPDATE contacts SET name='$name', email='$email', subject='$subject', message='$message' where id='$id'";
                $result = mysqli_query($con, $insert);

                if ($result) {
            ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Contact is Updated</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php
                  echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?success\">";
                } else {
                ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Contact is not Updated</strong>
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
              <div class="col-md-6">
                <label for="input1" class="form-label">Name</label>
              <input type="text" class="form-control" name="name" value="<?php echo  $fetch_data['name']; ?>" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo  $fetch_data['email']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="col-md-12">
                <label for="input1" class="form-label">Subject</label>
                <input type="text" class="form-control" name="subject" value="<?php echo  $fetch_data['subject']; ?>" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="col-md-12">
                <label for="input1" class="form-label">Message</label>
                <textarea class="form-control" id="input1" name="message" rows="3"><?php echo $fetch_data['message'] ?></textarea>
              </div>
              <button type="submit" class="btn btn-danger btn-sm" name="register">Submit</button>
            </form>

          </div>
        </div>

      </div>
    </div>
  </section>

  <?php require('../includes/footer.php') ?>