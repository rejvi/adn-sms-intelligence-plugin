<!---->
<!--    <link rel="stylesheet" href="--><?php //echo PLUGIN_URL.'/admin/css/bootstrap.min.css'?><!--">-->
<!--    <script src="--><?php //echo PLUGIN_URL.'/admin/js/jquery.min.js' ?><!--"></script>-->
<!--    <script src="--><?php //echo PLUGIN_URL.'/admin/js/bootstrap.min.js' ?><!--"></script>-->


<div class="container-fluid">
    <form method="post" action="options.php">
        <div class="row">

            <h3>
                <img src="<?php echo  PLUGIN_URL."/admin/image/adnsms.png" ?>">

               SMS Notification Settings
            </h3>

            <h4 class="mr_b_15px"> <i><b>Notification Settings for User </b></i></h4>
            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 control-label ">Send SMS on Login :</label>
                    <div class="col-sm-12 col-md-2">
                        <div class="input-group">
                            <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm active" data-toggle="send_sms_login" data-title="Yes">YES</a>
                                <a class="btn btn-primary btn-sm notActive" data-toggle="send_sms_login" data-title="No">NO</a>
                            </div>
                            <input type="hidden" name="send_sms_login" id="send_sms_login" value="Yes">
                        </div>
                    </div>

                    <label class="col-sm-12 col-md-2 control-label" for="login_msg">Login Massage :</label>
                    <div class="col-sm-12 col-md-5">

                        <textarea name="login_msg" class="form-control" rows="3" id="login_msg" placeholder="Login Massage" required></textarea>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 control-label ">Send SMS on Registration :</label>
                    <div class="col-sm-12 col-md-2">
                        <div class="input-group">
                            <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm active" data-toggle="send_sms_registration" data-title="Yes">YES</a>
                                <a class="btn btn-primary btn-sm notActive" data-toggle="send_sms_registration" data-title="No">NO</a>
                            </div>
                            <input type="hidden" name="send_sms_registration" id="send_sms_registration" value="Yes">
                        </div>
                    </div>
                    <label class="col-sm-12 col-md-2 control-label" for="registration_msg">Registration Massage :</label>
                    <div class="col-sm-12 col-md-5">

                        <textarea name="registration_msg" class="form-control" rows="3" id="registration_msg" placeholder="Registration Massage " required></textarea>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 control-label ">Send SMS on Password Reset :</label>
                    <div class="col-sm-12 col-md-2">
                        <div class="input-group">
                            <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm active" data-toggle="send_sms_password_reset" data-title="Yes">YES</a>
                                <a class="btn btn-primary btn-sm notActive" data-toggle="send_sms_password_reset" data-title="No">NO</a>
                            </div>
                            <input type="hidden" name="send_sms_password_reset" id="send_sms_password_reset" value="Yes">
                        </div>
                    </div>
                    <label class="col-sm-12 col-md-2 control-label" for="password_reset_msg">Password Reset Massage :</label>
                    <div class="col-sm-12 col-md-5">

                        <textarea name="password_reset_msg" class="form-control" rows="3" id="password_reset_msg" placeholder="Password Reset Massage " required></textarea>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 control-label ">Send SMS on User Birthday :</label>
                    <div class="col-sm-12 col-md-2">
                        <div class="input-group">
                            <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm active" data-toggle="send_sms_password_birthday" data-title="Yes">YES</a>
                                <a class="btn btn-primary btn-sm notActive" data-toggle="send_sms_password_birthday" data-title="No">NO</a>
                            </div>
                            <input type="hidden" name="send_sms_password_birthday" id="send_sms_password_birthday" value="Yes">
                        </div>
                    </div>
                    <label class="col-sm-12 col-md-2 control-label" for="password_birthday_msg">User Birthday Massage :</label>
                    <div class="col-sm-12 col-md-5">

                        <textarea name="password_birthday_msg" class="form-control" rows="3" id="password_birthday_msg" placeholder="User Birthday Massage " required></textarea>
                    </div>
                </div>
            </div>


            <h4  class="mr_b_15px"> <i><b>Notification Settings for Woocommerce Order</b></i></h4>


        <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 control-label ">Send SMS on Pending:</label>
                    <div class="col-sm-12 col-md-2">
                        <div class="input-group">
                            <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm active" data-toggle="send_sms_pending" data-title="Yes">YES</a>
                                <a class="btn btn-primary btn-sm notActive" data-toggle="send_sms_pending" data-title="No">NO</a>
                            </div>
                            <input type="hidden" name="send_sms_pending" id="send_sms_pending" value="Yes">
                        </div>
                    </div>
                    <label class="col-sm-12 col-md-2 control-label" for="pending_msg">Pending Massage :</label>
                    <div class="col-sm-12 col-md-5">

                        <textarea name="pending_msg" class="form-control" rows="3" id="pending_msg" placeholder="Pending Massage " required></textarea>
                    </div>
                </div>
        </div>

            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 control-label ">Send SMS on Processing:</label>
                    <div class="col-sm-12 col-md-2">
                        <div class="input-group">
                            <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm active" data-toggle="send_sms_processing" data-title="Yes">YES</a>
                                <a class="btn btn-primary btn-sm notActive" data-toggle="send_sms_processing" data-title="No">NO</a>
                            </div>
                            <input type="hidden" name="send_sms_processing" id="send_sms_processing" value="Yes">
                        </div>
                    </div>
                    <label class="col-sm-12 col-md-2 control-label" for="processing_msg">Processing Massage :</label>
                    <div class="col-sm-12 col-md-5">

                        <textarea name="processing_msg" class="form-control" rows="3" id="processing_msg" placeholder="Processing Massage " required></textarea>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 control-label ">Send SMS on Shipped:</label>
                    <div class="col-sm-12 col-md-2">
                        <div class="input-group">
                            <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm active" data-toggle="send_sms_shipped" data-title="Yes">YES</a>
                                <a class="btn btn-primary btn-sm notActive" data-toggle="send_sms_shipped" data-title="No">NO</a>
                            </div>
                            <input type="hidden" name="send_sms_shipped" id="send_sms_shipped" value="Yes">
                        </div>
                    </div>
                    <label class="col-sm-12 col-md-2 control-label" for="shipped_msg">Shipped Massage :</label>
                    <div class="col-sm-12 col-md-5">

                        <textarea name="shipped_msg" class="form-control" rows="3" id="shipped_msg" placeholder="Shipped Massage " required></textarea>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 control-label ">Send SMS on Completed:</label>
                    <div class="col-sm-12 col-md-2">
                        <div class="input-group">
                            <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm active" data-toggle="send_sms_completed" data-title="Yes">YES</a>
                                <a class="btn btn-primary btn-sm notActive" data-toggle="send_sms_completed" data-title="No">NO</a>
                            </div>
                            <input type="hidden" name="send_sms_completed" id="send_sms_completed" value="Yes">
                        </div>
                    </div>
                    <label class="col-sm-12 col-md-2 control-label" for="completed_msg">Completed Massage :</label>
                    <div class="col-sm-12 col-md-5">

                        <textarea name="completed_msg" class="form-control" rows="3" id="completed_msg" placeholder="Completed Massage " required></textarea>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 control-label ">Send SMS on Cancelled:</label>
                    <div class="col-sm-12 col-md-2">
                        <div class="input-group">
                            <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm active" data-toggle="send_sms_cancelled" data-title="Yes">YES</a>
                                <a class="btn btn-primary btn-sm notActive" data-toggle="send_sms_cancelled" data-title="No">NO</a>
                            </div>
                            <input type="hidden" name="send_sms_cancelled" id="send_sms_cancelled" value="Yes">
                        </div>
                    </div>
                    <label class="col-sm-12 col-md-2 control-label" for="cancelled_msg">Cancelled Massage :</label>
                    <div class="col-sm-12 col-md-5">

                        <textarea name="`" class="form-control" rows="3" id="cancelled_msg" placeholder="Cancelled Massage " required></textarea>
                    </div>
                </div>

            </div>



        </div>
        <div class="row">

            <div class="col-sm-12 col-md-12 ">
                <?php
                submit_button();
                ?>
            </div>
        </div>
    </form>
</div>

<footer class="container-fluid">
    <i class="stars">
        If you like ADNsms Intelligence Plugin please leave us a <a  href="#">★★★★★</a> rating. A huge thanks in advance!
    </i>
</footer>
<script>

</script>
