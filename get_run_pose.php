<?php
// Robot Arm - Run Pose Data Page
// Processes motor data and displays current pose

// Include database connection
include 'db.php';

// Initialize motor values with defaults
$motor1 = 90;
$motor2 = 90;
$motor3 = 90;
$motor4 = 90;
$motor5 = 90;
$motor6 = 90;

// Check if data is received from POST
if ($_POST) {
    $motor1 = isset($_POST['motor1']) ? $_POST['motor1'] : 90;
    $motor2 = isset($_POST['motor2']) ? $_POST['motor2'] : 90;
    $motor3 = isset($_POST['motor3']) ? $_POST['motor3'] : 90;
    $motor4 = isset($_POST['motor4']) ? $_POST['motor4'] : 90;
    $motor5 = isset($_POST['motor5']) ? $_POST['motor5'] : 90;
    $motor6 = isset($_POST['motor6']) ? $_POST['motor6'] : 90;
    
    // Insert data into run table with status = 0 (default)
    $sql = "INSERT INTO run (servo1, servo2, servo3, servo4, servo5, servo6, status) VALUES ('$motor1', '$motor2', '$motor3', '$motor4', '$motor5', '$motor6', 0)";
    mysqli_query($conn, $sql);
}

// Create formatted command string for robot arm
$command_string = "1,s" . $motor1 . ",s" . $motor2 . ",s" . $motor3 . ",s" . $motor4 . ",s" . $motor5 . ",s" . $motor6;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Run Pose Data</title>
    <!-- Website favicon icon link -->
    <link rel="icon" type="image/x-icon" href="favicon10.ico">
    <!-- Google Fonts (Poppins) -->
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Page Title -->
    <div class="page-title">
        <h1>Run Pose Data</h1>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="run-data-container">
            <h2 style="text-align: center; color: #305822; margin-bottom: 30px;">Motor Position Data</h2>
            
            <!-- Motor Data Table -->
            <div style="margin-bottom: 20px;">
                <table class="motor-data-table">
                    <thead>
                        <tr>
                            <th>Motor 1</th>
                            <th>Motor 2</th>
                            <th>Motor 3</th>
                            <th>Motor 4</th>
                            <th>Motor 5</th>
                            <th>Motor 6</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $motor1; ?>°</td>
                            <td><?php echo $motor2; ?>°</td>
                            <td><?php echo $motor3; ?>°</td>
                            <td><?php echo $motor4; ?>°</td>
                            <td><?php echo $motor5; ?>°</td>
                            <td><?php echo $motor6; ?>°</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Command String Table -->
            <div>
                <table class="command-data-table">
                    <thead>
                        <tr>
                            <th>Command String</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $command_string; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Action Button -->
            <div style="text-align: center; margin-top: 25px;">
                <button onclick="window.location.href='index.php'; window.close();" class="btn btn-primary">Back to Control Panel</button>
            </div>
        </div>
    </div>

</body>
</html>