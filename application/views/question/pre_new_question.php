<div class="container">
    <h3><?php echo $title; ?></h3>
    <div class="row">
        <form method="post" action="<?php echo site_url('qbank/pre_new_question/'); ?>">
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
                            <label   ><?php echo $this->lang->line('select_question_type'); ?></label> 
                            <select class="form-control" name="question_type" onChange="hidenop(this.value);" id="select-nop">
                                <option value="1"><?php echo $this->lang->line('multiple_choice_single_answer'); ?></option>
                                <option value="2"><?php echo $this->lang->line('multiple_choice_multiple_answer'); ?></option>
                                <option value="3"><?php echo $this->lang->line('match_the_column'); ?></option>
                                <option value="4"><?php echo $this->lang->line('short_answer'); ?></option>
                                <option value="5"><?php echo $this->lang->line('long_answer'); ?></option>
                                <!-- news type of questions-->
                                <option value="6"><?php echo $this->lang->line('question_answer'); ?></option>
                                <option value="7"><?php echo $this->lang->line('syllabes'); ?></option>
                                <option value="8"><?php echo $this->lang->line('split_word');?></option>
                                <option value="9"><?php echo $this->lang->line('highlight') ?></option>
                                <option value="10"><?php  echo $this->lang->line('reorganize'); ?></option>
                                <option value="11"><?php echo $this->lang->line('link'); ?></option>
                                
                            </select>
                        </div>

                        <div class="form-group" id="nop" >	 
                            <label for="nop"><?php echo $this->lang->line('nop'); ?></label> 
                            <input type="text"   name="nop"  class="form-control" value="4">
                        </div>

                        <!-- critère pour le texte par défaut du textarea -->
                        <div class="form-group" id="nop-long">
                            <label><?php echo $this->lang->line('putting_a_text_by_default'); ?></label>
                            <input type="checkbox" name="is_default_txt" id="chk-default-txt" value="1" onclick="checked_default_txt()"/>
                        </div>   

                        <div class="form-group" id="default-txt">
                            <textarea name="default_txt" class="form-control"></textarea>
                        </div>    
                        <button class="btn btn-default" type="submit"><?php echo $this->lang->line('next'); ?></button>

                    </div>
                </div>
            </div>
        </form>
    </div>





</div>