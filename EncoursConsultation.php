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
    <link rel="stylesheet" href="css/styles.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    
    
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">

<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-b1tFjJl1D2XX/K1jUuF97J3gKftA+tpJXrqz8t1lX2DeywzpePZM2VYXov6FkLwswlNp5s8I23Iawhe5ZkZWZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-3TlOJ5Rfo5IgTMZS9n0SNKyBLTpQL5aFVScgixsJ/nAbON7SW7vGTfDdYAWcG5dMl+NTw/GQJQ5ss0wKjBAVg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>

a:link 
{ 
 text-decoration:none; 
} 


nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

nav li {
  display: inline-block;
  position: relative;
}

nav a {
  display: block;
  padding: 5px 10px;
  color: #0f1b6f;
  text-decoration: none;
}

nav ul.sub-menu {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1;
  background-color: #eee;
  padding: 0;
  margin: 0;
  box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);
}

nav ul.sub-menu li {
  display: block;
}

nav ul.sub-menu a {
  padding: 10px 20px;
}

nav li:hover > ul.sub-menu {
  display: block;
}


:root {
  --main-bg-color:#0f1b6f;
  --main-text-color: #ee5c29;
  --second-text-color:#0f1b6f;
  --second-bg-color: #0f1b6f;
}

.primary-text {
  color: var(--main-text-color);
}

.second-text {
  color: var(--second-text-color);
}

.primary-bg {
  background-color: var(--main-bg-color);
}

.secondary-bg {
  background-color: var(--second-bg-color);
}

.rounded-full {
  border-radius: 100%;
}

#wrapper {
  overflow-x: hidden;
  background-image: linear-gradient(
    to right,
    #eee
  );
}

#sidebar-wrapper {
  min-height: 100vh;
  margin-left: -15rem;
  -webkit-transition: margin 0.25s ease-out;
  -moz-transition: margin 0.25s ease-out;
  -o-transition: margin 0.25s ease-out;
  transition: margin 0.25s ease-out;
  
}

#sidebar-wrapper .sidebar-heading {
  padding: 0.875rem 1.25rem;
  font-size: 1.2rem;
 
}

#sidebar-wrapper .list-group {
  width: 15rem;
}

#page-content-wrapper {
  min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
  margin-left: 0;
}

#menu-toggle {
  cursor: pointer;
}

.list-group-item {
  border: none;
  padding: 20px 30px;
}

.list-group-item.active {
  background-color: transparent;
  color: var(--main-text-color);
  font-weight: bold;
  border: none;
}

@media (min-width: 768px) {
  #sidebar-wrapper {
    margin-left: 0;
  }

  #page-content-wrapper {
    min-width: 0;
    width: 100%;
  }

  #wrapper.toggled #sidebar-wrapper {
    margin-left: -15rem;
  }

  

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
            <i class="far fa-envelope"></i> Gestion des Consultations</a>
            <!--a href="GestionCongé.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="far fa-calendar-alt"></i>
            Gestion des Congés </a-->
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
                aria-expanded="false" aria-label="Toggle navigation"  >
                <span class="navbar-toggler-icon"></span>
            </button>

  
             
            <nav>
    <ul>
    <li><a href="#" style="font-size: 2.2ch; color:#ee5c29">Listes des consultations <i class="fas fa-caret-down"></i></a>
      <ul class="sub-menu">
        <li><a href="NewConsultation.php" >Nouvelles consultations</a></li>
        <li><a href="EncoursConsultation.php">Consultations en cours de traitement</a></li>
        <li><a href="traitéConsultation.php">Consultations traitées</a></li>
      </ul>
    </li>
    <li><a href="ajouterConsultation.php"style="font-size: 2.2ch;color:#ee5c29">Ajouter une consultation</a></li>
    <li><a href="#"style="font-size: 2.2ch;color:#ee5c29">Détais <i class="fas fa-caret-down"></i></a>
      <ul class="sub-menu">
        <li><a href="EntrepriseDetails.php">Sur les entreprises</a></li>
        <li><a href="EmployEDetails.php">Sur les employeurs </a></li>
      </ul>
    </li>
    </ul>
  </nav>




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

      


  <div class="container mt-4">
  <?php include('message.php'); ?>

    <div class="row" id="my-row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Listes des consultations en cours
                    <!--a style="background-color:#0f1b6f" href="ajouterConsultation.php" class="btn btn-primary float-end"> Ajouter une consultation 
                </a-->
                       
                    </h4>
                </div>
                <div class="card-body"  >

                    <table class="table table-bordered table-striped"  >
                       
                            <thead>
                            <tr>
                            <th>Numéro de consultation </th>
                                <th>Nom de l'entreprise</th>
                                <th > Demandée </th>
                              
                                <th>Affectée</th>
                                <th>traitée par </th>
                                <!--th>heure d'affectation</th-->
                            </tr>
                        </thead>
                        <tbody>



                       

                        <?php 
                                    $query = "SELECT * FROM consultation where  etat='en cours' ";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $consultation)
                                        {
                                            ?>
                                            <tr>
                                          
                                            <td style="width:70px"><?= $consultation['id']; ?></td>
                                                <td style="width:100px"><?= $consultation['nomEntreprise']; ?></td>
                                           

                                                <td style="width:200px">
                                                <?php
$currentTime = time(); // Obtenir le timestamp actuel
$requestTime = strtotime($consultation['date'] . ' ' . $consultation['time']); // Convertir la date et l'heure de demande en timestamp
$elapsedTime = $currentTime - $requestTime; // Calculer la différence en secondes

$days = floor($elapsedTime / (24 * 60 * 60)); // Convertir en jours
$hours = floor(($elapsedTime % (24 * 60 * 60)) / (60 * 60)); // Convertir en heures
$minutes = floor(($elapsedTime % (60 * 60)) / 60); // Convertir en minutes

echo 'il y a ';
if ($days > 0) {
    echo  $days . ' jours, ';
}

if ($hours > 0) {
    echo  $hours . ' heures ';
}

echo $minutes . ' minutes';
?>
                                                
                                               </td>

                                               <td style="width:200px">
                                               <?php
        $currentTime = time(); // Obtenir le timestamp actuel
        $requestTime = strtotime($consultation['dateAff'] . ' ' . $consultation['timeAff']); // Convertir la date et l'heure de demande en timestamp
        $elapsedTime = $currentTime - $requestTime; // Calculer la différence en secondes

        $days = floor($elapsedTime / (24 * 60 * 60)); // Convertir en jours
        $hours = floor(($elapsedTime % (24 * 60 * 60)) / (60 * 60)); // Convertir en heures
        $minutes = floor(($elapsedTime % (60 * 60)) / 60); // Convertir en minutes

       
echo 'il y a ';
if ($days > 0) {
    echo  $days . ' jours, ';
}

if ($hours > 0) {
    echo  $hours . ' heures ';
}

echo $minutes . ' minutes';
?>   </td>
                                                <td style="width:190px"><?= $consultation['affectéEà'];?></td>
                                                
                                                <td style="width: 90px">

                                              
                                               
                                           <a style="font-size: 0.9rem; background-color: #eee; color: black;"
                                                href="detailEncours.php?id=<?= $consultation['id']; ?>"
                                                class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i></a>

                                             

    

 

 
                                                </td>
                                            </tr>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> Aucun Enregistrement Trouvé</h5>";
                                    }
                                ?>
                                
                           
                            
                        </tbody>
                    </table>

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