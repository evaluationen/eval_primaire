<div class="container">
    <h3><?php echo $title; ?></h3>
    <div class="row">
        <form method="post" action="<?php echo site_url('qbank/edit_question/9/' . $question['qid']); ?>">
            <input type="hidden" value="update" name="action"/>
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
                            <?php echo $this->lang->line('highlight'); ?>
                        <input type="hidden" value="<?php echo $question['question_type']; ?>" name="question_type">
                        </div>
                        <div class="form-group">	 
                            <label><?php echo $this->lang->line('select_category'); ?></label> 
                            <select class="form-control catg" name="cid">
                                <?php
                                foreach ($category_list as $key => $val) {
                                    ?>
                                    <option value="<?php echo $val['cid']; ?>"  <?php
                                    if ($question['cid'] == $val['cid']) {
                                        echo 'selected';
                                    }
                                    ?> ><?php echo $val['category_name']; ?></option>
                                            <?php
                                        }
                                        ?>
                            </select>
                        </div>
                        <div class="form-group">	 
                            <label><?php echo $this->lang->line('select_sub_category'); ?></label> 
                            <select class="form-control" name="scid">
                                <?php
                                foreach ($sub_category_list as $key => $val) {
                                    ?>

                                    <option value="<?php echo $val->scid; ?>"  <?php
                                            if ($question['scid'] == $val->scid) {
                                                echo 'selected';
                                            }
                                            ?> ><?php echo $val->sub_catg_name; ?></option>
    <?php
}
?>
                            </select>
                        </div>
                        <div class="form-group">	 
                            <label   ><?php echo $this->lang->line('select_level'); ?></label> 
                            <select class="form-control" name="lid">
                                <?php
                                foreach ($level_list as $key => $val) {
                                    ?>
                                    <option value="<?php echo $val['lid']; ?>" <?php if ($question['lid'] == $val['lid']) {
                                    echo 'selected';
                                } ?> ><?php echo $val['level_name']; ?></option>
    <?php
}
?>
                            </select>
                        </div>
                        <div class="form-group">	 
                            <label for="description"><?php echo $this->lang->line('order'); ?></label> 
                            <textarea  name="description"  class="form-control"><?php echo $question['description']; ?></textarea>
                        </div>
                        <div class="form-group">	 
                            <label for="question"  ><?php echo $this->lang->line('question'); ?></label> 
                            <textarea  name="question"  class="form-control"><?php echo $question['question']; ?></textarea>
                        </div>
                            <div class="form-group">	 
                            <label for=""><?php echo $this->lang->line('default_txt'); ?></label> 
                            <input type="text" required="" name="default_txt"  class="form-control"  value="<?php echo $question['default_txt']; ?>" />
                            </div>


                        <button class="btn btn-default" type="submit"><?php echo $this->lang->line('submit'); ?></button>
                    </div>
                </div>
            </div>
        </form>

        <div class="col-md-3">
            <div class="form-group">	 
                <table class="table table-bordered">
                    <tr><td><?php echo $this->lang->line('no_times_corrected'); ?></td><td><?php echo $question['no_time_corrected']; ?></td></tr>
                    <tr><td><?php echo $this->lang->line('no_times_incorrected'); ?></td><td><?php echo $question['no_time_incorrected']; ?></td></tr>
                    <tr><td><?php echo $this->lang->line('no_times_unattempted'); ?></td><td><?php echo $question['no_time_unattempted']; ?></td></tr>
                </table>
            </div>
        </div>
    </div>
</div>