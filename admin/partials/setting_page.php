<link rel="stylesheet" href="<?php echo PLUGIN_URL.'/admin/css/bootstrap.min.css'?>">
<script src="<?php echo PLUGIN_URL.'/admin/js/jquery.min.js' ?>"></script>
<script src="<?php echo PLUGIN_URL.'/admin/js/bootstrap.min.js' ?>"></script>

    <div class="container-fluid">
      <form method="post" action="javascript:void(0)" id="formId">
        <div class="row">

            <h3>
                <img src="<?php echo  PLUGIN_URL."/admin/image/adnsms.png" ?>">

                General Settings
            </h3>


            <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="api_key" class="col-sm-4 col-md-4 control-label ">API Key :</label>
                            <div class="col-sm-8 col-md-8">
                            <input type="text" class="form-control" name="api_key" id="api_key" placeholder="API Key" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="api_secret" class="col-sm-4 col-md-4 control-label ">API Secret :</label>
                            <div class="col-sm-8 col-md-8 ">
                            <input type="password" class="form-control"  name="password"  id="api_secret" placeholder="API Secret" required>
                            </div>
                        </div>

                <?php
                submit_button('Save');
                ?>

            </div>

        </div>
        </form>
    </div>

    <footer class="container-fluid">
        <i class="stars">  If you like ADNsms Intelligence Plugin please leave us a <a href="#">★★★★★</a> rating. A huge thanks in advance!</i>
    </footer>
    <script>
        $('#radioBtn a').on('click', function(){
            var sel = $(this).data('title');
            var tog = $(this).data('toggle');
            $('#'+tog).prop('value', sel);

            $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
            $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
        })
    </script>
