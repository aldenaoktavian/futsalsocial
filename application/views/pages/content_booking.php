
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

	<div class="container-fluid" style="width: 80%;">
		<input type="hidden" id="txt_daerah" value="<?php echo $daerah; ?>">
		<input type="hidden" id="txt_tanggal" value="<?php echo $tanggal; ?>">
		<input type="hidden" id="txt_jam" value="<?php echo $jam; ?>">
		<input type="hidden" id="txt_durasi" value="<?php echo $durasi; ?>">

		<br>
		<div class="row">
			<div class="col-lg-4">
				<div class="ibox animated fadeInLeftBig" >
                    <div class="ibox-content">
                    	Urutkan hasil pencarian lapangan <br>
                    	<div class="i-checks"><label> <input type="radio" value="option1" name="a" onclick="harga_tertinggi()"> <i></i> harga tertinggi </label></div>
                    	<div class="i-checks"><label> <input type="radio" checked="" value="option2" name="a" onclick="harga_terendah()"> <i></i> harga terendah </label></div>
                    	<div class="i-checks"><label> <input type="radio" value="option3" name="a" onclick="rating()"> <i></i> popularitas </label></div>
                    </div>
            	</div>
			</div>

			<div class="col-lg-8">
				<div class="ibox animated fadeInRightBig" >
					<div class="row">
	                	<div class="form-group">
		                    <input type="text" placeholder="Search lapangan ..." class="form-control" name="top-search" id="top-search">
		                </div>
                 	</div>
                 	<div class="row">

         			<div class="table-responsive">
	                    <table class="table table-striped table-bordered table-hover dataTables-example" id="table_lapangan">
		                    <thead>
			                    <tr>
			                        <th>Rendering engine</th>
			                    </tr>
		                    </thead>
		                    <tbody>

		                    </tbody>
	                    
	                    </table>
                   	</div>
                            
                 	</div>
				</div>
			</div>
		</div>

	</div>

	<script type="text/javascript">
		$.fn.stars = function() {
		    return this.each(function(i,e){$(e).html($('<span/>').width($(e).text()*16));});
		};

		

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
		                  var value = '<div class="ibox"><div class="ibox-content animated fadeInDown"><div class="row"><div class="col-lg-3"><div class="product-photo" style="width: 140px;height: 150px;background: url(../'+row.picture.first+') center no-repeat;background-size:cover; "></div></div><div class="col-lg-5"><h3>'+row.nama.first+'</h3><div> <a href="" style="font-size: 8pt;margin-bottom: 20px;"><span class="glyphicon glyphicon-map-marker"></span>'+row.daerah.first+'</a></div><div style="margin-top: 9px;"> <span class="stars">'+row.rating.first+'</span></div></div><div class="col-lg-4" > <span> mulai dari </span><h2 class="font-bold" style="color: #F77825;">Rp. '+addCommas(row.harga_mulai.first)+'<small style="color: #36BBA6;"><b>/jam</b></small></h2> <br> <a href="<?php echo base_url() ?>c_booking/view_lapangan/'+row.id.first+'/<?php echo $jam."/".$tanggal; ?>"><div class="btn btn-sm btn-primary m-t-n-xs"><strong>Lihat Lapangan</strong></div></a></div></div></div></div>';
		                	
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

	</script>

