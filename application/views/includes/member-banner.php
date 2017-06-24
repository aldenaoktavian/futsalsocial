    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                <div class="profile-image">
                <?php if(md5($this->session->login['id']) == $this->uri->segment(3)){ ?>
                    <form action="<?php echo base_url().'member/update_image'; ?>" class="cover-style" style="right: 9%;" method="POST" enctype="multipart/form-data">
                        <i class="fa fa-camera" id="update_image" onclick="uploadImage()" style="font-size: 15px;" title="Update Profile Photo"></i>
                        <input type="file" class="hidden" id="member_image" name="member_image">
                        <input type="submit" id="upload_image" class="hidden" />
                    </form>
                <?php } ?>
                    <a href="<?php echo base_url().'uploadfiles/member-images/'.$member_image; ?>"><img class="img-circle" src="<?php echo base_url().'uploadfiles/member-images/'.$member_image; ?>"></a>
                    <h5 class="hidden-sm hidden-xs"><?php echo $member_name?></h5>
                    <h6 class="hidden-lg hidden-md"><?php echo $member_name?></h6>
                </div>
            <?php if(md5($this->session->login['id']) == $this->uri->segment(3)){ ?>
                <form action="<?php echo base_url().'member/update_cover'; ?>" class="cover-style" method="POST" enctype="multipart/form-data">
                    <span id="update_text" class="hidden" onclick="uploadCover()">Update Cover Photo</span>
                    <i class="fa fa-camera" id="update_cover" onclick="uploadCover()" style="font-size: 30px;"></i>
                    <input type="file" class="hidden" id="member_banner" name="member_banner">
                    <input type="submit" id="upload_cover" class="hidden" />
                </form>
            <?php } ?>
            	<a href="<?php echo base_url().'uploadfiles/member-banner/'.$member_banner; ?>"><img src="<?php echo base_url().'uploadfiles/member-banner/'.$member_banner; ?>" width="100%" id="member_cover" style="max-height: 520px;"></a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#member_cover").mouseover(function() {
          $("#update_text").removeClass("hidden");
        });
        $("#member_cover").mouseleave(function() {
          $("#update_text").addClass("hidden");
        });
        $("#update_cover").mouseover(function() {
          $("#update_text").removeClass("hidden");
        });
        $("#update_text").mouseover(function() {
          $("#update_text").removeClass("hidden");
        });
        function uploadCover(){
            $("#member_banner").trigger("click");
        }
        $("#member_banner").change(function (){
           $("#upload_cover").trigger("click");
         });
        function uploadImage(){
            $("#member_image").trigger("click");
        }
        $("#member_image").change(function (){
           $("#upload_image").trigger("click");
         });
    </script>