<?php
// Robot Arm Control Panel - Main Page
// Handle pose saving, deleting, and display

// Include database connection
include 'db.php';

// Handle form submissions
if ($_POST) {
    if (isset($_POST['save_pose'])) {
        // Save pose to database
        $motor1 = $_POST['motor1'];
        $motor2 = $_POST['motor2'];
        $motor3 = $_POST['motor3'];
        $motor4 = $_POST['motor4'];
        $motor5 = $_POST['motor5'];
        $motor6 = $_POST['motor6'];
        
        $sql = "INSERT INTO pose (servo1, servo2, servo3, servo4, servo5, servo6) VALUES ('$motor1', '$motor2', '$motor3', '$motor4', '$motor5', '$motor6')";
        mysqli_query($conn, $sql);
    }
    
    if (isset($_POST['delete_pose'])) {
        // Delete pose from database
        $pose_id = $_POST['pose_id'];
        $sql = "DELETE FROM pose WHERE id = '$pose_id'";
        mysqli_query($conn, $sql);
    }
}

// Get all poses from database
$poses_query = "SELECT * FROM pose ORDER BY id DESC";
$poses_result = mysqli_query($conn, $poses_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robot Arm Control Panel</title>
    <!-- Website favicon icon link -->
    <link rel="icon" type="image/x-icon" href="favicon10.ico">
    <!-- Google Fonts (Poppins) -->
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Page Title -->
    <div class="page-title">
        <h1>Robot Arm Control Panel</h1>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="main-content">
            <!-- Control Panel Section -->
            <div class="control-panel">
                <h2>Control Panel</h2>
                
                <form method="POST" id="controlForm">
                    <!-- Motor Sliders -->
                    <div class="sliders-container">
                        <div class="slider-group">
                            <label for="motor1">Motor 1: <span id="motor1-value">90</span></label>
                            <input type="range" id="motor1" name="motor1" min="0" max="180" value="90" class="slider">
                        </div>
                        
                        <div class="slider-group">
                            <label for="motor2">Motor 2: <span id="motor2-value">90</span></label>
                            <input type="range" id="motor2" name="motor2" min="0" max="180" value="90" class="slider">
                        </div>
                        
                        <div class="slider-group">
                            <label for="motor3">Motor 3: <span id="motor3-value">90</span></label>
                            <input type="range" id="motor3" name="motor3" min="0" max="180" value="90" class="slider">
                        </div>
                        
                        <div class="slider-group">
                            <label for="motor4">Motor 4: <span id="motor4-value">90</span></label>
                            <input type="range" id="motor4" name="motor4" min="0" max="180" value="90" class="slider">
                        </div>
                        
                        <div class="slider-group">
                            <label for="motor5">Motor 5: <span id="motor5-value">90</span></label>
                            <input type="range" id="motor5" name="motor5" min="0" max="180" value="90" class="slider">
                        </div>
                        
                        <div class="slider-group">
                            <label for="motor6">Motor 6: <span id="motor6-value">90</span></label>
                            <input type="range" id="motor6" name="motor6" min="0" max="180" value="90" class="slider">
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="button-group">
                        <button type="button" id="resetBtn" class="btn btn-secondary">Reset</button>
                        <button type="submit" name="save_pose" class="btn btn-primary">Save Pose</button>
                        <button type="button" id="runBtn" class="btn btn-success">Run</button>
                        <button type="button" id="updateStatusBtn" class="btn btn-warning">Update Status</button>
                    </div>
                </form>
            </div>
            
            <!-- Saved Poses Table -->
            <div class="poses-table">
                <h2>Saved Poses</h2>
                <div class="table-container">
                    <table class="poses-data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Motor 1</th>
                                <th>Motor 2</th>
                                <th>Motor 3</th>
                                <th>Motor 4</th>
                                <th>Motor 5</th>
                                <th>Motor 6</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($pose = mysqli_fetch_assoc($poses_result)): ?>
                            <tr>
                                <td><?php echo $pose['id']; ?></td>
                                <td><?php echo $pose['servo1']; ?></td>
                                <td><?php echo $pose['servo2']; ?></td>
                                <td><?php echo $pose['servo3']; ?></td>
                                <td><?php echo $pose['servo4']; ?></td>
                                <td><?php echo $pose['servo5']; ?></td>
                                <td><?php echo $pose['servo6']; ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <button type="button" class="btn btn-info btn-small" onclick="loadPose(<?php echo $pose['servo1']; ?>, <?php echo $pose['servo2']; ?>, <?php echo $pose['servo3']; ?>, <?php echo $pose['servo4']; ?>, <?php echo $pose['servo5']; ?>, <?php echo $pose['servo6']; ?>)">Load</button>
                                        <form method="POST" style="display:inline;">
                                            <input type="hidden" name="pose_id" value="<?php echo $pose['id']; ?>">
                                            <button type="submit" name="delete_pose" class="btn btn-danger btn-small" onclick="return confirm('Are you sure you want to delete this pose?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="script.js"></script>
</body>
</html>