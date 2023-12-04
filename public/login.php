<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Elegant Modal Login Modal Form with Icons</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        /* Vos styles CSS ici */
    </style>
</head>

<body>
    <div class="text-center">
        <!-- Bouton pour ouvrir la fenêtre modale de connexion -->
        <a href="#myModal" class="trigger-btn" data-toggle="modal">Click to Open Login Modal</a>
    </div>

    <!-- Fenêtre modale de connexion -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Member Login</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- Formulaire de connexion -->
                    <form action="" method="post">
                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input type="text" class="form-control" name="nom_utilisateur" placeholder="Username"
                                required="required">
                        </div>
                        <div class="form-group">
                            <i class="fa fa-lock"></i>
                            <input type="password" class="form-control" name="mot_de_passe" placeholder="Password"
                                required="required">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block btn-lg" value="Login">
                        </div>
                        <div class="form-group">
                            <i class="fa fa-check"></i>
                            <input type="checkbox" name="remember_me"> Remember Me
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>

    



</body>

</html>


<?php
session_start();

// Redirige l'utilisateur vers la page principale s'il est déjà connecté
if (isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

// Connexion à la base de données (remplacez les valeurs par les vôtres)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projetphp";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configuration pour générer des exceptions en cas d'erreur
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifie si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupère les valeurs soumises dans le formulaire
        $nomUtilisateur = $_POST['nom_utilisateur'];
        $motDePasse = $_POST['mot_de_passe'];

        // Vérifie si les valeurs correspondent à une combinaison valide dans la base de données
        $query = "SELECT * FROM user WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(':username' => $nomUtilisateur, ':password' => $motDePasse));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['username'] = $nomUtilisateur;

            // Authentification réussie, redirige l'utilisateur vers index.php
            header('Location: index.php');
            exit();
        } else {
            // Identifiant ou mot de passe incorrect, affiche un message d'erreur dans la modal
            echo '<script>alert("Identifiant ou mot de passe incorrect.");</script>';
        }
    }

    // Récupérer tous les utilisateurs de la table "user"
    $queryAllUsers = "SELECT * FROM user";
    $stmtAllUsers = $conn->query($queryAllUsers);
    $_users = $stmtAllUsers->fetchAll(PDO::FETCH_ASSOC);

    // Fermeture de la connexion
    $conn = null;
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
}
?>
