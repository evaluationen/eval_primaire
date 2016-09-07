 <div class="container">

   
     <h3><?php echo $title;?>
         <?php if(isset($tot)) : ?><span class="span-tot"><?php echo ' (Total :'.$tot.')'?></span><?php endif;?>
     </h3>
     <div style="text-align: right"><?php echo $this->lang->line('page') ?>: <?php echo ceil($limit/$this->config->item('number_of_rows') + 1) ?> <b> / <?php echo ceil($tot/$this->config->item('number_of_rows')); ?></b></div>
    <div class="row">
 
  <div class="col-lg-6">
    <form method="post" action="<?php echo site_url('student/index/');?>">
            <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="<?php echo $this->lang->line('search');?>...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><?php echo $this->lang->line('search');?></button>
              </span>
            
              


            </div><!-- /input-group -->
    </form>
     
  </div><!-- /.col-lg-6 -->
  
</div><!-- /.row -->


  <div class="row">
      <form id="user_checked" action="<?php echo base_url('student/operation/exp');?>" method="post">
          <br>      
  <div class="col-lg-6 col-md-12">
        <!--btn export -->
                <div class="input-group">
                    <a href="<?php echo site_url('student/export_student/')?>" class="btn btn-success rightalign export_all"><?php echo $this->lang->line('export_all');?></a>
                     <button type="submit" style="display:none" value="" class="btn btn-success rightalign export"><?php echo $this->lang->line('export_user_selected');?></button>
                     <a id="delete_selected" style="display:none" href="#" class="btn btn-danger rightalign export"><?php echo $this->lang->line('delete_user_selected');?></a>
                </div>
                <!--fin export -->
               
  </div>
          
<div class="col-md-12">
<br> 
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	


<table class="table table-bordered responstable">
<tr>
<th></th>   
<th><?php echo $this->lang->line('login');?></th>
<th><?php echo $this->lang->line('last_name');?></th>
<th><?php echo $this->lang->line('first_name');?></th>
<th><?php echo $this->lang->line('birth');?></th>
<th><?php echo $this->lang->line('group_name'); ?></th>
<th><?php echo $this->lang->line('qrcode');?></th>
<th><?php echo $this->lang->line('action');?> </th>

</tr>
<?php 
if(count($result)==0){
	?>
<tr>
 <td colspan="3"><?php echo $this->lang->line('no_record_found');?></td>
</tr>	
	
	
	<?php
}

foreach($result as $key => $val){
    
?>
<tr>
<td><?php if ($val['stid'] != 1) : ?> <input type="checkbox" name="check_user[]" class="select_user" value="<?php echo $val['stid'];?>"/><?php endif; ?></td>   
<td><?php echo $val['login'];?></td>
<td><?php echo $val['last_name'];?></td>
<td><?php echo $val['first_name'];?></td>
<td><?php echo $this->base_model->date_fr($val['birth'])?></td>
<td><?php echo $val['group_name']; ?></td>
<td style="width:20%"><?php if(file_exists(FCPATH.'ressources/qrcode/'.$val['qrcode']) && is_file(FCPATH.'ressources/qrcode/'.$val['qrcode'])) : ?>
    <a href="<?php echo base_url('ressources/qrcode/'.$val['qrcode']);?>"><img class="no-marg" width="20%" src="<?php echo base_url('ressources/qrcode/'.$val['qrcode']);?>"></a>
    <?php else : ?>
    --    
    <?php endif; ?>
</td>
<td>
<a href="<?php echo site_url('user/edit_user/'.$val['stid']);?>"><img class="no-marg" src="<?php echo base_url('ressources/images/edit.png');?>"></a>
<?php if ($val['stid'] != 1) : ?> <a href="javascript:remove_entry('student/remove_student/<?php echo $val['stid'];?>');"><img class="no-marg" src="<?php echo base_url('ressources/images/cross.png');?>"></a><?php endif; ?>
<?php if(file_exists(FCPATH.'ressources/qrcode/'.$val['qrcode']) && is_file(FCPATH.'ressources/qrcode/'.$val['qrcode'])) : ?><a title="<?php echo $this->lang->line('print_user_qr')?>" href="<?php echo site_url('student/export_student/'.$val['stid']);?>"><img class="no-marg" src="<?php echo base_url('ressources/images/pdf.png');?>"></a><?php endif; ?>
</td>
</tr>

<?php 
}
?>
</table>
</form>
</div>

</div>


<?php
if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>

<a href="<?php echo site_url('student/index/'.$back);?>"  class="btn btn-primary"><?php echo $this->lang->line('back');?></a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>
<?php if($next < $tot) : ?>
<a href="<?php echo site_url('student/index/'.$next);?>"  class="btn btn-primary"><?php echo $this->lang->line('next');?></a>

<?php endif; ?>

<div class="login-panel panel panel-default">
		<div class="panel-body"> 

<?php echo form_open('student/import',array('enctype'=>'multipart/form-data')); ?>
 <h4><?php echo $this->lang->line('import_user');?></h4> 
 
 
<?php echo $this->lang->line('upload_excel');?>
	<input type="hidden" name="size" value="3500000">
        <input type="file" name="xlsfile" style="width:150px;float:left;margin-left:10px;" accept="">
	<div style="clear:both;"></div>
	<input type="submit" value="Import" style="margin-top:5px;" class="btn btn-default">
	
<a href="<?php echo base_url();?>ressources/sample/sample_user.xls" target="new">Click here</a> <?php echo $this->lang->line('upload_excel_info');?> 
</form>

</div>
</div>

</div>