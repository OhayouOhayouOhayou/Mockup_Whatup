<nav class="navbar navbar-expand-lg navbar-light bg-white flex-column border-0  ">
        <div class="container-fluid">
            <div class="w-100">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
    
                    <!-- Logo-->
                    <a class="navbar-brand fw-bold fs-3 m-0 p-0 flex-shrink-0 order-0" href="index.php">
                        <div class="d-flex align-items-center">
                           <img src="assets/images/logos/logo.png" style="max-width:50px"> 
                        </div>
                    </a>
                    <!-- / Logo-->
    
                    <!-- Navbar Icons-->
                    <ul class="list-unstyled mb-0 d-flex align-items-center order-1 order-lg-2 nav-sidelinks">
    
                        <!-- Mobile Nav Toggler-->
                        <li class="d-lg-none">
                            <span class="nav-link text-body d-flex align-items-center cursor-pointer" data-bs-toggle="collapse"
                                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                                aria-label="Toggle navigation"><i class="ri-menu-line ri-lg me-1"></i> Menu</span>
                        </li>


                        <?php
                        if(isset($_SESSION['id'])){
                            ?>
                     
                     <li class="ms-1 d-lg-inline-block">
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-body" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Hi, <?=$_SESSION['fname']?>
                                </a>
                                <ul class="dropdown-menu">
                      
                                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                    <li><a class="dropdown-item" href="myorder.php">Order</a></li>
                                </ul>
                            </div>
                        </li>
                     
                        <li class="ms-1 d-inline-block position-relative dropdown-cart">
                           
                                <a class="nav-link " href ="cart.php">Bag (<span id="cart-item"></span>)</a>

                        </li>
                      
                        <li class="ms-1 d-lg-inline-block">
                           
                           <a class="nav-link " href ="logout.php">Log Out</a>

                   </li>
                            <?php
                        }else{
                          ?>
                          <li class="ms-1 d-lg-inline-block">
                           
                           <a class="nav-link " href ="login.php">Log In</a>

                   </li>
                          <?php
                        }
                        ?>
                        <!-- /Navbar Cart Icon-->
    
                    </ul>
                    <!-- Navbar Icons-->                
    
                    <!-- Main Navigation-->
                    <div class="flex-shrink-0 collapse navbar-collapse navbar-collapse-light w-auto flex-grow-1 order-2 order-lg-1"
                        id="navbarNavDropdown">
    
                        <!-- Menu-->
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <?php
                            $sql_menu = "SELECT id , name , link  FROM mainmenu ORDER BY id";
                            $resul_menu = mysqli_query($con , $sql_menu);
                            while($row_menu = mysqli_fetch_assoc($resul_menu)){
                                $sql_menus = "SELECT name , link  FROM sub_menu WHERE id_main = '".$row_menu['id']."'";
                                $resul_menus= mysqli_query($con , $sql_menus);
                                $num_rows = mysqli_num_rows($resul_menus);
                               
                                if($num_rows > 0){
                                    
                                    ?>
                                     <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?=$row_menu['name']?>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <?php
                                                while($row_menus= mysqli_fetch_assoc($resul_menus)){
                                                    ?>
                                                <li><a class="dropdown-item" href="<?=$row_menus['link']?>"><?=$row_menus['name']?></a></li>
                                                    <?php
                                                }
                                                ?>
                                           
                                         
                                            </ul>
                                        </li>
                                    <?php
                                }else{
                                    ?>
                                      <li class="nav-item">
                                        <a class="nav-link " href="<?=$row_menu['link']?>" role="button" >
                                            <?=$row_menu['name']?>
                                        </a>
                                        </li>
                                    <?php
                                }
                            }
                            ?>
                       

                           
                          
                            
                          </ul>                   
                           <!-- / Menu-->
    
                    </div>
                    <!-- / Main Navigation-->
    
                </div>
            </div>
        </div>
    </nav>
  