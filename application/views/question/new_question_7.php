<div class="container">
    <h3><?php echo $title; ?></h3>
    <div class="row">
        <form method="post" class="form_tableedit" action="<?php echo site_url('qbank/new_question/7/' . $nop); ?>">
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
                            <h4 class="title-typeq"> <?php echo $this->lang->line('table_editable'); ?></h4>
                        </div>

                        <div class="form-group">	 
                            <label><?php echo $this->lang->line('select_category'); ?></label> 
                            <select class="form-control catg" name="cid">
                                <option selected="selected" value="-1"><?php echo $this->lang->line('select_category'); ?></option>
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
                                <option selected="selected"><?php echo $this->lang->line('select_sub_category'); ?></option>
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
                            <label for="description"  ><?php echo $this->lang->line('order'); ?></label> 
                            <textarea  name="description"  class="form-control"></textarea>
                        </div>
                        <div class="form-group">	 
                            <label for="question"><?php echo $this->lang->line('question'); ?></label> 
                            <textarea  name="question"  class="form-control"></textarea>
                        </div>
                       
                        <div class="form-group">	 
                            <label for="default_txt"  ><?php echo $this->lang->line('content') ;  ?><span style="font-style: italic; color: #245269"> (Laissez vide pour les zones à compléter)</span></label> 
                            <textarea  name="default_txt"  class="form-control table-edit">
                                <table>
                                    <tbody>
                                        <tr>
                                            <th>Titre1</th>
                                            <th>Titre2</th>
                                            <th>Titre3</th>
                                        </tr>  
                                        
                                        <tr>
                                            <td>test</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        
                                    </tbody>    
                                </table>
                                
                            </textarea>
                        </div>

                        <button class="btn btn-default" onclick="javascript:submit_qeditable();" type="submit"><?php echo $this->lang->line('submit'); ?></button>
                        <!--a href="javascript:submit_qeditable();"   class="btn btn-default"  style="cursor:pointer;"><?php //echo $this->lang->line('submit'); ?></a-->
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>