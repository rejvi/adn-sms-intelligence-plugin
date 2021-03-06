<link href="<?php echo PLUGIN_URL. '/admin/css/bootstrap.min.css'?>" type="text/css" rel='stylesheet' ></link>
<link href="<?php echo PLUGIN_URL. '/admin/css/adn-sms-intelligence-plugin-admin.css'?>" type="text/css" rel='stylesheet' ></link>

<div class="container-fluid">
    <form method="post" action="javascript:void(0)" id="formId">
        <div class="row">

            <h4>
                <img src="<?php echo  PLUGIN_URL."/admin/image/adnsms.png" ?>">

                General Settings
            </h4>
            <div class="col-sm-6">
                <div class="form-group row">
                    <label for="type" class="col-sm-4 col-md-4 control-label text-right">Select Type <strong class="redColor">*</strong></label>
                    <div class="col-sm-8 col-md-8">
                        <select class="form-control" id="type" required name="type" required>
                            <option value="" >Select</option>
                            <option value="live" <?php if(API_DOMAIN_URL=='https://portal.adnsms.com') {echo 'selected';}?> >Live</option>
                            <option value="sandbox" <?php if(API_DOMAIN_URL=='https://core.adnsms.com') {echo 'selected';}?> >Sandbox</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="api_key" class="col-sm-4 col-md-4 control-label text-right ">API Key <strong class="redColor">*</strong> </label>
                    <div class="col-sm-8 col-md-8">
                        <input type="text" class="form-control" name="api_key" id="api_key" placeholder="API Key" value="<?php echo API_KEY ;?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="api_secret" class="col-sm-4 col-md-4 control-label text-right ">API Secret <strong class="redColor">*</strong> </label>
                    <div class="col-sm-8 col-md-8 ">
                        <input type="password" class="form-control"  name="password"  id="api_secret" placeholder="API Secret" value="<?php echo API_SECRET ;?>" required>
                        <span toggle="#api_secret" class="btn btn-warning field-icon toggle-password">Show</span>


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
    $adn(function () {
        $adn('#formId').validate({
            submitHandler:function () {
                var adnnonce = "<?php echo wp_create_nonce('adn_settings_nonce') ;?>";
                var postdata= $adn("#formId").serialize() +"&action=adn_settings&_ajax_nonce="+adnnonce;

                $adn.post("<?php echo admin_url('admin-ajax.php') ?>",postdata,function (response) {

                    // console.log(response);
                    var status= $adn.parseJSON(response);
                    if(status.status==1){
                        alert(status.massage);
                    }
                    location.reload();
                })
            }
        });
    });

</script>
