@php
use Carbon\Carbon;

function terbilang($angka) {
    $angka = abs($angka);
    $huruf = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
    if ($angka < 12) {
        return " " . $huruf[$angka];
    } elseif ($angka < 20) {
        return terbilang($angka - 10) . " Belas";
    } elseif ($angka < 100) {
        return terbilang($angka / 10) . " Puluh" . terbilang($angka % 10);
    } elseif ($angka < 200) {
        return " Seratus" . terbilang($angka - 100);
    } elseif ($angka < 1000) {
        return terbilang($angka / 100) . " Ratus" . terbilang($angka % 100);
    } elseif ($angka < 2000) {
        return " Seribu" . terbilang($angka - 1000);
    } elseif ($angka < 1000000) {
        return terbilang($angka / 1000) . " Ribu" . terbilang($angka % 1000);
    }
}

$hari    = ucwords($bast->tanggal->translatedFormat('l'));
$tgl     = trim(terbilang($bast->tanggal->day));
$bulan   = ucwords($bast->tanggal->translatedFormat('F'));
$tahun   = trim(terbilang($bast->tanggal->year));

@endphp


<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>{{ $bast->no_bast }}</title>

<style>

/* ================= RESET ================= */
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: "Times New Roman", serif;
    font-size: 11pt;
    line-height: 1.3;
}

/* ================= PRINT ================= */
@media print {

    body {
        background: #fff;
        margin: 0;
    }

    .paper {
        page-break-after: always;
        width: 100%;
        padding: 0;
        box-shadow: none;
    }

    .paper:not(:last-child) {
    page-break-after: always;
}

    @page {
        size: A4 portrait;
        margin-top: 20mm;
        margin-bottom: 25mm;
        margin-left: 25mm;
        margin-right: 25mm;
    }
}

/* ================= HEADER ================= */
.header {
    display: table;
    width: 100%;
    border-bottom: 2px solid #000;
    padding-bottom: 15px;
    margin-bottom: 15px;
}

.header-left,
.header-center,
.header-right {
    display: table-cell;
    vertical-align: middle; /* 🔥 bikin sejajar */
}

.header-left {
    width: 100px;
}

.header-center {
    text-align: center;
}

.header-right {
    width: 100px;
    text-align: right;
}

.logo {
    width: 70px;
}

.company-name {
    font-size: 16pt;
    font-weight: bold;
}

.company-address {
    font-size: 11pt;
}

.qr { 
    position: relative; 
    opacity: 0.8;
}

/* ================= TITLE ================= */
.title {
    text-align: center;
    font-size: 12pt;
    font-weight: bold;
    margin-top: 25px;
}

.subtitle {
    text-align: center;
    font-size: 12pt;
    font-weight: bold;
    margin-bottom: 50px;
}

/* ================= TABLE ================= */
table {
    width: 100%;
    border-collapse: collapse;
}

table, tr, td, th {
    page-break-inside: avoid;
}

td {
    padding: 2px;
    vertical-align: top;
}

th {
    border: 1px solid #000;
    padding: 8px;
    font-weight: bold;
    background: #f3f3f3;
}

.border td {
    border: 1px solid #000;
}

.center { text-align: center; }
.right { text-align: right; }
.uppercase { text-transform: uppercase; }

/* ================= SIGNATURE ================= */
.signature {
    margin-top: 50px;
    page-break-inside: avoid;
}

.signature-box {
    position: relative;
    height: 100px;
}

/* ================= PAGE BREAK ================= */
.page-break {
    page-break-after: always;
}

</style>

</head>
<body>
<div class="paper">

{{-- ================= HEADER ================= --}}
<div class="header">

    <div class="header-left">
        @php $logo = public_path('logo.png'); @endphp
        @if(file_exists($logo))
            <img src="{{ $logo }}" class="logo">
        @endif
    </div>

    <div class="header-center">
        <div class="company-name">
            PT. FALAH TECH GLOBAL
        </div>
        <div class="company-address">
            Jalan Tebet Barat No. 12 Jakarta Selatan 12810<br>
            +6281188095023 | www.falahtechglobal.co.id 
        </div>
    </div>

    <div class="header-right">
        <!-- <img 
            src="https://api.qrserver.com/v1/create-qr-code/?size=55x55&data={{ $bast->no_bast }}"
            class="qr"
        > -->
    </div>

</div>


{{-- ================= TITLE ================= --}}
<div class="title">
BERITA ACARA SERAH TERIMA
</div>

<div class="subtitle">
PERANGKAT STARLINK
</div>


<table>
<tr>
<td>
Nomor : <strong>{{ $bast->no_bast }}</strong>
</td>
<td class="right">
Jakarta, {{ $bast->tanggal->translatedFormat('d F Y') }}
</td>
</tr>
</table>

<br>

<p style="text-align:justify;">
Pada hari ini <b>{{ $hari }}</b>, tanggal 
<b>{{ $tgl }}</b> bulan 
<b>{{ $bulan }}</b> tahun 
<b>{{ trim($tahun) }}</b>, kami yang bertanda tangan di bawah ini:
</p>

<table width="100%" style="margin-left:20px;">
<tr>
    <td width="130"><b>Nama</b></td>
    <td width="10">:</td>
    <td>{{ $bast->pihak_pertama_nama }}</td>
</tr>
<tr>
    <td><b>Jabatan</b></td>
    <td>:</td>
    <td>{{ $bast->pihak_pertama_jabatan }}</td>
</tr>
<tr>
    <td><b>Perusahaan</b></td>
    <td>:</td>
    <td>{{ $bast->pihak_pertama_perusahaan }}</td>
</tr>
<tr>
    <td colspan="3" style="padding-top:8px;">
        Selanjutnya dalam Berita Acara ini disebut sebagai <b>PIHAK PERTAMA</b>.
    </td>
</tr>
</table>

<br>

<table width="100%" style="margin-left:20px;">
<tr>
    <td width="130"><b>Nama</b></td>
    <td width="10">:</td>
    <td>{{ $bast->pihak_kedua_nama }}</td>
</tr>
<tr>
    <td><b>Jabatan</b></td>
    <td>:</td>
    <td>{{ $bast->pihak_kedua_jabatan }}</td>
</tr>
<tr>
    <td><b>Perusahaan</b></td>
    <td>:</td>
    <td>{{ $bast->pihak_kedua_perusahaan }}</td>
</tr>
<tr>
    <td colspan="3" style="padding-top:8px;">
        Selanjutnya dalam Berita Acara ini disebut sebagai <b>PIHAK KEDUA</b>.
    </td>
</tr>
</table>

<p style="text-align:justify;">
Bahwa pada hari dan tanggal tersebut di atas, <b>PIHAK PERTAMA</b> telah menyerahkan
Perangkat Starlink kepada <b>PIHAK KEDUA</b> dan <b>PIHAK KEDUA</b> dengan ini menyatakan
telah menerima perangkat tersebut dalam keadaan baik dan lengkap sesuai dengan rincian
yang tercantum dalam lampiran Berita Acara ini. 
</p>

<p style="text-align:justify;">
Demikian Berita Acara Serah Terima ini dibuat dalam rangkap 2 (dua) yang masing-masing memiliki kekuatan hukum yang sama, untuk dipergunakan sebagaimana mestinya.
</p>


{{-- ================= SIGNATURE ================= --}}

<table class="signature" style="margin-top:50px; width:100%;">
<tr>

{{-- ================= PIHAK PERTAMA ================= --}}
<td width="50%" class="center" style="vertical-align:top;">

    Penyedia<br>
    <strong>PT. FALAH TECH GLOBAL</strong>

    <div class="signature-box" style="position:relative; height:100px;">

        @php
            $ttdPath = public_path('ttd-saeful.png');
            $stempelPath = public_path('stempel-ftg.png');
        @endphp

        @if(file_exists($ttdPath))
            <img 
                src="{{ $ttdPath }}"
                style="
                    position:absolute;
                    bottom:0;
                    left:50%;
                    transform:translateX(-50%);
                    height:80px;
                "
            >
        @endif

        @if(file_exists($stempelPath))
            <img 
                src="{{ $stempelPath }}"
                style="
                    position:absolute;
                    top:10px;
                    left:55%;
                    width:120px;
                    transform: rotate(-10deg);
                    opacity:0.8;
                "
            >
        @endif

    </div>

    <strong>{{ $bast->pihak_pertama_nama }}</strong><br>
    {{ $bast->pihak_pertama_jabatan }}

</td>


{{-- ================= PIHAK KEDUA ================= --}}
<td width="50%" class="center" style="vertical-align:top;">

    Penerima<br>
    <strong>{{ $bast->pihak_kedua_perusahaan }}</strong>

    {{-- Box kosong agar sejajar tinggi --}}
    <div style="height:100px;"></div>

    <strong>{{ $bast->pihak_kedua_nama }}</strong><br>
    {{ $bast->pihak_kedua_jabatan }}

</td>

</tr>
</table>
</div>

<br>


{{-- ================= HALAMAN 2 ================= --}}

<div class="paper">

<div class="title">
LAMPIRAN PERANGKAT STARLINK
</div>

<br>

<table class="border">

<tr class="center">
<th width="5%">No</th>
<th width="25%">KIT Starlink</th>
<!-- <th width="15%">Status</th> -->
<th width="25%">Serial Number</th>
<th width="20%">Generasi</th>
</tr>

@foreach($bast->lampirans as $no=>$lampiran)

<tr>
<td class="center">{{ $no+1 }}</td>
<td class="center">{{ $lampiran->starlink?->kit_name }}</td>
<!-- <td class="center uppercase">{{ $lampiran->starlink?->status }}</td> -->
<td class="center">{{ $lampiran->starlink?->serial_number }}</td>
<td class="center">{{ $lampiran->starlink?->generation }}</td>
</tr>

@endforeach

</table>

</div>
</body>
</html>