<style>
    @media print {

        .navbar{
            display:none;
        }
        #footer{
            display:none;
        } 
        .printbtn{
            display:none; 
        }
        #social_share{
            display:none;
        }
        #page_break2{

            page-break-after: always;
        }


    }
    td{
        font-size:14px;
        padding:4px;
    }

    .select_table table td, .select_table table th{
        border: 2px solid #0091dd;

    }
    .tt{
        color:red;
        background : #ffff00;    
    }


</style>
<div class="container">
    <?php
    $logged_in = $this->session->userdata('logged_in');
    ?>

    <h3><?php echo $title; ?></h3>


    <a href="javascript:print();" class="btn btn-success printbtn"><?php echo $this->lang->line('print'); ?></a>

    <?php
    if ($result['gen_certificate'] == '1') {
        ?>
        <a href="<?php echo site_url('result/generate_certificate/' . $result['rid']); ?>" class="btn btn-warning printbtn"><?php echo $this->lang->line('download_certificate'); ?></a>

        <?php
    }
    ?>
    <div class="row">

        <div class="col-md-12">
            <br> 
            <div class="login-panel panel panel-default">
                <div class="panel-body"> 




                    <table class="table table-bordered">
                        <?php
                        if ($result['camera_req'] == '1') {
                            ?>
                            <tr><td colspan='2'> <?php if ($result['photo'] != '') { ?> <img src ="<?php echo base_url('photo/' . $result['photo']); ?>" id="photograph" ><?php } ?></td></tr>

                            <?php
                        }
                        ?>
                        <tr><td><?php echo $this->lang->line('first_name'); ?></td><td><?php echo $result['first_name']; ?></td></tr>
                        <tr><td><?php echo $this->lang->line('last_name'); ?></td><td><?php echo $result['last_name']; ?></td></tr>
                        <tr><td><?php echo $this->lang->line('email'); ?></td><td><?php echo $result['email']; ?></td></tr>
                        <tr><td><?php echo $this->lang->line('quiz_name'); ?></td><td><?php echo $result['quiz_name']; ?></td></tr>
                        <tr><td><?php echo $this->lang->line('attempt_time'); ?></td><td><?php echo date('Y-m-d H:i:s', $result['start_time']); ?></td></tr>
                        <tr><td><?php echo $this->lang->line('time_spent'); ?></td><td><?php echo intval($result['total_time'] / 60); ?></td></tr>
                        <tr><td><?php echo $this->lang->line('percentage_obtained'); ?></td><td><?php echo $result['percentage_obtained']; ?>%</td></tr>
                        <tr><td><?php echo $this->lang->line('percentile_obtained'); ?></td><td><?php echo substr(((($percentile[1] + 1) / $percentile[0]) * 100), 0, 5); ?>%</td></tr>
                        <tr><td><?php echo $this->lang->line('score_obtained'); ?></td><td><?php echo $result['score_obtained']; ?></td></tr>
                        <tr><td><?php echo $this->lang->line('status'); ?></td><td><?php echo $result['result_status']; ?></td></tr>

                    </table>


                </div>
            </div>
            <br>


            <?php
            if ($this->config->item('google_chart') == true) {
                ?>


                <!-- google chart starts -->
                <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                <script type="text/javascript">
                    google.load("visualization", "1", {packages: ["corechart"]});
                    google.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable(<?php echo $value; ?>);

                        var options = {
                            title: '<?php echo $this->lang->line('top_10_result'); ?> <?php echo $result['quiz_name']; ?>',
                                        hAxis: {title: '<?php echo $this->lang->line('quiz'); ?>(<?php echo $this->lang->line('user'); ?>)', titleTextStyle: {color: 'red'}}
                                    };

                                    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                                    chart.draw(data, options);
                                }
                </script>
                <div id="chart_div" style="width: 800px; height: 500px;"></div>
                <!-- google chart ends -->


                <!-- google chart starts -->

                <script type="text/javascript">
                    google.load("visualization", "1", {packages: ["corechart"]});
                    google.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable(<?php echo $qtime; ?>);

                        var options = {
                            title: '<?php echo $this->lang->line('time_spent_on_ind'); ?>'
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
                        chart.draw(data, options);
                    }
                </script>
                <div id="chart_div2" style="width:800px; height: 500px;"></div>
                <!-- google chart ends -->

                <?php
            }

            $ind_score = explode(',', $result['score_individual']);
// view answer
            if ($result['view_answer'] == '1' || $logged_in['su'] == '1') {
                ?>

                <div class="login-panel panel panel-default">
                    <div class="panel-body"> 
                        <h3><?php echo $this->lang->line('answer_sheet'); ?></h3>

                        <?php
                        $abc = array(
                            '0' => 'A',
                            '1' => 'B',
                            '2' => 'C',
                            '3' => 'D',
                            '4' => 'E',
                            '6' => 'F',
                            '7' => 'G',
                            '8' => 'H',
                            '9' => 'I',
                            '10' => 'J',
                            '11' => 'K'
                        );
                        foreach ($questions as $qk => $question) {
                            ?>
                            <hr>
                            <div id="q<?php echo $qk; ?>" class="" style="<?php if ($ind_score[$qk] == '1') { ?>background-color:#e3f8da;<?php } else if ($ind_score[$qk] == '2') { ?>background-color:#ffe1cb;<?php } else if ($ind_score[$qk] == '3') { ?>background-color:#fdfbcf;<?php } else { ?>background-color:#ffffff;<?php } ?>">

                                <div style="padding:10px;" >
                                    <?php echo '<b>' . $this->lang->line('question'); ?> <?php echo $qk + 1; ?>)</b><br>
                                    <?php echo $question['question']; ?>
                                    <hr>
                                    <?php
                                    if ($question['description'] != '') {
                                        echo '<b>' . $this->lang->line('description') . '</b><br>';
                                        echo $question['description'];
                                    }
                                    ?> 
                                </div>
                                <div style="padding:10px;" >
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
                                        $correct_options = array();
                                        foreach ($options as $ok => $option) {
                                            if ($option['qid'] == $question['qid']) {
                                                if ($option['score'] >= 0.1) {
                                                    $correct_options[] = $option['q_option'];
                                                }
                                                ?>

                                                <div class="op"><?php echo $abc[$i]; ?>) <input type="radio" name="answer[<?php echo $qk; ?>][]"  id="answer_value<?php echo $qk . '-' . $i; ?>" value="<?php echo $option['oid']; ?>"   <?php
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
                                        echo "<br><b>" . $this->lang->line('correct_options') . '</b>: ' . implode(', ', $correct_options);
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
                                        $correct_options = array();
                                        foreach ($options as $ok => $option) {
                                            if ($option['qid'] == $question['qid']) {
                                                if ($option['score'] >= 0.1) {
                                                    $correct_options[] = $option['q_option'];
                                                }
                                                ?>

                                                <div class="op"><?php echo @$abc[$i]; ?>) <input type="checkbox" name="answer[<?php echo $qk; ?>][]" id="answer_value<?php echo $qk . '-' . $i; ?>"   value="<?php echo $option['oid']; ?>"  <?php
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
                                        echo "<br><b>" . $this->lang->line('correct_options') . '</b>: ' . implode(', ', $correct_options);
                                    }

                                    // short answer	

                                    if ($question['question_type'] == 4) {
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
                                        $opt = array();

                                        foreach ($options as $ok => $option) {
                                            if ($option['qid'] == $question['qid']) {
                                                $opt[] = $option['q_option'];
                                                ?>
                                                <?php
                                                $i+=1;
                                            } else {
                                                $i = 0;
                                            }
                                        }
                                        ?>
                                        <div  class="op" style="float: none;">
                                            <table>
                                                <tr><td><?php echo $this->lang->line('your_answer'); ?></td><td><?php echo $this->lang->line('correct_answer'); ?></td></tr>
                                                <?php
                                                foreach ($opt as $mk1 => $mval) {
                                                    ?>
                                                    <tr><td>
                                                            <?php echo $abc[$mk1]; ?>)<input type="text"  value="<?php echo $save_ans[$mk1]; ?>" />
                                                        </td>

                                                        <td>
                                                            <?php echo $mval; ?> 
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </table>
                                        </div>
                                        <?php
                                    }



                                    // long answer	

                                    if ($question['question_type'] == 5) {
                                        $save_ans = "";
                                        foreach ($saved_answers as $svk => $saved_answer) {
                                            if ($question['qid'] == $saved_answer['qid']) {
                                                $save_ans = $saved_answer['q_option'];
                                            }
                                        }
                                        ?>
                                        <input type="hidden"  name="question_type[]" id="q_type<?php echo $qk; ?>" value="4">
                                        <?php
                                        ?>

                                        <div class="op" style="float: none;"> 
                                            <?php echo $this->lang->line('answer'); ?> <br>
                                            <?php echo $this->lang->line('word_counts'); ?>  <?php echo str_word_count($save_ans); ?>
                                            <textarea name="answer[<?php echo $qk; ?>][]" id="answer_value<?php echo $qk; ?>" style="width:100%;height:100%;" onKeyup="count_char(this.value, 'char_count<?php echo $qk; ?>');"><?php echo $save_ans; ?></textarea>
                                        </div>
                                        <?php
                                        if ($logged_in['su'] == '1') {
                                            if ($ind_score[$qk] == '3') {
                                                ?>
                                                <div id="assign_score<?php echo $qk; ?>">
                                                    <?php echo $this->lang->line('evaluate'); ?>	
                                                    <a href="javascript:assign_score('<?php echo $result['rid']; ?>','<?php echo $qk; ?>','1');"  class="btn btn-success" ><?php echo $this->lang->line('correct'); ?></a>	
                                                    <a href="javascript:assign_score('<?php echo $result['rid']; ?>','<?php echo $qk; ?>','2');"  class="btn btn-danger" ><?php echo $this->lang->line('incorrect'); ?></a>	
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>		

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
                                        $match_1 = array();
                                        $match_2 = array();
                                        foreach ($options as $ok => $option) {
                                            if ($option['qid'] == $question['qid']) {
                                                $match_1[] = $option['q_option'];
                                                $match_2[] = $option['q_option_match'];
                                                ?>



                                                <?php
                                                $i+=1;
                                            } else {
                                                $i = 0;
                                            }
                                        }
                                        ?>
                                        <div  class="op" style="float: none;">
                                            <table>
                                                <tr><td></td><td><?php echo $this->lang->line('your_answer'); ?></td><td><?php echo $this->lang->line('correct_answer'); ?></td></tr>
                                                <?php
                                                foreach ($match_1 as $mk1 => $mval) {
                                                    ?>
                                                    <tr><td>
                                                            <?php echo $abc[$mk1]; ?>)  <?php echo $mval; ?> 
                                                        </td>
                                                        <td>

                                                            <select name="answer[<?php echo $qk; ?>][]" id="answer_value<?php echo $qk . '-' . $mk1; ?>"  >
                                                                <option value="0"><?php echo $this->lang->line('select'); ?></option>
                                                                <?php
                                                                foreach ($match_2 as $mk2 => $mval2) {
                                                                    ?>
                                                                    <option value="<?php echo $mval . '___' . $mval2; ?>"  <?php
                                                                    $m1 = $mval . '___' . $mval2;
                                                                    if (in_array($m1, $save_ans)) {
                                                                        echo 'selected';
                                                                    }
                                                                    ?> ><?php echo $mval2; ?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo $match_2[$mk1];
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </table>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                    <!-- question n°:06 -->    
                                    <?php
                                    if ($question['question_type'] == 6) {
                                        $save_ans = "";
                                        foreach ($saved_answers as $svk => $saved_answer) {
                                            if ($question['qid'] == $saved_answer['qid']) {
                                                $save_ans = $saved_answer['q_option'];
                                            }
                                        }
                                        $save_answ = json_decode($save_ans);
                                        ?>
                                        <input type="hidden"  name="question_type[]" id="q_type<?php echo $qk; ?>" value="6">
                                        <?php
                                        ?>
                                        <div class="op" style="float: none;"> 
                                            <b><?php //echo $this->lang->line('search');    ?> Zone de recherche<br></b>
                                            <?php //echo $this->lang->line('word_counts');  ?> <!--span id="char_count<?php //echo $qk;  ?>">0</span-->
                                            <?php ?>

                                            <textarea  name="answer[<?php echo $qk; ?>][]" id="answer_value<?php echo $qk; ?>" style="width:100%; height:100%; min-width: 300px; min-height: 250px"  onKeyup="count_char(this.value, 'char_count<?php echo $qk; ?>');"><?php echo isset($save_answ->search) ? $save_answ->search : ""; ?></textarea>
                                        </div>

                                        <div class="op" style="float: none;"> 
                                            <b><?php echo $this->lang->line('answer'); ?> <br></b>
                                            <?php //echo $this->lang->line('word_counts');  ?> <!--span id="char_count<?php //echo $qk;  ?>">0</span-->
                                            <?php ?>

                                            <textarea  name="answer[<?php echo $qk; ?>][]" id="answer_value<?php echo $qk; ?>" style="width:100%; height:50%; min-width: 300px; min-height: 100px"  onKeyup="count_char(this.value, 'char_count<?php echo $qk; ?>');"><?php echo isset($save_answ->response) ? $save_answ->response : ""; ?></textarea>
                                        </div>


                                        <?php
                                        if ($logged_in['su'] == '1') {
                                            if ($ind_score[$qk] == '3') {
                                                ?>
                                                <div id="assign_score<?php echo $qk; ?>">
                                                    <?php echo $this->lang->line('evaluate'); ?>	
                                                    <a href="javascript:assign_score('<?php echo $result['rid']; ?>','<?php echo $qk; ?>','1');"  class="btn btn-success" ><?php echo $this->lang->line('correct'); ?></a>	
                                                    <a href="javascript:assign_score('<?php echo $result['rid']; ?>','<?php echo $qk; ?>','2');"  class="btn btn-danger" ><?php echo $this->lang->line('incorrect'); ?></a>	
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>		

                                    <?php }
                                    ?>
                                    <!-- question n°:07 -->

                                    <?php
                                    if ($question['question_type'] == 7) {
                                        $save_ans = "";
                                        foreach ($saved_answers as $svk => $saved_answer) {
                                            if ($question['qid'] == $saved_answer['qid']) {
                                                $save_ans = $saved_answer['q_option'];
                                            }
                                        }
                                        ?>
                                        <input type="hidden"  name="question_type[]" id="q_type<?php echo $qk; ?>" value="7">
                                        <?php ?>

                                        <div class="op" style="float: none;"> 
                                            <?php echo $this->lang->line('answer'); ?> <br>
                                            <?php echo $this->lang->line('word_counts'); ?>  <?php echo str_word_count($save_ans); ?>
                                            <!--textarea name="answer[<?php //echo $qk;   ?>][]" id="answer_value<?php //echo $qk;   ?>" style="width:100%;height:100%;" onKeyup="count_char(this.value, 'char_count<?php echo $qk; ?>');"><?php //echo $save_ans;   ?></textarea-->
                                            <div class="select_table">   <?php echo $save_ans; ?> </div>
                                        </div>
                                        <?php
                                        if ($logged_in['su'] == '1') {
                                            if ($ind_score[$qk] == '3') {
                                                ?>
                                                <div id="assign_score<?php echo $qk; ?>">
                                                    <?php echo $this->lang->line('evaluate'); ?>	
                                                    <a href="javascript:assign_score('<?php echo $result['rid']; ?>','<?php echo $qk; ?>','1');"  class="btn btn-success" ><?php echo $this->lang->line('correct'); ?></a>	
                                                    <a href="javascript:assign_score('<?php echo $result['rid']; ?>','<?php echo $qk; ?>','2');"  class="btn btn-danger" ><?php echo $this->lang->line('incorrect'); ?></a>	
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>		

                                    <?php }
                                    ?>
                                    <!-- question n°:08 à voir enregistrement des réponses et options-->
                                    <?php
                                    if ($question['question_type'] == 8) {
                                        $save_ans = array();
                                        foreach ($saved_answers as $svk => $saved_answer) {
                                            if ($question['qid'] == $saved_answer['qid']) {
                                                $save_ans[] = $saved_answer['q_option'];
                                            }
                                        }
                                        ?>
                                        <input type="hidden"  name="question_type[]"  id="q_type<?php echo $qk; ?>" value="8">
                                        <?php echo $this->lang->line('answer'); ?> <br>
                                        <?php
                                        $i = 0;
                                        $correct_options = array();

                                        foreach ($options as $ok => $option) {
                                            if ($option['qid'] == $question['qid']) {
                                                //if ($option['score'] >= 0.1) {
                                                $correct_options[] = $option['score'];
                                                //}
                                                ?>

                                        <div class="op" style="display: inline-block; float: none;"><?php echo @$abc[$i]; ?>) <input type="checkbox" name="answer[<?php echo $qk; ?>][]" id="answer_value<?php echo $qk . '-' . $i; ?>"   value="<?php echo $option['oid']; ?>"  <?php
                                                    if (in_array($option['oid'], $save_ans)) {
                                                        echo 'checked';
                                                    }
                                                    ?> > 
                                                </div>


                                                <?php
                                                $i+=1;
                                            } else {
                                                $i = 0;
                                            }
                                        }
                                        ?> 
                                        <div style="clear:both"></div>
                                        <div class="op" style="display: inline-block; float: none;">
                                            <?php echo "<br>" . $this->lang->line('correct_answer') ."<br><br>";  ?>
                                            <?php
                                            foreach ($correct_options as $k => $correct) :?>
                                            <?php echo @$abc[$k]; ?>)<input type="checkbox" disabled="true" <?php if ($correct >= 0.1) { echo 'checked';} ?>/> &nbsp;&nbsp;
                                            <?php endforeach; ?>
                                        </div>
                                            <?php }?>
                                            <!-- question n°:09 -->
                                            <?php
                                            if ($question['question_type'] == 9) {
                                            $save_ans = "";
                                            foreach ($saved_answers as $svk => $saved_answer) {
                                            if ($question['qid'] == $saved_answer['qid']) {
                                            $save_ans = $saved_answer['q_option'];
                                            }
                                            }
                                            ?>
                                            <input type="hidden"  name="question_type[]" id="q_type<?php echo $qk; ?>" value="9">
                                            <?php
                                            ?>

                                            <div class="op" style="float: none;"> 
                                                <?php echo $this->lang->line('answer'); ?> <br>
                                                <?php echo $save_ans; ?>
                                            </div>
                                            <?php
                                            if ($logged_in['su'] == '1') {
                                            if ($ind_score[$qk] == '3') {
                                            ?>
                                            <div id="assign_score<?php echo $qk; ?>">
                                                <?php echo $this->lang->line('evaluate'); ?>	
                                                <a href="javascript:assign_score('<?php echo $result['rid']; ?>','<?php echo $qk; ?>','1');"  class="btn btn-success" ><?php echo $this->lang->line('correct'); ?></a>	
                                                <a href="javascript:assign_score('<?php echo $result['rid']; ?>','<?php echo $qk; ?>','2');"  class="btn btn-danger" ><?php echo $this->lang->line('incorrect'); ?></a>	
                                            </div>
                                            <?php
                                            }
                                            }
                                            ?>		

                                            <?php }
                                            ?>

                                        </div> 
                                    </div>
                                    <div id="page_break"></div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
// view answer ends
                    ?>
                </div>
            </div>
        </div>
        <input type="hidden" id="evaluate_warning" value="<?php echo $this->lang->line('evaluate_warning'); ?>">
