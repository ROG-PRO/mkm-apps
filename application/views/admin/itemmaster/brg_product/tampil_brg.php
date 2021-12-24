<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-list-alt"></i> Master Part List</h3>
        <button style="float:right;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah<?= $title ?>"><i class="fas fa-plus-circle"></i> Create New Inventory
        </button> <?php echo $this->session->flashdata('message'); ?>
    </div>
    <!--<button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#tambahbrg">Tambah Data</button>--
                                <br>
                                <hr>-->
    <div class="card-body">
        <table class="table table-striped table-bordered table-sm" align="" id="databrg">
            <thead class="table-search" class="thead-dark" align="center">
                <tr>
                    <th></th>
                    <th class="th-search">Part No.</th>
                    <th class="th-search">Part Name</th>
                    <th class="th-search">Section</th>
                    <th class="th-search">Merk</th>
                    <th class="th-search">Kategori</th>
                    <th class="th-search">Stok Min</th>
                    <th class="th-search">Unit</th>
                    <!--<th class="th-search">Status</th>
                                        <th class="th-search">Lokasi</th>-->
                    <th width="10%"></th>
                    <th width="10%"></th>
                    <th></th>
                </tr>
            </thead>
            <thead class="thead-grey" align="left">
                <tr>
                    <th>No</th>
                    <th>Part No.</th>
                    <th>Part Name</th>
                    <th>Section</th>
                    <th>Merk</th>
                    <th>Kategori</th>
                    <th>Stok Min</th>
                    <th>Unit</th>
                    <!--<th>Status</th>
                                        <th>Lokasi</th>-->
                    <th>Harga</th>
                    <th>Update date</th>
                    <th width="13%" align="center">Action
                        <!-- <button style="float:right;" class="btn btn-default btn-xs" data-toggle="modal" data-target="#tambah<?= $title ?>"><i class="fa fa-plus" aria-hidden="true"></i> New</button> -->
                    </th>
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