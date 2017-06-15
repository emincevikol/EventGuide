<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("config.php");

if(isset($_POST['email']) && isset($_POST['password']) && $_POST['password']!=null && $_POST['email']!=null){
    $adServer = "192.168.0.91";
	  $ldap = ldap_connect($adServer,389);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ldaprdn = $email;
    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
    $bind = @ldap_bind($ldap, $ldaprdn."@eventguide.com", $password);
    if ($bind) {
        $filter="(sAMAccountName=$email)";
        $result = ldap_search($ldap,"dc=eventguide,dc=com",$filter);
        ldap_sort($ldap,$result,"sn");
        $info = ldap_get_entries($ldap, $result);
        for ($i=0; $i<$info["count"]; $i++)
        {
            if($info['count'] > 1)
                break;

      			  $email= $info[$i]['samaccountname'][0]."@ogr.cbu.edu.tr";

              $_SESSION['fname'] = $info[$i]["givenname"][0];
              $_SESSION['lname'] = $info[$i]["sn"][0];
              $_SESSION['number'] = $info[$i]["displayname"][0];
              $_SESSION['email'] = $email;
              $_SESSION['login'] = true;
              $_SESSION['admin'] = false;
              $_SESSION['president']=false;

              $sql = "SELECT * FROM `president` WHERE  `status`=1 and `number`='".$_SESSION['number']."' ";
              $result = mysqli_query($con, $sql);
              $row=mysqli_num_rows($result);
              if ($row>0){
                while($inf = mysqli_fetch_assoc($result)) {
                  if($inf["number"]== $info[$i]["displayname"][0]){
                    $_SESSION['president']=true;
                    if ( $inf["type"] == "community") {
                      $sql2 = "SELECT * FROM `community` WHERE status=1 and id='".$inf["manages"]."' ";
                      $result2 = mysqli_query($con, $sql2);
                      while($inf2 = mysqli_fetch_assoc($result2)) {
                        $_SESSION['presidentOf']=$inf2["name"];
                        ?>
                            <script>
                              window.top.location = 'dashboard/index.php';
                            </script>
                        <?php
                      }
                    }
                    else if( $inf["type"] == "club" ){
                      $sql2 = "SELECT * FROM `club` WHERE status=1 and id='".$inf["manages"]."' ";
                      $result2 = mysqli_query($con, $sql2);
                      while($inf2 = mysqli_fetch_assoc($result2)) {
                        $_SESSION['presidentOf']=$inf2["name"];
                        ?>
                            <script>
                             window.top.location = 'dashboard/index.php';
                            </script>
                        <?php
                        }
                      }
                    }
                  }
                }
                else {
                  $sql = "SELECT * FROM `admins` ";
                  $result = mysqli_query($con, $sql);
                  $row=mysqli_num_rows($result);
                  if ($row>0) {
                    while($inf = mysqli_fetch_assoc($result)) {
                      if($inf["displayname"]==$_SESSION['number']){
                        $_SESSION['admin']=true;
                          ?>
                          <script>
                            window.top.location = 'dashboard/index.php';
                          </script>
                          <?php
                        }
                        else {
                          $sql2 = "SELECT * FROM `student` WHERE studentno='".$_SESSION['number']."' ";
                          $result2 = mysqli_query($con, $sql2);
                          $row2=mysqli_num_rows($result2);
                          if($row2==0)
                          {
                            ?><script>
                              window.top.location = '../registerform.php';
                            </script>
                            <?php
                          }
                          else{
                            ?><script>
                              window.top.location = '../userprofile.php';
                            </script>
                            <?php
                          }
                        }
                      }
                  }
                }
              }
          @ldap_close($ldap);
      }
      else{
        ?><script>alert("E-mail şifre eşleşmedi yada yanlış."); window.top.location = '../login.php';</script> <?php exit;
      }
}
else{
      ?><script>alert("Lütfen gerekli alanları doldurunuz.."); window.top.location = '../login.php';</script><?php exit;
}
?>
