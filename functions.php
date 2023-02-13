<?php

class kapcsolat
{
    private $host;
    private $user;
    private $pass;
    private $db;
    public $mysqli;


    public function __construct()
    {
        $this->db_connect();
    }

    //adatbázis csatlakoztatása
    private function db_connect()
    {
        $this->host = 'localhost';
        $this->user = 'toussel';
        $this->pass = '123toussel123';
        $this->db = 'toussel';

        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
        return $this->mysqli;
    }


    public function db_num($sql)
    {
        $result = $this->mysqli->query($sql);
        return $result->num_rows;
    }

    //bejelentkezéskor bekéri a felhasználó adatait


    /*
    public function login()

    {
      $user = $_SESSION['belepofelhasznalo'];
      $sql = "select userid,username,password,groupid,privilege from user where username='" . $user . "'";
        $result = $this->mysqli->query($sql);
        return $result;
    }
  */
    public function bejelentkezes()
    {

        $username = $_SESSION['belepouser'];
        $password = $_SESSION['belepopass'];

        $_SESSION['belepofelhasznalo'] = $username;

        $sql = "select * from user where username='" . $username . "'";

        //ha sikerült az adatbázis kapcsolat, elkezdi a user adatainak eltárolását
//        if ($sql != 0) {
        if ( $this->mysqli != 0) {
            $psd = "";
            $id = "";
            $name = "";
            $priv = "";
            $groupid = "";

            $user = $_SESSION['belepofelhasznalo'];
            $sql2 = "select id,username,password,groupid,privilege from user where username='" . $user . "'";
            $result = $this->mysqli->query($sql2);


            while ($m = mysqli_fetch_array($result)) {
                $psd = $m['password'];
                $id = $m['id'];
                $name = $m['username'];
                $priv = $m['privilege'];
                $groupid = $m['groupid'];
            }
            if ($psd == $password) {
                print " <script> alert('Sikeres bejelentkezés.'); </script>";

                //bejelentkezést igénylő műveletekhez adatok eltárolása
                $_SESSION['login_user'] = $username;
                $_SESSION['id'] = $id;
                $_SESSION['name'] = $name;
                $_SESSION['privilege'] = $priv;
                $_SESSION['groupid'] = $groupid;


                $sqlonline = "update user set online=1 where id=".$id;
                $result = $this->mysqli->query($sqlonline);

                if ($priv == 10) {
                    header("Location: admin.php");
                } else if ($priv == 5) {
                    header("Location: groupleader.php");
                } else {
                    header("Location: user.php");
                }

                die();


            } else {
                print "
      <script>
        alert('A megadott jelszó hibás.');
      </script>
      ";
            }
        } else {
            print "<script>	alert('Nincs ilyen felhasználó a rendszerben!'); </script>";
        }

    }


    //user regisztrálása
    public function reguser()
    {
        if (isset($_SESSION['regusername'])) {

            $reguser = $_SESSION['regusername'];
            $regpw = $_SESSION['reguserpw'];
            $regpriv = $_SESSION['regpriv'];
            $sql = ('insert into user(username, password, privilege) values ("' . $reguser . '","' . $regpw . '","' . $regpriv . '")');
            $result = $this->mysqli->query($sql);
            return $result;
        }
    }


//csoport regisztrálása
    public function reggroup()
    {
        $groupname = $_SESSION['reggroupname'];
        $sql = ('insert into csoport(groupname) values ("' . $groupname . '")');

        $result = $this->mysqli->query($sql);
        return $result;
    }

    //adatok kiíratása
    public function showdata()
    {

        $sql = "select user.id, user.username, user.groupname, user.groupid, user.privilege from user";

        $result = $this->mysqli->query($sql);
        return $result;
    }


    //a kiválasztott user adatait szedi le
    public function privlekeres()
    {


        $currentuser = $_SESSION['currentuser'];
        $sql = "select * from user where username = '" . $currentuser . "'";
        $result = $this->mysqli->query($sql);
        return $result;

    }

    //csoportadatokat választja ki
    public function showgroups()
    {
        $sql = "select csoport.groupname, csoport.groupid, csoport.userid from csoport";
        $result = $this->mysqli->query($sql);
        return $result;
    }

//kiszedi a jogosultságokat az adatbázisból ismétlés nélkül (csak kiíratáshoz)
    public function privs()
    {
        $sql = "select distinct user.privilege from user";
        $result = $this->mysqli->query($sql);
        return $result;
    }


    //feltölti a módosított jogosultsági adatokat
    public function updateuser()
    {

        $setpriv = $_SESSION['setpriv'];
        $setgroup = $_SESSION['setgr'];
        $userid = $_SESSION['privchangeid'];
        $sql = "update user set privilege =" . $setpriv . ", groupname =" . $setgroup . " where id = " . $userid;

        $result = $this->mysqli->query(($sql));
        return $result;
    }


    //regisztráció
    public function fel($felhasznalo, $password, $privilege)
    {

        $sql = ('insert INTO user(username, password, privilege) VALUES ("' . $felhasznalo . '","' . $password . '","' . $privilege . '")');
        $result = $this->mysqli->query($sql);
        return $result;


    }

//kép feltöltése az adatbázisba
    public function kepfeltoltes()
    {
        if (isset($_POST["fajl"]) && !empty($_FILES["uploadfile"]["name"])) {

//ide fogja másolni az ideiglenes tárolást a szerver
            $celmappa = "C:/xampp/htdocs/13b/csoportok/fajlok/";
//fájlnév mentése
            $filename = basename($_FILES["uploadfile"]["name"]);

//a szerver által megadott idg neve a fájlnak
            $tempname = $_FILES["uploadfile"]["tmp_name"];

//pontos fájl elérési út (fájlnévvel együtt) az ideiglenes tárolóból a szerverre másoláshoz
            $folder = $celmappa . $filename;

            $sql = ("insert into fajlok (fajlnev, userid, groupid) VALUES ('" . $filename . "', '" . $_SESSION['id'] . "', '" . $_SESSION['groupid'] . "')");
            move_uploaded_file($tempname, $folder);
            $result = $this->mysqli->query($sql);
            return $result;

        }
    }

    public function csoportletrehozas()
    {

        $groupname = $_SESSION['groupname'];
        if (isset($_SESSION['groupreg'])) {
            $sql = ("insert into csoport (groupname) VALUES ('" . $groupname . "')");
            $result = $this->mysqli->query($sql);
            return $result;
        }
    }

}

?>