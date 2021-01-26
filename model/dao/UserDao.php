<?php

class UserDao extends DAO{   
    public function getUserByUserName(){ 
        $lname=$_POST["loginName"]; 
        $sql="select * from user where username=:username"; 
        $this->openDB(); 
        $this->prepareQuery($sql); 
        $this->bindQueryParam(":username", $lname); 
        $result=$this->executeQuery(); 

        if(!empty($result)) 
            return $result; 
    } 
    
    public function getUserByUserNameAndPassword(){ 
        $lname=$_POST["loginName"]; 
        $lpass=$_POST["loginPassword"]; 
        $sql="select * from user where username=:username and password=:password"; 
        $this->openDB(); 
        $this->prepareQuery($sql); 
        $this->bindQueryParam(":username", $lname); 
        $this->bindQueryParam(":password", $lpass); 
        $result=$this->executeQuery(); 
        
        if(!empty($result))
            return $result; 
        else
            return ""; 
    } 
} 