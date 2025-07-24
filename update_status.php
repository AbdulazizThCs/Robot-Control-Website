<?php
// Robot Arm - Status Update Page
// Updates all run entries status to 1 (inactive)

// Include database connection
include 'db.php';

// Update status to 1 for all run entries
$sql = "UPDATE run SET status = 1";
$result = mysqli_query($conn, $sql);

// Check if update was successful
$success = false;
$message = '';

if ($result) {
    // Check if any rows were affected
    if (mysqli_affected_rows($conn) > 0) {
        $success = true;
        $message = 'Status updated successfully!';
    } else {
        $message = 'No records found to update.';
    }
} else {
    $message = 'Error updating status: ' . mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status</title>
    <!-- Website favicon icon link -->
    <link rel="icon" type="image/x-icon" href="favicon10.ico">
    <!-- Google Fonts (Poppins) -->
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Page Title -->
    <div class="page-title">
        <h1>Status Update</h1>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="status-container">
            <?php if ($success): ?>
                <!-- Success Icon -->
                <div class="status-success">
                    ✓
                </div>
                <div class="status-message" style="color: #305822;">
                    <?php echo $message; ?>
                </div>
                <div style="margin-top: 20px; color: #305822; font-size: 14px;">
                    The robot arm status has been set to inactive (0).
                </div>
            <?php else: ?>
                <!-- Error Icon -->
                <div class="status-success" style="color: #e53e3e;">
                    ✗
                </div>
                <div class="status-message" style="color: #e53e3e;">
                    <?php echo $message; ?>
                </div>
                <div style="margin-top: 20px; color: #305822; font-size: 14px;">
                    Please try again or check the system logs.
                </div>
            <?php endif; ?>
            
            <!-- Action Button -->
            <div style="margin-top: 30px; text-align: center;">
                <button onclick="window.location.href='index.php'; window.close();" class="btn btn-primary">Back to Control Panel</button>
            </div>
        </div>
    </div>

</body>
</html>