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

            <form method="post" action="<?php echo site_url('school/insert_class/'); ?>">

                <table class="table table-bordered responstable">
                    <tr>
                        <th><?php echo $this->lang->line('class'); ?></th>
                        <th><?php echo $this->lang->line('cycle'); ?></th>
                        <th><?php echo $this->lang->line('action'); ?> </th>
                    </tr>
                    <?php
                    if (count($class_list) == 0) {
                        ?>
                        <tr>
                            <td colspan="3"><?php echo $this->lang->line('no_record_found'); ?></td>
                        </tr>	
                        <?php
                    }

                    foreach ($class_list as $key => $val) {
                        ?>
                        <tr>
                            <td><?php echo $val->code; ?></td>
                            <td><?php echo $val->cycle_name; ?></td>
                            <td>
                                <a href="javascript:remove_entry('school/remove_class/<?php echo $val->clid; ?>');"><img src="<?php echo base_url('ressources/images/cross.png'); ?>"></a>

                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td>
                            <input type="text"   class="form-control"  maxlength="3"  name="code" value="" placeholder="<?php echo $this->lang->line('class'); ?>"  required ></td>
                        <td>
                            <select name="cyid" required="" class="form-control">
                                <option value="">--<?php echo $this->lang->line('select_cycle'); ?>--</option>
                                <?php
                                if ($cycle_list) {
                                    foreach ($cycle_list as $key => $value) {
                                        echo '<option  value="' . $value->cyid . '">' . $value->cycle_name . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </td>
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