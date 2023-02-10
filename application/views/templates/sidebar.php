 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard/searchslikpersonal  '); ?>">
  <div class="sidebar-brand-icon rotate-n-15">
  <i class="fas fa-book"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Summary Slik</div>
</a>

<!-- Divider -->

<!-- Nav Item - Dashboard -->

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('dashboard/searchslikpersonal  '); ?>">
    <i class="fas fa-fw fa-user-alt"></i>
    <span>Search Slik Personal</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('dashboard/searchslikcompany'); ?>">
    <i class="fas fa-fw fa-building"></i>
    <span>Search Slik Company</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('dashboard/datatable'); ?>">
    <i class="fas fa-fw fa-table"></i>
    <span>Data Table</span></a>
</li>
<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url(); ?>index.php/dashboard/Datatable">Data Table Summary Slik</a>
                        <a class="collapse-item" href="<?= base_url(); ?>index.php/dashboard/upload">Upload Slik</a>
                        <a class="collapse-item" href="http://172.16.1.28/mobile_order/callback_DCE/documents">Download Slik</a>
                    </div>
                </div>
            </li>

<!-- Divider -->
<hr class="sidebar-divider">


<!-- Heading -->
<div class="sidebar-heading">
  Menu :
</div>



<!-- Nav Item - Poling -->
<!-- <?php if($title == 'Poling'): ?>  
    <li class="nav-item active">
      <?php else : ?>
    <li class="nav-item">
<?php endif; ?>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
  <i class="fas fa-sign-out-alt"></i>
    <span>Logout</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

