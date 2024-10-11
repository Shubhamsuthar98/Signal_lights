<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignalModel extends CI_Model {

	public function __construct() {
		parent::__construct();
        $this->load->database();
	}
	

    public function save_response($data) {
        return $this->db->insert('signal_sequences', $data);
    }
	
}
