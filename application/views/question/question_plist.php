<?php $this->load->view('header') ?>
<div class="container">
    <h3><?php echo $title; ?>
        <?php /*if (isset($tot)) : ?><span class="span-tot"><?php echo ' (Total :' . $tot . ')' ?></span><?php endif;*/ ?>
    </h3>
    <!--div style="text-align: right"><?php echo $this->lang->line('page') ?>: <?php echo ceil($limit / $this->config->item('number_of_rows') + 1) ?> <b> / <?php echo ceil($tot / $this->config->item('number_of_rows')); ?></b></div-->
    <div class="row">

        <div class="col-lg-6">
            <form method="post" action="<?php echo site_url('qbank/object_question/'); ?>">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="<?php echo $this->lang->line('search'); ?>...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><?php echo $this->lang->line('search'); ?></button>
                    </span>
                </div><!-- /input-group -->
            </form>
        </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <br> 
            <?php
            if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
            }
            ?>	

            <table class="table table-bordered responstable">
                <tr>
                    <th><?php echo $this->lang->line('title'); ?></th>
                    <th><?php echo $this->lang->line('description'); ?></th>
                    <th><?php echo $this->lang->line('category'); ?></th>
                    <th><?php echo $this->lang->line('action'); ?> </th>
                </tr>
                <?php
                if (count($olist) == 0) {
                    ?>
                    <tr>
                        <td colspan="4"><?php echo $this->lang->line('no_record_found'); ?></td>
                    </tr>	


                    <?php
                }
                foreach ($olist as $key => $val) {
                    ?>
                    <tr>
                        <td>  <?php echo $val->title; ?></td>
                        <td><?php echo substr(strip_tags($val->description), 0, 20); ?></td>
                        <td><?php echo $val->category_name; ?></td>
                        <td>
                            <a href="<?php echo site_url('qbank/group_question_edit/'. $val->pqid); ?>"><img src="<?php echo base_url('ressources/images/edit.png'); ?>"></a>
                            <a href="javascript:remove_entry('qbank/remove_pquestion/<?php echo $val->pqid; ?>');"><img src="<?php echo base_url('ressources/images/cross.png'); ?>"></a>
                            
                        </td>
                    </tr>

                    <?php
                }
                ?>
            </table>
        </div>

    </div>
</div>
<?php $this->load->view('footer');?>