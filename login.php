<!-- sem css -->
<?php
session_start();
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //verificando se o formulario foi enviado via post
    if (isset($_POST['username']) && isset($_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        // dando query na table admin 
        $sql_admin = "SELECT * FROM admin WHERE nick = ? AND senha = ?";
        $stmt = mysqli_prepare($conexao, $sql_admin);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'ss', $username, $password); // bind dos params para a consulta de admin
            mysqli_stmt_execute($stmt); // executando a query
            $result = mysqli_stmt_get_result($stmt);

            // Verificar se foi encontrado algum admin
            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                // Armazenar dados na sessão
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['nick'];
                $_SESSION['tipo'] = 'admin';  // setando o tipo pra amd

                header("Location: admin.php"); // Redirecionar para a página de admin
                exit();
            }
        }

        // agora buscando na tabela de users
        $sql_user = "SELECT * FROM users WHERE nick = ? AND senha = ?";
        $stmt = mysqli_prepare($conexao, $sql_user);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['nick'];
                $_SESSION['tipo'] = 'user';  

                header("Location: profile.php"); // redirecionando para a pag de profile
                exit();
            }
        }

        // se nao encontrar nem admin nem user, mostrar erro
        echo "Credenciais incorretas";
    } else {
        echo "Por favor, preencha todos os campos.";
    }
} else {
    echo "Método inválido.";
}
// fechando conexao
mysqli_close($conexao);
?>