<?php
// Google Sheets Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Replace 'YOUR_SPREADSHEET_ID' with your actual Google Sheets ID
    $spreadsheetId = 'AKfycbxM_IcTGvsJ9d363tTiypVpK0ihbjkoN4LRU91lEEf0jgzkA_10dTNNeGaRgi4C5BsAXw';

    // Google Sheets API endpoint
    $url = "https://script.google.com/macros/s/AKfycbxM_IcTGvsJ9d363tTiypVpK0ihbjkoN4LRU91lEEf0jgzkA_10dTNNeGaRgi4C5BsAXw/exec";

    // Prepare data for POST request
    $postData = http_build_query(
        array(
            'name' => $name,
            'email' => $email
        )
    );

    // Send POST request to Google Apps Script
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Output response
    echo $response;
} else {
    // Invalid request method
    http_response_code(405);
    echo json_encode(array("message" => "Method Not Allowed"));
}
?>
