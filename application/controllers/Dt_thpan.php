<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dt_thpan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Dt_proses_model','Dt_thpan_model'));
        $this->load->library('form_validation');
        if(!$this->ion_auth->logged_in()){
            redirect('Auth','refresh');
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'dt_thpan?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'dt_thpan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'dt_thpan';
            $config['first_url'] = base_url() . 'dt_thpan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Dt_thpan_model->total_rows($q);
        $dt_thpan = $this->Dt_thpan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sidebar' => 'sidebar_detail',
            'page'=>'tabel_tahapan',
            'dt_thpan_data' => $dt_thpan,
            'q' => $q,
            'pasien' => $this->Dt_proses_model->get_by_id($q)->id_pasien,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('main', $data);
    }

    public function read($id) 
    {
        $row = $this->Dt_thpan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_thp' => $row->id_thp,
		'id_obat' => $row->id_obat,
		'id_proses' => $row->id_proses,
		'hari' => $row->hari,
		'sisa_obat' => $row->sisa_obat,
		'ket' => $row->ket,
		'create_at' => $row->create_at,
		'update_at' => $row->update_at,
	    );
            $this->load->view('dt_thpan/dt_thpan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_thpan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('dt_thpan/create_action'),
	    'id_thp' => set_value('id_thp'),
	    'id_obat' => set_value('id_obat'),
	    'id_proses' => set_value('id_proses'),
	    'hari' => set_value('hari'),
	    'sisa_obat' => set_value('sisa_obat'),
	    'ket' => set_value('ket'),
	    'create_at' => set_value('create_at'),
	    'update_at' => set_value('update_at'),
	);
        $this->load->view('dt_thpan/dt_thpan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_obat' => $this->input->post('id_obat',TRUE),
		'id_proses' => $this->input->post('id_proses',TRUE),
		'hari' => $this->input->post('hari',TRUE),
		'sisa_obat' => $this->input->post('sisa_obat',TRUE),
		'ket' => $this->input->post('ket',TRUE),
		'create_at' => $this->input->post('create_at',TRUE),
		'update_at' => $this->input->post('update_at',TRUE),
	    );

            $this->Dt_thpan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dt_thpan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Dt_thpan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dt_thpan/update_action'),
		'id_thp' => set_value('id_thp', $row->id_thp),
		'id_obat' => set_value('id_obat', $row->id_obat),
		'id_proses' => set_value('id_proses', $row->id_proses),
		'hari' => set_value('hari', $row->hari),
		'sisa_obat' => set_value('sisa_obat', $row->sisa_obat),
		'ket' => set_value('ket', $row->ket),
		'create_at' => set_value('create_at', $row->create_at),
		'update_at' => set_value('update_at', $row->update_at),
	    );
            $this->load->view('dt_thpan/dt_thpan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_thpan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_thp', TRUE));
        } else {
            $data = array(
		'id_obat' => $this->input->post('id_obat',TRUE),
		'id_proses' => $this->input->post('id_proses',TRUE),
		'hari' => $this->input->post('hari',TRUE),
		'sisa_obat' => $this->input->post('sisa_obat',TRUE),
		'ket' => $this->input->post('ket',TRUE),
		'create_at' => $this->input->post('create_at',TRUE),
		'update_at' => $this->input->post('update_at',TRUE),
	    );

            $this->Dt_thpan_model->update($this->input->post('id_thp', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dt_thpan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dt_thpan_model->get_by_id($id);

        if ($row) {
            $this->Dt_thpan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dt_thpan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_thpan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_obat', 'id obat', 'trim|required');
	$this->form_validation->set_rules('id_proses', 'id proses', 'trim|required');
	$this->form_validation->set_rules('hari', 'hari', 'trim|required');
	$this->form_validation->set_rules('sisa_obat', 'sisa obat', 'trim|required');
	$this->form_validation->set_rules('ket', 'ket', 'trim|required');
	$this->form_validation->set_rules('create_at', 'create at', 'trim|required');
	$this->form_validation->set_rules('update_at', 'update at', 'trim|required');

	$this->form_validation->set_rules('id_thp', 'id_thp', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Dt_thpan.php */
/* Location: ./application/controllers/Dt_thpan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-18 06:17:54 */
/* http://harviacode.com */