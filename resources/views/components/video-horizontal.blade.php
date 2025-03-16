@props(['video'])
<a href="{{route('videos.show',$video->id)}}" class="flex gap-x-4 space-y-2 w-full hover:bg-white/10 p-2">
    <!-- Thumbnail -->
    <div class="relative w-full max-w-xs aspect-video rounded-lg overflow-hidden bg-white/40">
        <img src="https://picsum.photos/seed/{{rand(0,1000000)}}/800/300" alt="Video Title" class="w-full h-full object-cover ">
    </div>

    <!-- Video Details -->
    <div class="flex flex-col space-y-4 mt-2">
        <!-- Channel Avatar -->
        
        <!-- Video Info -->
        <div class="flex flex-col gap-y-3">
            <h3 class="w-full font-semibold line-clamp-2">{{$video->title}}</h3>

            <p class="text-xs text-gray-300">{{formatViews($video->views)}} مشاهدة</p>
        </div>
        <div class="flex items-center">
            <img src="https://picsum.photos/seed/{{rand(0,1000000)}}/100/100" alt="Channel Name" class="w-10 h-10 rounded-full ml-3">
            <p dir="ltr" class="text-xs text-gray-300">{{$video->user->name}}</p>
        </div>
    </div>
</a>