<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dt_proses extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Dt_proses_model','Dt_pasien_model'));
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
            $config['base_url'] = base_url() . 'dt_proses?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'dt_proses?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'dt_proses';
            $config['first_url'] = base_url() . 'dt_proses';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Dt_proses_model->total_rows($q);
        $dt_proses = $this->Dt_proses_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sidebar' => 'sidebar_detail',
            'page'=>'tabel_proses',
            'dt_proses_data' => $dt_proses,
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
        $row = $this->Dt_proses_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_proses' => $row->id_proses,
		'id_pasien' => $row->id_pasien,
		'bulan' => $row->bulan,
		'tahap' => $row->tahap,
		'status' => $row->status,
		'tgl_mulai' => $row->tgl_mulai,
		'tgl_selesai' => $row->tgl_selesai,
	    );
            $this->load->view('dt_proses/dt_proses_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_proses'));
        }
    }

    public function create($idpasien) 
    {
        if(!empty($this->Dt_pasien_model->get_by_id($idpasien))){
            $data = array(
                'pasien' => $idpasien,
            'q' => $idpasien,
            'nama' => $this->Dt_pasien_model->get_by_id($idpasien)->nm_pasien,
            'sidebar' => 'sidebar_detail',
            'page' => 'form_proses',
            'button' => 'Create',
            'action' => site_url('dt_proses/create_action'),
	    'id_proses' => set_value('id_proses'),
	    'id_pasien' => !empty($idpasien)? $idpasien:set_value('id_pasien'),
	    'bulan' => set_value('bulan'),
	    'tahap' => set_value('tahap'),
	    'status' => set_value('status'),
	    'tgl_mulai' => set_value('tgl_mulai'),
	    'tgl_selesai' => set_value('tgl_selesai'),
	);
        $this->load->view('main', $data);
        }else{
            redirect(site_url('dt_proses?q='.$idpasien));
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
		'bulan' => $this->input->post('bulan',TRUE),
		'tahap' => $this->input->post('tahap',TRUE),
		'status' => $this->input->post('status',TRUE),
		'tgl_mulai' => $this->input->post('tgl_mulai',TRUE),
		'tgl_selesai' => $this->input->post('tgl_selesai',TRUE),
	    );

            $this->Dt_proses_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dt_proses?q='.$data['id_pasien']));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Dt_proses_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dt_proses/update_action'),
		'id_proses' => set_value('id_proses', $row->id_proses),
		'id_pasien' => set_value('id_pasien', $row->id_pasien),
		'bulan' => set_value('bulan', $row->bulan),
		'tahap' => set_value('tahap', $row->tahap),
		'status' => set_value('status', $row->status),
		'tgl_mulai' => set_value('tgl_mulai', $row->tgl_mulai),
		'tgl_selesai' => set_value('tgl_selesai', $row->tgl_selesai),
	    );
            $this->load->view('dt_proses/dt_proses_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_proses'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_proses', TRUE));
        } else {
            $data = array(
		'id_pasien' => $this->input->post('id_pasien',TRUE),
		'bulan' => $this->input->post('bulan',TRUE),
		'tahap' => $this->input->post('tahap',TRUE),
		'status' => $this->input->post('status',TRUE),
		'tgl_mulai' => $this->input->post('tgl_mulai',TRUE),
		'tgl_selesai' => $this->input->post('tgl_selesai',TRUE),
	    );

            $this->Dt_proses_model->update($this->input->post('id_proses', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dt_proses'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dt_proses_model->get_by_id($id);

        if ($row) {
            $this->Dt_proses_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dt_pasien/read/'.$row->id_pasien));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_proses?q='.$row->id_pasien));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_pasien', 'id pasien', 'trim|required');
	//$this->form_validation->set_rules('bulan', 'bulan', 'trim|required');
	//$this->form_validation->set_rules('tahap', 'tahap', 'trim|required');
	//$this->form_validation->set_rules('status', 'status', 'trim|required');
	//$this->form_validation->set_rules('tgl_mulai', 'tgl mulai', 'trim|required');
	//$this->form_validation->set_rules('tgl_selesai', 'tgl selesai', 'trim|required');

	$this->form_validation->set_rules('id_proses', 'id_proses', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Dt_proses.php */
/* Location: ./application/controllers/Dt_proses.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-25 10:32:51 */
/* http://harviacode.com */