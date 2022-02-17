<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Nilai_model');
        $this->load->library('form_validation');

        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('nilai/nilai_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Nilai_model->json();
    }

    public function read($id) 
    {
        $row = $this->Nilai_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nis' => $row->nis,
		'nilai_ulangan' => $row->nilai_ulangan,
		'nilai_uts' => $row->nilai_uts,
		'nilai_uas' => $row->nilai_uas,
		'nilai_akhir' => $row->nilai_akhir,
		'id_guru_mapel' => $row->id_guru_mapel,
	    );
            $this->load->view('nilai/nilai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('nilai/create_action'),
	    'id' => set_value('id'),
	    'nis' => set_value('nis'),
	    'nilai_ulangan' => set_value('nilai_ulangan'),
	    'nilai_uts' => set_value('nilai_uts'),
	    'nilai_uas' => set_value('nilai_uas'),
	    'nilai_akhir' => set_value('nilai_akhir'),
	    'id_guru_mapel' => set_value('id_guru_mapel'),
	);
        $this->load->view('nilai/nilai_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nis' => $this->input->post('nis',TRUE),
		'nilai_ulangan' => $this->input->post('nilai_ulangan',TRUE),
		'nilai_uts' => $this->input->post('nilai_uts',TRUE),
		'nilai_uas' => $this->input->post('nilai_uas',TRUE),
        //'nilai_akhir' => ($this->input->post('nilai_ulangan')*0.2 + $this->input->post('nilai_uts')*0.3 + $this->input->post('nilai_uas')*0.5),
		'id_guru_mapel' => $this->input->post('id_guru_mapel',TRUE),
	    );

            $this->Nilai_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('nilai'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Nilai_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('nilai/update_action'),
		'id' => set_value('id', $row->id),
		'nis' => set_value('nis', $row->nis),
		'nilai_ulangan' => set_value('nilai_ulangan', $row->nilai_ulangan),
		'nilai_uts' => set_value('nilai_uts', $row->nilai_uts),
		'nilai_uas' => set_value('nilai_uas', $row->nilai_uas),
		'nilai_akhir' => set_value('nilai_akhir', $row->nilai_akhir),
		'id_guru_mapel' => set_value('id_guru_mapel', $row->id_guru_mapel),
	    );
            $this->load->view('nilai/nilai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nis' => $this->input->post('nis',TRUE),
		'nilai_ulangan' => $this->input->post('nilai_ulangan',TRUE),
		'nilai_uts' => $this->input->post('nilai_uts',TRUE),
		'nilai_uas' => $this->input->post('nilai_uas',TRUE),
		'nilai_akhir' => $this->input->post('nilai_akhir',TRUE),
		'id_guru_mapel' => $this->input->post('id_guru_mapel',TRUE),
	    );

            $this->Nilai_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('nilai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Nilai_model->get_by_id($id);

        if ($row) {
            $this->Nilai_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('nilai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nis', 'nis', 'trim|required');
	$this->form_validation->set_rules('nilai_ulangan', 'nilai ulangan', 'trim|required');
	$this->form_validation->set_rules('nilai_uts', 'nilai uts', 'trim|required');
	$this->form_validation->set_rules('nilai_uas', 'nilai uas', 'trim|required');
	$this->form_validation->set_rules('id_guru_mapel', 'id guru mapel', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Nilai.php */
/* Location: ./application/controllers/Nilai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-17 14:18:51 */
/* http://harviacode.com */