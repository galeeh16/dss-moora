<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Moora extends CI_Controller {

	public function test()
	{
		// query untuk mendapatkan semua data kriteria di tabel moo_kriteria
		$q1 = 'SELECT * FROM moo_kriteria';
		$get_kriteria = $this->db->query($q1)->result_array();

		// query untuk mendapatkan semua data kriteria di tabel moo_alternatif
		$q2 = 'SELECT * FROM moo_alternatif';
		$get_alternatif = $this->db->query($q2)->result_array();

		// query untuk mendapatkan semua data sample penilaian di tabel moo_nilai
		$q3 = 'SELECT * FROM moo_nilai ORDER BY id_alternatif,id_kriteria';
		$get_nilai = $this->db->query($q3)->result_array();

		// kriteria
		$kriteria = array();
		foreach ($get_kriteria as $key => $row) {
			$kriteria[$row['id_kriteria']] = array($row['kriteria'], $row['type'], $row['bobot']);
		}

		// alternatif 
		$alternatif = array();
		foreach ($get_alternatif as $row) {
		   	$alternatif[$row['id_alternatif']] = array(
		   											$row['alternatif'],
		                                            $row['bahan'],
				                                    $row['harga'],
				                                    $row['pengatur'],
				                                    $row['ukuran'],
				                                    $row['garansi']
				                                );
		}

		// sample 
		$sample = array();
		foreach ($get_nilai as $row) {
		   //-- jika array $sample[$row['id_alternatif']] belum ada maka buat baru
		   //-- $row['id_alternatif'] adalah id kandidat/alternatif
		   	if (!isset($sample[$row['id_alternatif']])) {
		      	$sample[$row['id_alternatif']] = array();
		   	}
		   	$sample[$row['id_alternatif']][$row['id_kriteria']] = $row['nilai'];
		}

		//-- inisialisasi nilai normalisasi dengan nilai dari $sample
		// echo "<pre>";
		// print_r($kriteria);
		// exit;
		$normal = $sample;
		foreach($kriteria as $id_kriteria => $k){
			
		   //-- inisialisasi nilai pembagi tiap kriteria
		   	$pembagi = 0;

		   	foreach ($get_nilai as $key => $nilai) {
		      	$pembagi += pow($nilai['id_alternatif'][$id_kriteria], 2);		   
		   		echo $pembagi .'<br>';
		   	}

		   // foreach($alternatif as $id_alternatif => $a){
		   //    	$pembagi += pow($sample['id_alternatif']['id_kriteria'], 2);
		   // }
		   // foreach($alternatif as $id_alternatif => $a){
		   //    $normal['id_alternatif']['id_kriteria'] /= sqrt($pembagi);
		   // }
		}

		echo "<pre>";
		// echo "kriteria <br>";
		// print_r($kriteria);
		// echo "alternatif <br>";
		// print_r($sample);
		// print_r($sample);
	}

	public function hitung()
	{
		//-- query untuk mendapatkan semua data kriteria di tabel moo_kriteria
		$sql = 'SELECT * FROM moo_kriteria';
		$get_kriteria = $this->db->query($sql)->result_array();

		//-- menyiapkan variable penampung berupa array
		$kriteria = array();

		//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
		foreach ($get_kriteria as $row) {
		   $kriteria[$row['id_kriteria']]=array($row['kriteria'],$row['type'],$row['bobot']);
		}

		//-- query untuk mendapatkan semua data kriteria di tabel moo_alternatif
		$sql = 'SELECT * FROM moo_alternatif';
		$get_alternatif = $this->db->query($sql)->result_array();

		//-- menyiapkan variable penampung berupa array
		$alternatif = array();

		//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
		foreach ($get_alternatif as $row) {
		  $alternatif[$row['id_alternatif']] = array(
		  										$row['alternatif'],
		                                        $row['bahan'],
			                                    $row['harga'],
			                                    $row['pengatur'],
			                                    $row['ukuran'],
			                                    $row['garansi']
			                                );
		}

		//-- query untuk mendapatkan semua data sample penilaian di tabel moo_nilai
		$sql = 'SELECT * FROM moo_nilai ORDER BY id_alternatif,id_kriteria';
		$get_nilai = $this->db->query($sql)->result_array();

		//-- menyiapkan variable penampung berupa array
		$sample = array();

		//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
		foreach ($get_nilai as $row) {
		   //-- jika array $sample[$row['id_alternatif']] belum ada maka buat baru
		   //-- $row['id_alternatif'] adalah id kandidat/alternatif
		   if (!isset($sample[$row['id_alternatif']])) {
		      $sample[$row['id_alternatif']] = array();
		   }
		   $sample[$row['id_alternatif']][$row['id_kriteria']] = $row['nilai'];
		}

		//-- inisialisasi nilai normalisasi dengan nilai dari $sample
		$normal = $sample;
		foreach($kriteria as $id_kriteria => $k){
		   //-- inisialisasi nilai pembagi tiap kriteria
		   // $pembagi = 0;
		   // foreach($alternatif as $id_alternatif => $a){
		   //    $pembagi += pow($sample['id_alternatif']['id_kriteria'],2);
		   // }
		   // foreach($alternatif as $id_alternatif => $a){
		   //    $normal['id_alternatif']['id_kriteria'] /= sqrt($pembagi);
		   // }
		}

		echo '<pre>kriteria<br>';
		print_r($kriteria);
		echo '<pre>alternatif<br>';
		print_r($alternatif);
		echo '<pre>nilai/data sample<br>';
		print_r($get_nilai);
	}

}

/* End of file Moora.php */
/* Location: ./application/controllers/Moora.php */