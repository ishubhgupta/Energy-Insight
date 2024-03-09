<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appliances Prediction</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user inputs from the form
    $lights = $_POST['lights'];
    $T1 = $_POST['T1'];
    $RH_1 = $_POST['RH_1'];
    $T2 = $_POST['T2'];
    $RH_2 = $_POST['RH_2'];
    $T3 = $_POST['T3'];
    $RH_3 = $_POST['RH_3'];
    $T4 = $_POST['T4'];
    $RH_4 = $_POST['RH_4'];
    $T5 = $_POST['T5'];
    $RH_5 = $_POST['RH_5'];
    $T6 = $_POST['T6'];
    $RH_6 = $_POST['RH_6'];
    $T7 = $_POST['T7'];
    $RH_7 = $_POST['RH_7'];
    $T8 = $_POST['T8'];
    $RH_8 = $_POST['RH_8'];
    $T9 = $_POST['T9'];
    $RH_9 = $_POST['RH_9'];
    $T_out = $_POST['T_out'];
    $Press_mm_hg = $_POST['Press_mm_hg'];
    $RH_out = $_POST['RH_out'];
    $Windspeed = $_POST['Windspeed'];
    $Visibility = $_POST['Visibility'];
    $Tdewpoint = $_POST['Tdewpoint'];
    $rv1 = $_POST['rv1'];
    $rv2 = $_POST['rv2'];
    $NSM = $_POST['NSM'];

    // Prepare the command to run the Python script with user inputs
    $command = "python -u d:/Projects/Energy-Insight/Dump/appliances.py";

    // Append user inputs to the command
    $command .= " \"$lights\" \"$T1\" \"$RH_1\" \"$T2\" \"$RH_2\" \"$T3\" \"$RH_3\" \"$T4\" \"$RH_4\" \"$T5\" \"$RH_5\" \"$T6\" \"$RH_6\" \"$T7\" \"$RH_7\" \"$T8\" \"$RH_8\" \"$T9\" \"$RH_9\" \"$T_out\" \"$Press_mm_hg\" \"$RH_out\" \"$Windspeed\" \"$Visibility\" \"$Tdewpoint\" \"$rv1\" \"$rv2\" \"$NSM\"";

    // Execute the command and get the result
    $result = shell_exec($command);

    // Display the result
    echo "<p>The predicted Appliances value is: $result</p>";
}
?>

<!-- HTML form to take user inputs -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appliances Prediction</title>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


    <label for="lights">Lights:</label>
    <input type="text" name="lights" required><br>

    <label for="T1">Temperature in kitchen area (T1):</label>
    <input type="text" name="T1" required><br>

    <label for="RH_1">Humidity in kitchen area (RH_1):</label>
    <input type="text" name="RH_1" required><br>

    <label for="T2">Temperature in living room area (T2):</label>
    <input type="text" name="T2" required><br>

    <label for="RH_2">Humidity in living room area (RH_2):</label>
    <input type="text" name="RH_2" required><br>

    <label for="T3">Temperature in laundry room area (T3):</label>
    <input type="text" name="T3" required><br>

    <label for="RH_3">Humidity in laundry room area (RH_3):</label>
    <input type="text" name="RH_3" required><br>

    <label for="T4">Temperature in office room (T4):</label>
    <input type="text" name="T4" required><br>

    <label for="RH_4">Humidity in office room (RH_4):</label>
    <input type="text" name="RH_4" required><br>

    <label for="T5">Temperature in bathroom (T5):</label>
    <input type="text" name="T5" required><br>

    <label for="RH_5">Humidity in bathroom (RH_5):</label>
    <input type="text" name="RH_5" required><br>

    <label for="T6">Temperature outside the building (north side) (T6):</label>
    <input type="text" name="T6" required><br>

    <label for="RH_6">Humidity outside the building (north side) (RH_6):</label>
    <input type="text" name="RH_6" required><br>

    <label for="T7">Temperature in ironing room (T7):</label>
    <input type="text" name="T7" required><br>

    <label for="RH_7">Humidity in ironing room (RH_7):</label>
    <input type="text" name="RH_7" required><br>

    <label for="T8">Temperature in teenager room 2 (T8):</label>
    <input type="text" name="T8" required><br>

    <label for="RH_8">Humidity in teenager room 2 (RH_8):</label>
    <input type="text" name="RH_8" required><br>

    <label for="T9">Temperature in parents' room (T9):</label>
    <input type="text" name="T9" required><br>

    <label for="RH_9">Humidity in parents' room (RH_9):</label>
    <input type="text" name="RH_9" required><br>

    <label for="T_out">Temperature outside (from Chièvres weather station) (T_out):</label>
    <input type="text" name="T_out" required><br>

    <label for="Press_mm_hg">Pressure (from Chièvres weather station) (Press_mm_hg):</label>
    <input type="text" name="Press_mm_hg" required><br>

    <label for="RH_out">Humidity outside (from Chièvres weather station) (RH_out):</label>
    <input type="text" name="RH_out" required><br>

    <label for="Windspeed">Windspeed (from Chièvres weather station) (Windspeed):</label>
    <input type="text" name="Windspeed" required><br>

    <label for="Visibility">Visibility (from Chièvres weather station) (Visibility):</label>
    <input type="text" name="Visibility" required><br>

    <label for="Tdewpoint">Dewpoint Temperature (from Chièvres weather station) (Tdewpoint):</label>
    <input type="text" name="Tdewpoint" required><br>

    <label for="rv1">Random variable 1, nondimensional (rv1):</label>
    <input type="text" name="rv1" required><br>

    <label for="rv2">Random variable 2, nondimensional (rv2):</label>
    <input type="text" name="rv2" required><br>

    <label for="NSM">NSM Value:</label>
    <input type="text" name="NSM" required><br>

    <input type="submit" value="Predict">
</form>

</body>
</html>
