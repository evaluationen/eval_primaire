<div class="container" style="width: auto">
    <div class="row">
        <div class="col-md-6">
                <br> 
                
                    <div class="panel-body"> 

                        <?php
                        if ($this->session->flashdata('message')) {
                            echo $this->session->flashdata('message');
                        }
                        ?>	

                        <div class="form-group">
                            <input type="hidden" value="<?php echo $sub_ctg->scid ?>" name="scid"/>
                            <label for="sub_catg_name"><?php echo $this->lang->line('sub_category'); ?></label> 
                            <input type="text" required=""  name="sub_catg_name"  class="form-control" placeholder="<?php echo $this->lang->line('sub_category'); ?>" value="<?php echo $sub_ctg->sub_catg_name;?>"  autofocus>
                        </div>
                        <div class="form-group">	 
                            <label for="cid"><?php echo $this->lang->line('category_name'); ?></label> <br/>
                            <?php if($sub_ctg->cid):?>
                            <select name="cid">
                                <?php foreach($list_cat as $item) : ?>
                                         <option value="<?php echo $item->cid ?>" <?php echo ($sub_ctg->cid == $item->cid) ? 'selected="selected"' : '-' ?>><?php echo $item->category_name ?></option>;                                                           
                                <?php endforeach; ?>
                            </select>                                                    
                                <?php endif; ?>
                        </div>
                        

                    </div>
            </div>
    </div>
</div>