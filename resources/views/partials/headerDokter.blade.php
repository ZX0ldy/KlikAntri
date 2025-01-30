<div class="main-header">
        <div class="d-flex">
            <div class="mobile-toggle" id="mobile-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </div>

        <div class="d-flex align-items-center">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class='bx bx-search-alt'></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                                <div class="input-group-append">
                                    ' <button class="btn btn-primary h-100" type="submit"><i
                                            class='bx bx-search-alt'></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <input class="switch" type="checkbox">
            <div class="dropdown d-inline-block ">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="info d-xl-inline-block  color-span">
                        <span class="d-block fs-20 font-w600">Dokter</span>
                        <span class="d-block mt-7">Dr.Kurniawan@gmail.com</span>
                    </span>

                    <i class='bx bx-chevron-down'></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item text-danger" href="user-login.html"><i
                            class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                        <span>Logout</span></a>
                </div>
            </div>
        </div>
    </div>

<div class="sidebar">
        <div class="sidebar-logo">
            <a href="index.html">
                <img src="../../../../assets/logos/logo1380.png" alt="Admin KlikAntri">
            </a>
            <div class="sidebar-close" id="sidebar-close">
                <i class='bx bx-menu'></i>
            </div>
        </div>
        <!-- SIDEBAR MENU -->
        <div class="simlebar-sc" data-simplebar>
            <ul class="sidebar-menu tf">

                <li>
                    <a href="/dokter/dok">
                        <i class='bx bxs-dashboard'></i>
                        <span>Poli Gigi</span>
                    </a>
                </li>

                <li>
                    <a class="darkmode-toggle" id="darkmode-toggle" onclick="switchTheme()">
                        <div>
                            <i class='bx bx-cog mr-10'></i>
                            <span>Darkmode</span>
                        </div>

                        <span class="darkmode-switch"></span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END SIDEBAR MENU -->
    </div>