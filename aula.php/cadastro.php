<?php
// Inclui o arquivo responsável pela conexão com o banco de dados
require_once 'db.php';

// Instancia a classe Database e estabelece a conexão com o banco
$database = new Database();
$database->connect();

// Obtém a conexão PDO para ser utilizada nas operações de banco de dados
$pdo = $database->getConnection();

// Verifica se o método da requisição é POST, indicando o envio do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os valores do formulário enviados via POST
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    // Prepara a instrução SQL para inserir os dados do aluno na tabela 'alunos'
    $stmt = $pdo->prepare("INSERT INTO alunos (nome, idade, email, curso) VALUES (?, ?, ?, ?)");
    
    // Executa a instrução utilizando os valores do formulário como parâmetros
    $stmt->execute([$nome, $idade, $email, $curso]);

    // Redireciona o usuário de volta para a página principal após a inserção dos dados
    header("Location: index.php");
    exit(); // Assegura que o script termine aqui para garantir o redirecionamento
}
?>

