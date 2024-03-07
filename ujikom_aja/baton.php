<?php
require_once('TCPDF-main/TCPDF-main/tcpdf.php');

class MYPDF extends TCPDF {
    public function Header() {
        $this->SetFont('helvetica', 'B', 15);
        $this->Ln(10);
        $this->Cell(0, 10, 'Laporan Peminjam' , 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(10);
        $this->Cell(0, 10, 'Perpustakaan Digital' , 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Halaman ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-20', false);
$pdf->SetTitle('Laporan Peminjam');
$pdf->SetMargins(15, 30, 15); // Penyesuaian margin

$pdf->AddPage();

$pdf->SetFont('helvetica', '', 12);

include "db_conn.php";
$sql = "SELECT * FROM peminjaman";
$result = mysqli_query($conn, $sql);

// Menentukan lebar kolom untuk tabel
$col_width = 102;

$html = '<table border="1" cellpadding="7" cellspacing="0">
            <thead>
                <tr style="background-color:#CCCCCC;">
                    <th width="' . $col_width . '">ID</th>
                    <th width="' . $col_width . '">Nama Buku</th>
                    <th width="' . $col_width . '">Nama Peminjam</th>
                    <th width="' . $col_width . '">Tanggal Peminjaman</th>
                    <th width="' . $col_width . '">Status</th>
                </tr>
            </thead>
            <tbody>';

while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['nama_buku'] . '</td>
                <td>' . $row['nama'] . '</td>
                <td>' . $row['tanggal'] . '</td>
                <td>' . $row['status_pinjam'] . '</td>
            </tr>';
}
$html .= '</tbody></table>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('laporan_buku.pdf', 'I');
?>
