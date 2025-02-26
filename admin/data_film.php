<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Data Film</title>
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
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="icon-user"> </i>
              <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : "Guest"; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#" onclick="confirmLogout(event)" data-bs-toggle="dropdown">
                <i class="fa fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>

        <script>
          function confirmLogout(event) {
            event.preventDefault(); // Mencegah aksi default link
            event.stopPropagation(); // Mencegah Dropdown tertutup
            if (confirm("Apakah Anda Yakin Ingin Keluar?")) {
              window.location.href = "logout.php";
            }
          }
        </script>

        <style>
          .navbar-nav .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: auto;
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
      include "componen/sidebar.php" ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data Film</h4>

              <!-- Tombol Tambah Film -->
              <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
                data-target="#modalTambahFilm">
                Tambah Film
              </button>

              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Poster</th>
                      <th>Nama Film</th>
                      <th>Deskripsi</th>
                      <th>Genre</th>
                      <th>Total Menit</th>
                      <th>Usia</th>
                      <th>Dimensi</th>
                      <th>Producer</th>
                      <th>Director</th>
                      <th>Writter</th>
                      <th>Cast</th>
                      <th>Distributor</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // Koneksi ke database
                    include('../koneksi.php');

                    // Query untuk mengambil data dari tabel film
                    $query = "SELECT * FROM film";  // Ganti 'film' dengan nama tabel yang sesuai
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                      $no = 1;
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td><img src='../" . $row['poster'] . "' alt='Poster' width='100'></td>";
                        echo "<td>" . $row['nama_film'] . "</td>";
                        echo "<td>" . $row['judul'] . "</td>";
                        echo "<td>" . $row['genre'] . "</td>";
                        echo "<td>" . $row['total_menit'] . "</td>";
                        echo "<td>" . $row['usia'] . "</td>";
                        echo "<td>" . $row['dimensi'] . "</td>";
                        echo "<td>" . $row['producer'] . "</td>";
                        echo "<td>" . $row['director'] . "</td>";
                        echo "<td>" . $row['writer'] . "</td>";
                        echo "<td>" . $row['cast'] . "</td>";
                        echo "<td>" . $row['distributor'] . "</td>";
                    
                        echo "</tr>";
                      }
                    } else {
                      echo "Error: " . mysqli_error($conn);
                    }
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalTambahFilm" tabindex="-1" role="dialog" aria-labelledby="modalTambahFilmLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalTambahFilmLabel">Tambah Film</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="../proses_input.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                      <label for="poster">Upload Poster</label>
                      <input type="file" class="form-control" id="poster" name="poster"
                        accept="image/*" required>
                    </div>
                    <div class="form-group">
                      <label for="nama_film">Nama Film</label>
                      <input type="text" class="form-control" id="nama_film" name="nama_film"
                        required>
                    </div>
                    <div class="form-group">
                      <label for="nama_film">Deskripsi</label>
                      <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <script>
                      const selectedGenres = new Set();

                      function addGenre() {
                        const genreSelect = document.getElementById('genreSelect');
                        const selectedValue = genreSelect.value;

                        if (selectedValue && !selectedGenres.has(selectedValue)) {
                          selectedGenres.add(selectedValue);

                          const listItem = document.createElement('li');
                          listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
                          listItem.textContent = selectedValue;

                          const removeBtn = document.createElement('button');
                          removeBtn.className = 'btn btn-sm btn-danger';
                          removeBtn.textContent = 'hapus';
                          removeBtn.onclick = () => {
                            selectedGenres.delete(selectedValue);
                            listItem.remove();
                            updateModalInput();
                          };

                          listItem.appendChild(removeBtn);
                          document.getElementById('selectedGenres').appendChild(listItem);

                          updateModalInput();
                        }

                        genreSelect.value = "";
                      }

                      function updateModalInput() {
                        document.getElementById('genreInput').value = Array.from(selectedGenres).join(',');
                      }
                    </script>

                    <div class="form-group">
                      <label for="genre">Genre</label>
                      <select class="form-control" id="genreSelect">
                        <option value="" disabled selected>Pilih Genre</option>
                        <option value="Action">Action</option>
                        <option value="Adventure">Adventure</option>
                        <option value="Animation">Animation</option>
                        <option value="Biography">Biography</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Crime">Crime</option>
                        <option value="Disaster">Disaster</option>
                        <option value="Documentary">Documentary</option>
                        <option value="Drama">Drama</option>
                        <option value="Epic">Epic</option>
                        <option value="Erotic">Erotic</option>
                        <option value="Experimental">Experimental</option>
                        <option value="Family">Family</option>
                        <option value="Fantasy">Fantasy</option>
                        <option value="Film-Noir">Film-Noir</option>
                        <option value="History">History</option>
                        <option value="Horror">Horror</option>
                        <option value="Martial Arts">Martial Arts</option>
                        <option value="Music">Music</option>
                        <option value="Musical">Musical</option>
                        <option value="Mystery">Mystery</option>
                        <option value="Political">Political</option>
                        <option value="Psychological">Psychological</option>
                        <option value="Romance">Romance</option>
                        <option value="Sci-Fi">Sci-Fi</option>
                        <option value="Sport">Sport</option>
                        <option value="Superhero">Superhero</option>
                        <option value="Survival">Survival</option>
                        <option value="Thriller">Thriller</option>
                        <option value="War">War</option>
                        <option value="Western">Western</option>
                      </select>

                      <button type="button" class="btn btn-primary"
                        onclick="addGenre()">Tambah</button>
                    </div>
                    <ul id="selectedGenres" class="mt-3 list-group d-flex flex-warp"
                      style="max-height: 200px; overflow-y: auto;"></ul>
                    <input type="hidden" id="genreInput" name="genre">

                    <div class="form-group">
                      <label for="cast">Cast</label>
                      <input type="text" class="form-control" id="cast" name="cast" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                      <label for="banner">Upload Banner</label>
                      <input type="file" class="form-control" id="banner" name="banner"
                        accept="image/*" required>
                    </div>
                    <div class="form-group">
                      <label for="menit">Total Menit</label>
                      <input type="text" class="form-control" id="menit" name="menit" required>
                    </div>
                    <div class="form-group">
                      <label for="usia">Usia</label>
                      <select class="form-control" id="usia" name="usia" required>
                        <option value="" disabled selected>Pilih Usia</option>
                        <option value="13">13</option>
                        <option value="17">17</option>
                        <option value="SU">SU</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="trailer">Upload Trailer</label>
                      <input type="file" class="form-control" id="trailer" name="trailer"
                        accept="video/*">
                    </div>
                    <div class="form-group">
                      <label for="distributor">Distributor</label>
                      <input type="text" class="form-control" id="distributor" name="distributor"
                        required>
                    </div>

                  </div>
                  <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                      <label for="dimensi">Berapa Dimensi</label>
                      <select class="form-control" id="dimensi" name="dimensi" required>
                        <option value="" disabled selected>Pilih Dimensi</option>
                        <option value="2D">2D</option>
                        <option value="3D">3D</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="producer">Producer</label>
                      <input type="text" class="form-control" id="producer" name="producer" required>
                    </div>
                    <div class="form-group">
                      <label for="director">Director</label>
                      <input type="text" class="form-control" id="director" name="director" required>
                    </div>
                    <div class="form-group">
                      <label for="writer">Writer</label>
                      <input type="text" class="form-control" id="writer" name="writer" required>
                    </div>


                    <div class="form-group">
                      <label for="harga">Harga Per Tiket</label>
                      <input type="number" class="form-control" id="harga" name="harga" required>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>





      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
        </div>
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>
        </div>
      </footer>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- Bootstrap 5 -->


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