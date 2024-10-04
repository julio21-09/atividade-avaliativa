<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Vincula o arquivo CSS -->

    <?php 
        // Importa o arquivo responsável pela conexão com o banco de dados
        require_once 'db.php';
        
        // Instancia a classe Database e realiza a conexão
        $database = new Database();
        $database->connect();
        
        // Recupera a conexão PDO para uso em consultas
        $pdo = $database->getConnection();
    ?>
</head>
<body>
    <div class="box">
        <h1>Cadastro de Alunos</h1>
        
        <!-- Formulário para inserir novos alunos -->
        <form action="cadastro.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br> <!-- Campo para inserir o nome -->

            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" required><br> <!-- Campo para inserir a idade -->

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br> <!-- Campo para inserir o email -->

            <label for="curso">Curso:</label>
            <input type="text" id="curso" name="curso" required><br> <!-- Campo para inserir o curso -->

            <input type="submit" value="Cadastrar"> <!-- Botão para enviar os dados do formulário -->
        </form>
    </div>

    <!-- Tabela para exibir alunos cadastrados -->
    <h2>Lista de Alunos Cadastrados</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Email</th>
            <th>Curso</th>
            <th>Ação</th>
        </tr>
        <?php
        // Prepara a consulta para buscar todos os registros da tabela 'alunos'
        $stmt = $pdo->prepare("SELECT * FROM alunos");
        $stmt->execute(); // Executa a consulta SQL
        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Armazena todos os registros em um array associativo
        
        // Itera sobre cada aluno e exibe as informações na tabela
        foreach ($alunos as $aluno) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($aluno['id']) . "</td>"; // Mostra o ID do aluno
            echo "<td>" . htmlspecialchars($aluno['nome']) . "</td>";
