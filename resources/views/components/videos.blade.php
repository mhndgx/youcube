@props(['videos','type'=>'row','currentVideo'=> null])
@php
    $classes = $type == 'row' ?
    'grid grid-cols-[repeat(auto-fit,minmax(280px,1fr))] gap-3 w-full max-w-8xl mt-12 text-white' :
    'max-w-8xl grid rows-cols-[repeat(auto-fit,minmax(1px,1fr))] gap-3 w-full max-w-8xl mt-12 text-white'

@endphp
<div class="{{$classes}}">
    <!-- Video Item -->
    @foreach ($videos as $video)
        @if(!is_null($currentVideo))
        @if($currentVideo->id == $video->id)
                @continue
            @endif
        @endif
        @if($type === 'row')
            <x-video :video="$video"/>
        @else
            <x-video-horizontal :video="$video"/>
            <div class="h-[3px] w-full bg-gray-400/10 rounded"></div>
        @endif
    @endforeach
    
</div>