<div class="container">
 <h3><?php echo $title; ?></h3>
    <div class="row">
        <form method="post" action="<?php echo site_url('qbank/new_question/10/' . $nop); ?>">
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
                            <h4 class="title-typeq"><?php echo $this->lang->line('text_lacunaire'); ?></h4>
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
                        <div class="form-group">	 
                            <label for="inputEmail"  ><?php echo $this->lang->line('order'); ?></label> 
                            <textarea  name="description"  class="form-control"></textarea>
                        </div>
                        <div class="form-group">	 
                            <label for="question"  ><?php echo $this->lang->line('question'); ?></label> 
                            <textarea  name="question"  class="form-control"   ></textarea>
                        </div>
                        
                        <div class="form-group">	 
                            <label for=""><?php echo $this->lang->line('content'); ?></label> 
                            <br><i style="color:grey"> (Mettre une balise <b style="color:red">{rep1}, {rep2}, ..., {repn}</b> (n: nombre entier)à incrementer suivant les nombres des trous à remplir)</i>
                            <textarea  name="default_txt"  class="form-control"></textarea>
                        </div>
                        <div class="form-group">	 
                            <label for="inputEmail"  ><?php echo $this->lang->line('is_list_answer'); ?></label> 
                            <input type="checkbox" name="is_default_txt" value="1" id="is_list_ans"/>
                        </div>
                        <div class="form-group" id="default_list">	 
                            <label for=""><?php echo $this->lang->line('options_list'); ?><i style="color:grey">(Séparer par un point virgule)</i></label> 
                            <input type="text" name="option"  class="form-control"   />
                        </div>
                        <button class="btn btn-default" type="submit"><?php echo $this->lang->line('submit'); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>