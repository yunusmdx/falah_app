<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">

<style>

body{
    font-family: DejaVu Sans;
    font-size:12px;
    line-height:1.6;
    margin:30px;
    color:#000;
}

.header{
    border-bottom:3px solid #000;
    padding-bottom:10px;
    margin-bottom:20px;
}

.logo{
    float:left;
    width:80px;
}

.company{
    text-align:center;
}

.company-name{
    font-size:18px;
    font-weight:bold;
}

.company-address{
    font-size:11px;
}

.clear{
    clear:both;
}

.title{
    text-align:center;
    font-size:18px;
    font-weight:bold;
    margin-top:30px;
}

.subtitle{
    text-align:center;
    font-size:14px;
    margin-bottom:20px;
}

table{
    width:100%;
    border-collapse:collapse;
}

td{
    padding:6px;
    vertical-align:top;
}

.border{
    border:1px solid black;
}

.center{
    text-align:center;
}

.right{
    text-align:right;
}

.signature{
    margin-top:60px;
}

.signature-box{

    height:90px;

}

.page-break{
    page-break-after:always;
}

.footer{
    position:fixed;
    bottom:0;
    left:0;
    right:0;
    font-size:10px;
    text-align:center;
}

.qr{
    position:absolute;
    right:30px;
    top:30px;
}

.watermark{
    position:fixed;
    top:35%;
    left:25%;
    opacity:0.08;
    font-size:80px;
    transform:rotate(-30deg);
}

</style>

</head>

<body>


{{-- HEADER --}}
<div class="header">

    <img src="{{ public_path('logo.png') }}" class="logo">

    <div class="company">

        <div class="company-name">
            PT. FALAH TECH GLOBAL
        </div>

        <div class="company-address">
            Jakarta, Indonesia
            <br>
            www.falahtechglobal.com
        </div>

    </div>

<div class="clear"></div>

</div>


{{-- QR --}}
<div class="qr">

<img src="https://api.qrserver.com/v1/create-qr-code/?size=80x80&data={{ $bast->no_bast }}">

</div>



{{-- TITLE --}}
<div class="title">

BERITA ACARA SERAH TERIMA

</div>

<div class="subtitle">

PERANGKAT STARLINK

</div>



<table>

<tr>

<td width="70%">
Nomor : {{ $bast->no_bast }}
</td>

<td class="right">
Tanggal : {{ $bast->tanggal->translatedFormat('d F Y') }}
</td>

</tr>

</table>



<br><br>


Pada hari ini tanggal
<b>{{ $bast->tanggal->translatedFormat('d F Y') }}</b>
telah dilakukan serah terima perangkat Starlink.



<br><br><br>



{{-- SIGNATURE --}}
<table class="signature">

<tr>


{{-- PIHAK PERTAMA --}}
<td width="50%" class="center">

Penyedia
<br>

PT. FALAH TECH GLOBAL

<br><br>

<div class="signature-box">

@if(file_exists(public_path('ttd.png')))
<img src="{{ public_path('ttd.png') }}" height="80">
@endif

</div>

<br>

<b>
{{ $bast->pihak_pertama_nama }}
</b>

<br>

{{ $bast->pihak_pertama_jabatan }}

</td>




{{-- PIHAK KEDUA --}}
<td width="50%" class="center">

Penerima

<br>

{{ $bast->pihak_kedua_perusahaan }}

<br><br>


<div class="signature-box">
{{-- kosong tapi size sama --}}
&nbsp;
</div>

<br>

<b>
{{ $bast->pihak_kedua_nama }}
</b>

<br>

{{ $bast->pihak_kedua_jabatan }}

</td>



</tr>

</table>



<div class="footer">

Dokumen ini dibuat otomatis oleh Sistem BAST

</div>



<div class="page-break"></div>



{{-- LAMPIRAN --}}
<div class="title">

LAMPIRAN PERANGKAT STARLINK

</div>


<br>


<table class="border">

<tr class="center">

<th class="border">NO</th>
<th class="border">KIT</th>
<th class="border">STATUS</th>
<th class="border">SERIAL NUMBER</th>
<th class="border">LOKASI</th>
<th class="border">DIVISI</th>

</tr>



@foreach($bast->lampirans as $no=>$lampiran)

<tr>

<td class="border center">
{{ $no+1 }}
</td>

<td class="border">
{{ $lampiran->starlink->kit_name }}
</td>

<td class="border">
{{ $lampiran->starlink->status }}
</td>

<td class="border">
{{ $lampiran->starlink->serial_number }}
</td>

<td class="border">
{{ $lampiran->starlink->location }}
</td>

<td class="border">
{{ $lampiran->starlink->division }}
</td>

</tr>

@endforeach


</table>



<div class="footer">

{{ $bast->no_bast }}

</div>



<div class="watermark">

FTG

</div>



</body>
</html>
