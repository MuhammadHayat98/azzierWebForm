<?php
session_start();

$username = $_POST['username'];

$pass = $_POST['password'];

if(isset($username) && isset($pass)) {
$ldap = ldap_connect("ldap://ldap.csun.edu") or die("cant connect");
$ldaprdn = "uid=" . $username . ",ou=People, ou=Auth, o=CSUN";
$result = ldap_search($ldap, $ldaprdn, "");
if($result) {
    $_SESSION["username"] = $username;
}
if($ldap) {
    $ldapbind = ldap_bind($ldap, $ldaprdn, $pass);
        if($ldapbind && $_SESSION["username"] == $username) {
            header("Location: works.php");
        }
        else {
            echo "invalid";
        }
  
    }

}
?>