<?php

include './config/define.php';
include './config/config.php';
include('./view/View.php');

include('./view/LoginView.php'); 
include './view/HomeView.php'; 

include('./controller/FrontController.php'); 
include('./controller/UserController.php');

include './model/dao/DAO.php'; 
include './model/dao/UserDao.php'; 
session_cache_limiter('none'); 
session_start();

$controller = new FrontController(); 
$page = $controller->execute(); 
$page->display();