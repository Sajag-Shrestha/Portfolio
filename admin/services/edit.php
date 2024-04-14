<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Manage Services</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Services</li>
        <li class="breadcrumb-item active">Manage Services > Edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
              <h5 class="card-title">Manage Services</h5>
              <a class="fs-3" href="index.php" role="button"><i class="fa-solid fa-circle-chevron-left"></i></a>
            </div>

            <?php

            if (isset($_GET['id'])) {
              $id = $_GET['id'];

              $data = "SELECT * FROM services where id='$id'";
              $data_result = mysqli_query($con, $data);
              $fetch_data = mysqli_fetch_assoc($data_result);
            }

            if (isset($_POST['register'])) {
              $icon = $_POST['icon'];
              $title = $_POST['title'];
              $description = $_POST['description'];

              if ($title != "" && $description != "") {
                $insert = "UPDATE services SET icon='$icon', title='$title', description='$description' where id='$id'";
                $result = mysqli_query($con, $insert);

                if ($result) {
            ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Service Updated</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php
                  echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?success\">";
                } else {
                ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Service was not Updated</strong>
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
                <label for="input1" class="form-label">Icon &nbsp;</label>
                <i class="fa-solid fa-<?php echo $fetch_data['icon']; ?>"></i>
                <input type="text" class="form-control" name="icon" value= "<?php echo  $fetch_data['icon']; ?>" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo  $fetch_data['title']; ?>" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label">Description</label>
                <textarea class="form-control" id="input1" name="description" rows="3"><?php echo $fetch_data['description'] ?></textarea>
              </div>
              <button type="submit" class="btn btn-danger btn-sm" name="register">Submit</button>
            </form>

          </div>
        </div>

      </div>
    </div>
  </section>

  <?php require('../includes/footer.php') ?>