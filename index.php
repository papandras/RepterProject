<?php
/**
 * A request.php-ban letöltött adatokat olvassa be.
 */
$style = json_decode(file_get_contents("settings.json"), true);
/**
 * Datas osztály meghívása, 
 * $dataArray a példánya
 */
require("php/Datas.php");
/**
 * Ez a stíluslapok közötti váltást teszi lehetővé
 */
$table = "light";
if($style["style"]=="light.css"){
    $table = "dark";
}
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
                            <li style="position: absolute; right: 10%; top: 10px">
                                <?php
                                /**
                                 * Ebben a formban cserélődnek a stíluslapok
                                 * onchange="this.form.submit() --> Submit gombként funkcionál!
                                 * 
                                 * if($style["style"]=="light.css" --> echo "selected"
                                 * Az aktuálisan beállított téma kerül kijelölésre
                                 * 
                                 * style.php-ban lesz feldolgozva
                                 */
                                ?>
                                <form action="php/style.php" method="POST">
                                    <select name="bgc" onchange="this.form.submit();">
                                        <option value="light.css" name="black.css" <?php if($style["style"]=="light.css"){echo "selected";} ?>>Fehér</option>
                                        <option value="dark.css" name="white.css" <?php if($style["style"]=="dark.css"){echo "selected";} ?>>Fekete</option>
                                    </select>
                                </form>
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
                            <h1 class="mb-3">Shenzhen</h1>
                            <h4 class="mb-3">Járatinformációk</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Background image -->
        </header>

        <main>
            <div>
                <?php
                /**
                 * A két gomb jeleníti meg az érkező / induló járatokat
                 */
                ?>
                <div class="list-group list-group-horizontal-md" id="tablemenu">
                    <button class="list-group-item" aria-current="true" onclick="start()">Indulás</button>
                    <button class="list-group-item" onclick="arrive()">Érkezés</button>
                </div>

                <table class="table table-hover table-<?php echo $table ?> table-responsive text-center" id="dest" style="display: none">
                    <thead>
                        <tr>
                            <td colspan="5" class="text-center">Érkező járatok<br>*<sub>A táblázat csak a 8 órán belül érkező járatokat tartalmazza!</sub></td>
                        </tr>
                        <tr>
                            <th scope="col">Időpont</th>
                            <th scope="col" class="tarsasag">Légitársaság</th>
                            <th scope="col" class="jaratszam">Járatszám</th>
                            <th scope="col">Terminál</th>
                            <th scope="col">Státusz</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $call = $dataArray->GetDatas($repterek);
                            $counter = 0;
                        ?>
                        <?php if(!is_null($call)):?>
                            <?php foreach($call as $data): ?>
                                <?php if($data["destination"] == "Shenzhen" && (strtotime(date('H:i')) - strtotime($data["time"])) / 60 > 480): ?>
                                    <?php
                                    /**
                                    * (strtotime(date('H:i')) - strtotime($data["time"])) / 60 > 480
                                    * Ezzel számítom ki hogy a 8 órán belül induló / érkező gépeket jelenítse csak meg.
                                    *
                                    * $data["destination"] == "Shenzhen"
                                    * Csak a Shenzhen reptér adatait jeleníti meg
                                    */
                                    ++$counter;
                                    ?>
                                    <tr>
                                        <td><?php echo $data["time"]; ?></td>
                                        <td class="tarsasag"><?php echo $data["company"]; ?></td>
                                        <td class="jaratszam"><?php echo $data["number"]; ?></td>
                                        <td><?php echo $data["terminal"]; ?></td>
                                        <td><?php echo $data["status"]; ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if($counter == 0):?>
                                <?php
                                /**
                                 * Ha nics éppen repülő, kiírjuk hogy nincsen.
                                 */
                                ?>
                                <tbody>
                                    <td colspan="5" class="text-center"><strong>Nincs érkező repülőgép!</strong></td>
                                </tbody>
                        <?php endif; ?>
                    </tbody>
                </table>

                <table class="table table-hover table-<?php echo $table ?> table-responsive text-center" id="start">
                    <thead>
                        <tr>
                            <td colspan="5" class="text-center">Induló járatok<br>*<sub>A táblázat csak a 8 órán belül induló járatokat tartalmazza!</sub></td>
                        </tr>
                        <tr>
                            <th scope="col">Időpont</th>
                            <th scope="col" class="tarsasag">Légitársaság</th>
                            <th scope="col" class="jaratszam">Járatszám</th>
                            <th scope="col">Terminál</th>
                            <th scope="col">Státusz</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $call = $dataArray->GetDatas($repterek); 
                        $counter = 0;
                        ?>
                        <?php if(!is_null($call)):?>
                            <?php foreach($call as $data): ?>
                                <?php if($data["start"] == "Shenzhen" && (strtotime(date('H:i')) - strtotime($data["time"])) / 60 > 480): ?>
                                    <?php
                                    /**
                                    * (strtotime(date('H:i')) - strtotime($data["time"])) / 60 > 480
                                    * Ezzel számítom ki hogy a 8 órán belül induló / érkező gépeket jelenítse csak meg.
                                    *
                                    * $data["destination"] == "Shenzhen"
                                    * Csak a Shenzhen reptér adatait jeleníti meg
                                    */
                                    ++$counter;
                                    ?>
                                    <tr>
                                        <td><?php echo substr($data["time"], 0,5); ?></td>
                                        <td class="tarsasag"><?php echo $data["company"]; ?></td>
                                        <td class="jaratszam"><?php echo $data["number"]; ?></td>
                                        <td><?php echo $data["terminal"]; ?></td>
                                        <td><?php echo $data["status"]; ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if($counter == 0):?>
                                <?php
                                /**
                                 * Ha nics éppen repülő, kiírjuk hogy nincsen.
                                 */
                                ?>
                                <tbody>
                                    <td colspan="5" class="text-center"><strong>Nincs induló repülőgép!</strong></td>
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