<?php
include 'database.php';
class Sewa extends Database 
{

	/**Sewa**/
	//Menampilkan Data Sewa
	function tampil_sewa()
	{
		$sewa = mysql_query("SELECT sewa.id as id, sewa.tanggal, sewa.kembali, 
							member.nama, buku.judul, sewa.harga
							FROM sewa, buku, member
							WHERE sewa.buku=buku.isbn AND sewa.member=member.no_member
							ORDER BY tanggal DESC");
		while($tampil = mysql_fetch_array($sewa)){
			$hasil[] = $tampil;
		}
		return $hasil;
	}

	//Menambah Sewa
	function add_sewa($tanggal, $kembali, $member, $buku, $harga, $status) 
	{
		mysql_query("INSERT INTO sewa VALUES('','$tanggal', '$kembali','$member','$buku', '$harga', 'Sewa')");
	}

	//Menghapus Sewa
	function delete_sewa($id)
	{
		mysql_query("DELETE FROM sewa WHERE id='$id'");
	}

	//Mengubah Sewa
	function edit_sewa($id, $tanggal, $kembali, $member, $buku, $harga)
	{
		mysql_query("UPDATE sewa SET tanggal='$tanggal', kembali='$kembali',
					member='$member', buku='$buku', harga='$harga'
					WHERE id='$id'");
	}

	//Menampilkan data sewa di ubah sewa
	function tampil_edit_sewa($id)
	{
		$sewa = mysql_query("SELECT * FROM sewa WHERE id='$id'");
		while($edit = mysql_fetch_array($sewa)){
			$hasil[] = $edit;
		}
		return $hasil;
	}

	function tampil_kwitansi($id)
	{
		$kwi = mysql_query("SELECT sewa.id, sewa.tanggal, sewa.kembali, 
							member.nama, buku.judul, sewa.harga
							FROM sewa, buku, member
							WHERE sewa.buku=buku.isbn AND sewa.member=member.no_member
							AND sewa.id='$id'");
		while($tansi = mysql_fetch_array($kwi)){
			$kwitansi[] = $tansi;
		}
		return $kwitansi;
	}

	//menampilkan member
	function tampil_member(){
		$tampil = mysql_query("SELECT * FROM member");
		while($member = mysql_fetch_array($tampil)){
			$hasil[] = $member;
		}
		return $hasil;
	}

	//menampilkan buku
	function tampil_buku(){
		$tampil = mysql_query("SELECT * FROM buku");
		while($buku = mysql_fetch_array($tampil)){
			$hasil[] = $buku;
		}
		return $hasil;
	}

	function tampil_kembali_sewa($id){
		$kembali = mysql_query("SELECT * FROM sewa WHERE id='$id'");
		while($edit = mysql_fetch_array($kembali)){
			$hasil[] = $edit;
		}
		return $hasil;
	}

	function kembali_sewa($tgl_sewa, $tgl_kembali, $member, $buku, $denda) 
	{
		mysql_query("INSERT INTO kembali VALUES($tgl_sewa', '$tgl_kembali', '$member', '$buku', '$denda')");
		mysql_query("UPDATE sewa SET status='Kembali' WHERE member='$member'");
	}

} 

?>