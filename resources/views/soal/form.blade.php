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
            <form method='get' id="form" enctype="multipart/form-data" action=''>
                <div class="box-body" id="parent-form-area">
                    @php
                        if(cb()->getCurrentMethod()=="getEdit") {
                            /** @var $row object */
                            columnSingleton()->valueAssignment($row);
                        }
                        $column=columnSingleton()->getAddEditColumns()[4];
                    @endphp
                    @if(file_exists(base_path('vendor/ersaazis/cb/src/types/'.$column->getType().'/component.blade.php')))
                        @include('types::'.$column->getType().'.component')
                    @else
                        <p class='text-danger'>{{ $column->getType() }} is not found in type component system</p><br/>
                    @endif
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