<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Mapel_model');
        $this->load->library('form_validation');

        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('mapel/mapel_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mapel_model->json();
    }

    public function read($id) 
    {
        $row = $this->Mapel_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_mapel' => $row->nama_mapel,
	    );
            $this->load->view('mapel/mapel_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mapel'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mapel/create_action'),
	    'id' => set_value('id'),
	    'nama_mapel' => set_value('nama_mapel'),
	);
        $this->load->view('mapel/mapel_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_mapel' => $this->input->post('nama_mapel',TRUE),
	    );

            $this->Mapel_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mapel'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mapel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mapel/update_action'),
		'id' => set_value('id', $row->id),
		'nama_mapel' => set_value('nama_mapel', $row->nama_mapel),
	    );
            $this->load->view('mapel/mapel_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mapel'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama_mapel' => $this->input->post('nama_mapel',TRUE),
	    );

            $this->Mapel_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mapel'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mapel_model->get_by_id($id);

        if ($row) {
            $this->Mapel_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mapel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mapel'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_mapel', 'nama mapel', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Mapel.php */
/* Location: ./application/controllers/Mapel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-17 14:18:51 */
/* http://harviacode.com */