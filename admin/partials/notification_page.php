
<div class="container-fluid">
    <form method="post" action="javascript:void(0)" id="formNotify">
        <div class="row">

            <h4>
                <img src="<?php echo  PLUGIN_URL."/admin/image/adnsms.png" ?>">
               SMS Notification Settings

            </h4>
            <div class="col-sm-12">
                <?php if(API_KEY!=null && API_SECRET!=null){?>
                    <h4 class="text-center " style="color: #694c90;}">Dynamic SMS Body Keywords: <span style="color: red">[USER_NAME]</span> = Customer Name , <span style="color: red">[ORDER_ID]</span> = Order ID, <span style="color: red">[AMOUNT]</span> = Total Amount, <span style="color: red">[SITE_NAME]</span> = Website Name.  </h4>
                <?php } ?>
            <h4 class="p-tb-20px"> <i><b>
                 <?php if(API_KEY!=null && API_SECRET!=null){
                     echo 'Notification Settings for User';
                 }
                 else{
                       $url = admin_url('admin.php?page=adn-sms-intelligence');
                        echo "Set API KEY & API SECRET <a href='$url'>Click Here</a> ";
                 }?>
              </b></i></h4>
            <?php
            $result = get_option('adn_notify_opt');
            ?>
            </div>
    <?php if(API_KEY!=null && API_SECRET!=null) {?>

            <div class="col-sm-12">

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 control-label ">Send SMS on Registration :</label>
                    <div class="col-sm-12 col-md-2">
                        <div class="input-group">
                            <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm <?php if($result['send_sms_registration']=='Yes'){ echo 'active';}else{echo 'notActive';}?> " id="registration_yes" data-toggle="send_sms_registration" data-title="Yes">YES</a>
                                <a class="btn btn-primary btn-sm <?php if($result['send_sms_registration']=='No'){ echo 'active';}else{echo 'notActive';}?> " id="registration_no" data-toggle="send_sms_registration" data-title="No">NO</a>
                            </div>
                            <input type="hidden" name="send_sms_registration" id="send_sms_registration" value="<?php if(isset($result['send_sms_registration'])){echo $result['send_sms_registration'];}else{echo('Yes');}  ?>">
                        </div>
                    </div>  
                    <label class="col-sm-12 col-md-2 control-label" for="registration_msg">Registration Massage :</label>
                    <div class="col-sm-12 col-md-5">

                        <textarea name="registration_msg" class="form-control" rows="3" id="registration_msg" placeholder="Registration Massage " required  <?php if($result['send_sms_registration']=='No'){ echo 'readonly="readonly"';} ?>><?php echo $result['registration_msg']; ?></textarea>
                    </div>
                    <div class="hidden-xs hidden-sm col-md-1">
                        <div class="tooltips">   <img src="<?php echo  PLUGIN_URL."/admin/image/help-icon.png" ?>" style="width: 25px;">
                            <span class="tooltipstext">Note: Keyword Must be capitalized and should not contain any other keyword except [USER_NAME],[ORDER_ID],[AMOUNT] & [SITE_NAME].</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 control-label ">Send SMS on Password Reset :</label>
                    <div class="col-sm-12 col-md-2">
                        <div class="input-group">
                            <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm <?php if($result['send_sms_password_reset']=='Yes'){ echo 'active';}else{echo 'notActive';}?>" id="password_reset_yes" data-toggle="send_sms_password_reset" data-title="Yes">YES</a>
                                <a class="btn btn-primary btn-sm <?php if($result['send_sms_password_reset']=='No'){ echo 'active';}else{echo 'notActive';}?>" id="password_reset_no" data-toggle="send_sms_password_reset" data-title="No">NO</a>
                            </div>
                            <input type="hidden" name="send_sms_password_reset" id="send_sms_password_reset" value="<?php if(isset($result['send_sms_password_reset'])){echo $result['send_sms_password_reset'];}else{echo('Yes');} ?>">
                        </div>
                    </div>

                    <label class="col-sm-12 col-md-2 control-label" for="password_reset_msg">Password Reset Massage :</label>
                    <div class="col-sm-12 col-md-5">

                        <textarea name="password_reset_msg" class="form-control" rows="3" id="password_reset_msg" placeholder="Password Reset Massage " required <?php if($result['send_sms_password_reset']=='No'){ echo 'readonly="readonly"';} ?> ><?php echo $result['password_reset_msg']; ?></textarea>
                    </div>
                    <div class="hidden-xs hidden-sm col-md-1">
                        <div class="tooltips">   <img src="<?php echo  PLUGIN_URL."/admin/image/help-icon.png" ?>" style="width: 25px;">
                            <span class="tooltipstext">Note: Keyword Must be capitalized and should not contain any other keyword except [USER_NAME],[ORDER_ID],[AMOUNT] & [SITE_NAME].</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 ">
            <h4  class="p-tb-20px"> <i><b>Notification Settings for Woocommerce Order</b></i></h4>

            </div>


            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 control-label ">Send SMS on New Order:</label>
                    <div class="col-sm-12 col-md-2">
                        <div class="input-group">
                            <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm <?php if($result['send_sms_new_order']=='Yes'){ echo 'active';}else{echo 'notActive';}?>" id="new_order_yes" data-toggle="send_sms_new_order" data-title="Yes">YES</a>
                                <a class="btn btn-primary btn-sm <?php if($result['send_sms_new_order']=='No'){ echo 'active';}else{echo 'notActive';}?>" id="new_order_no" data-toggle="send_sms_new_order" data-title="No">NO</a>
                            </div>
                            <input type="hidden" name="send_sms_new_order" id="send_sms_new_order" value="<?php if(isset($result['send_sms_new_order'])){echo $result['send_sms_new_order'];}else{echo('Yes');} ?>">
                        </div>
                    </div>

                    <label class="col-sm-12 col-md-2 control-label" for="pending_msg">New Order Massage :</label>
                    <div class="col-sm-12 col-md-5">

                        <textarea name="new_order_msg" class="form-control" rows="3" id="new_order_msg" placeholder="Pending Massage " required <?php if($result['send_sms_new_order']=='No'){ echo 'readonly="readonly"';} ?>><?php echo $result['new_order_msg']; ?></textarea>
                    </div>
                    <div class="hidden-xs hidden-sm col-md-1">
                        <div class="tooltips">   <img src="<?php echo  PLUGIN_URL."/admin/image/help-icon.png" ?>" style="width: 25px;">
                            <span class="tooltipstext">Note: Keyword Must be capitalized and should not contain any other keyword except [USER_NAME],[ORDER_ID],[AMOUNT] & [SITE_NAME].</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 control-label ">Send SMS on On Hold:</label>
                    <div class="col-sm-12 col-md-2">
                        <div class="input-group">
                            <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm <?php if($result['send_sms_on_hold']=='Yes'){ echo 'active';}else{echo 'notActive';}?>" id="on_hold_yes" data-toggle="send_sms_on_hold" data-title="Yes">YES</a>
                                <a class="btn btn-primary btn-sm <?php if($result['send_sms_on_hold']=='No'){ echo 'active';}else{echo 'notActive';}?>" id="on_hold_no" data-toggle="send_sms_on_hold" data-title="No">NO</a>
                            </div>
                            <input type="hidden" name="send_sms_on_hold" id="send_sms_on_hold" value="<?php if(isset($result['send_sms_on_hold'])){echo $result['send_sms_on_hold'];}else{echo('Yes');} ?>">
                        </div>
                    </div>

                    <label class="col-sm-12 col-md-2 control-label" for="pending_msg">On Hold Massage :</label>
                    <div class="col-sm-12 col-md-5">

                        <textarea name="on_hold_msg" class="form-control" rows="3" id="on_hold_msg" placeholder="On Hold Massage " required <?php if($result['send_sms_on_hold']=='No'){ echo 'readonly="readonly"';} ?>><?php echo $result['on_hold_msg']; ?></textarea>
                    </div>
                    <div class="hidden-xs hidden-sm col-md-1">
                        <div class="tooltips">   <img src="<?php echo  PLUGIN_URL."/admin/image/help-icon.png" ?>" style="width: 25px;">
                            <span class="tooltipstext">Note: Keyword Must be capitalized and should not contain any other keyword except [USER_NAME],[ORDER_ID],[AMOUNT] & [SITE_NAME].</span>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 control-label ">Send SMS on Pending:</label>
                    <div class="col-sm-12 col-md-2">
                        <div class="input-group">
                            <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm <?php if($result['send_sms_pending']=='Yes'){ echo 'active';}else{echo 'notActive';}?>" id="pending_yes" data-toggle="send_sms_pending" data-title="Yes">YES</a>
                                <a class="btn btn-primary btn-sm <?php if($result['send_sms_pending']=='No'){ echo 'active';}else{echo 'notActive';}?>" id="pending_no" data-toggle="send_sms_pending" data-title="No">NO</a>
                            </div>
                            <input type="hidden" name="send_sms_pending" id="send_sms_pending" value="<?php if(isset($result['send_sms_pending'])){echo $result['send_sms_pending'];}else{echo('Yes');} ?>">
                        </div>
                    </div>

                    <label class="col-sm-12 col-md-2 control-label" for="pending_msg">Pending Massage :</label>
                    <div class="col-sm-12 col-md-5">

                        <textarea name="pending_msg" class="form-control" rows="3" id="pending_msg" placeholder="Pending Massage " required <?php if($result['send_sms_pending']=='No'){ echo 'readonly="readonly"';} ?>><?php echo $result['pending_msg']; ?></textarea>
                    </div>
                    <div class="hidden-xs hidden-sm col-md-1">
                        <div class="tooltips">   <img src="<?php echo  PLUGIN_URL."/admin/image/help-icon.png" ?>" style="width: 25px;">
                            <span class="tooltipstext">Note: Keyword Must be capitalized and should not contain any other keyword except [USER_NAME],[ORDER_ID],[AMOUNT] & [SITE_NAME].</span>
                        </div>
                    </div>
                </div>
        </div>

            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 control-label ">Send SMS on Processing:</label>
                    <div class="col-sm-12 col-md-2">
                        <div class="input-group">
                            <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm <?php if($result['send_sms_processing']=='Yes'){ echo 'active';}else{echo 'notActive';}?>" id="processing_yes" data-toggle="send_sms_processing" data-title="Yes">YES</a>
                                <a class="btn btn-primary btn-sm <?php if($result['send_sms_processing']=='No'){ echo 'active';}else{echo 'notActive';}?>" id="processing_no"  data-toggle="send_sms_processing" data-title="No">NO</a>
                            </div>
                            <input type="hidden" name="send_sms_processing" id="send_sms_processing" value="<?php if(isset($result['send_sms_processing'])){echo $result['send_sms_processing'];}else{echo('Yes');} ?>">
                        </div>
                    </div>
                    <label class="col-sm-12 col-md-2 control-label" for="processing_msg">Processing Massage :</label>
                    <div class="col-sm-12 col-md-5">

                        <textarea name="processing_msg" class="form-control" rows="3" id="processing_msg" placeholder="Processing Massage " required <?php if($result['send_sms_processing']=='No'){ echo 'readonly="readonly"';} ?>><?php echo $result['processing_msg']; ?></textarea>
                    </div>
                    <div class="hidden-xs hidden-sm col-md-1">
                        <div class="tooltips">   <img src="<?php echo  PLUGIN_URL."/admin/image/help-icon.png" ?>" style="width: 25px;">
                            <span class="tooltipstext">Note: Keyword Must be capitalized and should not contain any other keyword except [USER_NAME],[ORDER_ID],[AMOUNT] & [SITE_NAME].</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 control-label ">Send SMS on Failed:</label>
                    <div class="col-sm-12 col-md-2">
                        <div class="input-group">
                            <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm <?php if($result['send_sms_failed']=='Yes'){ echo 'active';}else{echo 'notActive';}?>"  id="failed_yes" data-toggle="send_sms_failed" data-title="Yes">YES</a>
                                <a class="btn btn-primary btn-sm <?php if($result['send_sms_failed']=='No'){ echo 'active';}else{echo 'notActive';}?>" 
                                id="failed_no" data-toggle="send_sms_failed" data-title="No">NO</a>
                            </div>
                            <input type="hidden" name="send_sms_failed" id="send_sms_failed" value="<?php if(isset($result['send_sms_failed'])){echo $result['send_sms_failed'];}else{echo('Yes');} ?>">
                        </div>
                    </div>
                    <label class="col-sm-12 col-md-2 control-label" for="failed_msg">Failed Massage :</label>
                    <div class="col-sm-12 col-md-5">

                        <textarea name="failed_msg" class="form-control" rows="3" id="failed_msg" placeholder="Failed Massage " required <?php if($result['send_sms_failed']=='No'){ echo 'readonly="readonly"';} ?>><?php echo $result['failed_msg']; ?></textarea>
                    </div>
                    <div class="hidden-xs hidden-sm col-md-1">
                        <div class="tooltips">   <img src="<?php echo  PLUGIN_URL."/admin/image/help-icon.png" ?>" style="width: 25px;">
                            <span class="tooltipstext">Note: Keyword Must be capitalized and should not contain any other keyword except [USER_NAME],[ORDER_ID],[AMOUNT] & [SITE_NAME].</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 control-label ">Send SMS on Completed:</label>
                    <div class="col-sm-12 col-md-2">
                        <div class="input-group">
                            <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm <?php if($result['send_sms_completed']=='Yes'){ echo 'active';}else{echo 'notActive';}?>" id="completed_yes" data-toggle="send_sms_completed" data-title="Yes">YES</a>
                                <a class="btn btn-primary btn-sm <?php if($result['send_sms_completed']=='No'){ echo 'active';}else{echo 'notActive';}?>" id="completed_no" data-toggle="send_sms_completed" data-title="No">NO</a>
                            </div>
                            <input type="hidden" name="send_sms_completed" id="send_sms_completed" value="<?php if(isset($result['send_sms_completed'])){echo $result['send_sms_completed'];}else{echo('Yes');} ?>">
                        </div>
                    </div>

                    <label class="col-sm-12 col-md-2 control-label" for="completed_msg">Completed Massage :</label>
                    <div class="col-sm-12 col-md-5">

                        <textarea name="completed_msg" class="form-control" rows="3" id="completed_msg" placeholder="Completed Massage " required <?php if($result['send_sms_completed']=='No'){ echo 'readonly="readonly"';} ?>><?php echo $result['completed_msg']; ?></textarea>
                    </div>
                    <div class="hidden-xs hidden-sm col-md-1">
                        <div class="tooltips">   <img src="<?php echo  PLUGIN_URL."/admin/image/help-icon.png" ?>" style="width: 25px;">
                            <span class="tooltipstext">Note: Keyword Must be capitalized and should not contain any other keyword except [USER_NAME],[ORDER_ID],[AMOUNT] & [SITE_NAME].</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 control-label ">Send SMS on Cancelled:</label>
                    <div class="col-sm-12 col-md-2">
                        <div class="input-group">
                            <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm <?php if($result['send_sms_cancelled']=='Yes'){ echo 'active';}else{echo 'notActive';}?>" id="cancelled_yes" data-toggle="send_sms_cancelled" data-title="Yes">YES</a>
                                <a class="btn btn-primary btn-sm <?php if($result['send_sms_cancelled']=='No'){ echo 'active';}else{echo 'notActive';}?>" id="cancelled_no" data-toggle="send_sms_cancelled" data-title="No">NO</a>
                            </div>
                            <input type="hidden" name="send_sms_cancelled" id="send_sms_cancelled" value="<?php if(isset($result['send_sms_cancelled'])){echo $result['send_sms_cancelled'];}else{echo('Yes');} ?>">
                        </div>
                    </div>

                    <label class="col-sm-12 col-md-2 control-label" for="cancelled_msg">Cancelled Massage :</label>
                    <div class="col-sm-12 col-md-5">

                        <textarea name="cancelled_msg" class="form-control" rows="3" id="cancelled_msg" placeholder="Cancelled Massage " required <?php if($result['send_sms_cancelled']=='No'){ echo 'readonly="readonly"';} ?>><?php echo $result['cancelled_msg']; ?></textarea>

                    </div>
                    <div class="hidden-xs hidden-sm col-md-1">
                    <div class="tooltips">   <img src="<?php echo  PLUGIN_URL."/admin/image/help-icon.png" ?>" style="width: 25px;">
                        <span class="tooltipstext">Note: Keyword Must be capitalized and should not contain any other keyword except [USER_NAME],[ORDER_ID],[AMOUNT] & [SITE_NAME].</span>
                    </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 control-label ">Send SMS on Refunded:</label>
                    <div class="col-sm-12 col-md-2">
                        <div class="input-group">
                            <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm <?php if($result['send_sms_refunded']=='Yes'){ echo 'active';}else{echo 'notActive';}?>" id="refunded_yes" data-toggle="send_sms_refunded" data-title="Yes">YES</a>
                                <a class="btn btn-primary btn-sm <?php if($result['send_sms_refunded']=='No'){ echo 'active';}else{echo 'notActive';}?>" id="refunded_no" data-toggle="send_sms_refunded" data-title="No">NO</a>
                            </div>
                            <input type="hidden" name="send_sms_refunded" id="send_sms_refunded" value="<?php if(isset($result['send_sms_refunded'])){echo $result['send_sms_refunded'];}else{echo('Yes');} ?>">
                        </div>
                    </div>

                    <label class="col-sm-12 col-md-2 control-label" for="pending_msg">Refunded Massage :</label>
                    <div class="col-sm-12 col-md-5">

                        <textarea name="refunded_msg" class="form-control" rows="3" id="refunded_msg" placeholder="Refunded Massage " required <?php if($result['send_sms_refunded']=='No'){ echo 'readonly="readonly"';} ?>><?php echo $result['refunded_msg']; ?></textarea>
                    </div>
                    <div class="hidden-xs hidden-sm col-md-1">

                        <div class="tooltips">   <img src="<?php echo  PLUGIN_URL."/admin/image/help-icon.png" ?>" style="width: 25px;">
                            <span class="tooltipstext">Note: Keyword Must be capitalized and should not contain any other keyword except [USER_NAME],[ORDER_ID],[AMOUNT] & [SITE_NAME].</span>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">

            <div class="col-sm-12 col-md-12 ">
                <?php
//                wp_nonce_field('notification_action_nonce','notification_name_nonce');
                submit_button();
                ?>
            </div>
        </div>
        <?php } ?>
    </form>

</div>

<?php  include(__DIR__ . '/_footer.php'); ?>
<script>
    jQuery(function () {
        jQuery('#formNotify').validate({
            submitHandler:function () {
                var adnnonce = "<?php echo wp_create_nonce('adn_notification_nonce') ;?>";
                var postdata= jQuery("#formNotify").serialize() +"&action=adnajax&_ajax_nonce="+adnnonce;

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
