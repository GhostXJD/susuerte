<?php include("../includes/header.php"); ?>

<div class="text-center">
    <h1>Bienvenido a Susuerte</h1>
</div>

<div class="text-center">
    <form action="../functions/generate4.php" method="post">
        <button type="submit" name="generate_4" class="btn btn-outline-primary">Generar boletas de 4 oportunidades</button>
    </form>

    <form action="../functions/generate8.php" method="post">
        <button type="submit" name="generate_8" class="btn btn-outline-primary">Generar boletas de 8 oportunidades</button>
    </form>
</div>

<div class="text-center">
    <?php
    session_start();
    if (isset($_SESSION['boletas_generadas_4'])) {
        $boletas = $_SESSION['boletas_generadas_4'];

        echo "<h3>Boletas generadas de 4 oportunidades:</h3>";
        echo "<p>Total de boletas generadas de 4 oportunidades: " . count($boletas) . "</p>";
        foreach ($boletas as $boleta) {
            echo "<p>" . implode(", ", $boleta) . "</p>";
        }
        unset($_SESSION['boletas_generadas_4']);
    }
    ?>
</div>

<div class="text-center">
    <?php
    if (isset($_SESSION['boletas_generadas_8'])) {
        $boletas = $_SESSION['boletas_generadas_8'];

        echo "<h3>Boletas generadas de 8 oportunidades:</h3>";
        echo "<p>Total de boletas generadas de 8 oportunidades: " . count($boletas) . "</p>";
        foreach ($boletas as $boleta) {
            echo "<p>" . implode(", ", $boleta) . "</p>";
        }
        unset($_SESSION['boletas_generadas_8']);
    }
    ?>
</div>

<?php include("../includes/footer.php"); ?>
