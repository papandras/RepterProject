<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budapest Airport</title>
    <link rel="shortcut icon" href="https://w7.pngwing.com/pngs/205/97/png-transparent-airplane-icon-a5-takeoff-computer-icons-flight-airplane.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        #tablemenu{
            margin: auto;
        }
    </style>
</head>
<body>
<div class="container">
  <header>
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-white">
              <div class="container-fluid">
                <button
                  class="navbar-toggler"
                  type="button"
                  data-mdb-toggle="collapse"
                  data-mdb-target="#navbarExample01"
                  aria-controls="navbarExample01"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarExample01">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                      <a class="nav-link" aria-current="page" href="index.php">Kezdőlap</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="about.php">Rólunk</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
            <!-- Navbar -->
          
            <!-- Background image -->
            <div
              class="p-5 text-center bg-image"
              style="
                background-image: url('https://sm.ign.com/t/ign_hu/blogroll/m/microsoft-/microsoft-flight-simulator-releases-alpha-testers-gameplay-s_4nf8.1280.jpg');
                height: 400px;
                background-size: cover;
              "
              
            >
              <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                <div class="d-flex justify-content-center align-items-center h-100">
                  <div class="text-white">
                    <h1 class="mb-3">Budapest Airport</h1>
                    <h4 class="mb-3">Járatinformációk</h4>
                  </div>
                </div>
              </div>
            </div>
            <!-- Background image -->
  </header>

  <main>
    <div>
        <ul class="list-group list-group-horizontal" id="tablemenu">
          <li class="list-group-item active" aria-current="true">Indulás</li>
          <li class="list-group-item">Érkezés</li>
        </ul>
    
          <table class="table table-hover table-dark">
              <thead>
                  <tr>
                      <th scope="col">Időpont</th>
                      <th scope="col">Célállomás</th>
                      <th scope="col">Légitársaság</th>
                      <th scope="col">Járatszám</th>
                      <th scope="col">Terminál</th>
                      <th scope="col">Státusz</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td scope="row">22:05</th>
                      <td>Milan BGY</td>
                      <td>Ryanair</td>
                      <td>FR8411</td>
                      <td>2B</td>
                      <td>Felszállt 22:39</td>
                  </tr>
                  <tr>
                      <td scope="row">22:40</th>
                      <td>Dubai DXB</td>
                      <td>Emirates</td>
                      <td>EK114</td>
                      <td>2B</td>
                      <td>Felszállt 22:31</td>
                  </tr>
                  <tr>
                      <td scope="row">22:45</th>
                      <td>Copenhagen</td>
                      <td>Norwegian</td>
                      <td>DY3553</td>
                      <td>2B</td>
                      <td>Felszállt 22:47</td>
                  </tr>
                  <tr>
                      <td scope="row">06:00</th>
                      <td>Paris ORY</td>
                      <td>Wizz Air</td>
                      <td>W62367</td>
                      <td>2B</td>
                      <td>Felszállt 06:15</td>
                  </tr>
                  <tr>
                      <td scope="row">06:10</th>
                      <td>Tel Aviv TLV</td>
                      <td>Wizz Air</td>
                      <td>W62325</td>
                      <td>2B</td>
                      <td>Felszállt 06:17</td>
                  </tr>
                  <tr>
                      <td scope="row">06:10</th>
                      <td>Tel Aviv TLV</td>
                      <td>Wizz Air</td>
                      <td>W62325</td>
                      <td>2B</td>
                      <td>Felszállt 06:17</td>
                  </tr>
                  <tr>
                      <td scope="row">06:10</th>
                      <td>Tel Aviv TLV</td>
                      <td>Wizz Air</td>
                      <td>W62325</td>
                      <td>2B</td>
                      <td>Felszállt 06:17</td>
                  </tr>
              </tbody>
        </table>
    </div>
  </main>

  <footer class="text-center text-white" style="background-color: #caced1;">
    <!-- Grid container -->
    <div class="container p-4">
      <!-- Section: Images -->
      <section class="">
        <div class="row">
          <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
            <div
              class="bg-image hover-overlay ripple shadow-1-strong rounded"
              data-ripple-color="light"
            >
              <img
                src="https://mdbootstrap.com/img/new/fluid/city/113.jpg"
                class="w-100"
              />
              <a href="#!">
                <div
                  class="mask"
                  style="background-color: rgba(251, 251, 251, 0.2);"
                ></div>
              </a>
            </div>
          </div>
          <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
            <div
              class="bg-image hover-overlay ripple shadow-1-strong rounded"
              data-ripple-color="light"
            >
              <img
                src="https://mdbootstrap.com/img/new/fluid/city/111.jpg"
                class="w-100"
              />
              <a href="#!">
                <div
                  class="mask"
                  style="background-color: rgba(251, 251, 251, 0.2);"
                ></div>
              </a>
            </div>
          </div>
          <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
            <div
              class="bg-image hover-overlay ripple shadow-1-strong rounded"
              data-ripple-color="light"
            >
              <img
                src="https://mdbootstrap.com/img/new/fluid/city/112.jpg"
                class="w-100"
              />
              <a href="#!">
                <div
                  class="mask"
                  style="background-color: rgba(251, 251, 251, 0.2);"
                ></div>
              </a>
            </div>
          </div>
          <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
            <div
              class="bg-image hover-overlay ripple shadow-1-strong rounded"
              data-ripple-color="light"
            >
              <img
                src="https://mdbootstrap.com/img/new/fluid/city/114.jpg"
                class="w-100"
              />
              <a href="#!">
                <div
                  class="mask"
                  style="background-color: rgba(251, 251, 251, 0.2);"
                ></div>
              </a>
            </div>
          </div>
          <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
            <div
              class="bg-image hover-overlay ripple shadow-1-strong rounded"
              data-ripple-color="light"
            >
              <img
                src="https://mdbootstrap.com/img/new/fluid/city/115.jpg"
                class="w-100"
              />
              <a href="#!">
                <div
                  class="mask"
                  style="background-color: rgba(251, 251, 251, 0.2);"
                ></div>
              </a>
            </div>
          </div>
          <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
            <div
              class="bg-image hover-overlay ripple shadow-1-strong rounded"
              data-ripple-color="light"
            >
              <img
                src="https://mdbootstrap.com/img/new/fluid/city/116.jpg"
                class="w-100"
              />
              <a href="#!">
                <div
                  class="mask"
                  style="background-color: rgba(251, 251, 251, 0.2);"
                ></div>
              </a>
            </div>
          </div>
        </div>
      </section>
      <!-- Section: Images -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      BETA 1.0
    </div>
    <!-- Copyright -->
  </footer>
</div>
</body>
</html>