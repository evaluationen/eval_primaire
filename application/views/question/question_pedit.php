<?php $this->load->view('header'); ?>
<div class="container">
    <h3><?php echo $title;?></h3>
    <div class="row">
        <form method="post" action="<?php echo site_url('qbank/group_question_edit/'.$pquestion->pqid); ?>">
            <div class="col-md-8">
                <br> 
                <div class="login-panel panel panel-default">
                    <div class="panel-body"> 
                        <?php
                        if ($this->session->flashdata('message')) {
                            echo $this->session->flashdata('message');
                        }
                        ?>
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                        <input type="hidden" name="action" value="update"/>
                        <div class="form-group">	 
                            <label for="title"  ><?php echo $this->lang->line('title'); ?></label> 
                            <input type="text" required=""  name="title"  class="form-control" value="<?php echo isset($pquestion->title) ? $pquestion->title : ""; ?>" placeholder="<?php echo $this->lang->line('title');?>">
                        </div>
                        <div class="form-group">	 
                            <label><?php echo $this->lang->line('select_category'); ?></label> 
                            <select class="form-control" name="cid">
                                <?php
                                foreach ($category_list as $key => $val) {
                                    ?>
                                    <option value="<?php echo $val['cid']; ?>"  <?php  if($pquestion->cid == $val['cid']) { echo "selected";} ?>><?php echo $val['category_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">	 
                            <label for="description"  ><?php echo $this->lang->line('description'); ?></label> 
                            <textarea  name="description"  class="form-control"><?php echo isset($pquestion->description) ? $pquestion->description : ""; ?></textarea>
                            <?php //echo form_error('description'); ?>
                        </div>
                        <button class="btn btn-default" type="submit"><?php echo $this->lang->line('submit'); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('footer'); ?>