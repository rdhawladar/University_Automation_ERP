<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 *	@author 	: Noor-e Alam
 *	date		: March, 2016
 *	TMSS
 *	webmaster.noor@gmail.com
 */

class c_upload extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->library('upload');
    }

    public function update_profile() {
        $id = '1';
        $this->load->model('edit_profile_model');
        $this->edit_profile_model->update_db_user_info($id);
    }
}