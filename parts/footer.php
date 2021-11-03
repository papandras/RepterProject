<?php

$arr = [111,112,113,114,115,116,117];


?>

<footer class="text-center text-white" style="background-color: #caced1;">
    <!-- Grid container -->
    <div class="container p-4">
        <!-- Section: Images -->
        <div>
            <div class="row">
                <?php for($i = 0; $i < 6; ++$i): ?>
                    <div class="col-lg-2 col-md-6 hidden-xs">
                        <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                            <img src="https://mdbootstrap.com/img/new/fluid/city/<?php 
                            
                            $rand = random_int(1, count($arr)-1);
                            $kivagott = $arr[$rand];
                            array_splice($arr, $rand,1);
                            echo $kivagott;

                            ?>.jpg" alt="footerimggroup" class="w-100 img-fluid" />
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