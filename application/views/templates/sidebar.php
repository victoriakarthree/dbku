  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>assets/dist/img/smk.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>SMK NEGERI 01 </p>
          <p>BANJAR MARGO </p>
          <a href="#"><i class=""></i> </a>
        </div>
      </div>
      <!-- search form -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Pilih Menu</li>
        <?php if($this->session->userdata('level') == 1) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Data User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Data Login</a></li>
            <li><a href="<?=site_url('guru')?>"><i class="fa fa-circle-o"></i> Data guru</a></li>
            <li><a href="<?=site_url('siswa')?>"><i class="fa fa-circle-o"></i> Data siswa</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Data Walimurid</a></li>
          </ul>
        </li> <?php } ?>
        <?php if($this->session->userdata('level') == 2) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Data User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=site_url('guru')?>"><i class="fa fa-circle-o"></i> Data guru</a></li>
            <li><a href="<?=site_url('siswa')?>"><i class="fa fa-circle-o"></i> Data siswa</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Data Murid</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Data Walimurid</a></li>
          </ul>
        </li> <?php } ?>

        <?php if($this->session->userdata('level') == 3) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Biodata</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=site_url('siswa')?>"><i class="fa fa-circle-o"></i> Data siswa</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Data Walimurid</a></li>
          </ul>
        </li> <?php } ?>


          <?php if($this->session->userdata('level') == 1) { ?>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>E-report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=site_url('ereport')?>"><i class="fa fa-circle-o"></i> Data Laporan</a></li> 
          </ul>
        </li> <?php } ?>

        <?php if($this->session->userdata('level') == 2) { ?>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>E-report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Data Laporan</a></li> 
          </ul>
        </li> <?php } ?>

          <?php if($this->session->userdata('level') == 3) { ?>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>E-report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Lihat Laporan</a></li> 
          </ul>
        </li> <?php } ?>

        
         <?php if($this->session->userdata('level') == 1) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i>
            <span>SAW</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=site_url('Alternatif')?>"><i class="fa fa-circle-o"></i> ALternatif</a></li> 
            <li><a href="<?=site_url('Kriteria')?>"><i class="fa fa-circle-o"></i> Kriteria</a></li> 
            <li><a href="<?=site_url('SubKriteria')?>"><i class="fa fa-circle-o"></i> Sub-Kriteria</a></li> <li><a href="<?=site_url('alkri')?>"><i class="fa fa-circle-o"></i> Alternatif $ kriteria</a></li>
            <li><a href="<?=site_url('Penilaian')?>"><i class="fa fa-circle-o"></i> Penilaian SAW</a></li> 
          </ul>
        </li> <?php } ?>

         <?php if($this->session->userdata('level') == 1) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i>
            <span>AHP</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('ahp')?>"><i class="fa fa-circle-o"></i> AHP</a></li> 
            <li><a href="<?=site_url('saw')?>"><i class="fa fa-circle-o"></i> SAW</a></li> 
          </ul>
        </li> <?php } ?>

         <?php if($this->session->userdata('level') == 2) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i>
            <span>Penentuan Siswa Terbaik</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=site_url('ahp')?>"><i class="fa fa-circle-o"></i> </a></li> 
            <li><a href="<?=site_url('saw')?>"><i class="fa fa-circle-o"></i> SAW</a></li> 
            <li><a href="<?=site_url('ahp')?>"><i class="fa fa-circle-o"></i> AHP</a></li> 
            <li><a href="<?=site_url('saw')?>"><i class="fa fa-circle-o"></i> SAW</a></li> 
          </ul>
        </li> <?php } ?>

        <?php if($this->session->userdata('level') == 3) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i>
            <span>Hasil Prestasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Lihat Hasil perhitungan AHP</a></li> 
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Lihat Hasil perhitungan SAW</a></li> 
          </ul>
        </li> <?php } ?>

        
        <li class="header"></li>
        <li><a href="<?=site_url('auth/logout')?>"><i class="fa fa-sign-out"></i> <span>LogOut</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>