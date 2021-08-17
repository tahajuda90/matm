<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dt_diag_klsf extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Dt_diag_klsf_model','Dt_pasien_model'));
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
            $config['base_url'] = base_url() . 'dt_diag_klsf?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'dt_diag_klsf?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'dt_diag_klsf';
            $config['first_url'] = base_url() . 'dt_diag_klsf';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Dt_diag_klsf_model->total_rows($q);
        $dt_diag_klsf = $this->Dt_diag_klsf_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sidebar' => 'sidebar_detail',
            'page'=>'tabel_diagnosa',
            'dt_diag_klsf_data' => $dt_diag_klsf,
            'pasien' => $q,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('main', $data);
    }

    public function read($id) 
    {
        $row = $this->Dt_diag_klsf_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_diag' => $row->id_diag,
		'id_pasien' => $row->id_pasien,
		'tp_diag' => $row->tp_diag,
		'kls_antm' => $row->kls_antm,
		'ket_antm' => $row->ket_antm,
		'kls_rwyt' => $row->kls_rwyt,
		'is_hiv' => $row->is_hiv,
		'create_at' => $row->create_at,
		'update_at' => $row->update_at,
	    );
            $this->load->view('dt_diag_klsf/dt_diag_klsf_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_diag_klsf'));
        }
    }

    public function create($id) 
    {
        if(!empty($this->Dt_pasien_model->get_by_id($id))){
            $data = array(
                'pasien' => $id,
            'q' => $id,
            'nama' => $this->Dt_pasien_model->get_by_id($id)->nm_pasien,
            'sidebar' => 'sidebar_detail',
            'page' => 'form_diagnosa',
            'button' => 'Create',
            'action' => site_url('dt_diag_klsf/create_action'),
	    'id_diag' => set_value('id_diag'),
	    'id_pasien' => !empty($id)? $id:set_value('id_pasien'),
	    'tp_diag' => set_value('tp_diag'),
	    'kls_antm' => set_value('kls_antm'),
	    'ket_antm' => set_value('ket_antm'),
	    'kls_rwyt' => set_value('kls_rwyt'),
	    'is_hiv' => set_value('is_hiv')
	);
        $this->load->view('main', $data);
        }else{
            redirect(site_url('dt_pasien'));
        }
        
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pasien' => $this->input->post('id_pasien',TRUE),
		'tp_diag' => $this->input->post('tp_diag',TRUE),
		'kls_antm' => $this->input->post('kls_antm',TRUE),
		'ket_antm' => $this->input->post('ket_antm',TRUE),
		'kls_rwyt' => $this->input->post('kls_rwyt',TRUE),
		'is_hiv' => $this->input->post('is_hiv',TRUE)
	    );

            $this->Dt_diag_klsf_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dt_diag_klsf?q='.$data['id_pasien']));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Dt_diag_klsf_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dt_diag_klsf/update_action'),
		'id_diag' => set_value('id_diag', $row->id_diag),
		'id_pasien' => set_value('id_pasien', $row->id_pasien),
		'tp_diag' => set_value('tp_diag', $row->tp_diag),
		'kls_antm' => set_value('kls_antm', $row->kls_antm),
		'ket_antm' => set_value('ket_antm', $row->ket_antm),
		'kls_rwyt' => set_value('kls_rwyt', $row->kls_rwyt),
		'is_hiv' => set_value('is_hiv', $row->is_hiv)
	    );
            $this->load->view('dt_diag_klsf/dt_diag_klsf_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_diag_klsf'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_diag', TRUE));
        } else {
            $data = array(
		'id_pasien' => $this->input->post('id_pasien',TRUE),
		'tp_diag' => $this->input->post('tp_diag',TRUE),
		'kls_antm' => $this->input->post('kls_antm',TRUE),
		'ket_antm' => $this->input->post('ket_antm',TRUE),
		'kls_rwyt' => $this->input->post('kls_rwyt',TRUE),
		'is_hiv' => $this->input->post('is_hiv',TRUE),
		'create_at' => $this->input->post('create_at',TRUE),
		'update_at' => $this->input->post('update_at',TRUE),
	    );

            $this->Dt_diag_klsf_model->update($this->input->post('id_diag', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dt_diag_klsf'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dt_diag_klsf_model->get_by_id($id);

        if ($row) {
            $this->Dt_diag_klsf_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dt_diag_klsf'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_diag_klsf'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_pasien', 'id pasien', 'trim|required');
	$this->form_validation->set_rules('tp_diag', 'tp diag', 'trim|required');
	$this->form_validation->set_rules('kls_antm', 'kls antm', 'trim|required');
	$this->form_validation->set_rules('ket_antm', 'ket antm', 'trim|required');
	$this->form_validation->set_rules('kls_rwyt', 'kls rwyt', 'trim|required');
	//$this->form_validation->set_rules('is_hiv', 'is hiv', 'trim|required');
	//$this->form_validation->set_rules('create_at', 'create at', 'trim|required');
	//$this->form_validation->set_rules('update_at', 'update at', 'trim|required');

	$this->form_validation->set_rules('id_diag', 'id_diag', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Dt_diag_klsf.php */
/* Location: ./application/controllers/Dt_diag_klsf.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-13 10:31:45 */
/* http://harviacode.com */