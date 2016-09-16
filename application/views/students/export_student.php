<html> 
    <head> 
        <meta	http-equiv="Content-Type" content="charset=utf-8" />
        <style>
            .tr_border{
                border-bottom: 3px dotted #ddd;
                padding-bottom: 1em;
                //padding-top: 1em;
            }

            .tr_border_pull{
                border-bottom: 1px solid #000;
            }
            
        </style>
        
    </head> 
    <body>
        <table style="width: 100%">
            <tr>
                <td class="tr_border_pull" style=""><?php echo $this->lang->line('last_name');?></td>
                <td class="tr_border_pull"><?php echo $this->lang->line('first_name');?></td>
                <td class="tr_border_pull"><?php echo $this->lang->line('birth');?></td>
                <td class="tr_border_pull"><?php echo $this->lang->line('login');?></td>
                <td class="tr_border_pull"><?php echo $this->lang->line('qrcode');?></td>
            </tr>
            <?php if(count($students) > 0) : ?>
            <?php foreach ($students as $user) : ?>
            <tr>
                <td class="tr_border" style="width: 25%"><?php echo strtoupper($user['last_name'])?></td>
                <td  class="tr_border" style="width: 20%"><?php echo strtoupper($user['first_name']) ?></td>
                <td  class="tr_border" style="width: 20%"><?php echo  $this->base_model->date_fr($user['birth']) ?></td>
                <td  class="tr_border" style="width: 20%"><b><?php echo $user['login'] ?></b></td>
                <td  class="tr_border" style="width: 35%">
                    <?php if(file_exists(FCPATH.'ressources/qrcode/'.$user['qrcode']) && is_file(FCPATH.'ressources/qrcode/'.$user['qrcode'])) : ?>
                    <!--img width="200px" height="150px" src="<?php //echo base_url('ressources/qrcode/'.$user['qrcode']);?>"-->
                    <img width="200px" height="150px" src="<?php echo FCPATH.'ressources/qrcode/'.$user['qrcode'];?>">
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
            
        </table>
    </body>
</html>