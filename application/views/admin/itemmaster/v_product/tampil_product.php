<div class="card">
    <div class="card-header">
       <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah<?= $title ?>"><i class="fas fa-plus-circle"></i> Create New <?= $title; ?></button>
   </div>
   <div class="card-body">
    <table class="table table-striped table-bordered table-sm" align="" id="dataproduct">
        <thead class="thead-grey" align="left">
            <tr>
                <th>No</th>
                <th>Part NO</th>
                <th>Part Name</th>
                <th>Model No</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Customer cd</th>
                <th>Created by</th>
                <th>Created dt</th>
                <th width="8%">Action
                    <!-- <button style="float:right;" class="btn btn-outline-success btn-xs" data-toggle="modal" data-target="#tambah<?= $title ?>"><i class="fa fa-plus" aria-hidden="true"></i> New</button> -->
                </th>
                <!--<th width="11%" align="center"><button style="width:100%;" class="btn btn-outline-secondary btn-xs" data-toggle="modal" data-target="#tambahproduct"><i class="fa fa-plus" aria-hidden="true"></i> New</button></th>-->
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</section>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btn-logout" class="btn btn-primary" href="#">Logout</a>
            </div>
        </div>
    </div>
</div>