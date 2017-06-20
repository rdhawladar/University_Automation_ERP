<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    public function update_db_user_info($id) {
        $data = array(
            'photo' => $this->input->post('photo'),
        );
        $this->db->where('id', $id);
        $this->db->update('osad_student', $data);
    }
}