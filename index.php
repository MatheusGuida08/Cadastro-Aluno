<?php

session_start();

if (!isset($_SESSION['nomes'])) {
    $_SESSION['nomes'] = [];
}

if (!isset($_SESSION['idades'])) {
    $_SESSION['idades'] = [];
}

if (!isset($_SESSION['cursos'])) {
    $_SESSION['cursos'] = [];
}

if (!isset($_SESSION['notas'])) {
    $_SESSION['notas'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (isset($_POST['acao']) && $_POST['acao'] === 'cadastrar') {
        if (count($_SESSION['nomes']) < 10) {
            $_SESSION['nomes'][] = $_POST['nome'];
            $_SESSION['idades'][] = $_POST['idade'];
            $_SESSION['cursos'][] = $_POST['curso'];
            $_SESSION['notas'][] = $_POST['nota'];
            echo "Aluno cadastrado com sucesso";
        } else {
            echo "Erro: Limite de 10 alunos atingido!";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cad-Aluno</title>
</head>

<body>

    <nav>
        <form method="post">
            <button type="submit" name="acao" value="listar">Listar Alunos</button>
            <button type="submit" name="acao" value="media">Calcular Média</button>
            <button type="submit" name="acao" value="buscar">Buscar Aluno</button>
            <button type="submit" name="acao" value="sair">Sair</button>
        </form>
    </nav>
    <hr>

    <form method="post">
        <h3>Cadastro de Alunos</h3><br>
        <label for="nome">Nome:</label>
        <input type="text" name="nome"><br>
        <label for="idade">Idade:</label>
        <input type="number" name="idade" min="6" max="60"><br>
        <label for="curso">curso:</label>
        <input type="text" name="curso"><br>
        <label for="nota">Nota:</label>
        <input type="number" name="nota" max="10" min="0" step="0.1"><br>
        <button type="submit" name="acao" value="cadastrar">Cadastrar</button>
    </form>
    <hr>


    <main style="display: flex; flex-direction: column; align-items: center;">

        <?php

        $pagina = $_POST['acao'] ?? 'home';

        if ($pagina === 'listar') {
            echo "<h3>Alunos Cadastrados</h3>";
            if (count($_SESSION['nomes']) > 0) {
                for ($i = 0; $i < count($_SESSION['nomes']); $i++) {

                    echo "Nome: " . $_SESSION['nomes'][$i] . " - Curso: " . $_SESSION['cursos'][$i] . " - Nota: " . $_SESSION['notas'][$i] . "<br>";
                }
            } else {
                echo "Nenhum aluno cadastrado.";
            }
        }

        if ($pagina === 'media') {
            echo "<h3>Resultado da Média</h3>";
            $quantidade = count($_SESSION['notas']);

            if ($quantidade > 0) {
                $soma = array_sum($_SESSION['notas']);
                $media = $soma / $quantidade;
                echo "A média da turma é: " . number_format($media, 2);
            } else {
                echo "Ainda não há alunos cadastrados para calcular a média.";
            }
        }

        if ($pagina === 'buscar') {
            echo "<h3>Buscar Aluno</h3>";
            echo '<form method="post">
            <input type="text" name="nome_busca" placeholder="Digite o nome...">
            <button type="submit" name="acao" value="realizar_busca">Procurar</button>
          </form>';
        }

        if ($pagina === 'realizar_busca') {
            $nome_procurado = $_POST['nome_busca'];
            $encontrado = false;

            for ($i = 0; $i < count($_SESSION['nomes']); $i++) {
                if (stripos($_SESSION['nomes'][$i], $nome_procurado) !== false) {
                    echo "Aluno encontrado! <br>";
                    echo "Nome: " . $_SESSION['nomes'][$i] . " | Nota: " . $_SESSION['notas'][$i] . "<br>";
                    $encontrado = true;
                }
            }

            if (!$encontrado)
                echo "Aluno não encontrado.";
        }

        if ($pagina === 'sair') {
            session_unset();
            session_destroy();
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
        ?>
    </main>
</body>

</html>