<?php

class UserController { 
    public function renderLogin() { 
        return new LoginView(); 
    } 
    
    public function renderLoginCheck() {
        $loginName=$_POST["loginName"]; 
        $loginPassword=$_POST["loginPassword"];

        if($loginName=="" && $loginPassword=="") 
            $errors["all_null"]="Please Enter all required fields"; 
        else{ 
            
            if($loginName=="") 
                $errors["lname_null"]="Please Enter Login Name"; 
            if($loginPassword=="")
                $errors["lpassword_null"]="Please Enter Login Password"; 

            if($loginName!="" && $loginPassword!=""){ 
                $userdao=new UserDao(); 
                $user=$userdao->getUserByUserName(); 
            
            if(empty($user)) 
                $errors["invalid_user"]="Invalid User!"; 
            elseif($user[0]["password"] != md5($_POST["loginPassword"])) 
                $errors["wrong_password"]="Wrong Password!"; 
            } 
        }
        
        if(!empty($errors)) 
            return new LoginView($errors); 
        else{ 
            $_SESSION["loginUser"]=$user; 
            return new HomeView(); 
        } 
    } 
    
    public function renderLogout(){ 
        if(isset($_SESSION["loginUser"])) 
        unset($_SESSION["loginUser"]);
         session_destroy(); 
         return new LoginView(); 
        } 
    }