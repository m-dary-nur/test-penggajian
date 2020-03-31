<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function index() {		

		$data['data'] = $this->db->select('karyawan.*, jabatan.nama AS jabatan_nama')->join('jabatan', 'jabatan.id = karyawan.jabatan_id', 'inner')->get('karyawan')->result_array();		

		$this->load->view('header');
		$this->load->view('karyawan/view', $data);
		$this->load->view('footer');
	}
	
	public function add() {

		$data['action'] = "add"; 		
		$data['label'] = "Tambah";	
        $data['jabatan'] = $this->db->get('jabatan')->result_array();
		
		$this->load->view('header');
		$this->load->view('karyawan/input', $data);
		$this->load->view('footer');
	}
	
	public function edit($id) {
		
		$data['action'] = "edit";
		$data['label'] = "Ubah"; 		
        $data['data'] = $this->db->where('id', $id)->get('karyawan')->row_array();
        $data['jabatan'] = $this->db->get('jabatan')->result_array();        

		$this->load->view('header');
		$this->load->view('karyawan/input', $data);
		$this->load->view('footer');
	}

	public function create() {
		$data = array(
            'jabatan_id' => $this->input->post('jabatan_id'),
            'nip' => $this->input->post('nip'),
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'telp' => $this->input->post('telp'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'masa_kerja' => $this->input->post('masa_kerja')
		);
	
		$this->db->insert('karyawan', $data);

		redirect(site_url('karyawan'));
	}

	public function update($id) {
		$data = array(
			'jabatan_id' => $this->input->post('jabatan_id'),
            'nip' => $this->input->post('nip'),
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'telp' => $this->input->post('telp'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'masa_kerja' => $this->input->post('masa_kerja')
		);
	
		$this->db->where('id', $id);
		$this->db->update('karyawan', $data);

		redirect(site_url('karyawan'));
	}

	public function delete($id) {
		$data = array(
			'id' => $id
		);

		$this->db->delete('karyawan', $data);

		redirect(site_url('karyawan'));
	}
    
}
