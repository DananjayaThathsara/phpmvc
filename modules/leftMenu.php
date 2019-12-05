<div class="site-menubar">
    <div class="site-menubar-body">
        <?php
        if (isset($_SESSION['system_logged_status']) && $_SESSION['system_logged_status'] == true && $_SESSION['system_logged_access_level'] == 1) {
            ?>
            <div>
                <div>
                    <ul class="site-menu" data-plugin="menu">
                        <li class="site-menu-item has-sub">
                            <a href="home.php">
                                <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                                <span class="site-menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="site-menu-item has-sub">
                            <a href="javascript:void(0)">
                                <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                                <span class="site-menu-title">Merchants</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <ul class="site-menu-sub">
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="allMerchants.php">
                                        <span class="site-menu-title">All Merchants</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="addMerchants.php">
                                        <span class="site-menu-title">Add New</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="addCategory.php">
                                        <span class="site-menu-title">Categories</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="addSubCategory.php">
                                        <span class="site-menu-title">Sub Categories</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="addMerchantLogin.php">
                                        <span class="site-menu-title">Set Logins</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="site-menu-item has-sub">
                            <a href="javascript:void(0)">
                                <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                                <span class="site-menu-title">Outlets</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <ul class="site-menu-sub">
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="allOutlet.php">
                                        <span class="site-menu-title">All Outlets</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="addOutlet.php">
                                        <span class="site-menu-title">Add New</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="site-menu-item has-sub">
                            <a href="javascript:void(0)">
                                <i class="site-menu-icon wb-briefcase" aria-hidden="true"></i>
                                <span class="site-menu-title">Discounts</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <ul class="site-menu-sub">
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="allDiscounts.php">
                                        <span class="site-menu-title">All Discounts</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="addDiscounts.php">
                                        <span class="site-menu-title">Add New</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="site-menu-item has-sub">
                            <a href="javascript:void(0)">
                                <i class="site-menu-icon wb-user-circle" aria-hidden="true"></i>
                                <span class="site-menu-title">Members</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <ul class="site-menu-sub">
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="allMember.php">
                                        <span class="site-menu-title">All Members</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="memRegister.php">
                                        <span class="site-menu-title">Add New</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="site-menu-item has-sub">
                            <a href="javascript:void(0)">
                                <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                                <span class="site-menu-title">Users</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <ul class="site-menu-sub">
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="allUsers.php">
                                        <span class="site-menu-title">All Users</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="addUser.php">
                                        <span class="site-menu-title">Add New</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
            <?php
        } else if (isset($_SESSION['system_logged_status']) && $_SESSION['system_logged_status'] == true && $_SESSION['system_logged_access_level'] == 2) { ?>
            <div>
                <div>
                    <ul class="site-menu" data-plugin="menu">
                        <li class="site-menu-item has-sub">
                            <a href="home.php">
                                <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                                <span class="site-menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="site-menu-item has-sub">
                            <a href="javascript:void(0)">
                                <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                                <span class="site-menu-title">Merchants</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <ul class="site-menu-sub">
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="allMerchants.php">
                                        <span class="site-menu-title">All Merchants</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="addMerchants.php">
                                        <span class="site-menu-title">Add New</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="addCategory.php">
                                        <span class="site-menu-title">Categories</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="addSubCategory.php">
                                        <span class="site-menu-title">Sub Categories</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="addMerchantLogin.php">
                                        <span class="site-menu-title">Set Logins</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="site-menu-item has-sub">
                            <a href="javascript:void(0)">
                                <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                                <span class="site-menu-title">Outlets</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <ul class="site-menu-sub">
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="allOutlet.php">
                                        <span class="site-menu-title">All Outlets</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="addOutlet.php">
                                        <span class="site-menu-title">Add New</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="site-menu-item has-sub">
                            <a href="javascript:void(0)">
                                <i class="site-menu-icon wb-briefcase" aria-hidden="true"></i>
                                <span class="site-menu-title">Discounts</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <ul class="site-menu-sub">
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="allDiscounts.php">
                                        <span class="site-menu-title">All Discounts</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="addDiscounts.php">
                                        <span class="site-menu-title">Add New</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="site-menu-item has-sub">
                            <a href="javascript:void(0)">
                                <i class="site-menu-icon wb-user-circle" aria-hidden="true"></i>
                                <span class="site-menu-title">Members</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <ul class="site-menu-sub">
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="allMember.php">
                                        <span class="site-menu-title">All Members</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="memRegister.php">
                                        <span class="site-menu-title">Add New</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        <?php } else if (isset($_SESSION['system_logged_status']) && $_SESSION['system_logged_status'] == true && $_SESSION['system_logged_access_level'] == 3) { ?>
            <div>
                <div>
                    <ul class="site-menu" data-plugin="menu">
                        <li class="site-menu-item has-sub">
                            <a href="home.php">
                                <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                                <span class="site-menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="site-menu-item has-sub">
                            <a href="javascript:void(0)">
                                <i class="site-menu-icon wb-user-circle" aria-hidden="true"></i>
                                <span class="site-menu-title">Members</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <ul class="site-menu-sub">
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="allMember.php">
                                        <span class="site-menu-title">All Members</span>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="memRegister.php">
                                        <span class="site-menu-title">Add New</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><?php } ?>
    </div>
    <div class="site-menubar-footer">
        <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"
           data-original-title="Settings">
            <span class="icon wb-settings" aria-hidden="true"></span>
        </a>
        <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
            <span class="icon wb-eye-close" aria-hidden="true"></span>
        </a>
        <a href="logout.php" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
            <span class="icon wb-power" aria-hidden="true"></span>
        </a>
    </div>
</div>

