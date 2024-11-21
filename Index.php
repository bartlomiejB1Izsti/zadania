<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obliczanie BMI</title>
</head>
<body>
    <h1>Kalkulator BMI</h1>
    <form method="post" action="">
        <label for="waga">Waga (kg):</label>
        <input type="number" step="0.1" id="waga" name="waga" required>
        <br><br>
        <label for="wzrost">Wzrost (m):</label>
        <input type="number" step="0.01" id="wzrost" name="wzrost" required>
        <br><br>
        <button type="submit">Oblicz BMI</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $waga = isset($_POST['waga']) ? (float) $_POST['waga'] : 0;
        $wzrost = isset($_POST['wzrost']) ? (float) $_POST['wzrost'] : 0;

        if ($waga > 0 && $wzrost > 0) {
    
            $bmi = $waga / ($wzrost * $wzrost);

       
            if ($bmi < 16) {
                $ocena = "Za mało";
            } elseif ($bmi > 20) {
                $ocena = "Za dużo";
            } else {
                $ocena = "W normie";
            }

          
            echo "<h2>Twoje wyniki:</h2>";
            echo "<p>Twoje BMI: <strong>" . round($bmi, 2) . "</strong></p>";
            echo "<p>Kategoria: <strong>" . $ocena . "</strong></p>";
        } else {
            echo "<p>Proszę podać prawidłowe wartości wagi i wzrostu!</p>";
        }
    }
    ?>
</body>
</html>
