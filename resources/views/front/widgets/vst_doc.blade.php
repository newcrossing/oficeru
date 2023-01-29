<aside class="widget widget-authors">
    <div class="widget-title"><h3>Вступили в силу</h3></div>
    <ul>
        @foreach ($docs as $doc)
            <li>
                <div class="author-name">
                    <a href="{{route('document.single',$doc->id)}}">{{$doc->getShotName()}}</a>
                    @if($doc->date_vst->format('Y-m-d') == date('Y-m-d'))
                        <span class="mark green" title="Сегодня вступил в силу">Сегодня</span>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</aside>
