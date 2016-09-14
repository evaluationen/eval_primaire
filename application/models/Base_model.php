<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Base_model extends CI_Model {

    var $search = array(" ", 'é', 'è', 'ë', '€', 'ê', '&eacute;', '&ecirc;', '&egrave;', '&euml;',
        'ù', 'ü', 'ú', 'û', '&uacute;', '&ucirc;', '&ugrave;', '&uuml;',
        'ï', 'í', 'î', 'ì', '&iacute;', '&icirc;', '&igrave;', '&iuml;',
        'à', 'ä', 'á', 'â', 'å', 'ã', 'æ', 'Æ', '&aacute;', '&acirc;', '&agrave;', '&aring;', '&atilde;', '&auml;', '&aelig;', '&AElig;',
        'ç', '&ccedil;',
        'ö', 'ó', 'ô', 'ò', 'õ', '&oacute;', '&ocirc;', '&ograve;', '&otilde;', '&ouml;',
        'ý', 'ÿ', '&yacute;', '&yuml;'
    );
    var $replace = array("-", 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e',
        'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u',
        'i', 'i', 'i', 'i', 'i', 'i', 'i', 'i',
        'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a',
        'c', 'c',
        'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o',
        'y', 'y', 'y', 'y');

    function qr_generate($identifiant) {
        $this->load->library('ciqrcode');

        $qrcode = FALSE;
        if (!empty($identifiant)) {

            $params['data'] = base_url('login/index/isqrc/' . $identifiant);
            $params['level'] = 'H';
            $params['size'] = 10;
            $filename = $identifiant . md5($params['data']) . '.png';
            $params['savename'] = FCPATH . 'ressources/qrcode/' . $filename;

            if ($this->ciqrcode->generate($params)) {
                $qrcode = $filename;
            }
        }
        return $qrcode;
    }

    function qr_certificat_generate($url) {
        $this->load->library('ciqrcode');
        if (!empty($url)) {
            $params['data'] = $url;
            $params['level'] = 'H';
            $params['size'] = 10;
            $filename = time() . '.png';
            $params['savename'] = FCPATH . 'upload/certificat/' . $filename;

            if ($this->ciqrcode->generate($params)) {
                $qrcode = $filename;
            }
        }

        return isset($qrcode) ? $qrcode : FALSE;
    }

    function concat_name($sname, $fname, $rne) {

        if ($sname && $fname && $rne) {

            $sname = str_replace($this->search, $this->replace, strtolower($sname));
            $fname = str_replace($this->search, $this->replace, strtolower($fname));
            $rne_short = substr($rne, -4);

            $identifiant = substr($fname, 0, 1);
            $identifiant .= $sname;
            
            $new_id = strtolower($identifiant.'-'.$rne_short);

            $query = $this->db->select('login')->like('login', $new_id, 'after')->get(DB_PREFIX.'student');
            $array_index = array();
            if ($query->num_rows() > 0) {
                $ids = $query->result();
                foreach ($ids as $id) {
                    $len = strlen($identifiant);
                    //decoupage
                    $login = explode('-',$id->login);
                    $index = substr($login[0], $len);

                    if ($index)
                        $array_index[] = $index;
                    else
                        $array_index[] = 0;
                }
                if (!empty($array_index) && count($array_index) > 0) {
                    $last_id = max($array_index);
                    $identifiant = $identifiant . ($last_id + 1);
                }
            }
        }

        return isset($identifiant) ? strtolower($identifiant.'-'.$rne_short) : FALSE;
        
        
    }

    // --------------------------------------------------------------

    function date_sql($date_fr) {

        $expl = explode('/', $date_fr);
        if (count($expl) == 3)
            $date_sql = $expl[2] . '-' . $expl[1] . '-' . $expl[0];
        return isset($date_sql) ? $date_sql : '';
    }

    // --------------------------------------------------------------

    function date_sql_import($date_fr) {
        $expl = explode('/', $date_fr);
        if (count($expl) == 3)
            $date_sql = $expl[2] . '-' . $expl[0] . '-' . $expl[1];
        return isset($date_sql) ? $date_sql : '';
    }

    // --------------------------------------------------------------

    function date_fr($date_sql) {
        if ($date_sql != "0000-00-00") {

            $expl = explode('-', $date_sql);
            if (count($expl) == 3)
                $date_fr = $expl[2] . '/' . $expl[1] . '/' . $expl[0];
        }
        return isset($date_fr) ? $date_fr : '';
    }

    function send_mail($toemail, $subject, $message, $from_email = '', $from_name='') {
        $this->load->library('email');

        if ($this->config->item('protocol') == "smtp") {
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = $this->config->item('smtp_hostname');
            $config['smtp_user'] = $this->config->item('smtp_username');
            $config['smtp_pass'] = $this->config->item('smtp_password');
            $config['smtp_port'] = $this->config->item('smtp_port');
            $config['smtp_timeout'] = $this->config->item('smtp_timeout');
            $config['mailtype'] = $this->config->item('smtp_mailtype');
            $config['starttls'] = $this->config->item('starttls');
            $config['newline'] = $this->config->item('newline');

            $this->email->initialize($config);
        }
        $fromemail = !empty($from_email) ? $from_email : $this->config->item('fromemail');
        $fromname = !empty($from_name) ? $from_name : $this->config->item('fromname');
        
        $this->email->to($toemail);
        $this->email->from($fromemail, $fromname);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send()) {
            return true;
        }
    }
    
    
    function expired_user($class){
        switch($class){
            case 'CP'  : $date_exp = date('d/m/Y', strtotime('+5 years'));break;
            case 'CE1' : $date_exp = date('d/m/Y', strtotime('+4 years'));break;
            case 'CE2' : $date_exp = date('d/m/Y', strtotime('+3 years'));break;
            case 'CM1' : $date_exp = date('d/m/Y', strtotime('+2 years'));break;
            case 'CM2' : $date_exp = date('d/m/Y', strtotime('+1 years'));break;
            default :    $date_exp = date('d/m/Y', strtotime('+6 years'));break;
        }
        
        $date = strtotime($date_exp);
        
        return $date;
    }
    
    //==========================================================================
    
    function question_type(){
        $qtypes = array(
            '1' => $this->lang->line('multiple_choice_single_answer'),
            '2' => $this->lang->line('multiple_choice_multiple_answer'),
            '3' => $this->lang->line('match_the_column'),//drag and drop
            '4' => $this->lang->line('short_answer'),//question_answer ( definir le nbre des questions)
            '5' => $this->lang->line('long_answer'),
            '6' => $this->lang->line('search_response'),
            '7' => $this->lang->line('table_editable'),
            '8' => $this->lang->line('syllabes'),
            //'7' => $this->lang->line('highlight'),
            //'8' => $this->lang->line('reorganize'),
            //'9' => $this->lang->line('split_word'),
        );
                
        return $qtypes;        
    }
    
    
    
}

/*

 * 
 * <option value="1"><?php echo $this->lang->line('multiple_choice_single_answer'); ?></option>
                                <option value="2"><?php echo $this->lang->line('multiple_choice_multiple_answer'); ?></option>
                                <option value="3"><?php echo $this->lang->line('match_the_column'); ?></option>
                                <option value="4"><?php echo $this->lang->line('short_answer'); ?></option>
                                <option value="5"><?php echo $this->lang->line('long_answer'); ?></option>
                                <!-- news type of questions-->
                                <option value="6"><?php echo $this->lang->line('question_answer'); ?></option>
                                <option value="7"><?php echo $this->lang->line('syllabes'); ?></option>
                                <option value="8"><?php echo $this->lang->line('split_word');?></option>
                                <option value="9"><?php echo $this->lang->line('highlight') ?></option>
                                <option value="10"><?php  echo $this->lang->line('reorganize'); ?></option>
                                <option value="11"><?php echo $this->lang->line('link'); ?></option> */
