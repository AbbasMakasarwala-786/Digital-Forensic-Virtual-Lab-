<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<?php
include('db_conn.php');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Query to retrieve data from the MySQL database
$query = 'SELECT marks AS label, COUNT(*) AS value FROM registration GROUP BY marks';
$result = $conn->query($query);

// Prepare the data in Google Charts format
$data = array();
$data[] = ['Label', 'Value'];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [$row['label'], $row['value']];
    }
}

// Close the database connection
$conn->close();

// Encode the data as JSON
$jsonData = json_encode($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pie Chart Example</title>
</head>
<body>
    <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(<?php echo $jsonData; ?>);

            var options = {
                title: 'Pie Chart of Data from MySQL',
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>
    <div id="chart_div" style="width: 400px; height: 400px;"></div>
</body>
</html>
