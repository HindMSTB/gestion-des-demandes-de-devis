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
   
    
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">

<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

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
            width: 300px;
            text-align: center;
        }

        .modal-content a {
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            color: #333;
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
    <div class="row" id="my-row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Listes des employés </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nom et prénom</th>
                                <th style="text-align: center;">Numéro de téléphone</th>
                                <th style="text-align: center;">Email</th>
                                <th style="text-align: center;">Consultation en cours</th>
                                <th style="text-align: center;">Consultation traitée</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
    $query = "SELECT u.nom, u.num, u.email, 
              (SELECT COUNT(DISTINCT c1.id) FROM consultation c1 WHERE c1.etat = 'en cours' AND c1.affectéEà = u.nom) AS consultations_en_cours,
              (SELECT COUNT(DISTINCT c2.id) FROM consultation c2 WHERE c2.etat = 'Terminé' AND c2.affectéEà = u.nom) AS consultations_traitees
              FROM users u";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        while ($row = mysqli_fetch_assoc($query_run)) {
            $nom_prenom = $row['nom'] ;
            $numero_telephone = $row['num'];
            $email = $row['email'];
            $consultations_en_cours = $row['consultations_en_cours'];
            $consultations_traitees = $row['consultations_traitees'];
    ?>
    <tr>
        <td><?= $nom_prenom; ?></td>
        <td style="text-align: center;"><?= $numero_telephone; ?></td>
        <td style="text-align: center;"><?= $email; ?></td>
        <td style="text-align: center;"><?= $consultations_en_cours; ?></td>
        <td style="text-align: center;"><?= $consultations_traitees; ?></td>
    </tr>
    <?php
        }
    } else {
        echo 'Aucun employé trouvé.';
    }
    ?>







                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
