       <div class="card">
           <div class="card-header">
               <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i> Tambah <?= $title; ?></button>
           </div>
           <!-- /.card-header -->
           <div class="card-body">
               <table id="example1" class="table table-bordered table-striped table-sm">
                   <thead>
                       <tr>
                           <th>No</th>
                           <th>NIK</th>
                               <th>Nama</th>
                           <th>Dept</th>
                           <th>Tgl Update</th>S
                            <th>Tools</th>

                       </tr>
                   </thead>
                   <tbody>
                       <?php
                        $no = 1;
                        foreach ($user as $usr) :
                        ?>
                           <tr>
                               <td><?= $no++; ?></td>
                               <td><?= $usr->username; ?></td>
                               <td><?= $usr->fullname; ?></td>
                               <td><?= $usr->id_dept; ?></td>
                               <td><?= $usr->updt_dt; ?></td>
                               <td width="250">
                                   <!--<a href="<?php echo base_url('admin/user/edit/' . $usr->user_id) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>-->
                                   <button onclick="editConfirm('<?php echo site_url('admin/user/edit/' . $usr->user_id) ?>')" href="#!" class="btn btn-small text-primary"><i class="fas fa-edit"></i> Edit</button>
                                   <a onclick="deleteConfirm('<?php echo site_url('admin/user/delete/' . $usr->user_id) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                               </td>
                           </tr>
                       <?php endforeach ?>


                   </tbody>

               </table>
           </div>
           <!-- /.card-body -->
       </div>
       <!-- /.card -->
       </div>
       <!-- /.col -->
       </div>
       <!-- /.row -->
       </div>
       <!-- /.container-fluid -->
       </section>

       </div>

       <!--<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 id="myModalLabel">Data Siswa</h4>
                    </div>
                    <div class="modal-body">
                        <form name="f_user" id="f_user" onsubmit="return m_user_s();">
                            <input type="hidden" name="id" id="id" value="0">
                            <table class="table table-form">
                                <tr>
                                    <td style="width: 25%">Nama</td>
                                    <td style="width: 75%"><input type="text" class="form-control" name="nama" id="nama" required></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">NIM</td>
                                    <td style="width: 75%"><input type="text" class="form-control" name="nim" id="nim" required></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Jurusan</td>
                                    <td style="width: 75%"><input type="text" class="form-control" name="jurusan" id="jurusan" required></td>
                                </tr>
                            </table>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Simpan</button>
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>-->

       <!-- Edit Modal-->
       <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                       <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">×</span>
                       </button>
                   </div>
                   <div class="modal-body">



                   </div>
                   <div class="modal-footer">
                       <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                       <a id="btn-edit" class="btn btn-primary" href="#">Update</a>
                   </div>
               </div>
           </div>
       </div>

       <script>
           function deleteConfirm(url) {
               $('#btn-delete').attr('href', url);
               $('#deleteModal').modal();
           }
       </script>

       <script>
           function editConfirm(url) {
               $('#btn-edit').attr('href', url);
               $('#editModal').modal();
           }
       </script>