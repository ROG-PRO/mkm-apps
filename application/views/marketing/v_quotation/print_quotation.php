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
            <style>
                body {
                    -webkit-print-color-adjust: exact;
                }
            </style>
            </head>

            <?php
            date_default_timezone_set('Asia/Jakarta');
            $user = $this->session->userdata('user_logged')->fullname;
            $today = date("Y-m-d H:i:s");


            $uri2 = $this->uri->segment('2');
            $uri3 = $this->uri->segment('3');
            $uri4 = $this->uri->segment('4');


            ?>

            <body>

                <div class="container">
                    <br />
                    <!-- <a href="<?= base_url('marketing/quotation/print_quotation_p/' . $uri4 . ' ') ?>" id="hide" class="btn btn-default btn-sm">
                        <i class="fas fa-print"></i> Print Quot
                    </a> -->
                    <?php if ($detailinquiry['q_approved_sts'] == '0') { ?>
                        <button type="button" onclick="return confirm('Print failed, Quotation not approved !')" class="btn btn-sm btn-default"><i class="fas fa-print"></i> Print</button>

                    <?php } else { ?>

                        <button type="button" onclick="printDiv('printableArea')" class="btn btn-sm btn-default"><i class="fas fa-print"></i> <a href="<?= base_url('marketing/quotation/update_qPrintSts/' . $detailinquiry['id_inquiry'] . '') ?>">Print</a></button>
                    <?php } ?>


                    <a href="<?= base_url('marketing/quotation/print_quotation_d/' . $uri4 . ' ') ?>" id="hide" class="btn btn-default btn-sm">
                        <i class="fas fa-paperclip"></i> Print Details
                    </a>
                    <a href="<?= base_url('marketing/quotation/print_drawing/' . $uri4 . ' ') ?>" id="hide" class="btn btn-default btn-sm">
                        <i class="fas fa-paperclip"></i> Drawing
                    </a>
                    <a style="float:right" href="<?= base_url('marketing/quotation/quotation_detail/' . $uri4 . ' ') ?>" id="hide" class="btn btn-danger btn-sm">
                        X
                    </a>

                    <hr>
                    <div id="printableArea">


                        <table width="100%" border="0">
                            <tr>
                                <td width="20%" rowspan="2"><img src="<?= base_url("images/mkm_logo.jpg") ?>" width="200" height="150"></td>
                                <td colspan="2">
                                    <CENTER>
                                        <h1 style="font-family: 'Times New Roman', Times, serif;font-size:50px;color:darkblue"> P.T. MUSTAM KARYA MANDIRI</h1>
                                        <H4>(MACHINING & FABRICATION)</H4>
                                    </CENTER>

                                </td>
                                <!-- <td>test</td> -->
                            </tr>
                            <tr>
                                <!-- <td>test</td> -->
                                <td align="left" style="padding-left: 70px;;">

                                    <p style="font-size:17px">Jl. Cibeureum-Setu No. 1B Setu, Bekasi, Jawa Barat, Indonesia <br />
                                        Phone : +62-21-2909-0457 Fax. : +61-21-2909-0458</p>


                                </td>
                                <td width="20%"><img src="<?= base_url("images/logo_iso_KAN.jpg") ?>" width="100%"></td>

                            </tr>
                            <tr>
                                <td colspan="3">
                                    <hr style="border: solid black 1px;">
                                </td>
                                <!-- <td>test</td> -->

                            </tr>

                            <tr>
                                <td colspan="3" style="background-color:skyblue;text-align:justify">
                                    <CENTER>
                                        <font style="font-size: 25px;">QUOTATION</font>
                                    </CENTER>
                                </td>
                                <!-- <td>test</td> -->

                            </tr>
                        </table>
                        <table class="table table-sm" width="100%" border="0">
                            <tr>
                                <td width="6%">TO </td>
                                <td width="40%">: <?= $detailinquiry['customer_nm'] ?></td>
                                <td width="10%">Subject</td>
                                <td width="20%">: <?= $detailinquiry['subject'] ?></td>
                            </tr>
                            <tr>
                                <td width="6%" rowspan="2">Address</td>
                                <td width="40%" rowspan="2">: <?= $detailinquiry['customer_address'] ?></td>
                                <td width="10%">Date</td>
                                <td width="20%">: <?= $today ?> </td>
                            </tr>
                            <tr>
                                <!-- <td width="6%"> </td> -->
                                <!-- <td width="40%"></td> -->
                                <td width="10%">Your Rf</td>
                                <td width="20%">: <?= $detailinquiry['cust_reff'] ?></td>
                            </tr>
                            <tr>
                                <td width="6%">Attention</td>
                                <td width="40%">: <?= $detailinquiry['attention'] ?></td>
                                <td width="10%">Our Rf</td>
                                <td width="20%">: <?= $uri4 ?></td>
                            </tr>
                            <tr>
                                <td width="6%"> </td>
                                <td width="40%"></td>
                                <td width="10%">Job</td>
                                <td width="20%">: <?= $detailinquiry['job'] ?></td>
                            </tr>
                            <tr>
                                <td width="6%">Telp no.</td>
                                <td width="40%">: <?= $detailinquiry['no_telp'] ?></td>
                                <td width="10%">Rev</td>
                                <td width="20%">:</td>

                            </tr>
                            <tr>
                                <td width="6%">Fax No.</td>
                                <td width="40%">: <?= $detailinquiry['no_fax'] ?></td>
                                <td width="10%"></td>
                                <td width="20%"></td>

                            </tr>
                        </table>
                        <br />

                        <p><b>Dear sirs, </b></p>
                        <p>With referring to inquiry that you inform us,<br />
                            herewith we would like to quote our best price as following table
                        </p>
                        <br />
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
                                    <th rowspan="2">NO</th>
                                    <th colspan="2">DESCRIPTION</th>
                                    <th rowspan="2">QTY</th>
                                    <th rowspan="2">UNIT</th>
                                    <th rowspan="2">PRICR [IDR]</th>
                                    <th width="20%" rowspan="2">TOTAL PRICE [IDR]</th>
                                </tr>
                                <tr>

                                    <th>PART NAME</th>
                                    <th>PART NO</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td colspan="6" align=" right">
                                        <label style="vertical-align: center;float:left">NOTE : <?= $detailinquiry['q_note'] ?></label>
                                        <label style="vertical-align: center;">Grand Total</label>
                                    </td>
                                    <td align="right" width="15%">

                                        <input style="text-align: right;" class="form-control form-control-sm" value="<?= 'Rp. ' . number_format(($tot_quot_price), 0, ',', '.'); ?> " disabled>

                                    </td>




                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <?php
                                    $no = 1;
                                    foreach ($detailpartinquiry as $row) :
                                    ?>
                                        <td align="center"><?= $no++ ?></td>
                                        <td><?= $row->inq_part_nm ?></td>
                                        <td><?= $row->inq_part_no ?></td>
                                        <td><?= $row->inq_qty ?></td>
                                        <td><?= $row->inq_nm_unit ?></td>
                                        <!-- <td><?= $detailpartinquiry['quotation_price'] ?></td> -->
                                        <td align="RIGHT"><?php
                                                            // $qty =  $detailpartinquiry['qty'];
                                                            $mtl_price = $row->cost_mtl;
                                                            $process_price = $row->cost_process;
                                                            $total = $row->quot_price;
                                                            echo 'Rp. ' . number_format(($total), 0, ',', '.');
                                                            ?></td>
                                        <td align="right" style="padding-right: 30px;"><?= 'Rp. ' . number_format(($row->inq_qty * $total), 0, ',', '.'); ?></td>

                                </tr>
                            </tbody>
                        <?php endforeach ?>
                        </table>
                        <br />
                        <br />

                        <table class="mkm-table2" width="100%" border="0">
                            <tr>
                                <td width="15%">Validity Price</td>
                                <td>: <?= $detailinquiry['validity_price'] ?></td>
                            </tr>
                            <tr>
                                <td width="10%">Excluded</td>
                                <td>: <?= $detailinquiry['excluded'] ?></td>
                            </tr>
                            <tr>
                                <td width="10%">Payment Term</td>
                                <td>: <?= $detailinquiry['payment_term'] ?></td>
                            </tr>
                            <tr>
                                <td width="10%">Working Schedule</td>
                                <td>: <?= $detailinquiry['working_schedule'] ?></td>
                            </tr>
                        </table>

                        <br />

                        <p>Hope this quotation will match to your requirement,<br />
                            please don't hesitate to call us if you have any question. Thanks for your kind cooperation.

                        </p>
                        <br />
                        <table border="0" width="100%">
                            <tr>
                                <td valign="top" width="20%">
                                    <p><b>Sincerely yours,</b></p>

                                </td>


                                <td width="55%" rowspan="3" valign="top">
                                    <table class="mkm-table" width="55%" border="1" align="RIGHT">
                                        <tr>
                                            <td width="25%" colspan="2" align=" center">
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
                            <tr>
                                <td width="30%">
                                    <img src="<?= base_url('images/ttn-' . $detailinquiry['q_approved_by'] . '.jpg') ?>" width="70%">

                                </td>



                            </tr>
                            <tr>
                                <td valign="top" width="20%">
                                    <!-- <p><?= $user ?></p> -->
                                    <p><b><u><?= $detailinquiry['q_approved_by'] ?></u></b> <br />
                                        <?= $detailinquiry['q_approved_phone'] ?></p>
                                    <p>cc : Agus Suryono <br />
                                        Mobile Ph. +62-811-874 003</p>

                                </td>



                            </tr>
                        </table>



                    </div>
                </div>
            </body>
            <script type="text/javascript">
                // window.addEventListener("load", window.print());
                function printDiv(divName) {
                    var printContents = document.getElementById(divName).innerHTML;
                    var originalContents = document.body.innerHTML;

                    document.body.innerHTML = printContents;

                    window.print();

                    document.body.innerHTML = originalContents;
                }
            </script>