<x-layout>



    <h1 class="title">Latest Posts</h1>


    <div class="grid grid-cols-2 gap-6">
        @foreach ($posts as $post)
            <div class ="Card bg-lime-300 mb-1 p-8">


                <h2 class="font-bold text-xl">{{ $post->title }}</h2>


                <div class="text-xs font-light mb-4">
                    <span>Posted {{ $post->created_at->diffForHumans() }} by</span>
                    <a href="" class="text-blue-500">USERNAME</a>
                </div>

                <div class="text-sm">
                    <p>{{ Str::words($post->body, 20) }}</p>
                </div>

            </div>
        @endforeach
    </div>



    <div>
      {{$posts->links()}}
    </div>




</x-layout>
