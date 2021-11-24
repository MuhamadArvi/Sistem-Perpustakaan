<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporanfpdf extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
    }
 
	function index()
	{
        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
 
        $pdf = new FPDF('L', 'mm','Letter');
 
        $pdf->AddPage();
 
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'LAPORAN PENGADAAN BUKU',0,1,'C');
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'SMA NEGERI 114 JAKARTA UTARA',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
 
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(30,6,'ID PENGADAAN',1,0,'C');
        $pdf->Cell(30,6,'NAMA ADMIN',1,0,'C');
        $pdf->Cell(30,6,'ID BUKU',1,0,'C');
        $pdf->Cell(50,6,'JUDUL BUKU',1,0,'C');
        $pdf->Cell(40,6,'PENERBIT',1,0,'C');
        $pdf->Cell(40,6,'PENGARANG',1,1,'C');
 
        $pdf->SetFont('Arial','',10);
        $laporan = $this->db->get('laporan_pengadaan')->result();
        $no=0;
        foreach ($laporan as $data){
            $no++;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(30,6,$data->id_pengadaan,1,0);
            $pdf->Cell(30,6,$data->nama,1,0);
            $pdf->Cell(30,6,$data->id_buku,1,0);
            $pdf->Cell(50,6,$data->judul_buku,1,0);
            $pdf->Cell(40,6,$data->penerbit,1,0);
            $pdf->Cell(40,6,$data->pengarang,1,1);
        }
        $pdf->Output();
	}
    function peminjaman(){
        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
 
        $pdf = new FPDF('L', 'mm','Letter');
 
        $pdf->AddPage();
 
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'LAPORAN PEMINJAMAN BUKU',0,1,'C');
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'SMA NEGERI 114 JAKARTA UTARA',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
 
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(30,6,'ID PINJAM',1,0,'C');
        $pdf->Cell(30,6,'ID ANGGOTA',1,0,'C');
        $pdf->Cell(30,6,'NAMA',1,0,'C');
        $pdf->Cell(50,6,'JUDUL BUKU',1,0,'C');
        $pdf->Cell(40,6,'TANGGAL PINJAM',1,0,'C');
        $pdf->Cell(40,6,'TANGGAL KEMBALI',1,1,'C');
 
        $pdf->SetFont('Arial','',10);
        $laporan = $this->db->get('laporan_pinjam')->result();
        $no=0;
        foreach ($laporan as $data){
            $no++;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(30,6,$data->id_pinjam,1,0);
            $pdf->Cell(30,6,$data->id_anggota,1,0);
            $pdf->Cell(30,6,$data->nama,1,0);
            $pdf->Cell(50,6,$data->judul_buku,1,0);
            $pdf->Cell(40,6,$data->tanggal_pinjam,1,0);
            $pdf->Cell(40,6,$data->tanggal_kembali,1,1);
        }
        $pdf->Output();
	}
    function pengembalian(){
        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
 
        $pdf = new FPDF('L', 'mm','Letter');
 
        $pdf->AddPage();
 
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'LAPORAN PENGEMBALIAN BUKU SMAN 114 JAKARTA',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
 
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(50,6,'ID PENGEMBALIAN',1,0,'C');
        $pdf->Cell(30,6,'ID PINJAM',1,0,'C');
        $pdf->Cell(30,6,'NAMA',1,0,'C');
        $pdf->Cell(50,6,'JUDUL BUKU',1,0,'C');
        $pdf->Cell(40,6,'TANGGAL KEMBALI',1,1,'C');
 
        $pdf->SetFont('Arial','',10);
        $laporan = $this->db->get('laporan_pengembalian')->result();
        $no=0;
        foreach ($laporan as $data){
            $no++;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(50,6,$data->id_pengembalian,1,0);
            $pdf->Cell(30,6,$data->id_pinjam,1,0);
            $pdf->Cell(30,6,$data->nama,1,0);
            $pdf->Cell(50,6,$data->judul_buku,1,0);
            $pdf->Cell(40,6,$data->tanggal_kembali,1,1);
        }
        $pdf->Output();
	}
}