<?php
    session_start();
    require 'dbcon.php';

    $email = $_SESSION["email"];

    $query = "SELECT nom FROM users WHERE email='$email'";
    $query_run = mysqli_query($con, $query);

    $users = mysqli_fetch_array($query_run);

    // Obtenir le dernier ID de consultation
    $lastIDQuery = "SELECT MAX(id) AS lastID FROM consultation";
    $lastIDResult = mysqli_query($con, $lastIDQuery);
    $lastIDRow = mysqli_fetch_assoc($lastIDResult);
    $lastID = $lastIDRow['lastID'] + 1; // Incrémenter l'ID pour la nouvelle consultation

    if (isset($_POST['submit'])) {
        if (!empty($_POST['nom']) && !empty($_POST['nomEntreprise']) && !empty($_POST['email']) && !empty($_POST['num'])) {
            $nom = mysqli_real_escape_string($con, $_POST['nom']);
            $poste = mysqli_real_escape_string($con, $_POST['poste']);
            $nomEntreprise = mysqli_real_escape_string($con, $_POST['nomEntreprise']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $num = mysqli_real_escape_string($con, $_POST['num']);
            $description = mysqli_real_escape_string($con, $_POST['description']);
            $date = date('Y-m-d');
            $time = date('H:i:s');

            $fichier = $_FILES["fichier"]["name"];
        
            move_uploaded_file($_FILES["fichier"]["tmp_name"], "fichier/" . $_FILES["fichier"]["name"]);
        
            $query = "INSERT INTO consultation (id, nom, poste, nomEntreprise, email, num, description,date,time, fichier) VALUES ('$lastID', '$nom', '$poste', '$nomEntreprise', '$email', '$num', '$description','$date','$time', '$fichier')";
             
            $query_run = mysqli_query($con, $query);
        
            if ($query_run) {
                echo "Ajout réussi";
                header("Location:UserNewconsultation.php");
                exit(0);
            } else {
                echo "Ajout échoué";
                header("Location:UserNewconsultation.php");
                exit(0);
            }
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


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/styles.css" />


</head>
<body>
    
<div    class="d-flex" id="wrapper">
    <!-- Sidebar -->
    
        <!--div class="bg-white" id="sidebar-wrapper"-->
            <div  style="background-color:  #eee;" id="sidebar-wrapper">
           
        <!--div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">  <img  style="width: 40%" src="image/Logo-IADIS.JPG" alt="" title=""></div-->
        <div class="list-group list-group-flush my-3" style="display: flex; justify-content: center; align-items: center;">
            <img style="width: 60%; text-align: center;" src="image/Logo-IADIS-removebg-preview.png" alt="" title="">
        </div>
            
                    
             
               
      
        <div class="list-group list-group-flush my-3">
            
            <a href="indexDashbordUser.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="far fa-envelope"></i> Gestion des Consultations</a>
            <!--a href="GestionCongé.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="far fa-calendar-alt"></i>
            Gestion des Congés </a-->
            <a href="Moncompte.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-user"></i> Mon compte </a>
            <a href="index.html" style="color: #ee5c29;" href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                <i style="color: #ee5c29;" class="fas fa-power-off me-2" ></i> 
                <span style="color: #ee5c29;">Logout </span></a>
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

            <div class="collapse navbar-collapse" >
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <p>
                        <a style="font-size:1rem ; color:#ee5c29"   id="navbarDropdown"
                            role="button" >
                            <i class="fas fa-user me-2"></i>
                            
                            <?php  echo  $users['nom'] ?>
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
                        <h4>Ajouter une consultation
                            <a href="indexDashbordUser.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label>Numéro de consultation</label>
                                <input type="text" name="numConsultation" class="form-control" value="<?php echo $lastID; ?>" readonly>
                            </div>


                               
                             <div class="mb-3">
                                     <label>Demandeur</label>
                                     <input type="text" name="nom" class="form-control">
                              </div>
                              
                             <div class="mb-3">
                                     <label>Poste</label>
                                     <input type="text" name="poste" class="form-control">
                              </div>


                              <div class="mb-3">
                                     <label>nom de l'entreprise</label>
                                     <input type="text" name="nomEntreprise" class="form-control">
                              </div>
                              <div class="mb-3">
                                     <label>Email</label>
                                     <input type="text" name="email" class="form-control">
                              </div>
                              
                           

                             <div class="mb-3">
                                     <label>Numéro de téléphone</label>
                                     <input type="text" name="num" class="form-control">
                              </div>

                              
                              <textarea name="description" placeholder="description" id="" cols="100" rows="10"></textarea>
                                     

                              <div class="mb-3">
                                     <!---label>fichier</label-->
                                     <input type="file" name="fichier" id ="fichier" accept="*" >
                              </div>

                            <!-- ... Vos autres champs de formulaire ... -->
                            <div class="mb-3">
                                <button type="submit" name="submit" class="btn btn-primary">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ... Votre code HTML ... -->

</body>

</html>
