<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aturan_gaji extends CI_Controller {

	public function index() {		

		$data['data'] = $this->db->select('aturan_gaji.*, jabatan.nama AS jabatan_nama')->join('jabatan', 'jabatan.id = aturan_gaji.jabatan_id', 'inner')->get('aturan_gaji')->result_array();		

		$this->load->view('header');
		$this->load->view('aturan_gaji/view', $data);
		$this->load->view('footer');
	}
	
	public function add() {

		$data['action'] = "add"; 		
		$data['label'] = "Tambah";	
        $data['jabatan'] = $this->db->get('jabatan')->result_array();
		
		$this->load->view('header');
		$this->load->view('aturan_gaji/input', $data);
		$this->load->view('footer');
	}
	
	public function edit($id) {
		
		$data['action'] = "edit";
		$data['label'] = "Ubah"; 		
        $data['data'] = $this->db->where('id', $id)->get('aturan_gaji')->row_array();
        $data['jabatan'] = $this->db->get('jabatan')->result_array();        

		$this->load->view('header');
		$this->load->view('aturan_gaji/input', $data);
		$this->load->view('footer');
	}

	public function create() {
		$data = array(		
            'jabatan_id' => $this->input->post('jabatan_id'),
            'masa_kerja' => $this->input->post('masa_kerja'),
            'intensif' => $this->input->post('intensif'),
            'bonus' => $this->input->post('bonus')
		);
	
		$this->db->insert('aturan_gaji', $data);

		redirect(site_url('aturan_gaji'));
	}

	public function update($id) {
		$data = array(
			'jabatan_id' => $this->input->post('jabatan_id'),
            'masa_kerja' => $this->input->post('masa_kerja'),
            'intensif' => $this->input->post('intensif'),
            'bonus' => $this->input->post('bonus')
		);
	
		$this->db->where('id', $id);
		$this->db->update('aturan_gaji', $data);

		redirect(site_url('aturan_gaji'));
	}

	public function delete($id) {
		$data = array(
			'id' => $id
		);

		$this->db->delete('aturan_gaji', $data);

		redirect(site_url('aturan_gaji'));
	}
    
}
