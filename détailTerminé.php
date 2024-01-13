<?php
    session_start();
    require 'dbcon.php';
    $email=$_SESSION["email"];

    $query = "SELECT nom FROM users WHERE email='$email'";
    $query_run = mysqli_query($con, $query);

    
        $users = mysqli_fetch_array($query_run);
       


?>
      


   
      <?php  

$id = mysqli_real_escape_string($con, $_GET['id']);



if(isset($_POST['sup_Ter']))
{
    $id = mysqli_real_escape_string($con, $_POST['sup_Ter']);

    $query = "DELETE FROM  consultation WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "consultation supprimée";
        header("Location:traitéConsultation.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "suppression échouée";
        header("Location:traitéConsultation.php");
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
                <a href="indexDashbordAdmin.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="far fa-envelope"></i> Consultations</a>
                <!--a href="GestionCongé.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="far fa-calendar-alt"></i>
                    Gestion des Congés </a-->
                <a href="GestionComptes.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-user"></i> Gestion des comptes </a>
                <a href="index.html" style="color: #ee5c29;" href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                    <i style="color: #ee5c29;" class="fas fa-power-off me-2"></i>
                    <span style="color: #ee5c29;">Logout </span>
                </a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <!--i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i-->
                    <a href="traitéConsultation.php" style="background-color:#ee5c29" class="btn btn-primary float-end"><i class="fas fa-chevron-left"></i></a>
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
                            <h4>Détails sur la consultation
                                 
                            <button id="openModalBtn" class="btn btn-danger float-end"> Supprimer </button>
                               
                            <!--a
                             href="modifierConsultationTerminé.php?id=<?= $id; ?>" class="btn btn-primary float-end">
                            Modifier</a-->
                                                    
            </h4>


      
  
  <div id="myModal" class="modal"  >
    <div class="modal-content"  style=" width:23cm" >
    <span class="close"  style="font-size:2.8rem ;">&times;</span>
      <h2 style="font-size:1.5rem ;"> Êtes-vous sûr de vouloir supprimer cette consultation ?</h2>
      
      <div style="text-align:center">
<form action="CodeConsultation.php" method="POST" class="d-inline">
<button style="font-size:1.2rem ; width:3cm" class="btn btn-danger btn-sm"  type="submit" name="sup_Ter" 
value="<?=$id;?>" class="btn btn-danger btn-sm">Supprimer</button>

</form>

<button onclick="closeModal()" style="font-size:1.2rem ; background-color:#0f1b6f; width:3cm" class="btn btn-danger btn-sm">Cancel</button>
    </div>

  </div>
  </div>
 


  






                            </div>

           
                            <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM consultation WHERE id='$id'";
                            $query_run = mysqli_query($con, $query);
                            $consultation = mysqli_fetch_array($query_run);
                        ?>
                            <form action="CodeConsultation.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Numéro de consultation</label>
                                            <p class="form-control-static"><?= $consultation['id']; ?></p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Demandeur</label>
                                            <p class="form-control-static"><?= $consultation['nom']; ?></p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Poste</label>
                                            <p class="form-control-static"><?= $consultation['poste']; ?></p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Entreprise</label>
                                            <p class="form-control-static"><?= $consultation['nomEntreprise']; ?></p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <p class="form-control-static"><?= $consultation['email']; ?></p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Numéro</label>
                                            <p class="form-control-static"><?= $consultation['num']; ?></p>
                                        </div>

                                        <!-- Autres champs pour la première colonne -->

                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Numéro de devis</label>
                                            <p class="form-control-static"><?= $consultation['idDevis']; ?></p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Traitée par</label>
                                            <p class="form-control-static"><?= $consultation['affectéEà']; ?></p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Date de fin</label>
                                            <p class="form-control-static"><?= $consultation['dateTer']; ?></p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Heure de fin</label>
                                            <p class="form-control-static"><?= $consultation['timeTer']; ?></p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Commentaire</label>
                                            <p class="form-control-static"><?= $consultation['commentaire']; ?></p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Fichier </label>
                                            <p class="form-control-static">
                                                <a href="fichier/<?= $consultation['fichierTer']; ?>" title="<?= $consultation['fichierTer']; ?>">
                                                    <?= $consultation['fichierTer']; ?>
                                                </a>
                                            </p>
                                        </div>

                                        <!-- Autres champs pour la deuxième colonne -->

                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <p class="form-control-static"><?= $consultation['description']; ?></p>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Fichier</label>
                                    <p class="form-control-static">
                                        <a href="fichier/<?= $consultation['fichier']; ?>" title="<?= $consultation['fichier']; ?>">
                                            <?= $consultation['fichier']; ?>
                                        </a>
                                    </p>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Date de demande</label>
                                    <p class="form-control-static"><?= $consultation['date']; ?></p>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Heure de demande</label>
                                    <p class="form-control-static"><?= $consultation['time']; ?></p>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Date d'affectation</label>
                                    <p class="form-control-static"><?= $consultation['dateAff']; ?></p>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Heure d'affectation</label>
                                    <p class="form-control-static"><?= $consultation['timeAff']; ?></p>
                                </div>

                                <!-- Reste du formulaire -->

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
</body>

</html>