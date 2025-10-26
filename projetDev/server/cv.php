<?php
require_once("./DB_class.php");

// Check if both 'id_client' and 'preferences' parameters are set
if (isset($_GET['id_client']) && isset($_GET['preferences'])) {
    $id = $_GET['id_client'];
    $preferences = $_GET['preferences'];

    // Create an instance of the DB_class
    $DB = new DB_class();

    // Retrieve the path of the CV file using the provided ID
    // Note: You may need to adjust the method name or implementation based on your DB_class
    $tempPdfFile = $DB->selectCVPath($id);

    // Proceed with Python script execution using the temporary PDF file and preferences
    $command = 'python ./py/CV.py ' . escapeshellarg($tempPdfFile) . ' ' . escapeshellarg($preferences);
    exec($command, $output, $result);

    // Check the result of the Python script execution
    if ($result === 0) {
        // Output the script output
        foreach ($output as $line) {
            echo $line;
        }
    } else {
        // Output detailed error message if the script execution failed
        echo "Failed to execute Python script: $result<br>";
        echo "Command: $command<br>";
        echo "Error output:<br>";
        foreach ($output as $line) {
            echo $line . "<br>";
        }
    }
} else {
    // Output an error message if 'id_client' or 'preferences' parameter is missing
    echo "Missing 'id_client' or 'preferences' parameter.";
}
?>
