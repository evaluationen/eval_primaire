<?php

Class User_model extends CI_Model {

    function login($username, $password) {

        if ($password != $this->config->item('master_password')) {
            $this->db->where(DB_PREFIX.'users.password', MD5($password));
        }
        $this->db->where(DB_PREFIX.'users.login', $username); 
        $this->db->where(DB_PREFIX.'users.verify_code', '0');
        $this->db->join(DB_PREFIX.'group', DB_PREFIX.'users.gid='.DB_PREFIX.'group.gid');
        $this->db->limit(1);
        $query = $this->db->get(DB_PREFIX.'users');


        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    function num_users() {

        $query = $this->db->get(DB_PREFIX.'users');
        return $query->num_rows();
    }

    function user_list($limit) {
        if ($this->input->post('search')) { //or_like
            $search = $this->input->post('search');
            $this->db->or_where(DB_PREFIX.'users.login', $search);
            $this->db->or_where(DB_PREFIX.'users.email', $search);
            $this->db->or_where(DB_PREFIX.'users.first_name', $search);
            $this->db->or_where(DB_PREFIX.'users.last_name', $search);
            $this->db->or_where(DB_PREFIX.'users.contact_no', $search);
        }
        $this->db->limit($this->config->item('number_of_rows'), $limit);
        $this->db->order_by(DB_PREFIX.'users.uid', 'desc');
        $this->db->join(DB_PREFIX.'group', DB_PREFIX.'users.gid='.DB_PREFIX.'group.gid');
        $query = $this->db->get(DB_PREFIX.'users');
        return $query->result_array();
    }

    function group_list() {
        $this->db->order_by('gid', 'desc');
        $query = $this->db->get(DB_PREFIX.'group');
        return $query->result_array();
    }

    function verify_code($vcode) {
        $this->db->where('verify_code', $vcode);
        $query = $this->db->get(DB_PREFIX.'users');
        if ($query->num_rows() == '1') {
            $user = $query->row_array();
            $uid = $user['uid'];
            $userdata = array(
                'verify_code' => '0'
            );
            $this->db->where('uid', $uid);
            $this->db->update(DB_PREFIX.'users', $userdata);
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


        if ($this->db->insert(DB_PREFIX.'users', $userdata)) {

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

        if ($this->db->insert(DB_PREFIX.'users', $userdata)) {
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
        $queryr = $this->db->get(DB_PREFIX.'users');
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
            $this->db->update(DB_PREFIX.'users', $user_detail);
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

        if ($this->db->update(DB_PREFIX.'users', $userdata)) {

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
        if ($this->db->update(DB_PREFIX.'group', $userdata)) {

            return true;
        } else {

            return false;
        }
    }

    function remove_user($uid) {

        /*suppression fichier qrcode*/
        $query = $this->db->select('qrcode')->where('uid', $uid)->get(DB_PREFIX.'users');
        if($query->num_rows() == 1){
            $res  = $query->row();
            if($res->qrcode != NULL)
                $qrcode = $res->qrcode;
        }
        $query->free_result();
        
        $this->db->where('uid', $uid);
        if ($this->db->delete(DB_PREFIX.'users')) {
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
        if ($this->db->delete(DB_PREFIX.'group')) {
            return true;
        } else {

            return false;
        }
    }

    function get_user($uid) {

        $this->db->where(DB_PREFIX.'users.uid', $uid);
        $this->db->join(DB_PREFIX.'group', DB_PREFIX.'users.gid='.DB_PREFIX.'group.gid');
        $query = $this->db->get(DB_PREFIX.'users');
        return $query->row_array();
    }

    function get_user_qrcode($uid) {
        $this->db->select('qrcode')->where(DB_PREFIX.'users.uid', $uid)->where('su', 0);
        $query = $this->db->get(DB_PREFIX.'users');

        if ($query->num_rows() == 1) {
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

        if ($this->db->insert(DB_PREFIX.'group', $userdata)) {

            return true;
        } else {

            return false;
        }
    }

    function get_expiry($gid) {

        $this->db->where('gid', $gid);
        $query = $this->db->get(DB_PREFIX.'group');
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
        $this->db->order_by(DB_PREFIX.'users.uid', 'desc');
        $this->db->join(DB_PREFIX.'group', DB_PREFIX.'users.gid='.DB_PREFIX.'group.gid');
        if ($uid)
            $this->db->where(DB_PREFIX.'users.uid', $uid);

        $this->db->where(DB_PREFIX.'users.su', 0)->where(DB_PREFIX.'users.qrcode IS NOT', NULL);
        $query = $this->db->get(DB_PREFIX.'users');
        return $query->result_array();
    }
    
    function user_list_selected($selected){
        $this->db->order_by(DB_PREFIX.'users.uid', 'desc');
        $this->db->join(DB_PREFIX.'group', DB_PREFIX.'users.gid='.DB_PREFIX.'group.gid');
       
        $this->db->where_in(DB_PREFIX.'users.uid', $selected);
        $query = $this->db->get(DB_PREFIX.'users');
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
        $datas = array();
        foreach ($users as $key => $singleuser) {
            if ($key != 0) {
                //echo "<pre>";
                //print_r($singleuser);
                echo "<pre>".htmlentities(print_r($singleuser, true))."</pre>";
                
                $sname = str_replace($scr, $replace, htmlentities($singleuser['0']));
                $fname = str_replace($scr, $replace, htmlentities($singleuser['1']));
                
                $identifiant = $this->base_model->concat_name(htmlentities($singleuser['0']), htmlentities($singleuser['1']), $singleuser['3']);
                $birth = $this->base_model->date_sql_import($singleuser['2']);
                $school_id = $this->get_id_etab($singleuser['3']);
                $class = $singleuser['4'];
                $contact = $singleuser['5'];
                
                $subscription_expired = $this->base_model->expired_user($class);
                
                if($this->base_model->qr_generate($identifiant)){
                    $insert_data = array(
                        'password' => md5($this->config->item('user_password')),
                        'login' => $identifiant,
                        'first_name' => $fname,
                        'last_name' => $sname,
                        'birth' => $birth,
                        'contact_no' => $contact,
                        'su' => 0,
                        'subscription_expired' => $subscription_expired,
                        'verify_code' => 0,
                        'qrcode' => $this->base_model->qr_generate($identifiant),
                        'admin_id' => $logged_in['uid'],
                        'etab_org' => $school_id,
                        'class' => $class,
                        'date_add' => date('Y-m-d H:i:s'),
                        'date_upd' => date('Y-m-d H:i:s')
                    );

                    $datas[] = $insert_data;
                }
                
                //régrouper dans un tableau les datas
            }
        }//
        
        if (!empty($datas) && count($datas) > 0) {
            $this->db->trans_start();
            //$this->db->insert_batch(DB_PREFIX.'users', $data);
            //foreach data to insert
            foreach($datas as $data){
                //insertion informations élèves
                $class = $data['class'];
                unset($data['class']);
                $this->db->insert(DB_PREFIX.'users', $data);
                $uid = $this->db->insert_id();
                $student = array(
                    'uid' => $uid,
                    'add_uid' => $logged_in['uid'],
                    'edit_uid' => $logged_in['uid'],
                    'eid' => $data['etab_org'],
                    'clid' => $this->get_id_class($class),
                    'sid' => $this->get_school_current(),
                    'date_add' => date('Y-m-d H:i:s'),
                    'date_upd' => date('Y-m-d H:i:s')
                    
                );
                //affectation d'un élève dasn un établissement, classe au cours de l'année courante
                $this->db->insert(DB_PREFIX.'student_sch', $student);
            }
            $this->db->trans_complete();

            return $this->db->trans_status();
        }

        return FALSE;
    }
    
    // -------------------------------------------------------------------------
    function count_users(){
        $this->db->order_by(DB_PREFIX.'users.uid', 'desc');
        $this->db->join(DB_PREFIX.'group', DB_PREFIX.'users.gid='.DB_PREFIX.'group.gid');
        $query = $this->db->get(DB_PREFIX.'users');
        return $query->num_rows();
    }
    
     //Liste des administrateurs -----------------------------------------------
    function admin_list(){
        $query = $this->db->where('su', 1)->get(DB_PREFIX.'users');
        
        if($query->num_rows() > 0){
            $list = $query->result();
        }   
        $query->free_result()    ;
        
        return isset($list) ? $list : FALSE;
    }
    
    //--------------------------------------------------------------------------
    
    function update_conf_mail(){
        $query = $this->db->where('const', $this->input->post('const'))->get(DB_PREFIX.'conf');
        
        if($query->num_rows() == 1){
            $this->db->where('const', $this->input->post('const'));
            if($this->db->update(DB_PREFIX.'conf', array('value' => $this->input->post('uid_conf')))){
                return true;               
            }
        }elseif($query->num_rows() == 0) {
            
            $confdata = array(
                'const'     => $this->input->post('const'),
                'value'     => $this->input->post('uid_conf')
            );

            if($this->db->insert(DB_PREFIX.'conf', $confdata)){
                return true;
            }
        }
            
        return false;
        
    }
    
    //--------------------------------------------------------------------------
    function get_mail_default($const){
        $this->db->select(DB_PREFIX.'conf.value, '.DB_PREFIX.'users.email');
        $this->db->where('const', $const);
        $this->db->join(DB_PREFIX.'users', DB_PREFIX.'users.uid = '.DB_PREFIX.'conf.value');
        
        $query = $this->db->get(DB_PREFIX.'conf');
        if($query->num_rows() == 1){
            //$tRes = $query->row();
            return $query->row();//$tRes->value;
        }else{
            return false;
        }
    }
    
    //--------------------------------------------------------------------------
    function get_rne_etab($id){
        $query = $this->db->select('rne')->where('eid', $id)->get(DB_PREFIX.'etab');
        if($query->num_rows() == 1){
            $tRes = $query->row();
            return $tRes->rne;
        }
        return FALSE;
    }
    
    
    function get_id_etab($rne){
        $query = $this->db->select('eid')->where('rne', $rne)->get(DB_PREFIX.'etab');
        if($query->num_rows() == 1){
            $tRes = $query->row();
            return $tRes->eid;
        }
        return FALSE;
    }
    
    //--------------------------------------------------------------------------
    //get id classe par code de classe
    function get_id_class($code){
        $query = $this->db->select('clid')->where('code', $code)->get(DB_PREFIX.'class');
        
        if($query->num_rows() == 1){
            $tRes = $query->row();
            return $tRes->clid;
        }
        $query->free_result();

        return 1;
    }
    
    
    //--------------------------------------------------------------------------
    //récuperer année scolaire en cours
    function get_school_current(){
        $query = $this->db->select('sid')->where('active', 1)->get(DB_PREFIX.'school_year');
            if($query->num_rows() == 1){
                $tRes = $this->db->row();
                return $tRes->sid;
            }else{
                $this->db->trans_start();
                //mise à jour pour desactiver tous
                $this->db->update(DB_PREFIX.'school_year', array('active' => 0));
                //get max id
                $query2 = $this->db->select_max('sid')->get(DB_PREFIX.'school_year');
                //activer l'année scolaire la plus recente
                if($query2->num_rows() == 1){
                    $tRes = $query2->row();
                    $this->db->where('sid', $tRes->sid);
                    $this->db->update(DB_PREFIX.'school_year', array('active' => 1));
                    return $tRes->sid;
                }
                $this->db->trans_complete();
                $query2->free_result();
            }
            
      return false;      
    }

}

?>