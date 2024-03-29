<ul class="navbar-nav bgsidebarp sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('pendaftar') ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/img/logo/logo.png') ?>" height="40px" width="40px">
        </div>
        <div class="sidebar-brand-text mx-3">PPDB ONLINE</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php

    $queryMenu = "SELECT `user_menu`.`id`,`menu`
                      FROM `user_menu` JOIN `user_access_menu`
                      ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                      WHERE `user_access_menu`.`role_id` = 9
                      ORDER BY `user_access_menu`.`menu_id` ASC
                      ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>
    <!-- LOOPING MENU-->
    <?php
    foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <!--  -->
        </div>
        <!-- SUB MENU yang login-->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
                             FROM `user_sub_menu` JOIN `user_menu`
                             ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                             WHERE `user_sub_menu`.`menu_id` = $menuId
                             AND `user_sub_menu`.`is_active` = 1
            
            ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <!-- Tampil SUB MENU yang login-->
        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span class="huruf_navbar"><?= $sm['title']; ?></span></a>
                </li>


            <?php endforeach; ?>
            <hr class="sidebar-divider mt-3">
        <?php endforeach; ?>


        <!-- Help -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-question-circle"></i>
                <span>Bantuan</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('Pendaftar/bantuanIsiform') ?>">Bagaimana cara pengisian<br> formulir ?</a>
                    <a class="collapse-item" href="<?= base_url('Pendaftar/bantuanUploadberkas') ?>">Bagaimana cara upload<br> file berkas ?</a>
                </div>
            </div>
        </li>
</ul>
<!-- End of Sidebar -->