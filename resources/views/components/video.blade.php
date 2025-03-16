@props(['video'])
<a href="{{route('videos.show',$video->id)}}" class="flex flex-col space-y-2 hover:bg-white/10 p-2">
    <!-- Thumbnail -->
    <div class="relative w-full aspect-video rounded-lg overflow-hidden bg-white/40">
        <img src="https://picsum.photos/seed/{{rand(0,1000000)}}/800/300" alt="Video Title" class="w-full h-full object-cover ">
    </div>

    <!-- Video Details -->
    <div class="flex space-x-4 mt-2">
        <!-- Channel Avatar -->
        <img src="https://picsum.photos/seed/{{rand(0,1000000)}}/100/100" alt="Channel Name" class="w-10 h-10 rounded-full ml-4">

        <!-- Video Info -->
        <div class="flex flex-col gap-y-1">
            <h3 class="text-sm font-semibold line-clamp-2">{{$video->title}}</h3>
            <p class="text-xs text-gray-300">{{$video->user->name}}</p>
            <p class="text-xs text-gray-300">{{formatViews($video->views)}} مشاهدة</p>
        </div>
    </div>
</a>