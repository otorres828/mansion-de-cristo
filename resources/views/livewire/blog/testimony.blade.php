<div class="mr-3 ml-3
        z-10
        mb-10
        -mt-64
        xl:mx-32
        relative
        rounded-lg
        bg-gray-100
        shadow">
        
        <div class="absolute inset-0 top-1/2 md:mt-24 lg:mt-0 bg-gray-800 pointer-events-none" aria-hidden="true"> 
        </div>
        <div class="pt-5 pb-5 shadow-lg">
            <div class="max-w-6xl mx-auto px-6 sm:px-6 lg:px-6">
                <div class=" text-center pb-3 pt-3">
                    <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading text-gray-700">
                        Conoce Los Testimonios Mas Impactantes
                    </h1>
                </div>
    
                <div class="grid grid-cols-5 py-5">
                    <div class="col-span-5 sm:col-span-5 md:col-span-2 lg:col-span-2">
                        <h5 class=" text-gray-600 text-center text-2xl ">
                            <strong>Encuentra algun testimonio</strong>
                        </h5>   
                    </div>
                    <div class="col-span-5 sm:col-span-5 md:col-span-3 lg:col-span-3">
                        @livewire("blog.search-testimonies")
                    </div>    
                </div>
    

                
            {{-- TESTIMONIOS --}}
            <section class="relative ">
                
                <div class="relative max-w-6xl mx-auto px-4 sm:px-6">
                    <div class="">
                       
                        <div
                            class="max-w-sm mx-auto grid gap-6 md:grid-cols-2 lg:grid-cols-3 items-start md:max-w-2xl lg:max-w-none">
                            @foreach ($testimonies as $testimony)
                                <div class="relative flex flex-col items-center p-6 bg-white rounded shadow-xl">
                                    <div class="flex justify-center">
                                        <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500"
                                            src="@if ($testimony->image) {{ asset('storage/' . $testimony->image->url) }}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif">
                                    </div>
                                    <h4 class="text-xl font-bold leading-snug tracking-tight mb-1 text-center"><a
                                            class="hover:to-blue-700"
                                            href="{{ route('blog.show_testimony', $testimony) }}">{{ $testimony->name }}</a>
                                    </h4>
                                    <p class="text-gray-600 text-center">
                                        {{ Illuminate\Support\Str::limit($testimony->extract, 100, '...') }}</p>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </section>
            <div class="pt-3">

                {{$testimonies->links()}}
            </div>
            </div>
        </div>   
</div>
