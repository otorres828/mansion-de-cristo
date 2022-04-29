<div  wire:target="loadTeachings"> 
    
    <div class="relative mx-auto">
        <div class="swiper mw " >
            <div class="next-prev absolute inset-y-0 left-0 z-10 flex items-center">
                <button  class="bg-white flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none text-blue-400">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-6 h-6">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <ul class="swiper-wrapper">
                @foreach ($teachings as $teaching)
                    <li class="swiper-slide p-2 " >
                        <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full hover:bg-slate-100">
                            <figure class="aspect-w-16 aspect-h-9">
                                <img class="object-cover object-center"
                                    src="{{ Storage::url($teaching->image->url) }}"
                                    alt="Aprende a crear un blog autoadministrable con Laravel 8">
                            </figure>

                            <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                                <h1 class="text-lg mb-1 leading-5">{{ $teaching->name }}
                                    con...</h1>
                                <p class="text-gray-500 text-sm mb-1 mt-auto">Prof: Victor Arana Flores</p>

                                <ul class="flex items-center space-x-1 text-xs mb-1">

                                    <li>
                                        <i class="fas fa-star text-yellow-400"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star text-yellow-400"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star text-yellow-400"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star text-yellow-400"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star text-yellow-400"></i>
                                    </li>
                                </ul>
                                <p class="font-semibold mb-2">

                                    <span class="text-green-500">
                                        Gratis
                                    </span>

                                </p>

                                <a href="https://codersfree.com/cursos/aprende-a-crear-un-blog-autoadministrable-con-laravel-8"
                                    class="btn btn-blue text-center">
                                    Más información
                                </a>
                            </div>
                        </article>
                    </li>   
                @endforeach
                
            </ul>
            <div class="next-next absolute inset-y-0 right-0 z-10 flex items-center">
                <button  class="bg-white  flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none text-blue-400">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-6 h-6">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            {{-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> --}}
        </div>

 
    </div>
</div>
