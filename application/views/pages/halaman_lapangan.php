
    <style type="text/css">
        span.stars, span.stars>* {
            display: inline-block;
            background: url(http://i.imgur.com/YsyS5y8.png) 0 -16px repeat-x;
            width: 80px;
            height: 16px;
        }
        span.stars>*{
            max-width:80px;
            background-position: 0 0;
        }
        #table_lapangan_filter{
            display: none;
        }

        #table_lapangan > thead > tr > th {
            display : none;
        }
    </style>

    <?php
            foreach ($data_lapangan as $key => $value) {
                $picture = $value['picture'];
                $id = $value['id'];
                $nama = $value['nama'];
                $rating = $value['rating'];
                $deskripsi = $value['deskripsi'];
                $daerah = $value['daerah'];
                $lat = $value['lat'];
                $long = $value['long'];

            }
    ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9H1cu59k8p6nujTZTl3ZI4fy3No0TSIc&sensor=false" type="text/javascript"></script>
    
    <!-- lat long -->
    
    <input type="hidden" id="txt_lat" value="<?php echo $lat; ?>">
    <input type="hidden" id="txt_long" value="<?php echo $long; ?>">
    <input type="hidden" id="txt_nama" value="<?php echo $nama; ?>">

    <div class="container-fluid" style="width: 80%;">

        <br>
        <div class="row">
            <div class="col-lg-12">
                    <div class="ibox product-detail animated fadeInDown">
                        <div class="ibox-content">

                            <div class="row">
                                <div class="col-md-8">


                                    <div class="product-images">

                                        <div>
                                            <div class="image-imitation" style="background: url(<?php echo base_url().$picture; ?>) no-repeat center;background-size: cover;">
                                                
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <div class="col-md-4">

                                    <h2 class="font-bold m-b-xs">
                                        <?php echo ucfirst($nama); ?>
                                    </h2>
                                    <small><span class="glyphicon glyphicon-map-marker"></span><?php echo $daerah; ?></small>
                                    <div style="margin-top: 10px;"> 
                                        <span class="stars"><?php echo $rating; ?></span>
                                    </div>
                                    <hr>

                                    <h4><?php echo $deskripsi; ?></h4>
                                    <hr>
                                    

                                    <div>
                                        <div class="btn-group">
                                            <a href="#tipe_lapangan"><button class="btn btn-primary btn-lg">Lihat Lapangan</button></a> 
                                        </div>
                                    </div>



                                </div>
                                <div id="map" class="col-lg-12" style="height: 300px;"></div>
                            </div>
                            
                        </div>
                         

                        
                       
                    </div>

                </div>
        </div>
    
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="widget style1 navy-bg">
                        <div class="row vertical-align">
                            <div class="col-lg-12 text-left">
                                <h4 class="font-bold">Lapangan tersedia pada tanggal <?php echo $tanggal.' jam '.substr_replace($jam, ':', 2, 0).' wib'; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-group" id="tipe_lapangan">
            <?php
            $i = 0;
            foreach ($data_tipe_lapangan as $key => $value) { $i++;?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-lg-10">
                                <h3 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $i; ?>"><h3><?php echo ucfirst($value['nama_tipe']); ?></h3></a>
                                    <p><?php echo $value['deskripsi']; ?></p>
                                </h3>
                            </div>
                            <div class="col-lg-2">
                                <div class="row">
                                      <h3 style="color: #F77825;">
                                          Rp. <?php echo number_format($value['tarif']); ?>
                                      </h3>
                                      <div class="btn-group">
                                            <?php if ($value['status'] == 0){ ?>
                                                <a href="<?php echo base_url().'c_booking/booking_lapangan/'.$value['id_tipe'].'/'.$jam.'/'.$tanggal; ?>"><button class="btn btn-primary btn-md">Booking Lapangan</button></a> 
                                            <?php }else{ ?>
                                                <button class="btn btn-primary btn-md" disabled>Sudah Terbooking</button>
                                            <?php } ?>
                                        </div>                                  
                                </div>
                            </div>
                        </div>
                        <!-- <h3 class="panel-title">
                            
                        </h3> -->
                    </div>
                    <div id="<?php echo $i; ?>" class="panel-collapse collapse">
                        <div class="panel-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
       
    <script type="text/javascript">
        $.fn.stars = function() {
            return this.each(function(i,e){$(e).html($('<span/>').width($(e).text()*16));});
        };

        $(document).ready(function(){


            $('.product-images').slick({
                dots: true
            });

        });

        generates_table_lapangan();
        $('.stars').stars();

        function generates_table_lapangan(sort='')
        {
                
                daerah = $('#txt_daerah').val();
                tanggal = $('#txt_tanggal').val();
                jam = $('#txt_jam').val();
                durasi = $('#txt_durasi').val();

                
                var table= $('#table_lapangan').DataTable({ 
                   "bLengthChange": false,
                  "bDestroy": true,
                    "bFilter": true,
                    "bProcessing": true,
                    "serverSide": true,
                       "columns": [
                      { "data": "harga_mulai.first" }
                      ],
                      "columnDefs": [
                        {
                        "render": function ( data, type, row ) {
                          var value = '<div class="ibox"><div class="ibox-content animated fadeInDown"><div class="row"><div class="col-lg-3"><div class="product-photo" style="width: 140px;height: 150px;background: url(../'+row.picture.first+') center no-repeat;background-size:cover; "></div></div><div class="col-lg-5"><h3>'+row.nama.first+'</h3><div> <a href="" style="font-size: 8pt;margin-bottom: 20px;"><span class="glyphicon glyphicon-map-marker"></span>'+row.daerah.first+'</a></div><div style="margin-top: 9px;"> <span class="stars">'+row.rating.first+'</span></div></div><div class="col-lg-4" > <span> mulai dari </span><h2 class="font-bold" style="color: #F77825;">Rp. '+addCommas(row.harga_mulai.first)+'<small style="color: #36BBA6;"><b>/jam</b></small></h2> <br> <a href="<?php echo base_url() ?>c_booking/view_lapangan/'+row.id.first+'"><div class="btn btn-sm btn-primary m-t-n-xs"><strong>Lihat Lapangan</strong></div></a></div></div></div></div>';
                            
                        return value;
                        },
                        "targets": 0
                        }
                        ],
                        "order": [[ 0, "desc" ]],    
                 "ajax":{
                    url :"<?php echo base_url()?>c_booking/load_lapangan", // json datasource
                    type: "post",
                    data: {"daerah":daerah, "tanggal" :tanggal, "jam":jam, "durasi":durasi, "sort":sort},
                    complete: function() {
                        $('.stars').stars();
                    },  // type of method  , by default would be get
                    error: function(){  // error handling code

                      $("#table_lapangan").css("display","none");
                    }
                  }
                });

                $('#top-search').keyup(function(){
                    table.search($(this).val()).draw() ;
                })
                
              
        }

        function harga_tertinggi()
        {
            generates_table_lapangan('tinggi');
            $('.stars').stars();
        }

        function harga_terendah()
        {
            generates_table_lapangan('');
            $('.stars').stars();
        }

        function rating()
        {
            generates_table_lapangan('rating');
            $('.stars').stars();
        }

        //map location

        lat = $('#txt_lat').val();
        long = $('#txt_long').val();
        nama = $('#txt_nama').val();

        var myOptions = {
              zoom: 18,
                scaleControl: true,
              center:  new google.maps.LatLng(lat,long),
              mapTypeId: google.maps.MapTypeId.ROADMAP
            };

         
            var map = new google.maps.Map(document.getElementById("map"),
                myOptions);

         var marker1 = new google.maps.Marker({
         position : new google.maps.LatLng(lat,long),
         title : nama,
         map : map,
         draggable : true
         });

    </script>

