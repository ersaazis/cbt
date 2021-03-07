@extends(getThemePath('layout.layout'))
@section('content')
    @push('head')
        <style type="text/css">
            #table-detail tr td:first-child {
                font-weight: bold;
                width: 25%;
            }
        </style>
    @endpush

    @if(verifyReferalUrl())
        <p>
            <a href="{{ getReferalUrl("url") }}"><i class="fa fa-arrow-left"></i> Back To {{ getReferalUrl("name")?:cbLang("data") }} List</a>
        </p>
    @else
        <p>
            <a href="{{ module()->url() }}"><i class="fa fa-arrow-left"></i> &nbsp; {{cbLang('back_to_list')}}</a>
        </p>
    @endif



    @if(isset($before_detail_form))
        @if(is_callable($before_detail_form))
            {!! call_user_func($before_detail_form, $row) !!}
        @elseif(is_string($before_detail_form))
            {!! $before_detail_form !!}
        @endif
     @endif


    <?php
    /** @var $row object */
    columnSingleton()->valueAssignment($row);
    $detailColumns = module()->getColumnSingleton()->getDetailColumns();
    ?>
    @if($detailColumns)
    <div class="box box-default">
        <div class="box-header with-border">
            <h1 class="box-title"><i class="fa fa-eye"></i> {{ cbLang("detail") }}</h1>
        </div>
        <div class="box-body">
            <div class='table-responsive'>
                @php
                    $tipe=$row->tipe_jawaban;
                @endphp
                <table id='table-detail' class='table table-striped'>
                    @foreach($detailColumns as $column)
                        @if ($tipe == 'text')
                            @if($column->getName() == 'gambar_pilihan_a' || $column->getName() == 'gambar_pilihan_b' || $column->getName() == 'gambar_pilihan_c' || $column->getName() == 'gambar_pilihan_d')
                                @php
                                    continue;
                                @endphp
                            @endif
                        @elseif ($tipe == 'gambar')
                            @if($column->getName() == 'pilihan_a' || $column->getName() == 'pilihan_b' || $column->getName() == 'pilihan_c' || $column->getName() == 'pilihan_d')
                                @php
                                    continue;
                                @endphp
                            @endif

                        @endif
                        <tr>
                            <th width="25%">{{ $column->getLabel() }}</th>
                            <td>
                                <?php
                                /** @var \ersaazis\cb\models\ColumnModel $column */
                                $value = getTypeHook($column->getType())->detailRender($row, $column);
                                $value = call_user_func($column->getDetailDisplayTransform(), $value, $row);
                                echo $value;
                                ?>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
    @endif

    @if(isset($after_detail_form))
        @if(is_callable($after_detail_form))
            {!! call_user_func($after_detail_form, $row) !!}
        @elseif(is_string($after_detail_form))
            {!! $after_detail_form !!}
        @endif
    @endif
@endsection