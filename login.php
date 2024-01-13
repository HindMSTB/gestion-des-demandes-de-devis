<?php
error_reporting(0);

$host="localhost";
$user="root";
$password="";
$db="iadis";

session_start();


$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$email=$_POST["email"];
	$password=$_POST["password"];


	$sql="select * from users where email='".$email."' AND password='".$password."' ";

	$result=mysqli_query($data,$sql);

	$row=mysqli_fetch_array($result);

	if($row["usertype"]=="user")
	{	

		$_SESSION["email"]=$email;

		header("location:indexDashbordUser.php");
	}

	elseif($row["usertype"]=="admin")
	{

      $_SESSION["email"]=$email;
	
		
		header("location:indexDashbordAdmin.php");
	}

   else
	{echo'<script>
    alert('.'"mot de passe ou username incorrect"'.')
    
    </script>';
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
   <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">

   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   
   <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/animate/animate.css" rel="stylesheet">

  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/devis.css" rel="stylesheet">

  
  
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

            <li><a href="devis.php">Demander un service</a></li>
            <li><a href="index.html#projects">Contact</a></li>
            <li><a href="index.html#reviews">FAQ</a></li>
        
            <li><a href="login.php"> 
               <div  class="fas fa-user"> </div>
               
                </a> 
      

         </ul>
         
     </nav>
      


      <section class="contact" id="contact">
        <h1 class="heading" id="pl"> Connectez-vous </h1>
        <div class="divC"> 
    
        
     
        <div class="row">
     
     
             <form action="#" method="POST">
              <h3></h3>
              <div class="inputBox">
                <input type="text" name="email" placeholder="email">
                 <input type="password" name="password" placeholder="mots de passe ">
                 
              </div>
            
              <input type="submit" name="submit" value="connecter" class="btn">

              </div>


      
          </div>

           </form>
     
        
 

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