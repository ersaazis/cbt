@extends(getThemePath('layout.layout'))
@section('content')
        @if(verifyReferalUrl())
            <p>
                <a href="{{ getReferalUrl("url") }}"><i class="fa fa-arrow-left"></i> Back To {{ getReferalUrl("name")?:cbLang("data") }} List</a>
            </p>
            @else
            <p>
                <a href="{{ module()->url() }}"><i class="fa fa-arrow-left"></i> &nbsp; {{cbLang('back_to_list')}}</a>
            </p>
        @endif
        <div class="box box-default">
            <div class="box-header with-border">
                <h1 class="box-title"><i class="fa fa-file"></i> {{ (cb()->getCurrentMethod()=="getAdd")?cbLang("add")." ".cbLang("data"):cbLang("edit")." ".cbLang("data") }}</h1>
            </div>
            <form method='post' id="form" enctype="multipart/form-data" action='{{ $action_url }}'>
                <div class="box-body" id="parent-form-area">
                    {!! csrf_field() !!}
                    <input type="hidden" name="ref" value="{{ verifyReferalUrl()?request("ref"):null }}">
                    <input type="hidden" name="tipe_jawaban" value="{{ request('tipe_jawaban') }}">
    
                    @php $exist = []; @endphp
                    @foreach(module()->getColumnSingleton()->getAddEditColumns() as $index=>$column)
                        <?php /** @var \ersaazis\cb\models\ColumnModel $column */ ?>
                        @if(!in_array($column->getType(), $exist))
                            @if(file_exists(base_path('vendor/ersaazis/cb/src/types/'.$column->getType().'/asset.blade.php')))
                                @include('types::'.$column->getType().'.asset')
                                @php $exist[] = $column->getType(); @endphp
                            @endif
                        @endif
                    @endforeach

                    <?php
                        if(cb()->getCurrentMethod()=="getEdit") {
                            /** @var $row object */
                            columnSingleton()->valueAssignment($row);
                        }
                    ?>
                    @foreach(columnSingleton()->getAddEditColumns() as $index=>$column)
                        @if( (cb()->getCurrentMethod()=="getAdd" && $column->getShowAdd()) || (cb()->getCurrentMethod()=="getEdit" && $column->getShowEdit()))
                            @if($column->getName() == 'tipe_jawaban' || $column->getName() == 'gambar_pilihan_a' || $column->getName() == 'gambar_pilihan_b' || $column->getName() == 'gambar_pilihan_c' || $column->getName() == 'gambar_pilihan_d' || $column->getName() == 'gambar_pilihan_e')
                                @php
                                    continue;
                                @endphp
                            @endif
                            @if(file_exists(base_path('vendor/ersaazis/cb/src/types/'.$column->getType().'/component.blade.php')))
                                @include('types::'.$column->getType().'.component')
                            @else
                                <p class='text-danger'>{{ $column->getType() }} is not found in type component system</p><br/>
                            @endif
                        @endif
                    @endforeach

                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div style="text-align: right">
                        @if(module()->canCreate() && module()->getData("button_add_more") && cb()->getCurrentMethod()=="getAdd")
                            <input type="submit" name="submit" value='{{ cbLang("save")." & ".cbLang("add")." ".cbLang("more") }}' class='btn btn-default'>
                        @endif

                        @if(cb()->getCurrentMethod()=="getEdit")
                        <button type="button" class="btn btn-default" onclick="location.href='{{ verifyReferalUrl()?getReferalUrl("url"):module()->url() }}'">{{ cbLang("cancel") }}</button>
                        @endif

                        @if(cb()->getCurrentMethod()=="getAdd")
                            @if(module()->canCreate() && module()->getData("button_save"))
                                <input type="submit" name="submit" value='{{ cbLang("add")." ".cbLang("data") }}' class='btn btn-success'>
                            @endif
                        @endif

                        @if(cb()->getCurrentMethod()=="getEdit")
                            @if(module()->canUpdate() && module()->getData("button_save"))
                                <input type="submit" name="submit" value='{{ cbLang("update")." ".cbLang("data") }}' class='btn btn-success'>
                            @endif
                        @endif
                    </div>
                </div><!-- /.box-footer-->
            </form>
        </div>
@endsection