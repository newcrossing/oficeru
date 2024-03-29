<aside class="widget widget-authors">
    <div class="widget-title"><h3>Свежие документы</h3></div>
    <ul>
        @foreach ($docs as $doc)
            <li>
                <div class="author-name">
                    <a href="{{route('document.single',$doc->id)}}">{{$doc->getShotName()}}</a>

                    @isset($doc->short_name)
                        <div class="" style="font-size: 12px; color: #777;">
                            &laquo;{{$doc->short_name}}&raquo;
                        </div>
                    @endisset

                    @if($doc->date_pub->format('Y-m-d') == date('Y-m-d'))
                        <span class="mark green" title="Опубликован сегодня">Сегодня</span>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</aside>
