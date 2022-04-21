<?php 
require_once './views/includes/header.php';
require_once './autoload.php';
require_once './controllers/HomeController.php';

// Redirect::to('acceuil');

$home = new HomeController();

$pages = ['post','add','update','delete','logout','login','acceuil','register','dashboard','profil'];
// $home->index('acceuil');
if(isset($_SESSION['logged']) && $_SESSION['logged'] = true){

	if(isset($_GET['page'])){
		if(in_array($_GET['page'],$pages)){
			$page = $_GET['page'];
			$home->index($page);
		}else{
			include('views/includes/404.php');
		}
	}else{
		$home->index('acceuil');
	}

	
require_once './views/includes/footer.php';


}else if(isset($_GET['page']) && $_GET['page'] === 'register'){
	$home->index('register');
}else{
	$home->index('login');
}