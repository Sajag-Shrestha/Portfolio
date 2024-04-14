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
        <li class="breadcrumb-item active">Manage Services</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <?php
  if (isset($_GET['success'])) {
  ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Data is submitted!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
      echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
    ?>
  <?php
    }
  ?> 
  <?php
    if (isset($_GET['delete'])) {
  ?>
    <div class=" container alert alert-success alert-dismissible fade show" role="alert">
      <strong>Service Removed!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php
    echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
  }
  ?>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Manage Services</h5>

            <!-- Table with stripped rows -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Icon</th>
                  <th scope="col">Title</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $select = "SELECT * FROM services";
                $result = mysqli_query($con, $select);
                $i = 0;
                while ($data = mysqli_fetch_array($result)) {
                ?>
                  <tr>
                    <th scope="row"><?php echo ++$i; ?></th>
                    <td><i class="fa solid fa-<?php echo $data['icon']; ?>"></i></td>
                    <td><?php echo $data['title']; ?></td>
                    <td><?php echo $data['description']; ?></td>
                    <td>
                      <a class="btn btn-primary btn-sm " href="edit.php?id=<?php echo $data['id']; ?>" role="button">Edit </a>
                      <a class="btn btn-danger btn-sm " onclick="return confirm('Do you want to remove this service??');" href="delete.php?id=<?php echo $data['id']; ?>" role="button">Delete </a>
                    </td>
                  </tr>
                <?php
                }

                ?>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<?php require('../includes/footer.php'); ?>