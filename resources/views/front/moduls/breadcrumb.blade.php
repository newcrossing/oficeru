@isset($breadcrumbs)
    <div class="rw-row page-breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if(isset($breadcrumb['link']))
                <a href="{{$breadcrumb['link']}}">{{$breadcrumb['name']}}</a> &raquo;
            @else
                <span>{{$breadcrumb['name']}}</span>
            @endif
        @endforeach
    </div>
@endisset


