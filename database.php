<?php
include('db_conn.php'); 
$query="SELECT Name,Roll_no,Department,Email,marks1,marks2,marks3,marks4,Division FROM registration";
$result=mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<header>
    <style>
        @import url(somaiya_temp.css);
        *{
            margin:0;
            background-color:white;
        }
        #header1{
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
            font-size: 10vh;
        }
        td{
            color: black;

        }
        h2{
            color: black;
            padding-left: 3px;
            text-decoration: underline;
        }
    </style>
</header>
<div id="logo">
    <img src="logo.jpg" id="logo">
</div>
<div id="header">

</div>
<body>
        <div id="header1">Factulty Dashboard</div>
        <h2>Student Data</h2>
        <div class="cardbody">
            <table class="table table-bordered text-center">
                <tr class="bg-grey text-black">
                    <td><b>Username</b></td>
                    <td><b>Roll no</b></td>
                    <td><b>Email</b></td>
                    <td><b>Department</b></td>
                    <td><b>Marks Exp1</b></td>
                    <td><b>Marks Exp2</b></td>
                    <td><b>Marks Exp3</b></td>
                    <td><b>Marks Exp4</b></td>
                    <td><b>Division</b></td>
                </tr>
                <tr class="text-black">
                    <?php
                    while($row=mysqli_fetch_assoc($result)){
                        ?>
                    <td><?php echo $row['Name'];?></td>
                    <td><?php echo $row['Roll_no'];?></td>
                    <td><?php echo $row['Email'];?></td>
                    <td><?php echo $row['Department'];?></td>
                    <td><?php echo $row['marks1'];?></td>
                    <td><?php echo $row['marks2'];?></td>
                    <td><?php echo $row['marks3'];?></td>
                    <td><?php echo $row['marks4'];?></td>
                    <td><?php echo $row['Division'];?></td>
                    </tr>
                    <?php
                    }

                    ?>
            </table>
        </div>
</body>
</html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!DOCTYPE html>
<html>
<head>
    <title>Pie Chart Example</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
    <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(<?php echo json_encode($data); ?>);

            var options = {
                title: 'Pie Chart of Marks',
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>
    <div id="chart_div" style="width: 400px; height: 400px;"></div>
</body>

<footer>
    abbas
</footer>

</html>