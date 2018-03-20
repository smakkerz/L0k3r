    <div class="row">
        <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
            <div class="page-header">
                <h1>
                    <i class="ace-icon fa fa-home icon-animated-home blue "></i> Anda membuka Halaman Beranda
                        <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                    <?php echo ucfirst($this->session->userdata('name'));?>
                        </small>
                </h1>
            </div>
                <?= $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                <div class="row">
                    <div class="col-sm-7">
                        <div class="widget-box transparent">
                            <div class="widget-header widget-header-flat">
                                <h4 class="widget-title lighter">
                                    <i class="ace-icon fa fa-leaf icon-animated-leaf green"></i>
                                        Selamat Datang, <b><?php echo ucfirst($this->session->userdata('name'));?></b>
                                </h4>

                                <div class="widget-toolbar">
                                    <a href="#" data-action="collapse">
                                        <i class="ace-icon fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                        <div class="widget-body">
                            <div class="widget-main no-padding">
                                <p class="alert alert-success">
                                    <!-- <?=$isi ?>
 -->                
                                </p>
                            </div><!-- /.widget-main -->
                        </div><!-- /.widget-body -->
                        </div><!-- /.widget-box -->
                    </div>
                </div>
            </div>
    </div>
