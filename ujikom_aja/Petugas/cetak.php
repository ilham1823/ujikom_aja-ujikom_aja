<?php
require_once('tcpdf/tcpdf.php');

class MYPDF extends TCPDF {
    public function Header() {
        $this->SetFont('helvetica', 'B', 12);
        $this->Cell(0, 10, 'Laporan Buku', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(10);
    }

    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Halaman ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetTitle('Laporan Buku');
$pdf->SetMargins(10, 10, 10);
$pdf->AddPage();

$pdf->SetFont('helvetica', '', 10);

include "../db_conn.php";
$sql = "SELECT * FROM buku";
$result = mysqli_query($conn, $sql);
$html = '<table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                </tr>
            </thead>
            <tbody>';
while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['judul'] . '</td>
                <td>' . $row['penulis'] . '</td>
                <td>' . $row['penerbit'] . '</td>
                <td>' . $row['tahun_terbit'] . '</td>
            </tr>';
}
$html .= '</tbody></table>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('laporan_buku.pdf', 'I');
