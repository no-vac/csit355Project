<?php $thisPage = 'Statistics'; ?>

<html>
    <?php require 'components/header.php'; ?>
    <body>
        <?php require 'components/nav.php'; ?>
        <div class="container-fluid">
            <div class="jumbotron m-4">
                <h2>Statistics 📈</h2>
                <div>
                    <h4><u>Orders Category Count</u></h4>
                    <ul>
                        <?php
                        $staticCountQuery = "SELECT count(*) FROM orders WHERE category='Static'";
                        $staticCountResult = mysqli_query($mysqli, $staticCountQuery);
                        $staticCount = mysqli_fetch_assoc($staticCountResult);

                        echo "<li><h5>Static: ".implode($staticCount)."</h5></li>";

                        $multiScreenCountQuery = "SELECT count(*) FROM orders WHERE category='Multi-Screen'";
                        $multiScreenCountResult = mysqli_query($mysqli, $multiScreenCountQuery);
                        $multiScreenCount = mysqli_fetch_assoc($multiScreenCountResult);
                        echo "<li><h5>Multi-Screen: ".implode($multiScreenCount)."</h5></li>";

                        $liveCountQuery = "SELECT count(*) FROM orders WHERE category='Live'";
                        $liveCountResult = mysqli_query($mysqli, $liveCountQuery);
                        $liveCount = mysqli_fetch_assoc($liveCountResult);
                        echo "<li><h5>Live: ".implode($liveCount)."</h5></li>";

                        $interactiveCountQuery = "SELECT count(*) FROM orders WHERE category='Interactive'";
                        $interactiveCountResult = mysqli_query($mysqli, $interactiveCountQuery);
                        $interactiveCount = mysqli_fetch_assoc($interactiveCountResult);
                        echo "<li><h5>Interactive: ".implode($interactiveCount)."</h5></li>";

                        $hybridCountQuery = "SELECT count(*) FROM orders WHERE category='Hybrid'";
                        $hybridCountResult = mysqli_query($mysqli, $hybridCountQuery);
                        $hybridCount = mysqli_fetch_assoc($hybridCountResult);
                        echo "<li><h5>Hybrid: ".implode($hybridCount)."</h5></li>";
                        ?>
                    </ul>
                </div> 
            </div>
        </div>
        <?php require 'components/footer.php'; ?>
    </body>
</html>