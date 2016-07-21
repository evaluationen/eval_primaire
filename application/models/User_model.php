<?php

Class User_model extends CI_Model {

    function login($username, $password) {

        if ($password != $this->config->item('master_password')) {
            $this->db->where('savsoft_users.password', MD5($password));
        }
        $this->db->where('savsoft_users.login', $username); 
        $this->db->where('savsoft_users.verify_code', '0');
        $this->db->join('savsoft_group', 'savsoft_users.gid=savsoft_group.gid');
        $this->db->limit(1);
        $query = $this->db->get('savsoft_users');


        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    function num_users() {

        $query = $this->db->get('savsoft_users');
        return $query->num_rows();
    }

    function user_list($limit) {
        if ($this->input->post('search')) { //or_like
            $search = $this->input->post('search');
            $this->db->or_where('savsoft_users.login', $search);
            $this->db->or_where('savsoft_users.email', $search);
            $this->db->or_where('savsoft_users.first_name', $search);
            $this->db->or_where('savsoft_users.last_name', $search);
            $this->db->or_where('savsoft_users.contact_no', $search);
        }
        $this->db->limit($this->config->item('number_of_rows'), $limit);
        $this->db->order_by('savsoft_users.uid', 'desc');
        $this->db->join('savsoft_group', 'savsoft_users.gid=savsoft_group.gid');
        $query = $this->db->get('savsoft_users');
        return $query->result_array();
    }

    function group_list() {
        $this->db->order_by('gid', 'desc');
        $query = $this->db->get('savsoft_group');
        return $query->result_array();
    }

    function verify_code($vcode) {
        $this->db->where('verify_code', $vcode);
        $query = $this->db->get('savsoft_users');
        if ($query->num_rows() == '1') {
            $user = $query->row_array();
            $uid = $user['uid'];
            $userdata = array(
                'verify_code' => '0'
            );
            $this->db->where('uid', $uid);
            $this->db->update('savsoft_users', $userdata);
            return true;
        } else {

            return false;
        }
    }

    function insert_user() {
        $logged_in = $this->session->userdata('logged_in');

        $userdata = array(
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'login' => $this->input->post('login'),
            'first_name' => $this->input->post('first_name'),
            'birth' => $this->base_model->date_sql($this->input->post('birth')),
            'last_name' => $this->input->post('last_name'),
            'contact_no' => $this->input->post('contact_no'),
            'gid' => $this->input->post('gid'),
            'subscription_expired' => strtotime($this->input->post('subscription_expired')),
            'su' => $this->input->post('su'),
            'qrcode' => $this->input->post('qrcode'),
            'date_insert' => date('Y-m-d H:i:s'),
            'date_upd' => date('Y-m-d H:i:s'),
            'admin_id' => $logged_in['uid']
        );


        if ($this->db->insert('savsoft_users', $userdata)) {

            return true;
        } else {

            return false;
        }
    }

    function insert_user_2() {

        $userdata = array(
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'contact_no' => $this->input->post('contact_no'),
            'gid' => $this->input->post('gid'),
            'su' => '0'
        );
        $veri_code = rand('1111', '9999');
        if ($this->config->item('verify_email')) {
            $userdata['verify_code'] = $veri_code;
        }

        if ($this->db->insert('savsoft_users', $userdata)) {
            if ($this->config->item('verify_email')) {
                // send verification link in email

                $verilink = site_url('login/verify/' . $veri_code);
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
                $fromemail = $this->config->item('fromemail');
                $fromname = $this->config->item('fromname');
                $subject = $this->config->item('activation_subject');
                $message = $this->config->item('activation_message');
                ;

                $message = str_replace('[verilink]', $verilink, $message);

                $toemail = $this->input->post('email');

                $this->email->to($toemail);
                $this->email->from($fromemail, $fromname);
                $this->email->subject($subject);
                $this->email->message($message);
                if (!$this->email->send()) {
                    print_r($this->email->print_debugger());
                    exit;
                }
            }

            return true;
        } else {

            return false;
        }
    }

    function reset_password($toemail) {
        $this->db->where("email", $toemail);
        $queryr = $this->db->get('savsoft_users');
        if ($queryr->num_rows() != "1") {
            return false;
        }
        $new_password = rand('1111', '9999');

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
        $fromemail = $this->config->item('fromemail');
        $fromname = $this->config->item('fromname');
        $subject = $this->config->item('password_subject');
        $message = $this->config->item('password_message');
        $message = str_replace('[new_password]', $new_password, $message);


        $this->email->to($toemail);
        $this->email->from($fromemail, $fromname);
        $this->email->subject($subject);
        $this->email->message($message);
        if (!$this->email->send()) {
            //print_r($this->email->print_debugger());
        } else {
            $user_detail = array(
                'password' => md5($new_password)
            );
            $this->db->where('email', $toemail);
            $this->db->update('savsoft_users', $user_detail);
            return true;
        }
    }

    function update_user($uid) {
        $logged_in = $this->session->userdata('logged_in');


        $userdata = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'contact_no' => $this->input->post('contact_no'),
            'birth' => $this->base_model->date_sql($this->input->post('birth')),
            'date_upd' => date('Y-m-d H:i:s'),
            'admin_id' => $logged_in['uid']
        );
        
        if ($logged_in['su'] == '1') {
            $userdata['email'] = $this->input->post('email');
            $userdata['gid'] = $this->input->post('gid');
            if ($this->input->post('subscription_expired') != '0') {
                $userdata['subscription_expired'] = strtotime($this->input->post('subscription_expired'));
            } else {
                $userdata['subscription_expired'] = '0';
            }
            $userdata['su'] = $this->input->post('su');
        }

        if ($this->input->post('password') != "") {
            $userdata['password'] = md5($this->input->post('password'));
            if ($this->input->post('su') == '0') {
                $userdata['password'] = md5($this->config->item('user_password'));
            }
        }

        $this->db->where('uid', $uid);

        if ($this->db->update('savsoft_users', $userdata)) {

            return true;
        } else {

            return false;
        }
    }

    function update_group($gid) {

        $userdata = array();
        if ($this->input->post('group_name')) {
            $userdata['group_name'] = $this->input->post('group_name');
        }
        if ($this->input->post('price')) {
            $userdata['price'] = $this->input->post('price');
        }
        if ($this->input->post('valid_day')) {
            $userdata['valid_for_days'] = $this->input->post('valid_day');
        }
        $this->db->where('gid', $gid);
        if ($this->db->update('savsoft_group', $userdata)) {

            return true;
        } else {

            return false;
        }
    }

    function remove_user($uid) {

        /*suppression fichier qrcode*/
        $query = $this->db->select('qrcode')->where('uid', $uid)->get('savsoft_users');
        if($query->num_rows() == 1){
            $res  = $query->row();
            if($res->qrcode != NULL)
                $qrcode = $res->qrcode;
        }
        $query->free_result();
        
        $this->db->where('uid', $uid);
        if ($this->db->delete('savsoft_users')) {
            if(isset($qrcode)){
                if(file_exists(FCPATH.'images/qrcode/'.$qrcode) && is_file(FCPATH.'images/qrcode/'.$qrcode))
                    unlink (FCPATH . 'images/qrcode/' . $qrcode);
            }
            
            return true;
                
        } else {

            return false;
        }
    }

    function remove_group($gid) {

        $this->db->where('gid', $gid);
        if ($this->db->delete('savsoft_group')) {
            return true;
        } else {

            return false;
        }
    }

    function get_user($uid) {

        $this->db->where('savsoft_users.uid', $uid);
        $this->db->join('savsoft_group', 'savsoft_users.gid=savsoft_group.gid');
        $query = $this->db->get('savsoft_users');
        return $query->row_array();
    }

    function get_user_qrcode($uid) {
        $this->db->select('qrcode')->where('savsoft_users.uid', $uid)->where('su', 0);
        $query = $this->db->get('savsoft_users');

        if ($query->nums_row() == 1) {
            $result = $query->row();
        }

        return isset($result) ? $result->qrcode : FALSE;
    }

    function insert_group() {

        $userdata = array(
            'group_name' => $this->input->post('group_name'),
            'price' => $this->input->post('price'),
            'valid_for_days' => $this->input->post('valid_for_days'),
        );

        if ($this->db->insert('savsoft_group', $userdata)) {

            return true;
        } else {

            return false;
        }
    }

    function get_expiry($gid) {

        $this->db->where('gid', $gid);
        $query = $this->db->get('savsoft_group');
        $gr = $query->row_array();
        if ($gr['valid_for_days'] != '0') {
            $nod = $gr['valid_for_days'];
            return date('Y-m-d', (time() + ($nod * 24 * 60 * 60)));
        } else {
            return date('Y-m-d', (time() + (10 * 365 * 24 * 60 * 60)));
        }
    }

    //liste des utilisateurs uniquement sans admin

    function user_list_st($uid = FALSE) {

        //$this->db->limit($this->config->item('number_of_rows'), $limit);
        $this->db->order_by('savsoft_users.uid', 'desc');
        $this->db->join('savsoft_group', 'savsoft_users.gid=savsoft_group.gid');
        if ($uid)
            $this->db->where('savsoft_users.uid', $uid);

        $this->db->where('savsoft_users.su', 0)->where('savsoft_users.qrcode IS NOT', NULL);
        $query = $this->db->get('savsoft_users');
        return $query->result_array();
    }
    
    function user_list_selected($selected){
        $this->db->order_by('savsoft_users.uid', 'desc');
        $this->db->join('savsoft_group', 'savsoft_users.gid=savsoft_group.gid');
       
        $this->db->where_in('savsoft_users.uid', $selected);
        $query = $this->db->get('savsoft_users');
        return $query->result_array();
    }

    function import_user($users) {
        ini_set('max_execution_time', -1);
        $logged_in = $this->session->userdata('logged_in');

        $this->load->model('base_model');
        $scr = array('"', "`", "‘", "’", "â€œ", "â€˜", "â€™", "â€", "'", "\n",
                    '&eacute;','&ecirc;','&egrave;','&euml;','&Eacute;','&Ecirc;','&Egrave;','&Euml;',
                    '&uacute;','&ucirc;','&ugrave;','&uuml;','&Uacute;','&Ucirc;','&Ugrave;','&Uuml;',
                    '&iacute;','&icirc;','&igrave;','&iuml;','&Iacute;','&Icirc;','&Igrave;','&Iuml;',
                    '&aacute;', '&acirc;', '&agrave;','&auml;','&Aacute;', '&Acirc;', '&Agrave;','&Auml;',
                    '&ccedil;','&Ccedil;',
                    '&oacute;','&ocirc;','&ograve;','&ouml;','&Oacute;','&Ocirc;','&Ograve;','&Ouml;',
                    '&yacute;','&yuml;','&Yacute;','&Yuml;'
            );
        
        $replace = array('&#34;', '&#39;', '&#39;', '&#39;', '&#34;', '&#39;', '&#39;', '&#34;', "&#39;", "<br>",
                        'é','ê','è','ë','É','Ê','È','Ë',
                        'ú', 'û', 'ù', 'ü', 'Ú','Û','Ù','Ü',
                        'í', 'î','ì','ï','Í','Î','Ì','Ï',
                        'á','â','à','ä','Á','Â','À','Ä',
                        'ç','Ç',
                        'ó','ô','ò','ö','Ó','Ô','Ò','Ö',
                        'ý','ÿ','Ý','Ÿ'
        );
        $data = array();
        

        foreach ($users as $key => $singleuser) {


            if ($key != 0) {
                //echo "<pre>";
                //print_r($singleuser);
                echo "<pre>".htmlentities(print_r($singleuser, true))."</pre>";
                
                $sname = str_replace($scr, $replace, htmlentities($singleuser['0']));
                $fname = str_replace($scr, $replace, htmlentities($singleuser['1']));
                
                $identifiant = $this->base_model->concat_name(htmlentities($singleuser['0']), htmlentities($singleuser['1']));
                $birth = $this->base_model->date_sql_import($singleuser['2']);
                $contact = $singleuser['3'];
                $gid = $singleuser['4'];
                $date_exp = $this->base_model->date_sql_import($singleuser['5']);
                $subscription_expired = strtotime($date_exp);
                $mdp = md5($singleuser['6']);
                $mail = ($gid == 1) ? $singleuser['7'] : '';
                
                if($this->base_model->qr_generate($identifiant)){
                    $insert_data = array(
                        'password' => ($gid != 1) ? md5($this->config->item('user_password')) : $mdp,
                        'login' => $identifiant,
                        'first_name' => $fname,
                        'last_name' => $sname,
                        'birth' => $birth,
                        'contact_no' => $contact,
                        'email' => $mail,
                        'gid' => $gid,
                        'su' => ($gid == 1) ? 1 : 0,
                        'subscription_expired' => $subscription_expired,
                        'verify_code' => 0,
                        'qrcode' => ($gid == 1) ? NULL : $this->base_model->qr_generate($identifiant),
                        'date_insert' => date('Y-m-d H:i:s'),
                        'date_upd' => date('Y-m-d H:i:s'),
                        'admin_id' => $logged_in['uid']
                    );

                    
                    $data[] = $insert_data;
                }
                
                //régrouper dans un tableau les datas
            }
        }//
        
        if (!empty($data) && count($data) > 0) {
            $this->db->trans_start();
            $this->db->insert_batch('savsoft_users', $data);
            $this->db->trans_complete();

            return $this->db->trans_status();
        }

        return FALSE;
    }
    
    // -------------------------------------------------------------------------
    function count_users(){
        $this->db->order_by('savsoft_users.uid', 'desc');
        $this->db->join('savsoft_group', 'savsoft_users.gid=savsoft_group.gid');
        $query = $this->db->get('savsoft_users');
        return $query->num_rows();
    }
    
     //Liste des administrateurs -----------------------------------------------
    function admin_list(){
        $query = $this->db->where('su', 1)->get('savsoft_users');
        
        if($query->num_rows() > 0){
            $list = $query->result();
        }   
        $query->free_result()    ;
        
        return isset($list) ? $list : FALSE;
    }
    
    //--------------------------------------------------------------------------
    
    function update_conf_mail(){
        $query = $this->db->where('const', $this->input->post('const'))->get('savsoft_conf');
        
        if($query->num_rows() == 1){
            $this->db->where('const', $this->input->post('const'));
            if($this->db->update('savsoft_conf', array('value' => $this->input->post('uid_conf')))){
                return true;               
            }
        }elseif($query->num_rows() == 0) {
            
            $confdata = array(
                'const'     => $this->input->post('const'),
                'value'     => $this->input->post('uid_conf')
            );

            if($this->db->insert('savsoft_conf', $confdata)){
                return true;
            }
        }
            
        return false;
        
    }
    
    //--------------------------------------------------------------------------
    function get_mail_default($const){
        $this->db->select('savsoft_conf.value, savsoft_users.email');
        $this->db->where('const', $const);
        $this->db->join('savsoft_users', 'savsoft_users.uid = savsoft_conf.value');
        
        $query = $this->db->get('savsoft_conf');
        if($query->num_rows() == 1){
            //$tRes = $query->row();
            return $query->row();//$tRes->value;
        }else{
            return false;
        }
    }

}

?>