<?php
    session_start();
    require 'dbcon.php';
    
if(isset($_POST['sup_ConsNew']))
{
    $id = mysqli_real_escape_string($con, $_POST['sup_ConsNew']);

    $query = "DELETE FROM  consultation WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "consultation supprimée";
        header("Location:NewConsultation.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "suppression échouée";
        header("Location:NewConsultation.php");
        exit(0);
    }
}




    
if(isset($_POST['sup_ConsEnC']))
{
    $id = mysqli_real_escape_string($con, $_POST['sup_ConsEnC']);

    $query = "DELETE FROM  consultation WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "consultation supprimée";
        header("Location:EncoursConsultation.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "suppression échouée";
        header("Location:EncoursConsultation.php");
        exit(0);
    }
}






if(isset($_POST['aff_Cons'])) {

    $user = $_POST['aff_Cons'];
    $idCons = $_SESSION["idCons"];
    $date = date('Y-m-d');
    $heure = date('H:i:s');
  
    $query = "UPDATE consultation SET affectéEà='$user', etat='en cours', dateAff='$date', timeAff='$heure' WHERE id='$idCons'";
    $query_run = mysqli_query($con, $query);

     

    if ($query_run) {
        // Envoi de l'e-mail

        
        $nom= $user;

    $query = "SELECT email FROM users WHERE nom='$nom'";
    $query_run = mysqli_query($con, $query);
       $users = mysqli_fetch_array($query_run);
       $email= $users['email'];

        $to = $email; 
        $subject = 'Nouvelle consultation à traiter';
        $message = 'Vous avez une nouvelle consultation à traiter !';
        $headers = 'From: iadis.macontact@gmail.com'; 
    
      // l'envoi de email
        //if (mail($to, $subject, $message, $headers)) {
           // $_SESSION['message'] = 'E-mail envoyé avec succès !';
        //} else {
           // $_SESSION['message'] = 'Échec de l\'envoi de l\'e-mail.';
      //  } 
    
        header("Location: NewConsultation.php");
        exit(0);
    } else {
        $_SESSION['message'] = "";
        header("Location: NewConsultation.php");
        exit(0);
    }
    

} 


if(isset($_POST['modi_consNew']))
{

    $id = $_POST['modi_consNew'];
    
    $nom= mysqli_real_escape_string($con, $_POST['nom']);
    $nomEntreprise= mysqli_real_escape_string($con, $_POST['nomEntreprise']);
    $email= mysqli_real_escape_string($con, $_POST['email']);
    $num= mysqli_real_escape_string($con, $_POST['num']);

   

    $description=mysqli_real_escape_string($con, $_POST['description']);
    
    $fichier=$_FILES["fichier"]["name"];
    
         move_uploaded_file($_FILES["fichier"]["tmp_name"] , "fichier/".$_FILES["fichier"]["name"] );

          $query = " UPDATE consultation SET  nom='$nom',nomEntreprise='$nomEntreprise',email='$email',num='$num',  description='$description',fichier= '$fichier' WHERE id='$id'";
          $query_run = mysqli_query($con, $query);

          if($query_run)
          {
           
              $_SESSION['message'] = "Consultation mofifiée";
              header("Location:NewConsultation.php");
              exit(0);
          }
          else
          {
              $_SESSION['message'] = "modification échouée";
              header("Location:NewConsultation.php");
              exit(0);
          }

        }
          
    


        if(isset($_POST['modi_consEn'])) {
            $nom = mysqli_real_escape_string($con, $_POST['nom']);
            $nomEntreprise = mysqli_real_escape_string($con, $_POST['nomEntreprise']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $num = mysqli_real_escape_string($con, $_POST['num']);
        
            $affectéEà = mysqli_real_escape_string($con, $_POST['affectéEà']);
        
            $description = mysqli_real_escape_string($con, $_POST['description']);
            
            $fichier = $_FILES["fichier"]["name"];
            
            move_uploaded_file($_FILES["fichier"]["tmp_name"], "fichier/".$_FILES["fichier"]["name"]);
        
            $query = "SELECT affectéEà FROM consultation WHERE id='$id'";
            $query_run = mysqli_query($con, $query);
            $previousUser = mysqli_fetch_assoc($query_run)['affectéEà'];
        
            if ($previousUser != $affectéEà) {
                $dateAff = date('Y-m-d');
                $heure = date('H:i:s');
            }
        
            $query = "UPDATE consultation SET nom='$nom', nomEntreprise='$nomEntreprise', email='$email', num='$num', description='$description', fichier='$fichier'";
            
            if ($previousUser != $affectéEà) {
                $query .= ", dateAff='$dateAff', timeAff='$heure'";
            }
            
            $query .= " WHERE id='$id'";
            
            $query_run = mysqli_query($con, $query);
        
           
            if($query_run)
            {
             
                $_SESSION['message'] = "Consultation modifiée";
                header("Location:EncoursConsultation.php");
                exit(0);
            }
            else
            {
                $_SESSION['message'] = "modification échouée";
                header("Location:EncoursConsultation.php.php");
                exit(0);
            }
  
        }
        




        
if(isset($_POST['modi_Ter']))
{

    $id = $_POST['modi_consEn'];
    
    $nom= mysqli_real_escape_string($con, $_POST['nom']);
    $nomEntreprise= mysqli_real_escape_string($con, $_POST['nomEntreprise']);
    $email= mysqli_real_escape_string($con, $_POST['email']);
    $num= mysqli_real_escape_string($con, $_POST['num']);
  $idDevis=mysqli_real_escape_string($con, $_POST['idDevis']);

    $description=mysqli_real_escape_string($con, $_POST['description']);
    
    $fichier=$_FILES["fichier"]["name"];
    
     move_uploaded_file($_FILES["fichier"]["tmp_name"] , "fichier/".$_FILES["fichier"]["name"] );

         $fichierMod=$_FILES["fichier"]["name"];
    
         move_uploaded_file($_FILES["fichier"]["tmp_name"] , "fichier/".$_FILES["fichier"]["name"] );

    $query = " UPDATE consultation SET  nom='$nom',nomEntreprise='$nomEntreprise',email='$email',num='$num', date='$date'
          ,dateAff='$dateAff', affectéEà='$affectéEà', description='$description',fichier= '$fichier', idDevis='$devis',commentaire='$commentaire',fichierTer='$fichier' WHERE id='$id'";
          $query_run = mysqli_query($con, $query);

          if($query_run)
          {
           
              $_SESSION['message'] = "Consultation modifiée";
              header("Location:EncoursConsultation.php");
              exit(0);
          }
          else
          {
              $_SESSION['message'] = "modification échouée";
              header("Location:EncoursConsultation.php.php");
              exit(0);
          }

         
        
        }
          
    

          
    
?>
