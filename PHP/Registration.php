<?php //Inserção de dados.  
    if (isset($_POST['acao'])){
        
        $pdo = new PDO('mysql:host=localhost;dbname=login_admin', 'root', '');

    
        $nome = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $senha = $_POST['password'];
        $Csenha = $_POST['Confirmpassword'];

    

        if( $senha == $Csenha and $nome != $lastName){
            $sql = $pdo -> prepare("INSERT INTO `dates_users` VALUES (null,?,?,?,?,?,?) ");
            $sql -> execute(array($nome,$lastName,$email,$number,$senha,$Csenha,));
            $titulo = "<span> <h1 style=\"color:green;\"> Conta Criada </h1></span>"; 
        }else
        {
            $titulo = "<span> <h1 style=\"color:red;\"> Dados errados </h1></span>";
            
        }
        }
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/DankiCode/CSS/Style_Cad.css">
        <title>Cadastro</title>
    </head>

    <body>
        <div class="site">
            <div class="IMG">
                <img src="/DankiCode/Assets/Humaaans - Wireframe.png" alt="">
            </div>
            <div class="form">
                <form method="post">
                    <div class="form-header">
                        <div class="title">
                            <?php
                                if(isset($titulo)) {
                                    echo $titulo ;
                                }elseif(!isset($titulo))
                                {
                                    echo '<h1> Cadastre-se </h1>';
                                } 
                            ?>
                            
                        </div>
                        <div class="login-btn">
                            <button><a href="/DankiCode/PHP/Projects/PHP/Login.php">Iniciar sessão</a></button>
                        </div>
                    </div>
                    <div class="input-grupo">
                        <div class="input-box">
                            <label for="firstname">Primeiro nome</label>
                            <input id="fristname" type="text" name="firstname" placeholder="Digite o primeiro nome" autocapitalize="on" required>
                        </div>

                        <div class="input-box">
                            <label for="lestname">Sobrenome</label>
                            <input id="fristname" type="text" name="lastname" placeholder="Digite seu sobrenome" autocapitalize="on" required>
                        </div>

                        <div class="input-box">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" placeholder="Digite seu email" required>
                        </div>

                        <div class="input-box">
                            <label for="number" n>Celular</label>
                            <input id="number" type="tel" name="number" placeholder="(xx)xxxx-xxxx" maxlength="11" minlength="8" required>
                        </div>

                        <div class="input-box">
                            <label for="password">Senha</label>
                            <input id="password" type="password" name="password" placeholder="Digite sua senha"  minlength="8" required>
                        </div>

                        <div class="input-box">
                            <label for="password">Comfirme sua senha</label>
                            <input id="password" type="password" name="Confirmpassword" placeholder="Confirme sua senha"  minlength="8" required>
                        </div>

                        <input style="cursor: pointer;" type="submit"  name="acao" value="Enviar">
                    </div>
                </form>
            </div>
        </div>

        
    </body>
</html>