<div class="container-fluid" style="width: 80%;">
		<div class="row">
                <div class="col-lg-12">
                    <div class="ibox animated fadeInLeftBig">
                        <div class="ibox-title">
                            <h5>Silahkan Login </h5>
                        </div>
                        <div class="ibox-content">

                            
                                <center><img src="<?php echo base_url()."assets/img/Design.png"; ?>" style="width: 150px;"></center>
                                <center><div class="logo" style="color: #666;">Social</div></center>
                                <br>
                                <div class="spacer" style="height: 5px;"></div>
                                <form class="m-t" role="form" action="<?php echo base_url().'c_login/login'; ?>" method="POST">
                                    <div class="form-group">
                                        <input type="hidden" name="txt_method" value="<?php echo $method; ?>">
                                        <input type="text" name="txt_username" class="form-control" placeholder="Username" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="txt_password" class="form-control" placeholder="Password" required="">
                                    </div>
                                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                                    <a href="#">
                                        <small>Forgot password?</small>
                                    </a>

                                    <p class="text-muted text-center">
                                        <small>Do not have an account?</small>
                                    </p>
                                    <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
                                </form>
                            
                        </div>
                    </div>
                    
                </div>
        </div>
</div>