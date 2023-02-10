
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>var $j = jQuery.noConflict(true);</script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  <center>
  <h3>
      Report CIF Ganda & Validasi Data CV
    </h3>
</center>

		<div class="col-md-12" style="margin-bottom: 20px">
			<div class="row">
				<div class="col-md-2">
				  <span>Pilih dari tanggal</span>
				  <div class="input-group">
				    <input type="text" class="form-control pickdate date_range_filter" name="tanggal" >
				    <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar"></span></span>
				  </div>
				</div>
				<div class="col-md-2">
				  <span>Sampai tanggal</span>
				  <div class="input-group">
				    <input type="text" class="form-control pickdate date_range_filter2" name="tanggal">
				    <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar"></span></span>
				  </div>
				</div>
        <div class="form-group">
        <span>Pilih Cabang</span>
        <select name="categoryFilter" id="categoryFilter" class="browser-default custom-select" onclick="">
                <option selected>Open this select menu</option>
                <option value="">ALL</option>
								<?php foreach ($CONFINS as $u) :?>
								<option value="<?=$u['OFFICE_NAME']?>"><?=$u['OFFICE_NAME']?></option>
								<?php endforeach ?>  
      </select>
        </div>
			</div>
		</div>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div id="messages"></div>

        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example" class="table table-bordered table-striped">
              <thead>
              <tr>
              <th>Costumer Name</th>
                <th>Costumer NO</th>
                <th>Office Name</th>
                <th>Marketing Name</th>  
                <th>Go Live Date</th>    
                <th>Nomor Kontrak</th>
              </tr>
              </thead>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!--Boostrap -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <!--DataTables -->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
  <!--DateRangePicker -->
  <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script type="text/javascript">
var example;
var base_url = "<?php echo base_url(); ?>";
$(document).ready(function() {
  $j("#mainProductNav").addClass('active');
		var table = $('#example').DataTable({
      dom: 'Bfrtip',
      buttons: [
            'copy', 'csv', 'excel', 'print'
        ],
      "ajax": base_url + 'Laporan/fetchDataReport', 
			"order": [[ 1, "asc" ]],
			"ordering": true,
      "processing": true,
		});
      //Get the column index for the Category column to be used in the method below ($.fn.dataTable.ext.search.push)
      //This tells datatables what column to filter on when a user selects a value from the dropdown.
      //It's important that the text used here (Category) is the same for used in the header of the column to filter
      var categoryIndex = 2;
      $("#example th").each(function (i) {
        if ($($(this)).html() == "Category") {
          categoryIndex = i; return false;
        }
      });
      //Use the built in datatables API to filter the existing rows by the Category column
      $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
          var selectedItem = $('#categoryFilter').val()
          var category = data[categoryIndex];
          if (selectedItem === "" || category.includes(selectedItem)) {
            return true;
          }
          return false;
        }
      );
      //Set the change event for the Category Filter dropdown to redraw the datatable each time
      //a user selects a new filter.
      $("#categoryFilter").change(function (e) {
        table.draw();
      });
      table.draw();


		$.fn.dataTable.ext.search.push(
			function(settings, data, dataIndex) {
			  var min = $('.date_range_filter').val();
			  var max = $('.date_range_filter2').val();
			  var createdAt = data[4];  // -> rubah angka 4 sesuai posisi tanggal pada tabelmu, dimulai dari angka 0
			  if (
			    (min == "" || max == "") ||
			    (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
			  ) {
			    return true;
			  }
			  return false;
			}
		);
	    $('.pickdate').each(function() {
	        $(this).datepicker({format: 'mm/dd/yyyy'});
	     });
		$('.pickdate').change(function() {
	        table.draw();
	    });		
	});
</script>

<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>