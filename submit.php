<?php
// Google Sheets Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Replace 'YOUR_SPREADSHEET_ID' with your actual Google Sheets ID
    $spreadsheetId = '1iC3BUM-cCSRuSkD8JwMWCJJp1ovgdlxGi22Nmwl_7B8';

    // Google Sheets API endpoint
    $url = "https://script.google.com/macros/s/AKfycbzrwkZyL7ED3ppdlXEjLMGa8pU-vdZONw45EnGJR5zF/exec";

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

    // Execute the request and handle errors
    $response = curl_exec($ch);
    if ($response === false) {
        $error = curl_error($ch);
        echo json_encode(array("error" => $error));
    } else {
        // Output response
        echo $response;
    }

    // Close cURL session
    curl_close($ch);
} else {
    // Invalid request method
    http_response_code(405);
    echo json_encode(array("message" => "Method Not Allowed"));
}
?>
