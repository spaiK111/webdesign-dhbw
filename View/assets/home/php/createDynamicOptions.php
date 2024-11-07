<?php
// Define your API endpoint
$apiUrl = 'http://localhost:5000/api/posts/';
$response = file_get_contents($apiUrl);
$makes = json_decode($response, true);

    $displayedMakes = [];
    foreach ($makes as $makeOption) {
        if ($makeOption['make'] && !isset($displayedMakes[$makeOption['make']])) {
                echo '<option value="' . htmlspecialchars($makeOption['make']) . '">' . htmlspecialchars($makeOption['make']) . '</option>';
            $displayedMakes[$makeOption['make']] = true;
        }
    }
?>