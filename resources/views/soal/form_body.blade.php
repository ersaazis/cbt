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
        @php
            $div=null;
            $div_close=null;
        @endphp
        @if($column->getName() == 'gambar_pilihan_a' || $column->getName() == 'gambar_pilihan_b' || $column->getName() == 'gambar_pilihan_c' || $column->getName() == 'gambar_pilihan_d')
            @php
                $div='<div class="image_type">';
                $div_close='</div>';
            @endphp
        @elseif($column->getName() == 'pilihan_a' || $column->getName() == 'pilihan_b' || $column->getName() == 'pilihan_c' || $column->getName() == 'pilihan_d')
            @php
                $div='<div class="text_type">';
                $div_close='</div>';
            @endphp
        @endif
        {!!$div!!}
        @if(file_exists(base_path('vendor/ersaazis/cb/src/types/'.$column->getType().'/component.blade.php')))
            @include('types::'.$column->getType().'.component')
        @else
            <p class='text-danger'>{{ $column->getType() }} is not found in type component system</p><br/>
        @endif
        {!!$div_close!!}
    @endif
@endforeach
@push('bottom')
<script>
    $(function() {
        $('.image_type').hide()
        $('.text_type').hide()
    })
</script>
@endpush