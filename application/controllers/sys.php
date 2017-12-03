<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sys extends CI_Controller {

	function __construct(){
		parent:: __construct();	
		$this->load->model('Web_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('date');
		$this->load->helper('form','url');
	}

	public function index()
	{
		$data['login']			=	$this->session->userdata('login',TRUE);
		if($data['login']==FALSE) redirect(base_url('sys/login'));

			$data['title']			=	"Main Page | BNI Work Solution PT BNI KanWil Palembang";
			$id_pengguna			=	$this->session->userdata('id_pengguna');
			$data['pengguna']		=	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			=	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		=	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		=	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		=	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		=	$this->Web_model->nvalid_e($id_pengguna);
			$data['like_t']			=	$this->Web_model->like_t($id_pengguna);
			$data['like_e']			=	$this->Web_model->like_e($id_pengguna);
			$data['reward']			=	$this->Web_model->total_reward($id_pengguna);
			$tahun					=	'2016';
			$data['tc']				=	$this->Web_model->bulan_t($tahun,$id_pengguna);
			$data['ex']				=	$this->Web_model->bulan_e($tahun,$id_pengguna);
			$data['content']		=	'home';
			$this->load->view('templete',$data);
	}

	public function login(){
		$this->load->view('login');
	}

	function masuk(){
		$nik						= 	trim(strip_tags($this->input->post('nik')));
		$password					= 	md5($this->input->post('password'));
		$hasil						= 	$this->Web_model->login($nik,$password);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result_array() as $data) {
				$session_id			=	$data['id_pengguna'];
				$session_nik		=	$data['nik'];
				$session_nama		=	$data['nama'];
				$session_userfile	=	$data['userfile'];
			}
			$sess_user = array(
								'id_pengguna'=>$session_id,
								'nik'=>$session_nik,
								'nama'=>$session_nama,
								'userfile'=>$session_userfile
				);
			$this->session->set_userdata($sess_user,TRUE);
			$this->session->set_userdata('login',TRUE);
			redirect(base_url('sys'),'refresh');
		}
		else{
			redirect(base_url('sys'),'refresh');
		}
	}

	public function profil(){
		$data['login']			=	$this->session->userdata('login',TRUE);
		if ($data['login']==false) redirect(base_url('sys/login'));

			$data['title']			=	'User Profil | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			=	$this->session->userdata('id_pengguna');
			$data['pengguna']		=	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			=	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		=	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		=	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		=	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		=	$this->Web_model->nvalid_e($id_pengguna);
			$data['tacit']			= 	$this->Web_model->data_tacit_validasi($id_pengguna);
			$data['explicit']		= 	$this->Web_model->data_explicit_validasi($id_pengguna);
			$data['content']		=	'profil';
			$this->load->view('templete',$data);
	}

	public function edit_profil(){
		$data['login']			=	$this->session->userdata('login',TRUE);
		if ($data['login']==false) redirect(base_url('sys/login'));

			$data['title']			=	'Edit Profil | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			=	$this->session->userdata('id_pengguna');
			$data['pengguna']		=	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			=	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		=	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		=	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		=	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		=	$this->Web_model->nvalid_e($id_pengguna);
			$data['like_t']			=	$this->Web_model->like_t($id_pengguna);
			$data['like_e']			=	$this->Web_model->like_e($id_pengguna);
			$data['pegawai']		=	$this->Web_model->edit_profil($id_pengguna);
			$data['nama']			=	$this->session->userdata('nama');
			$data['bidang_kerja']	=	$this->session->userdata('nama_bdkerja');
			$data['bidang_kerja']	=	$this->Web_model->data_bdkerja();
			$data['content']		=	'edit_profil';
			$this->load->view('templete',$data);
	}

	function update_profil(){
		$data 						=	array();
		$config['upload_path'] 		= 	'./photo/';
		$config['allowed_types'] 	= 	'gif|jpg|png';
		$config['max_size']			= 	'2000';
		$config['max_width']  		= 	'3000';
		$config['max_height']  		= 	'4000';
		$config['remove_spaces']  	= 	FALSE;
		$this->load->library('upload', $config);
		if(empty($_FILES['userfile']['name'])){
			$data 					=	array();
			$id						= 	$this->session->userdata('id_pengguna');
			$data['nik']			= 	$this->input->post('nik');
			$data['nama']			= 	$this->input->post('nama');
			$data['jenis_kelamin']	= 	$this->input->post('jenis_kelamin');
			$data['tempat_lahir']	= 	$this->input->post('tempat_lahir');
			$data['tanggal_lahir']	= 	$this->input->post('tanggal_lahir');
			$data['id_bdkerja']		=	$this->input->post('id_bdkerja');			
			$this->form_validation->set_rules('nik','nik','required');
			$this->form_validation->set_rules('nama','nama','required');
			$this->form_validation->set_rules('jenis_kelamin','jenis kelamin','required');
			$this->form_validation->set_rules('tempat_lahir','tempat lahir','required');
			$this->form_validation->set_rules('tanggal_lahir','tanggal lahir','required');
			$this->form_validation->set_rules('id_bdkerja','bidang_kerja','required');
			if($this->form_validation->run() == FALSE){
				$this->edit_profil();
			}
			else{
				$this->Web_model->update_pegawai($data,$id);
				echo "<script> alert('Data Profil berhasil diupdate');</script>";
				redirect(base_url('sys/profil'), 'refresh');
			}
		}
		else{
			if(!$this->upload->do_upload()){
				echo $config['upload_path'];
				echo $this->upload->display_errors();
			}
			else {
				$data 					=	array();
				$id						= 	$this->session->userdata('id_pengguna');;
				$data['nik']			= 	$this->input->post('nik');
				$data['nama']			= 	$this->input->post('nama');
				$data['jenis_kelamin']	= 	$this->input->post('jenis_kelamin');
				$data['tempat_lahir']	=	$this->input->post('tempat_lahir');
				$data['tanggal_lahir']	= 	$this->input->post('tanggal_lahir');
				$data['id_bdkerja']		=	$this->input->post('id_bdkerja');				
				$data['userfile']		= 	$_FILES['userfile']['name'];
				$this->form_validation->set_rules('nik','nik','required');
				$this->form_validation->set_rules('nama','nama','required');
				$this->form_validation->set_rules('jenis_kelamin','jenis kelamin','required');
				$this->form_validation->set_rules('tempat_lahir','tempat lahir','required');
				$this->form_validation->set_rules('tanggal_lahir','tanggal lahir','required');
				$this->form_validation->set_rules('id_bdkerja','bidang_kerja','required');				
				if($this->form_validation->run() == FALSE){
					$this->edit_profil();
				}
				else{
					$this->Web_model->update_pegawai($data,$id);
					redirect(base_url('sys/edit_profil'), 'refresh');
				}
			}
		}
    }

    public function edit_password(){
		$data['login']			=	$this->session->userdata('login',TRUE);
		if ($data['login']==false) redirect(base_url('sys/login'));

			$data['title']			=	'Edit Password | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			=	$this->session->userdata('id_pengguna');
			$data['pengguna']		=	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			=	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		=	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		=	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		=	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		=	$this->Web_model->nvalid_e($id_pengguna);
			$data['like_t']			=	$this->Web_model->like_t($id_pengguna);
			$data['like_e']			=	$this->Web_model->like_e($id_pengguna);
			$data['pegawai']		=	$this->Web_model->edit_profil($id_pengguna);
			$data['nama']			=	$this->session->userdata('nama');
			$data['bidang_kerja']	=	$this->session->userdata('nama_bdkerja');
			$data['bidang_kerja']	=	$this->Web_model->data_bdkerja();			
			$data['content']		=	'edit_password';
			$this->load->view('templete',$data);
    }

    function update_password(){
    	$data 						=	array();
    	$id 						=	$this->session->userdata('id_pengguna');
    	$data['password']			=	md5($this->input->post('password'));
    	$password1					=	md5($this->input->post('password1'));
    	$this->form_validation->set_rules('password','Password','required|min_length[6]');
    	$this->form_validation->set_rules('password1','Password','required|min_length[6]');
    	if ($data['password'] != $password1) {
			echo "<script> alert('Password tidak cocok');</script>";
			$this->edit_password();
    	}
    	if ($this->form_validation->run() == FALSE) {
    		$this->edit_password();
    	}
    	else{
    		$this->Web_model->update_password($data,$id);
			echo "<script> alert('Password Anda Telah Diperbaharui');</script>";
			redirect(base_url('sys'), 'refresh');    		
    	}
    }

	function reset_password(){
		$id_pengguna			= 	$this->session->userdata('id_pengguna');
		$pengguna				= 	$this->Web_model->data_pengguna($id_pengguna);
		foreach($pengguna->result_array() as $p){
			$data['password']	= 	md5($p['nik']);
		}
		$id					= $this->uri->segment(3);
		$this->Web_model->reset_password($id,$data);
		echo "<script> alert('Password Telah Berhasil Direset');</script>";
		redirect(base_url('sys/daftar_pegawai'), 'refresh');
	}

	public function input_pegawai(){
		$data['login']			=	$this->session->userdata('login',TRUE);
		if ($data['login']==false) redirect(base_url('sys/login'));

			$data['title']			=	'Input Pegawai | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			=	$this->session->userdata('id_pengguna');
			$data['pengguna']		=	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			=	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		=	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		=	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		=	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		=	$this->Web_model->nvalid_e($id_pengguna);
			$data['bidang_kerja']	= 	$this->Web_model->data_bdkerja();			
			$data['content']		=	'input_pegawai';
			$this->load->view('templete',$data);
	}

	function submit_data_pegawai(){
		$data 					=	array();
		$data['nik']			= 	$this->input->post('nik');
		$data['password']		=	md5($this->input->post('nik'));
		$data['nama']			= 	$this->input->post('nama');
		$data['jenis_kelamin']	= 	$this->input->post('jenis_kelamin');
		$data['tempat_lahir']	= 	$this->input->post('tempat_lahir');
		$data['tanggal_lahir']	= 	$this->input->post('tanggal_lahir');
		$data['id_bdkerja']		=	$this->input->post('id_bdkerja');
		$data['hak_akses']		=	$this->input->post('hak_akses');
		$this->form_validation->set_rules('nik','nik','required|is_unique[pengguna.nik]');
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('jenis_kelamin','jenis kelamin','required');
		$this->form_validation->set_rules('tempat_lahir','tempat lahir','required');
		$this->form_validation->set_rules('tanggal_lahir','tanggal lahir','required');
		$this->form_validation->set_rules('id_bdkerja','bidang kerja','required');
		$this->form_validation->set_rules('hak_akses','hak akses','required');
		if($this->form_validation->run() == FALSE){
			$this->input_pegawai();
		}
		else{
			$this->Web_model->input_pegawai($data);
			echo "<script> alert('Data Pegawai disimpan.');</script>";
			redirect(base_url('sys/daftar_pegawai'), 'refresh');
		}
	}		

	public function daftar_pegawai(){
		$data['login']			=	$this->session->userdata('login',TRUE);
		if ($data['login']==false) redirect(base_url('sys/login'));

			$data['title']			=	'Daftar Pegawai | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			=	$this->session->userdata('id_pengguna');
			$data['pengguna']		=	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			=	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		=	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		=	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		=	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		=	$this->Web_model->nvalid_e($id_pengguna);
			$data['pegawai']		=	$this->Web_model->daftar_pegawai();
			$data['content']		=	'daftar_pegawai';
			$this->load->view('templete',$data);
	}

	public function edit_pegawai(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Edit Pegawai | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$id						= 	$this->uri->segment(3);
			$data['pegawai'] 		= 	$this->Web_model->edit_pegawai($id);
			$data['nama'] 			= 	$this->session->userdata('nama');
			$data['bidang_kerja']	=	$this->session->userdata('nama_bdkerja');
			$data['bidang_kerja']	=	$this->Web_model->data_bdkerja();
			$data['content']		= 	'edit_pegawai';
			$this->load->view('templete',$data);
	}

	function update_data_pegawai(){
		$data 					=	array();
		$id						= 	$this->input->post('id_pengguna');
		$data['nik']			= 	$this->input->post('nik');
		$data['nama']			= 	$this->input->post('nama');
		$data['jenis_kelamin']	= 	$this->input->post('jenis_kelamin');
		$data['tempat_lahir']	= 	$this->input->post('tempat_lahir');
		$data['tanggal_lahir']	= 	$this->input->post('tanggal_lahir');
		$data['id_bdkerja']		=	$this->input->post('id_bdkerja');
		$data['hak_akses']		=	$this->input->post('hak_akses');
		$this->form_validation->set_rules('nik','nik','required');
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('jenis_kelamin','jenis kelamin','required');
		$this->form_validation->set_rules('tempat_lahir','tempat lahir','required');
		$this->form_validation->set_rules('tanggal_lahir','tanggal lahir','required');
		$this->form_validation->set_rules('id_bdkerja','bidang_kerja','required');
			if($this->form_validation->run() == FALSE){
				$this->edit_pegawai();
			}
			else{
				$this->Web_model->update_pegawai($data,$id);
				echo "<script> alert('Data Pegawai berhasil diupdate.');</script>";
				redirect(base_url('sys/daftar_pegawai'), 'refresh');
			}		
	}

	function hapus_pegawai(){
		$id					= 	$this->uri->segment(3);
		$this->Web_model->hapus_pegawai($id);
		redirect(base_url('sys/daftar_pegawai'), 'refresh');
	}

	public function data_bagian_kerja(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Data Bidang Kerja | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['kode_bagian']	= 	$this->Web_model->kode_bagian();
			$data['bagian']			= 	$this->Web_model->bagian();
			$data['content']		= 	'data_bagian_kerja';
			$this->load->view('templete',$data);
	}

	function submit_bagian(){	
		$data 					=	array();
		$data['id_bdkerja']		= 	$this->input->post('id_bdkerja');
		$data['nama_bdkerja']	= 	$this->input->post('nama_bdkerja');
		$data['urut']			= 	$this->input->post('urut');
		$this->form_validation->set_rules('id_bdkerja','id bdkerja','required');
		$this->form_validation->set_rules('nama_bdkerja','nama bagian','required');
		if($this->form_validation->run() == FALSE){
			$this->data_bagian_kerja();
		}
		else{
			$this->Web_model->input_bagian($data);
			redirect(base_url('sys/data_bagian_kerja'), 'refresh');
		}
    }

	public function edit_bagian(){		
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Edit Data Bidang Kerja | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['bagian']			= 	$this->Web_model->bagian();
			$id						= 	$this->uri->segment(3);
			$data['edit']			= 	$this->Web_model->edit_bagian($id);
			$data['content']		= 	'edit_bagian';
			$this->load->view('templete',$data);
	}
	function update_bagian(){
		$data 					=	array();
		$id						= 	$this->input->post('id_bdkerja');
		$data['nama_bdkerja']	= 	$this->input->post('nama_bdkerja');
		$this->form_validation->set_rules('id_bdkerja','id bdkerja','required');
		$this->form_validation->set_rules('nama_bdkerja','nama bagian','required');
		if($this->form_validation->run() == FALSE){
			$this->edit_bagian();
		}
		else{
			$this->Web_model->update_bagian($data,$id);
			redirect(base_url('sys/data_bagian_kerja'), 'refresh');
		}
    }
	function hapus_bagian(){
		$id						= 	$this->uri->segment(3);
		$this->Web_model->hapus_bagian($id);
		redirect(base_url('sys/data_bagian_kerja'), 'refresh');
	}	

	public function pengguna(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Edit Pegawai | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$id_pengguna			= 	$this->uri->segment(3);
			$data['v_t']			= 	$this->Web_model->valid_t($id_pengguna);
			$data['v_e']			= 	$this->Web_model->valid_e($id_pengguna);
			$data['pegawai']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['tacit']			= 	$this->Web_model->data_tacit_validasi($id_pengguna);
			$data['explicit']		= 	$this->Web_model->data_explicit_validasi($id_pengguna);
			$data['content']		= 	'pengguna';
			$this->load->view('templete',$data);
	}

	function logout(){
		$this->session->unset_userdata('login');
		redirect(base_url('sys'),'refresh');
	}

	public function input_masalah_solusi(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Input Case & Solusi | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['content']		= 	'input_pengetahuan_tacit';
			$this->load->view('templete',$data);
	}

	function submit_masalah_solusi(){	
		$data 							=	array();
		$config['upload_path'] 			= 	'./lampiran/tacit/';
		$config['allowed_types'] 		= 	'doc|docx|xls|xlsx|ppt|pptx|pdf';
		$config['max_size']				= 	'900000000000000';
		$config['remove_spaces']  		= 	FALSE;
		$this->load->library('upload', $config);
		if(empty($_FILES['userfile']['name'])){
			$data 						=	array();
			$data['id_pengguna']		= 	$this->session->userdata('id_pengguna');
			$data['judul_tacit']		= 	$this->input->post('judul_tacit');
			$data['masalah']			= 	$this->input->post('masalah');
			$data['solusi']				= 	$this->input->post('solusi');
			$data['tgl_post']			= 	gmdate('Y-m-d G:i:s', time()+60*60*7);
			$data['bulan']				= 	gmdate('m', time()+60*60*7);
			$data['tahun']				= 	gmdate('Y', time()+60*60*7);
			$this->form_validation->set_rules('judul_tacit','Judul','required');
			$this->form_validation->set_rules('masalah','Masalah','required');
			$this->form_validation->set_rules('solusi','Solusi','required');
			if($this->form_validation->run() == FALSE){
				$this->input_masalah_solusi();
			}
			else{	
				$this->Web_model->input_masalah_solusi($data);
				echo "<script> alert('Data Case dan Solusi Berhasil disimpan.');</script>";
				redirect(base_url('sys/lihat_masalah_solusi'), 'refresh');
			}
		}
		else{
			if(!$this->upload->do_upload()){
				echo $config['upload_path'];
				echo $this->upload->display_errors();
			}
			else {
				$data 						=	array();
				$data['id_pengguna']		= 	$this->session->userdata('id_pengguna');
				$data['judul_tacit']		= 	$this->input->post('judul_tacit');
				$data['masalah']			= 	$this->input->post('masalah');
				$data['solusi']				= 	$this->input->post('solusi');
				$data['tgl_post']			= 	gmdate('Y-m-d G:i:s', time()+60*60*7);
				$data['bulan']				= 	gmdate('m', time()+60*60*7);
				$data['tahun']				= 	gmdate('Y', time()+60*60*7);
				$data['userfile']			= 	$_FILES['userfile']['name'];
				$this->form_validation->set_rules('judul_tacit','Judul','required');
				$this->form_validation->set_rules('masalah','Masalah','required');
				$this->form_validation->set_rules('solusi','Solusi','required');
				if($this->form_validation->run() == FALSE){
					$this->input_masalah_solusi();
				}
				else{
					$this->Web_model->input_masalah_solusi($data);
					echo "<script> alert('Data Case dan Solusi Berhasil disimpan.');</script>";
					redirect(base_url('sys/lihat_masalah_solusi'), 'refresh');
				}
			}
		}
    }

    function data_masalah_solusi(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Data Case & Solusi | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['tacit']	 		= 	$this->Web_model->daftar_data_tacit();
			$data['content']		= 	'tacit_data';
			$this->load->view('templete',$data);
    }

    function validasi_masalah_solusi(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Validasi Case & Solusi | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['tacit']	 		= 	$this->Web_model->validasi_tacit();
			$data['content']		= 	'daftar_pengetahuan_tacit';
			$this->load->view('templete',$data);
    }

	function validasi_tacit(){
		$id							= 	$this->uri->segment(3);
		$id_pengguna				= 	$this->uri->segment(4);
		$data['validasi_tacit']		= 	"1";
		$this->Web_model->tacit_validasi($data,$id);
		$lihat_poin					= 	$this->Web_model->lihat_poin($id_pengguna);
		foreach($lihat_poin->result_array() as $l){
			$poin					= $l['poin'];
		}
		$p['poin']					= 	$poin+10;
		$this->Web_model->update_poin($p,$id_pengguna);
		$s['id_penerima']			= 	$id_pengguna;
		$s['id_posting']			= 	$id;
		$s['kategori']				= 	"v_tacit";
		$s['tgl_notif']				= 	gmdate('Y-m-d G:i:s', time()+60*60*7);
		$s['status']				= 	'N';
		$this->Web_model->input_notifikasi($s);
		redirect(base_url('sys/validasi_masalah_solusi'), 'refresh');
	}    

	public function lihat_masalah_solusi(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'View Case & Solusi | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['tacit']	 		= 	$this->Web_model->data_tacit($this->session->userdata('id_pengguna'));
			$data['content']		= 	'view_pengetahuan_tacit';
			$this->load->view('templete',$data);
	}

	public function detail_masalah_solusi(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Detail Case & Solusi | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$id						= 	$this->uri->segment(3);
			$data['detail']	 		= 	$this->Web_model->detail_masalah($id);
			$data['komentar'] 		= 	$this->Web_model->komentar_tacit($id);
			$data['cek_user']		= 	$this->Web_model->cek_user($id,$id_pengguna);
			$data['total_likes']	= 	$this->Web_model->total_like($id);
			$data['content']		= 	'detail_masalah_solusi';
			$this->load->view('templete',$data);
	}

	public function like(){
		$id							= 	$this->uri->segment(3);
		$total_likes				= 	$this->Web_model->total_like($id);
		foreach($total_likes->result_array() as $tl){
			$likes	= $tl['like'];
		}
		$data['like']				= 	$likes+1;
		$update_like				= 	$this->Web_model->update_like_tacit($data,$id);
		$d['id_tacit']				= 	$this->uri->segment(3);
		$d['id_pengguna']			= 	$this->session->userdata('id_pengguna');
		$d['tgl_like']				= 	gmdate('Y-m-d G:i:s', time()+60*60*7);
		$insert_like				= 	$this->Web_model->insert_like_tacit($d);
		
		$tacit_nama					= 	$this->Web_model->tacit_nama($id);
		foreach($tacit_nama->result_array() as $tn){
			$id_penerima	= 	$tn['id_pengguna'];
		}
		$s['id_pengguna']			= 	$this->session->userdata('id_pengguna');
		$s['id_penerima']			= 	$id_penerima;
		$s['id_posting']			= 	$this->uri->segment(3);
		$s['kategori']				= 	"like_t";
		$s['tgl_notif']				= 	gmdate('Y-m-d G:i:s', time()+60*60*7);
		$s['status']				= 	'N';
		$this->Web_model->input_notifikasi($s);

		$data['total_likes']= $this->Web_model->total_like($id);
		foreach($data['total_likes']->result_array() as $r){
			echo $likes	= $r['like'];
		}
	}
	public function unlike(){
		$id							= 	$this->uri->segment(3);
		$total_likes				= 	$this->Web_model->total_like($id);
		foreach($total_likes->result_array() as $tl){
			$likes	= 	$tl['like'];
		}
		$data['like']				= 	$likes-1;
		$update_like				= 	$this->Web_model->update_like_tacit($data,$id);
		$id							= 	$this->uri->segment(3);
		$id_pengguna				= 	$this->session->userdata('id_pengguna');
		$delete_like				= 	$this->Web_model->delete_like_tacit($id,$id_pengguna);
		
		$tacit_nama					= 	$this->Web_model->tacit_nama($id);
		foreach($tacit_nama->result_array() as $tn){
			$id_penerima	= 	$tn['id_pengguna'];
		}
		$id_pengguna				= 	$this->session->userdata('id_pengguna');
		$id_penerima				= 	$id_penerima;
		$id_posting					= 	$this->uri->segment(3);
		$kategori					= 	"like_e";
		$this->Web_model->delete_notifikasi($id_pengguna,$id_penerima,$id_posting,$kategori);
		
		$data['total_likes']		= 	$this->Web_model->total_like($id);
		foreach($data['total_likes']->result_array() as $r){
			echo $likes		= 	$r['like'];
		}		
	}
	

	public function edit_masalah_solusi(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Edit Case & Solusi | BNI Work Solution PT BNI KanWil Palembang';
			$id_tacit				= 	$this->uri->segment(3);
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['tacit']	 		= 	$this->Web_model->tacit($id_tacit,$id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['content']		= 	'edit_pengetahuan_tacit';
			$this->load->view('templete',$data);
	}

	function update_masalah_solusi(){
		$data 							=	array();
		$config['upload_path'] 			= 	'./lampiran/tacit/';
		$config['allowed_types'] 		= 	'doc|docx|xls|xlsx|ppt|pptx|pdf';
		$config['max_size']				= 	'2000';
		//$config['max_width']  		= 	'3000';
		//$config['max_height']  		= 	'4000';
		$config['remove_spaces']  		= 	FALSE;
		$this->load->library('upload', $config);
		if(empty($_FILES['userfile']['name'])){
			$data 						=	array();
			$data['id_pengguna']		= 	$this->session->userdata('id_pengguna');
			$id							= 	$this->input->post('id_tacit');
			$data['judul_tacit']		= 	$this->input->post('judul_tacit');
			$data['masalah']			= 	$this->input->post('masalah');
			$data['solusi']				= 	$this->input->post('solusi');
			//$data['tgl_post']			= 	gmdate('Y-m-d G:i:s', time()+60*60*7);
			$this->form_validation->set_rules('judul_tacit','Judul','required');
			$this->form_validation->set_rules('masalah','Masalah','required');
			$this->form_validation->set_rules('solusi','Solusi','required');
			if($this->form_validation->run() == FALSE){
				$this->edit_masalah_solusi();
			}
			else{
				$this->Web_model->update_masalah_solusi($data,$id);
				echo "<script> alert('Data Case dan Solusi Berhasil diupdate.');</script>";
				redirect(base_url('sys/lihat_masalah_solusi'), 'refresh');
			}
		}
		else{
			if(!$this->upload->do_upload()){
				echo $config['upload_path'];
				echo $this->upload->display_errors();
			}
			else {
				$data 						=	array();
				$data['id_pengguna']		= 	$this->session->userdata('id_pengguna');
				$id							= 	$this->input->post('id_tacit');
				$data['judul_tacit']		= 	$this->input->post('judul_tacit');
				$data['masalah']			= 	$this->input->post('masalah');
				$data['solusi']				= 	$this->input->post('solusi');
				//$data['tgl_post']			= 	gmdate('Y-m-d G:i:s', time()+60*60*7);
				$data['userfile']			= 	$_FILES['userfile']['name'];
				$this->form_validation->set_rules('judul_tacit','Judul','required');
				$this->form_validation->set_rules('masalah','Masalah','required');
				$this->form_validation->set_rules('solusi','Solusi','required');
				if($this->form_validation->run() == FALSE){
					$this->edit_masalah_solusi();
				}
				else{
					$this->Web_model->update_masalah_solusi($data,$id);
					echo "<script> alert('Data Case dan Solusi Berhasil diupdate.');</script>";
					redirect(base_url('sys/lihat_masalah_solusi'), 'refresh');
				}
			}
		}		
	}

	function hapus_masalah_solusi(){
		$id_tacit					= 	$this->uri->segment(3);
		$this->Web_model->hapus_tacit($id_tacit);
		redirect(base_url('sys/lihat_masalah_solusi'), 'refresh');
	}	

	function submit_komentar_tacit(){
		$data 							=	array();
		$data['id_tacit']				= 	$this->input->post('id_tacit');
		$data['isi_komentar_tacit']		= 	$this->input->post('isi_komentar_tacit');
		$data['id_pengguna']			= 	$this->session->userdata('id_pengguna');
		$data['tgl_komentar']			= 	gmdate('Y-m-d G:i:s', time()+60*60*7);
		$this->Web_model->input_komentar_tacit($data);
		$s['id_pengguna']				= 	$this->session->userdata('id_pengguna');
		$s['id_penerima']				= 	$this->input->post('id_penerima');
		$s['id_posting']				= 	$this->input->post('id_tacit');
		$s['kategori']					= 	"tacit";
		$s['tgl_notif']					= 	gmdate('Y-m-d G:i:s', time()+60*60*7);
		$s['status']					= 	'N';
		$this->Web_model->input_notifikasi($s);
		?>
		<script>window.location="detail_masalah_solusi/<?php echo $data['id_tacit'];?>";</script>;
		<?php
    }

	function hapus_komentar_tacit(){
		$id							= $this->input->post('id_komentar_tacit');
		$data['id_tacit']			= $this->input->post('id_tacit');
		$this->Web_model->hapus_komentar_tacit($id);
		?>
		<script>window.location="detail_masalah_solusi/<?php echo $data['id_tacit'];?>";</script>;
		<?php
	}

	public function input_dokumen(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Input Dokumen | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['content']		= 	'input_pengetahuan_explicit';
			$this->load->view('templete',$data);
	}

	function submit_dokumen(){
		$config['upload_path'] 			= 	'./lampiran/explicit';
		$config['allowed_types'] 		= 	'doc|docx|xls|xlsx|ppt|pptx|pdf';
		$config['max_size']				= 	'900000000000000000000000000000000000';
		$config['remove_spaces']  		= 	FALSE;
		$this->load->library('upload', $config);
		if(empty($_FILES['userfile']['name'])){
			$data 						=	array();
			$data['id_pengguna']		= 	$this->session->userdata('id_pengguna');
			$data['judul_explicit']		= 	$this->input->post('judul_explicit');
			$data['keterangan']			= 	$this->input->post('keterangan');
			$data['tgl_post']			= 	gmdate('Y-m-d G:i:s', time()+60*60*7);
			$data['bulan']				= 	gmdate('m', time()+60*60*7);
			$data['tahun']				= 	gmdate('Y', time()+60*60*7);
			$this->form_validation->set_rules('judul_explicit','judul','required');
			$this->form_validation->set_rules('keterangan','keterangan','required');
			if($this->form_validation->run() == FALSE){
				$this->input_dokumen();
			}
			else{
				$this->Web_model->input_dokumen($data);
				echo "<script> alert('Data Dokumen Berhasil disimpan.');</script>";
				redirect(base_url('sys/view_dokumen'), 'refresh');
			}			
		}
		else{
			if(!$this->upload->do_upload()){
				echo $config['upload_path'];
				echo $this->upload->display_errors();
			}
			else {
				$data 						=	array();
				$data['id_pengguna']		= 	$this->session->userdata('id_pengguna');
				$data['judul_explicit']		= 	$this->input->post('judul_explicit');
				$data['keterangan']			= 	$this->input->post('keterangan');
				$data['tgl_post']			= 	gmdate('Y-m-d G:i:s', time()+60*60*7);
				$data['bulan']				= 	gmdate('m', time()+60*60*7);
				$data['tahun']				= 	gmdate('Y', time()+60*60*7);
				$data['userfile']			= 	$_FILES['userfile']['name'];
				$this->form_validation->set_rules('judul_explicit','judul','required');
				$this->form_validation->set_rules('keterangan','keterangan','required');
				if($this->form_validation->run() == FALSE){
					$this->input_dokumen();
				}
				else{
					$this->Web_model->input_dokumen($data);
					echo "<script> alert('Data Dokumen Berhasil disimpan.');</script>";
					redirect(base_url('sys/view_dokumen'), 'refresh');
				}
			}
		}
    }

	public function data_dokumen(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Lihat Dokumen | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['explicit'] 		= 	$this->Web_model->daftar_data_explicit();
			$data['content']		= 	'daftar_pengetahuan_explicit';
			$this->load->view('templete',$data);
	}

	public function validasi_dokumen(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Validasi Dokumen | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['explicit'] 		= 	$this->Web_model->validasi_explicit();
			$data['content']		= 	'daftar_dokumen';
			$this->load->view('templete',$data);
	}
	function validasi_explicit(){
		$id							= 	$this->uri->segment(3);
		$id_pengguna				= 	$this->uri->segment(4);
		$data['validasi_explicit']	= 	"1";
		$this->Web_model->explicit_validasi($data,$id);
		$lihat_poin					= 	$this->Web_model->lihat_poin($id_pengguna);
		foreach($lihat_poin->result_array() as $l){
		$poin	= 	$l['poin'];
		}
		$p['poin']					= 	$poin+10;
		$this->Web_model->update_poin($p,$id_pengguna);
		$s['id_penerima']			= 	$id_pengguna;
		$s['id_posting']			= 	$id;
		$s['kategori']				= 	"v_explicit";
		$s['tgl_notif']				= 	gmdate('Y-m-d G:i:s', time()+60*60*7);
		$s['status']				= 	'N';
		$this->Web_model->input_notifikasi($s);
		redirect(base_url('sys/validasi_dokumen'), 'refresh');
	}	

	public function view_dokumen(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'View Dokumen | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['explicit'] 		= 	$this->Web_model->data_explicit($this->session->userdata('id_pengguna'));
			$data['content']		= 	'view_pengetahuan_explicit';
			$this->load->view('templete',$data);
	}

	public function detail_dokumen(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Detail Dokumen | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$id						= 	$this->uri->segment(3);
			$data['detail']	 		= 	$this->Web_model->detail_dokumen($id);
			$data['komentar'] 		= 	$this->Web_model->komentar_explicit($id);
			$data['cek_user']		= 	$this->Web_model->cek_user_e($id,$id_pengguna);
			$data['total_likes']	= 	$this->Web_model->total_like_e($id);
			$data['content']		= 	'detail_dokumen';
			$this->load->view('templete',$data);
	}

	public function like_e(){
		$id							= 	$this->uri->segment(3);
		$total_likes				= 	$this->Web_model->total_like_e($id);
		foreach($total_likes->result_array() as $tl){
			$likes	= 	$tl['like'];
		}
		$data['like']				= 	$likes+1;
		$update_like				= 	$this->Web_model->update_like_explicit($data,$id);
		$d['id_explicit']			= 	$this->uri->segment(3);
		$d['id_pengguna']			= 	$this->session->userdata('id_pengguna');
		$d['tgl_like']				= 	gmdate('Y-m-d G:i:s', time()+60*60*7);
		$insert_like				= 	$this->Web_model->insert_like_explicit($d);
		
		$explicit_nama				= 	$this->Web_model->explicit_nama($id);
		foreach($explicit_nama->result_array() as $en){
			$id_penerima		= 	$en['id_pengguna'];
		}
		$s['id_pengguna']			= 	$this->session->userdata('id_pengguna');
		$s['id_penerima']			= 	$id_penerima;
		$s['id_posting']			= 	$this->uri->segment(3);
		$s['kategori']				= 	"like_e";
		$s['tgl_notif']				= 	gmdate('Y-m-d G:i:s', time()+60*60*7);
		$s['status']				= 	'N';
		$this->Web_model->input_notifikasi($s);
		
		$data['total_likes']		= 	$this->Web_model->total_like_e($id);
		foreach($data['total_likes']->result_array() as $r){
			echo $likes	= $r['like'];
		}
	}

	public function unlike_e(){
		$id							= 	$this->uri->segment(3);
		$total_likes				= 	$this->Web_model->total_like_e($id);
		foreach($total_likes->result_array() as $tl){
			$likes	= 	$tl['like'];
		}
		$data['like']				= 	$likes-1;
		$update_like				= 	$this->Web_model->update_like_explicit($data,$id);
		$id							= 	$this->uri->segment(3);
		$id_pengguna				= 	$this->session->userdata('id_pengguna');
		$delete_like				= 	$this->Web_model->delete_like_explicit($id,$id_pengguna);
		
		$explicit_nama				= 	$this->Web_model->explicit_nama($id);
		foreach($explicit_nama->result_array() as $en){
			$id_penerima	= 	$en['id_pengguna'];
		}
		$id_pengguna				= 	$this->session->userdata('id_pengguna');
		$id_penerima				= 	$id_penerima;
		$id_posting					= 	$this->uri->segment(3);
		$kategori					= 	"like_e";
		$this->Web_model->delete_notifikasi($id_pengguna,$id_penerima,$id_posting,$kategori);
		
		$data['total_likes'] 		= 	$this->Web_model->total_like_e($id);
		foreach($data['total_likes']->result_array() as $r){
			echo $likes	= $r['like'];
		}
	}	

	public function edit_dokumen(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Edit Dokumen | BNI Work Solution PT BNI KanWil Palembang';
			$id_explicit			= 	$this->uri->segment(3);
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['explicit'] 		= 	$this->Web_model->explicit($id_explicit,$id_pengguna);
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['content']		= 	'edit_pengetahuan_explicit';
			$this->load->view('templete',$data);
	}

	function update_dokumen(){	
		$data 							=	array();
		$config['upload_path'] 			= 	'./lampiran/explicit/';
		$config['allowed_types'] 		= 	'doc|docx|xls|xlsx|ppt|pptx|pfd';
		$config['max_size']				= 	'2000';
		$config['remove_spaces']  		= 	FALSE;
		$this->load->library('upload', $config);
		if(empty($_FILES['userfile']['name'])){
			$data 						=	array();
			$data['id_pengguna']		= 	$this->session->userdata('id_pengguna');
			$id							= 	$this->input->post('id_explicit');
			$data['judul_explicit']		= 	$this->input->post('judul_explicit');
			$data['keterangan']			= 	$this->input->post('keterangan');
			//$data['tgl_post']			= 	gmdate('Y-m-d G:i:s', time()+60*60*7);
			$this->form_validation->set_rules('judul_explicit','judul','required');
			$this->form_validation->set_rules('keterangan','keterangan','required');
			if($this->form_validation->run() == FALSE){
				$this->edit_dokumen();
			}
			else{
				$this->Web_model->update_dokumen($data,$id);
				echo "<script> alert('Data Dokumen diupdate.');</script>";
				redirect(base_url('sys/view_dokumen'), 'refresh');
			}
		}
		else{
			if(!$this->upload->do_upload()){
				echo $config['upload_path'];
				echo $this->upload->display_errors();
			}
			else {
				$data 						=	array();
				$data['id_pengguna']		= 	$this->session->userdata('id_pengguna');
				$id							= 	$this->input->post('id_explicit');
				$data['judul_explicit']		= 	$this->input->post('judul_explicit');
				$data['keterangan']			= 	$this->input->post('keterangan');
				$data['tgl_post']			= 	gmdate('Y-m-d G:i:s', time()+60*60*7);
				$data['userfile']			= 	$_FILES['userfile']['name'];
				$this->form_validation->set_rules('judul_explicit','judul','required');
				$this->form_validation->set_rules('keterangan','keterangan','required');
				if($this->form_validation->run() == FALSE){
					$this->edit_dokumen();
				}
				else{
					$this->Web_model->update_dokumen($data,$id);
					echo "<script> alert('Data Dokumen diupdate.');</script>";
					redirect(base_url('sys/view_dokumen'), 'refresh');
				}
			}
		}
    }

	function hapus_dokumen(){
		$id_explicit			= 	$this->uri->segment(3);
		$this->Web_model->hapus_dokumen($id_explicit);
		redirect(base_url('sys/view_dokumen'), 'refresh');
	}

	function submit_komentar_explicit(){	
		$data 							=	array();
		$data['id_explicit']			= 	$this->input->post('id_explicit');
		$data['isi_komentar_explicit']	= 	$this->input->post('isi_komentar_explicit');
		$data['id_pengguna']			= 	$this->session->userdata('id_pengguna');
		$data['tgl_komentar']			= 	gmdate('Y-m-d G:i:s', time()+60*60*7);
		$this->Web_model->input_komentar_explicit($data);
		$s['id_pengguna']				= 	$this->session->userdata('id_pengguna');
		$s['id_penerima']				= 	$this->input->post('id_penerima');
		$s['id_posting']				= 	$this->input->post('id_explicit');
		$s['kategori']					= 	"explicit";
		$s['tgl_notif']					= 	gmdate('Y-m-d G:i:s', time()+60*60*7);
		$s['status']					= 	'N';
		$this->Web_model->input_notifikasi($s);
		?>
		<script>window.location="detail_dokumen/<?php echo $data['id_explicit'];?>";</script>;
		<?php
    }

	function hapus_komentar_explicit(){
		$id								= $this->input->post('id_komentar_explicit');
		$data['id_explicit']			= $this->input->post('id_explicit');
		$this->Web_model->hapus_komentar_explicit($id);
		?>
		<script>window.location="detail_dokumen/<?php echo $data['id_explicit'];?>";</script>;
		<?php
	}

	public function posting_disukai(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Posting Disukai | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= $this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= $this->Web_model->notif($id_pengguna);
			$data['valid_t']		= $this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= $this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= $this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= $this->Web_model->nvalid_e($id_pengguna);
			$data['tacit']	 		= $this->Web_model->tacit_like($id_pengguna);
			$data['explicit'] 		= $this->Web_model->like_explicit($id_pengguna);
			$data['content']		= 'posting_disukai';
			$this->load->view('templete',$data);
	}

	public function kandidat_reward(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Kandidat Reward | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['kandidat'] 		= 	$this->Web_model->kandidat_reward();
			$data['content']		= 	'kandidat_reward';
			$this->load->view('templete',$data);
	}

	public function input_reward(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Tambah Reward Pengguna | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$id_pengguna			= 	$this->uri->segment(3);
			$data['data_pengguna']	= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['content']		= 	'input_reward';
			$this->load->view('templete',$data);
	}

	function tambah_reward(){	
		$data 						=	array();
		$id_pengguna				= 	$this->input->post('id_pengguna');
		$data['id_pengguna']		= 	$this->input->post('id_pengguna');
		$data['reward']				= 	$this->input->post('reward');
		$data['keterangan_reward']	= 	$this->input->post('keterangan_reward');
		$data['tgl_reward']			= 	gmdate('Y-m-d G:i:s', time()+60*60*7);
		$this->form_validation->set_rules('reward','reward','required');
		$this->form_validation->set_rules('keterangan_reward','keterangan reward','required');
		if($this->form_validation->run() == FALSE){
			$this->input_reward();
		}
		else{
			$this->Web_model->input_reward($data);
			$lihat_poin				= 	$this->Web_model->lihat_poin($id_pengguna);
			foreach($lihat_poin->result_array() as $l){
				$poin	= 	$l['poin'];
			}
			$p['poin']				= 	$poin-10;
			$this->Web_model->update_poin($p,$id_pengguna);
			$s['id_penerima']		= 	$id_pengguna;
			$s['kategori']			= 	"reward";
			$s['tgl_notif']			= 	gmdate('Y-m-d G:i:s', time()+60*60*7);
			$s['status']			= 	'N';
			$this->Web_model->input_notifikasi($s);
			redirect(base_url('sys/kandidat_reward'), 'refresh');
		}
    }	

	public function penerima_reward(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Penerima Reward | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['reward'] 		= 	$this->Web_model->penerima_reward();
			$data['content']		= 	'penerima_reward';
			$this->load->view('templete',$data);
	}

	public function my_reward(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Reward Pengguna | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['reward'] 		= 	$this->Web_model->my_reward($id_pengguna);
			$data['content']		= 	'my_reward';
			$this->load->view('templete',$data);
	}


	public function semua_notifikasi(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Semua Notifikasi | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['pegawai']		= 	$this->Web_model->daftar_pegawai();
			$data['content']		= 	'semua_notifikasi';
			$this->load->view('templete',$data);
	}

	function update_notif(){
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$this->Web_model->update_notif($id_pengguna);
	}

	public function cek_validasi(){
		$cek_t						= 	$this->Web_model->cek_validasi_t();
		$cek_e						= 	$this->Web_model->cek_validasi_e();
		foreach($cek_t->result_array() as $j){
			if($j['jml']	!=	0){
				$tacit 	=	$j['jml'];
			}
		}
		foreach($cek_e->result_array() as $k){
			if($k['jml'] 	!=	0){
				$explicit 	= 	$k['jml'];
			} 
		}
		@$hasil 	=	$tacit + $explicit;
		if($hasil 	!=	'0'){
			echo $hasil;
		}
	}

	public function cek_validasi_t(){
		$cek_t						= 	$this->Web_model->cek_validasi_t();
		foreach($cek_t->result_array() as $j){
			if($j['jml']	!=	0){
				echo $tacit		= 	$j['jml'];
			} 
		}
	}
	public function cek_validasi_e(){
		$cek_e						= 	$this->Web_model->cek_validasi_e();
		foreach($cek_e->result_array() as $k){
			if($k['jml']	!=	0){
				echo $explicit 	= 	$k['jml'];
			}
		}
	}
	
	public function cek_notif(){
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['cek']			= 	$this->Web_model->cek($id_pengguna);
			$this->load->view('templete',$data);
	}
	public function cek_revisi(){
		$cek 						=	$this->Web_model->cek_revisi();
		foreach($cek->result_array() as $c){
			if($c['jml']	!=	0){
				echo $revisi 	= 	$c['jml'];
			} 
		}
	}

/* this is Code Controller of Item for CBR METHOD */

	public function data_gejala(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Data Gejala | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['kode_gejala']	= 	$this->Web_model->kode_gejala();
			$data['gejala']			= 	$this->Web_model->gejala();
			$data['bagian']			= 	$this->Web_model->bagian();
			$data['content']		= 	'data_gejala';
			$this->load->view('templete',$data);
	}

	function submit_gejala(){	
		$data 					=	array();
		$data['id_gejala']		= 	$this->input->post('id_gejala');
		$data['nama_gejala']	= 	$this->input->post('nama_gejala');
		$data['urut']			= 	$this->input->post('urut');
		$data['bobot_gejala']	= 	$this->input->post('bobot_gejala');
		$data['id_bdkerja']		= 	$this->input->post('id_bdkerja');
		$this->form_validation->set_rules('id_gejala','id gejala','required');
		$this->form_validation->set_rules('nama_gejala','nama gejala','required');
		$this->form_validation->set_rules('id_bdkerja','id bdkerja','required');
		if($this->form_validation->run() == FALSE){
			$this->data_gejala();
		}
		else{
			$this->Web_model->input_gejala($data);
			redirect(base_url('sys/data_gejala'), 'refresh');
		}
    }

	public function edit_gejala(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Edit Data Gejala | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['gejala']			= 	$this->Web_model->gejala();
			$id						= 	$this->uri->segment(3);
			$data['edit']			= 	$this->Web_model->edit_gejala($id);
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['bagian']			= 	$this->Web_model->bagian();			
			$data['content']		= 	'edit_gejala';
			$this->load->view('templete',$data);
	}

	function update_gejala(){	
		$data 						=	array();
		$id							= 	$this->input->post('id_gejala');
		$data['nama_gejala']		= 	$this->input->post('nama_gejala');
		$data['bobot_gejala']		= 	$this->input->post('bobot_gejala');
		$data['id_bdkerja']			= 	$this->input->post('id_bdkerja');
		$this->form_validation->set_rules('id_gejala','id gejala','required');
		$this->form_validation->set_rules('nama_gejala','nama gejala','required');
		$this->form_validation->set_rules('id_bdkerja','id bdkerja','required');
		if($this->form_validation->run() == FALSE){
			$this->edit_gejala();
		}
		else{
			$this->Web_model->update_gejala($data,$id);
			redirect(base_url('sys/data_gejala'), 'refresh');
		}
    }

	function hapus_gejala(){
		$id						= $this->uri->segment(3);
		$this->Web_model->hapus_gejala($id);
		redirect(base_url('sys/data_gejala'), 'refresh');
	}

	function tambah_gejala(){
		$rows['id_solusi']			= 	$this->input->post('id_solusi');
		$rows['id_gejala']			= 	$this->input->post('id_gejala');
		$this->Web_model->input_kasus($rows);
		?>
		<script>window.location="edit_solusi/<?php echo $rows['id_solusi'];?>";</script>;
		<?php
	}

	function delete_gejala(){
		$id_solusi					= 	$this->input->post('id_solusi');
		$id_gejala					= 	$this->input->post('id_gejala');
		$this->Web_model->delete_gejala($id_solusi,$id_gejala);
		?>
		<script>window.location="edit_solusi/<?php echo $id_solusi;?>";</script>;
		<?php
	}

	public function data_kasus(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Data Kasus | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['kode_kasus']		= 	$this->Web_model->kode_kasus();
			$data['gejala']			= 	$this->Web_model->daftar_gejala();
			$data['kasus']			= 	$this->Web_model->daftar_kasus1();
			$data['gejala_masalah']	= 	$this->Web_model->gejala_masalah();
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['riwayat']		= 	$this->Web_model->riwayat();
			$data['content']		= 	'data_kasus';
			$this->load->view('templete',$data);
	}
	function submit_kasus(){
		$data 					=	array();
		$data['id_solusi']		= 	$this->input->post('id_solusi');
		$data['nama_solusi']	= 	$this->input->post('nama_solusi');
		$data['solusi_masalah']	= 	$this->input->post('solusi_masalah');
		$data['urut']			= 	$this->input->post('urut');
		$this->form_validation->set_rules('nama_solusi','masalah','required');
		$this->form_validation->set_rules('solusi_masalah','solusi masalah','required');
		if($this->form_validation->run() == FALSE){
			$this->data_kasus();
		}
		else{
			$this->Web_model->input_solusi($data);
			foreach($_POST['inp'] as $rows){
				$this->Web_model->input_kasus($rows);
			}
			echo "<script> alert('Data kasus berhasil disimpan');</script>";
			redirect(base_url('sys/data_kasus'), 'refresh');
		}
    }

	public function edit_solusi(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Edit Data Solusi | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$id						= 	$this->uri->segment(3);
			$data['gejala']			= 	$this->Web_model->daftar_gejala();
			$data['solusi']	 		= 	$this->Web_model->edit_solusi($id);
			$data['gejala_masalah']	= 	$this->Web_model->gejala_masalah();
			$data['content']		= 	'edit_solusi';
			$this->load->view('templete',$data);
	}

	function update_solusi(){
		$id						= 	$this->input->post('id_solusi');
		$data['nama_solusi']	= 	$this->input->post('nama_solusi');
		$data['solusi_masalah']	= 	$this->input->post('solusi_masalah');
		$this->Web_model->update_solusi($data,$id);
		echo "<script> alert('Data Solusi berhasil diupdate.');</script>";
		redirect(base_url('sys/data_kasus'), 'refresh');
	}

	function hapus_solusi(){
		$id					= 	$this->uri->segment(3);
		$this->Web_model->hapus_solusi($id);
		echo "<script> alert('Data Solusi berhasil dihapus.');</script>";
		redirect(base_url('sys/data_kasus'), 'refresh');
	}

/* The Main Controller CBR Method */
	public function problem_solving(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Solve The Problem | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['gejala']			= 	$this->Web_model->daftar_gejala();
			$data['content']		= 	'problem_solving';
			$this->load->view('templete',$data);
	}

/* Four phase of Case Based Reasoning */

	function cari_solusi(){
		$id_pengguna				= 	$this->session->userdata('id_pengguna');
		$this->Web_model->reset_gejala($id_pengguna);
		$this->Web_model->reset_solusi($id_pengguna);
	
	//	PHASE 1 = RETRIEVE
		//	1. Identifikasi fitur
		foreach($_POST['inp'] as $rows){
			$rows['id_pengguna']	= 	$this->session->userdata('id_pengguna');
			$this->Web_model->cari_solusi($rows);
		}
		
		$kasus						= 	$this->Web_model->kasus_cari();		//solusi
		$tmp_gejala					= 	$this->Web_model->tmp_gejala($id_pengguna);
		$h_tmp_gejala				= 	$this->Web_model->hitung_tmp_gejala($id_pengguna);
		$perbandingan				= 	$this->Web_model->perbandingan();	//Kasus Gejala
		$hitung_gejala				= 	$this->Web_model->hitung_gejala();	//Kasus Gejala
		
		//	2. Memulai Pencocokan
		$s 	=	0;
		foreach ($tmp_gejala->result_array() as $t) {
			$bobot 	=	$t['bobot_gejala'];
			$s 	= 	$s + $bobot; 	// Total bobot identifikasi fitur
		}
		
		foreach($kasus->result_array() as $k) { 	// Daftar kasus tersimpan dalam database
			foreach($hitung_gejala->result_array() as $hg)
			if($k['id_solusi'] == $hg['id_solusi']){
				$h_gejala 	= 	$hg['jml'];
			}

			$pe = 0;
			foreach($tmp_gejala->result_array() as $t) {	// Gejala identifikasi fitur
				foreach($h_tmp_gejala->result_array() as $ht){
					$h_fitur	= 	$ht['jml'];
				}

				foreach($perbandingan->result_array() as $p) 	// Pencocokan gejala
				if($p['id_solusi'] == $k['id_solusi'] && $t['id_gejala'] == $p['id_gejala']){	
					$b 	= 	$p['bobot_gejala'];
					echo "<br/>";
					$pe = $pe + $b;
				}
			}

			$h['id_solusi']			= 	$k['id_solusi'];
			$similarity 			=	$pe / $s; 	// Rumus Similarity
			$h['nilai']				= 	$similarity;
			$h['jumlah_gejala']		= 	$h_gejala;
			$h['jumlah_fitur']		= 	$h_fitur;
			$h['selisih']			= 	abs($h_gejala - $h_fitur);
			$h['id_pengguna']		= 	$id_pengguna;
			$this->Web_model->input_nilai($h);
		}

	//PHASE 2 = REUSE
		$nilai_similarity			= 	$this->Web_model->solusi_kasus($id_pengguna);
		foreach($nilai_similarity->result_array() as $n){
			$n_similarity			= 	$n['nilai'];
			$kd_solusi				= 	$n['id_solusi'];
			$selisih				= 	$n['selisih'];	
		}

	//TAHAP 3 = REVISE	
		//jika nilai similarity 1 tetapi gejala tidak sama	
		if(($n_similarity == 1) && ($selisih != 0)){
			
			//membuat kode solusi untuk revise
			$kode_kasus				= 	$this->Web_model->kode_kasus();
			foreach($kode_kasus->result_array() as $rows){
				$no = @$rows['urut'] + 1;
				if(strlen($no) == '1'){
				  	$kd_solusi = "S00".$no;
				}
					elseif(strlen($no) == '2'){
				  		$kd_solusi = "S0".$no;
					}
						elseif(strlen($no) == '3'){
				  			$kd_solusi = "S".$no;
						}
			}

			$data['solusi']			= 	$this->Web_model->solusi_problem($id_pengguna);
			foreach($data['solusi']->result_array() as $solusi1){
				$r['id_solusi']		= 	$kd_solusi;
				$r['nama_solusi']	= 	$solusi1['nama_solusi'];
				$r['solusi_masalah']= 	$solusi1['solusi_masalah'];
				$r['validasi']		= 	1;
				$r['urut']			= 	$no;
				$this->Web_model->input_kasus_revise($r);	// Input DB Solusi Revise 
			}

			$data['tmp_gejala']		= 	$this->Web_model->tmp_gejala($id_pengguna);
			foreach($data['tmp_gejala']->result_array() as $gm){
				$g['id_gejala']		= 	$gm['id_gejala'];
				$g['id_solusi']		= 	$kd_solusi;
				$this->Web_model->input_gejala_revise($g);	// Input DB Solusi Revise
			}
		}

		//jika nilai similarity antara 0,70 sampai 1
		if($n_similarity >= 0.70 && $n_similarity < 1) {
			//membuat kode solusi untuk revise
			$kode_kasus				= 	$this->Web_model->kode_kasus();
			foreach($kode_kasus->result_array() as $rows){
				$no = @$rows['urut'] + 1;
				if(strlen($no) == '1'){
				  	$kd_solusi = "S00".$no;
				}
					elseif(strlen($no) == '2'){
				  		$kd_solusi = "S0".$no;
					}
						elseif(strlen($no) == '3'){
				  			$kd_solusi = "S".$no;
						}
			}

			$data['solusi']			= 	$this->Web_model->solusi_problem($id_pengguna);
			foreach($data['solusi']->result_array() as $solusi1){
				$r['id_solusi']		= 	$kd_solusi;
				$r['nama_solusi']	= 	$solusi1['nama_solusi'];
				$r['solusi_masalah']= 	$solusi1['solusi_masalah'];
				$r['validasi']		= 	1;
				$r['urut']			= 	$no;
				$this->Web_model->input_kasus_revise($r);	// Input DB Solusi Revise
			}

			$data['tmp_gejala']		= 	$this->Web_model->tmp_gejala($id_pengguna);
			foreach($data['tmp_gejala']->result_array() as $gm){
				$g['id_gejala']		= 	$gm['id_gejala'];
				$g['id_solusi']		= 	$kd_solusi;
				$this->Web_model->input_gejala_revise($g);	// Input DB Solusi Revise
			}
		}

		//jika nilai similarity dibawah 0.70
		if($n_similarity <0.70){
			//membuat kode solusi untuk revise
			$kode_kasus				= 	$this->Web_model->kode_kasus();
			foreach($kode_kasus->result_array() as $rows){
				$no = @$rows['urut'] + 1;
				if(strlen($no) == '1'){
				  	$kd_solusi = "S00".$no;
				}
					elseif(strlen($no) == '2'){
				  		$kd_solusi = "S0".$no;
					}
						elseif(strlen($no) == '3'){
				  			$kd_solusi = "S".$no;
						}
			}
			$r['id_solusi']			= 	$kd_solusi;
			$r['nama_solusi']		= 	"Kasus belum ada di database";
			$r['solusi_masalah']	= 	"Rekomendasi solusi belum tersedia";
			$r['validasi']			= 	1;
			$r['urut']				= 	$no;
			$this->Web_model->input_kasus_revise($r);	// Input DB Solusi Revise
			
			$data['tmp_gejala']		= 	$this->Web_model->tmp_gejala($id_pengguna);
			foreach($data['tmp_gejala']->result_array() as $gm){
				$g['id_gejala']		= 	$gm['id_gejala'];
				$g['id_solusi']		= 	$kd_solusi;
				$this->Web_model->input_gejala_revise($g);	// Input DB Solusi Revise
			}
		}
		?>
		<script>window.location="detail_solusi/<?php echo $kd_solusi;?>";</script>;
		<?php
    }

	public function detail_solusi(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Detail Solve The Problem | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$id						= 	$this->uri->segment(3);
			$data['solusi']			= 	$this->Web_model->solusi_kasus($id_pengguna);
			$data['tmp_gejala']		= 	$this->Web_model->tmp_gejala($id_pengguna);
			$data['detail_solusi']	= 	$this->Web_model->detail_solusi($id);
			$data['detail_solusi']	= 	$this->Web_model->detail_solusi($id);
			$data['riwayat']		= 	$this->Web_model->daftar_kasus_riwayat1($id);
			$jumlah_lihat			= 	$this->Web_model->detail_solusi($id);
			foreach($jumlah_lihat->result_array() as $lihat){
				$l['dilihat']		= 	$lihat['dilihat'] + 1;
			}
			$this->Web_model->update_dilihat($l,$id);
			$data['content']		= 	'detail_solusi';
			$this->load->view('templete',$data);
	}

	function revisi_solusi(){	
		$data 					=	array();
		$id						= 	$this->input->post('id_solusi');
		$data['validasi']		= 	'3';
		
		$r['id_solusi']			= 	$this->input->post('id_solusi');
		$r['revisi']			= 	$this->input->post('revisi');
		$r['id_pengguna']		= 	$this->input->post('id_pengguna');
		$this->Web_model->revisi_solusi($data,$id);
		$this->Web_model->input_revisi_pengguna($r);
		?>
		<script>window.location="detail_solusi/<?php echo $id;?>";</script>;
		<?php
    }

	public function revise(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Data Revisi | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['kasus']			= 	$this->Web_model->daftar_kasus_revise();
			$data['revisi']			= 	$this->Web_model->revisi_pengguna();
			$data['gejala_masalah']	= 	$this->Web_model->gejala_masalah();
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['riwayat']		= 	$this->Web_model->riwayat();
			$data['content']		= 	'data_revise';
			$this->load->view('templete',$data);
	}
	
	public function edit_revisi(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Edit Solusi | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$id						= 	$this->uri->segment(3);
			$data['gejala']			= 	$this->Web_model->daftar_gejala();
			$data['solusi']	 		= 	$this->Web_model->edit_solusi($id);
			$data['gejala_masalah']	= 	$this->Web_model->gejala_masalah();
			$data['revisi']			= 	$this->Web_model->revisi_pengguna();
			$data['content']		= 	'edit_revisi';
			$this->load->view('templete',$data);
	}

	function update_revisi(){
		$id							= 	$this->input->post('id_solusi');
		$data['nama_solusi']		= 	$this->input->post('nama_solusi');
		$data['solusi_masalah']		= 	$this->input->post('solusi_masalah');
		$data['validasi']			= 	'0';
		
		$r['id_solusi']				= 	$this->input->post('r_id_solusi');
		$r['nama_solusi']			= 	$this->input->post('r_nama_solusi');
		$r['solusi_masalah']		= 	$this->input->post('r_solusi_masalah');
		if($r['nama_solusi']	!=	"Kasus belum ada di database"){
			$this->Web_model->input_riwayat($r);
		}
		$this->Web_model->update_solusi($data,$id);
		$this->Web_model->hapus_revisi_pengguna($id);
		redirect(base_url('sys/revise'), 'refresh');
	}

	function hapus_revisi(){
		$id						= 	$this->uri->segment(3);
		$this->Web_model->hapus_solusi($id);
		redirect(base_url('sys/revise'), 'refresh');
	}
	
	function batal_revisi_pengguna(){
		$id						= $this->input->post('id_solusi');
		$this->Web_model->hapus_revisi_pengguna($id);
		redirect(base_url('sys/revise'), 'refresh');
	}	
/* Ending The Main Controller CBR Method */	

	public function search(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Edit Solusi | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$data['tacit']	 		= 	$this->Web_model->daftar_data_tacit();
			$data['explicit'] 		= 	$this->Web_model->daftar_data_explicit();
			$data['cari_tacit']		= 	$this->Web_model->search_t();
			$data['cari_explicit']	= 	$this->Web_model->search_e();
			$data['content']		= 	'search';
			$this->load->view('templete',$data);
	}

	public function riwayat(){
		$data['login']			= 	$this->session->userdata('login', true);
		if($data['login']==false) redirect(base_url('sys/login'));
		
			$data['title']			=	'Riwayat Kasus | BNI Work Solution PT BNI KanWil Palembang';
			$id_pengguna			= 	$this->session->userdata('id_pengguna');
			$data['pengguna']		= 	$this->Web_model->data_pengguna($id_pengguna);
			$data['notif']			= 	$this->Web_model->notif($id_pengguna);
			$data['valid_t']		= 	$this->Web_model->valid_t($id_pengguna);
			$data['nvalid_t']		= 	$this->Web_model->nvalid_t($id_pengguna);
			$data['valid_e']		= 	$this->Web_model->valid_e($id_pengguna);
			$data['nvalid_e']		= 	$this->Web_model->nvalid_e($id_pengguna);
			$id						= 	$this->uri->segment(3);
			$data['gejala']			= 	$this->Web_model->daftar_gejala();
			$data['kasus']			= 	$this->Web_model->daftar_kasus_riwayat($id);
			$data['riwayat']		=	$this->Web_model->daftar_kasus_riwayat1($id);
			$data['gejala_masalah']	= 	$this->Web_model->gejala_masalah();
			$data['content']		= 	'riwayat';
			$this->load->view('templete',$data);
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */