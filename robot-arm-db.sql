-- Create a new database for the robot arm
CREATE DATABASE robot_arm_db;

-- Use the created database
USE robot_arm_db;

-- Create the 'pose' table to store saved arm positions
CREATE TABLE pose (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- Unique ID for each pose
    servo1 INT NOT NULL,                -- Value for servo motor 1
    servo2 INT NOT NULL,                -- Value for servo motor 2
    servo3 INT NOT NULL,                -- Value for servo motor 3
    servo4 INT NOT NULL,                -- Value for servo motor 4
    servo5 INT NOT NULL,                -- Value for servo motor 5
    servo6 INT NOT NULL                 -- Value for servo motor 6
);

-- Create the 'run' table to store the current pose to run
CREATE TABLE run (
    servo1 INT NOT NULL,                -- Current value for servo motor 1
    servo2 INT NOT NULL,                -- Current value for servo motor 2
    servo3 INT NOT NULL,                -- Current value for servo motor 3
    servo4 INT NOT NULL,                -- Current value for servo motor 4
    servo5 INT NOT NULL,                -- Current value for servo motor 5
    servo6 INT NOT NULL,                -- Current value for servo motor 6
    status INT DEFAULT 0                -- Status flag (1 = active, 0 = inactive)
);
