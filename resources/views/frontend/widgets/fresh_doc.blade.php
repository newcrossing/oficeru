<div class="mb-7">
    <div class="mb-3">
        <h3>Свежие документы</h3>
    </div>

    <div class="d-grid gap-2">
        @foreach ($docs as $doc)
            <!-- Card -->
            <a class="d-block" href="{{route('document.single',$doc->id)}}">
                <div class="d-flex align-items-center">

                    <div class="flex-grow-1 ">
                        <p class="text-inherit mb-0"><small>{{$doc->getShotName()}}</small>
                            @if($doc->date_pub->format('Y-m-d') == date('Y-m-d'))
                                <sup>
                                    <span class="badge bg-success" title="Опубликован сегодня">
                                        Сегодня
                                    </span>
                                </sup>
                            @else
                                <sup>
                                    <span class="badge bg-info">
                                        {{\Carbon\Carbon::parse($doc->date_pub)->diffForHumans()}}
                                    </span>
                                </sup>
                            @endif
                        </p>
                    </div>
                </div>
            </a>
            <p class="text-inherit mb-0" style="font-size: 12px"><small>{!! $doc->short_name !!}</small></p>
            <!-- End Card -->

        @endforeach

    </div>
</div>
<!-- Sidebar Example -->


<!-- End Sidebar Example -->
