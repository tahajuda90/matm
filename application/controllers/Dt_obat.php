<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dt_obat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Dt_obat_model','Dt_proses_model'));
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
            $config['base_url'] = base_url() . 'dt_obat?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'dt_obat?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'dt_obat';
            $config['first_url'] = base_url() . 'dt_obat';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Dt_obat_model->total_rows($q);
        $dt_obat = $this->Dt_obat_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sidebar' => 'sidebar_detail',
            'page'=>'tabel_obat',
            'dt_obat_data' => $dt_obat,
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
        $row = $this->Dt_obat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_obat' => $row->id_obat,
		'id_proses' => $row->id_proses,
		'panduan' => $row->panduan,
		'bentuk' => $row->bentuk,
		'sumber' => $row->sumber,
		'batch' => $row->batch,
		'dosis' => $row->dosis,
		'dosis_minum' => $row->dosis_minum,
		'tgl_pemberian' => $row->tgl_pemberian,
		'create_at' => $row->create_at,
		'update_at' => $row->update_at,
	    );
            $this->load->view('dt_obat/dt_obat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_obat'));
        }
    }

    public function create($idproses) 
    {
        if(!empty($this->Dt_proses_model->get_by_id($idproses))){
            $data = array(
            'pasien' => $this->Dt_proses_model->get_by_id($idproses)->id_pasien,
            'q' => $idproses,
            'proses' =>'Bulan '.$this->Dt_proses_model->get_by_id($idproses)->bulan,
            'sidebar' => 'sidebar_detail',
            'page' => 'form_obat',
                
            'button' => 'Create',
            'action' => site_url('dt_obat/create_action'),
	    'id_obat' => set_value('id_obat'),
	    'id_proses' => !empty($idproses)? $idproses:set_value('id_proses'),
	    'panduan' => set_value('panduan'),
	    'bentuk' => set_value('bentuk'),
	    'sumber' => set_value('sumber'),
	    'batch' => set_value('batch'),
	    'dosis' => set_value('dosis'),
	    'dosis_minum' => set_value('dosis_minum'),
	    'tgl_pemberian' => set_value('tgl_pemberian')
            );
            $this->load->view('main', $data);
        }else{
            redirect(site_url('dt_obat?q='.$idproses));
        }
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_proses' => $this->input->post('id_proses',TRUE),
		'panduan' => $this->input->post('panduan',TRUE),
		'bentuk' => $this->input->post('bentuk',TRUE),
		'sumber' => $this->input->post('sumber',TRUE),
		'batch' => $this->input->post('batch',TRUE),
		'dosis' => $this->input->post('dosis',TRUE),
		'dosis_minum' => $this->input->post('dosis_minum',TRUE),
		'tgl_pemberian' => $this->input->post('tgl_pemberian',TRUE)
	    );

            $this->Dt_obat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dt_obat?q='.$data['id_proses']));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Dt_obat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dt_obat/update_action'),
		'id_obat' => set_value('id_obat', $row->id_obat),
		'id_proses' => set_value('id_proses', $row->id_proses),
		'panduan' => set_value('panduan', $row->panduan),
		'bentuk' => set_value('bentuk', $row->bentuk),
		'sumber' => set_value('sumber', $row->sumber),
		'batch' => set_value('batch', $row->batch),
		'dosis' => set_value('dosis', $row->dosis),
		'dosis_minum' => set_value('dosis_minum', $row->dosis_minum),
		'tgl_pemberian' => set_value('tgl_pemberian', $row->tgl_pemberian),
		'create_at' => set_value('create_at', $row->create_at),
		'update_at' => set_value('update_at', $row->update_at),
	    );
            $this->load->view('dt_obat/dt_obat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_obat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_obat', TRUE));
        } else {
            $data = array(
		'id_proses' => $this->input->post('id_proses',TRUE),
		'panduan' => $this->input->post('panduan',TRUE),
		'bentuk' => $this->input->post('bentuk',TRUE),
		'sumber' => $this->input->post('sumber',TRUE),
		'batch' => $this->input->post('batch',TRUE),
		'dosis' => $this->input->post('dosis',TRUE),
		'dosis_minum' => $this->input->post('dosis_minum',TRUE),
		'tgl_pemberian' => $this->input->post('tgl_pemberian',TRUE),
		'create_at' => $this->input->post('create_at',TRUE),
		'update_at' => $this->input->post('update_at',TRUE),
	    );

            $this->Dt_obat_model->update($this->input->post('id_obat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dt_obat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dt_obat_model->get_by_id($id);

        if ($row) {
            $this->Dt_obat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dt_obat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_obat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_proses', 'id proses', 'trim|required');
//	$this->form_validation->set_rules('panduan', 'panduan', 'trim|required');
//	$this->form_validation->set_rules('bentuk', 'bentuk', 'trim|required');
//	$this->form_validation->set_rules('sumber', 'sumber', 'trim|required');
//	$this->form_validation->set_rules('batch', 'batch', 'trim|required');
//	$this->form_validation->set_rules('dosis', 'dosis', 'trim|required');
//	$this->form_validation->set_rules('dosis_minum', 'dosis minum', 'trim|required');
//	$this->form_validation->set_rules('tgl_pemberian', 'tgl pemberian', 'trim|required');
//	$this->form_validation->set_rules('create_at', 'create at', 'trim|required');
//	$this->form_validation->set_rules('update_at', 'update at', 'trim|required');

	$this->form_validation->set_rules('id_obat', 'id_obat', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Dt_obat.php */
/* Location: ./application/controllers/Dt_obat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-25 10:33:23 */
/* http://harviacode.com */