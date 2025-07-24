// Robot Arm Control Panel JavaScript
// Handles slider updates and form submissions

// Update slider values display
function updateSliderValue(sliderId) {
    const slider = document.getElementById(sliderId);
    const valueSpan = document.getElementById(sliderId + '-value');
    valueSpan.textContent = slider.value;
}

// Initialize slider event listeners
document.addEventListener('DOMContentLoaded', function() {
    const sliders = ['motor1', 'motor2', 'motor3', 'motor4', 'motor5', 'motor6'];
            
            sliders.forEach(function(sliderId) {
                const slider = document.getElementById(sliderId);
                slider.addEventListener('input', function() {
                    updateSliderValue(sliderId);
                });
            });

            // Reset button functionality
            document.getElementById('resetBtn').addEventListener('click', function() {
                sliders.forEach(function(sliderId) {
                    document.getElementById(sliderId).value = 90;
                    updateSliderValue(sliderId);
                });
            });

            // Run button functionality - redirect to run page
            document.getElementById('runBtn').addEventListener('click', function() {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = 'get_run_pose.php';
                
                sliders.forEach(function(sliderId) {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = sliderId;
                    input.value = document.getElementById(sliderId).value;
                    form.appendChild(input);
                });
                
                document.body.appendChild(form);
                form.submit();
                document.body.removeChild(form);
            });

            // Update Status button functionality - redirect to status page
            document.getElementById('updateStatusBtn').addEventListener('click', function() {
                window.location.href = 'update_status.php';
            });
        });

// Load pose function - sets all motor values from saved pose
function loadPose(m1, m2, m3, m4, m5, m6) {
    document.getElementById('motor1').value = m1;
    document.getElementById('motor2').value = m2;
    document.getElementById('motor3').value = m3;
    document.getElementById('motor4').value = m4;
    document.getElementById('motor5').value = m5;
    document.getElementById('motor6').value = m6;
    
    updateSliderValue('motor1');
    updateSliderValue('motor2');
    updateSliderValue('motor3');
    updateSliderValue('motor4');
    updateSliderValue('motor5');
    updateSliderValue('motor6');
}