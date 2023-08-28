<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>User Profile</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Report</h2>
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
                  <?php
                    foreach ($data as $key) {
                  ?>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="<?php echo base_url() ?>assets/images/foto/<?php echo $key->foto; ?>" alt="Avatar" title="Change the avatar" width="250" height="300">
                        </div>
                      </div>
                      <h3><?php echo $key->nama_superUser; ?></h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $key->alamat_superUser; ?>
                        </li>
                      
                        <?php
                          foreach ($data_akun as $key_akun) {
                        ?>
                        
                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> <?php echo $key_akun->status_akun; ?>
                        </li>   
                    </div>
                    <div class="col-md-9 col-sm-9 ">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Detail Super User</h2>
                        </div>
                        <div class="col-md-6">
                        </div>
                      </div>
                      <form class="" action="" method="post" enctype="multipart/form-data" novalidate>
                                        </p>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">NIK</label>
                                            <div class="col-md-9 col-sm-9">
                                                <input type ="number" class="form-control" data-validate-length-range="16" data-validate-words="16" name="nik" placeholder="" readonly value="<?php echo $key->nik_superUser?>"/>
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Tempat,Tanggal Lahir</label>
                                            <div class="col-md-9 col-sm-9">
                                                <input class="form-control" class='optional' name="tempat_lahir" data-validate-length-range="5,15" type="text" value="<?php echo $key->tempat_lahir_superUser.', '.$key->tanggal_lahir_superUser?>" readonly/></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">email</label>
                                            <div class="col-md-9 col-sm-9">
                                                <input class="form-control" name="email" class='email' readonly type="email" value="<?php echo $key->email_superUser?>"/></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Username</label>
                                            <div class="col-md-9 col-sm-9">
                                                <input type="text "class="form-control" data-validate-length-range="6" data-validate-words="2" name="username" placeholder="" readonly value="<?php echo $key_akun->username_akun; ?>"/>
                                            </div>
                                        </div>
                                        <div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Password</label>
											<div class="col-md-9 col-sm-9">
												<input class="form-control" type="text" id="password1" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" title="=minimal 8 karakter" required value="<?php echo $key_akun->password_akun; ?>" readonly/>
												
												<span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
													<i id="slash" class="fa fa-eye-slash"></i>
													<i id="eye" class="fa fa-eye"></i>
												</span>
											</div>
										</div>
                                        
                                        <?php
                                            }
                                        ?>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">No Telepon</label>
                                            <div class="col-md-9 col-sm-9">
                                                <input class="form-control" type="tel" class='tel' name="phone" required='required' data-validate-length-range="8,20" value="<?php echo $key->no_telp_superUser?>" readonly/></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat<span class="required" >*</span></label>
                                            <div class="col-md-9 col-sm-9">
                                                <textarea readonly name='alamat' class="form-control" readonly><?php echo $key->alamat_superUser; ?></textarea></div>
                                        </div>
                                        
                                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
          }
        ?>
        <!-- /page content -->