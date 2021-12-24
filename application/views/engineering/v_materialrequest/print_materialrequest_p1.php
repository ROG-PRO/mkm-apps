<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->fullname;
$today = date("Y-m-d H:i:s");


$uri2 = $this->uri->segment('2');
$uri3 = $this->uri->segment('3');
$uri4 = $this->uri->segment('4');


?>
<div class="container">
 
    <BR />

    <table width="100%" border="1">
        <tr>
            <td width="20%" rowspan="4"><img src="<?= base_url("images/logomkm2.jpg") ?>" width="200"></td>
            <td rowspan="4">
                <CENTER>
                    <h1> P.T. MUSTAM KARYA MANDIRI</h1>

                    <H4>(MACHINING & CONSTRUCTION)</H4>

                </CENTER>
            </td>
            <td style="padding-left: 5px;">Doc No.</td>
            <td style="padding-left: 5px;">FM-ENG-09</td>

        </tr>
        <tr>

            <td style="padding-left: 5px;">Date</td>
            <td style="padding-left: 5px;">15-DES-2019</td>
        </tr>
        <tr>

            <td style="padding-left: 5px;">Revisi</td>
            <td style="padding-left: 5px;">1</td>
        </tr>
        <tr>

            <td style="padding-left: 5px;">Page</td>
            <td style="padding-left: 5px;">1 of 1</td>
        </tr>

    </table>
    <table class="" width="100%" border="1">
        <tr>
            <td colspan="2">
                <CENTER>
                    <u>
                        <h3>MATERIAL REQUEST (MR)</h3>
                    </u>
                </CENTER>
            </td>
            <td rowspan="4" width="20%">
                <u><b>
                    <p style="margin-left:5px;margin-bottom:0px;font-size: 10PX;">KODE JENIS MATERIAL</p>
                </b></u>

                <table border='0' style="margin:5px;font-size:10px;">
                    <?php foreach ($datamtltype as $row) { ?>
                        <tr>
                            <td><?= $row['mtl_type_cd'] ?></td>
                            <td>=</td>
                            <td><?= $row['mtl_type_desc'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </td>
        </tr>
        <?php foreach ($detailmr as $row) { ?>
            <tr>
                <td width="6%" style="padding-left: 5px;">SO No. </td>
                <td width="40%" style="padding-left: 5px;">: <?= $row->so_number ?></td>


            </tr>
            <tr>
                <td width="10%" style="padding-left: 5px;">Date</td>
                <td width="20%" style="padding-left: 5px;">: <?= $row->mr_dt ?></td>


            </tr>
            <tr>
                <td width="10%" style="padding-left: 5px;">Page</td>
                <td width="20%" style="padding-left: 5px;">: </td>


            </tr>
        <?php } ?>
    </table>

    <table width="100%" border="1">


        <thead>
            <tr>
                
                <th colspan="7" style="text-align: left;">A. RAW MATERIAL</th>
            </tr>
            <tr>
                <th style="text-align: center;">No</th>
                <th style="padding: 5px;">Item</th>
                <th style="padding: 5px;">Part no</th>
                <th style="text-align: center;">Qty</th>
                <th style="padding: 5px;">Supplier reference</th>
                <th style="padding: 5px;">SOA</th>
                <th style="padding: 5px;text-align:center;" width="10%">Kode Jenis Material</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            foreach ($detailpartmr_mtl as $row) :
                ?>
                <tr>
                    <td align="center" width="5%"><?= $no++ ?></td>
                    <td style="padding: 5px;" width="20%"><?= $row->mr_item ?></td>
                    <td style="padding: 5px;" width="20%"><?= $row->mr_rmpartno ?></td>
                    <td align="center" width="5%"><?= $row->mr_qty ?></td>
                    <td style="padding: 5px;" width="20%"><?= $row->mr_supplier ?></td>
                    <td style="padding: 5px;"><?= $row->mr_soa ?></td>
                    <td style="padding: 5px;text-align:center;" width="10%"><?= $row->mtl_type_cd ?></td>


                </tr>
            <?php endforeach ?>
        </tbody>
    </table><table width="100%" border="1">


        <thead>
            <tr>
                
                <th colspan="7" style="text-align: left;">B. TOOLS</th>
            </tr>
            <!-- <tr>
                <th style="text-align: center;">No</th>
                <th style="padding: 5px;">Item</th>
                <th style="text-align: center;">Qty</th>
                <th style="padding: 5px;">Supplier reference</th>
                <th style="padding: 5px;">SOA</th>
                <th style="padding: 5px;text-align:center;" width="11%">Kode Jenis Material</th>
            </tr> -->
        </thead>

        <tbody>
            <?php
            $no = 1;
            foreach ($detailpartmr_tls as $row) :
                ?>
                <tr>
                    <td align="center" width="5%"><?= $no++ ?></td>
                    <td style="padding: 5px;" width="20%"><?= $row->mr_item ?></td>
                    <td style="padding: 5px;" width="20%"><?= $row->mr_rmpartno ?></td>
                    <td align="center" width="5%"><?= $row->mr_qty ?></td>
                    <td style="padding: 5px;" width="20%"><?= $row->mr_supplier ?></td>
                    <td style="padding: 5px;"><?= $row->mr_soa ?></td>
                    <td style="padding: 5px;text-align:center;" width="10%"><?= $row->mtl_type_cd ?></td>


                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <table border="1" width="100%">
        <tr>
            <td>
                FM-ENG-09
                <table width="30%" border="1" align="RIGHT" style="margin:5px;">
                    <tr>
                        <td align="center">Approved</td>
                        <td align="center">Checked</td>
                        <td align="center">Prepared</td>

                    </tr>
                    <tr>
                        <td>
                            <br />
                            <br />
                            <br />
                        </td>
                        <td>
                            <br />
                            <br />
                            <br />
                        </td>
                        <td>
                            <br />
                            <br />
                            <br />
                        </td>
                    </tr>


                </table>

            </td>

        </tr>


    </table>

    <br />
    <br />

</div>

<script type="text/javascript">
    window.addEventListener("load", window.print());
</script>