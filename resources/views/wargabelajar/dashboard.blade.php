@extends('crud::themes.adminlte.layout.layout')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="box">
            <div class="box-header">Informasi Pribadi</div>
            <div class="box-body table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th width="150">Nama</th>
                        <td>{{ cb()->session()->name() }}</td>
                    </tr>
                    <tr>
                        <th>NISN</th>
                        <td>{{ cb()->session()->user()->nisn }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Ujian</th>
                        <td>{{ cb()->session()->user()->nomor_ujian }}</td>
                    </tr>
                    @if (cb()->session()->user()->jurusan)
                    <tr>
                        <th>Jurusan</th>
                        <td>{{ cb()->session()->user()->jurusan }}</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>        
    </div>
    {{-- <div class="col-md-4">
        <div class="box">
            <div class="box-header">Jadwal Ujian</div>
            <div class="box-body table-responsive">
                <table class="table table-bordered">
                    <tr>

                    </tr>
                </table>
            </div>
        </div>
    </div> --}}
</div>
@endsection
@push('bottom')
    <script>
    $.get( "/cbt/update/");
    setInterval(function() {
        $.get( "/cbt/update/");
    }, 90 * 1000);
    </script>
@endpush