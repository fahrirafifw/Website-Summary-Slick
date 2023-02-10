<!-- UI NAV -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<!-- js autocomplete -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<!-- JS UI -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->

<div class="container">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                <p><small>Form Header</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p><small>Form Informasi Debitur</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p><small>Form Premi</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p><small>Kondisi</small></p>
            </div>
        </div>
 </div>
    
    <form role="form" action="<?php echo base_url('Berat/create') ?>" method="post">
        <div class="panel panel-primary setup-content" id="step-1">
            <div class="panel-heading">
                 <h3 class="panel-title">Nama Asurandur</h3>
            </div>
            <div class="panel-body">
            <div class="form-group">
                    <label class="control-label">Kepada</label>
                    <input maxlength="100" type="text" id='kepada' name= 'kepada' required="required" class="form-control" placeholder="Nama Asuransi"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Tanggal</label>
                    <input maxlength="100" type="date" id='tanggal' name= 'tanggal'required="required" class="form-control" placeholder="Enter Last Name" />
                </div>
                <div class="form-group">
                    <label class="control-label">Staff Brif</label>
                    <input maxlength="100" type="text" id="staff" name= "staff" required="required" class="form-control" placeholder="Nama LO" />
                </div>
                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-2">
            <div class="panel-heading">
                 <h3 class="panel-title">Debitur</h3>
            </div>

            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">QQ</label>
                    <input maxlength="200" type="text" id='qq' name= 'qq' required="required" class="form-control" placeholder="Company Name" />
                </div>
                <div class="form-group">
                    <label class="control-label">Okupasi</label>
                    <input maxlength="200" type="text" id="okupasi" name="okupasi"required="required" class="form-control" placeholder="Name Okupasi" />
                </div>

                <div class="form-group">
                <label class="control-label" for="lokasi">Lokasi Resiko</label>                   
                    <textarea class="form-control" id="lokasi" name="lokasi"></textarea>
                </div>

                <div class="row">
                <div class="col-md-2 mb-2">
                <label for="validationServer053">Periode</label>
                <input type="date" class="form-control" name="periode" required>
                </div>

                <div class="col-md-2 mb-2">
                <label for="validationServer053">Sampai</label>
                <input type="date" class="form-control" name="sampai" required>
                </div>
                </div>

                <div class="form-group" id="dynamic_form">
                <div class="row">
	                <div class="col-md-4">
                    <label class="control-label">Nama Unit</label>
	                    <input type="text" name="nama_unit" id="nama_unit" placeholder="Nama Keterangan" class="form-control">
	                </div>
                    <div class="col-md-3">
                    <label class="control-label">Tahun</label>
	                    <input type="number" class="form-control" name="tahun" id="tahun" placeholder="tahun" onkeyup = "if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')";>
	                </div>
                    <div class="col-md-3">
                    <label class="control-label">Jumlah</label>
	                    <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Rp." onkeyup = "if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')";>
	                </div>
	                <div class="button-group">
	                    <a href="javascript:void(0)" class="btn btn-primary" id="plus5">Add More</a>
	                    <a href="javascript:void(0)" class="btn btn-danger" id="minus5">Remove</a>
	                </div>
	            </div>
                 </div>
                    <div class="form-group">
                            <label class="control-label">Nilai Pertanggungan</label>
                            <input maxlength="200" name="nilai_pertanggungan" id="nilai_pertanggungan" type="number" required="required" class="form-control" placeholder="Enter Company Name" />
                    </div>
            
                    <p>Penggunaan Obyek Pertanggungan:</p>
                    <input type="radio" id="obj_pertanggungan" name="obj_pertanggungan" value="Pemakaian Sendiri">
                    <label for="html">Pemakaian Sendiri</label><br>
                    <input type="radio" id="obj_pertanggungan" name="obj_pertanggungan" value="Disewakan">
                    <label for="css">Disewakan</label><br>

                    <br>  

                    <p>Metode Pembayaran:</p>
                    <input type="radio" id="metode_bayar" name="metode_bayar" value="Full Term">
                    <label for="age1">Full Term</label><br>
                    <input type="radio" id="metode_bayar" name="metode_bayar" value="Yearly">
                    <label for="age2">Yearly</label><br>  
                    <br>
            
                    <div class="form-group">
                        <label class="control-label">Yearly</label>
                        <select id="yearly" name="yearly" class="form-control">
                        <option value="" class="label">Yearly</option>
                        <option value="1 thn">1 thn</option>
                        <option value="2 thn">2 Thn</option>
                        <option value="3 thn">3 Thn</option>
                        <option value="4 thn">4 Thn</option>
                        <option value="5 thn">5 Thn</option>
                        </select>
                    </div>
                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
            </div>
         </div>
        
         <div class="panel panel-primary setup-content" id="step-3">
            <div class="panel-heading">
                 <h3 class="panel-title">Suku Premi</h3>
            </div>
            <div class="panel-body">

            <div class="form-row">
            <div class="col-md-2 mb-3">
                <label class="control-label">Rate (suku premi)</label>
                <select id="rate" name="rate" class="form-control">
                <option value="All Risk">All Risk</option>
                <option hidden value="TLO">TLO</option>
                <option value="TLO">TLO</option>
                </select>
                </div>
           
                <div class="col-md-2 mb-3">
                <label class="control-label">Jumlah Rate</label>
                    <input maxlength="200" id="jml_rate" name="jml_rate" type="number" required="required" class="form-control" placeholder="Rate %" />
                </div>
            </div>
                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-4">
            <div class="panel-heading">
                 <h3 class="panel-title">Kondisi</h3>
            </div>
            <div class="panel-body">

            <div class="form-group">
            <div class="control-group after-add-more">
            <label>Keterangan</label>
                <input type="text" id="keterangan" name="keterangan" class="form-control">
                <label>Amount</label>
                <input type="number" id="amount" name="amount" class="form-control">
                <label>claim</label>
                <input type="number" id="claim" name="claim" class="form-control">
                <br>
                <button class="btn btn-success add-more" type="button">
                <i class="glyphicon glyphicon-plus"></i> Add
                </button>
                <hr>
          
                <div class="copy hide">
                    <div class="control-group">
                <label>Keterangan</label>
                <input type="text" id="keterangan1" name="keterangan" class="form-control">
                <label>Amount</label>
                <input type="number" id="amount1" name="amount1" class="form-control">
                <label>claim</label>
                <input type="number" id="claim1" name="claim1" class="form-control">
                    <br>
                    <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                    <hr>
                    </div>
                </div>
            </div>
                <button class="btn btn-success pull-right" type="submit">Finish!</button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript" src="assets/js/step.js"></script> 

<!-- <script type="text/javascript" src="assets/js/jquery.min.js"></script> -->
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/dynamic-form.js"></script> 

    <script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      // saat tombol remove dklik control group akan dihapus 
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });

</script>
<script type="text/javascript">
        $(document).ready(function(){
            $( "#staff" ).autocomplete({
              source: "<?php echo site_url('Poling/get_autocomplete');?>" 
            });
        });
</script>
