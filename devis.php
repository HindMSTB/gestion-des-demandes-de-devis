
<?php
session_start();
require 'dbcon.php';

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

        $query = "INSERT INTO consultation (id, nom, poste, nomEntreprise, email, num, description, date, time, fichier) VALUES ('$lastID', '$nom', '$poste', '$nomEntreprise', '$email', '$num', '$description', '$date', '$time', '$fichier')";

        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            echo "Ajout réussi";
            header("Location:index.html");
            exit(0);
        } else {
            echo "Ajout échoué";
            header("Location:devis.php");
            exit(0);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Complete Responsive Construction Website Design Tutorial</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">

   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/devis.css">
   
   <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Libraries CSS Files >
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/animate/animate.css" rel="stylesheet">

  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet"-->

  <!-- Main Stylesheet File -->
  <link href="css/devis.css" rel="stylesheet">
  <!--link href="css/style-EPI.css" rel="stylesheet"-->
  


  <style> 



nav .logo{
   color: white;
   font-size: 33px;
   font-weight: bold;
   line-height: 70px;
   padding-left: 110px;
 }
 nav{
   height: 70px;
   
   box-shadow: 0 3px 15px rgba(0,0,0,.4);
 }
 nav ul{
   float: right;
   margin-right: 30px;

 }
 
 nav ul li{
   display: inline-block;
 }

 nav ul li a{
   color:#ee5c29;
   display: block;
   padding: 0 15px;
   line-height: 70px;
   font-size: 20px;
   background: white;
   
   transition: .5s;
  
   
 }

 nav ul li a:hover,
 nav ul li a.active{
   color: #0f1b6f;
 }

 nav ul ul{
   position: absolute;
   top: 85px;
   border-top: 3px solid #0f1b6f;
   opacity: 0;
   visibility: hidden;
  
 }
 nav ul li:hover > ul{
   top: 70px;
   opacity: 1;
   visibility: visible;
   transition: .3s linear;
 }
 nav ul ul li{
   width: 150px;
   display: list-item;
   position: relative;
   border: 1px solid rgb(255, 253, 253);
  
   border-top: none;
   z-index: 999;
 }
 nav ul ul li a{
   line-height: 50px;
   z-index: 9999;


 }
 nav ul ul ul{
   border-top: none;
  
 }
 nav ul ul ul li{
   position: relative;
   top: -70px;
   left: 150px;
   z-index: 9999;
 }
 nav ul ul li a i{
   margin-left: 45px;

 }
 
 
.naviVerF{
 
   font-size: 3rem;
   color: var(--black);
   text-transform: capitalize;
  

}






/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/
.containerF{
	max-width: 1170px;
	margin:auto;
}
.row{
	display: flex;
	flex-wrap: wrap;
}
ul{
	list-style: none;
}
.footer{
	background-color: #eee;
    padding: 70px 0;
}
.footer-col{
   width: 25%;
   padding: 0 15px;
}
.footer-col h4{
	font-size: 18px;
	color:#0f1b6f;
	text-transform: capitalize;
	margin-bottom: 35px;
	font-weight: 500;
	position: relative;
}
.footer-col h4::before{
	content: '';
	position: absolute;
	left:0;
	bottom: -10px;
	background-color: #ee5c29;
	height: 2px;
	box-sizing: border-box;
	width: 50px;
}
.footer-col ul li:not(:last-child){
	margin-bottom: 10px;
}
.footer-col ul li a{
	font-size: 16px;
	text-transform: capitalize;
	color:#ee5c29;
	text-decoration: none;
	font-weight: 300;
	color: #0f1b6f;
	display: block;
	transition: all 0.3s ease;
}
.footer-col ul li a:hover{
	color:#0f1b6f;
	padding-left: 8px;
}
.footer-col .social-links a{
	display: inline-block;
	height: 40px;
	width: 40px;
	background-color: rgba(255,255,255,0.2);
	margin:0 10px 10px 0;
	text-align: center;
	line-height: 40px;
	border-radius: 50%;
	color:#0f1b6f;
	transition: all 0.5s ease;
}
.footer-col .social-links a:hover{
	color: #24262b;
	background-color: #ffffff;
}

/*responsive*/
@media(max-width: 767px){
  .footer-col{
    width: 50%;
    margin-bottom: 30px;
}
}
@media(max-width: 574px){
  .footer-col{
    width: 100%;
}
}

</style>
  
</head>
<body>
 

      <nav  style="background-color:white;">
        
         <img style="width: 6% ; margin-left:48px "  src="image/Logo-IADIS-removebg-preview.png" alt="" title="">
         <ul >
            <li ><a  href="index.html#big-wrapper light">Home</a></li>
            <li><a href="index.html#about" >About</a></li>
                
            <li >
               <a href="index.html#services">Produits
               <i class="fas fa-caret-down"></i>
               </a>

               <ul>
                  <li ><a href="index-EPI.html" style=" line-height: 50px;  width: 500px; border:6px solid white;">Equipements de protection (EPI)</a></li>
                  <li><a href="" style=" line-height: 50px;  width: 500px; border: 4px solid white; ">Outillage à main et électroportatif</a></li>
                  <li><a href=""style=" line-height: 50px;  width: 500px; border: 4px solid white; ">Consommables de la maintenance</a></li>
                  <li><a href=""style=" line-height: 50px;  width: 500px; border: 4px solid white; ">Levage et manutention </a></li>
                  <li><a href=""style=" line-height: 50px;  width: 500px; border: 4px solid white; ">Pièces de rechange</a></li>
                  <li><a href="index.html#about"style=" line-height: 50px;  width: 500px; border: 4px solid white; ">Pompes et moteurs</a></li>
       
               </ul>
            </li>

            <li><a href="devis.php">Demander un devis</a></li>
            <li><a href="index.html#projects">Contact</a></li>
            <li><a href="index.html#reviews">FAQ</a></li>
        
            <li><a href="login.php"> 
               <div  class="fas fa-user"> </div>
               
                </a> 
      

         </ul>
         
     </nav>
      


  


      


    <section class="contact" id="contact">
    
       <h1 class="heading" id="pl"> Demander un devis </h1>
    
       <div class="row">
    
    
            <form action="#" method="POST"   enctype="multipart/form-data" >
             <h3></h3>

             <div class="inputBox">
               <input type="text" name="nom" placeholder="Nom et prénom">
                <input type="text" name="nomEntreprise" placeholder="Nom de l'entreprise">
                <input type="email" name="email"placeholder="Email">
                <input type="number" name="num" placeholder="Numero de téléphone">
             </div>
             <!--div class="inputBox">
              
                <!--input type="text" placeholder="subject">
                <input type="date"name="date" class="box">
                <input type="time" name="time">
             </div-->
             <textarea name="description" placeholder="description" id="" cols="30" rows="10"></textarea>
           
             <input type="file" name="fichier" id ="fichier" accept="*" >
<br><br>

<!--onchange="validateFileSize(this)"
<script>
  function validateFileSize(input) {
    var fileSize = input.files[0].size / 1024 / 1024; // Convertir en Mo
    var maxSize = 10; // Taille maximale autorisée en Mo

    if (fileSize > maxSize) {
      alert("Le fichier est trop volumineux. Veuillez choisir un fichier de taille inférieure à " + maxSize + "Mo.");
      input.value = ''; // Effacer la sélection de fichier
    }
  }
</script-->

             <input type="submit" name="submit" value="confirmez" class="btn">
          </form>
    
       </div>
    
    </section>
       
    
    
<footer class="footer" id="footer">
  <div class="containerF">
     <div class="row">
        <div class="footer-col">
          
            <img style="width: 25%" src="image/Logo-IADIS-removebg-preview.png" alt="" title="">
           <p style="font-size: 16px; color: #0f1b6f;">
            IADIS,une entreprise spécialisé dans la maintenance et la fourniture industrielle et automobile. 
           </p>
        </div>
        <div class="footer-col">
           <h4>LIENS UTILES</h4>
           <ul>

              <li> <a href="#home">home</a></li>
                 <li> <a href="#about">Qui sommes-nous </a></li>
                    <li> <a href="#services">produits</a></li>
                       <li> <a href="#projects">Services</a></li>
                          <li> <a href="#footer">contact</a></li>
                             <li> <a href="#reviews">FAQ</a></li>
              
           </ul>
        </div>
        <div class="footer-col">
           <h4>CONTACT</h4>
         

           <p style="font-size: 2.5ch;color: #0f1b6f;"> <i class="fas fa-map-marker-alt"></i> 120, Boulvard la grande ceinture lilya 2 N° 48, Casablanca  </p> 
           <p style="font-size: 2.5ch;color: #0f1b6f;"><i class="fas fa-phone"></i> +212 522 356 853 </p> 
     <p style="font-size: 2.5ch;color: #0f1b6f;"> <i class="fas fa-envelope"></i> Contact@iadis.ma </p>  
     <p style="font-size: 2.5ch;color: #0f1b6f;"><i class="fas fa-globe"></i> www.iadis.ma </p> 

        </div>
        <div class="footer-col">
           <h4>RÉSEAUX SOCIAUX</h4>
           <div class="social-links">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
           </div>
        </div>
     </div>
  </div>
</footer>

    </body>
    </html>