<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $X1 = $_POST["X1"];
    $X2 = $_POST["X2"];
    $X3 = $_POST["X3"];
    $X4 = $_POST["X4"];
    $X5 = $_POST["X5"];
    $X6 = $_POST["X6"];
    $X7 = $_POST["X7"];
    $X8 = $_POST["X8"];

    // Prepare the command to run the Python script with user inputs
    $command = "python -u D:\\Projects\\Energy-Insight\\Dump\\heatCoolLoad.py";
    
    // Append user inputs to the command
    $command .= " " . escapeshellarg($X1) . " " . escapeshellarg($X2) . " " . escapeshellarg($X3) . " " . escapeshellarg($X4) . " " . escapeshellarg($X5) . " " . escapeshellarg($X6) . " " . escapeshellarg($X7) . " " . escapeshellarg($X8);

    // Execute the command and capture the output
    $output = shell_exec($command);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/heatcoolLoad.css">
    <title>Heat Cool Load Prediction</title>
</head>
<body>
    <header>
        <h1>Heat Cool Load Prediction</h1>
    </header>

    <main>
        <form id="predictionForm">
            <div class="question" id="question1">
                <label for="X1">X1 Relative Compactness:</label>
                <input type="number" name="X1" step="0.01" min="0" required>
                <button type="button" class="next-btn">Next</button>
            </div>
            <div class="question hidden" id="question2">
                <label for="X2">X2 Surface Area:</label>
                <input type="number" name="X2" step="0.02" min="0" required>
                <button type="button" class="next-btn">Next</button>
            </div>
            <div class="question hidden" id="question3">
                <label for="X3">X3 Wall Area:</label>
                <input type="number" name="X3" step="0.01" min="0" required>
                <button type="button" class="next-btn">Next</button>
            </div>
            <div class="question hidden" id="question4">
                <label for="X4">X4 Roof Area:</label>
                <input type="number" name="X4" step="0.01" min="0" required>
                <button type="button" class="next-btn">Next</button>
            </div>
            <div class="question hidden" id="question5">
                <label for="X5">X5 Overall Height:</label>
                <input type="number" name="X5" step="0.01" min="0" required>
                <button type="button" class="next-btn">Next</button>
            </div>
            <div class="question hidden" id="question6">
                <label for="X6">X6 Orientation:</label>
                <input type="number" name="X6" step="0.01" min="0" required>
                <button type="button" class="next-btn">Next</button>
            </div>
            <div class="question hidden" id="question7">
                <label for="X7">X7 Glazing Area:</label>
                <input type="number" name="X7" step="0.01" min="0" required>
                <button type="button" class="next-btn">Next</button>
            </div>
            <div class="question hidden" id="question8">
                <label for="X8">X8 Glazing Area Distribution:</label>
                <input type="number" name="X8" step="0.01" min="0" required>
                <button type="submit" id="predict-btn" class="hidden">Predict</button>
                <button type="button" id="prev-btn" class="hidden">Previous</button>
            </div>
            <button type="submit" id="predict-btn" class="hidden" disabled>Predict</button>
        </form>

        <div id="resultContainer">
            <?php if(isset($output)) echo "<p>$output</p>"; ?>
        </div>
    </main>

    <script src="js/script.js"></script>
</body>
</html>
