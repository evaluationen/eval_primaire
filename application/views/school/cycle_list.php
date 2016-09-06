<?php $this->load->view('header'); ?>
<div class="container">
    <h3><?php echo $title; ?></h3>
    <div class="row">

        <div class="col-md-12">
            <br> 
            <?php
            if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
            }
            ?>	
            <div id="message"></div>
            <form method="post" action="<?php echo site_url('school/insert_cycle/'); ?>">
                <table class="table table-bordered responstable">
                    <tr>
                        <th><?php echo $this->lang->line('cycle'); ?></th>
                        <th><?php echo $this->lang->line('action'); ?> </th>
                    </tr>
                    <?php
                    if (count($cycle_list) == 0) {
                        ?>
                        <tr>
                            <td colspan="3"><?php echo $this->lang->line('no_record_found'); ?></td>
                        </tr>	
                        <?php
                    }
                    foreach ($cycle_list as $key => $val) {
                        ?>
                        <tr>
                            <td><input type="text"   class="form-control"  value="<?php echo $val->cycle_name; ?>" onBlur="updatecycle(this.value, '<?php echo $val->cyid; ?>');" ></td>
                            <td>
                                <a href="javascript:remove_entry('school/remove_cycle/<?php echo $val->cyid; ?>');"><img src="<?php echo base_url('ressources/images/cross.png'); ?>"></a>

                            </td>
                        </tr>

                        <?php
                    }
                    ?>
                    <tr>
                        <td>

                            <input type="text"   class="form-control"   name="cycle_name" value="" placeholder="<?php echo $this->lang->line('cycle_name'); ?>"  required ></td>
                        <td>
                            <button class="btn btn-default" type="submit"><?php echo $this->lang->line('add_new'); ?></button>

                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>