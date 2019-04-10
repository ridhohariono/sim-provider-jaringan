    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <i class="fas fa-tasks"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SIVA Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- dinamyc menu -->
        <?php 
            $role_id = $this->session->userdata('role_id');

            $menu = $this->db->query("SELECT user_menu.id, menu FROM user_menu JOIN user_access_menu ON user_menu.id = user_access_menu.menu_id WHERE user_access_menu.role_id = '$role_id' ORDER BY user_access_menu.menu_id ASC")->result_array();
        ?>
        <!-- looping menu -->
        <?php foreach ($menu as $m) {
            ?>
                <div class="sidebar-heading">
                    <?= $m['menu']; ?>
                </div>

            <?php
                $query_submenu = $this->db->query("SELECT * FROM user_sub_menu WHERE user_sub_menu.menu_id = '$m[id]' AND is_active = '1'")->result_array();

                foreach ($query_submenu as $m_sub) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url($m_sub['url']) ?>">
                            <i class="<?= $m_sub['icon']; ?>"></i>
                            <span><?= $m_sub['title']; ?></span></a>
                    </li>
                <?php
                }
        } ?>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar --> 