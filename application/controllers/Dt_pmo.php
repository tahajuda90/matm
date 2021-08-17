<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dt_pmo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dt_pmo_model');
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
            $config['base_url'] = base_url() . 'dt_pmo?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'dt_pmo?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'dt_pmo';
            $config['first_url'] = base_url() . 'dt_pmo';
        }
        
         $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Dt_pmo_model->total_rows($q);
        $dt_pmo = $this->Dt_pmo_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sidebar' => 'sidebar',
            'page' => 'tabel_pmo',
            'dt_pmo_data' => $dt_pmo,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('main', $data);
    }

    public function read($id) 
    {
        $row = $this->Dt_pmo_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pmo' => $row->id_pmo,
		'nik_pmo' => $row->nik_pmo,
		'nm_pmo' => $row->nm_pmo,
		'jns_klm' => $row->jns_klm,
		'alamat' => $row->alamat,
		'telp' => $row->telp,
		'kota' => $row->kota,
		'prop' => $row->prop,
		'faskes' => $row->faskes,
		'regtb03f' => $row->regtb03f,
		'regtb03kt' => $row->regtb03kt,
		'create_at' => $row->create_at,
		'update_at' => $row->update_at,
	    );
            $this->load->view('dt_pmo/dt_pmo_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_pmo'));
        }
    }

    public function create() 
    {
        $data = array(
            'sidebar' => 'sidebar',
            'page' => 'form_pmo',
            'button' => 'Create',
            'action' => site_url('dt_pmo/create_action'),
	    'id_pmo' => set_value('id_pmo'),
	    'nik_pmo' => set_value('nik_pmo'),
	    'nm_pmo' => set_value('nm_pmo'),
	    'jns_klm' => set_value('jns_klm'),
	    'alamat' => set_value('alamat'),
	    'telp' => set_value('telp'),
	    'kota' => set_value('kota'),
	    'prop' => set_value('prop'),
	    'faskes' => set_value('faskes'),
	    'regtb03f' => set_value('regtb03f'),
	    'regtb03kt' => set_value('regtb03kt'),
	    'create_at' => set_value('create_at'),
	    'update_at' => set_value('update_at'),
	);
        $this->load->view('main', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_pmo' => dechex($this->input->post('nik_pmo',TRUE)),
		'nik_pmo' => $this->input->post('nik_pmo',TRUE),
		'nm_pmo' => $this->input->post('nm_pmo',TRUE),
		'jns_klm' => $this->input->post('jns_klm',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'telp' => $this->input->post('telp',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'prop' => $this->input->post('prop',TRUE),
		'faskes' => $this->input->post('faskes',TRUE),
		'regtb03f' => $this->input->post('regtb03f',TRUE),
		'regtb03kt' => $this->input->post('regtb03kt',TRUE)
	    );

            $this->Dt_pmo_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dt_pmo'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Dt_pmo_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dt_pmo/update_action'),
		'id_pmo' => set_value('id_pmo', $row->id_pmo),
		'nik_pmo' => set_value('nik_pmo', $row->nik_pmo),
		'nm_pmo' => set_value('nm_pmo', $row->nm_pmo),
		'jns_klm' => set_value('jns_klm', $row->jns_klm),
		'alamat' => set_value('alamat', $row->alamat),
		'telp' => set_value('telp', $row->telp),
		'kota' => set_value('kota', $row->kota),
		'prop' => set_value('prop', $row->prop),
		'faskes' => set_value('faskes', $row->faskes),
		'regtb03f' => set_value('regtb03f', $row->regtb03f),
		'regtb03kt' => set_value('regtb03kt', $row->regtb03kt),
		'create_at' => set_value('create_at', $row->create_at),
		'update_at' => set_value('update_at', $row->update_at),
	    );
            $this->load->view('dt_pmo/dt_pmo_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_pmo'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pmo', TRUE));
        } else {
            $data = array(
		'nik_pmo' => $this->input->post('nik_pmo',TRUE),
		'nm_pmo' => $this->input->post('nm_pmo',TRUE),
		'jns_klm' => $this->input->post('jns_klm',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'telp' => $this->input->post('telp',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'prop' => $this->input->post('prop',TRUE),
		'faskes' => $this->input->post('faskes',TRUE),
		'regtb03f' => $this->input->post('regtb03f',TRUE),
		'regtb03kt' => $this->input->post('regtb03kt',TRUE),
	    );

            $this->Dt_pmo_model->update($this->input->post('id_pmo', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dt_pmo'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dt_pmo_model->get_by_id($id);

        if ($row) {
            $this->Dt_pmo_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dt_pmo'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_pmo'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nik_pmo', 'nik pmo', 'trim|required');
	$this->form_validation->set_rules('nm_pmo', 'nm pmo', 'trim|required');
	//$this->form_validation->set_rules('jns_klm', 'jns klm', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('telp', 'telp', 'trim|required');
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('prop', 'prop', 'trim|required');
	$this->form_validation->set_rules('faskes', 'faskes', 'trim|required');
	$this->form_validation->set_rules('regtb03f', 'regtb03f', 'trim|required');
	$this->form_validation->set_rules('regtb03kt', 'regtb03kt', 'trim|required');
	//$this->form_validation->set_rules('create_at', 'create at', 'trim|required');
	//$this->form_validation->set_rules('update_at', 'update at', 'trim|required');

	$this->form_validation->set_rules('id_pmo', 'id_pmo', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "dt_pmo.xls";
        $judul = "dt_pmo";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nik Pmo");
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Pmo");
	xlsWriteLabel($tablehead, $kolomhead++, "Jns Klm");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Telp");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota");
	xlsWriteLabel($tablehead, $kolomhead++, "Prop");
	xlsWriteLabel($tablehead, $kolomhead++, "Faskes");
	xlsWriteLabel($tablehead, $kolomhead++, "Regtb03f");
	xlsWriteLabel($tablehead, $kolomhead++, "Regtb03kt");
	xlsWriteLabel($tablehead, $kolomhead++, "Create At");
	xlsWriteLabel($tablehead, $kolomhead++, "Update At");

	foreach ($this->Dt_pmo_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nik_pmo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_pmo);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jns_klm);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->telp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->prop);
	    xlsWriteLabel($tablebody, $kolombody++, $data->faskes);
	    xlsWriteLabel($tablebody, $kolombody++, $data->regtb03f);
	    xlsWriteLabel($tablebody, $kolombody++, $data->regtb03kt);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->update_at);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Dt_pmo.php */
/* Location: ./application/controllers/Dt_pmo.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-27 18:42:35 */
/* http://harviacode.com */