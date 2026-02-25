bast.blade.php

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<title>BAST</title>

<style>

@page {
    size: A4;
    margin: 25mm;
}

body{
    font-family: "Times New Roman", serif;
    font-size: 12pt;
    line-height: 1.6;
    color: #000;
}

/* HEADER */

.header{
    width:100%;
    border-bottom:3px solid #000;
    padding-bottom:10px;
    margin-bottom:30px;
}

.header-table{
    width:100%;
}

.logo{
    width:90px;
}

.company{
    text-align:center;
}

.company-name{
    font-size:18pt;
    font-weight:bold;
}

.company-address{
    font-size:11pt;
}

/* TITLE */

.title{
    text-align:center;
    margin-top:30px;
    margin-bottom:30px;
}

.title h1{
    font-size:16pt;
    margin:0;
}

.title h2{
    font-size:13pt;
    margin:0;
}

/* CONTENT */

.row{
    margin-bottom:10px;
}

.flex{
    display:flex;
    justify-content:space-between;
}

.justify{
    text-align:justify;
}

/* SIGNATURE */

.signature{
    margin-top:80px;
    width:100%;
}

.signature td{
    text-align:center;
}

/* FOOTER */

.footer{
    position:fixed;
    bottom:10mm;
    width:100%;
    text-align:center;
    font-size:10pt;
}

/* PAGE BREAK */

.page-break{
    page-break-before:always;
}

/* LAMPIRAN */

.lampiran-title{
    text-align:center;
    font-size:16pt;
    font-weight:bold;
    margin-bottom:20px;
}

/* TABLE */

table{
    width:100%;
    border-collapse:collapse;
}

th, td{
    border:1px solid black;
    padding:8px;
}

th{
    background:#eee;
}

</style>

</head>


<body>


{{-- ============================= --}}
{{-- HALAMAN 1 --}}
{{-- ============================= --}}

<div class="header">

<table class="header-table">

<tr>

<td width="15%">
<img src="{{ public_path('logo.png') }}" class="logo">
</td>

<td class="company">

<div class="company-name">

PT. FALAH TECH GLOBAL

</div>

<div class="company-address">

Jakarta, Indonesia<br>
www.falahtechglobal.com

</div>

</td>

<td width="15%" align="right">

<img src="{{ public_path('qr.png') }}" width="80">

</td>

</tr>

</table>

</div>


<div class="title">

<h1>
BERITA ACARA SERAH TERIMA
</h1>

<h2>
PERANGKAT STARLINK
</h2>

</div>


<div class="flex">

<div>
Nomor : {{ $bast->no_bast }}
</div>

<div>
Tanggal :
{{ $bast->tanggal->translatedFormat('d F Y') }}
</div>

</div>


<br>


<div class="justify">

Pada hari ini tanggal

<b>{{ $bast->tanggal->translatedFormat('d F Y') }}</b>

telah dilakukan serah terima perangkat Starlink
dengan rincian sebagai berikut:

</div>


<br><br>


<table>

<tr>

<td width="50%">

<b>Pihak Pertama</b><br><br>

Nama :
{{ $bast->pihak_pertama_nama }}<br>

Jabatan :
{{ $bast->pihak_pertama_jabatan }}<br>

Perusahaan :
{{ $bast->pihak_pertama_perusahaan }}

</td>


<td>

<b>Pihak Kedua</b><br><br>

Nama :
{{ $bast->pihak_kedua_nama }}<br>

Jabatan :
{{ $bast->pihak_kedua_jabatan }}<br>

Perusahaan :
{{ $bast->pihak_kedua_perusahaan }}

</td>

</tr>

</table>


<br><br>


<div class="justify">

Demikian berita acara ini dibuat dengan sebenarnya
untuk dipergunakan sebagaimana mestinya.

</div>



<table class="signature">

<tr>

<td>

Pihak Pertama

<br><br><br><br><br>

<b>
{{ $bast->pihak_pertama_nama }}
</b>

<br>

{{ $bast->pihak_pertama_jabatan }}

</td>


<td>

Pihak Kedua

<br><br><br><br><br>

<b>
{{ $bast->pihak_kedua_nama }}
</b>

<br>

{{ $bast->pihak_kedua_jabatan }}

</td>

</tr>

</table>


<div class="footer">

Dokumen ini dihasilkan oleh Sistem BAST

</div>


{{-- ============================= --}}
{{-- HALAMAN 2 --}}
{{-- ============================= --}}


<div class="page-break"></div>



<div class="lampiran-title">

LAMPIRAN<br>
DETAIL PERANGKAT STARLINK

</div>


<table>

<tr>

<th>No</th>
<th>Serial Number</th>
<th>Dish</th>
<th>Router</th>
<th>Kabel</th>
<th>Status</th>

</tr>


@foreach($bast->lampirans as $i => $lampiran)

<tr>

<td>
{{ $i+1 }}
</td>

<td>
{{ $lampiran->serial_number }}
</td>

<td>
{{ $lampiran->dish }}
</td>

<td>
{{ $lampiran->router }}
</td>

<td>
{{ $lampiran->kabel }}
</td>

<td>
{{ $lampiran->status }}
</td>

</tr>

@endforeach


</table>



</body>

</html>