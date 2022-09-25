<?php
    $pdo = new PDO('mysql:host=localhost;dbname=login_admin','root','');
    
    if(isset($_POST['acao'])){
    $nome = $_POST['username'];
    $code = $_POST['code'];
    $sql = $pdo->prepare("SELECT * FROM `dates_users` WHERE email= ? AND confirmPass= ? ");
    $sql->execute(array($nome, $code));

    if($sql->rowCount()==1){
       header('location:/DankiCode/PHP/Projects/Timeline/Table.php');
       $titulo = "<span> <h1 style=\"color:white;\"> Iniciar Sessão </h1></span>";
    }else{  
        $titulo = "<span> <h5 style=\"color:red;\"> Dados Incorretos </h5></span>";
    }}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/DankiCode/CSS/Styles_Log.css">
    <script src="/DankiCode/JS/Projects/Cad.js" defer></script>
    <title>Iniciar sessão</title>

</head>
<body>
    
    <div class="site">
            <div class="login">
                <div id="box" class="box-login" >
                    <h1 id='ancoragem' class="a">
                     
                    <?php
                                if(isset($titulo)) {
                                    echo $titulo ;
                                }elseif(!isset($titulo))
                                {
                                    echo '<h1> Iniciar Sessão </h1>';
                                } 
                    ?>
                            </h1>
                    
                    <form method="post">
                        <div class="input-field">
                            <p>Email de usuário</p>
                            <input type="email" id="name_user" name="username" id="username" placeholder="Digite seu email de usuario" required>
                            <span></span>
                        </div>
                        <div class="input-field">
                            <p>Senha</p>
                            <input type="password" id="password_user" name="code" id="username" placeholder="Digite sua senha" minlength="8" required>
                            <span></span>
                        </div>
                        
                        <input type="submit" name="acao" value="Login">
                       
                        <a class="cadastro" href="/DankiCode/PHP/Projects/PHP/Registration.php" rel="noopener noreferrer">Criar uma conta </a>
                    
                    </form>
                </div>
            </div>

            <div class="imagem-login">
                    <img src="/DankiCode/Assets/Humaaans - Wireframe.png" alt="imagem de uma mulher em meio tecnologico">
            </div> 

    </div>
</body>
</html>