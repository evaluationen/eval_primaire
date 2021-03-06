<div class="container">


    <h3><?php echo $title; ?></h3>



    <div class="row">
        <form method="post" action="<?php echo site_url('user/update_user/' . $uid); ?>">

            <div class="col-md-8">
                <br> 
                <div class="login-panel panel panel-default">
                    <div class="panel-body"> 



                        <?php
                        if ($this->session->flashdata('message')) {
                            echo $this->session->flashdata('message');
                        }
                        ?>	

                        <div class="form-group">	 
                            <?php echo $this->lang->line('group_name'); ?>: <?php echo $result['group_name']; ?> 
                        </div>
                        <div class="form-group">	 
                            <label for="inputEmail" class="sr-only"><?php echo $this->lang->line('login'); ?></label> 
                            <input type="text"  name="login"  class="form-control"  value="<?php echo $result['login']; ?>"  readonly="">
                        </div>
                        <div class="form-group">	 
                            <label for="inputEmail" class="sr-only"><?php echo $this->lang->line('first_name'); ?></label> 
                            <input type="text"  name="first_name"  class="form-control"  value="<?php echo $result['first_name']; ?>"  placeholder="<?php echo $this->lang->line('first_name'); ?>"   autofocus>
                        </div>
                        <div class="form-group">	 
                            <label for="inputEmail" class="sr-only"><?php echo $this->lang->line('last_name'); ?></label> 
                            <input type="text"   name="last_name"  class="form-control"  value="<?php echo $result['last_name']; ?>"  placeholder="<?php echo $this->lang->line('last_name'); ?>"   autofocus>
                        </div>
                        <div class="form-group">
                            <label for="birth" class="sr-only"><?php echo $this->lang->line('birth'); ?></label> 
                            <input type="date" class="datepicker form-control" value="<?php echo $this->base_model->date_fr($result['birth'])?>" placeholder="<?php echo $this->lang->line('birth'); ?>" name="birth" /> <span style="color:#abc"><b>(format : jj/mm/aaaa)</b></span>
                        </div>
                        
                         <div class="form-group">	 
                            <label for="inputEmail" class="sr-only"><?php echo $this->lang->line('email_address'); ?></label> 
                            <input type="text" id="inputEmail" name="email" value="<?php echo $result['email']; ?>" class="form-control" placeholder="<?php echo $this->lang->line('email_address'); ?>" autofocus>
                        </div>

                        <div class="form-group">	 
                            <label for="inputEmail" class="sr-only"><?php echo $this->lang->line('contact_no'); ?></label> 
                            <input type="text" name="contact_no"  class="form-control"  value="<?php echo $result['contact_no']; ?>"  placeholder="<?php echo $this->lang->line('contact_no'); ?>"   autofocus>
                        </div>
                        <div class="form-group">	 
                            <label   ><?php echo $this->lang->line('select_group'); ?></label> 
                            <select class="form-control" name="gid"  onChange="getexpiry();" id="gid">
                                <?php
                                foreach ($group_list as $key => $val) {
                                    ?>

                                    <option value="<?php echo $val['gid']; ?>" <?php if ($result['gid'] == $val['gid']) {
                                    echo 'selected';
                                } ?> ><?php echo $val['group_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">	 
                            <label for="inputEmail"  ><?php echo $this->lang->line('subscription_expired'); ?></label> 
                            <input type="text" name="subscription_expired"  id="subscription_expired" class="form-control" value="<?php if ($result['subscription_expired'] != '0') {
                                    echo date('Y-m-d', $result['subscription_expired']);
                                } else {
                                    echo '0';
                                } ?>" placeholder="<?php echo $this->lang->line('subscription_expired'); ?>"  value=""  autofocus>
                        </div>


                        <div class="form-group">	 
                            <label   ><?php echo $this->lang->line('account_type'); ?></label> 
                            <select class="form-control" name="su" id="typeacc" onchange="account_type()">
                                <option value="0" <?php if ($result['su'] == 0) {
                                    echo 'selected';
                                } ?>  ><?php echo $this->lang->line('user'); ?></option>
                                <option value="1" <?php if ($result['su'] == 1) {
                                    echo 'selected';
                                } ?>  ><?php echo $this->lang->line('administrator'); ?></option>
                            </select>
                        </div>
                        <div class="form-group invisible pwd">	  
					<label for="inputPassword" class="/*sr-only*/"><?php echo $this->lang->line('password');?></label>
					<input type="password" id="inputPassword" name="password"  class="form-control" placeholder="<?php echo $this->lang->line('password');?>"   >
			 </div>


                        <button class="btn btn-default" type="submit"><?php echo $this->lang->line('submit'); ?></button>

                    </div>
                </div>




            </div>
        </form>
    </div>



    <!--div class="row">
        <div class="col-md-8">
            <h3><?php echo $this->lang->line('payment_history'); ?></h3>
            <table class="table table-bordered">
                <tr>
                    <th><?php echo $this->lang->line('payment_gateway'); ?></th>
                    <th><?php echo $this->lang->line('paid_date'); ?> </th>
                    <th><?php echo $this->lang->line('amount'); ?></th>
                    <th><?php echo $this->lang->line('transaction_id'); ?> </th>
                    <th><?php echo $this->lang->line('status'); ?> </th>
                </tr>
                <?php
                if (count($payment_history) == 0) {
                    ?>
                    <tr>
                        <td colspan="5"><?php echo $this->lang->line('no_record_found'); ?></td>
                    </tr>	


    <?php
}
foreach ($payment_history as $key => $val) {
    ?>
                    <tr>
                        <td><?php echo $val['payment_gateway']; ?></td>
                        <td><?php echo date('Y-m-d H:i:s', $val['paid_date']); ?></td>
                        <td><?php echo $val['amount']; ?></td>
                        <td><?php echo $val['transaction_id']; ?></td>
                        <td><?php echo $val['payment_status']; ?></td>

                    </tr>

    <?php
}
?>
            </table>

        </div>

    </div-->






</div>