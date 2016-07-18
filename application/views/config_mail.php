<div class="container">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body"> 
                <form method="post" class="form-signin" action="<?php echo site_url('user/config_mail'); ?>">
                    <h3 class="form-signin-heading"><?php echo $this->lang->line('select_mail_admin'); ?></h3>
                    <?php
                    if ($this->session->flashdata('message')) {
                        ?>
                        <div>
                            <?php echo $this->session->flashdata('message'); ?>
                        </div>
                        <?php
                    }
                    ?>				  
                    <div class="form-group">
                        <input type="hidden" value="CONF_MAIL_QUIZ" name="const"/>
                        <label><?php echo $this->lang->line('select_admin'); ?></label> 
                        <?php echo form_dropdown('uid_conf', $admin, set_value('uid_conf', $default_selected)); ?>
                    </div>

                    <div class="form-group">	  

                        <button class="btn btn-lg btn-info" type="submit"><?php echo $this->lang->line('submit'); ?></button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="col-md-4">


    </div>



</div>