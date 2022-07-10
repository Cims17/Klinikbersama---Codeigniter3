<body class="account-body accountbg">

        <!-- Log In page -->
        <div class="container">
            <div class="row vh-100 d-flex justify-content-center">
                <div class="col-12 align-self-center">
                    <div class="row">
                        <div class="col-lg-5 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 auth-header-box" style="background-color: #15ada6;">
                                    <div class="text-center p-3">
									<img src="<?= base_url() ?>assets/user/img/logo-light-dinas.png" alt="Logo">
									<img src="<?= base_url() ?>assets/user/img/logo-light.png" alt="Logo">
                                        <h4 class="mt-3 mb-1 fw-semibold text-white font-18">Form Login Admin Klinik</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                     <!-- Tab panes -->
                                    <div class="p-3">                                       
                                            <form action="<?php echo base_url() ?>Admin/Auth/Login/Login_admin" method="post" enctype="multipart/form-data" class="form-horizontal auth-form">
                
												<div class="form-group mb-2">
													<?php echo $this->session->flashdata('pesan') ?> 
													                                 
                                                </div><!--end form-group-->

                                                <div class="form-group mb-4">
                                                    <label class="form-label" for="username">Nomor Whatsapp</label>
                                                    <div class="input-group">                                                                                         
                                                        <input type="text" class="form-control" name="no_whatsapp" id="no_whatsapp" value="<?php echo $this->session->flashdata('value_no_whatsapp') ?>" placeholder="Masukkan Nomor Whatsapp" >
																										
                                                    </div>     
													<small class="form-text text-danger"><?php echo $this->session->flashdata('err_no_whatsapp') ?> </small>		  													                      
                                                </div><!--end form-group--> 
                    
                                                <div class="form-group mb-4">
                                                    <label class="form-label" for="userpassword">Password</label>                                            
                                                    <div class="input-group">                                  
                                                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" >
														<button class="btn btn-secondary" type="button" id="btnToggle"><i id="eyeIcon" class="far fa-eye"></i></button>
                                                    </div>
													<small class="form-text text-danger"><?php echo $this->session->flashdata('err_password') ?> </small>
                                                </div><!--end form-group--> 
												
												<div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <a href="<?= base_url() ?>Admin/Auth/Lupa_password" class=" font-13"><i class="dripicons-lock"></i> Lupa password?</a>                                    
                                                    </div><!--end col--> 
                                                </div><!--end form-group--> 
                    
                                                <div class="form-group mb-0 row">
                                                    <div class="col-12">
                                                        <button class="btn btn-info w-100 waves-effect waves-light" type="button submit">Login <i class="fas fa-sign-in-alt ms-1"></i></button>
                                                    </div><!--end col--> 
                                                </div> <!--end form-group-->                           
                                            </form><!--end form-->
                                    </div>
                                </div><!--end card-body-->
                                <div class="card-body bg-light-alt text-center">
                                    <span class="text-muted d-none d-sm-inline-block">DINKES.PNG © <script>
                                        document.write(new Date().getFullYear())
                                    </script></span>                                            
                                </div>
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
        <!-- End Log In page -->
