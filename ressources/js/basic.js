
function remove_entry(redir_cont) {

    if (confirm("Do you really want to remove entry?")) {
        window.location = base_url + "index.php/" + redir_cont;
    }

}



function updategroup(vall, gid) {

    var formData = {group_name: vall};
    $.ajax({
        type: "POST",
        data: formData,
        url: base_url + "index.php/user/update_group/" + gid,
        success: function (data) {
            $("#message").html(data);

        },
        error: function (xhr, status, strErr) {
            //alert(status);
        }
    });

}

function updategroupprice(vall, gid) {

    var formData = {price: vall};
    $.ajax({
        type: "POST",
        data: formData,
        url: base_url + "index.php/user/update_group/" + gid,
        success: function (data) {
            $("#message").html(data);

        },
        error: function (xhr, status, strErr) {
            //alert(status);
        }
    });

}


function updategroupvalid(vall, gid) {

    var formData = {valid_day: vall};
    $.ajax({
        type: "POST",
        data: formData,
        url: base_url + "index.php/user/update_group/" + gid,
        success: function (data) {
            $("#message").html(data);

        },
        error: function (xhr, status, strErr) {
            //alert(status);
        }
    });

}



function updatecategory(vall, cid) {

    var formData = {category_name: vall};
    $.ajax({
        type: "POST",
        data: formData,
        url: base_url + "index.php/qbank/update_category/" + cid,
        success: function (data) {
            $("#message").html(data);

        },
        error: function (xhr, status, strErr) {
            //alert(status);
        }
    });

}



function getexpiry() {
    var gid = document.getElementById('gid').value;
    var formData = {gid: gid};
    $.ajax({
        type: "POST",
        data: formData,
        url: base_url + "index.php/user/get_expiry/" + gid,
        success: function (data) {
            $("#subscription_expired").val(data);

        },
        error: function (xhr, status, strErr) {
            //alert(status);
        }
    });

}


function updatelevel(vall, lid) {

    var formData = {level_name: vall};
    $.ajax({
        type: "POST",
        data: formData,
        url: base_url + "index.php/qbank/update_level/" + lid,
        success: function (data) {
            $("#message").html(data);

        },
        error: function (xhr, status, strErr) {
            //alert(status);
        }
    });

}


function hidenop(vall) {

    var arr = ['1', '2', '3', '4', '8'];
    if ($.inArray(vall, arr) != -1) { // if type of the question in array
        $("#nop").css('display', 'block');
        $("#nop-long").css('display', 'none');
    } else {
        if (vall == '5') {
            $("#nop-long").css('display', 'block');
        } else {
            $("#nop-long").css('display', 'none');
        }
        $("#nop").css('display', 'none');
    }
}


function addquestion(quid, qid) {
    var did = '#q' + qid;
    var formData = {quid: quid};
    $.ajax({
        type: "POST",
        data: formData,
        url: base_url + "index.php/quiz/add_qid/" + quid + '/' + qid,
        success: function (data) {
            $(did).html(document.getElementById('added').value);

        },
        error: function (xhr, status, strErr) {
            //alert(status);
        }
    });

}

var position_type = "Up";
var global_quid = "0";
var global_qid = "0";
var global_opos = "0";

function cancelmove(position_t, quid, qid, opos) {
    save_answer(qn);
    position_type = position_t;
    global_quid = quid;
    global_qid = qid;
    global_opos = opos;

    if ((document.getElementById('warning_div').style.display) == "block") {
        document.getElementById('warning_div').style.display = "none";
    } else {
        document.getElementById('warning_div').style.display = "block";
        if (position_type == "Up") {
            var upos = parseInt(global_opos) - parseInt(1);
        } else {
            var upos = parseInt(global_opos) + parseInt(1);
        }
        document.getElementById('qposition').value = upos;

    }

}


function movequestion() {

    var pos = document.getElementById('qposition').value;

    if (position_type == "Up") {
        var npos = parseInt(global_opos) - parseInt(pos);
        window.location = base_url + "index.php/quiz/up_question/" + global_quid + "/" + global_qid + "/" + npos;
    } else {
        var npos = parseInt(pos) - parseInt(global_opos);
        window.location = base_url + "index.php/quiz/down_question/" + global_quid + "/" + global_qid + "/" + npos;
    }
}



function no_q_available(lid) {
    var cid = document.getElementById('cid').value;

    var formData = {cid: cid};
    $.ajax({
        type: "POST",
        data: formData,
        url: base_url + "index.php/quiz/no_q_available/" + cid + '/' + lid,
        success: function (data) {
            $('#no_q_available').html(data);

        },
        error: function (xhr, status, strErr) {
            //alert(status);
        }
    });
}




// quiz attempt functions 

var noq = 0;
var qn = 0;
var lqn = 0;

function fide_all_question() {

    for (var i = 0; i < noq; i++) {

        var did = "#q" + i;
        $(did).css('display', 'none');
    }
}


function show_question(vqn) {
    change_color(vqn);
    fide_all_question();
    var did = "#q" + vqn;
    $(did).css('display', 'block');
    // hide show next back btn
    if (vqn >= 1) {
        $('#backbtn').css('visibility', 'visible');
    }

    if (vqn < noq) {
        $('#nextbtn').css('visibility', 'visible');
    }
    if ((parseInt(vqn) + 1) == noq) {

        $('#nextbtn').css('visibility', 'hidden');
    }
    if (vqn == 0) {
        $('#backbtn').css('visibility', 'hidden');
    }

    // last qn
    qn = vqn;
    lqn = vqn;
    setIndividual_time(lqn);
    save_answer(lqn);

}

function show_next_question() {

    if ((parseInt(qn) + 1) < noq) {
        fide_all_question();
        qn = (parseInt(qn) + 1);
        var did = "#q" + qn;
        $(did).css('display', 'block');
    }
    // hide show next back btn
    if (qn >= 1) {
        $('#backbtn').css('visibility', 'visible');
    }
    if ((parseInt(qn) + 1) == noq) {
        $('#nextbtn').css('visibility', 'hidden');
        $('#confbtn').css('visibility', 'visible');
    }
    change_color(lqn);
    setIndividual_time(lqn);
    save_answer(lqn);

    // last qn
    lqn = qn;

}
function show_back_question() {

    if ((parseInt(qn) - 1) >= 0) {
        fide_all_question();
        qn = (parseInt(qn) - 1);
        var did = "#q" + qn;
        $(did).css('display', 'block');
    }
    // hide show next back btn
    if (qn < noq) {
        $('#nextbtn').css('visibility', 'visible');
        $('#confbtn').css('visibility', 'hidden');
    }
    if (qn == 0) {
        $('#backbtn').css('visibility', 'hidden');
    }
    change_color(lqn);
    setIndividual_time(lqn);

    save_answer(lqn);

    // last qn
    lqn = qn;

}


function change_color(qn) {
    var did = '#qbtn' + qn;
    var q_type = '#q_type' + lqn;

    // if not answered then make red
    // alert($(did).css('backgroundColor'));
    if ($(did).css('backgroundColor') != 'rgb(68, 157, 68)' && $(did).css('backgroundColor') != 'rgb(236, 151, 31)') {
        $(did).css('backgroundColor', '#c9302c');
        $(did).css('color', '#ffffff');
    }

    // answered make green
    if (lqn >= '0' && $(did).css('backgroundColor') != 'rgb(236, 151, 31)') {
        var ldid = '#qbtn' + lqn;

        if ($(q_type).val() == '1' || $(q_type).val() == '2') {
            var green = 0;
            for (var k = 0; k <= 10; k++) {
                var answer_value = "answer_value" + lqn + '-' + k;
                if (document.getElementById(answer_value)) {
                    if (document.getElementById(answer_value).checked == true) {
                        green = 1;
                    }
                }
            }
            if (green == 1) {
                $(ldid).css('backgroundColor', '#449d44');
                $(ldid).css('color', '#ffffff');
            }
        }

        if ($(q_type).val() == '3' || $(q_type).val() == '4') {
            var answer_value = "#answer_value" + lqn;
            if ($(answer_value).val() != '') {
                $(ldid).css('backgroundColor', '#449d44');
                $(ldid).css('color', '#ffffff');
            }
        }

        if ($(q_type).val() == '5') {
            var green = 0;
            for (var k = 0; k <= 10; k++) {
                var answer_value = "answer_value" + lqn + '-' + k;
                if (document.getElementById(answer_value)) {
                    if (document.getElementById(answer_value).value != '0') {
                        green = 1;
                    }
                }
            }
            if (green == 1) {
                $(ldid).css('backgroundColor', '#449d44');
                $(ldid).css('color', '#ffffff');
            }
        }

    }

}


// clear radio btn response
function clear_response() {
    var q_type = '#q_type' + qn;
    if ($(q_type).val() == '1' || $(q_type).val() == '2') {
        for (var k = 0; k <= 10; k++) {
            var answer_value = "answer_value" + lqn + '-' + k;
            if (document.getElementById(answer_value)) {
                if (document.getElementById(answer_value).checked == true) {
                    document.getElementById(answer_value).checked = false;
                }
            }
        }
    }

    if ($(q_type).val() == '3' || $(q_type).val() == '4') {
        var answer_value = "answer_value" + qn;
        document.getElementById(answer_value).value = '';
    }



    if ($(q_type).val() == '5') {

        for (var k = 0; k <= 10; k++) {
            var answer_value = "answer_value" + qn + '-' + k;
            if (document.getElementById(answer_value)) {
                if (document.getElementById(answer_value).value != '0') {
                    document.getElementById(answer_value).value = '0';
                }
            }
        }

    }
    var did = '#qbtn' + qn;
    $(did).css('backgroundColor', '#c9302c');
    $(did).css('color', '#ffffff');
}

var review_later;
function review_later() {


    if (review_later[qn] && review_later[qn]) {

        review_later[qn] = 0;
        var did = '#qbtn' + qn;
        $(did).css('backgroundColor', '#c9302c');
        $(did).css('color', '#ffffff');
    } else {

        review_later[qn] = 1;
        var did = '#qbtn' + qn;
        $(did).css('backgroundColor', '#ec971f');
        $(did).css('color', '#ffffff');
    }

}

    function getAnswer() {
        var answer = [];
        $('.question-items').find('.item').each(function(){
            if(!$(this).hasClass('selected')){
                answer = false;
                return;
            }
            if(answer){
                var index = $(this).index();
                var result = $('.answer-items').find('.answer-'+index);
                //var value = [$(this).attr('data-target'),result.attr('data-target')];
                var value = $(this).attr('data-value')+'___'+result.attr('data-value');
                answer.push(value);
            }

        });
        return answer;
    }


function save_answer(qn) {

    content_ans = $("#answer_edit_div" + qn).html();
    if (content_ans) {
        $('#answer_value' + qn).val(content_ans);
    }

    //datas souligner
    content_line = $("#answer_highlight" + qn).html();
    if (content_line) {
        $('#answer_value' + qn).val(content_line);
    }

    //relier
    type_q = $('#q_type' +qn).val();
    if(type_q == 5){
        var answer = getAnswer();
        if(!answer){
            //alert('Incomplete answer');
            console.log('Incomplete answer');
        }else{
            //$('#answer_'+qn).val(answer.toString());
            $('#answer_'+qn).val(answer.join(';'));
        }
        
    }
    
    
    // signal 1
    $('#save_answer_signal1').css('backgroundColor', '#00ff00');
    setTimeout(function () {
        $('#save_answer_signal1').css('backgroundColor', '#666666');
    }, 5000);

    var str = $("form").serialize();

    // var formData = {user_answer:str};
    $.ajax({
        type: "POST",
        data: str,
        url: base_url + "index.php/quiz/save_answer/",
        success: function (data) {
            // signal 1
            $('#save_answer_signal2').css('backgroundColor', '#00ff00');
            setTimeout(function () {
                $('#save_answer_signal2').css('backgroundColor', '#666666');
            }, 5000);

        },
        error: function (xhr, status, strErr) {
            //alert(status);

            // signal 1
            $('#save_answer_signal2').css('backgroundColor', '#ff0000');
            setTimeout(function () {
                $('#save_answer_signal2').css('backgroundColor', '#666666');
            }, 5500);

        }
    });



}


//==============================================================================

function submit_qeditable() {


    var editor = tinymce.get('default_txt'); // use your own editor id here - equals the id of your textarea
    var content = editor.getContent();

    content = content.replace(/contenteditable="true"/ig, '');
    content = content.replace(/>&nbsp;<\/td>/ig, ' contenteditable="true"></td>');
    editor.setContent(content);

}

//==============================================================================


//==============================================================================

function setIndividual_time(cqn) {//cqn='0' not supported by chrome
    if (cqn == '0') {
        ind_time[qn] = parseInt(ind_time[qn]) + parseInt(ctime);

    } else {

        ind_time[cqn] = parseInt(ind_time[cqn]) + parseInt(ctime);

    }

    ctime = 0;

    document.getElementById('individual_time').value = ind_time.toString();

    var iid = document.getElementById('individual_time').value;


    var formData = {individual_time: iid};
    $.ajax({
        type: "POST",
        data: formData,
        url: base_url + "index.php/quiz/set_ind_time",
        success: function (data) {

        },
        error: function (xhr, status, strErr) {
            //alert(status);
        }
    });

}




function submit_quiz() {
    
    save_answer(qn);
    setIndividual_time(qn);
    window.location = base_url + "index.php/quiz/submit_quiz/";
}



function switch_category(c_k) {

    var did = document.getElementById(c_k).value;
    show_question(did);

}


function count_char(answer, span_id) {
    var chcount = answer.split(' ').length;
    if (answer == '') {
        chcount = 0;
    }
    document.getElementById(span_id).innerHTML = chcount;

}



function sort_result(limit, val) {
    window.location = base_url + "index.php/result/index/" + limit + "/" + val;

}


function assign_score(rid, qno, score) {
    var evaluate_warning = document.getElementById('evaluate_warning').value;
    if (confirm(evaluate_warning)) {
        var formData = {rid: rid};
        $.ajax({
            type: "POST",
            data: formData,
            url: base_url + "index.php/quiz/assign_score/" + rid + '/' + qno + '/' + score,
            success: function (data) {
                var did = "#assign_score" + qno;
                $(did).css('display', 'none');
            },
            error: function (xhr, status, strErr) {
                //alert(status);
            }
        });
    }
}



function show_question_stat(id) {
    var did = "#stat-" + id;

    if ($(did).css('display') == 'none') {
        $(did).css('display', 'block');
    } else {
        $(did).css('display', 'none');
    }

}


function account_type() {
    var typeacc = document.getElementById('typeacc').value;
    if (typeacc == 1) {
        $('.pwd').removeClass('invisible');
    } else {
        $('.pwd').addClass('invisible');
    }

}

function checked_default_txt() {
    var def_txt = 'chk-default-txt';
    if (document.getElementById(def_txt))
        if (document.getElementById(def_txt).checked == true)
            $("#default-txt").css('display', 'block');
        else
            $("#default-txt").css('display', 'none');

}

function is_check_user() {
    var userIsChecked = $('input[name="check_user[]"]:checked').length > 0;
    if (userIsChecked) {
        $('.export').css('display', 'table-cell');
        $('.export_all').css('display', 'none');
    } else {
        $('.export').css('display', 'none');
        $('.export_all').css('display', 'table-cell');
    }

}

// get group of the questions
function group_question() {

    if ($('#check-object').is(":checked")) {
        if ($('.catg').val() == "-1") {
            $('.pquestion').css('display', 'none');
            $('.object-list').css('display', 'none');
            $(".object-list").html('');
        } else {
            $('.pquestion').css('display', 'block');
        }
    }

    var datas = 'catg_id=' + $('.catg').val();
    if ($('.catg').val() != "-1") {
        $.ajax({
            type: "POST",
            url: base_url + "qbank/ajax_group_question/",
            data: datas,
            cache: false,
            success: function (html)
            {
                $(".object-list").html(html);
            }
        });
    }
}

//réitialiser la sélection
function btn_init(qn) {
    $('#answer_highlight' + qn).html($('#answer_highlight' + qn).text());
}

//fucntion check lsit default
function check_list_ans() {
    if ($("#is_list_ans").is(":checked")) {
        $('#default_list').css('display', 'block');
    } else {
        $('#default_list').css('display', 'none');
    }
}


//
function getSelectedText() {
    if (window.getSelection) {
        return window.getSelection().toString();
    } else if (document.selection) {
        return document.selection.createRange().text;
    }
    return '';
}

$(document).ready(function () {
     
    $('#confbtn').css('visibility', 'hidden');

    if (document.getElementById("select-nop")) {
        var selected_nop = document.getElementById("select-nop").value;
        hidenop(selected_nop);
        checked_default_txt();
    }

    //affiche ou non les boutons export et suppression tant qu'un utilisateur est sélectionné
    is_check_user();

    $('.select_user').click(function () {
        is_check_user();
    });


    //==========================================================================

    $(".deleted_sub").each(function (e) {
        $(this).click(function () {
            if (confirm("Vous voulez vraiment les supprimer? Cette suppression est irreversible")) {
                window.location = $(this).attr('href');
            }
            //alert(JSON.stringify($(this).attr('href')));

            /*$(this).confirm({
             title: "Suppression des utilisateurs sélectionnés",
             text: "Vous voulez vraiment les supprimer? Cette suppression est irreversible",
             confirm: function (button) {
             button.fadeOut(2000).fadeIn(2000);
             alert(JSON.stringify($(this).attr('href')));
             $.ajax({
             type: "GET",
             url: $(this).attr('data-href'),
             //data: 'check_user=' + myCheckboxes,
             asynchronous: true,
             //cache: false,
             //beforeSend: function(){},
             success: function (data) {
             window.location = base_url + 'category/sub_category_list';
             
             }
             });
             },
             cancel: function (button) {
             button.fadeOut(2000).fadeIn(2000);
             //alert("You aborted the operation.");
             },
             confirmButton: "Oui",
             cancelButton: "Non"
             });*/
        });

    });


    $('[data-toggle="modal"]').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        if (url.indexOf('#') == 0) {
            $(url).modal('open');
        } else {
            $.get(url, function (data) {
                $('<div class="modal hide fade">' + data + '</div>').modal();
            }).success(function () {
                $('input:text:visible:first').focus();
            });
        }
    });


    $('.edit-modal').on('click', function (e) {
        e.preventDefault();
        $('#editModal').modal('show').find('.modal-body').load($(this).attr('href'));
    });



    //check object question

    if ($('#check-object').is(":checked")) {
        $('.object-list').css('display', 'block');
        if (!$('#edit-q').val()) {
            group_question();
        }
    } else {
        $('.object-list').css('display', 'none');

    }

    $('#check-object').click(function () {
        if ($(this).is(":checked")) {
            $('.object-list').css('display', 'block');
            //   parent_questtion(id);
        } else {
            $('.object-list').css('display', 'none');
        }

    });



    //=============================================================================
    $('.catg').on('change', function (e) {
        var id = $(this).val();
        var dataString = 'catg_id=' + id;
        group_question();
        $.ajax({
            type: "POST",
            url: base_url + "category/ajax_sub_category/",
            data: dataString,
            cache: false,
            success: function (html)
            {
                $(".sub-catg").html(html);

            }
        });

    });

    if (!$('#edit-q').val()) {
        group_question();
    }


    //==========================================================================
    $('.answer_hedit').each(function (e) {
        var id_d = $(this).attr(('id'));

        //
        $('#' + id_d).bind('mouseup touchend', function (e) {
            e.preventDefault();
            selection = getSelectedText();
            var spn = '<span class="tt">' + selection + '</span>';
            $(this).html($(this).html().replace(selection, spn));
            //alert(getSelectedText());
        });


        //
        /*$('#' + id_d).on('click', function (e) {//$('#test').bind('mouseup', function(e){
            e.preventDefault();
            if (window.getSelection) {
                // not IE case
                var selObj = window.getSelection();
                var selRange = selObj.getRangeAt(0);

                var newElement = document.createElement("span");
                var documentFragment = selRange.extractContents();
                newElement.appendChild(documentFragment);
                selRange.insertNode(newElement);
                $('span').addClass('tt');
                selObj.removeAllRanges();
            } else if (document.selection && document.selection.createRange && document.selection.type != "None") {
                // IE case
                var range = document.selection.createRange();
                var selectedText = range.htmlText;
                var newText = '<span>' + selectedText + '</span>';
                $('b').addClass('tt');
                document.selection.createRange().pasteHTML(newText);
            }

            $('.tt').each(function () {
                $(this).bind('mouseup', function () {
                    var txt = $(this).html();
                });

            });
        });*/
    });


    /*
     * 
     * @returns {undefined}
     $('#test').bind('mouseup', function() {
     selection = getSelectedText();
     var spn = '<span class="tt">' + selection + '</span>';
     $(this).html($(this).html().replace(selection, spn));
     //alert(getSelectedText());
     });
     
     function getSelectedText() {
     if (window.getSelection) {
     return window.getSelection().toString();
     } else if (document.selection) {
     return document.selection.createRange().text;
     }
     return '';
     } 
     **/

//==============================================================================
    /*$(function () {
        $("#list2, #list1").sortable({
            connectWith: ".lists",
            cursor: "move"
        }).disableSelection();
    });

    $.fn.disableSelection = function () {
    }*/

//==============================================================================
    check_list_ans();
    $('#is_list_ans').click(function () {
        check_list_ans();
    });

    //=============================================================================
    //suppression des utilisateurs selectionnés

    $("#delete_selected").confirm({
        title: "Suppression des élèves sélectionnés",
        text: "Vous voulez vraiment les supprimer? Cette suppression est irreversible",
        confirm: function (button) {
            button.fadeOut(2000).fadeIn(2000);
            var myCheckboxes = new Array();
            $("input:checked").each(function () {
                myCheckboxes.push($(this).val());
            });

            $.ajax({
                type: "POST",
                url: base_url + "student/operation/del",
                data: 'check_user=' + myCheckboxes,
                asynchronous: true,
                //cache: false,
                //beforeSend: function(){},
                success: function (data) {
                    window.location = base_url + 'student';

                }
            });
        },
        cancel: function (button) {
            button.fadeOut(2000).fadeIn(2000);
            //alert("You aborted the operation.");
        },
        confirmButton: "Oui",
        cancelButton: "Non"
    });
    
    
    
    //draw.main
    
    var selected = false;
    var palette = ["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f",
        "#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc",
        "#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd",
        "#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0",
        "#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79",
        "#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47",
        "#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"];

    $('.question-items').find('.line').each(function(){
        var index  = Math.floor((Math.random() * palette.length) + 1);
        $(this).css('background',palette[index]);
    });

    $('.question-items').find('.line').bind("mousedown touchstart", function() {
        if(!$(this).parents('li').hasClass('selected'))
            selected = $(this);
    });
    
    $(document).bind("mouseup touchend",function(e) {
        if(selected) {
            var position = {x:e.pageX , y:e.pageY};
            var answer = validatePosition(selected,position);
            if(answer){
                setAnswer(selected, answer);
            }
            else {
                selected.css('width','');
                selected.css('transform','');
            }
            selected = false;
        }
    });

    $(document).bind("mousemove touchmove",function(e) {
        if(selected) {
            var position = {x:e.pageX , y:e.pageY};
            calcPosition(selected,position);
        }
    });
    
    /*$('#validate').click(function () {
        var answer = getAnswer();
        if(!answer)
            alert('Incomplete answer');
        else
            console.log(answer);
        
        return false;
    });*/
    
    $('.un-select').click(function () {
        if($(this).parents('li').hasClass('selected')){
            // $(this).parents('li').removeClass('selected');
            // $(this).parents('li').css('box-shadow',  '');
            // $(this).parents('li').css('box-shadow',  '');
        }
    });
    function calcPosition(element, position) {
        var element_position = element.parents('.line-box').offset();

        var l = position.x - element_position.left;
        var h = position.y - element_position.top;

        var cos = l/Math.sqrt(l*l + h*h);
        var angle = Math.acos(cos)  * (180/Math.PI);
        angle = h < 0 ? angle * -1 : angle;

        element.css('width',Math.sqrt(l*l + h*h));
        element.css('transform','rotate('+angle+'deg)');

    }
    function validatePosition(element, position) {
        var answer = false;
        var transform = element.css('transform');
        var element_position = element.parents('.line-box').offset();
        var values = transform.split('(')[1].split(')')[0].split(',');
        var angle = Math.acos(values[0])  * (180/Math.PI);
        var width = element.width();
        angle = ( position.y - element_position.top ) < 0 ? angle * -1 : angle;

        $('.answer-items').find('.line').each(function(){
            if(!$(this).parents('li').hasClass('selected')){
                var answer_position = $(this).parents('.line-box').offset();

                var l = answer_position.left - element_position.left;
                var h = answer_position.top - element_position.top;

                var cos = l/Math.sqrt(l*l + h*h);
                var valid_angle = Math.acos(cos)  * (180/Math.PI);
                var valid_width = Math.sqrt(l*l + h*h);
                valid_angle = h < 0 ? valid_angle * -1 : valid_angle;

                if( (angle <= valid_angle + 2) &&  (angle >= valid_angle - 2)){
                    if(width <= valid_width + 20 && width >= valid_width - 20){
                        answer = {
                            element : $(this),
                            angle : valid_angle,
                            width : valid_width
                        };
                    }
                }
            }
        });
        return answer;

    }
    function setAnswer(selected, answer) {
        var color = selected.css('background-color');
        var index = selected.parents('li').index();
        selected.parents('li').addClass('selected');
        selected.parents('li').css('box-shadow',  '0 0 2em '+ color);

        answer.element.parents('li').addClass('selected');
        answer.element.parents('li').addClass('answer-'+index);

        answer.element.parents('li').css('box-shadow',  '0 0 2em '+ color);

        selected.css('width',answer.width + 15);
        selected.css('transform','rotate('+answer.angle+'deg)');
        
        

    }

    function unsetAnswer() {
        alert('unset');
    }
    
    //fin



});
// end - quiz attempt functions 