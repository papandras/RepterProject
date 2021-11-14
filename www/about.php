<?php
require("php/Datas.php");
?>

<!DOCTYPE html>
<html lang="hu">

<?php
require("parts/head.php");
?>

<body>
    <div class="plane" id="plane"></div>
    <div class="plane" id="plane2"></div>
    <div class="container">
        <header>
            <!-- Navbar -->
            <nav class="navbar navbar-expand navbar-light bg-white">
                <div class="container-fluid" style="position: relative;">
                                
                    <div class="collapse navbar-collapse" id="navbarExample01">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" aria-current="page" href="index.php">Kezdőlap</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">Rólunk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="links.php">Hivatkozások</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar -->

            <!-- Background image -->
            <div class="p-5 text-center bg-image img-fluid" style="
                background-image: url('https://sm.ign.com/t/ign_hu/blogroll/m/microsoft-/microsoft-flight-simulator-releases-alpha-testers-gameplay-s_4nf8.1280.jpg');
                height: 400px;
                background-size: cover;
              ">
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-white">
                            <h1 class="mb-3"><?php echo $kivalasztottRepter ?></h1>
                            <h4 class="mb-3">Járatinformációk</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Background image -->
        </header>

        <p id="movetxt">Ezen a weblapon kigyűjtöttük a repterekkel kapcsolatos járatinformációkat.</p>

        <div id="load">
            <?php
                require("parts/footer.php");
            ?>
        </div>
    </div>
</body>

</html>