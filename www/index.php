<?php

require("php/sheet.php");
?>
<!DOCTYPE html>
<html lang="hu">
<?php
require("parts/head.php");
?>

<body>
    <!-- A mozgó repülők ezekben vannak (main.css) -->
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
                            <li class="hide nav-item" style="position: absolute; right: 10%; width: 100%">
                                <form action="php/airport.php" method="post">
                                    <select class="form-control" style="position: absolute; right: 100px;  top: 0px; width: 20%;" name="repter" onchange="this.form.submit();">
                                        <option value="">Válassz repteret</option>
                                        <?php foreach ($datas->GetAirports($repterek) as $repter) : ?>
                                            <?php if ($repter != null) : ?>
                                                <option value="<?php echo $repter; ?>" <?php if ($kivalasztottRepter == $repter) {
                                                                                            echo "selected";
                                                                                        } ?>><?php echo $repter ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </form>
                            </li>
                            <li class="hide nav-item" style="position: absolute; right: 10%;">
                                <?php
                                /**
                                 * Ebben a formban cserélődnek a stíluslapok
                                 * onchange="this.form.submit() --> Submit gombként funkcionál!
                                 * 
                                 * if($settings["style"]=="light.css" --> echo "selected"
                                 * Az aktuálisan beállított téma kerül kijelölésre
                                 * 
                                 * style.php-ban van feldolgozva
                                 */
                                ?>
                                <form action="php/style.php" method="POST">
                                    <select class="form-control" name="bgc" onchange="this.form.submit();">
                                        <option value="light.css" <?php if ($settings["style"] == "light.css") {
                                                                        echo "selected";
                                                                    } ?>>Fehér</option>
                                        <option value="dark.css" <?php if ($settings["style"] == "dark.css") {
                                                                        echo "selected";
                                                                    } ?>>Fekete</option>
                                    </select>
                                </form>
                            </li>
                            <li class="hide nav-item" style="position: absolute; right: 8%;">
                                <button class="btn refresh" style="position: absolute; top: 0px;" onclick="refresh()"><img src="./img/refresh.png" style="height: 30px;" title="Adatok legutóbb frissítve: <?php echo date("Y F d H:i:s.", filemtime("data.json")) ?>"></button>
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

        <main>
            <div class="alert alert-success text-center" id="success-alert" style="display: none">
                <strong>Siker! </strong> Adatok frissítve!
            </div>
            <div style="position: relative;" id="zoom"><button style="position: absolute; top: 0px; right: 0px;" onclick="zoom()" class="btn bg-white"><img id="full" src="./img/fullscreen.png" alt="Full screen" style="height: 30px;"></button>
                <?php
                /**
                 * A két gomb jeleníti meg az érkező / induló járatokat
                 */
                ?>
                <div class="list-group list-group-horizontal-md" id="tablemenu">
                    <button class="list-group-item text-center buttonChange" aria-current="true" onclick="start()">Indulás</button>
                    <button class="list-group-item text-center buttonChange" onclick="arrive()">Érkezés</button>
                </div>
                <!-- Érkező járatok táblája -->
                <table class="table table-hover table-<?php echo $table ?> table-responsive text-center" id="dest" style="display: none">
                    <thead>
                        <tr>
                            <td colspan="6" class="text-center">Érkező járatok<br>*<sub>A táblázat csak a 8 órán belül érkező járatokat tartalmazza!</sub></td>
                        </tr>
                        <tr>
                            <th scope="col">Időpont</th>
                            <th scope="col">Honnan</th>
                            <th scope="col" class="tarsasag">Légitársaság</th>
                            <th scope="col" class="jaratszam">Járatszám</th>
                            <th scope="col" class="terminal">Terminál</th>
                            <th scope="col">Státusz</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $getDatas = $datas->GetDatas($repterek);
                        $counter = 0;
                        ?>
                        <?php if (!is_null($getDatas)) : ?>
                            <?php foreach ($getDatas as $data) : ?>
                                <?php if (
                                    isset($data["arrival_airport"]) && $data["arrival_airport"] == $kivalasztottRepter && TimeDifference(date('H:i'), $data["arrival_scheduled"]) < $datas->GetIntervalHours()
                                ) : ?>
                                    <?php
                                    ++$counter;
                                    ?>
                                    <tr>
                                        <td><?php echo $data["arrival_scheduled"]; ?></td>
                                        <td><?php echo $data["departure_airport"]; ?></td>
                                        <td class="tarsasag"><?php echo $data["airline"]; ?></td>
                                        <td class="jaratszam"><?php echo $data["number"]; ?></td>
                                        <td class="terminal"><?php echo $data["arrival_terminal"]; ?></td>
                                        <td>
                                            <?php echo $data["status"];
                                            if (!is_null($data["arrival_delay"])) :
                                            ?>
                                                <sub><?php echo "<br>Késik: " . $data["arrival_delay"] . " percet"; ?></sub>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if ($counter == 0) : ?>
                            <?php
                            /**
                             * Ha nics éppen repülő, kiírjuk hogy nincsen.
                             */
                            ?>
                            <tr>
                                <td colspan="6" class="text-center"><strong>Nincs érkező repülőgép!</strong></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <!-- Induló járatok táblája-->

                <table class="table table-hover table-<?php echo $table ?> table-responsive text-center" id="start">
                    <thead>
                        <tr>
                            <td colspan="6" class="text-center">Induló járatok<br>*<sub>A táblázat csak a 8 órán belül induló járatokat tartalmazza!</sub></td>
                        </tr>
                        <tr>
                            <th scope="col">Időpont</th>
                            <th scope="col">Hova</th>
                            <th scope="col" class="tarsasag">Légitársaság</th>
                            <th scope="col" class="jaratszam">Járatszám</th>
                            <th scope="col" class="terminal">Terminál</th>
                            <th scope="col">Státusz</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $counter = 0;
                        ?>
                        <?php if (!is_null($getDatas)) : ?>
                            <?php foreach ($getDatas as $data) : ?>
                                <?php if (isset($data["departure_airport"]) && $data["departure_airport"] == $kivalasztottRepter && TimeDifference(date('H:i'), $data["departure_scheduled"]) < $datas->GetIntervalHours()) : ?>
                                    <?php
                                    ++$counter;
                                    ?>
                                    <tr>
                                        <td><?php echo $data["departure_scheduled"]; ?></td>
                                        <td><?php echo $data["arrival_airport"]; ?></td>
                                        <td class="tarsasag"><?php echo $data["airline"]; ?></td>
                                        <td class="jaratszam"><?php echo $data["number"]; ?></td>
                                        <td class="terminal"><?php echo $data["departure_terminal"]; ?></td>
                                        <td>
                                            <?php echo $data["status"];
                                            if (!is_null($data["departure_delay"])) :
                                            ?>
                                                <sub><?php echo "<br>Késik: " . $data["departure_delay"] . " percet"; ?></sub>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if ($counter == 0) : ?>
                            <?php
                            /**
                             * Ha nics éppen repülő, kiírjuk hogy nincsen.
                             */
                            ?>
                    <tbody>
                        <td colspan="6" class="text-center"><strong>Nincs induló repülőgép!</strong></td>
                    </tbody>
                <?php endif; ?>
                </tbody>
                </table>
            </div>
        </main>

        <?php
        /**
         * A footer.php-t hívja meg a script.js-ben használt setInterval segítségével
         * 10 másodpercenként frissül.
         */
        ?>
        <div id="load">
            <?php
            require("parts/footer.php");
            ?>
        </div>
    </div>
</body>

</html>