<?php
$file = "DataIpHostProxy.json";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents($file), true);

    $editedIP = $_POST["ip"];
    $editedHost = $_POST["host"];

    // Find the index of the edited data
    $index = array_search($editedIP, array_column($data, 'IP'));

    if ($index !== false) {
        $data[$index]["IP"] = $editedIP;
        $data[$index]["HOST"] = $editedHost;
    }

    // Save the updated data back to the JSON file
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

    header("Location: backend.html");
    exit;
}
?>
