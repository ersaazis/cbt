@extends('crud::themes.adminlte.layout.layout')
@section('content')
<form action="" id="ujian" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="row" id="layout_foto" >
        <div class="col-sm-4 col-sm-offset-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    {{-- <h3 class="box-title">Upload Foto Saat ini</h3> --}}
                    <h3 class="box-title">Apakah anda sudah siap?</h3>
                </div>
                {{-- <div class="box-body">
                    <div class="form-group">
                        <input type="file" name="foto" id="foto" accept="image/*;capture=camera">
                    </div>
                </div> --}}
                <div class="box-footer">
                    <a onclick="simpanFoto()" class="btn btn-primary pull-right">Mulai</a>
                    {{-- <a onclick="simpanFoto()" class="btn btn-primary pull-right">Simpan</a> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="layout_soal" 
    style="display: none"
    >
        <div class="col-sm-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Navigasi Soal</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body text-center" id="tampil_jawaban">
                    @php
                        $no=1;
                    @endphp
                    @foreach ($soal as $item)
                        <a class="btn btn-default btn_soal btn-sm button" id="button_soal_{{$no}}" onclick="soal({{$no}})"><b>#{{$no++}}</b></a>
                    @endforeach
                    @php
                        $no=count($soal)+1;
                    @endphp
                    @foreach ($essai as $item)
                        <a class="btn btn-default btn_soal btn-sm button" id="button_soal_{{$no}}" onclick="soal({{$no}})"><b>#{{$no++}}</b></a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            
                <input type="hidden" value="{{$mapel_id}}" name="mapel_id">
                @php
                    $no=1;
                @endphp
                @foreach ($soal as $item)
                <div class="box box-primary soal" style="display: none" id="soal_{{$no}}">
                    <div class="box-header with-border">
                        <div class="box-header with-border">
                            <h3 class="box-title"><span class="badge bg-blue">Soal #{{$no}}</span></h3>
                            <div class="box-tools pull-right">
                                <span class="badge bg-red">Sisa Waktu <span class="sisawaktu">00:00:00</span></span>
                            </div>
                        </div>
                        <div class="box-body">
                            <p>{!! $item->soal !!}</p>
                            @if ($item->video)
                                <div class="video">{!!$item->video!!}</div>
                            @endif
                            @if ($item->gambar)
                                <img src="{{url($item->gambar)}}" style="width:100%"><br>
                            @endif
                            <br>
                            {{-- Jabawan Text --}}
                            @if ($item->tipe_jawaban == 'text')
                                <div class="input-group">
                                    <span class="input-group-addon">
                                    <input type="radio" data-no="{{$no}}" onchange="diisi({{$no}})" value="a" name="jawaban_pg[{{$item->id}}]">
                                    </span>
                                    <span class="input-group-addon" style="width: 100%;text-align:left" id="basic-addon1">A . {{$item->pilihan_a}}</span>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                    <input type="radio" data-no="{{$no}}" onchange="diisi({{$no}})" value="b" name="jawaban_pg[{{$item->id}}]">
                                    </span>
                                    <span class="input-group-addon" style="width: 100%;text-align:left" id="basic-addon1">B . {{$item->pilihan_b}}</span>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                    <input type="radio" data-no="{{$no}}" onchange="diisi({{$no}})" value="c" name="jawaban_pg[{{$item->id}}]">
                                    </span>
                                    <span class="input-group-addon" style="width: 100%;text-align:left" id="basic-addon1">C . {{$item->pilihan_c}}</span>
                                </div>
                                @if ($item->pilihan_d)
                                <div class="input-group">
                                    <span class="input-group-addon">
                                    <input type="radio" data-no="{{$no}}" onchange="diisi({{$no}})" value="d" name="jawaban_pg[{{$item->id}}]">
                                    </span>
                                    <span class="input-group-addon" style="width: 100%;text-align:left" id="basic-addon1">D . {{$item->pilihan_d}}</span>
                                </div>
                                @endif
                                @if ($item->pilihan_e)
                                <div class="input-group">
                                    <span class="input-group-addon">
                                    <input type="radio" data-no="{{$no}}" onchange="diisi({{$no}})" value="e" name="jawaban_pg[{{$item->id}}]">
                                    </span>
                                    <span class="input-group-addon" style="width: 100%;text-align:left" id="basic-addon1">E . {{$item->pilihan_e}}</span>
                                </div>
                                @endif
                            @endif
                            {{-- Jabawan Gambar --}}
                            @if ($item->tipe_jawaban == 'gambar')
                                <div class="input-group">
                                    <span class="input-group-addon">
                                    <input type="radio" data-no="{{$no}}" onchange="diisi({{$no}})" value="a" name="jawaban_pg[{{$item->id}}]">
                                    </span>
                                    <span class="input-group-addon" style="width: 100%;text-align:left" id="basic-addon1">A . @if($item->gambar_pilihan_a) <img src="{{url($item->gambar_pilihan_a)}}" width="50%"> @endif </span>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                    <input type="radio" data-no="{{$no}}" onchange="diisi({{$no}})" value="b" name="jawaban_pg[{{$item->id}}]">
                                    </span>
                                    <span class="input-group-addon" style="width: 100%;text-align:left" id="basic-addon1">B . @if($item->gambar_pilihan_b) <img src="{{url($item->gambar_pilihan_b)}}" width="50%"> @endif </span>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                    <input type="radio" data-no="{{$no}}" onchange="diisi({{$no}})" value="c" name="jawaban_pg[{{$item->id}}]">
                                    </span>
                                    <span class="input-group-addon" style="width: 100%;text-align:left" id="basic-addon1">C . @if($item->gambar_pilihan_c) <img src="{{url($item->gambar_pilihan_c)}}" width="50%"> @endif </span>
                                </div>
                                @if ($item->gambar_pilihan_d)
                                <div class="input-group">
                                    <span class="input-group-addon">
                                    <input type="radio" data-no="{{$no}}" onchange="diisi({{$no}})" value="d" name="jawaban_pg[{{$item->id}}]">
                                    </span>
                                    <span class="input-group-addon" style="width: 100%;text-align:left" id="basic-addon1">D . @if($item->gambar_pilihan_d) <img src="{{url($item->gambar_pilihan_d)}}" width="50%"> @endif </span>
                                </div>
                                @endif
                                @if ($item->gambar_pilihan_e)
                                <div class="input-group">
                                    <span class="input-group-addon">
                                    <input type="radio" data-no="{{$no}}" onchange="diisi({{$no}})" value="e" name="jawaban_pg[{{$item->id}}]">
                                    </span>
                                    <span class="input-group-addon" style="width: 100%;text-align:left" id="basic-addon1">E . @if($item->gambar_pilihan_e) <img src="{{url($item->gambar_pilihan_e)}}" width="50%"> @endif </span>
                                </div>
                                @endif
                            @endif
                        </div>

                        <div class="box-footer text-center">
                            @if ($no > 1)
                                <a class="action back btn btn-info" rel="0" onclick="soal({{$no-1}})"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                            @endif
                            <a class="ragu_ragu btn btn-warning" rel="1" onclick="ragu({{$no}})" id="button_ragu_{{$no}}">Ragu</a>
                            <a class="action next btn btn-info" rel="2" onclick="soal({{$no+1}})"><i class="glyphicon glyphicon-chevron-right"></i> Next</a>
                        </div>    
                    </div>
                </div>
                @php
                    $no++;
                @endphp
                @endforeach

                {{-- Soal Essai --}}
                @php
                    $no=count($soal)+1;
                @endphp
                @foreach ($essai as $item)
                <div class="box box-primary soal" style="display: none" id="soal_{{$no}}">
                    <div class="box-header with-border">
                        <div class="box-header with-border">
                            <h3 class="box-title"><span class="badge bg-blue">Soal #{{$no}}</span></h3>
                            <div class="box-tools pull-right">
                                <span class="badge bg-red">Sisa Waktu <span class="sisawaktu">00:00:00</span></span>
                            </div>
                        </div>
                        <div class="box-body">
                            <p>{!! $item->soal !!}</p>
                            @if ($item->video)
                                <div class="video">{!!$item->video!!}</div>
                            @endif
                            @if ($item->gambar)
                                <img src="{{url($item->gambar)}}" style="width:100%"><br>
                            @endif
                            <br>
                            <textarea data-no="{{$no}}" id="" cols="10" rows="5" name="jawaban_essai[{{$item->id}}]" onchange="diisi({{$no}})" class="form-control" placeholder="Ketik jawaban di sini"></textarea>
                        </div>

                        <div class="box-footer text-center">
                            <a class="action back btn btn-info" rel="0" onclick="soal({{$no-1}})"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                            <a class="ragu_ragu btn btn-warning" rel="1"  onclick="ragu({{$no}})" id="button_ragu_{{$no}}">Ragu</a>
                            @if ($no < count($essai)+count($soal))
                                <a class="action next btn btn-info" rel="2" onclick="soal({{$no+1}})"><i class="glyphicon glyphicon-chevron-right"></i> Next</a>
                            @endif
                            @if ($no == count($essai)+count($soal))
                                <button class="selesai action submit btn btn-danger" type="submit"><i class="glyphicon glyphicon-stop"></i> Selesai</button>
                            @endif
                        </div>    
                    </div>
                </div>
                @php
                    $no++;
                @endphp
                @endforeach

        </div>
    </div>
</form>
<style>
    .video > iframe {
        width: 100% !important;
        min-height: 400px;
    }
</style>
@endsection
@push('bottom')
    <script>
    $.get( "/cbt/update/");
    setInterval(function() {
        $.get( "/cbt/update/");
    }, 60 * 1000);
    </script>
@endpush
@push('bottom')
    <script>
        $('#button_soal_1').addClass('active');
        $('#soal_1').show();
        var d_ragu_status=[];
        var d_dijawab=[];
        var d_time=null;
        var d_cek_validasi=true;
        function simpanFoto(){
            // var inp = document.getElementById('foto');
            // if(inp.files.length === 0){
            //     alert("Anda Wajib Upload Foto Terbaru");
            //     inp.focus();
            //     return false;
            // }
            // if(inp.files[0].type == 'image/png' || inp.files[0].type == 'image/jpg' ){
                $('#layout_foto').hide();
                $('#layout_soal').show();
                $('.sidebar-toggle').click();

                var countDownDate = new Date("{{$tanggal_mulai}}");
                countDownDate.setMinutes(countDownDate.getMinutes());
                var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                $('.sisawaktu').html(hours+":"+minutes+":"+seconds);
                if (distance < 0) {
                    clearInterval(x);
                    d_cek_validasi=false;
                    alert('Waktu Anda Habis');
                    $( "#ujian" ).submit();
                }
                }, 1000);

                return false;
            // }
            // alert("File harus png/jpg");
            // inp.focus();
        }
        function soal(no){
            $('.button').removeClass('active');
            $('.soal').hide();

            $('#button_soal_'+no).addClass('active');
            $('#soal_'+no).show();
        }
        function diisi(no){
            $('#button_soal_'+no).removeClass('btn-default');
            $('#button_soal_'+no).removeClass('btn-warning');
            $('#button_soal_'+no).removeClass('btn-success');
            d_dijawab[no]=true;
            if(d_ragu_status[no]){
                $('#button_soal_'+no).addClass('btn-warning');
            }
            else
                $('#button_soal_'+no).addClass('btn-success');
        }
        function ragu(no){
            if(d_ragu_status[no]){
                d_ragu_status[no]=false;
                $('#button_soal_'+no).removeClass('btn-default');
                $('#button_soal_'+no).removeClass('btn-warning');
                $('#button_soal_'+no).removeClass('btn-success');
                if(d_dijawab[no]){
                    $('#button_soal_'+no).addClass('btn-success');
                }
                else {
                    $('#button_soal_'+no).addClass('btn-default');
                }
                $('#button_ragu_'+no).html('Ragu');
            }
            else{
                d_ragu_status[no]=true;
                $('#button_soal_'+no).removeClass('btn-success');
                $('#button_soal_'+no).removeClass('btn-default');
                $('#button_soal_'+no).addClass('btn-warning');
                $('#button_ragu_'+no).html('Tidak Ragu');
            }
        }
        $( "#ujian" ).submit(function() {
            if(d_cek_validasi){
                if(d_dijawab.reduce((r, o) => r + +!Object.values(o).includes(null),0) == {{(count($soal)+count($essai))}})
                    return confirm('Apakah anda yakin? anda masih memiliki waktu.');
                else {
                    alert('Pastikan semua soal terisi.');
                    return false;
                }
            }
        });
    </script>
@endpush