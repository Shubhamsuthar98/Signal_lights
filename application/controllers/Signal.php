<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signal extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('SignalModel');
	}
	
	public function index() {

		$this->load->view('signal_view');
	}

	public function start() {
		$data = [
			'sequence_a' => $this->input->post('sequence_a'),
			'sequence_b' => $this->input->post('sequence_b'),
			'sequence_c' => $this->input->post('sequence_c'),
			'sequence_d' => $this->input->post('sequence_d'),
			'green_interval' => $this->input->post('green_interval'),
			'yellow_interval' => $this->input->post('yellow_interval')
		];

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// die;

		if($this->SignalModel->save_response($data)) {
			echo json_encode(['status' => 'success', 'message' => 'Sequence Saved']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Faild to Save']);
		}

	}
}
