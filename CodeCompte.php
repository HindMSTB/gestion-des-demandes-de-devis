<?php
    session_start();
    require 'dbcon.php';
    
if(isset($_POST['sup_user']))
{
    $id = mysqli_real_escape_string($con, $_POST['sup_user']);

    $query = "DELETE FROM users WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "consultation supprimée";
        header("Location:GestionComptes.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "suppression échouée";
        header("Location:GestionComptes.php");
        exit(0);
    }
}

if(isset($_POST['modi_compte']))
{
    
      
    $nom= mysqli_real_escape_string($con, $_POST['nom']); 
    $email= mysqli_real_escape_string($con, $_POST['email']);
    $password= mysqli_real_escape_string($con, $_POST['password']);
    $usertype=mysqli_real_escape_string($con, $_POST['usertype']);
    $num= mysqli_real_escape_string($con, $_POST['num']);
   
           
          $query = "UPDATE users SET  nom='$nom',email='$email',password='$password',usertype='$usertype',num='$num' WHERE id='$id' ";
          $query_run = mysqli_query($con, $query);

          
          if($query_run)
          {
           
              $_SESSION['message'] = "compte mofifié";
              header("Location:GestionComptes.php");
              exit(0);
          }
          else
          {
              $_SESSION['message'] = "modification échouée";
              header("Location:GestionComptes.php");
              exit(0);
          }

        
             
                   
          
}





?>