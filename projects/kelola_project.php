<?php
  session_start();
  $username = $_SESSION['username'];
  if(empty($_SESSION['username'])){
    header("location:../profile/login.php?pesan=belum_login");
  }
?>
<?php 
  include '../model/connect.php';
  date_default_timezone_get(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="icon" href="../assets/img/me.png" type="image/x-icon">
  <link rel="shortcut icon" href="../assets/img/me.png" type="image/x-icon">
  <title>Halaman Admin | Projects - Agit & Co</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/styleadmin.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/styleadmin.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Sirius
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://Sirius.com/nice-admin-bootstrap-admin-html-template/
  * Author: Sirius.com
  * License: https://Sirius.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <!-- Logo -->
      <div class="row align-items-center" style="margin-left: -1.5rem;">
        <div class="col">
        <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="bi bi-list toggle-sidebar-btn"></i></a>
        </div>
        <div class="col">
          <a href="../admin.php" class="logo d-flex align-items-center">
            <img src="../assets/img/logo.png" alt="">
            <span class="d-none d-lg-block"> Agit & Co</span>
          </a>
        </div>
      </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- Profile Nav -->
        <li class="nav-item dropdown pe-3">

          <!-- Profile Image Icon -->
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../assets/img/me.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Agit & Co</span>
          </a><!-- End Profile Image Icon -->

          <!-- Profile Dropdown Items -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Agit & Co</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

             
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../profile/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Agit & Co</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
    <ul class="sidebar-nav" id="sidebar-nav">
          <!-- Dashboard Nav -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="../admin.php">
              <i class="bi bi-grid-1x2-fill"></i>
              <span>Dashboard</span>
            </a>
          </li><!-- End Dashboard Nav -->
          <!-- Projects -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="../gambar/viewgambar.php">
              <i class="bi bi-camera-fill"></i>
              <span>Kelola Gambar</span>
            </a>
          </li><!-- End Projects -->
          <!-- Journal -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="../journal/viewjournal.php">
            <i class="bi bi-journal-bookmark-fill"></i>
              <span>Journals</span>
            </a>
          </li><!-- End Journal -->
          <!-- Projects -->
          <li class="nav-item">
            <a class="nav-link " href="./tabel_project.php">
              <i class="bi bi-folder-fill"></i>
              <span>Projects</span>
            </a>
          </li><!-- End Projects -->
          <!-- Team -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="../projects/team.php">
              <i class="bi bi-people-fill"></i>
              <span>Team</span>
            </a>
          </li><!-- End Team -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="../profile/pesan.php">
              <i class="bi bi-chat-dots-fill"></i>
              <span>Pesan</span>
            </a>
          </li>
        </ul>
    </div>
  </div>
  <!-- End Sidebar -->

  <!-- ======= Main ======= -->
  <main id="main" class="main mt-5 pt-5" style="margin: 0;">

    <div class="pagetitle">
      <h1>Kelola Project Baru</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item ">Home</li>
          <li class="breadcrumb-item ">Projects</li>
          <li class="breadcrumb-item ">Tabel Projects</li>
          <li class="breadcrumb-item active">Kelola Project</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col">
          <div class="row">

            <!-- Recent Projects -->
            <?php
              function randString($length) {
                $char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $char = str_shuffle($char);
                for($i = 0, $rand = '', $l = strlen($char) - 1; $i < $length; $i ++) {
                    $rand .= $char{mt_rand(0, $l)};
                }
                return $rand;
              }

              for($i = 0; $i < 10 ; $i++)
              {
                  $id_project = randString(5);
              }

              if(isset($_GET['kelola'])){
                // 'Tambah' condition
                if($_GET['kelola'] == 'tambah'){
                  $nama       ="";
                  $lokasi   ="";
                  $idyoutube      ="";
                  $kategori     ="";
                }else{
                    // 'Edit' Condition - Form terisi dengan data didatabase
                    $query = mysqli_query($connect, "SELECT * FROM projects WHERE id_project='".$_GET['id']."'");
                    while($data=mysqli_fetch_array($query)){
                      $id_project =$data[0];
                      $nama       =$data[1];
                      $lokasi     =$data[2];
                      $idyoutube  =$data[3];
                      $kategori   =$data[4];
                      $img_files  =$data[5];
                    }
                }
            }
            ?>
            <div class="col">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <div class="row py-4">
                    <div class="col">
                      <h2 class="fw-bold mb-1" style="text-transform: capitalize;"><?= $_GET['kelola'] ?> Project</h2>
                      <?php if($_GET['kelola'] == 'hapus') echo '<h5 class="fw-bold mb-1 mt-3 bg-danger text-light p-1 rounded-1 text-center" >Data akan hilang dari database dan tidak bisa dikembalikan!</h5>' ?>
                    </div>
                  </div>
                  <form action="../model/proses_project.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" value=<?= $_GET['kelola'] ?> name="kelola" />
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label fw-bold">Project ID</label>
                      <input type="text" class="form-control bg-dark-light" name="id_project" id="projectName" value=<?= $id_project ?> />
                      <div class="form-text"><span class="text-danger">*</span> Terisi otomatis</div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label fw-bold fw-bold">Project Name</label>
                      <input type="text" class="form-control" name="nama" id="projectName" placeholder="ex. Wedding Egie Tatsa" value='<?= $nama ?>' />
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label fw-bold fw-bold">Project Location</label>
                      <input type="text" class="form-control" name="lokasi" id="projectName" placeholder="ex. Bali" value='<?= $lokasi ?>' />
                    </div>
                    <!-- <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label fw-bold fw-bold">Tanggal Project</label>
                      <input type="datetime-local" class="form-control <?php if($_GET['kelola'] != 'edit') echo 'bg-dark-light' ?>" name="datetime" id="projectName" value=<?= $datetime ?> />
                      <?php if($_GET['kelola'] != 'edit') echo '<div class="form-text"><span class="text-danger">*</span> Terisi otomatis</div>'; ?>
                    </div> -->
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label fw-bold fw-bold">Id Youtube</label>
                      <input type="text" class="form-control" name="idyoutube" id="projectName" placeholder="Masukkan Id Youtube" value='<?= $idyoutube ?>' />
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label fw-bold fw-bold">Kategori</label>
                      <select class="form-select" name="kategori" aria-label="Default select example">
                        <option selected disabled>Open this select menu</option>
                        <option value="Pre-Wedding" <?php if($kategori =="Pre-Wedding") echo 'selected'; ?>>Pre Wedding</option>
                        <option value="Wedding" <?php if($kategori =="Wedding") echo 'selected'; ?>>Wedding</option>
                        <option value="Studio" <?php if($kategori =="Studio") echo 'selected'; ?>>Studio</option>
                        <option value="Family" <?php if($kategori =="Family") echo 'selected'; ?>>Family</option>
                        <option value="Film" <?php if($kategori =="Film") echo 'selected'; ?>>Film</option>
                        <option value="Etc" <?php if($kategori =="Etc") echo 'selected'; ?>>Etc</option>

                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="fileInput" class="form-label fw-bold fw-bold">Unggah Gambar</label><br/>
                      <input type="file" class="form-control-file" name="img_file[]" accept=".jpg,.gif,.png,.webp" multiple/>
                    </div>
                    <?php
                      if($_GET['kelola'] == 'edit'){
                    ?>
                            <?php
                            if ($img_files!=''){
                            ?>
                    <div class="mb-3">
                      <label for="fileInput" class="form-label fw-bold fw-bold">Daftar Gambar</label>
                      <div class="form-text"><span class="text-danger">*</span> Centang untuk menghapus gambar</div>
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Nama File</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $array_imgs = explode(",", $img_files);
                            $i =0;
                            foreach($array_imgs as $img ){
                            $i++;
                          ?>
                          <tr>
                            <td><input type="checkbox" name="delete_img[ ]" value="<?= $img ?>"></td>
                            <td><img style="width: 75px" src='<?php echo "../assets/img/portofolio/".$id_project."/".$img; ?>' alt="<?= $id_project ?>"></td>
                            <td><?= $img ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Nama File</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <?php }?>
                    <?php } ?>
                    <div class="row">
                      <div class="col-12" style="text-align: end;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </div><!-- End Recent Projects -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="margin: 0;">
    <div class="copyright">
      &copy; Copyright <strong><span>Sirius</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://Sirius.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://Sirius.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://Sirius.com/">Sirius</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>