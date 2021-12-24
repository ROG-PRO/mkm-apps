<script>
    $(document).ready(function() {
        $(".button").click(function() {
            $(this).addClass("blue");
            // $("div").addClass("important");
        });
    });
</script>
<style>
    .important {
        font-weight: bold;
        font-size: xx-large;
    }

    .blue {
        color: blue;
    }

    .activemenu {
        border: 1px solid #ddd;
        padding: 15px;
        font-size: 12px;
        color: white;
        background: green;
    }

    .btn-master {
        border: 1px solid #ddd;
        padding: 15px;
        font-size: 12px;


    }
</style>
<div class="content-wrapper">



    <!-- /.card -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User management
                        <!--| <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah<?= $title ?>"><i class="fa fa-plus" aria-hidden="true"></i></button>-->
                        <!-- <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#insertcsv<?= $title ?>"><i class="fas fa-upload    "></i></button></h1>-->

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home </a></li>
                        <li class="breadcrumb-item active"> <?= $title; ?> </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" style="margin:0px;">
                    <!-- Application buttons -->

                    <div class="card">

                        <div class="card-body">

                            <a href="<?= base_url('admin/usermanagement/user_access_menu') ?>" class="btn btn-app btn-master <?php if ($this->uri->segment(3) == 'user_access_menu') {
                                                                                                                                    echo 'activemenu';
                                                                                                                                } ?> ">
                                <i class="fas fa-users-cog"></i> Access Menu
                            </a>
                            <a href="<?= base_url('admin/usermanagement/user_role') ?>" class="btn btn-app btn-master <?php if ($this->uri->segment(3) == 'user_role') {
                                                                                                                            echo 'activemenu';
                                                                                                                        } ?> ">
                                <i class="far fa-list-alt"></i> Menu
                            </a>
                            <a href="<?= base_url('admin/usermanagement/user_sub_menu') ?>" class="btn btn-app btn-master <?php if ($this->uri->segment(3) == 'user_sub_menu') {
                                                                                                                                echo 'activemenu';
                                                                                                                            } ?>">
                                <i class="far fa-list-alt"></i>Sub Menu
                            </a>
                            <a href="<?= base_url('admin/usermanagement/user') ?>" class="btn btn-app btn-master <?php if ($this->uri->segment(3) == 'user') {
                                                                                                                        echo 'activemenu';
                                                                                                                    } ?>">
                                <i class="fas fa-user-alt"></i>User
                            </a>


                        </div>
                        <!-- /.card-body -->
                    </div>