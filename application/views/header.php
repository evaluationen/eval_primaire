<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo base_url('ressources/images/favicon.png'); ?>" type="image/png" rel="icon">
        <title> </title>
        <!-- bootstrap css -->
        <link href="<?php echo base_url('ressources/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <!-- custom css -->
        <link href="<?php echo base_url('ressources/css/style.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('ressources/css/datepicker.css'); ?>" rel="stylesheet">

        <script>
            var base_url = "<?php echo base_url(); ?>";
        </script>

        <!-- jquery -->
        <script src="<?php echo base_url('ressources/js/jquery.js'); ?>"></script>

        <!-- custom javascript -->
        <script src="<?php echo base_url('ressources/js/basic.js'); ?>"></script>
        <!--script src="<?php //echo base_url('ressources/js/draw.main.js'); ?>"></script-->

        <!-- bootstrap js -->
        <script src="<?php echo base_url('ressources/bootstrap/js/bootstrap.min.js'); ?>"></script>

        <!-- datepicker js & css -->
        <script src="<?php echo base_url('ressources/bootstrap/js/bootstrap-datepicker.js'); ?>"></script>
        <link href="<?php echo base_url('ressources/css/datepicker.css'); ?>" rel="stylesheet">

        <!-- confirm jquery -->
        
        <?php /*if(isset($is_attp) && $is_attp) : ?>
        <!--script src="<?php echo base_url('ressources/js/jquery-ui-1.11.4/external/jquery/jquery.js') ?>"></script>
        <script src="<?php echo base_url('ressources/js/jquery-ui-1.11.4/jquery-ui.min.js') ?>"></script>
        <script src="<?php echo base_url('ressources/js/jquery-ui-touch-punch/jquery.ui.touch-punch.js') ?>"></script>
        <script src="<?php echo base_url('ressources/js/jquery.sortable.js') ?>"></script>
        <script src="<?php echo base_url('ressources/js/jquery.sortable.min.js') ?>"></script-->
        <?php else: ?>
       
        <?php endif;*/ ?>
        
         <script src="<?php echo base_url('ressources/js/jquery.confirm.js'); ?>"></script>
        <script>
            $(document).ready(function () {
                $('.datepicker').datepicker({'format': 'dd/mm/yyyy'});
            });
        </script>
    </head>
    <body >
        <?php
        if ($this->session->userdata('logged_in')) {
            if ($this->uri->segment(2) != 'attempt') {
                $logged_in = $this->session->userdata('logged_in');
                ?>
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo base_url(); ?>">Vice-rectorat Mayotte</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <?php
                                if ($logged_in['su'] == 1) {
                                    ?>

                                    <li <?php
                                    if ($this->uri->segment(1) == 'dashboard') {
                                        echo "class='active'";
                                    }
                                    ?> ><a href="<?php echo site_url('dashboard'); ?>"><?php echo $this->lang->line('dashboard'); ?></a></li>


                                    <!--li class="dropdown" <?php
                                    if ($this->uri->segment(1) == 'user') {
                                        echo "class='active'";
                                    }
                                    ?> >
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->lang->line('users'); ?> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo site_url('user/new_user'); ?>"><?php echo $this->lang->line('add_new'); ?></a></li>
                                            <li><a href="<?php echo site_url('user'); ?>"><?php echo $this->lang->line('users'); ?> <?php echo $this->lang->line('list'); ?></a></li>

                                        </ul>
                                    </li-->

                                    <li class="dropdown" <?php
                                    if ($this->uri->segment(1) == 'student') {
                                        echo "class='active'";
                                    }
                                    ?> >
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->lang->line('students'); ?> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo site_url('student/new_student'); ?>"><?php echo $this->lang->line('add_new'); ?></a></li>
                                            <li><a href="<?php echo site_url('student'); ?>"><?php echo $this->lang->line('student_list'); ?></a></li>

                                        </ul>
                                    </li>


                                    <li class="dropdown" <?php
                                    if ($this->uri->segment(1) == 'qbank') {
                                        echo "class='active'";
                                    }
                                    ?> >
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->lang->line('qbank'); ?> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo site_url('qbank/pre_new_question'); ?>"><?php echo $this->lang->line('add_new'); ?></a></li>
                                            <li><a href="<?php echo site_url('qbank'); ?>"><?php echo $this->lang->line('question'); ?> <?php echo $this->lang->line('list'); ?></a></li>
                                            <hr style="margin-bottom: 4px">
                                            <li><a href="<?php echo site_url('qbank/group_question'); ?>"><?php echo $this->lang->line('group_question');?></a></li>
                                            <li><a href="<?php echo site_url('qbank/group_question_new'); ?>"><?php echo $this->lang->line('add_new');?></a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown" <?php
                                    if ($this->uri->segment(1) == 'qbank') {
                                        echo "class='active'";
                                    }
                                    ?> >
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->lang->line('quiz'); ?> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            
                                            <li><a href="<?php echo site_url('quiz/add_new'); ?>"><?php echo $this->lang->line('add_new'); ?></a></li>
                                            <li><a href="<?php echo site_url('quiz'); ?>"><?php echo $this->lang->line('quiz'); ?> <?php echo $this->lang->line('list'); ?></a></li>
                                            <!--li><a>-----------------------------------</a></li>
                                            <li><a href="<?php echo site_url('quiz/add_new'); ?>"><?php echo $this->lang->line('add_new'). ' ' . $this->lang->line('by_sequence'); ?></a></li>
                                            <li><a href="<?php echo site_url('quiz'); ?>"><?php echo $this->lang->line('list'). ' ' . $this->lang->line('by_sequence'); ?></a></li-->
                                        </ul>
                                    </li>


                                    <li><a href="<?php echo site_url('result'); ?>"><?php echo $this->lang->line('result'); ?></a></li>
                                    <li class="dropdown" <?php
                                    if ($this->uri->segment(1) == 'user_group') {
                                        echo "class='active'";
                                    }
                                    ?> >
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->lang->line('setting'); ?> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">

                                            <li><a href="<?php echo site_url('user/group_list'); ?>"><?php echo $this->lang->line('group_list'); ?></a></li>
                                                        <li><a href="<?php echo site_url('qbank/category_list'); ?>"><?php echo $this->lang->line('category_list'); ?></a></li>
                                                        <li><a href="<?php echo site_url('category/sub_category_list'); ?>"><?php echo $this->lang->line('sub_category_list') ?></a></li>
                                                        <li><a href="<?php echo site_url('qbank/level_list'); ?>"><?php echo $this->lang->line('level_list'); ?></a></li>
                                                        <hr style="margin-bottom: 4px">

                                                        <li><a href="<?php echo site_url('school/circo'); ?>"><?php echo $this->lang->line('circo_list'); ?></a></li>
                                                        <li><a href="<?php echo site_url('school/etab_list'); ?>"><?php echo $this->lang->line('etab_list'); ?></a></li>
                                                        <li><a href="<?php echo site_url('school/cycle'); ?>"><?php echo $this->lang->line('cycle_list'); ?></a></li>
                                                        <li><a href="<?php echo site_url('school/class_list'); ?>"><?php echo $this->lang->line('class_list'); ?></a></li>

                                                        <hr style="margin-bottom: 4px">
                                                        <li><a href="<?php echo site_url('user/config_mail'); ?>"><?php echo $this->lang->line('custom_mail_result'); ?></a></li>
                                                        <li><a href="<?php echo site_url('dashboard/config'); ?>"><?php echo $this->lang->line('config'); ?></a></li>
                                                        <li><a href="<?php echo site_url('dashboard/css'); ?>"><?php echo $this->lang->line('custom_css'); ?></a></li>


                                        </ul>
                                    </li>
                                    <li><a href="<?php echo site_url('user/logout'); ?>"><?php echo $this->lang->line('logout'); ?></a></li>
                                    <?php
                                } 
                                ?>
                            </ul>

                        </div><!--/.nav-collapse -->
                    </div><!--/.container-fluid -->
                </nav>

                <?php
            }
        }
        ?>

        
    
            
	
