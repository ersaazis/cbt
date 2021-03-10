@extends('crud::themes.adminlte.layout.layout')
@section('content')
<div class="callout callout-info">
    <h4>Selamat, {{ cb()->session()->name() }}</h4>
    <p>Anda telah menyelesaikan ujian {{$mapel}}</p>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Informasi</h3>
            </div>
            <div class="box-body">
                <table class="table">
                    <tr>
                        <th width="20%">Nama</th>
                        <td> : {{cb()->session()->name()}}</td>
                    </tr>
                    <tr>
                        <th>Mata Pelajaran</th>
                        <td>: {{$mapel}}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Soal</th>
                        <td>: {{$total}}</td>
                    </tr>
                    <tr>
                        <th>Jawaban Benar</th>
                        <td>: {{$benar}}</td>
                    </tr>
                    <tr>
                        <th>Jawaban Salah</th>
                        <td>: {{$salah}}</td>
                    </tr>
                    <tr>
                        <th>Nilai</th>
                        <td>: {{$nilai}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
