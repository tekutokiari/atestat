<?php
//Includem fisierul de configurare al bazei de date
require_once "db.php";

//Declaram variabilele si le initializam cu valori goale
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

//Procesam valorile scrise de catre utilizator in formular
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Validam numele de utilizator
    if(empty(trim($_POST["username"]))){
        $username_err = "Va rugam introduceti un username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username-ul poate sa contina doar caractere valide.";
    } else{
        //Pregatim cererea pentru baza de date
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            //Legam variabilele la cererea catre baza de date ca si parametrii
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            //Setam parametrii
            $param_username = trim($_POST["username"]);

            //Incercam sa executam cererea catre baza de date
            if(mysqli_stmt_execute($stmt)){
                //Stocam rezultatul
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Username-ul este folosit de catre alt utilizator.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Va rugam incercati mai tarziu.";
            }

            //Inchidem conexiunea
            mysqli_stmt_close($stmt);
        }
    }

    //Verificam parola
    if(empty(trim($_POST["password"]))){
        $password_err = "Va rugam introduceti parola.";
    } elseif(strlen(trim($_POST["password"])) < 4){
        $password_err = "Parola trebuie sa contina cel putin 4 caractere.";
    } else{
        $password = trim($_POST["password"]);
    }

    //Verificam confirmarea parolei
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Confirmati-va parola.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Parolele nu se potrivesc.";
        }
    }

    //Verificam erorile de introducere inainte de a le introduce in baza de date
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        //Pregatim cererea de intrare in baza de date
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            //Legam variabilele la cererea catre baza de date ca si parametrii
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            //Setam parametrii
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); //Codificam parola

            //Incercam sa executam cererea catre baza de date
            if(mysqli_stmt_execute($stmt)){
                //Redirectionam catre pagina de login
                header("location: main.php");
            } else{
                echo "Va rugam incercati mai tarziu.";
            }

            //Inchidem cererea
            mysqli_stmt_close($stmt);
        }
    }

    //Inchidem conexiunea
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inregistrare</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { 
            background-color: #bfbfbf;
            opacity: 0.8;
            width: 1440px;
            height: 881px;
            font: 14px sans-serif; 
        }
        .wrapper {
            background-color: #FFFFFF;
            width: 525px;
            height: 320px;
            position: absolute;
            top:0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2 style="text-align:center;">Inregistreaza-te</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div style="text-align:center;" class="form-group">
                <input type="text" name="username" placeholder="Nume de utilizator" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div style="text-align:center;" class="form-group">
                <input type="password" name="password" placeholder="Parola" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div style="text-align:center;" class="form-group">
                <input type="password" name="confirm_password" placeholder="Confirmati parola" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input style="margin-left:8%;margin-top: 4%;" type="submit" class="btn btn-primary" value="Submit">
                <input style="margin-left:20%;margin-top: 4%;" type="reset" class="btn btn-secondary" value="Reset">
                <a     style="margin-left:20%;margin-top: 4%;" class="btn btn-primary" href="login.php">Logati-va</a>
            </div>
        </form>
    </div>
</body>
</html>