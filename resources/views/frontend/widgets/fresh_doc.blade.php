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
                        <p class="text-inherit mb-0"><small>{{$doc->getShotName()}}</small></p>
                        @if($doc->date_pub->format('Y-m-d') == date('Y-m-d'))
                            <span class="mark green" title="Опубликован сегодня">Сегодня</span>
                        @endif
                    </div>
                </div>
            </a>
            <!-- End Card -->

        @endforeach

    </div>
</div>
<!-- Sidebar Example -->


<!-- End Sidebar Example -->
