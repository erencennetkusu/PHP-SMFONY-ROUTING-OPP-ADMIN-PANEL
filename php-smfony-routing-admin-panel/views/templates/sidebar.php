        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="./index.php" class="logo logo-dark">
                    <span class="logo-sm">
          
                    </span>
                    <span class="logo-lg">
         
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="./index.php" class="logo logo-light">
                    <span class="logo-sm">
                
                    </span>
                    <span class="logo-lg">
             
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <?php
                                      
                                            if ($this->menuResult) {
                                                foreach ($this->menuResult as $key => $value) {
                                                    
                                                    
                                                    $resultMenuAccess = json_decode($this->roleResult[0]["userAccess"],true);
                                                    
                                                   if(in_array($value["id"],$resultMenuAccess)){
                                                    
                                                    ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?php echo $value["menuUrl"]; ?>" >
                            <?php echo $value["menuIcon"]; ?><span data-key="t-Admin Yönetim"><?php echo $value["menuAdi"]; ?></span>
                            </a>
                    
                        </li>

                        <?php } } }?>

                       

                       

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>
                <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">