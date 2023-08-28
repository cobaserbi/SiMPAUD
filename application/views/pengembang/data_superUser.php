<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="text-primary">Data Super User</h3>
              </div>

              <div class="title_right">
                <div class="col-md-4 col-sm-4 col-xs-12 form-group pull-right top_search">
                  <div class="input-group" style="float:right;">
                  <a href="<?php echo base_url('superUser/tambah');?>" class="btn btn-success btn-sm"><i class="fa fa-plus-square"></i> Tambah</a>
                  <a href="<?php echo base_url('superUser/laporan');?>" class="btn btn-primary btn-sm"><i class="fa fa-book"></i> Laporan</a>

                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                            <?php 
                            if($this->session->userdata("info") == 1 ){
                            ?>
                            <div class="alert alert-success alert-dismissible " role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong> 1 Data </strong> berhasil ditambahkan.
                            </div>
                            <?php
                            }else if($this->session->userdata("info") == 2){
                            ?>
                            <div class="alert alert-danger alert-dismissible " role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>1 Data </strong> berhasil dihapus.
                            </div>
                            <?php
                            }else if($this->session->userdata("info") == 3){
                              ?>
                              <div class="alert alert-warning alert-dismissible " role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                  </button>
                                  <strong>1 Data </strong> berhasil diubah.
                              </div>
                              <?php
                            }else{

                            }
                            $this->session->set_userdata("info",0);
                            ?>
                              
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Lengkap</th>
                          <th>TTL</th>
                          <th>no Telepon</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $no = 1;
                          foreach($data as $key){
                        ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $key->nama_superUser; ?></td>
                          <td><?php echo $key->tempat_lahir_superUser.", ".$key->tanggal_lahir_superUser; ?></td>
                          <td><?php echo $key->no_telp_superUser; ?></td>
                          <td><?php echo $key->status_akun; ?></td>
                          <td valign="middle" align="center" style="font-size:18px;">
                            <a href="<?php echo base_url('superUser/detail'); ?>" class="text-primary"><i class="glyphicon glyphicon-tasks"></i></a>&nbsp; &nbsp; 
                            <a href="<?php echo base_url('superUser/edit/'.$key->id_superUser.'/'.$key->id_akun); ?>" class="text-warning"><i class="fa fa-edit"></i></a>&nbsp; &nbsp;
                            <a href="<?php echo base_url('superUser/delete/'.$key->id_superUser.'/'.$key->id_akun); ?>" class="text-danger"><i class="fa fa-trash"></i></a>&nbsp; &nbsp;
                          </td>
                        </tr>
                        <?php
                          $no++;
                          }
                        ?>
                      </tbody>
                    </table>
        <!-- /page content -->