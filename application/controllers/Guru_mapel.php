<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Guru_mapel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Guru_mapel_model');
        $this->load->library('form_validation');

        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('guru_mapel/guru_mapel_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Guru_mapel_model->json();
    }

    public function read($id) 
    {
        $row = $this->Guru_mapel_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nip' => $row->nip,
		'id_mapel' => $row->id_mapel,
	    );
            $this->load->view('guru_mapel/guru_mapel_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('guru_mapel'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('guru_mapel/create_action'),
	    'id' => set_value('id'),
	    'nip' => set_value('nip'),
	    'id_mapel' => set_value('id_mapel'),
	);
        $this->load->view('guru_mapel/guru_mapel_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nip' => $this->input->post('nip',TRUE),
		'id_mapel' => $this->input->post('id_mapel',TRUE),
	    );

            $this->Guru_mapel_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('guru_mapel'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Guru_mapel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('guru_mapel/update_action'),
		'id' => set_value('id', $row->id),
		'nip' => set_value('nip', $row->nip),
		'id_mapel' => set_value('id_mapel', $row->id_mapel),
	    );
            $this->load->view('guru_mapel/guru_mapel_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('guru_mapel'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nip' => $this->input->post('nip',TRUE),
		'id_mapel' => $this->input->post('id_mapel',TRUE),
	    );

            $this->Guru_mapel_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('guru_mapel'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Guru_mapel_model->get_by_id($id);

        if ($row) {
            $this->Guru_mapel_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('guru_mapel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('guru_mapel'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nip', 'nip', 'trim|required');
	$this->form_validation->set_rules('id_mapel', 'id mapel', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Guru_mapel.php */
/* Location: ./application/controllers/Guru_mapel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-17 14:18:51 */
/* http://harviacode.com */