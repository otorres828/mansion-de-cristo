<div class="relative ">
    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
        <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
            <path
                d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </span>
    <input
        class=" py-2 border-solid border-1 border-light-blue-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md  w-full pl-10"
        wire:model="search" type="text"
        placeholder="Escribe una frase relacionada con la enseñanza que estas buscando">

    @if ($search != null && $search != ' ' && $teachings->count())
    <div class="shadow-2xl w-full rounded px-3 py-3 pb-0 absolute z-20" style="background-color: white">
        <ul
            class="bottom-auto text-sm pb-2 overflow-y-scroll h-{{$h}}">
                @foreach ($teachings as $teaching)
                <li class="py-1 hover:bg-slate-200">
                    <a href="{{ route('blog.show_teaching', [$teaching->slug,$teaching->id]) }}"
                            class="block font-sans font-semibold px-2 py-1 text-gray-600 hover:bg-primary 
                                hover:text-purple-800 leading-5 border-b">
                            {{ $teaching->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
