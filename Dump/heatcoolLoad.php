<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/heatcoolLoad.css">
    <title>Heat Cool Load Prediction</title>
</head>
<body>
    <h1>Heat Cool Load Prediction</h1>

    <!-- HTML form to take user inputs -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="predictionForm">
        <div class="form-group">
            <label for="X1">X1 Relative Compactness:</label>
            <input type="text" name="X1" required><br>
        </div>

        <div class="form-group">
            <label for="X2">X2 Surface Area:</label>
            <input type="text" name="X2" required><br>
        </div>

        <div class="form-group">
            <label for="X3">X3 Wall Area:</label>
            <input type="text" name="X3" required><br>
        </div>

        <div class="form-group">
            <label for="X4">X4 Roof Area:</label>
            <input type="text" name="X4" required><br>
        </div>

        <div class="form-group">
            <label for="X5">X5 Overall Height:</label>
            <input type="text" name="X5" required><br>
        </div>

        <div class="form-group">
            <label for="X6">X6 Orientation:</label>
            <input type="text" name="X6" required><br>
        </div>

        <div class="form-group">
            <label for="X7">X7 Glazing Area:</label>
            <input type="text" name="X7" required><br>
        </div>

        <div class="form-group">
            <label for="X8">X8 Glazing Area Distribution:</label>
            <input type="text" name="X8" required><br>
        </div>

        <input type="submit" value="Predict">
    </form>

    <div id="resultContainer"></div>

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

        // Display the result
        echo "<p>$output</p>";
    }
    ?>
</body>
</html>
