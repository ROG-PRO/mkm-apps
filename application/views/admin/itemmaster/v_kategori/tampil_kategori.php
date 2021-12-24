<div class="card ">
    <div class="card-header">
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah<?= $title ?>"><i class="fas fa-plus-circle"></i> Create New <?= $title; ?></button>
    </div>
    <!--<div class="card-header">
                            <h3 class="card-title"><i class="fa fa-list-alt" aria-hidden="true"></i> <?= $title ?> list</h3>


                        </div>-->

    <div class="card-body">

        <!--<button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#tambahbrg">Tambah Data</button>--
                                <br>
                                <hr>-->
        <table class="table table-striped table-bordered table-sm" align="" id="data<?= $title ?>">
            <thead class="thead-grey" align="left">
                <tr>
                    <th>No</th>
                    <th>Kategori Name</th>
                    <th>Deskripsi</th>
                    <th>Create by</th>
                    <th>Create date</th>
                    <th width="13%" align="center"> Action
                        <!-- <button style="float:right;" class="btn btn-outline-secondary btn-xs" data-toggle="modal" data-target="#tambah<?= $title ?>"><i class="fa fa-plus" aria-hidden="true"></i> New</button> -->
                    </th>
                </tr>
            </thead>
            <tbody align="left">
            </tbody>
        </table>
    </div>
    <!--</div>-->
</div>
</div>
</div>
</section>
</div>