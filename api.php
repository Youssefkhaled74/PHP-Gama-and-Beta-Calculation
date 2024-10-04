<?php
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $gamma_input = $data['gamma_input'] ?? null;
    $beta_input_x = $data['beta_input_x'] ?? null;
    $beta_input_y = $data['beta_input_y'] ?? null;

    // Function to calculate Gamma
    function gamma_function($n) {
        return gamma($n);
    }

    // Function to calculate Beta
    function beta_function($x, $y) {
        return gamma_function($x) * gamma_function($y) / gamma_function($x + $y);
    }

    $response = [];

    if ($gamma_input) {
        $response['gamma'] = gamma_function($gamma_input);
    }
    if ($beta_input_x && $beta_input_y) {
        $response['beta'] = beta_function($beta_input_x, $beta_input_y);
    }

    echo json_encode($response);
} else {
    echo json_encode(["error" => "Invalid request method."]);
}
?>
