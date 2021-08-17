<!-- Left Panel -->
     <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">

             <div id="main-menu" class="main-menu collapse navbar-collapse">
                 <ul class="nav navbar-nav">
                     <li>
                         <a href="<?= base_url('dt_pasien')?>"><i class="menu-icon fa fa-home"></i>Daftar Pasien</a>
                     </li>
                     <li class="menu-title">Menu Pasien</li><!-- /.menu-title -->
                     <li>
                         <a href="<?= base_url('dt_pasien/read/'.$pasien)?>"><i class="menu-icon fa fa-user"></i>Detail Pasien </a>
                     </li>
                     <li>
                         <a href="<?= base_url('dt_diag_klsf?q='.$pasien)?>"><i class="menu-icon fa fa-list"></i>List Diagnosa </a>
                     </li>
                     <li>
                         <a href="<?= base_url('dt_proses?q='.$pasien)?>"><i class="menu-icon fa fa-wheelchair"></i>Proses Pengobatan </a>
                     </li>
                 </ul>
             </div><!-- /.navbar-collapse -->
         </nav>
     </aside><!-- /#left-panel -->
     <!-- Left Panel -->
