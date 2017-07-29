    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                <div class="profile-image">
                    <div class="profile-image-top">
                        <a href="<?php echo base_url().'uploadfiles/team-images/'.$team_image; ?>"><img class="img-circle" src="<?php echo base_url().'uploadfiles/team-images/'.$team_image; ?>"></a>
                        <h5 class="hidden-sm hidden-xs"><?php echo $team_name?></h5>
                        <h6 class="hidden-lg hidden-md"><?php echo $team_name?></h6>
                    </div>
                    <?php if(isset($this->session->team_pass) && $this->session->team_pass == 1){ ?>
                    <form action="<?php echo base_url().'team/update_image'; ?>" style="right: 9%;" method="POST" enctype="multipart/form-data">
                        <div class="profile-image-bottom" onclick="uploadImage()">
                            <i class="fa fa-camera" id="update_image"></i>Ubah Foto Profil
                        </div>
                        <input type="file" class="hidden" id="team_image" name="team_image">
                        <input type="submit" id="upload_image" class="hidden" />
                    </form>
                    <?php } ?>
                    
                </div>

                <div id="team_cover">
                    <?php if(isset($this->session->team_pass) && $this->session->team_pass == 1){ ?>    
                    <form action="<?php echo base_url().'team/update_cover'; ?>" class="cover-style" method="POST" enctype="multipart/form-data">
                        <div class="pbs" onclick="uploadCover()">
                            <span id="update_text">Update Cover Photo</span>
                            <i class="fa fa-camera" id="update_cover" style="font-size: 20px;opacity: 1;"></i>
                        </div>
                        <input type="file" class="hidden" id="team_banner" name="team_banner">
                        <input type="submit" id="upload_cover" class="hidden" />
                    </form>
                    <?php } ?>
                    <a href="<?php echo base_url().'uploadfiles/team-banner/'.$team_banner; ?>"><img src="<?php echo base_url().'uploadfiles/team-banner/'.$team_banner; ?>" width="100%" style="max-height: 520px;"></a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function uploadCover(){
            $("#team_banner").trigger("click");
        }
        $("#team_banner").change(function (){
           $("#upload_cover").trigger("click");
         });
        function uploadImage(){
            $("#team_image").trigger("click");
        }
        $("#team_image").change(function (){
           $("#upload_image").trigger("click");
         });
    </script>