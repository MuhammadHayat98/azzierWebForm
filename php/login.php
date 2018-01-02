<?php
$username = "mah51212";
$pass = "4KKyI*%q2";
$ldap = ldap_connect("ldap://ldap.csun.edu") or die("cant connect");
$ldaprdn = "uid=" . $username . ",ou=People, ou=Auth, o=CSUN";
if($ldap) {
    $ldapbind = ldap_bind($ldap, $ldaprdn, $pass);

    if($ldapbind) {
        echo "works";
    }
    else {
        echo "nope";
    }
}
