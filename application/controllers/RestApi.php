<?php


class RestApi extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model(array('dt_diag_klsf_model','dt_obat_model','dt_pasien_model','dt_pemeriksaan_model','dt_proses_model','dt_thpan_model'));
    }
    
    public function akses(){
        $nik=$this->input->post('nik',true);
        $data = $this->dt_pasien_model->get_limit_data(1,0,$nik);
        if($data!=null){
           $hsl = array('status'=>'success','data'=>$data[0]->id_pasien); 
        }else{
            $hsl = array('status'=>'error','data'=>'');
        }
        
        print_r(json_encode($hsl));
    }
    
    public function diagnosa(){
        $idPasien=$this->input->post('idPasien',true);
        $diag = $this->dt_diag_klsf_model->get_limit_data(1,0,$idPasien)[0];        
        
//        $date1 = new DateTime($proses->tgl_mulai);
//        $date2 = new DateTime($proses->tgl_selesai);
//        
//        $pmblg = 0;
        
//        foreach($obat as $ob){
//            $pmblg = ($ob->dosis/$ob->dosis_minum)+$pmblg;
//        }
        
        //$pnybt = intval($date2->diff($date1)->format("%a"));

        
        $jdiag = array(
		'id_diag' => $diag->id_diag,
		'id_pasien' => $diag->id_pasien,
		'tp_diag' => list_tpdiag()[$diag->tp_diag],
		'kls_antm' => list_klsantm()[$diag->kls_antm],
		'ket_antm' => $diag->ket_antm,
		'kls_rwyt' => list_klsrwyt()[$diag->kls_rwyt],
		'is_hiv' => list_klshiv()[$diag->is_hiv],		
	    );
        //$json['diag']=$jdiag;
        //$json['proses']=$jproses;
        //$json['progress']=floor(($pmblg/$pnybt)*100);
        print_r(json_encode($jdiag));
    }
    
    public function proses(){
        $idPasien=$this->input->post('idPasien',true);
        $proses = $this->dt_proses_model->get_limit_data(1,0,$idPasien)[0];
        $date1 = new DateTime($proses->tgl_mulai);
        $date2 = new DateTime($proses->tgl_selesai);
        $pnybt = intval($date2->diff($date1)->format("%a"));
        $jproses = array(
            'id_proses' =>$proses->id_proses, 
            'bulan' => 'Bulan '.$proses->bulan,
            'tahap' => list_tahap()[$proses->tahap],
            'tgl_selesai' => fdateformat("d-m-Y", $proses->tgl_selesai),
            'durasi' => $pnybt
        );
        print_r(json_encode($jproses));
    }
    
    public function obat(){
        $idPasien=$this->input->post('idPasien',true);
        $hobat = array();
        $proses = $this->dt_proses_model->get_limit_data(1,0,$idPasien)[0];
        $obat = $this->dt_obat_model->get_all($proses->id_proses);
        foreach($obat as $ob){
            array_push($hobat, array('id_obat'=>$ob->id_obat,'id_proses'=>$ob->id_proses,'paduan'=> list_paduan()[$ob->panduan],'bentuk'=> list_bentuk()[$ob->bentuk],'sumber'=> list_sumber()[$ob->sumber],'dosis'=>$ob->dosis,'dosis_minum'=>$ob->dosis_minum,'tgl_pemberian'=> fdateformat("d-m-Y",$ob->tgl_pemberian)));
        }
        print_r(json_encode($hobat));
    }
    
    public function progress(){
        $idPasien=$this->input->post('idPasien',true);
        $proses = array();
        $json = null;
        foreach($this->dt_proses_model->get_all($idPasien) as $ps){
            $proses[] = array('id_proses'=>$ps->id_proses,'bulan'=>'Bulan '.$ps->bulan,'tahap'=> list_tahap()[$ps->tahap],'mulai'=>$ps->tgl_mulai,'selesai'=>$ps->tgl_selesai);
            $obat = array();
            foreach($this->dt_obat_model->get_all($ps->id_proses) as $ob){
                $obat[] = array(
                    'id_obt'=>$ob->id_obat,
                    'paduan'=> list_paduan()[$ob->panduan],
                    'bentuk'=> list_bentuk()[$ob->bentuk],
                    'sumber'=> list_sumber()[$ob->sumber],
                    'dosis'=>$ob->dosis,
                    'dosis_minum'=>$ob->dosis_minum,
                    'tgl_beri'=>$ob->tgl_pemberian,
                    'thap'=> $this->dt_thpan_model->get_limit_by($ps->id_proses,$ob->id_obat));
            }
        }
        $json['proses'] = $proses;
        $json['obat'] = $obat;
        print_r(json_encode($json));
    }
    
    public function profil(){
        $idPasien=$this->input->post('idPasien',true);
        $parut = array('Parut BCG Nihil','Parut BCG Ada');
        $profil = $this->dt_pasien_model->get_by_id($idPasien);
        
        
        if(isset($profil)){
            $profil->tgl_lahir = fdateformat("d-m-Y",$profil->tgl_lahir);
            $profil->is_hamil = list_hamil()[$profil->is_hamil];
            $profil->jns_klm = list_kelamin()[$profil->jns_klm];
            $profil->parut_bcg = $parut[$profil->parut_bcg];
            //$hasil = array('status'=>'success','data'=>$profil);
            print_r(json_encode($profil));
        }else{
            //$hasil = array('status'=>'success','data'=>'');
            print_r(json_encode(array()));
        }
        
    }
    
    public function input_thpn(){
            
        $data = array(
            'id_obat' => $this->input->post('id_obat',TRUE),
            'id_proses' => $this->input->post('id_proses',TRUE),
            'hari' => fdatetimetodb($this->input->post('hari',TRUE))
	    );
        if($this->dt_thpan_model->insert($data)){
            //echo json_encode(array("message"=>"Berhasil"));
            echo json_encode($data);
        }else{
            echo json_encode(array("message"=>"Gagal"));
        }
    }
}
