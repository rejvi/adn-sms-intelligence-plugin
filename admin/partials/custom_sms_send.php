
<div class="container-fluid">
    <form method="post" action="javascript:void(0)" id="custom_sms">
        <div class="row">

            <h4>
                <img src="<?php echo  PLUGIN_URL."/admin/image/adnsms.png" ?>">

                Custom SMS Send
            </h4>

            <div class="col-sm-6">


                <div class="form-group row">
                    <label for="type" class="col-sm-4 col-md-4 control-label ">Select Type:</label>
                    <div class="col-sm-8 col-md-8">
                        <select class="form-control" id="type" required name="type">
                            <option value="" >Select</option>
                            <option value="all">All Number</option>
                            <option value="single">Single SMS</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row" style="display: none" id="show_campaign_title">
                    <label for="campaignTitle" class="col-sm-4 col-md-4 control-label ">Campaign Title :</label>
                    <div class="col-sm-8 col-md-8">
                        <input type="text" class="form-control" name="campaign_title" id="campaignTitle" placeholder="Campaign Title" disabled>

                    </div>
                </div>
                <div class="form-group row" style="display: none" id="show_number">
                    <label for="number" class="col-sm-4 col-md-4 control-label ">Number :</label>
                    <div class="col-sm-8 col-md-8">
                        <input type="number" class="form-control" name="number" id="number" placeholder="Number" disabled>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="massage" class="col-sm-4 col-md-4 control-label ">Massage :</label>
                    <div class="col-sm-8 col-md-8">
                     <textarea name="custom_msg" class="form-control" id="massage" rows="6"  placeholder="Write Your Massage " required></textarea>
                    </div>
                 </div>
                <?php
                submit_button('Send');
                ?>

            </div>

        </div>
    </form>
</div>

<?php  include(__DIR__ . '/_footer.php'); ?>
<script>
    jQuery(function () {
        jQuery('#custom_sms').validate({
            submitHandler:function () {
                var adnnonce = "<?php echo wp_create_nonce('adn_custom_sms_nonce') ;?>";
                var postdata= jQuery("#custom_sms").serialize() +"&action=adn_custom_sms&_ajax_nonce="+adnnonce;

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
