<?php $this->load->view('header');?>


<div class="container">
    <div class="row">

            <div class="col-md-12">
                <table class="responstable">
                                <tr>
                                    <th>Nom de sous-domaine</th>
                                    <th>Domaine</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <th><input placeholder="<?php echo $this->lang->line('search') . ' ' . $this->lang->line('sub_category');?>"></th>
                                    <th><select name="cid" required="">
                                              <option value="">-- <?php echo $this->lang->line('all');?> --</option>
                                              <?php 
                                                    if($catg){
                                                        foreach ($catg as $key => $value) {
                                                            echo '<option  value="'. $value->cid .'">'.$value->category_name.'</option>';                                                           
                                                        }
                                                    }
                                              ?>
                                          </select>
                                    </th>
                                    <th>---</th>
                                </tr>
                                <tr>
                                    <td>test n°:01</td>
                                    <td>test n°:02</td>
                                    <td>test n°:03</td>
                                </tr>
                                  <tr>
                                      <td><input class="form-control" required name="" value=""></td>
                                      <td>
                                          <select name="cid" required="">
                                              <option value="">--<?php echo $this->lang->line('select_category');?>--</option>
                                              <?php 
                                                    if($catg){
                                                        foreach ($catg as $key => $value) {
                                                            echo '<option  value="'. $value->cid .'">'.$value->category_name.'</option>';                                                           
                                                        }
                                                    }
                                              ?>
                                          </select>
                                      </td>
                                      <td><button class="btn btn-success" type="submit"><?php echo $this->lang->line('add_new'); ?></button> </td>
                                </tr>
                </table>  
            </div>
    </div>
</div>    
<?php $this->load->view('footer');?>