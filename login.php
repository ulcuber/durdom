<?php

require_once 'inc/bootstrap.php';

//$back = $_REQUEST['back'] ?: $_SERVER['HTTP_REFERER'] ?: BASE_URL;
//header('Location: ' . $back);
//$username = $_SESSION["username"];
//$password = $_SESSION["password"];
$_SESSION["username"] = htmlspecialchars(trim($_POST['username']));
$tvoiuamat = $_SESSION["username"];
$_SESSION["password"] = htmlspecialchars(trim($_POST['password']));
$tvoibatja = $_SESSION["password"];

$loggedIn = auth()->login($tvoiuamat, $tvoibatja);

if ($loggedIn) {
    header('Location: index.php ');
    echo 'Привет, ' . auth()->user()['login'];
} else {
    echo '<pre>';
    echo auth()->error();
    echo '</pre>';
}


//if (isset($_POST['username']) && isset($_POST['password']))
//{
  //  $query = "SELECT * FROM users WHERE login = :username AND password = :password";
					
    //$username = $_POST['username'];
    //$password = $_POST['password'];
					
    //$stmt = db->prepare($query);
    //$stmt->execute(array(':username' => $username, ':password' => $password));
			
    //$row = $stmt->fetch(PDO::FETCH_ASSOC);
					
    //if ($row['status'] > 0)
    //{
      //  header("location: index.php");
    //}
//}




?>