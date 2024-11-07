<?php
// Define your API endpoint
$apiUrl = 'http://localhost:5000/api/posts/';
$response = file_get_contents($apiUrl);
$makes = json_decode($response, true);

// Define the list of top makes
$topMakes = ['BMW', 'Audi', 'Mercedes-Benz'];

// Check if $top is set to true
if (isset($top) && $top === true) {
    echo "<!-- Display only top makes -->";
    $displayedMakes = [];
    foreach ($makes as $makeOption) {
        if (in_array($makeOption['make'], $topMakes) && !isset($displayedMakes[$makeOption['make']])) {
            echo '<option value="' . htmlspecialchars($makeOption['make']) . '">' . htmlspecialchars($makeOption['make']) . '</option>';
            $displayedMakes[$makeOption['make']] = true;
        }
    }
} else {
    echo "<!-- Display all makes -->";
    $displayedMakes = [];
    foreach ($makes as $makeOption) {
        if (!isset($displayedMakes[$makeOption['make']])) {
            echo '<option value="' . htmlspecialchars($makeOption['make']) . '">' . htmlspecialchars($makeOption['make']) . '</option>';
            $displayedMakes[$makeOption['make']] = true;
        }
    }
}
?>