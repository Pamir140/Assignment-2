<?php
//first declare the variable for username and password
$username = $_POST['username'];
$password = $_POST['password'];
$db=new PDO('mysql:host=aws.computerstudi.es;dbname=gc200388184','gc200388184','NKn2VFm6kw');

$sql = "SELECT userId, password FROM users WHERE username = :username";
$cmd = $db->prepare($sql);
$cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
$cmd->execute();
$user = $cmd->fetch();
//if password is not match
if (!password_verify($password, $user['password'])) {
    header('location:Login.php?invalid=true');
    exit();
}
else {

    session_start();
    $_SESSION['userId'] = $user['userId'];
    $_SESSION['username'] = $username;
    header('location:TESTJACK.php');
}
$db = null;
?>