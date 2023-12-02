<?php include("../includes/header.php"); ?>

<div class="container mt-5">
    <div class="text-center">
        <h1>Bienvenido a Susuerte</h1>
    </div>

    <div class="row justify-content-center text-center mt-5">
        <form action="../functions/generate4.php" method="post">
            <button type="submit" name="generate_4" class="btn btn-outline-primary btn-lg btn-block mb-3">Generar boletas de 4 oportunidades</button>
        </form>
        <form action="../functions/generate8.php" method="post">
            <button type="submit" name="generate_8" class="btn btn-outline-primary btn-lg btn-block mb-3">Generar boletas de 8 oportunidades</button>
        </form>

        <?php
        session_start();
        if (isset($_SESSION['boletas_generadas_4'])) {
            $boletas_4 = $_SESSION['boletas_generadas_4'];
            ?>
            <div class="text-center">
                <h3>Boletas generadas de 4 oportunidades:</h3>
                <p>Total de boletas generadas de 4 oportunidades: <?php echo count($boletas_4); ?></p>
                <div style="max-height: 500px; overflow-y: scroll;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Boletas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($boletas_4 as $boleta) { ?>
                                <tr>
                                    <td><?php echo implode(", ", $boleta); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
            unset($_SESSION['boletas_generadas_4']);
        }
        ?>

        <?php
        if (isset($_SESSION['boletas_generadas_8'])) {
            $boletas_8 = $_SESSION['boletas_generadas_8'];
            ?>
            <div class="text-center">
                <h3>Boletas generadas de 8 oportunidades:</h3>
                <p>Total de boletas generadas de 8 oportunidades: <?php echo count($boletas_8); ?></p>
                <div style="max-height: 500px; overflow-y: scroll;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Boletas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($boletas_8 as $boleta) { ?>
                                <tr>
                                    <td><?php echo implode(", ", $boleta); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
            unset($_SESSION['boletas_generadas_8']);
        }
        ?>
    </div>
</div>
