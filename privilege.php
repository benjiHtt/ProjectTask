<!DOCTYPE html>

<?php
include('functions.php');
session_start();
?>

<html lang="en">

<head>

<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <link
      href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Jogosultság módosítása</title>

      <script>

const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})

</script>



</head>

<body style= "background-image: url('img/hatter.jpg');">

<?php

$kapcs = new kapcsolat;

            //a jogokat listázza ki ismétlés nélkül
            $jogok = $kapcs->privs();
            
            //a kiválasztott felhasználó adatait szedi le (csak a jelenlegi adatok kiírása miatt)
$output = $kapcs->privlekeres();

//minden adatot kiválaszt, nem tudom h miért raktam bele
$valaszthato = $kapcs->showdata();

//csoportokat listázza ki
            $csoportok = $kapcs->showgroups();

?>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h3 class="fw-bold mb-2 text-uppercase"><span class="text-warning">Jogosultság módosítása</span></h3>
              <h3 class="fw-bold mb-2 text-uppercase"><span class="text-primary"><?php echo $_SESSION['currentuser'];?></span><span class="text-warning"> számára</span> </h3>
              <p class="text-white-50 mb-5">Válaszd ki a kívánt csoportot, vagy jogosultságot!</p>
            
              

              <?php

              while ($m = mysqli_fetch_array($output)) {

$userid = $m['userid'];
$username = $m['username'];
$privilege = $m['privilege'];
$groupid = $m['groupid'];
$groupname = $m['groupname'];

//id-jét sessionbe rakjuk a feltöltés miatt
$_SESSION['privchangeid'] = $userid;


//a privileget átalakítjuk számból szóvá
$privnev;

if ($m['privilege'] == 10){
  $privnev = "Admin";
}

if ($m['privilege'] == 5){
  $privnev = "Groupleader";
}

if ($m['privilege'] == 0){
  $privnev = "User";
}

}
  ?>

                     
                           <!-- csoportválasztó, a foreach feletti a placeholder, mint jelenlegi csoport -->
                          <form method="post">

                              <select name="pickgroup" id="pickgroup" class="btn btn-secondary btn-lg dropdown-toggle"
                                  data-bs-toggle="dropdown" aria-expanded="false">


                                  <option value="" disabled selected hidden><?php echo $groupname;?></option>

                                  

                                  <?php

                          

                      foreach($csoportok as $ertek){
                                                      ?>
                                  <option value="<?php echo $ertek['groupname'];?>">
                                      <?php echo $ertek['groupname'];?></option>
                                  <?php

                                                  }


?>

                              </select>
                          </form>
                     

                          <br>
                     
                          <!-- jogosultság választó, a foreach feletti a placeholder, mint jelenlegi jogosultság -->
                          <form method="post">
                              <select name="pickpriv" id="pickpriv" class="btn btn-secondary btn-lg dropdown-toggle"
                                  data-bs-toggle="dropdown" aria-expanded="false">

                                  <option value="" disabled selected hidden><?php echo $privnev;?></option>

                                  

                                  <?php
                              

                      foreach($jogok as $ertek){

                          $privname;

                          if ($ertek['privilege'] == 10){
                              $privname = "Admin";
                          }
                      
                          if ($ertek['privilege'] == 5){
                              $privname = "Groupleader";
                          }
                      
                          if ($ertek['privilege'] == 0){
                              $privname = "User";
                          }

                          if($privname != $privnev){

                              //az option value az alap adatként van beírva, tehát ha ki van választva a select akkor 0, 5 vagy 10-et ad vissza
                          ?>                 
                                  <option value="<?php echo $ertek['privilege'];?>">
                                      <?php echo $privname?></option>
                                  <?php
                          }

                                                  }


?>
                                                
                              </select>
                          </form>

                      
<!--véglegesítő gomb, lehet külön button kéne mindkét selectnek?-->
                      

                  <?php

?>
<br>
<form method="post">

              <input type="submit" class="btn btn-outline-light btn-lg px-5" value="működj geci" id="jogvegleges" name="jogvegleges">

                </form>

              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

            </div>

            <div>
              <p class="mb-0">Amennyiben nem rendelkezel még fiókkal, igényelj egyet az adminisztrátortól!
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <?php

if(isset($_POST['jogvegleges'])){


    echo "anyád";
        $_SESSION['setpriv'] = $_POST['pickpriv'];
        $_SESSION['setgr'] = $_POST['pickgroup'];

        $kapcs->updateuser();

        ?>

<script>
window.location.href = 'admin.php';


alert("Sikeresen módosítottad a felhasználó adatait!");
</script>

<?php

        
}

?>



</section>



</body>


</html>