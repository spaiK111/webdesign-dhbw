<?php
// Define your API endpoint
$apiUrl = 'http://localhost:5000/api/posts/makeOptions';
$response = file_get_contents($apiUrl);
$makes = json_decode($response, true);

// Define the list of top makes
$topMakes = ['BMW', 'Audi', 'Mercedes-Benz'];

// Check if $top is set to true
if (isset($top) && $top === true) {
    echo "<!-- Display only top makes -->";
    foreach ($makes as $makeOption) {
        if (in_array($makeOption['make'], $topMakes)) {
            echo '<option value="' . htmlspecialchars($makeOption['make']) . '">' . htmlspecialchars($makeOption['make']) . '</option>';
        }
    }
} else {
    echo "<!-- Display all makes -->";
    foreach ($makes as $makeOption) {
        echo '<option value="' . htmlspecialchars($makeOption['make']) . '">' . htmlspecialchars($makeOption['make']) . '</option>';
    }
}
?>