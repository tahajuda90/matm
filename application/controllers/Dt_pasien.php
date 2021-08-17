<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dt_pasien extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dt_pasien_model');
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
            $config['base_url'] = base_url() . 'dt_pasien?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'dt_pasien?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'dt_pasien';
            $config['first_url'] = base_url() . 'dt_pasien';
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
        $config['total_rows'] = $this->Dt_pasien_model->total_rows($q);
        $dt_pasien = $this->Dt_pasien_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sidebar' => 'sidebar',
            'page' => 'tabel_pasien',
            'dt_pasien_data' => $dt_pasien,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('main', $data);
    }

    public function read($id) 
    {
        $row = $this->Dt_pasien_model->get_by_id($id);
        if ($row) {
            $data = array(
                'pasien' => $id,
                'q' =>$id,
                'sidebar' => 'sidebar_detail',
                'page'=>'detail_pasien',
		'id_pasien' => $row->id_pasien,
		'nik_pasien' => $row->nik_pasien,
		'nm_pasien' => $row->nm_pasien,
		'jns_klm' => $row->jns_klm,
		'alamat' => $row->alamat,
		'is_hamil' => $row->is_hamil,
		'tgl_lahir' => $row->tgl_lahir,
		'umr_thn' => $row->umr_thn,
		'umr_bln' => $row->umr_bln,
		'brt_bdn' => $row->brt_bdn,
		'tg_bdn' => $row->tg_bdn,
		'telp' => $row->telp,
		'parut_bcg' => $row->parut_bcg,
		'skor_anak' => $row->skor_anak
	    );
            $this->load->view('main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_pasien'));
        }
    }

    public function create() 
    {
        $data = array(
            'sidebar' => 'sidebar',
            'page' => 'form_pasien',
            'button' => 'Create',
            'action' => site_url('dt_pasien/create_action'),
	    'id_pasien' => set_value('id_pasien'),
	    'nik_pasien' => set_value('nik_pasien'),
	    'nm_pasien' => set_value('nm_pasien'),
	    'jns_klm' => set_value('jns_klm'),
	    'alamat' => set_value('alamat'),
	    'is_hamil' => set_value('is_hamil'),
	    'tgl_lahir' => set_value('tgl_lahir'),
	    'umr_thn' => set_value('umr_thn'),
	    'umr_bln' => set_value('umr_bln'),
	    'brt_bdn' => set_value('brt_bdn'),
	    'tg_bdn' => set_value('tg_bdn'),
	    'telp' => set_value('telp'),
	    'parut_bcg' => set_value('parut_bcg'),
	    'skor_anak' => set_value('skor_anak')
	);
        $this->load->view('main', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $d2 = new DateTime();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_pasien' => dechex((float)$this->input->post('nik_pasien',TRUE)),
		'nik_pasien' => $this->input->post('nik_pasien',TRUE),
		'nm_pasien' => $this->input->post('nm_pasien',TRUE),
		'jns_klm' => $this->input->post('jns_klm',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'is_hamil' => $this->input->post('is_hamil',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'umr_thn' => $d2->diff(new DateTime($this->input->post('tgl_lahir',TRUE)))->y,
		'umr_bln' => $d2->diff(new DateTime($this->input->post('tgl_lahir',TRUE)))->m,
		'brt_bdn' => $this->input->post('brt_bdn',TRUE),
		'tg_bdn' => $this->input->post('tg_bdn',TRUE),
		'telp' => $this->input->post('telp',TRUE),
		'parut_bcg' => $this->input->post('parut_bcg',TRUE),
		'skor_anak' => $this->input->post('skor_anak',TRUE),
		'create_at' => date("Y-m-d H:i:s")
	    );
            //$this->db->insert('dt_pasien', $data);
            $this->Dt_pasien_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dt_pasien'));
            //print_r($data);
        }
    }
    
    public function update($id) 
    {
        $row = $this->Dt_pasien_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dt_pasien/update_action'),
		'id_pasien' => set_value('id_pasien', $row->id_pasien),
		'nik_pasien' => set_value('nik_pasien', $row->nik_pasien),
		'nm_pasien' => set_value('nm_pasien', $row->nm_pasien),
		'jns_klm' => set_value('jns_klm', $row->jns_klm),
		'alamat' => set_value('alamat', $row->alamat),
		'is_hamil' => set_value('is_hamil', $row->is_hamil),
		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
		'umr_thn' => set_value('umr_thn', $row->umr_thn),
		'umr_bln' => set_value('umr_bln', $row->umr_bln),
		'brt_bdn' => set_value('brt_bdn', $row->brt_bdn),
		'tg_bdn' => set_value('tg_bdn', $row->tg_bdn),
		'telp' => set_value('telp', $row->telp),
		'parut_bcg' => set_value('parut_bcg', $row->parut_bcg),
		'skor_anak' => set_value('skor_anak', $row->skor_anak)
	    );
            $this->load->view('dt_pasien/dt_pasien_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_pasien'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pasien', TRUE));
        } else {
            $data = array(
		'nik_pasien' => $this->input->post('nik_pasien',TRUE),
		'nm_pasien' => $this->input->post('nm_pasien',TRUE),
		'jns_klm' => $this->input->post('jns_klm',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'is_hamil' => $this->input->post('is_hamil',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'umr_thn' => $this->input->post('umr_thn',TRUE),
		'umr_bln' => $this->input->post('umr_bln',TRUE),
		'brt_bdn' => $this->input->post('brt_bdn',TRUE),
		'tg_bdn' => $this->input->post('tg_bdn',TRUE),
		'telp' => $this->input->post('telp',TRUE),
		'parut_bcg' => $this->input->post('parut_bcg',TRUE),
		'skor_anak' => $this->input->post('skor_anak',TRUE)
	    );

            $this->Dt_pasien_model->update($this->input->post('id_pasien', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dt_pasien'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dt_pasien_model->get_by_id($id);

        if ($row) {
            $this->Dt_pasien_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dt_pasien'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_pasien'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nik_pasien', 'nik pasien', 'trim|required');
	$this->form_validation->set_rules('nm_pasien', 'nm pasien', 'trim|required');
	//$this->form_validation->set_rules('jns_klm', 'jns klm', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	//$this->form_validation->set_rules('is_hamil', 'is hamil', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
	//$this->form_validation->set_rules('umr_thn', 'umr thn', 'trim|required');
	//$this->form_validation->set_rules('umr_bln', 'umr bln', 'trim|required');
	$this->form_validation->set_rules('brt_bdn', 'brt bdn', 'trim|required');
	$this->form_validation->set_rules('tg_bdn', 'tg bdn', 'trim|required');
	$this->form_validation->set_rules('telp', 'telp', 'trim|required');
	//$this->form_validation->set_rules('parut_bcg', 'parut bcg', 'trim|required');
	$this->form_validation->set_rules('skor_anak', 'skor anak', 'trim|required');

	$this->form_validation->set_rules('id_pasien', 'id_pasien', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "dt_pasien.xls";
        $judul = "dt_pasien";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nik Pasien");
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Pasien");
	xlsWriteLabel($tablehead, $kolomhead++, "Jns Klm");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Is Hamil");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Umr Thn");
	xlsWriteLabel($tablehead, $kolomhead++, "Umr Bln");
	xlsWriteLabel($tablehead, $kolomhead++, "Brt Bdn");
	xlsWriteLabel($tablehead, $kolomhead++, "Tg Bdn");
	xlsWriteLabel($tablehead, $kolomhead++, "Telp");
	xlsWriteLabel($tablehead, $kolomhead++, "Parut Bcg");
	xlsWriteLabel($tablehead, $kolomhead++, "Skor Anak");
	xlsWriteLabel($tablehead, $kolomhead++, "Create At");

	foreach ($this->Dt_pasien_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nik_pasien);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_pasien);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jns_klm);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteNumber($tablebody, $kolombody++, $data->is_hamil);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_lahir);
	    xlsWriteNumber($tablebody, $kolombody++, $data->umr_thn);
	    xlsWriteNumber($tablebody, $kolombody++, $data->umr_bln);
	    xlsWriteNumber($tablebody, $kolombody++, $data->brt_bdn);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tg_bdn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->telp);
	    xlsWriteNumber($tablebody, $kolombody++, $data->parut_bcg);
	    xlsWriteNumber($tablebody, $kolombody++, $data->skor_anak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create_at);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Dt_pasien.php */
/* Location: ./application/controllers/Dt_pasien.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-20 17:45:13 */
/* http://harviacode.com */