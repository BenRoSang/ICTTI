<?php

class LoginView extends View { 

    private $errors;

    public function __construct($errors=null) { 
        $this->errors=$errors; 
    } 
    
    public function displayBody() { ?>
    
        <h3>You can Login Here...</h3>
        <form method="post">
            <table>
                <tr>
                    <td>Login Name:</td>
                    <td><input type="text" name="loginName" value="<?php echo htmlspecialchars(@$_POST['loginName'])?>">
                        <font color="red">
                            <?php if(isset($this->errors["lname_null"])) 
                                echo $this->errors["lname_null"];
                            ?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="loginPassword" value="<?php echo htmlspecialchars(@$_POST['loginPassword'])?>"> 
                        <font color="red">
                            <?php if( isset($this->errors["lpassword_null"]) ) 
                            echo $this->errors["lpassword_null"]?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"align="center">
                        <input type="submit" value="Login" name="btnLogin">
                        <font color="red">
                            <?php if(isset($this->errors["all_null"])) 
                                echo $this->errors["all_null"];
                            ?>
                            <?php if(isset($this->errors["invalid_user"])) 
                                    echo $this->errors["invalid_user"];
                            ?>
                            
                            <?php if(isset($this->errors["wrong_password"])) 
                                echo $this->errors["wrong_password"];
                            ?>
                        </font>
                        
                    </td>
                </tr>
            </table>     
        </form>        
        <font color="red">New User?<ahref="">Register</a></font>
        <?PHP 
        } 
    } 