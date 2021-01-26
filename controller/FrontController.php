<?php

class FrontController { 
    public function execute() { 
        if(!empty($_GET)){ 
            if(isset($_GET["usecase"])){ 
                $_POST['usecase'] = UC_LOGOUT;
                $_POST['action'] = ACT_LOGOUT;
            }
        }

        if(empty($_POST)) {
            $_POST['usecase'] = UC_LOGIN; 
            $_POST['action'] = ACT_LOGIN; 
        }elseif(!empty($_POST)){

            if(isset($_POST["btnLogin"])){ 
                $_POST['usecase'] = UC_LOGIN; 
                $_POST['action'] = ACT_LOGIN_CHK; 
            } 
        } 
        
        switch($_POST['usecase']) { 
            case UC_LOGIN : 
                $ctl = new UserController(); 
                
                if($_POST['action'] == ACT_LOGIN)   
                    return $ctl->renderLogin(); 
                if($_POST["action"]==ACT_LOGIN_CHK) 
                    return $ctl->renderLoginCheck(); 
                
            case UC_LOGOUT : $ctl=new UserController(); 
            if($_POST["action"]==ACT_LOGOUT) 
                return $ctl->renderLogout(); 
        } 
    } 
} 