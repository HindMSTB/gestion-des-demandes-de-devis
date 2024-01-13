<?php
    session_start();
    require 'dbcon.php';
    $email=$_SESSION["email"];

    $query = "SELECT nom FROM users WHERE email='$email'";
    $query_run = mysqli_query($con, $query);

    
        $users = mysqli_fetch_array($query_run);
       


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
    <link rel="stylesheet" href="styles.css" />


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
            
            <a href="indexDashbordAdmin.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="far fa-envelope"></i> Consultations</a>
            <a href="GestionCongé.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="far fa-calendar-alt"></i>
            Gestion des Congés </a>
            <a href="GestionComptes.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-user"></i> Gestion des comptes </a>
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
                    <h4>Détails sur la consultation
                        <a href="EncoursConsultation.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                    if(isset($_GET['id']))
                    {
                        $id = mysqli_real_escape_string($con, $_GET['id']);
                        $query = "SELECT * FROM  consultation WHERE id='$id'";
                        $query_run = mysqli_query($con, $query);

                        
                            $consultation = mysqli_fetch_array($query_run);

                            ?>
                            <form action="CodeConsultation.php" method="POST" enctype="multipart/form-data">




                                                    
    <div class="mb-3">
        <label>Numéro de consultation</label>
        <p class="form-control-static"><?=$consultation['id'];?></p>
    </div>

    <div class="mb-3">
        <label>Demandeur</label>
        <p class="form-control-static"><?=$consultation['nom'];?></p>
    </div>

    <div class="mb-3">
        <label>Poste</label>
        <p class="form-control-static"><?=$consultation['nom'];?></p>
    </div>

    <div class="mb-3">
        <label>Entreprise</label>
        <p class="form-control-static"><?=$consultation['nomEntreprise'];?></p>
    </div>
    
    <div class="mb-3">
        <label>Email</label>
        <p class="form-control-static"><?=$consultation['email'];?></p>
    </div>

    <div class="mb-3">
        <label>Numéro</label>
        <p class="form-control-static"><?=$consultation['num'];?></p>
    </div>

    <div class="mb-3">
        <label>Date de demande</label>
        <p class="form-control-static"><?=$consultation['date'];?></p>
    </div>

    <div class="mb-3">
        <label>Heure de demande</label>
        <p class="form-control-static"><?=$consultation['time'];?></p>
    </div>
     

    <div class="mb-3">
        <label>Date d'affectation</label>
        <p class="form-control-static"><?=$consultation['dateAff'];?></p>
    </div>


    
    <div class="mb-3">
        <label>Heure d'affectation</label>
        <p class="form-control-static"><?=$consultation['timeAff'];?></p>
    </div>

     
    <div class="mb-3">
         <label>Traitée par</label> 
          <p class="form-control-static"><?=$consultation['affectéEà'];?></p>
    
       
    </div>


    <div class="mb-3">
        <label>Description</label>
        <p class="form-control-static"><?=$consultation['description'];?></p>
    </div>


     

    <div class="mb-3">
        <label>Fichier</label>
        <p class="form-control-static">
            <a href="fichier/<?=$consultation['fichier'];?>" title="<?=$consultation['fichier'];?>">
                <?=$consultation['fichier'];?>
            </a>
        </p>
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
</body>
</html>










<?php
    session_start();
    require 'dbcon.php';

	$email=$_SESSION["email"];


    $query = "SELECT nom FROM users WHERE email='$email'";
    $query_run = mysqli_query($con, $query);

    
        $users = mysqli_fetch_array($query_run);
       

        if(isset($_POST['submit']))
        {
        if(!empty($_POST['nom']) &&!empty($_POST['nomEntreprise']) &&!empty($_POST['email'])&&!empty($_POST['num']) ) 
            
            
       
        $nom= mysqli_real_escape_string($con, $_POST['nom']);
        $poste= mysqli_real_escape_string($con, $_POST['poste']);
        $nomEntreprise= mysqli_real_escape_string($con, $_POST['nomEntreprise']);
        $email= mysqli_real_escape_string($con, $_POST['email']);
        $num= mysqli_real_escape_string($con, $_POST['num']);
        $description=mysqli_real_escape_string($con, $_POST['description']);
        
        $fichier=$_FILES["fichier"]["name"];
        
             move_uploaded_file($_FILES["fichier"]["tmp_name"] , "fichier/".$_FILES["fichier"]["name"] );
        
             $query = "INSERT INTO consultation (nom,poste,nomEntreprise,email,num,description,fichier) VALUES ('$nom','$nomEntreprise','$email','$num','$description','$fichier')";
             
              $query_run = mysqli_query($con, $query);
        
        
            if($query_run)
            {
               echo " ajout reussit  ";
               header("Location:indexDashbordAdmin.php");
               exit(0);
                
            }
            else
            {
                echo  "ajout echoué ";
                header("Location:indexDashbordAdmin.php");
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
            
            <a href="indexDashbordAdmin.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="far fa-envelope"></i> Consultations</a>
            <a href="GestionCongé.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="far fa-calendar-alt"></i>
            Gestion des Congés </a>
            <a href="GestionComptes.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-user"></i> Gestion des comptes </a>
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
                <h4>ajouter une consultation
                    <a href="indexDashbordAdmin.php" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="POST"  enctype="multipart/form-data">
                       
                              <div class="mb-3">
                                     <label>Numero de consultation</label>
                                    
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
                             
                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-primary"> sauvegarder </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>










<script>
    function confirmDelete() {
        var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cette consultation ?");
        
        if (confirmation) {
            return true;
        } else {
            return false;
        }
    }

    function openConfirmationDialog() {
        var confirmationDialog = document.createElement('div');
        confirmationDialog.className = 'confirmation-dialog';

        var confirmationDialogBox = document.createElement('div');
        confirmationDialogBox.className = 'confirmation-dialog-box';

        var confirmationDialogMessage = document.createElement('div');
        confirmationDialogMessage.className = 'confirmation-dialog-message';
        confirmationDialogMessage.innerText = 'Êtes-vous sûr de vouloir supprimer cette consultation ?';

        var confirmationDialogButtons = document.createElement('div');
        confirmationDialogButtons.className = 'confirmation-dialog-buttons';

        var confirmButton = document.createElement('button');
        confirmButton.className = 'confirm-button';
        confirmButton.innerText = 'Supprimer';
        confirmButton.addEventListener('click', function() {
            confirmationDialog.parentNode.removeChild(confirmationDialog);
            document.getElementById('confirmation-form').submit();
        });

        var cancelButton = document.createElement('button');
        cancelButton.className = 'cancel-button';
        cancelButton.innerText = 'Annuler';
        cancelButton.addEventListener('click', function() {
            confirmationDialog.parentNode.removeChild(confirmationDialog);
        });

        confirmationDialogButtons.appendChild(confirmButton);
        confirmationDialogButtons.appendChild(cancelButton);

        confirmationDialogBox.appendChild(confirmationDialogMessage);
        confirmationDialogBox.appendChild(confirmationDialogButtons);

        confirmationDialog.appendChild(confirmationDialogBox);
        document.body.appendChild(confirmationDialog);
    }
</script>








<form action="CodeConsultation.php" method="POST" class="d-inline">
                                                        <button style="font-size:0.8rem ; background-color:#eee; color:black ;" type="submit" name="sup_ConsNew" value="<?=$consultation['id'];?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                    </form>







                                                    <?php 
                                    $query = "SELECT * FROM consultation ";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $consultation)
                                        {
                                            ?>
                                            <tr>
                                            <td style="width: 100px" ><?= $consultation['id']; ?></td>
                                               
                                                <td style="width: 100px" ><?= $consultation['nom']; ?></td>
                                                <td style="width: 100px"><?= $consultation['nomEntreprise']; ?></td>
                                                <td ><?= $consultation['email']; ?></td>
                                                <td style="width: 100px"><?= $consultation['num'];?></td>
                                                <td><?= $consultation['date'];?></td>
                                                <td><?= $consultation['time'];?></td>
                                                <td><?= $consultation['description'];?></td>
                                                
                                                <td  style="width: 150px"> 
                                                <a href="fichier/<?php echo $consultation["fichier"]; ?>"  title="<?php echo $consultation['fichier']; ?>"> <?php echo $consultation['fichier']; ?></a>

                                                </td>
                                                
                                                <td>

                                               
                                                <a style="font-size:0.9rem ; background-color:#eee; color:black;"
                                                 href="modifierConsultation.php?id=<?= $consultation['id']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                                    <form action="supprimerConsultation.php" method="POST" class="d-inline">
                                                        <button style="font-size:0.9rem ; background-color:#eee; color:black ;" type="submit" name="sup_Cons" value="<?=$consultation['id'];?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                           
                                <tbody>



                   

<?php 

     $query = "SELECT *
     FROM consultation c
JOIN users u ON c.affectéEà = u.nom
WHERE c.etat = 'en cours' AND u.nom = '" . $users['nom'] . "';";
$query_run = mysqli_query($con, $query);



if(mysqli_num_rows($query_run) > 0)
{
 foreach($query_run as $consultation)
 {
    

     ?>
     <tr>
     <td style="width: 100px" ><?=$consultation['id'];; ?></td>
        

                  
                            <td ><?= $consultation['nomEntreprise']; ?></td>
                       

                            <td ><?= $consultation['date'];?></td>

                            <td >                                 
                              
                              <?php
$currentTime = time(); // Obtenir le timestamp actuel
$requestTime = strtotime($consultation['date'] . ' ' . $consultation['time']); // Convertir la date et l'heure de demande en timestamp
$elapsedTime = $currentTime - $requestTime; // Calculer la différence en secondes

$days = floor($elapsedTime / (24 * 60 * 60)); // Convertir en jours
$hours = floor(($elapsedTime % (24 * 60 * 60)) / (60 * 60)); // Convertir en heures
$minutes = floor(($elapsedTime % (60 * 60)) / 60); // Convertir en minutes


echo  'il y a ' . $days . ' jours, ' . $hours . ' heures et ' . $minutes . ' minutes'; ?>

                     </td>
                            
                        <td >

                        <form action="CodeConsultation.php" method="POST" class="d-inline">
                        <button style="font-size: 0.9rem; background-color: #eee; color: black;" type="submit" name="aff_Cons" value="<?=$users['nom'];?>" onmouseover="this.style.backgroundColor='green'" onmouseout="this.style.backgroundColor='#eee'">
                    <i class="fas fa-check"></i>
                              </button>

                      </form>
                      

                </td>
                    </tr>
                    </tr>
                    <?php
                }
            }
            else
            {
                echo "<h5> Aucun Enregistrement Trouvé </h5>";
            }
        ?>
        
   
    
</tbody>
</table>

</div>
</div>
</div>
</div>
</div>



</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script>
var el = document.getElementById("wrapper");
var toggleButton = document.getElementById("menu-toggle");

toggleButton.onclick = function () {
el.classList.toggle("toggled");
};
</script>

</body>
</html>








$query = "SELECT *
     FROM consultation c
JOIN users u ON c.affectéEà = u.nom
WHERE c.etat = 'en cours' AND u.nom = '" . $users['nom'] . "';";
$query_run = mysqli_query($con, $query);






if (isset($_POST['modi_consEn'])) {
    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $nomEntreprise = mysqli_real_escape_string($con, $_POST['nomEntreprise']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $num = mysqli_real_escape_string($con, $_POST['num']);
    $affectéEà = mysqli_real_escape_string($con, $_POST['affectéEà']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    if(!empty($_FILES['fichier']['tmp_name'])) {
        // Le fichier a été modifié, procéder au téléchargement
        $fichier = mysqli_real_escape_string($con, $_FILES['fichier']['name']);
        move_uploaded_file($_FILES['fichier']['tmp_name'], 'fichier/'.$_FILES['fichier']['name']);
    } else {
        // Le fichier n'a pas été modifié, récupérer le nom de fichier existant
        $query_get_filename = "SELECT fichier FROM consultation WHERE id='$id'";
        $query_run_get_filename = mysqli_query($con, $query_get_filename);
        $row = mysqli_fetch_assoc($query_run_get_filename);
        $fichier = $row['fichier'];
    }
    

    $query = "SELECT affectéEà, dateAff FROM consultation WHERE id='$id'";
    $query_run = mysqli_query($con, $query);
    $previousUser = mysqli_fetch_assoc($query_run)['affectéEà'];
    $previousDateAff = mysqli_fetch_assoc($query_run)['dateAff'];

    if ($previousUser != $affectéEà) {
        $dateAff = date('Y-m-d');
        $heure = date('H:i:s');
    } else {
        $dateAff = $previousDateAff;
    }

    $query = "UPDATE consultation SET nom='$nom', nomEntreprise='$nomEntreprise', email='$email', num='$num', description='$description', fichier='$fichier '";
  
    if ($previousUser != $affectéEà) {
        $query .= ", dateAff='$dateAff', timeAff='$heure'";
    }

    $query .= " WHERE id='$id'";

    $query_run = mysqli_query($con, $query);

    
    if ($query_run) {
        $_SESSION['message'] = "Consultation modifiée";
        header("Location: EncoursConsultation.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Modification échouée";
        header("Location: EncoursConsultation.php");
        exit(0);
    }

  
}
