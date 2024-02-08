<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calculadora de Peso Corporal</title>
</head>
<body>
    <main class="container">
        <h1>Calculadora de Peso Corporal</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>

            <label for="peso">Peso (kg):</label>
            <input type="number" name="peso" step="0.01" required>

            <label for="altura">Altura (m):</label>
            <input type="number" name="altura" step="0.01" required>

            <button type="submit">Calcular</button>
        </form>
    </main>
    <div class="container">
        <?php
        // Verifica se foram recebidos dados do formulário
        if (isset($_POST['nome']) && isset($_POST['peso']) && isset($_POST['altura'])) {
            $nome = $_POST['nome'];
            $peso = $_POST['peso'];
            $altura = $_POST['altura'];

            // Calcula o Índice de Massa Corporal (IMC)
            $imc = $peso / ($altura * $altura);

            echo "<h2>Resultado para $nome:</h2>";
            echo "<p>Seu Índice de Massa Corporal (IMC) é: " . number_format($imc, 2) . "</p>";

            // Calcula o peso ideal com base na altura
            $pesoIdeal = 24.9 * ($altura * $altura);
            
            echo "<p>Seu peso é " . number_format($peso, 2) . "</p>";
            echo "<p>Seu peso ideal é: " . number_format($pesoIdeal, 2) . " kg</p>";

            // Verifica se está abaixo, dentro ou acima do peso ideal
            if ($imc < 18.5) {
                echo "<p>Você está abaixo do peso ideal.</p>";
            } elseif ($imc >= 18.5 && $imc <= 24.9) {
                echo "<p>Seu peso está dentro do peso ideal.</p>";
            } else {
                echo "<p>Você está acima do peso ideal.</p>";
            }
        } else {
            echo "<p>Por favor, preencha todos os campos do formulário.</p>";
        }
        ?>
    </div>
</body>
</html>
