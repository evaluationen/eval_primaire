<div class="container">
    <h3><?php echo $title; ?></h3>
    <div class="row panel-body panel panel-default text-center">
        <p>
            <h4 class="end-quiz"><?php echo $this->lang->line('thank_you_and_see_u_soon');?></h4>
        </p>
        <p>
            <?php echo anchor('user/logout', $this->lang->line('logout'), 'class="btn btn-info"')?>
        </p>
    </div>

</div>