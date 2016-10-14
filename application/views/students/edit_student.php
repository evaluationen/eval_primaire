<?php $this->load->view('header') ?>
<div class="container">


    <h3><?php echo $title;?></h3>
    <div class="row">
        <form method="post" action="<?php echo site_url('student/edit/'.$result['stid'] ); ?>">
            <input type="hidden" name="action" value="update"/>
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
                            <label for="last_name"><?php echo $this->lang->line('last_name'); ?></label> 
                            <input type="text" required=""  name="last_name"  class="form-control" placeholder="<?php echo $this->lang->line('last_name'); ?>" value="<?php echo isset($result['last_name']) ? $result['last_name'] : ''?>"  autofocus>
                        </div>
                        <div class="form-group">	 
                            <label for="first_name"><?php echo $this->lang->line('first_name'); ?></label> 
                            <input type="text" required=""  name="first_name"  class="form-control" placeholder="<?php echo $this->lang->line('first_name'); ?>" value="<?php echo isset($result['first_name']) ? $result['first_name'] : ''?>"  autofocus>
                        </div>
                        <div class="form-group">
                            <label for="birth" class="sr-only"><?php echo $this->lang->line('birth'); ?></label> 
                            <input type="text" class="datepicker form-control" placeholder="<?php echo $this->lang->line('birth'); ?>" name="birth" value="<?php echo isset($result['birth']) ? $this->base_model->date_fr($result['birth']) : ''?>" /> <span style="color:#abc"><b>(format : jj/mm/aaaa)</b></span>
                        </div>
                        
                        <div class="form-group">	 
                            <label for="inputEmail" class="sr-only"><?php echo $this->lang->line('contact_no'); ?></label> 
                            <input type="text" name="contact_no"  class="form-control" placeholder="<?php echo $this->lang->line('contact_no'); ?>" value="<?php echo isset($result['contact_no']) ? $result['contact_no'] : ''?>"  autofocus>
                        </div>
                        
                        <div class="form-group">
                            <label for=""><?php echo $this->lang->line('school')?></label>
                            <select class="form-control" name="eid" >
                                <?php foreach ($school_list as $key => $val) :?>
                                    <option <?php echo($val->eid == $result['etab_org']) ? "selected" : '';?>  value="<?php echo $val->eid; ?>"><?php echo  '['. $val->rne_etab.'] ' . $val->etab ; ?></option>
                                    <?php endforeach;  ?>
                            </select>        
                        </div>
                        
                                                
                        <div class="form-group">	 
                            <label><?php echo $this->lang->line('select_group'); ?></label> 
                            <select class="form-control" name="gid" id="gid" onChange="getexpiry();">
                                <?php
                                foreach ($group_list as $key => $val) {
                                    ?>
                                    <?php if($val['gid'] != 1) :?>
                                    <option <?php echo($val['gid'] == $result['gid']) ? "selected" : '';?> value="<?php echo $val['gid']; ?>"><?php echo $val['group_name']; ?></option>
                                    <?php endif; ?>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <!--div class="form-group">	 
                            <label   ><?php echo $this->lang->line('select_class'); ?></label> 
                            <select class="form-control" name="clid" id="gid" >
                                <?php
                                foreach ($class_list as $key => $val) {
                                    ?>
                                    <?php ?>
                                    <option value="<?php echo $val->clid; ?>"><?php echo $val->code; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div-->
                        <!--div class="form-group invisible pwd">	  
					<label for="inputPassword" class="/*sr-only*/"><?php echo $this->lang->line('password');?></label>
                                        <input type="password" id="inputPassword" name="password"  class="form-control" placeholder="<?php echo $this->lang->line('password');?>" required value="<?php echo $this->config->item('user_password') ?>" >
			 </div-->


                        <button class="btn btn-default" type="submit"><?php echo $this->lang->line('submit'); ?></button>

                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

<?php $this->load->view('footer'); ?>