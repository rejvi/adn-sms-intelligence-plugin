<link href="<?php echo PLUGIN_URL. '/admin/css/bootstrap.min.css'?>" type="text/css" rel='stylesheet' ></link>
<link href="<?php echo PLUGIN_URL. '/admin/css/adn-sms-intelligence-plugin-admin.css'?>" type="text/css" rel='stylesheet' ></link>

<div class="container-fluid">
    <form method="post" action="javascript:void(0)" id="custom_sms">
        <div class="row">

            <h4>
                <img src="<?php echo  PLUGIN_URL."/admin/image/adnsms.png" ?>">

                Custom SMS Send
            </h4>
            <?php if(API_KEY!=null && API_SECRET!=null){ ?>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="type" class="col-sm-4 col-md-4 control-label text-right">Select Type:</label>
                        <div class="col-sm-8 col-md-8">
                            <select class="form-control" id="type" required name="type">
                                <option value="" >Select</option>
                                <option value="all">All Number</option>
                                <option value="single">Single SMS</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="display: none" id="show_campaign_title">
                        <label for="campaignTitle" class="col-sm-4 col-md-4 control-label text-right ">Campaign Title :</label>
                        <div class="col-sm-8 col-md-8">
                            <input type="text" class="form-control" name="campaign_title" id="campaignTitle" placeholder="Campaign Title" disabled>

                        </div>
                    </div>
                    <div class="form-group row" style="display: none" id="show_number">
                        <label for="number" class="col-sm-4 col-md-4 control-label text-right">Number :</label>
                        <div class="col-sm-8 col-md-8">
                            <input type="number" class="form-control" name="number" id="number" placeholder="Number" disabled>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="massage" class="col-sm-4 col-md-4 control-label text-right ">Massage :</label>
                        <div class="col-sm-8 col-md-8">
                            <textarea name="custom_msg" class="form-control" id="massage" rows="6"  placeholder="Write Your Massage " required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-sm-4 col-md-4 ">

                        </div>
                        <div class="col-sm-8 col-md-8 ">
                            <input type="submit" name="send" id="send" class="button button-primary" value="Send">
                        </div>
                    </div>

                </div>
            <?php }else{ ?>
                <div class="col-sm-12">
                    <h4 class="p-tb-20px"> <i><b>
                                <?php    $url = admin_url('admin.php?page=adn-sms-intelligence');
                                echo "Set API KEY & API SECRET <a href='$url'>Click Here</a>";
                                ?>
                            </b></i></h4>
                </div>
            <?php  }?>

        </div>
    </form>
</div>

<?php  include(__DIR__ . '/_footer.php'); ?>
<script>
    $adn(function () {
        $adn('#custom_sms').validate({
            submitHandler:function () {
                var adnnonce = "<?php echo wp_create_nonce('adn_custom_sms_nonce') ;?>";
                var postdata= $adn("#custom_sms").serialize() +"&action=adn_custom_sms&_ajax_nonce="+adnnonce;

                $adn.post("<?php echo admin_url('admin-ajax.php') ?>",postdata,function (response) {

                    // console.log(response);
                    var status= $adn.parseJSON(response);
                    if(status.status==1){
                        alert(status.massage);
                    }
                    document.forms['custom_sms'].reset();
                    location.reload();
                })
            }
        });
    });
</script>
