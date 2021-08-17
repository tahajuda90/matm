<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dt_pemeriksaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Dt_pemeriksaan_model','Dt_proses_model'));
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
            $config['base_url'] = base_url() . 'dt_pemeriksaan?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'dt_pemeriksaan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'dt_pemeriksaan';
            $config['first_url'] = base_url() . 'dt_pemeriksaan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Dt_pemeriksaan_model->total_rows($q);
        $dt_pemeriksaan = $this->Dt_pemeriksaan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sidebar' => 'sidebar_detail',
            'page'=>'tabel_pemeriksaan',
            'dt_pemeriksaan_data' => $dt_pemeriksaan,
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
        $row = $this->Dt_pemeriksaan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_periksa' => $row->id_periksa,
		'id_proses' => $row->id_proses,
		'tgl_periksa' => $row->tgl_periksa,
		'noreg' => $row->noreg,
		'jenis' => $row->jenis,
		'nilai' => $row->nilai,
		'ket' => $row->ket,
		'create_at' => $row->create_at,
		'update_at' => $row->update_at,
	    );
            $this->load->view('dt_pemeriksaan/dt_pemeriksaan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_pemeriksaan'));
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
            'page' => 'form_pemeriksaan',
            
            'button' => 'Create',
            'action' => site_url('dt_pemeriksaan/create_action'),
	    'id_periksa' => set_value('id_periksa'),
	    'id_proses' => !empty($idproses)? $idproses:set_value('id_proses'),
	    'tgl_periksa' => set_value('tgl_periksa'),
	    'noreg' => set_value('noreg'),
	    'jenis' => set_value('jenis'),
	    'nilai' => set_value('nilai'),
	    'ket' => set_value('ket')
	);
        $this->load->view('main', $data); 
        }else{
            redirect(site_url('dt_pemeriksaan?q='.$idproses));
        }        
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create($this->input->post('id_proses',TRUE));
        } else {
            $data = array(
		'id_proses' => $this->input->post('id_proses',TRUE),
		'tgl_periksa' => $this->input->post('tgl_periksa',TRUE),
		'noreg' => $this->input->post('noreg',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'nilai' => $this->input->post('nilai',TRUE),
		'ket' => $this->input->post('ket',TRUE)
	    );

            $this->Dt_pemeriksaan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dt_pemeriksaan?q='.$data['id_proses']));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Dt_pemeriksaan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dt_pemeriksaan/update_action'),
		'id_periksa' => set_value('id_periksa', $row->id_periksa),
		'id_proses' => set_value('id_proses', $row->id_proses),
		'tgl_periksa' => set_value('tgl_periksa', $row->tgl_periksa),
		'noreg' => set_value('noreg', $row->noreg),
		'jenis' => set_value('jenis', $row->jenis),
		'nilai' => set_value('nilai', $row->nilai),
		'ket' => set_value('ket', $row->ket),
		'create_at' => set_value('create_at', $row->create_at),
		'update_at' => set_value('update_at', $row->update_at),
	    );
            $this->load->view('dt_pemeriksaan/dt_pemeriksaan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_pemeriksaan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_periksa', TRUE));
        } else {
            $data = array(
		'id_proses' => $this->input->post('id_proses',TRUE),
		'tgl_periksa' => $this->input->post('tgl_periksa',TRUE),
		'noreg' => $this->input->post('noreg',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'nilai' => $this->input->post('nilai',TRUE),
		'ket' => $this->input->post('ket',TRUE),
		'create_at' => $this->input->post('create_at',TRUE),
		'update_at' => $this->input->post('update_at',TRUE),
	    );

            $this->Dt_pemeriksaan_model->update($this->input->post('id_periksa', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dt_pemeriksaan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dt_pemeriksaan_model->get_by_id($id);

        if ($row) {
            $this->Dt_pemeriksaan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dt_pemeriksaan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_pemeriksaan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_proses', 'id proses', 'trim|required');
	//$this->form_validation->set_rules('tgl_periksa', 'tgl periksa', 'trim|required');
	//$this->form_validation->set_rules('noreg', 'noreg', 'trim|required');
	//$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
	//$this->form_validation->set_rules('nilai', 'nilai', 'trim|required');
	//$this->form_validation->set_rules('ket', 'ket', 'trim|required');
	//$this->form_validation->set_rules('create_at', 'create at', 'trim|required');
	//$this->form_validation->set_rules('update_at', 'update at', 'trim|required');

	$this->form_validation->set_rules('id_periksa', 'id_periksa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Dt_pemeriksaan.php */
/* Location: ./application/controllers/Dt_pemeriksaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-25 10:33:04 */
/* http://harviacode.com */