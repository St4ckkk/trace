<?php
session_start();

include( "config.php" );

if(isset($_POST['forminscription'])) {
   $name = htmlspecialchars($_POST['name']);
   $mail = htmlspecialchars($_POST['mail']);
   $password = sha1($_POST['password']);
   $password2 = sha1($_POST['password2']);
   if(!empty($_POST['name']) AND !empty($_POST['mail']) AND !empty($_POST['password']) AND !empty($_POST['password2'])) {
      $namelength = strlen($name);
      if($namelength <= 255) {
         if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $reqmail = $bdd->prepare("SELECT * FROM users WHERE mail = ?");
            $reqmail->execute(array($mail));
            $mailexist = $reqmail->rowCount();
            if($mailexist == 0) {
               if($password == $password2) {
                  $insertmbr = $bdd->prepare("INSERT INTO users(name, mail, password) VALUES(?, ?, ?)");
                  $insertmbr->execute(array($name, $mail, $password));
                  $erreur = "Your account has been created successfully ! <a href=\"login.php\">Login</a>";
               } else {
                  $erreur = "Passwords do not match !";
               }
            } else {
               $erreur = "Email address already exists !";
            }
         } else {
            $erreur = "Invalid email address !";
         }
      } else {
         $erreur = "Name must not exceed 255 characters !";
      }
   } else {
      $erreur = "All fields should be completed !";
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <link rel="icon" type="image/x-icon" href="assets/fav/fav.ico">
    <link rel="stylesheet" href="style.css">
    <title>Sign Up - TRACE</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

body{
    font-family: 'Poppins', sans-serif;
    background: #ececec;
}

/*------------ Login container ------------*/

.box-area{
    width: 930px;
}

/*------------ Right box ------------*/

.right-box{
    padding: 40px 30px 40px 40px;
}

/*------------ Custom Placeholder ------------*/

::placeholder{
    font-size: 16px;
}

.rounded-4{
    border-radius: 20px;
}
.rounded-5{
    border-radius: 30px;
}


/*------------ For small screens------------*/

@media only screen and (max-width: 768px){

     .box-area{
        margin: 0 10px;

     }
     .left-box{
        height: 100px;
        overflow: hidden;
     }
     .right-box{
        padding: 20px;
     }

}
</style>
<body>

    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--------------------------- Left Box ----------------------------->

       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
           <div class="featured-image mb-3">
            <img src="assets/img/tracking.png" class="img-fluid" style="width: 190px;">
           </div>
           <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">TRACE</p>
           <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Tracking, Reporting, and Analysis for Criminal Events</small>
       </div> 

    <!-------------------- ------ Right Box ---------------------------->
        
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <form method="post" action="" class="form login">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" name="name" placeholder="Name">
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control form-control-lg bg-light fs-6" name="mail" placeholder="Email address">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" placeholder="Password">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" name="password2" placeholder="Confirm Password">
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6" type="submit" name="forminscription">Sign Up</button>
                    </div>
                    <div class="row text-center">
                        <small>Already have an account? <a href="login.php">Login</a></small>
                    </div>
                </form>
                <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
          </div>
       </div> 

      </div>
    </div>

</body>
</html>