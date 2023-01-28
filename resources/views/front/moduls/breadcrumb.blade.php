@isset($breadcrumbs)
    <div class="rw-row page-breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)

            @if(isset($breadcrumb['link']))
                <a href="{{$breadcrumb['link']}}">{{$breadcrumb['name']}}</a> &raquo;
                @if($breadcrumb['name'] == "Главная")

                    @else
                    {{$breadcrumb['name']}}
                    @endif
                    </a>
                @else
                    <span>{{$breadcrumb['name']}}</span>
                @endif

                @endforeach
    </div>
@endisset


