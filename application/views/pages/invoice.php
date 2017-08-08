<?php  
    foreach ($data_tipe_lapangan as $key => $value) {

            $nama_tipe = $value['nama_tipe'];
            

        } ?>

<div class="container-fluid" style="width: 80%;">
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content p-xl">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5>From:</h5>
                            <address>
                                <strong>futsalyuk.com</strong><br>
                                Jl Hj. Nawi No 25<br>
                                Jakarta Selatan<br>
                                <abbr title="Phone">P:</abbr> +62 82216173617
                            </address>
                        </div>

                        <div class="col-sm-6 text-right">
                            <h4>Invoice No.</h4>
                            <h4 class="text-navy"><?php echo $kode_booking; ?></h4>
                            <span>To:</span>
                            
                            <p>
                                <span><strong>Invoice Date:</strong> <?php echo $invoice_date; ?></span><br/>
                                
                            </p>
                        </div>
                    </div>

                    <div class="table-responsive m-t">
                        <table class="table invoice-table">
                            <thead>
                            <tr>
                                <th>Item List</th>
                                <th>Booking Price</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><div><strong><?php echo ucfirst($nama_tipe); ?></strong></div>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small></td>    
                                <td>Rp. 50.000</td>
                                <td><?php echo $tanggal; ?></td>
                                <td><?php echo substr_replace($jam, ':', 2, 0).' wib'; ?></td>
                                <td>50.000</td>
                            </tr>
                            

                            </tbody>
                        </table>
                    </div><!-- /table-responsive -->

                    <table class="table invoice-total">
                        <tbody>
                        <tr>
                            <td><strong>Sub Total :</strong></td>
                            <td>Rp. 50.000</td>
                        </tr>
                        <tr>
                            <td><strong>TAX :</strong></td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td><strong>TOTAL :</strong></td>
                            <td>Rp. 50.000</td>
                        </tr>
                        </tbody>
                    </table>
                    

                    <div class="well m-t"><strong>Comments</strong>
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                    </div>
                </div>
        </div>
    </div>
</div>
</div>
