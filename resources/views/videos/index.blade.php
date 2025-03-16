
<x-app-layout>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <x-videos :videos="$videos"/>
        </div>
    </div>
</x-app-layout>

<div class="container">
    <h2>Latest Videos</h2>
    @foreach ($videos as $video)
        <div>
            <h3>{{ $video->title }}</h3>
            <p>{{ $video->description }}</p>
            <video width="320" controls>
                <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <a href="{{ route('videos.show', $video) }}">Watch</a>
        </div>
    @endforeach
</div>
