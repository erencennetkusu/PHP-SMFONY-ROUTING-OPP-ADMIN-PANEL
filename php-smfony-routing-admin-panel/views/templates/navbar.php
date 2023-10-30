
<header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="./index.php" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="40">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="40">
                                </span>
                            </a>

                            <a href="./index.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="40">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="40">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                    
                    </div>

                    <div class="d-flex align-items-center">

                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none"
                                id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..."
                                                aria-label="Recipient's username">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>







                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode shadow-none">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>

                      
        
                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn shadow-none" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="assets/images/profileImages/<?php echo $this->profileResult[0]["userImage"]; ?>" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php echo $_SESSION["firstlastname"]; ?></span>
                                        <span
                                            class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"><?php echo $this->roleResult[0]["authority"]; ?></span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Hoşgeldin  <?php echo $_SESSION["firstlastname"]; ?> !</h6>
                                <a class="dropdown-item" href="profile"><i
                                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Profile</span></a>
                                <a class="dropdown-item" href="message"><i
                                        class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle">Mesajlar</span></a>
                                <a class="dropdown-item" href="/lockScreen"><i
                                        class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Ekranı Kilitle</span></a>
                                <a onclick="LogOut();" class="dropdown-item" ><i
                                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle" data-key="t-Çıkış Yap">Çıkış Yap</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>