<?php
// Se initializeaza sesiunea
session_start();

// Verificam daca utilizatorul este deja logat, daca da il redirectionam catre pagina principala
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: main.php");
    exit;
}

//Includem fisierul de configurare al bazei de date
require_once "db.php";

//Declaram variabilele si le initializam cu valori goale
$username = $password = "";
$username_err = $password_err = $login_err = "";

//Procesam valorile scrise de catre utilizator in formular
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //Verificam daca numele de utilizator este gol
    if(empty(trim($_POST["username"]))){
        $username_err = "Va rugam introduceti username-ul.";
    } 
    else{
        $username = trim($_POST["username"]);
    }

    //Verificam daca parola este goala
    if(empty(trim($_POST["password"]))){
        $password_err = "Va rugam introduceti parola.";
    } else{
        $password = trim($_POST["password"]);
    }

    //Verificam datele de logare
    if(empty($username_err) && empty($password_err)){
        //Pregatim cererea pentru baza de date
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            //Legam variabilele la cererea catre baza de date ca si parametrii
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            //Setam parametrii
            $param_username = $username;

            //Incercam sa executam cererea catre baza de date
            if(mysqli_stmt_execute($stmt)){
                //Stocam rezultatul
                mysqli_stmt_store_result($stmt);

                //Verificam daca exista numele de utilizator, daca da verificam parola
                if(mysqli_stmt_num_rows($stmt) == 1){
                    //Legam variabilele rezultat
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            //Parola fiind corecta incepem o noua sesiune
                            session_start();

                            //Stocam datele in variabilele de sesiune
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            //Redirectionam utilizatorul la pagina principala
                            header("location: main.php");
                        } else{
                            //Parola este gresita, afisam mesajul de eroare
                            $login_err = "Username sau parola gresita.";
                        }
                    }
                } else{
                    //Numele de utilizator este gresit, afisam mesajul de eroare
                    $login_err = "Username sau parola gresita.";
                }
            } else{
                echo "Va rugam incercati mai tarziu.";
            }

            //Inchidem cererea
            mysqli_stmt_close($stmt);
        }
    }

    // Inchidem conexiunea
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logare</title>
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
            width: 500px;
            height: 280px;
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
        <h2 style="text-align:center;">Login</h2>

        <?php
        if(!empty($login_err)) {
            echo '<div class="alert alert-danger">'.$login_err.'</div>';
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <input type="text" name="username" placeholder="Nume de utilizator" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span style="text-align:center;" class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Parola" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span style="text-align:center;" class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input style="background-color: #47525E;border-radius: 5px;width: 139px;height: 55px;border-color:#47525E;margin-left:16%;margin-top: 2%;" type="submit" class="btn btn-primary" value="Logheaza-te">
                <a style="background-color: #47525E;border-radius: 5px; width: 139px;height: 55px;border-color:#47525E;padding-top:12px;margin-left:14%;margin-top:2%;" class="btn btn-primary" href="register.php">Inregistreaza-te</a>
            </div>
        </form>
    </div>
</body>
</html>