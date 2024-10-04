<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamma and Beta Functions Calculator</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Gamma and Beta Functions Calculator</h1>
        <div class="card mt-3">
            <div class="card-body">
                <h3>Calculate Gamma and Beta Functions</h3>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="gamma_input">Enter value for Gamma function (n):</label>
                        <input type="number" name="gamma_input" class="form-control" placeholder="Gamma(n)">
                    </div>
                    <div class="form-group">
                        <label for="beta_input_x">Enter value for Beta function (x):</label>
                        <input type="number" name="beta_input_x" class="form-control" placeholder="Beta(x, y)">
                    </div>
                    <div class="form-group">
                        <label for="beta_input_y">Enter value for Beta function (y):</label>
                        <input type="number" name="beta_input_y" class="form-control" placeholder="Beta(x, y)">
                    </div>
                    <button type="submit" class="btn btn-primary">Calculate</button>
                </form>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <h3>Gamma and Beta Functions Explained</h3>
                <p><strong>Gamma Function:</strong></p>
                <p>The Gamma function is an extension of the factorial function, with its argument shifted down by 1. 
                It is defined as an improper integral that converges for positive values:</p>
                <pre>Γ(n) = ∫_0^∞ t^(n-1) * e^(-t) dt</pre>

                <p><strong>Beta Function:</strong></p>
                <p>The Beta function is a special function that is closely related to the Gamma function. 
                It is defined as:</p>
                <pre>B(x, y) = ∫_0^1 t^(x-1) * (1-t)^(y-1) dt</pre>

                <p>The program calculates these functions using integration techniques and approximations.</p>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <h3>Results</h3>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $gamma_input = $_POST['gamma_input'];
                    $beta_input_x = $_POST['beta_input_x'];
                    $beta_input_y = $_POST['beta_input_y'];

                    // Gamma function calculation (approximation)
                    function gamma_function($n) {
                        return gmp_strval(gmp_fact($n - 1)); // Using factorial for approximation
                    }

                    // Beta function calculation (using Gamma function relationship)
                    function beta_function($x, $y) {
                        return gamma_function($x) * gamma_function($y) / gamma_function($x + $y);
                    }

                    if ($gamma_input) {
                        echo "<p>Gamma(" . $gamma_input . ") = " . gamma_function($gamma_input) . "</p>";
                    }
                    if ($beta_input_x && $beta_input_y) {
                        echo "<p>Beta(" . $beta_input_x . ", " . $beta_input_y . ") = " . beta_function($beta_input_x, $beta_input_y) . "</p>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
