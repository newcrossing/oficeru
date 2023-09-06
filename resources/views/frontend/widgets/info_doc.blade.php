
<aside class="widget widget-categories">
    <a class="button orange " href="/pdf/{{$doc->id}}" target="_blank"><i class="fa fa-file-pdf-o"
                                                                          aria-hidden="true"></i> Скачать (.pdf)</a>
</aside>

<aside class="widget widget-categories">
    <div class="widget-title"><h3>Информация о документе</h3></div>
    <ul>
        @php
            //    $doc = (object)$docs;
        @endphp

        @isset($doc->date_pod)
            <li><a>Дата подписания
                    <span class="mark light-gray">
                        {{ \Carbon\Carbon::parse($doc->date_pod)->isoFormat(' D MMMM Y')}}
                       </span>
                </a>
            </li>
        @endisset
        @isset($doc->date_pub)
            <li><a>Дата публикации
                    <span class="mark light-gray">
                        {{ \Carbon\Carbon::parse($doc->date_pub)->isoFormat(' D MMMM Y')}}
                    </span>
                </a>
            </li>
        @endisset
        @isset($doc->date_vst)
            <li><a>Дата вступления в силу
                    <span class="mark light-gray">
                         {{ \Carbon\Carbon::parse($doc->date_vst)->isoFormat(' D MMMM Y')}}
                    </span>
                </a>
            </li>
        @endisset
    </ul>
</aside> <!-- .widget -->
@if(!empty($doc->description))
    <aside class="widget widget-text">
        <div class="widget-title"><h3>Описание</h3></div>
        <div class="widget-content">
            <p>{{ $doc->description }}</p>
        </div> <!-- .entry -->
    </aside>
@endif
