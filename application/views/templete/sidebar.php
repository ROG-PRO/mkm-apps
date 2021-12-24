<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-success elevation-1">
    <!-- Brand Logo -->


    <a href="<?= base_url('login') ?>" class="brand-link">
        <!--<img src="<?= base_url('assets/') ?>dist/img/PTLogo.jpg" alt="PTLogo" class="brand-image img-circle elevation-3" style="opacity: .8">--->
        <!-- <img src="<?= base_url('images/') ?>logomkm2.jpg" alt="PTLogo" class="brand-image img-SQUARE elevation-3" style="opacity: .8"> -->
        &nbsp;<font class="brand-text text-success" style="font-family: 'Comic Sans MS' ;">MKM </font>| <span class="brand-text text font-weight-light">Sys. Integration</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar sidebar-success-light">
        <!-- Sidebar user panel (optional) -->
        <!--<div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <?php
            $user = $this->session->userdata('fullname');
            $gbr = $this->session->userdata('gambar');
            echo $user;
            ?>
            <div class="image">
                <img src="<?php $gbr = $this->session->userdata('user_logged')->gambar;
                            echo base_url('images' . $gbr) ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">

                <a href="#" class="d-block">
                    <?php echo $this->session->userdata('user_logged')->fullname;  ?></a>
            </div>
        </div>-->

        <!-- Sidebar Menu -->
        <?php
        $uri2 = $this->uri->segment('2') ?>
        <?php
        $role_id = $this->session->userdata('user_logged')->role_id;
        // $user = $this->session->userdata('username');
        $qmenu = "SELECT `id_dept`, `nm_dept`
                            FROM `user_menu` 
                            JOIN `user_access_menu`
                              on `user_menu`.`id_dept` = `user_access_menu`.`menu_id`
                            JOIN `user_role`
                              on `user_role`.`roleid` = `user_access_menu`.`role_id`
                           WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_access_menu`.`seq_no` ASC
                ";
        $menu = $this->db->query($qmenu)->result_array();
        // var_dump($menu);
        // die;
        ?>
        <nav class="mt-2">
            <?php foreach ($menu as $menu) :
            ?>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <!-- QUERY MENU -->

                    <!-- LOOPING MENU -->

                    <li class="nav-header" style="text-transform: uppercase"><?= $menu['nm_dept'] ?></li>

                    <?php
                    $menuId = $menu['id_dept'];
                    $qsubmenu = "SELECT *
                            FROM `user_sub_menu` 
                           WHERE `menu_id` = $menuId
                             AND `is_active` = 1
                        
                ";
                    $submenu = $this->db->query($qsubmenu)->result_array();

                    ?>

                    <?php foreach ($submenu as $sm) : ?>

                        <li class="nav-item">
                            <a href="<?= base_url($sm['url']) ?>" class="nav-link <?php if ($uri2 == $sm['controller']) {
                                                                                        echo 'active';
                                                                                    } ?> ">
                                <i class="<?= $sm['icon'] ?>"></i>
                                <p><?= $sm['title'] ?></p>
                            </a>
                        </li>

                    <?php endforeach ?>


                <?php endforeach; ?>



                </ul>
                <?= $user ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>