<?php $this->load->view('header'); ?>


<div class="container">
    <div class="row">

        <div class="col-md-12">
            <!--form method="post" action="<?php //echo base_url('category/add_sub_catg'); ?>"-->
            <form action="<?php echo base_url('category/add_sub_catg'); ?>" method="post">
                <table class="responstable">
                    <tr>
                        <th>Nom de sous-domaine</th>
                        <th>Domaine</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <th><input placeholder="<?php echo $this->lang->line('search') . ' ' . $this->lang->line('sub_category'); ?>"></th>
                        <th><select name="cid">
                                <option value="">-- <?php echo $this->lang->line('all'); ?> --</option>
                                <?php
                                if ($catg) {
                                    foreach ($catg as $key => $value) {
                                        echo '<option  value="' . $value->cid . '">' . $value->category_name . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </th>
                        <th>---</th>
                    </tr>
                    <?php if ($list_sub): ?>
                        <?php foreach ($list_sub as $item) : ?>
                            <tr>
                                <td><?php echo $item->sub_catg_name ?></td>
                                <td>
                                    <?php echo $item->category_name; ?> 
                                    <!--select class="disabled-select" id="catg_name_<?php echo $item->scid; ?>">
                                    <?php /* if($catg) : ?>
                                      <?php foreach($catg as $key => $value) : ?>
                                      <option value="<?php echo $value->cid ?>" <?php echo ($value->cid == $item->cid) ? 'selected="selected"' : '-' ?>><?php echo $value->category_name ?></option>;
                                      <?php endforeach; ?>
                                      <?php endif; */ ?>
                                    </select-->
                                </td>
                                <td>
                                    <!--a  href='<?php echo base_url('category/edit_sub_catg'); ?>' class='ls-modal'><img style="display: none" class="action save_sub" src="<?php //echo base_url('ressources/images/save.png') ?>" data-id="<?php echo $item->scid; ?>"/></a-->
                                    <a  href='<?php echo base_url('category/edit_sub_catg/' . $item->scid); ?>' class='edit-modal'><img class="action edit_sub" src="<?php echo base_url('ressources/images/edit.png') ?>" data-id="<?php echo $item->scid; ?>"/></a>
                                    <img class="action deleted_sub" src="<?php echo base_url('ressources/images/cross.png') ?>" data-id="<?php echo $item->scid; ?>"/>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <tr>
                        <td><input required="" name="sub_catg_name" value=""></td>
                        <td>
                            <select name="cid" required="">
                                <option value="">--<?php echo $this->lang->line('select_category'); ?>--</option>
                                <?php
                                if ($catg) {
                                    foreach ($catg as $key => $value) {
                                        echo '<option  value="' . $value->cid . '">' . $value->category_name . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </td>
                        <td><button class="btn btn-success" type="submit"><?php echo $this->lang->line('add_new'); ?></button> </td>

                    </tr>
                </table>
            </form>  
        </div>
    </div>
</div>  

<!-- update -->

<div id="editModal" class="modal fade">
    <form action="<?php echo base_url('category/save_sub_catg'); ?>" method="post">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?php echo $this->lang->line('update'); ?></h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

            </div>
        </div>
    </form>
</div>    
<?php $this->load->view('footer'); ?>