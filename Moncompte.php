<?php
session_start();
require 'dbcon.php';
$email = $_SESSION["email"];

$query = "SELECT nom FROM users WHERE email='$email'";
$query_run = mysqli_query($con, $query);

$users = mysqli_fetch_array($query_run);
$name = $users['nom'];

if (isset($_POST['modi_compte'])) {

    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
   
    $num = mysqli_real_escape_string($con, $_POST['num']);

    $query = "UPDATE users SET nom='$nom', email='$email', password='$password',  num='$num' WHERE nom='$name'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Compte modifié";
        header("Location: indexDashbordUser.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Modification échouée";
        header("Location: indexDashbordUser.php");
        exit(0);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div style="background-color:  #eee;" id="sidebar-wrapper">
            <div class="list-group list-group-flush my-3" style="display: flex; justify-content: center; align-items: center;">
                <img style="width: 60%; text-align: center;" src="image/Logo-IADIS-removebg-preview.png" alt="" title="">
            </div>

            <div class="list-group list-group-flush my-3">
                <a href="indexDashbordUser.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="far fa-envelope"></i> Gestion des Consultations
                </a>
                <!--a href="GestionCongé.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="far fa-calendar-alt"></i> Gestion des Congés
                </a-->
                <a href="Moncompte.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-user"></i> Mon compte
                </a>
                <a style="color: #ee5c29;" href="index.html" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                    <i style="color: #ee5c29;" class="fas fa-power-off me-2"></i>
                    <span style="color: #ee5c29;">Logout</span>
                </a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <p>
                            <a style="font-size:1rem ; color:#ee5c29" id="navbarDropdown" role="button">
                                <i class="fas fa-user me-2"></i>
                                <?php echo $users['nom'] ?>
                            </a>
                        </p>
                    </ul>
                </div>
            </nav>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a href="indexDashbordUser.php" class="btn btn-danger float-end">BACK</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <?php
                               $query = "SELECT * FROM users WHERE nom='$name'";
                               $query_run = mysqli_query($con, $query);
                               
                               $users = mysqli_fetch_array($query_run);
                                ?>                               
                                   <form action="" method="POST">
    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="nom" value="<?=$users['nom'];?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="<?=$users['email'];?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Mots de passe</label>
        <input type="text" name="password" value="<?=$users['password'];?>" class="form-control">
    </div>

    <!--select name="usertype" class="mb-3">
        <option value="admin">admin</option>
        <option value="user">user</option>
    </select-->

    <div class="mb-3">
        <label>Num</label>
        <input type="text" name="num" value="<?=$users['num'];?>" class="form-control">
    </div>

    <div class="mb-3">
        <button type="submit" name="modi_compte" class="btn btn-primary">Modifier</button>
    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        </div>
    </div>
</body>

</html>
