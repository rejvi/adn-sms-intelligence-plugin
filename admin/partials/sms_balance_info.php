
<div class="container-fluid">
    <form method="post" action="javascript:void(0)" id="custom_sms">
        <div class="row">

            <h4>
                <img src="<?php echo  PLUGIN_URL."/admin/image/adnsms.png" ?>">

                SMS Balance
            </h4>
            <?php if(API_KEY!=null && API_SECRET!=null){
                $sms = new \AdnSms\AdnSmsNotification();
                $sms =$sms->checkBalance();
                $balance = json_decode($sms);
               if(isset($balance)&&$balance->api_response_code==200) {
                ?>

                    <section class="info-boxes">
                        <?php if (isset($balance) && $balance->balance->sms!==null){ ?>
                        <div class="col-sm-4">
                        <div class="info-box ">
                            <div class="box-content">
                                Total SMS

                                <span class="big"<?php if($balance->balance->sms<=100){echo 'style="color:red"';}?>><?php echo $balance->balance->sms;?></span>

                            </div>
                        </div>
                        </div>
                    <?php }else{?>

                            <div class="col-sm-4">
                                <div class="info-box ">
                                    <div class="box-content">
                                        Account Type

                                        <span class="big">Postpaid</span>

                                    </div>
                                </div>
                            </div>

                        <?php }?>
                        <div class="col-sm-4">
                        <div class="info-box">


                            <div class="box-content">
                                Total SMS Usage
                                <span class="big"><?php echo $balance->usage->total_usage;?></span>
                            </div>
                        </div>
                        </div>
                            <div class="col-sm-4">
                        <div class="info-box ">
                            <div class="box-content">
                                Current Month Usage
                                <span class="big"><?php echo $balance->usage->current_month_usage;?></span>
                            </div>
                        </div>
                            </div>
                    </section>

            <?php }else{ ?>
                   <div class="col-sm-12">
                       <h4 class="p-tb-20px"> <i><b>
                        Something Went Wrong !
                               </b></i></h4>
                   </div>



            <?php }} else{ ?>
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
