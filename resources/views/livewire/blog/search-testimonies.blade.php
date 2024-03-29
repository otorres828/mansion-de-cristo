<div class="relative ">
    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
        <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
            <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </span>       
    <input class=" py-1 border-solid border-4 border-light-blue-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md  w-full pl-10" wire:model="search" type="text" placeholder="Escribe una frase relacionada con el testimonio que estas buscando">

    @if($search!=null && $search!=' ' && $testimonies->count())
        <div class="shadow-2xl w-full rounded px-3 py-3 pb-0 absolute z-20" style="background-color: white">
            @foreach($testimonies as $testimony)
                <ul class=" max-h-screen  bottom-auto text-sm pb-2" >
                    <li>
                        <a href="{{route('blog.show_testimony',$testimony->slug)}}" 
                            class="block font-sans font-semibold px-2 py-1 text-gray-600 hover:bg-primary 
                                hover:text-purple-800 leading-5">
                            {{ $testimony->name }}</a>
                    </li>   
                </ul>
            @endforeach
        </div>
    @endif
</div>
{{-- <div class="row ">
    <div class="col-md-12 z-20">
        <div class="flex-shrink-0 hidden" style="display: block;">
            <input wire:model="search" type="text" class="form-control" id="search">
                @if($search!=null && $search!=' ')
                    <div class="shadow rounded px-3 py-3 pb-0 absolute" style="background-color: white">
                        @foreach($testimonies as $testimony)
                            <ul class=" max-h-screen  bottom-auto text-sm pb-2" >
                                <li>
                                    <a href="{{route('blog.show_testimony',$testimony->slug)}}" 
                                        class="block font-sans font-semibold px-2 py-1 
                                        text-gray-600 hover:bg-primary hover:text-purple-800 leading-5">
                                        {{ $testimony->name }}
                                    </a>
                                </li>   
                            </ul>
                        @endforeach
                    </div>
                @endif
        </div>
    </div>    
</div> --}}