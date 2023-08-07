<div class="mb-7">
    <div class="mb-3">
        <h3>Вступили в силу</h3>
    </div>

    <div class="d-grid gap-2">
        @foreach ($docs as $doc)
            <!-- Card -->
        <div>
            <a class="d-block" href="{{route('document.single',$doc->id)}}">
                <div class="d-flex align-items-center">

                    <div class="flex-grow-1 ">
                        <p class="text-inherit mb-0"><small>{{$doc->getShotName()}}</small></p>

                        @if($doc->date_vst->format('Y-m-d') == date('Y-m-d'))
                            <span class="mark green" title="Сегодня вступил в силу">Сегодня</span>
                        @endif
                    </div>
                </div>
            </a>
            <p class="text-inherit mb-0" style="font-size: 12px"><small>{!! $doc->short_name !!}</small></p>
        </div>
        @endforeach

    </div>
</div>
<div id="stickyBlockStartPoint"></div>


