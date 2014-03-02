        <?php
            session_start();
            $current_page = $_SERVER['PHP_SELF'];
        ?>
        <div id="sidebar" >
            <div id="bestdeal">
                <h4>Best DEALS!</h4>
            </div>
            <div > 
                <?php 
                    if (isset($_POST['Logout'])) {
                                session_destroy();
                                include('logout.php');
                            }
                    
                   else if (isset($_SESSION["successful"]) && $_SESSION["successful"] == "OK") {
                        include('login_success.php');


                    } 
                    else {
                            
                            include('login.php');
                        }
                ?>
                
            </div>
        </div>
        <?php
        	if (isset($_SESSION["successful"])) {
        		echo '<div class="userOption">';
                echo '<button id="picker">Background color</button> <br>';
                echo '<button id="fontPicker">Font color</button>';
                echo '<form id="userOptionID" action="" method="post">';
				echo 'Font size: <input type="text" name="fontsize">';
				echo '<input type="submit">';
				echo '</form>';
                echo '</div>';
            }
        ?>
        

		<div id="main">
            <div id="comp_name">Sukky Cars Ltd</div>
            <q style = "color: blue; font-size: 25px; font-style: italic; margin-left: 150px;">Sukky Cars Ltd, When you have a fistfull of dollars.</q>
            
            <table class = "table1">  
                <th> 
                    <input type="button" value="Front page" id="button_style"
                    ONCLICK="window.location.href='index.php'">
                </th>
                <th>
                  <input type="button"  value="Information" id="button_style"
                    onclick="window.location.href='information.php'" />
                </th>
                <th>
                    <input type="button" value="Warranty" id="button_style"
                    onclick="window.location.href='warranty.php'" />
                </th>
                <th >
                    <input type="button"  value="Cars" id="button_style"
                    onclick="window.location.href='cars.php'" />
                </th>
                <th >
                    <input type="button"  value="Search" id="button_style"
                    onclick="window.location.href='searchform.php'" />
                </th>
            </table>
        
        <div >
                <?php

                    if ($_SESSION["is_admin"] == "admin") {
                        echo '<table class = "table2">';
                        echo '<th> <input type="button"  value="Add items" id="button_style" onclick="window.location.href=\'Admin_update.php\'" /> </th>';
                        echo '<th> <input type="button"  value="Ordered products" id="button_style" onclick="window.location.href=\'Ordered_products.php\'" /> </th>';
                        echo '</table>';
                    }
                    else if (isset($_SESSION["successful"])) {
                        echo '<table class = "table2">';
                        echo '<th> <input type="button"  value="List items" id="button_style" onclick="window.location.href=\'list_products.php\'" /> </th>';
                        echo '<th> <input type="button"  value="Order products" id="button_style" onclick="window.location.href=\'buy_products.php\'" /> </th>';
                        echo '</table>';
                    }
                ?>
        </div>