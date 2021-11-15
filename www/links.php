<?php
require("php/sheet.php");
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
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <b class="pe-2">Reptér információk</b>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" aria-current="page" href="index.php">Kezdőlap</a>
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

        <!--<table class="table table-hover table-responsive text-center table-dark">
            <thead>
                <tr>
                    <th scope="col">Repterek</th>
                    <th scope="col">Hivatkozások</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($linkek as $all) { ?>
                <tr>
                    <td>
                        <p><?= $all[0] ?></p>
                    </td>
                    <td>
                        <a href="<?= $all[1] ?>" target="_blank">###</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>-->


        <!-- Táblázat -->

        <table class="table table-hover table-<?php echo $table ?> table-responsive text-center mt-3" id="start" style="width: 50%; margin-left: auto; margin-right: auto">
            <thead>
                <tr>
                    <th colspan="2">A felhasznált légitársaságok honlapjai</th>
                </tr>
                <tr>
                    <th scope="col">Légitársaság</th>
                    <th scope="col">Honlap</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $getDatas = $datas->GetAirlines($repterek);
                $counter = 0;
                ?>
                <?php if (!is_null($getDatas)) : ?>
                    <?php foreach ($getDatas as $data) : ?>
                        <tr>
                            <td><?php echo $data; ?></td>
                            <td><a href="<?php echo "http://" . strtolower(str_replace("'", "", str_replace(" ", "", $data) . ".com")); ?>" target="_blank">Részletek</a></td>
                        </tr>

                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Táblázat -->
        <div id="load">
            <?php
            require("parts/footer.php");
            ?>
        </div>
    </div>
</body>

</html>