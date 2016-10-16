<style>
    td{
        font-size:14px;
        padding:4px;
    }

    .option_container .select_table table td, .option_container .select_table table th{
        border: 2px solid #0033DD;
    }

    .tt{
        color:red;
        background : #ffff00;    
    }
    
    /*debut*/
    .container{
    width: 100%;
    max-width: 1024px;
    display: table;
    margin: 0 auto;
}
.question-items,
.answer-items{
    width: 30%;
    float: left;
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
.answer-items{
    float: right;
}
.item{
    list-style: none;
    border: 1px solid #CCC;
    box-sizing: border-box;
    position: relative;
    height: 65px;
    width: 100%;
    padding: 10px 20px;
    margin: 20px 0;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
}
.item .line-box {
    display: block;
    width: 20px;
    height: 20px;
    border: 1px solid #CCC;
    background: #FFF;
    border-radius: 10px;
    position: absolute;
    right: -10px;
    top: 22px;
}
.label{
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -o-user-select: none;
    user-select: none;
}
.answer-items .item .line-box{
    left: -10px;
    right: auto;
}
.item .line-box .line{
    display: block;
    position: absolute;
    z-index: 2;
    width: 16px;
    height: 16px;
    background: blue;
    border-radius: 9px;
    top: 1px;
    left: 1px;
    cursor: pointer;
    transform-origin: 8px 8px;
}
.answer-items .item .line-box .line{
    background: #FFF;
    z-index: 1;
}
li.selected .un-select{
    display: block;
}
.un-select{
    background: #FFF url(../images/close.png) center no-repeat / 25px;
    position: absolute;
    width: 25px;
    height: 25px;
    right: -12px;
    top: -12px;
    cursor: pointer;
    display: none;
    border-radius: 13px;
    -moz-order-radius: 13px;
    -webkit-border-radius: 13px;
}

    /*fin*/
</style>

<script>

    var Timer;
    var TotalSeconds;


    function CreateTimer(TimerID, Time) {
        Timer = document.getElementById(TimerID);
        TotalSeconds = Time;

        UpdateTimer()
        window.setTimeout("Tick()", 1000);
    }

    function Tick() {
        if (TotalSeconds <= 0) {
            alert("Time's up!")
            return;
        }

        TotalSeconds -= 1;
        UpdateTimer()
        window.setTimeout("Tick()", 1000);
    }

    function UpdateTimer() {
        var Seconds = TotalSeconds;

        var Days = Math.floor(Seconds / 86400);
        Seconds -= Days * 86400;

        var Hours = Math.floor(Seconds / 3600);
        Seconds -= Hours * (3600);

        var Minutes = Math.floor(Seconds / 60);
        Seconds -= Minutes * (60);


        var TimeStr = ((Days > 0) ? Days + " days " : "") + LeadingZero(Hours) + ":" + LeadingZero(Minutes) + ":" + LeadingZero(Seconds)


        Timer.innerHTML = TimeStr;
    }


    function LeadingZero(Time) {

        return (Time < 10) ? "0" + Time : +Time;

    }

//var myCountdown1 = new Countdown({time:<?php echo $seconds; ?>, rangeHi:"hour", rangeLo:"second"});
//setTimeout(submitform,'<?php echo $seconds * 1000; ?>'); //à remettre si critère de temps d'exécution 

    function submitform() {

        alert('Time Over');
        window.location = "<?php echo site_url('quiz/submit_quiz/'); ?>";
    }





</script>

<div class="container" >

    <div class="col-md-8"><!-- style="float:right;width:150px; margin-right:10px;"-->
        <?php echo $this->lang->line('time_left') ?>: <span id='timer' >
            <script type="text/javascript">window.onload = CreateTimer("timer", <?php echo $seconds; ?>);</script>
        </span>
        <div class="save_answer_signal" id="save_answer_signal2"></div>
        <div class="save_answer_signal" id="save_answer_signal1"></div>
    </div>
    <div style="float:left;width:70%;padding:10px 20px 10px 20px; -webkit-box-shadow: 0px 0px 10px 2px rgba(0,0,0,0.75);
         -moz-box-shadow: 0px 0px 10px 2px rgba(0,0,0,0.75);
         box-shadow: 0px 0px 10px 2px rgba(0,0,0,0.75);margin-top: 20px;margin-bottom: 20px; background:#FAFAD2; border-radius:5px;"  >
        <h4 style="color:#8f9bf4; font-weight: bold"><?php echo $title; ?></h4>
    </div>

    <div style="clear:both;"></div>

    <!-- Category button -->

    <div class="row" style="display:none;" >
        <?php
        $categories = explode(',', $quiz['categories']);
        $category_range = explode(',', $quiz['category_range']);

        function getfirstqn($cat_keys = '0', $category_range) {
            if ($cat_keys == 0) {
                return 0;
            } else {
                $r = 0;
                for ($g = 0; $g < $cat_keys; $g++) {
                    $r+=$category_range[$g];
                }
                return $r;
            }
        }

        if (count($categories) > 1) {
            $jct = 0;
            foreach ($categories as $cat_key => $category) {
                ?>
                <a href="javascript:switch_category('cat_<?php echo $cat_key; ?>');"   class="btn btn-info"  style="cursor:pointer;"><?php echo $category; ?></a>
                <input type="hidden" id="cat_<?php echo $cat_key; ?>" value="<?php echo getfirstqn($cat_key, $category_range); ?>">
                <?php
            }
        }
        ?>
    </div> 

    <div class="row"  style="margin-top:5px;">
        <div class="col-md-8">
            <form method="post" action="<?php echo site_url('quiz/submit_quiz/' . $quiz['rid']); ?>" id="quiz_form" >
                <input type="hidden" name="rid" value="<?php echo $quiz['rid']; ?>">
                <input type="hidden" name="noq" value="<?php echo $quiz['noq']; ?>">
                <input type="hidden" name="individual_time"  id="individual_time" value="<?php echo $quiz['individual_time']; ?>">
                <?php
                $abc = array(
                    '0' => '',
                    '1' => '',
                    '2' => '',
                    '3' => '',
                    '4' => '',
                    '6' => '',
                    '7' => '',
                    '8' => '',
                    '9' => '',
                    '10' => '',
                    '11' => ''
                );
                foreach ($questions as $qk => $question) {
                    ?>

                    <div id="q<?php echo $qk; ?>" class="question_div">
                        <?php if (!empty($question['description'])) : ?>
                            <div class="question_description">
                                <?php echo str_replace('../../../', '../../', $question['description']); ?>   
                            </div>
                        <?php endif; ?>

                        <div class="question_container" >
                            <?php
                            $title = FALSE;
                            $qparent = $this->quiz_model->get_parent_question($question['pqid']);
                            foreach ($options as $opt) {

                                if ($opt['qid'] != $question['qid']) {
                                    continue;
                                } else {
                                    $title = TRUE;
                                    break;
                                }
                            }
                            ?>
                            <?php  if(isset($qparent) && $qparent) : ?>
                                        <div>
                                            <label><?php echo $qparent->title ?></label>
                                            <p><?php echo $qparent->description ?></p>
                                        </div>
                            <?php endif; ?>
                            <?php //if ($title) : ?>    
                            <b style="font-size:20px;color:red;"><?php echo $this->lang->line('question'); ?> <?php echo $qk + 1; ?>)</b><br>
                            <?php //endif; ?>
                            <?php echo str_replace('../../../', '../../', $question['question']); ?>
                            
                        </div>
                        <div class="option_container" >

                            <?php
                            // multiple single choice
                            if ($question['question_type'] == 1) {
                               
                                $save_ans = array();
                                
                                foreach ($saved_answers as $svk => $saved_answer) {
                                    if ($question['qid'] == $saved_answer['qid']) {
                                        $save_ans[] = $saved_answer['q_option'];
                                    }
                                }
                                ?>
                                <input type="hidden"  name="question_type[]"  id="q_type<?php echo $qk; ?>" value="1">
                                
                                <?php
                                $i = 0;
                                foreach ($options as $ok => $option) {
                                    if ($option['qid'] == $question['qid']) {
                                        ?>

                                        <div class="op"><?php echo $abc[$i]; ?> <input type="radio" name="answer[<?php echo $qk; ?>][]"  id="answer_value<?php echo $qk . '-' . $i; ?>" value="<?php echo $option['oid']; ?>"   <?php
                                            if (in_array($option['oid'], $save_ans)) {
                                                echo 'checked';
                                            }
                                            ?>  > <?php echo $option['q_option']; ?> </div>


                                        <?php
                                        $i+=1;
                                    } else {
                                        $i = 0;
                                    }
                                }
                            }

                            // multiple_choice_multiple_answer	
                            if ($question['question_type'] == 2) {
                                $save_ans = array();
                                foreach ($saved_answers as $svk => $saved_answer) {
                                    if ($question['qid'] == $saved_answer['qid']) {
                                        $save_ans[] = $saved_answer['q_option'];
                                    }
                                }
                                ?>
                                <input type="hidden"  name="question_type[]"  id="q_type<?php echo $qk; ?>" value="2">
                                
                                <?php
                                $i = 0;
                                foreach ($options as $ok => $option) {
                                    if ($option['qid'] == $question['qid']) {
                                        ?>

                                        <div class="op"><?php echo @$abc[$i]; ?> <input type="checkbox" name="answer[<?php echo $qk; ?>][]" id="answer_value<?php echo $qk . '-' . $i; ?>"   value="<?php echo $option['oid']; ?>"  <?php
                                            if (in_array($option['oid'], $save_ans)) {
                                                echo 'checked';
                                            }
                                            ?> > <?php echo $option['q_option']; ?> </div>

                                        <?php
                                        $i+=1;
                                    } else {
                                        $i = 0;
                                    }
                                }
                            }

                            // short answer	

                            if ($question['question_type'] == 4) {
                                $save_ans = array();
                                foreach ($saved_answers as $svk => $saved_answer) {
                                    if ($question['qid'] == $saved_answer['qid']) {
                                        $save_ans[] = $saved_answer['q_option'];
                                    }
                                }
                                ?>
                                <input type="hidden"  name="question_type[]"  id="q_type<?php echo $qk; ?>" value="3" >
                                <?php ?>
                                <!-- foreach nombre answer-->
                                <!--div class="op"> 
                                    <b><?php //echo $this->lang->line('answer') . ' N°';     ?> </b>
                                    <input type="text" name="answer[<?php echo $qk; ?>][]" value="<?php //echo $save_ans;     ?>" id="answer_value<?php echo $qk; ?>"   >  
                                </div-->
                                <?php
                                $i = 0;
                                foreach ($options as $ok => $option) {
                                    if ($option['qid'] == $question['qid']) {
                                        ?>
                                        <div class="op"><?php echo @$abc[$i]; ?> 
                                            <b><?php echo $this->lang->line('answer') . ' N°' . ($i + 1) . ' : '; ?> </b>
                                            <input type="text" name="answer[<?php echo $qk; ?>][]" id="answer_value<?php echo $qk . '-' . $i; ?>"   value="<?php echo isset($save_ans[$i]) ? $save_ans[$i] : ''; ?>"> </div>
                                        <?php
                                        $i+=1;
                                    } else {
                                        $i = 0;
                                    }
                                }
                                ?>

                                <?php
                            }

                            // long answer	

                            if ($question['question_type'] == 5) {
                                $save_ans = "";
                                if (isset($question['is_default_txt']) && $question['is_default_txt']) {
                                    $save_ans .= strip_tags(($question['default_txt']));
                                }

                                foreach ($saved_answers as $svk => $saved_answer) {
                                    if ($question['qid'] == $saved_answer['qid']) {
                                        $save_ans = $saved_answer['q_option'];
                                    }
                                }
                                ?>
                                <input type="hidden"  name="question_type[]" id="q_type<?php echo $qk; ?>" value="4">
                                <?php ?>

                                <div class="op"> 
                                    <b><?php echo $this->lang->line('answer'); ?> <br></b>
                                    <?php echo $this->lang->line('word_counts'); ?> <span id="char_count<?php echo $qk; ?>">0</span>
                                    <?php ?>
                                    <script>
                                        $(document).ready(function () {
                                            val_txt = $('#answer_value<?php echo $qk; ?>').val();
                                            count_char(val_txt, 'char_count<?php echo $qk; ?>');
                                        });
                                    </script>
                                    <textarea  name="answer[<?php echo $qk; ?>][]" id="answer_value<?php echo $qk; ?>" style="width:100%; height:100%; min-width: 300px; min-height: 350px"  onKeyup="count_char(this.value, 'char_count<?php echo $qk; ?>');"><?php echo $save_ans; ?></textarea>
                                </div>


                                <?php
                            }
                            // matching	
                            if ($question['question_type'] == 3) {
                                $save_ans = array();
                                foreach ($saved_answers as $svk => $saved_answer) {
                                    if ($question['qid'] == $saved_answer['qid']) {
                                        // $exp_match=explode('__',$saved_answer['q_option_match']);
                                        $save_ans[] = $saved_answer['q_option'];
                                    }
                                }
                                ?>
                                <input type="hidden" name="question_type[]" id="q_type<?php echo $qk; ?>" value="5">
                                <?php
                                $i = 0;
                                $data = array();
                                $match_2 = array();
                                foreach ($options as $ok => $option) {
                                    if ($option['qid'] == $question['qid']) {
                                        $data[] = array('question' => $option['q_option'], 'answer' => $option['q_option_match']) ;
                                        //$match_2[] = $option['q_option_match'];
                                        ?>
                                        <?php
                                        $i+=1;
                                    } else {
                                        $i = 0;
                                    }
                                }
                                ?>
                                <div class="">
                                    <table>
                                        <?php
                                        $keys = array_keys($data);
                                        shuffle($keys);
                                        ?>
                                        <!-- début-->
                                            <div class="main-wrapper">
                                                    <div class="container">
                                                        <ul class="question-items">
                                                            <?php foreach ($data as $key=>$value): ?>
                                                                <li data-target="<?php print $key + 1 ?>" class="item">
                                                                    <span unselectable="on" class="label"><?php print $value['question']?></span>
                                                                    <span class="line-box">
                                                                        <span class="line"></span>
                                                                        <input type="hidden" name="options[<?php echo $qk; ?>][]" value="<?php echo $value['question']; ?>"/>
                                                                    </span>
                                                                </li>
                                                            <?php endforeach;?>
                                                        </ul>
                                                        <ul class="answer-items">
                                                            <?php foreach ($keys as $key): ?>
                                                            <li data-target="<?php print $key + 1?>" class="item">
                                                                <span class="label"><?php print $data[$key]['answer']?></span>
                                                                <span class="line-box"><span class="line"></span>
                                                                    <input type="hidden" name="answer[<?php echo $qk; ?>][]" value="<?php echo $data[$key]['answer']; ?>"/>
                                                                </span>
                                                                <span class="un-select"></span>
                                                            </li>
                                                            <?php endforeach;?>
                                                        </ul>
                                                    </div>
                                                    <!--div class="container">
                                                        <button id="validate">Validate</button>
                                                    </div!-->
                                        </div>
                                       
                                        <!-- fin -->
                                    </table>
                                </div>
                                <?php
                            }
                            ?>
                            <?php if ($question['question_type'] == 6) : ?>
                                <?php
                                foreach ($saved_answers as $svk => $saved_answer) {
                                    if ($question['qid'] == $saved_answer['qid']) {
                                        $save_ans = $saved_answer['q_option'];
                                    }
                                }
                                $save_answ = isset($save_ans) ? json_decode($save_ans) : "";
                                ?>
                                <input type="hidden"  name="question_type[]" id="q_type<?php echo $qk; ?>" value="6">
                                <?php ?>
                                <div>
                                    <div class="op"> 
                                        <b><?php echo $this->lang->line('search'); ?> <br></b>
                                        <?php echo $this->lang->line('word_counts'); ?> <span id="char_count<?php echo $qk; ?>">0</span>
                                        <?php ?>

                                        <textarea  name="answer[<?php echo $qk; ?>][]" id="answer_value<?php echo $qk; ?>" style="width:100%; height:100%; min-width: 300px; min-height: 250px"  onKeyup="count_char(this.value, 'char_count<?php echo $qk; ?>');"><?php echo isset($save_answ->search) ? $save_answ->search : ""; ?></textarea>
                                    </div>

                                    <div class="op"> 
                                        <b><?php echo $this->lang->line('answer'); ?> <br></b>
                                        <?php echo $this->lang->line('word_counts'); ?> <span id="char_count<?php echo $qk; ?>">0</span>
                                        <?php ?>
                                        <textarea  name="answer[<?php echo $qk; ?>][]" id="answer_value<?php echo $qk; ?>" style="width:100%; height:50%; min-width: 300px; min-height: 100px"  onKeyup="count_char(this.value, 'char_count<?php echo $qk; ?>');"><?php echo isset($save_answ->response) ? $save_answ->response : ""; ?></textarea>
                                    </div>
                                </div>
                            <?php endif; ?> 

                            <!-- question_type = 7 -->
                            <?php if ($question['question_type'] == 7) { ?>
                                <?php
                                $save_ans = "";
                                if (isset($question['is_default_txt']) && $question['is_default_txt']) {
                                    $save_ans .= $question['default_txt'];
                                }

                                foreach ($saved_answers as $svk => $saved_answer) {
                                    if ($question['qid'] == $saved_answer['qid']) {
                                        $save_ans = $saved_answer['q_option'];
                                    }
                                }
                                ?>
                                <input type="hidden"  name="question_type[]" id="q_type<?php echo $qk; ?>" value="7">
                                <div class="select_table" >       
                                    <div id="answer_edit_div<?php echo $qk; ?>" class="answer_edit"><?php echo $save_ans; ?></div>
                                    <textarea name="answer[<?php echo $qk; ?>][]" id="answer_value<?php echo $qk; ?>" style="width:100%; height:100%; min-width: 300px; min-height: 350px; display: none"><?php echo $save_ans; ?></textarea>
                                </div>

                            <?php } ?> 

                            <!-- question_type = 8 -->
                            <?php if ($question['question_type'] == 8) : ?>
                                <?php
                                $save_ans = array();
                                foreach ($saved_answers as $svk => $saved_answer) {
                                    if ($question['qid'] == $saved_answer['qid']) {
                                        $save_ans[] = $saved_answer['q_option'];
                                    }
                                }
                                ?>
                                <input type="hidden"  name="question_type[]" id="q_type<?php echo $qk; ?>" value="8">
                                <?php
                                $i = 0;

                                foreach ($options as $ok => $option) {
                                    if ($option['qid'] == $question['qid']) {
                                        ?>

                                        <div class="op syllab"><?php echo @$abc[$i]; ?> <input type="checkbox" name="answer[<?php echo $qk; ?>][]" id="answer_value<?php echo $qk . '-' . $i; ?>"   value="<?php echo $option['oid']; ?>"  <?php
                                        if (in_array($option['oid'], $save_ans)) {
                                            echo 'checked';
                                        }
                                        ?> > <?php echo $option['q_option']; ?> </div>
                                        <?php
                                        $i+=1;
                                    } else {
                                        $i = 0;
                                    }
                                }
                                ?>
                            <?php endif; ?> 
                            <!-- question_type = 9  souligner -->
                            <?php if ($question['question_type'] == 9) : ?>
                                <?php
                                $save_ans = "";
                                if (isset($question['is_default_txt']) && $question['is_default_txt']) {
                                    $save_ans .= $question['default_txt'];
                                }


                                foreach ($saved_answers as $svk => $saved_answer) {
                                    if ($question['qid'] == $saved_answer['qid']) {
                                        $save_ans = $saved_answer['q_option'];
                                    }
                                }
                                ?>
                                <input type="hidden" name="question_type[]" id="q_type<?php echo $qk; ?>" value="9">
                                <div class="txt_highlight" >       
                                    <div id="answer_highlight<?php echo $qk; ?>" class="answer_hedit"><?php echo $save_ans; ?></div>
                                    <textarea s  name="answer[<?php echo $qk; ?>][]" id="answer_value<?php echo $qk; ?>" style="width:100%; height:100%; min-width: 300px; min-height: 350px; display: none"><?php echo $save_ans; ?></textarea>
                                </div>

                                <div style="margin-top: 2%">
                                    <input type="button" onclick="btn_init(<?php echo $qk; ?>)" value="reinitialiser la sélection" class="btn btn-danger"/>
                                </div>
                            <?php endif; ?>  

                            <!-- question_type = 10 texte lacunaire-->     
                            <?php if ($question['question_type'] == 10) : ?>

                                <?php
                                foreach ($saved_answers as $svk => $saved_answer) {
                                    if ($question['qid'] == $saved_answer['qid']) {
                                        $save_ans[] = $saved_answer['q_option'];
                                    }
                                }

                                if ($question['is_default_txt'] == 1) {
                                    //liste deroulante
                                    $count_var = substr_count($question['default_txt'], '{rep');
                                    for ($i = 1; $i <= $count_var; $i++) {
                                        $options_list = array();
                                        $replace = "<select name='answer[" . $qk . "][]'>";
                                        if (!empty($options)) {
                                            //$list = explode(';', $question['default_txt']);
                                            foreach ($options as $key => $option) {
                                                if ($option['qid'] == $question['qid']) {
                                                    $options_list[] = $option['q_option'];
                                                }
                                            }
                                            foreach ($options_list as $l) {
                                                $replace .= "<option value='" . $l . "'";

                                                if (isset($save_ans) && in_array($save_ans[$i - 1], $options_list) && $save_ans[$i - 1] == $l) {
                                                    $replace .= " selected=true";
                                                }
                                                $replace .= ">" . $l . "</option>";
                                            }
                                            $replace .= "</select>";
                                        }
                                        $question['default_txt'] = str_replace('{rep' . $i . '}', $replace, $question['default_txt']);
                                    }
                                } else {
                                    //champ libre
                                    
                                    $count_var = substr_count($question['default_txt'], '{rep');
                                    for ($i = 1; $i <= $count_var; $i++) {
                                        $replace = "<input type='text' style='margin:1%; max-width:100px' name='answer[" . $qk . "][]'  value='";
                                        if ((isset($save_ans) && $save_ans[$i - 1])) {
                                            $replace .= $save_ans[$i - 1];
                                        }
                                        $replace .= "'/>";
                                        
                                        $question['default_txt'] = str_replace('{rep' . $i . '}', $replace, $question['default_txt']);
                                    }
                                }
                                ?>

                                <div class="op"> 
                                    <b><?php echo $this->lang->line('answer'); ?> <br><br></b>
                                    <?php echo $question['default_txt']; ?>
                                </div>        

                                <input type="hidden" name="question_type[]" id="q_type<?php echo $qk; ?>" value="10">
                            <?php endif; ?>    
                        </div> 
                    </div>
    <?php
}
?>
            </form>
        </div>
    </div>
</div>

<div class="footer_buttons">
    <!--button class="btn btn-warning"   onClick="javascript:review_later();" style="margin-top:2px;" ><?php //echo $this->lang->line('review_later');        ?></button-->
    <!--button class="btn btn-info"  onClick="javascript:clear_response();"  style="margin-top:2px;"  ><?php //echo $this->lang->line('clear');        ?></button-->
    <button class="btn btn-primary"  id="backbtn" style="visibility:hidden;" onClick="javascript:show_back_question();"  style="margin-top:2px;" ><?php echo $this->lang->line('back'); ?></button>

    <button class="btn btn-success" id="nextbtn" onClick="javascript:show_next_question();" style="margin-top:2px;" ><?php echo $this->lang->line('save_next'); ?></button>

    <button class="btn btn-danger"  id="confbtn" onClick="javascript:cancelmove();" style="margin-top:2px;" ><?php echo $this->lang->line('submit_quiz'); ?></button>
</div>


<script>
    var ctime = 0;
    var ind_time = new Array();
<?php
$ind_time = explode(',', $quiz['individual_time']);
for ($ct = 0; $ct < $quiz['noq']; $ct++) {
    ?>
        ind_time[<?php echo $ct; ?>] =<?php echo $ind_time[$ct]; ?>;
    <?php
}
?>
    noq = "<?php echo $quiz['noq']; ?>";
    show_question('0');


    function increasectime() {

        ctime += 1;

    }
    setInterval(increasectime, 1000);
    setInterval(setIndividual_time, 30000);

</script>




<div  id="warning_div" style="padding:10px; position:fixed;z-index:100;display:none;width:100%;border-radius:5px;height:200px; border:1px solid #dddddd;left:4px;top:70px;background:#ffffff;">
    <center><b> <?php echo $this->lang->line('really_Want_to_submit'); ?></b> <br><br>
        <a href="javascript:cancelmove();"   class="btn btn-danger"  style="cursor:pointer;"><?php echo $this->lang->line('cancel'); ?></a> &nbsp; &nbsp; &nbsp; &nbsp;
        <a href="javascript:submit_quiz();"   class="btn btn-info"  style="cursor:pointer;"><?php echo $this->lang->line('submit_quiz'); ?></a>

    </center>
</div>