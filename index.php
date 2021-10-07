<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        footer {
           position: fixed;
           bottom: 0;
        }
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
                      <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">About</a>
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
              "
            >
              <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                <div class="d-flex justify-content-center align-items-center h-100">
                  <div class="text-white">
                    <h1 class="mb-3">Heading</h1>
                    <h4 class="mb-3">Subheading</h4>
                  </div>
                </div>
              </div>
            </div>
            <!-- Background image -->
          </header>

          <div>
              <ul class="list-group list-group-horizontal" id="tablemenu">
                <li class="list-group-item active" aria-current="true">An active item</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And a fifth one</li>
              </ul>
              
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
              </table>
          </div>
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
              © 2020 Copyright:
              <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
          </footer>
      </div>
</body>
</html>