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
                    if (($m_sub['parent']) == 0) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url($m_sub['url']) ?>">
                                <i class="<?= $m_sub['icon']; ?>"></i>
                                <span><?= $m_sub['title']; ?></span></a>
                        </li>
                        <?php
                    } elseif (($m_sub['parent']) == 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse<?= $m_sub['url'] ?>" aria-expanded="true" aria-controls="collapse<?= $m_sub['url'] ?>">
                            <i class="<?= $m_sub['icon']; ?>"></i>
                            <span><?= $m_sub['title']; ?></span>
                            </a>
                            <div id="collapse<?= $m_sub['url'] ?>" class="collapse" aria-labelledby="heading<?= $m_sub['url'] ?>" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">

                        <?php
                        $query_childmenu = $this->db->query("SELECT * FROM user_sub_menu WHERE user_sub_menu.parent = '$m_sub[id]' AND is_active = '1'")->result_array();

                        foreach ($query_childmenu as $m_child) { ?>
                            <a class="collapse-item" href="<?= base_url($m_child['url']) ?>"><?= $m_child['title'] ?></a>
                        <?php } ?>

                        </div>
                        </div>
                    </li>
<?php
                    }
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