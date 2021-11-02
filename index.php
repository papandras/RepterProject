<?php
$style = json_decode(file_get_contents("settings.json"), true);
require("php/Datas.php");
?>

<!DOCTYPE html>
<html lang="hu">

<?php
require("parts/head.php");
?>

<body>
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
                                <form action="php/style.php" method="POST">
                                    <select name="bgc" onchange="this.form.submit();">
                                        <option value="light.css" name="black.css" <?php if($style["style"]=="light.css"){echo "selected";} ?>>White</option>
                                        <option value="dark.css" name="white.css" <?php if($style["style"]=="dark.css"){echo "selected";} ?>>Black</option>
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
                <div class="list-group list-group-horizontal-md" id="tablemenu">
                    <button class="list-group-item" aria-current="true" onclick="start()">Indulás</button>
                    <button class="list-group-item" onclick="arrive()">Érkezés</button>
                </div>

                <table class="table table-hover table-dark table-responsive" id="dest" style="display: none">
                    <thead>
                        <tr>
                            <th scope="col">Időpont</th>
                            <th scope="col" class="tarsasag">Légitársaság</th>
                            <th scope="col" class="jaratszam">Járatszám</th>
                            <th scope="col">Terminál</th>
                            <th scope="col">Státusz</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $call = $dataArray->GetDatas($repterek, true);
                        
                        
                        
                        ?>
                        <?php if(!is_null($call)):?>
                            <?php foreach($call as $data): ?>
                                <?php if($data["destination"] == "Shenzhen"): ?>
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
                        <?php if(is_null($call)):?>
                                <tbody>
                                    <td>Nincs adat!</td>
                                </tbody>
                        <?php endif; ?>
                    </tbody>
                </table>

                <table class="table table-hover table-dark table-responsive" id="start">
                    <thead>
                        <tr>
                            <th scope="col">Időpont</th>
                            <th scope="col" class="tarsasag">Légitársaság</th>
                            <th scope="col" class="jaratszam">Járatszám</th>
                            <th scope="col">Terminál</th>
                            <th scope="col">Státusz</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $call = $dataArray->GetDatas($repterek, false); ?>
                        <?php if(!is_null($call)):?>
                            <?php foreach($call as $data): ?>
                                <?php if($data["start"] == "Shenzhen"): ?>
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
                        <?php if(is_null($call)):?>
                                <tbody>
                                    <td>Nincs adat!</td>
                                </tbody>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>

        <?php
            require("parts/footer.php");
        ?>
    </div>
</body>

</html>