<?php

abstract class View{ 
    protected function __construct(){ }
    
    private function displayHeader(){?>
    
    <html>
        <head>
            <title>MVC Flow Example</title>
            <!-- <link href="css/library.css"rel="stylesheet"type="text/css"> -->
        </head>
        <body>
            <center>
                <h3align="center">ICTTI MVC Lectures of PHP</h3>
                <?php if(isset($_SESSION["loginUser"])){?>
                    <tableborder="1"width="100%">
                        <?php include './inc/logout.php';?>
                        <tr>
                        <?php include './inc/left_menu.php';?>
                <?php }   
    } 
    abstract protected function displayBody();
    
    private function displayFooter(){?>
        </tr>
            </table>
                <hr>
                <div><tablewidth="100%">
                <tr>
                    <td align="left">&copy; Copyright 2018</td>
                    <td align="right">Created by ICTTI (Advanced Web Development)</td>
                </tr>
            </table>
        </div>
        </center>
        </body>
        </html>
    <?php } 

        public function display(){ 
            $this->displayHeader(); 
            $this->displayBody(); 
            $this->displayFooter();
        }
    } 