            <script>
              $(document).ready(function() {
                $("#hide").click(function() {
                  $("button").hide();
                });
                $("#show").click(function() {
                  $("p").show();
                });
              });
            </script>
            <?php
            date_default_timezone_set('Asia/Jakarta');
            $user = $this->session->userdata('user_logged')->fullname;
            $today = date("Y-m-d H:i:s");


            $uri2 = $this->uri->segment('2');
            $uri3 = $this->uri->segment('3');
            $uri4 = $this->uri->segment('4');


            ?>
            <div class="container">
              <br />
              <h2>PRINT DRAWING

                <a class="btn btn-sm btn-danger" style="float:right" href="<?= base_url('marketing/quotation/print_quotation/' . $uri4 . ' ') ?>">X</a>
              </h2>
              <!-- <img scr="<?= base_url('drawing/' . $row->inq_drawing . ' '); ?>"> -->
              <!--   <img scr="<?= base_url('drawing/' . $row->inq_drawing_rev1 . ' '); ?>">
                <img scr="<?= base_url('drawing/' . $row->inq_drawing_rev2 . ' '); ?>">
                <img scr="<?= base_url('drawing/' . $row->inq_drawing_rev3 . ' '); ?>"> -->
              <table class="table table-sm">
                <tr>
                  <th>Part No.</th>
                  <th>Drawing Rev0</th>
                  <th>Drawing Rev1</th>
                  <th>Drawing Rev2</th>
                  <th>Drawing Rev3</th>

                </tr>

                <?php foreach ($detailpartinquiry as $row) { ?>
                  <tr>
                    <td><?= $row->inq_part_no ?></td>
                    <td><a href="<?= base_url('drawing/' . $row->inq_drawing . '') ?>" target='_blank'> <?= $row->inq_drawing ?> </a></td>
                    <td><a href="<?= base_url('drawing/' . $row->inq_drawing_rev1 . '') ?>" target='_blank'> <?= $row->inq_drawing_rev1 ?> </a></td>
                    <td><a href="<?= base_url('drawing/' . $row->inq_drawing_rev2 . '') ?>" target='_blank'> <?= $row->inq_drawing_rev2 ?> </a></td>
                    <td><a href="<?= base_url('drawing/' . $row->inq_drawing_rev3 . '') ?>" target='_blank'> <?= $row->inq_drawing_rev3 ?> </a></td>

                  </tr>
                <?php } ?>

              </table>
              <small>Click item part untuk print</small>
            </div>



            <br />
            <!-- <script type="text/javascript">
            window.addEventListener("load", window.print());
          </script> -->