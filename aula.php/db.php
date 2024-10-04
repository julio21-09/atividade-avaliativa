<?php
// Classe Database para gerenciar a conexão com o banco de dados
class Database {
    // Propriedades que armazenam as informações de conexão com o banco
    private $host = 'localhost'; // Host do banco de dados
    private $db = 'escola'; // Nome do banco
    private $user = 'root'; // Usuário para autenticação
    private $password = ''; // Senha do usuário do banco de dados
    private $port = 3307; // Porta utilizada para conectar ao MySQL
    private $connection; // Armazena a instância da conexão PDO

    // Método responsável por estabelecer a conexão com o banco de dados
    public function connect() {
        try {
            // Criação do Data Source Name (DSN) para conectar ao banco MySQL
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db}";
            
            // Inicializa o objeto PDO para efetuar a conexão
            $this->connection = new PDO($dsn, $this->user, $this->password);
            
            // Configura o modo de erro da conexão para lançar exceções em caso de erro
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            // Se a conexão falhar, exibe uma mensagem de erro
            die("Falha na conexão com o banco de dados: " . $exception->getMessage());
        }
    }

    // Método para retornar a instância de conexão PDO
    public function getConnection() {
        return $this->connection; // Retorna o objeto PDO para operações de banco de dados
    }
}
?>
