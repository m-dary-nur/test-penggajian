<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {

	public function index() {		

		$data['data'] = $this->db->select('gaji.*, karyawan.nip, karyawan.nama')->join('karyawan', 'karyawan.id = gaji.karyawan_id')->get('gaji')->result_array();

		$this->load->view('header');
		$this->load->view('gaji/view', $data);
		$this->load->view('footer');
	}
	
	public function add() {

		$data['action'] = "add"; 		
		$data['label'] = "Tambah";	
        $data['karyawan'] = $this->db->get('karyawan')->result_array();
        $data['jabatan'] = $this->db->get('jabatan')->result_array();
        $data['aturan_gaji'] = $this->db->get('aturan_gaji')->result_array();
		
		$this->load->view('header');
		$this->load->view('gaji/input', $data);
		$this->load->view('footer');
	}
	
	public function edit($id) {
        
        $data['action'] = "edit";
		$data['label'] = "Ubah"; 		
        $data['data'] = $this->db->where('id', $id)->get('gaji')->row_array();
        $data['karyawan'] = $this->db->get('karyawan')->result_array();
        $data['jabatan'] = $this->db->get('jabatan')->result_array();        
        $data['aturan_gaji'] = $this->db->get('aturan_gaji')->result_array();

		$this->load->view('header');
		$this->load->view('gaji/input', $data);
		$this->load->view('footer');
	}

	public function create() {
		$data = array(		
            'kode_penggajian' => $this->input->post('kode_penggajian'),
            'karyawan_id' => $this->input->post('karyawan_id'),
            'karyawan_nip' => $this->input->post('karyawan_nip'),
            'karyawan_nama' => $this->input->post('karyawan_nama'),
            'tgl_penerimaan' => $this->input->post('tgl_penerimaan'),
            'nominal' => $this->input->post('nominal')
		);
	
		$this->db->insert('gaji', $data);

		redirect(site_url('gaji'));
	}

	public function update($id) {
		$data = array(
            'kode_penggajian' => $this->input->post('kode_penggajian'),
            'karyawan_id' => $this->input->post('karyawan_id'),
            'karyawan_nip' => $this->input->post('karyawan_nip'),
            'karyawan_nama' => $this->input->post('karyawan_nama'),
            'tgl_penerimaan' => $this->input->post('tgl_penerimaan'),
            'nominal' => $this->input->post('nominal')
		);
	
		$this->db->where('id', $id);
		$this->db->update('gaji', $data);

		redirect(site_url('gaji'));
	}

	public function delete($id) {
		$data = array(
			'id' => $id
		);

		$this->db->delete('gaji', $data);

		redirect(site_url('gaji'));
	}
    
}
