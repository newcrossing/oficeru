<aside class="widget widget-authors">
    <div class="widget-title"><h3>Вступили в силу</h3></div>
    <ul>
        @foreach ($docs as $doc)
            <li>
                <div class="author-name">
                    @if($doc->date_vst->format('Y-m-d') == date('Y-m-d'))
                        <span class="mark green" title="Сегодня вступил в силу">Сегодня</span>
                    @endif
                    <a href="{{route('document.single',$doc->id)}}">{{$doc->getShotName()}}</a>
                    @isset($doc->short_name)
                        <div class="" style="font-size: 12px; color: #777;">
                            &laquo;{{$doc->short_name}} &raquo;
                        </div>
                    @endisset

                </div>
            </li>
        @endforeach
    </ul>
</aside>
