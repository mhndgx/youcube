<x-app-layout>
    <div class="bg-gradient-to-l from-gray-800 via-gray-900 to-gray-950 flex ">
        <div class="py-14 px-14">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 text-white font-bold">
                <div class="container space-y-3">
                    <video width="1000" class="aspect-video rounded-xl shadow-2xl mb-4" controls>
                        <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="flex items-center justify-between mt-24">
                        <h2 class="text-2xl">{{ $video->title }}</h2>
                        <div class="flex gap-x-2 items-center">
                            <p class="text-white font-extrabold ">{{$video->likes}}</p>
                            <form method="POST" action="{{ route('video.like', $video->id) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="group p-3 hover:bg-gray-400/20 hover:rounded-full hover:text-black">
                                    <x-bx-like class="group-hover:text-green-600 w-6 h-6" />
                                </button>
                            </form>
                            
                            <form method="POST" action="{{ route('video.dislike', $video->id) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="group p-3 hover:bg-gray-400/20 hover:rounded-full hover:text-black">
                                    <x-bx-like class="group-hover:text-red-600 w-6 h-6 scale-y-[-1]" />
                                </button>
                            </form>
                        </div>
                    </div>
                    <h2 class="text-lg mt-8">{{ $video->views }} مشاهدة</h2>
                    <div class="p-6 bg-gradient-to-t from-gray-600 to-gray-500 rounded-xl shadow-lg">

                        <p class="text-slate-300">{{ $video->description }}</p>
                    </div>
                </div>
                <div class="mt-12 p-4 bg-gray-950 rounded-xl">
                    <div class="mb-6 ">
                        <form method="POST" action={{ route('comment.store', $video->id) }} class="flex gap-x-4">
                            @csrf
                            <img src="https://picsum.photos/seed/{{rand(0,1000000)}}/50/50" alt="" class="w-14 h-14 rounded-full">
                            <input name="comment" type="text" placeholder="اضغط لإضافة تعليق..." class="w-full bg-gray-900 text-white border-none outline-none rounded-lg py-2">
                            <button type="submit" class="p-4 bg-gray-700 rounded-lg">ارسال</button>
                        </form>
                        <div class="h-[2px] w-full bg-white/10 mt-3"></div>
                    </div>
                    <div class="flex flex-col gap-y-4">
                        @if (count($comments) === 0)
                            <p class="text-gray-400 text-center">لا يوجد أي تعليقات على هذا الفيديو.</p>
                        @endif
                        @foreach ($comments as $comment)
                            <div class="flex gap-x-4 items-start bg-gray-900 rounded-lg p-4">
                                <img src="https://picsum.photos/seed/{{rand(0,1000000)}}/48/48" alt="" class="w-12 h-12 rounded-full">
                                <div class="flex-col h-full">
                                    <p class=" flex-1 text-sm font-bold pt-1">{{$comment->user->name}}</p>
                                    <p class=" flex-1 text-sm font-bold pt-1">{{$comment->comment}}</p>
                                    <div class="flex gap-x-2 items-center pt-4">
                                        <p class="text-sm text-slate-500 font-bold pl-2">{{$comment->likes}}</p>
                                        <form method="POST" action="{{ route('comment.like', $comment->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit">
                                                <x-bx-like class="w-5 h-5" />
                                            </button>
                                        </form>
                                        
                                        <form method="POST" action="{{ route('comment.dislike', $comment->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit">
                                                <x-bx-like class="w-5 h-5 scale-y-[-1]" />
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>     
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-8 max-w-8xl flex-1">
            <x-videos :currentVideo="$video" type="col" :videos="$videos" />>
        </div>
    </div>
</x-app-layout>
