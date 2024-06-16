<x-layout>

    <h1 class="title">Hello {{ auth()->user()->name }}</h1>

    {{-- Create post  form --}}
    <div class="card mb-4">

        <h2 class = "font-bold mb-4 ">Create a new post</h2>



      


        {{-- session messages --}}

        @if (session('success'))
            <div class="mb-2">
                <x-flashMsg msg="{{ session('success') }}"   bg="bg-yellow-500"/>
            </div>
        @endif




        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            {{-- Title --}}
            <div class="mb-4">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="input">
                @error('title')
                    <p class='error'>{{ $message }}</p>
                @enderror
            </div>


            {{-- Body --}}
            <div class="mb-4">
                <label for="body">Post body</label>

                <textarea name="body" id="body"rows="5" class="input">

                  {{ old('body') }}
                </textarea>
                @error('body')
                    <p class='error'>{{ $message }}</p>
                @enderror


            </div>

            {{-- Submit Button --}}

            <button class="btn primary-btn ">Create</button>


        </form>
    </div>



    {{-- User posts --}}




<h2 class="font-bold mb-4"> YOur Latest Posts</h2>
<div class="grid grid-cols-2 gap-6">
    @foreach ($posts as $post)
       <x-postCard :post="$post"/>
    @endforeach

    
</div>





<div>

    {{ $posts->links()}}
 
 </div>






</x-layout>
