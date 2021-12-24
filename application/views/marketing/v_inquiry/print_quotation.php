<?php
date_default_timezone_set('Asia/Jakarta');
$user = $this->session->userdata('user_logged')->fullname;
$today = date("Y-m-d H:i:s");


$uri2 = $this->uri->segment('2');
$uri3 = $this->uri->segment('3');
$uri4 = $this->uri->segment('4');


?>
<div class="container">
    <br/>
    <table width="100%" border="0">
        <tr>
            <td width="20%"><img src="<?= base_url("images/logomkm2.jpg") ?>" width="200"></td>
            <td>
                <CENTER>
                    <h1> P.T. MUSTAM KARYA MANDIRI</h1>

                    <H4>(MACHINING & FABRICATION)</H4>

                </CENTER>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr style="border: solid black 1px;">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <CENTER>
                    <h1>QUOTATION</h1>
                </CENTER>
            </td>
        </tr>
    </table>
    <table class="table table-sm" width="100%" border="0">
        <tr>
            <td width="6%">TO </td>
            <td width="40%">: <?= $detailinquiry['customer_contact']?></td>
            <td width="10%">Subject</td>
            <td width="20%">: <?= $detailinquiry['subject']?></td>
        </tr>
        <tr>
            <td width="6%"> </td>
            <td width="40%"></td>
            <td width="10%">Date</td>
            <td width="20%">: <?= $today ?> </td>
        </tr>
        <tr>
            <td width="6%"> </td>
            <td width="40%"></td>
            <td width="10%">Your Rf</td>
            <td width="20%">: <?= $detailinquiry['cust_reff']?></td>
        </tr>
        <tr>
            <td width="6%">Attention</td>
            <td width="40%">: <?= $detailinquiry['attention']?></td>
            <td width="10%">Our Rf</td>
            <td width="20%">: <?= $uri4 ?></td>
        </tr>
        <tr>
            <td width="6%"> </td>
            <td width="40%"></td>
            <td width="10%">Job</td>
            <td width="20%">: <?= $detailinquiry['job']?></td>
        </tr>
        <tr>
            <td width="6%">Telp no.</td>
            <td width="40%">: <?= $detailinquiry['no_telp']?></td>
            <td width="10%"></td>
            <td width="20%">:</td>

        </tr>
        <tr>
            <td width="6%">Fax No.</td>
            <td width="40%">: <?= $detailinquiry['no_fax']?></td>
            <td width="10%"></td>
            <td width="20%">:</td>

        </tr>
    </table>
    <br />
    <br/>
    <p><b>Dear sirs, </b></p>
    <p>With referring to inquiry that you inform us,<br/>
        herewith we would like to quote our best price as following table
    </p>
    <br/>
    <table class="mkm-table" width="100%" border="0">

       <!-- <tr>
            <th style="background-color: lightslategray;color:lightyellow">No</th>
            <th style="background-color: lightslategray;color:lightyellow">Cost Description</th>
            <th style="background-color: lightslategray;color:lightyellow">Quantity</th>
            <th style="background-color: lightslategray;color:lightyellow">>Unit</th>
            <th style="background-color: lightslategray;color:lightyellow">Price per unit</th>
            <th style="background-color: lightslategray;color:lightyellow">Total Cost</th>
        </tr>-->
        <thead>
            <tr>
                <th>No</th>
                <th>Cost Description</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Price per unit</th>
                <th>Total Cost</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="5" align="right">
                    <label style="vertical-align: center;">Grand Total</label>
                </td>
                <td align="right" width="15%">
                    <input style="text-align: right;" class="form-control form-control-sm" value="<?= 'Rp. '.number_format(($gtotal_amount),0,',','.'); ?> " disabled>
                    <!-- <span id="" class=" text-success"><?= $amountmtl ?></span> -->
                </td>
                



            </tr>
        </tfoot>
        <tbody>
            <tr>
               <?php
               $no = 1;
               foreach ($detailpartinquiry as $row) :
                ?>
                <td align="center"><?= $no ++ ?></td>
                <td><?= $row->inq_part_no ?></td>
                <td><?= $row->inq_qty ?></td>
                <td><?= $row->inq_nm_unit ?></td>
                <!-- <td><?= $detailpartinquiry['quotation_price']?></td> -->
                <td align="RIGHT"><?php 
            // $qty =  $detailpartinquiry['qty'];
                $mtl_price = $row->cost_mtl;
                $process_price = $row->cost_process;
                $total = $mtl_price + $process_price ;
                echo 'Rp. '.number_format(($total),0,',','.');
                ?></td>
                <td align="right" style="padding-right: 30px;"><?= 'Rp. '.number_format(($row->inq_qty * $total),0,',','.'); ?></td>

            </tr>
        </tbody>
    <?php endforeach ?>
</table>
<br />
<br />

<table class="mkm-table2" width="100%" border="0">
    <tr>
        <td width="15%">Validity Price</td>
        <td>: <?= $detailinquiry['validity_price']?></td>
    </tr>
    <tr>
        <td width="10%">Excluded</td>
        <td>: <?= $detailinquiry['excluded']?></td>
    </tr>
    <tr>
        <td width="10%">Payment Term</td>
        <td>: <?= $detailinquiry['payment_term']?></td>
    </tr>
    <tr>
        <td width="10%">Working Schedule</td>
        <td>: <?= $detailinquiry['working_schedule']?></td>
    </tr>
</table>

<br />

<p>Hope this quotation will match to your requirement,<br/>
    please don't hesitate to call us if you have any question. Thanks for your kind cooperation.

</p>
<br />
<table border="0">
    <tr>
        <td valign="top" width="20%">
        <p><b>Sincerely yours,</b></p>
        <br />
        <br />


        <p><?= $user ?></p>
        </td>
    
    
        <td width="55%">
            <table class="mkm-table" width="25%" border="1" align="RIGHT">
                <tr>
                    <td width="10%" colspan="2" align=" center">
                        <h5>CUSTOMER APPROVAL</h5>
                    </td>

                </tr>
                <tr>
                    <td><BR /><br />&nbsp;<br />&nbsp;</td>
                    <td><BR /><br />&nbsp;<br />&nbsp;</td>
                </tr>

            </table>

        </td>
    </tr>
</table>




<hr>
<button class="btn btn-default btn-sm" onclick="print()">
    <i class="fas fa-print"></i> Print
</button>
</div>

<br/>

<script type="text/javascript">
    window.print();

</script>

