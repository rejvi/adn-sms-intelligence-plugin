
    <div class="container-fluid">
      <form method="post" action="javascript:void(0)" id="formId">
        <div class="row">

            <h4>
                <img src="<?php echo  PLUGIN_URL."/admin/image/adnsms.png" ?>">

                General Settings
            </h4>
       <div class="col-sm-6">
           <?php
           if(API_KEY==null && API_SECRET==null) { echo "<h4 class='error'>Set API KEY & API SECRET </h4>";}
           if(API_KEY==null) { echo "<h4 class='error'>Set API KEY</h4>";}
           if(API_SECRET==null) { echo "<h4 class='error'>Set API SECRET</h4>";}
           ?>

           <div class="form-group row">
                            <label for="api_key" class="col-sm-4 col-md-4 control-label text-right ">API Key :</label>
                            <div class="col-sm-8 col-md-8">
                            <input type="text" class="form-control" name="api_key" id="api_key" placeholder="API Key" value="<?php echo API_KEY ;?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="api_secret" class="col-sm-4 col-md-4 control-label text-right ">API Secret :</label>
                            <div class="col-sm-8 col-md-8 ">
                            <input type="text" class="form-control"  name="password"  id="api_secret" placeholder="API Secret" value="<?php echo API_SECRET ;?>" required>
                            </div>
                        </div>
                       <div class="form-group row">

                           <div class="col-sm-4 col-md-4 ">

                           </div>
                           <div class="col-sm-8 col-md-8 ">
                           <input type="submit" name="submit" id="submit" class="button button-primary" value="Save">
                           </div>
                       </div>
            </div>

        </div>
        </form>
    </div>

    <?php  include(__DIR__ . '/_footer.php'); ?>
    <script>
        jQuery(function () {
            jQuery('#formId').validate({
                submitHandler:function () {
                    var adnnonce = "<?php echo wp_create_nonce('adn_settings_nonce') ;?>";
                    var postdata= jQuery("#formId").serialize() +"&action=adn_settings&_ajax_nonce="+adnnonce;

                    jQuery.post("<?php echo admin_url('admin-ajax.php') ?>",postdata,function (response) {

                        // console.log(response);
                        var status= jQuery.parseJSON(response);
                        if(status.status==1){
                            alert(status.massage);
                        }
                        location.reload();
                    })
                }
            });
        });
    </script>
