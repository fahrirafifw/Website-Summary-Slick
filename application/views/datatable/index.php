<?php 
    $sumber = 'callback_ps.json';
    $konten = file_get_contents($sumber);
    $data = json_decode($konten,true);
    
    $plafonawal = array_column($data['Data']['Slik']['Detail']['FasilitasKredit'], 'PlafonAwal');
    $bakidebet = array_column($data['Data']['Slik']['Detail']['FasilitasKredit'], 'BakiDebet');
    $tanggalakadawal = array_column($data['Data']['Slik']['Detail']['FasilitasKredit'], 'TanggalAkadAwal');
    $tanggaljatuhtempo = array_column($data['Data']['Slik']['Detail']['FasilitasKredit'], 'TanggalJatuhTempo');
    $sumplafonawal = array_reduce($plafonawal, function($carry, $item) {
        return $carry + $item;
    }, 0);

    $sumbakidebet = array_reduce($bakidebet, function($carry, $item) {
        return $carry + $item;
    }, 0);
    // $DebiturId = $data["Data"]["Slik"]["Detail"]["FasilitasKredit"][0]["DebiturId"];
    // $kolektibitas1 = $data["Data"]["Slik"]["Detail"]["FasilitasKredit"][0]["Kolektibilitas"];
    // $kolektibitas2 = $data["Data"]["Slik"]["Detail"]["FasilitasKredit"][0]["KolektibilitasKet"];
    // $namapelapor = $data["Data"]["Slik"]["Detail"]["FasilitasKredit"][0]["LjkKet"];
    // $JenisPenggunaanKet = $data["Data"]["Slik"]["Detail"]["FasilitasKredit"][0]["JenisPenggunaanKet"];
    // $plafonawal = $data["Data"]["Slik"]["Detail"]["FasilitasKredit"][1]["PlafonAwal"];       
    // $Bakidebet = $data["Data"]["Slik"]["Detail"]["FasilitasKredit"][0]["BakiDebet"];
    // $sukubunga = $data["Data"]["Slik"]["Detail"]["FasilitasKredit"][0]["SukuBunga"];
    // $tglawalkred = $data["Data"]["Slik"]["Detail"]["FasilitasKredit"][0]["TanggalAwalKredit"];
    // $tgljatuhtempo = $data["Data"]["Slik"]["Detail"]["FasilitasKredit"][0]["TanggalJatuhTempo"];
    // $jumlahhartunggakan = $data["Data"]["Slik"]["Detail"]["FasilitasKredit"][0]["JumlahHariTunggakan"];
    // $tunggakanpokok = $data["Data"]["Slik"]["Detail"]["FasilitasKredit"][0]["TunggakanPokok"];
    // $tunggakanbunga = $data["Data"]["Slik"]["Detail"]["FasilitasKredit"][0]["TunggakanBunga"];
    // $denda = $data["Data"]["Slik"]["Detail"]["FasilitasKredit"][0]["Denda"];
    
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Summary Slik - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>vendor/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/vendor/css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="<?= base_url(); ?>/vendor/img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="<?= base_url(); ?>/vendor/img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="<?= base_url(); ?>/vendor/img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('username'); ?></span>
                                <img class="img-profile rounded-circle" src="https://www.brifinance.co.id/images/logo-call-center.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Table Slik</h1>
                    </div>

                    <!-- Content Row -->
                    <!-- <div class="input-group align-items-center justify-content-center mb-4">
                        <input type="text" class="form-control bg-white border-0 small mx-sm-2" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary mx-sm-2" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div> -->
                    <!-- Content Row -->
                    <div class="card shadow card  text-center mx-auto">
                        <div class="column form-text">
                                    <div class="custommar2 ">
                                        <button class="btn btn-primary dropdown-toggle mx-sm-2" type="button" data-toggle="dropdown" aria-expanded="false">
                                            <i class= "fa fa-download"></i>  Download Slik
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?php echo base_url('dashboard/pdf')?>">PDF</a>
                                            <a class="dropdown-item" href="<?php echo base_url('dashboard/excel')?>">EXCEL</a>
                                        </div>
                                    </div>
                            </div>
                            <div class = "identitaspengajuan">
                                <div>
                                    Nama Pengaju : <?php echo $this->session->userdata('username'); ?>
                                </div>
                                <div>
                                    Nama Calon Debitur : 
                                </div>
                                <div>
                                    Tipe ID : 
                                </div>
                                <div>
                                    Nomor ID : 
                                </div>
                            </div>
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    
                                    
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12">
                                        <table id="example" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Debitur ID</th>
                                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label = "Name: activate to sort column descending" style="width: 57px;" aria-sort="ascending" style="width: 57px;" > Kualitas </th>
                                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label = "Name: activate to sort column descending" style="width: 57px;" aria-sort="ascending" style="width: 57px;" > Nama Pelapor </th>
                                                        <th>Jenis Pengguna</th>
                                                        <th>Plafon Awal</th>
                                                        <th>Baki Debet</th>
                                                        <th>Suku Bunga</th>
                                                        <th>Tgl. Awal Kredit</th>
                                                        <th>Tgl. jth Tempo</th>
                                                        <th>Jml Hari</th>
                                                        <th>T. Pokok</th>
                                                        <th>T. Bunga</th>
                                                        <th>Denda</th>
                                                        <th>Angsuran</th> 
                                                        <th>Kondisi</th> 
                                                        <th>Jenis Suku Bunga</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                <?php foreach ($data["Data"]["Slik"]["Detail"]["FasilitasKredit"] as $row) :
                                                    $date1 = new DateTime($row["TanggalAwalKredit"]);
                                                    $date2 = new DateTime($row["TanggalJatuhTempo"]);
                                                    $plafonawal1= $row["PlafonAwal"];
                                                    $JenisSukuBunga= $row["JenisSukuBunga"];
                                                    $sukubunga= $row["SukuBunga"];
                                                    $sukubunga = $sukubunga/1200;
                                                    $interval = $date1->diff($date2);
                                                    $month = $interval->m + ($interval->y * 12);
                                                    if ($JenisSukuBunga == 1) {
                                                        $result = ($plafonawal1/$month);
                                                    } else if ($JenisSukuBunga == 2) {
                                                        $result = $sukubunga * -$plafonawal1 * pow((1+$sukubunga),$month) / (1 - pow((1+$sukubunga),$month));
                                                    } else {
                                                        $result = ($plafonawal1/$month);
                                                    }
                                                    $result = number_format($result, 2, ',', '.');
                                                    ?>
                                                    
                                                <tr>
                                                    <td> <?php echo $row["DebiturId"]; ?> </td>
                                                    <td> <?php echo $row["Kolektibilitas"]?>-<?php echo $row["KolektibilitasKet"]?></td>
                                                    <td> <?php echo $row["LjkKet"]; ?> </td>
                                                    <td> <?php echo $row["JenisPenggunaanKet"]; ?> </td>
                                                    <td> <?php echo $row["PlafonAwal"]; ?> </td>
                                                    <td> <?php echo $row["BakiDebet"]; ?> </td>
                                                    <td> <?php echo $row["SukuBunga"]; ?>% </td>
                                                    <td> <?php echo $row["TanggalAwalKredit"]; ?> </td>
                                                    <td> <?php echo $row["TanggalJatuhTempo"]; ?> </td>
                                                    <td> <?php echo $row["JumlahHariTunggakan"]; ?> </td>
                                                    <td> <?php echo $row["TunggakanPokok"]; ?> </td>
                                                    <td> <?php echo $row["TunggakanBunga"]; ?> </td>
                                                    <td> <?php echo $row["Denda"]; ?> </td>
                                                    <td> <?php echo $result; ?></td> 
                                                    <td> <?php echo $row["KondisiKet"]; ?> </td>   
                                                    <td> <?php echo $row["JenisSukuBungaKet"]; ?> </td>    
                                                </tr>
                                                <?php endforeach?>

                                                <tr>
                                                    <td class="center-colspan" colspan="4">TOTAL</td>
                                                   <td><?php echo $sumplafonawal?></td> 
                                                   <td><?php echo $sumbakidebet?></td>
                                                   <td class="center-colspan" colspan="10"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Color System -->
                    <!-- <div class="row">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?= base_url(); ?>vendor/img/undraw_posting_photo.svg" alt="...">
                                </div>
                                <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                    constantly updated collection of beautiful svg images that you can use
                                    completely free and without attribution!</p>
                                <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                    unDraw &rarr;</a>
                            </div>
                        </div>
                    </div> -->
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer> -->
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url(); ?>auth/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>



<script>
    $(document).ready(function() {
    $('.datepicker').datepicker({
        dateFormat: "yy-mm-dd"
    });
});
</script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>vendor/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>vendor/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>vendor/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>vendor/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>vendor/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>vendor/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url(); ?>vendor/js/demo/chart-pie-demo.js"></script>

    <!--DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.1/r-2.4.0/sc-2.0.7/sl-1.5.0/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.1/r-2.4.0/sc-2.0.7/sl-1.5.0/datatables.min.js"></script>
 
    <!--DateRangePicker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript">

        // $(document).ready(function){
        //     $('#search').keyup(function(){
        //         $('#example').html('');
        //         var searchField = $('#search').val();
        //         var expression = new RegExp(searchField, "i");
        //         $.getJson('callback_ps.json', function (data){
        //             $.each(data, function (key, value){
        //                 if(value.NoIdentitas.search(expression) != -1 || value.location.search(
        //                     expression) != -1)
        //                     {
        //                         $('#example').append('<li class="list-group-item link-class"><img src="'+value.image+'" height="40" width="40" class="img-thumbnail" /> '+value.name+' | <span class="text-muted">'+value.location+'</span></li>')
        //                     }
        //             })
        //         })
        //     })
        // }
    // var exampl;
    // var base_url = "";
    // $(document).ready(function() {
    //         var table = $('#example').DataTable({
    //         dom: 'Bfrtip',
    //         buttons: [
    //               'copy', 'csv', 'excel', 'print'
    //           ],
    //         "ajax": base_url + 'Berat/fetchData', 
    //               "order": [[ 1, "asc" ]],
    //               "ordering": true,
    //         "processing": true,
      
    //           });
            //Get the column index for the Category column to be used in the method below ($.fn.dataTable.ext.search.push)
            //This tells datatables what column to filter on when a user selects a value from the dropdown.
            //It's important that the text used here (Category) is the same for used in the header of the column to filter
    </script>

</body>

</html>