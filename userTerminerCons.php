<?php
    session_start();
    require 'dbcon.php';
    $email=$_SESSION["email"];

    $query = "SELECT nom FROM users WHERE email='$email'";
    $query_run = mysqli_query($con, $query);

    
        $users = mysqli_fetch_array($query_run);
       


?>
      
      <?php

if (isset($_POST['submit'])) {
    if (!empty($_POST['devis'])) {

        $id = $_POST['consultation_id'];

       $devis = mysqli_real_escape_string($con, $_POST['devis']);
        $commentaire = mysqli_real_escape_string($con, $_POST['commentaire']);

        $fichier = $_FILES["fichier"]["name"];
        
        move_uploaded_file($_FILES["fichier"]["tmp_name"], "fichier/" . $_FILES["fichier"]["name"]);
    
        $dateTer = date('Y-m-d');
        $timeTer = date('H:i:s');
  
     $query = "UPDATE consultation SET idDevis='$devis',commentaire='$commentaire',fichierTer='$fichier', dateTer=' $dateTer', 
      timeTer=' $timeTer', etat='Terminé' WHERE id='$id'";
         
        $query_run = mysqli_query($con, $query);
    
        if ($query_run) {
            echo "Ajout réussi";
            header("Location:indexDashbordUser.php");
            exit(0);
        } else {
            echo "Ajout échoué";
            header("Location:indexDashbordUser.php");
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/styles.css" />

    <style>
        .form-label {
            display: inline-block;
            width: 150px;
            font-weight: bold;
        }

        .form-control-static {
            display: inline-block;
            width: 300px;
            padding: 5px;
            border: 1px solid #ccc;
        }
    </style>




<style>
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
.modal-content {
  display: flex;
  justify-content: center;
}

.modal-content button {
  margin: 10px;
}

</style>
</head>

<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div style="background-color: #eee;" id="sidebar-wrapper">
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
                    <!--i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i-->
                    <a href="indexDashbordAdmin.php" style="background-color:#ee5c29" class="btn btn-primary float-end"><i class="fas fa-chevron-left"></i></a>
                </div>

                <!--button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button-->

                

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <p>
                            <a style="font-size: 1rem; color: #ee5c29" id="navbarDropdown" role="button">
                                <i class="fas fa-user me-2"></i>
                                <?php echo $users['nom']; ?>
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
                            <h4>Terminer le traitement de  la consultation</h4>
                                 
                           
                            </div>

                            <div class="card-body">
                                <?php

                              
                            if(isset($_POST['terminer']))
                                       {

                                     $id = $_POST['terminer'];
    
                                    $query = "SELECT * FROM consultation WHERE id='$id'";
                                    $query_run = mysqli_query($con, $query);
                                    $consultation = mysqli_fetch_array($query_run);
                                ?>

                        <form action="" method="POST" enctype="multipart/form-data">

                                       

                                    <div class="row">


                                    <div class="col-md-6">
                                        

                                    <input type="hidden" name="consultation_id" value="<?=$consultation['id'];?>" />

                                        <div class="mb-3">

                                        <div class="mb-3">
                                     <label class="form-label" style="color:#0f1b6f">Numéro de devis</label>
                                     <input type="text" name="devis" class="form-control" style="width:150px;" >
                              </div>
                                     
                                        </div>

                                        <div class="mb-3">

                                        <label class="form-label" style="color:#0f1b6f"> Commentaire </label>   
                                        <textarea name="commentaire" placeholder="Ajouter un commentaire " id="" cols="50" rows="5"></textarea>
                                        </div>

                                        <div class="mb-3">
    <label class="form-label" style="color:#0f1b6f; display: block;">Fichier</label>
    <input type="file" name="fichier" id="fichier" accept="*">
</div>
                               <div class="mb-3">
                                <button type="submit" name="submit" class="btn btn-primary">Sauvegarder</button>
                            </div>
                                        </div>

                                       
                                        
                                  
                             <div class="col-md-6">
                                     <div class="mb-3">
                                            <label class="form-label">Numéro de consultation</label>
                                            <p class="form-control-static"><?=$consultation['id'];?></p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Demandeur</label>
                                            <p class="form-control-static"><?=$consultation['nom'];?></p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Poste</label>
                                            <p class="form-control-static"><?=$consultation['poste'];?></p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Entreprise</label>
                                            <p class="form-control-static"><?=$consultation['nomEntreprise'];?></p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <p class="form-control-static"><?=$consultation['email'];?></p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Numéro</label>
                                            <p class="form-control-static"><?=$consultation['num'];?></p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Date de demande</label>
                                            <p class="form-control-static"><?=$consultation['date'];?></p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Heure de demande</label>
                                            <p class="form-control-static"><?=$consultation['time'];?></p>
                                        </div>
                                         
                                        
                                        <div class="mb-3">
    <label class="form-label">la période depuis la demande</label>
    <p class="form-control-static">
        <?php
        $currentTime = time(); // Obtenir le timestamp actuel
        $requestTime = strtotime($consultation['date'] . ' ' . $consultation['time']); // Convertir la date et l'heure de demande en timestamp
        $elapsedTime = $currentTime - $requestTime; // Calculer la différence en secondes

        $days = floor($elapsedTime / (24 * 60 * 60)); // Convertir en jours
        $hours = floor(($elapsedTime % (24 * 60 * 60)) / (60 * 60)); // Convertir en heures
        $minutes = floor(($elapsedTime % (60 * 60)) / 60); // Convertir en minutes

        echo $days . ' jours, ' . $hours . ' heures et ' . $minutes . ' minutes';
        ?>
    </p>
</div>

                                        <div class="mb-3">
                                            <label class="form-label">Date d'affectation</label>
                                            <p class="form-control-static"><?=$consultation['dateAff'];?></p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Heure d'affectation</label>
                                            <p class="form-control-static"><?=$consultation['timeAff'];?></p>
                                        </div>
                                       

                                        <div class="mb-3">
    <label class="form-label">la période depuis l'affectation</label>
    <p class="form-control-static">
        <?php
        $currentTime = time(); // Obtenir le timestamp actuel
        $requestTime = strtotime($consultation['dateAff'] . ' ' . $consultation['timeAff']); // Convertir la date et l'heure de demande en timestamp
        $elapsedTime = $currentTime - $requestTime; // Calculer la différence en secondes

        $days = floor($elapsedTime / (24 * 60 * 60)); // Convertir en jours
        $hours = floor(($elapsedTime % (24 * 60 * 60)) / (60 * 60)); // Convertir en heures
        $minutes = floor(($elapsedTime % (60 * 60)) / 60); // Convertir en minutes

        echo $days . ' jours, ' . $hours . ' heures et ' . $minutes . ' minutes';
        ?>
    </p>
</div>

                                        <div class="mb-3">
                                            <label class="form-label">Traitée par</label>
                                            <p class="form-control-static"><?=$consultation['affectéEà'];?></p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <p class="form-control-static"><?=$consultation['description'];?></p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Fichier</label>
                                            <p class="form-control-static">
                                                <a href="fichier/<?=$consultation['fichier'];?>" title="<?=$consultation['fichier'];?>">
                                                    <?=$consultation['fichier'];?>
                                                </a>
                                            </p>
                                        </div>

                                        
                                      
                                        </div>








                                    </form>






                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        </div>
    </div>








    <script>

var modal = document.getElementById("myModal");
var btn = document.getElementById("openModalBtn");
var closeBtn = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

closeBtn.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}



function closeModal() {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}

</script>

</body>

</html>
