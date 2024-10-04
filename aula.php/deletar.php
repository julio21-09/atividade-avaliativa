<?php
// Importa o arquivo responsável pela conexão com o banco de dados
require_once 'db.php';

// Instancia a classe Database e realiza a conexão com o banco
$database = new Database();
$database->connect();

// Recupera a conexão PDO para utilizá-la nas operações de banco de dados
$pdo = $database->getConnection();

// Verifica se o parâmetro 'id' foi recebido via método GET (indica que um registro deve ser removido)
if (isset($_GET['id'])) {
    // Armazena o valor do ID fornecido através do parâmetro 'id' na URL
    $id = $_GET['id'];
    
    // Prepara a instrução SQL para remover o aluno com o ID correspondente
    $stmt = $pdo->prepare("DELETE FROM alunos WHERE id = ?");
    
    // Executa a instrução passando o ID como argumento
    $stmt->execute([$id]);

    // Após a exclusão, redireciona o usuário para a página principal
    header("Location: index.php");
    exit(); // Garante que o redirecionamento seja realizado imediatamente após o comando
}
?>
