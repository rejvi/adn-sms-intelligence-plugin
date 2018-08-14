
<div class="container-fluid">
    <form method="post" action="javascript:void(0)" id="formId">
        <div class="row">

            <h4>
                <img src="<?php echo  PLUGIN_URL."/admin/image/adnsms.png" ?>">

                Custom SMS Send (Single and Multiple)
            </h4>

            <div class="col-sm-5">
                <div class="form-group">
                    <label for="sel1">Select list:</label>
                    <select class="form-control" id="sel1">
                        <option value="" >Select</option>
                        <option>1</option>
                        <option>2</option>

                    </select>
                </div>
                <div class="form-group ">

                        <input type="text" class="form-control" name="number"  placeholder="Number" ><br>

                </div>
                <div class="form-group ">
                     <textarea name="custom_msg" class="form-control" rows="5"  placeholder="Write Your Own Massage " required></textarea>
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
