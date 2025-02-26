<?php
session_start();

include '../koneksi.php'; // Pastikan file config.php berisi koneksi ke database

// Ambil jumlah film dari database
$queryFilm = "SELECT COUNT(*) AS total_film FROM film";
$resultFilm = mysqli_query($conn, $queryFilm);
$rowFilm = mysqli_fetch_assoc($resultFilm);
$totalFilm = $rowFilm['total_film'];

// Ambil jumlah pengguna dari database
$queryUser = "SELECT COUNT(*) AS total_user FROM users";
$resultUser = mysqli_query($conn, $queryUser);
$rowUser = mysqli_fetch_assoc($resultUser);
$totalUser = $rowUser['total_user'];

// Ambil jumlah transaksi dari database
$queryTransaksi = "SELECT COUNT(*) AS total_transaksi FROM transactions";
$resultTransaksi = mysqli_query($conn, $queryTransaksi);
$rowTransaksi = mysqli_fetch_assoc($resultTransaksi);
$totalTransaksi = $rowTransaksi['total_transaksi'];

$queryIncomeHarian = "SELECT SUM(amount) AS total_income FROM transactions ";
$resultIncomeHarian = mysqli_query($conn, $queryIncomeHarian);
$rowIncomeHarian = mysqli_fetch_assoc($resultIncomeHarian);
$totalIncomeHarian = $rowIncomeHarian['total_income'] ?? 0;


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Halaman Utama</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="#">
          <img src="images/logobioskop.jpg" alt="logo" style="height: 60px; width: auto;">
          <span>Movie Time</span>
        </a>
      </div>
 
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" 
    style="background-color:rgb(69, 214, 240);">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
      
      </ul>
     
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="icon-user"></i>
            <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : "Guest"; ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" onclick="confirmLogout(event)">
              <i class="fa fa-sign-out-alt"></i> Logout
            </a>
          </div>
        </li>
      </ul>

      <script>
        function confirmLogout(event) {
          event.preventDefault(); // Mencegah aksi default link
          event.stopPropagation(); // Mencegah dropdown tertutup
          if (confirm("Apakah Anda yakin ingin keluar?")) {
            window.location.href = "logout.php";
          }
        }
      </script>

      <style>
        .navbar-nav .dropdown-menu {
          display: none;
          position: absolute;
          top: 100%;
          right: 0;
          background-color: #fff;
          border-radius: 5px;
          box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
          z-index: 1000;
        }

        .navbar-nav .nav-item.dropdown:hover .dropdown-menu {
          display: block;
        }
      </style>

      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
      </button>
    </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php
      include "componen/sidebar.php"
      ?>
<style>
  /* Custom Tailwind-style CSS tanpa CDN */
.custom-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
}

@media (min-width: 768px) {
    .custom-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.custom-card {
    background-color: white;
    padding: 1.5rem;
    border-radius: 1rem;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    display: block; /* Ubah dari flex ke block */
    transition: transform 0.2s ease-in-out;
    word-break: break-word; /* Pastikan teks tetap dalam batas card */
}

.custom-card:hover {
    transform: scale(1.05);
}


.custom-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: #4b5563;
}

.custom-value {
    font-size: 1.875rem;
    font-weight: 700;
}

.custom-icon {
    font-size: 3rem;
}

.text-blue {
    color: #2563eb;
}

.text-green {
    color: #16a34a;
}

.text-red {
    color: #dc2626;
}

</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
            <section class="custom-grid">
    <!-- Jumlah Film -->
    <div class="custom-card">
        <div>
            <h3 class="custom-title">Total Film</h3>
            <p class="custom-value text-blue"><?php echo $totalFilm; ?></p>
        </div>
        <i class="fas fa-film custom-icon text-blue"></i>
    </div>

    <!-- Jumlah Pengguna -->
    <div class="custom-card">
        <div>
            <h3 class="custom-title">Total Pengguna</h3>
            <p class="custom-value text-green"><?php echo $totalUser; ?></p>
        </div>
        <i class="fas fa-users custom-icon text-green"></i>
    </div>

    <!-- Total Transaksi -->
    <div class="custom-card">
        <div>
            <h3 class="custom-title">Total Transaksi</h3>
            <p class="custom-value text-red"><?php echo $totalTransaksi; ?></p>
        </div>
        <i class="fas fa-shopping-cart custom-icon text-red"></i>
    </div>
    <div class="custom-card">
    <div>
        <h3 class="custom-title">Pendapatan Hari Ini</h3>
        <p class="custom-value text-green">Rp <?php echo number_format($totalIncomeHarian, 0, ',', '.'); ?></p>
    </div>
    <i class="fas fa-money-bill-wave custom-icon text-green"></i>
</div>
</section>

            </div>
        </div>

       
          </div>


        </div>
        <div class="carousel-item">

          <div class="col-md-12 col-xl-9">
            <div class="row">

              <div class="col-md-6 mt-3">
                <canvas id="south-america-chart"></canvas>
                <div id="south-america-legend"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  </div>
  </div>
  </div>
  </div>




  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->

  <!-- partial -->
  </div>
  <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>