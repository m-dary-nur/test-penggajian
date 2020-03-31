<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function index() {		
		
		$data['data'] = $this->db->get('jabatan')->result_array();		

		$this->load->view('header');
		$this->load->view('jabatan/view', $data);
		$this->load->view('footer');
	}
	
	public function add() {

		$data['action'] = "add"; 		
		$data['label'] = "Tambah"; 		
		
		$this->load->view('header');
		$this->load->view('jabatan/input', $data);
		$this->load->view('footer');
	}
	
	public function edit($id) {
		
		$data['action'] = "edit";
		$data['label'] = "Ubah"; 		
		$data['data'] = $this->db->where('id', $id)->get('jabatan')->row_array();

		$this->load->view('header');
		$this->load->view('jabatan/input', $data);
		$this->load->view('footer');
	}

	public function create() {
		$data = array(
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'standar_gaji' => $this->input->post('standar'),
			'keterangan' => $this->input->post('keterangan')
		);
	
		$this->db->insert('jabatan', $data);

		redirect(site_url('jabatan'));
	}

	public function update($id) {
		$data = array(
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'standar_gaji' => $this->input->post('standar'),
			'keterangan' => $this->input->post('keterangan')
		);
	
		$this->db->where('id', $id);
		$this->db->update('jabatan', $data);

		redirect(site_url('jabatan'));
	}

	public function delete($id) {
		$data = array(
			'id' => $id
		);

		$this->db->delete('jabatan', $data);

		redirect(site_url('jabatan'));
	}
    
}
