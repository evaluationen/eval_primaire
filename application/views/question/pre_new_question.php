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
                                <?php foreach ($question_type as $key => $type) :  ?>
                                <option value="<?php echo $key ?>"><?php echo $type; ?></option>
                                <?php endforeach; ?>
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