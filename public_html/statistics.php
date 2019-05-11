<?php $thisPage = 'Statistics'; ?>

<html>
    <?php require 'components/header.php'; ?>
    <body>
        <?php require 'components/nav.php'; ?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <div class="container-fluid">
            <div class="jumbotron m-4">
                <h2>Statistics 📈</h2>
                <div>
                    <h4 class="text-center"><u>Orders Category Count</u></h4>
                    <ul>
                        <?php
                        $staticCountQuery = "SELECT count(*) FROM orders WHERE category='Static'";
                        $staticCountResult = mysqli_query($mysqli, $staticCountQuery);
                        $staticCount = mysqli_fetch_assoc($staticCountResult);
                        // echo "<li><h5>Static: ".implode($staticCount)."</h5></li>";

                        $multiScreenCountQuery = "SELECT count(*) FROM orders WHERE category='Multi-Screen'";
                        $multiScreenCountResult = mysqli_query($mysqli, $multiScreenCountQuery);
                        $multiScreenCount = mysqli_fetch_assoc($multiScreenCountResult);
                        // echo "<li><h5>Multi-Screen: ".implode($multiScreenCount)."</h5></li>";

                        $liveCountQuery = "SELECT count(*) FROM orders WHERE category='Live'";
                        $liveCountResult = mysqli_query($mysqli, $liveCountQuery);
                        $liveCount = mysqli_fetch_assoc($liveCountResult);
                        // echo "<li><h5>Live: ".implode($liveCount)."</h5></li>";

                        $interactiveCountQuery = "SELECT count(*) FROM orders WHERE category='Interactive'";
                        $interactiveCountResult = mysqli_query($mysqli, $interactiveCountQuery);
                        $interactiveCount = mysqli_fetch_assoc($interactiveCountResult);
                        // echo "<li><h5>Interactive: ".implode($interactiveCount)."</h5></li>";

                        $hybridCountQuery = "SELECT count(*) FROM orders WHERE category='Hybrid'";
                        $hybridCountResult = mysqli_query($mysqli, $hybridCountQuery);
                        $hybridCount = mysqli_fetch_assoc($hybridCountResult);
                        // echo "<li><h5>Hybrid: ".implode($hybridCount)."</h5></li>";
                        ?>
                    </ul>
                    <canvas id="myChart" width="300px"></canvas>
                    </div>
                </div> 
            </div>
        </div>
        <?php require 'components/footer.php'; ?>
        <script>
            var ctx = document.getElementById("myChart").getContext("2d");
            var counts=[];
            counts[0] = "<?php echo implode($staticCount); ?>";
            counts[1] = "<?php echo implode($multiScreenCount); ?>";
            counts[2] = "<?php echo implode($liveCount); ?>";
            counts[3] = "<?php echo implode($interactiveCount); ?>";
            counts[4] = "<?php echo implode($hybridCount); ?>";
            var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: "doughnut",

            // The data for our dataset
            // data:counts,
            data: {
                labels: ["Static", "Multi-Screen", "Live", "Interactive", "Hybrid"],
                datasets: [
                {
                    backgroundColor: [
                        "rgb(216, 41, 41)",
                        "rgb(255, 127, 0)",
                        "rgb(11, 188, 29)",
                        "rgb(13, 212, 219)", 
                        "rgb(32, 29, 242)"
                        ],
                    borderColor: "rgb(120, 117, 122)",
                    data:counts
                }
                ]
            },

            // Configuration options go here
            options: {}
            });
            </script>
    </body>
</html>