<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->fullname;
$today = date("Y-m-d H:i:s");


$uri2 = $this->uri->segment('2');
$uri3 = $this->uri->segment('3');
$uri4 = $this->uri->segment('4');


?>
<style>
    td{
        padding: 5px;
    }
</style>
<div class="container">
    <BR />
    <table border="1" WIDTH="100%">
        <tr>
            <td>
                <p>PT. MUSTAM KARYA MANDIRI</p>
                <BR />
                <CENTER>
                    <H2><U><B>PERMOHONAN PEMBELIAN BARANG</U></B></H2>
                </CENTER>

                <table border="1" width="60%" style="float:left;margin:10px;">
                    <?php foreach ($detailppb as $row) { ?>
                        <tr>
                            <td>Bagian yang meminta</td>
                            <td><?= $row->ppb_section_id ?></td>
                        </tr>
                        <tr>
                            <td>Person in Charge</td>
                            <td><?= $row->ppb_request_by ?></td>
                        </tr>
                        <tr>
                            <td>Bagian yang meminta</td>
                            <td><?= $row->ppb_request_dt ?></td>
                        </tr>
                        <tr>
                            <td>Bagian yang meminta</td>
                            <td><?= $row->ppb_doc_no ?></td>
                        </tr>


                </table>

                <table border="1" width="30%" style="float:right;margin:10px;">

                    <tr>
                        <td>SO no.</td>
                        <td><?= $row->ppb_so_number ?></td>
                    </tr>
                    <tr>
                        <td>Customer</td>
                        <td><?= $row->ppb_customer_cd ?></td>
                    </tr>
                    <tr>
                        <td>PO No.</td>
                        <td><?= $row->ppb_po_number ?></td>
                    </tr>

                <?php }
                ?>

                </table>

            </td>
        </tr>
        <tr>
            <td>
                <table width="" border="1" style="margin:10px;width:98.3%">
                    <tr>
                        <td rowspan="2" align="center">No</td>
                        <td rowspan="2">Nama Barang</td>
                        <td rowspan="2">Code</td>
                        <td rowspan="2" align="center">Jumlah</td>
                        <td colspan="2" align="center">Harga</td>
                        <td rowspan="2">Tanggal Diminta</td>
                    </tr>
                    <tr>
                        <td>ٍSatuan</td>
                        <td>Total</td>

                    </tr>
                    <?php
                    $no = 1;
                    foreach ($detailpartppb as $row) { ?>
                        <tr>
                            <td align="center"><?= $no++ ?></td>
                            <td><?= $row->ppb_part_name ?></td>
                            <td><?= $row->ppb_part_cd ?></td>
                            <td align="center"><?= $row->ppb_qty ?></td>
                            <td><?= $row->ppb_price ?></td>
                            <td><?= $row->ppb_qty * $row->ppb_price ?></td>
                            <td><?= $row->ppb_incoming_dt ?></td>

                        </tr>
                    <?php } ?>
                </table>
              
                <p style="margin:10px;">Note / Komentar Pimpinan :</p>
                <hr style="margin:30px 10px;">
                <hr style="margin:30px 10px;;">
                <hr style="margin:30px 10px;;">

                <table border="1" width="100%" style="margin:10px;width:98.3%">
                    <tr>
                        <td rowspan="2" width="30%">
                            <table width="100%" >
                                <tr>
                                    <td width="40%">Document Arsip</td>
                                    <td>:</td>
                                </tr>
                                <tr>
                                    <td>Hijau</td>
                                    <td>:</td>
                                </tr>
                                <tr>
                                    <td>Kuning</td>
                                    <td>:</td>
                                </tr>
                                <tr>
                                    <td>Merah</td>
                                    <td>:</td>
                                </tr>
                            </table>
                        </td>
                        <td style="text-align: center;width:10%">Approved by</td>
                        <td style="text-align: center;width:10%">Finance</td>
                        <td style="text-align: center;width:10%">Checked By</td>
                        <td style="text-align: center;width:10%">Request By</td>
                    </tr>
                    <tr>
                        <!-- <td width="30%"></td> -->
                        <td><br/><br/><br/><br/></td>
                        <td><br/><br/><br/><br/></td>
                        <td><br/><br/><br/><br/></td>
                        <td><br/><br/><br/><br/></td>
                    </tr>
                </table>
                <p style="float:right;margin-right:10px">FM-PR-04</p>

            </td>
        </tr>
    </table>




</div>
</div>



</div>