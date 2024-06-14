

<x-layout>
    <h1 class="title ">Login</h1>

  
    <div class="mx-auto max-w-screen-sm card" >
      
      <form action="{{route('login')}}" method="post">
        @csrf
    


      
          {{-- email --}}
          <div class="mb-4"> 
            <label for="email">Email</label>
             <input type="text" name="email" value="{{old('email')}}"
             class="input">
             @error('email')
             <p class='error'>{{$message}}</p>
             @enderror   
             </div> 


             {{-- Password --}}
        <div class="mb-4"> 
          <label for="password">Password</label>
           <input type="password" name="password"  value="{{old('password')}}"
            class="input">
           @error('password')
           <p class='error'>{{$message}}</p>
           @enderror   
           </div> 


           {{-- Remember checkbox --}}

           <div class="mb-4">
            <input type="checkbox" name="remember" id="remember"> 
            <label for="remember">Rember me</label>
           </div>

       
           @error('failed')
           <p class='error'>{{$message}}</p>
           @enderror 
           {{-- Submit Button --}}

           <button class="btn primary-btn ">Login</button>


      </form>
    </div>
  </x-layout>



