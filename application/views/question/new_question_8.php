<div class="container">
    <h3><?php echo $title; ?></h3>
    <div class="row">
        <form method="post" action="<?php echo site_url('qbank/new_question/8/' . $nop); ?>">
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
                            <h4 class="title-typeq"> <?php echo $this->lang->line('cases_syllabes'); ?></h4>
                        </div>
                        <div class="form-group">	 
                            <label><?php echo $this->lang->line('select_category'); ?></label> 
                            <select class="form-control catg" name="cid">
                                <option selected="selected" value="-1"><?php echo $this->lang->line('select_category');?></option>
                                <?php
                                foreach ($category_list as $key => $val) {
                                    ?>
                                    <option value="<?php echo $val['cid']; ?>"><?php echo $val['category_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">	 
                            <label><?php echo $this->lang->line('select_sub_category'); ?></label> 
                            <select class="form-control sub-catg" name="scid">
                                <option selected="selected"><?php echo $this->lang->line('select_sub_category');?></option>
                            </select>
                        </div>
                        <div class="form-group">	 
                            <label   ><?php echo $this->lang->line('select_level'); ?></label> 
                            <select class="form-control" name="lid">
                                <?php
                                foreach ($level_list as $key => $val) {
                                    ?>

                                    <option value="<?php echo $val['lid']; ?>"><?php echo $val['level_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                         <!-- begin form question-->
                         
                        <div class="form-group pquestion">
                            <label><?php echo $this->lang->line('attach_group_question');?></label><!--Rattaché à un sujet-->
                            <input type="checkbox" id="check-object" name="is_check-parent">
                        </div>
                        <!-- liste des sujets -->
                        <div class="form-group">
                            <select name="pqid" class="object-list form-control">
                                <option></option>
                            </select>
                        </div>
                         <div class="form-group">	 
                            <label for="description"  ><?php echo $this->lang->line('order'); ?></label> 
                            <textarea  name="description"  class="form-control"></textarea>
                        </div>
                        <div class="form-group">	 
                            <label for="question"  ><?php echo $this->lang->line('question'); ?></label> 
                            <textarea  name="question"  class="form-control"   ></textarea>
                        </div>
                       
                        <label style="font-variant: all-petite-caps"><?php echo $this->lang->line('options'); ?></label>
                        <?php
                        for ($i = 1; $i <= $nop; $i++) {
                            ?>
                            <div class="form-group">	 
                                <label for="score"  ><?php //echo $this->lang->line('options'); ?> <?php echo 'Case N°[' . $i . ']'; ?></label> <br>
                                <input type="checkbox" name="score[]" value="<?php echo $i - 1; ?>" <?php if ($i == 1) {
                            echo 'checked';
                        } ?> > Select Correct Option 
                                <br><textarea  name="option[]"  class="form-control" style="display: none"></textarea>
                            </div>
                            <?php
                        }
                        ?>
                        <button class="btn btn-default" type="submit"><?php echo $this->lang->line('submit'); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>