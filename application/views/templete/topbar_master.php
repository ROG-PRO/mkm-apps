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
                    <h1 class="m-0 text-dark">Item Masters
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

                            <a href="<?= base_url('admin/itemmaster/kategori') ?>" class="btn btn-app btn-master <?php if ($this->uri->segment(3) == 'kategori') {
                                                                                                                        echo 'activemenu';
                                                                                                                    } ?> ">
                                <i class="fas fa-tasks"></i> Kategori
                            </a>
                            <a href="<?= base_url('admin/itemmaster/brand') ?>" class="btn btn-app btn-master <?php if ($this->uri->segment(3) == 'brand') {
                                                                                                                    echo 'activemenu';
                                                                                                                } ?> ">
                                <i class="fas fa-briefcase"></i> Vendor
                            </a>
                            <a href="<?= base_url('admin/itemmaster/unit') ?>" class="btn btn-app btn-master <?php if ($this->uri->segment(3) == 'unit') {
                                                                                                                    echo 'activemenu';
                                                                                                                } ?>">
                                <i class="fas fa-ruler"></i> Unit
                            </a>
                            <a href="<?= base_url('admin/itemmaster/lokasi') ?>" class="btn btn-app btn-master <?php if ($this->uri->segment(3) == 'lokasi') {
                                                                                                                    echo 'activemenu';
                                                                                                                } ?>">
                                <i class="fas fa-map-marked    "></i> Lokasi
                            </a>
                            <a href="<?= base_url('admin/itemmaster/section') ?>" class="btn btn-app btn-master <?php if ($this->uri->segment(3) == 'section') {
                                                                                                                    echo 'activemenu';
                                                                                                                } ?>">
                                <!--<span class="badge bg-warning">3</span>-->
                                <i class="fas fa-building" aria-hidden="true"></i> Section
                            </a>
                            <a href="<?= base_url('admin/itemmaster/product') ?>" class="btn btn-app btn-master <?php if ($this->uri->segment(3) == 'product') {
                                                                                                                    echo 'activemenu';
                                                                                                                } ?>">
                                <!--<span class="badge bg-success">300</span>-->
                                <i class="fas fa-barcode"></i> Products
                            </a>
                            <!-- <a href="<?= base_url('admin/itemmaster/user') ?>" class="btn btn-app btn-master <?php if ($this->uri->segment(3) == 'user') {
                                                                                                                        echo 'activemenu';
                                                                                                                    } ?>">
                                <!--<span class="badge bg-purple">891</span>--
                            <i class="fas fa-users"></i> Users
                            </a> -->
                            <a href="<?= base_url('admin/itemmaster/inventory') ?>" class="btn btn-app btn-master <?php if ($this->uri->segment(3) == 'inventory') {
                                                                                                                        echo 'activemenu';
                                                                                                                    } ?>">
                                <!--<span class="badge bg-teal">67</span>-->
                                <i class="fas fa-box-open    "></i> Inventory
                            </a>
                            <a href="<?= base_url('admin/itemmaster/process') ?>" class="btn btn-app btn-master <?php if ($this->uri->segment(3) == 'process') {
                                                                                                                    echo 'activemenu';
                                                                                                                } ?>">
                                <!--<span class="badge bg-info">12</span>-->
                                <i class="fas fa-cog    "></i> Process
                            </a>
                            <a href="<?= base_url('admin/itemmaster/machine') ?>" class="btn btn-app btn-master <?php if ($this->uri->segment(3) == 'machine') {
                                                                                                                    echo 'activemenu';
                                                                                                                } ?>">
                                <!--<span class="badge bg-info">12</span>-->
                                <i class="fas fa-cog    "></i> M/C type
                            </a>
                            <a href="<?= base_url('admin/itemmaster/customers') ?>" class="btn btn-app btn-master <?php if ($this->uri->segment(3) == 'customers') {
                                                                                                                        echo 'activemenu';
                                                                                                                    } ?>">
                                <!--<span class="badge bg-info">12</span>-->
                                <i class="fas fa-user    "></i> Customers
                            </a>
                            <a href="<?= base_url('admin/itemmaster/mtltype') ?>" class="btn btn-app btn-master <?php if ($this->uri->segment(3) == 'mtltype') {
                                                                                                                    echo 'activemenu';
                                                                                                                } ?>">
                                <!--<span class="badge bg-info">12</span>-->
                                <i class="fas fa-suitcase    "></i> Mtl Type
                            </a>

                        </div>
                        <!-- /.card-body -->
                    </div>