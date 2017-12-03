<?php
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
		
		$kasus						= 	$this->Web_model->kasus_cari();	//solusi
		$tmp_gejala					= 	$this->Web_model->tmp_gejala($id_pengguna);
		$h_tmp_gejala				= 	$this->Web_model->hitung_tmp_gejala($id_pengguna);
		$perbandingan				= 	$this->Web_model->perbandingan();	//Kasus Gejala
		$hitung_gejala				= 	$this->Web_model->hitung_gejala();	//Kasus Gejala
		
		//	2. Memulai Pencocokan
		$s 	=	0;
		foreach ($tmp_gejala->result_array() as $t) {
			$bobot 	=	$t['bobot_gejala'];
			$s 	= 	$s + $bobot; // Total bobot identifikasi fitur
		}
		
		foreach($kasus->result_array() as $k) { // Daftar kasus tersimpan dalam database
			foreach($hitung_gejala->result_array() as $hg)
			if($k['id_solusi'] == $hg['id_solusi']){
				$h_gejala 	= 	$hg['jml'];
			}

			$pe = 0;
			foreach($tmp_gejala->result_array() as $t) {	// Gejala identifikasi fitur
				foreach($h_tmp_gejala->result_array() as $ht){
					$h_fitur	= 	$ht['jml'];
				}

				foreach($perbandingan->result_array() as $p) // Pencocokan gejala
				if($p['id_solusi'] == $k['id_solusi'] && $t['id_gejala'] == $p['id_gejala']){	
					$b 	= 	$p['bobot_gejala'];
					echo "<br/>";
					$pe = $pe + $b;
				}
			}

			$h['id_solusi']			= 	$k['id_solusi'];
			$similarity 			=	$pe / $s; // Rumus Similarity
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

?>