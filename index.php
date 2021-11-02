<?php
$style = json_decode(file_get_contents("settings.json"), true);
require("Datas.php");
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shenzhen</title>
    <link rel="shortcut icon"
        href="https://w7.pngwing.com/pngs/205/97/png-transparent-airplane-icon-a5-takeoff-computer-icons-flight-airplane.png"
        type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $style["style"] ?>">
    <script src="script.js"></script>
</head>

<body>
    <div class="container">
        <header>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <div class="container-fluid" style="position: relative;">
                                
                    <div class="collapse navbar-collapse" id="navbarExample01">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" aria-current="page" href="index.php">Kezdőlap</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">Rólunk</a>
                            </li>
                            <li style="position: absolute; right: 100px">
                                <form action="style.php" method="POST">
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
            <div class="p-5 text-center bg-image" style="
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
            <div >
                <div class="list-group list-group-horizontal" id="tablemenu">
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

        <footer class="text-center text-white" style="background-color: #caced1;">
            <!-- Grid container -->
            <div class="container p-4">
                <!-- Section: Images -->
                <div>
                    <div class="row">
                        <?php for($i = 111; $i < 117; ++$i): ?>
                            <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                                <div class="bg-image hover-overlay ripple shadow-1-strong rounded"
                                    data-ripple-color="light">
                                    <img src="https://mdbootstrap.com/img/new/fluid/city/<?php echo $i ?>.jpg" alt="footerimggroup" class="w-100" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                                    </a>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
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