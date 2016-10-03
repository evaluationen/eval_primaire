<div class="container">
    <h3><?php echo $title;?>
        <?php 
            if(isset($quiz_default[0]->quid)){
                $quid = $quiz_default[0]->quid;
            }else{
                $quid = 0;
            }
        ?>
    </h3>
    <div class="row">
        <form method="post" id="quiz_detail_user" action="<?php echo site_url('quiz/quiz_detail/'.$quid); ?>">

            <div class="col-md-12">
                <br> 
                <div class="login-panel panel panel-default">
                    <div class="panel-body"> 

                        <?php
                        if ($this->session->flashdata('message')) {
                            echo $this->session->flashdata('message');
                        }
                        ?>	
                        <?php $login_in = $this->session->userdata('logged_in'); ?>     
                        <?php if ($login_in['su'] == 0) : ?>
                        <div class="text-center">
<!--                            test si un élève a déjà validé son test-->
                            <p><?php echo $this->lang->line('hello') . " <b>" . $login_in['first_name'] . " " . $login_in['last_name'] . "</b>," ?></p>
                            <?php if(empty($quiz_default)) : ?>
                                    <p>
                                    <h4 class="end-quiz" style="color: red"><?php echo $this->lang->line('empty_eval_affect');?></h4>
                                    </p>
                                    <p>
                                        <?php echo anchor('user/logout', $this->lang->line('logout'), 'class="btn btn-info"')?>
                                    </p>
                                
                            <?php else: ?>       
                                    <p>Veuillez choisir une évaluation et puis valider</p>
                                    <?php foreach ($quiz_default as $key => $list) :?>
                                    <input type="radio" class="check_quid" name="quid" <?php if($key==0){echo  "checked"; } ?> value="<?php echo $list->quid?>"/> <label style="color:#f89406"><?php echo strtoupper($list->quiz_name)?></label><br>
                                    <?php endforeach; ?>
                                 <div class="text-center">
                                    <button class="btn btn-success" type="submit"><?php echo $this->lang->line('submit'); ?></button>
                                </div>
                            <?php endif;?>
                        </div>        
                        <?php endif; ?>
                            <?php
                        //}
                        ?>
                    </div>
                </div>




            </div>
        </form>
    </div>
    <script>
        $(document).ready(function(e){
            $(".check_quid").each(function(){
                $(this).click(function(){
                    url_sub = '<?php echo site_url('quiz/quiz_detail/'); ?>';
                    new_url = url_sub + '/'+ $(this).val();
                    $("#quiz_detail_user").attr('action', new_url);
                });
            });
           
            
        })
    </script>




</div>


<div  id="warning_div" style="padding:10px; position:fixed;z-index:100;display:none;width:100%;border-radius:5px;height:200px; border:1px solid #dddddd;left:4px;top:70px;background:#ffffff;">
    <center><b> <?php echo $this->lang->line('to_which_position'); ?></b><br><input type="text" style="width:30px" id="qposition" value=""><br><br>
        <a href="javascript:cancelmove();"   class="btn btn-danger"  style="cursor:pointer;">Cancel</a> &nbsp; &nbsp; &nbsp; &nbsp;
        <a href="javascript:movequestion();"   class="btn btn-info"  style="cursor:pointer;">Move</a>

    </center>
</div>