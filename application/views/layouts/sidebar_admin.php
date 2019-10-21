<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    <!-- Sidebar user panel -->
           
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">NAVIGASI UTAMA</li>

            <li class="<?php if($this->uri->segment(1,0)=='dashboard'){echo 'active';}else{echo '';}?>">
                <a href="<?php echo site_url('dashboard/index') ?>"><i class="fa fa-home"></i><span>Dashboard</span></a>
            </li>
            <li class="<?php if($this->uri->segment(1,0)=='kunjungan'){echo 'active';}else{echo '';}?>">
                <a href="<?php echo site_url('kunjungan/index') ?>"><i class="fa fa-bookmark"></i><span>Kunjungan</span></a>
            </li>
            <li class="<?php if($this->uri->segment(1,0)=='tujuan'){echo 'active';}else{echo '';}?>">
                <a href="<?php echo site_url('tujuan/index') ?>"><i class="fa fa-sticky-note"></i><span>Tujuan</span></a>
            </li>
                            
        </ul>
    </section>
                <!-- /.sidebar -->
</aside>