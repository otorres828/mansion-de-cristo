<div class="mr-3 ml-3 z-10 mb-10 -mt-64 xl:mx-32 relative rounded-lg bg-gray-100 shadow">
  
    <div class="@if(count($ministeries)==0)hidden @endif absolute inset-0 top-1/3 md:mt-24 lg:mt-0 bg-gray-800 pointer-events-none" aria-hidden="true"> 
    </div>
    <div class="pt-5 pb-5 shadow-lg">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 ">
            <div class=" text-center pb-3 pt-3">
                <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading text-gray-700">
                    Conoce Los Ministerios de MDC
                </h1>
            </div>

            <div class="grid grid-cols-5 py-5">
                <div class="col-span-5 sm:col-span-5 md:col-span-2 lg:col-span-2">
                    <h5 class=" text-gray-600 text-center text-2xl ">
                        <strong>¿Buscas informacion de un ministerio?</strong>
                    </h5>
                </div>
                <div class="col-span-5 sm:col-span-5 md:col-span-3 lg:col-span-3">
                    @livewire("blog.search-ministeries")
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 pb-6">
                @foreach ($ministeries as $ministery)
                    <div class="pt-4 grid-cols-2 shadow mt-5 text-sm relative max-w-64 border-0  rounded-lg break-words text-gray-800 flex flex-col"
                        style="background-color:white;">
                        <div class="py-0 z-10 mx-6 -mt-8 rounded-lg relative">
                            <a href="{{ route('blog.show_ministery', $ministery->slug) }}"
                                class="block bg-transparent leading-none m-0 p-0 z-20 relative">
                                <!---->
                                <img class="rounded-lg shadow"
                                    src="@if ($ministery->image)https://mansiondecristo.nyc3.cdn.digitaloceanspaces.com/{{$ministery->image->url}}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif"
                                    alt="Card image cap">
                            </a>

                        </div>
                        <div class="w-full text-center relative mt-4 px-6">
                            <div class="bg-gray-300 rounded overflow-hidden shadow h-1">
                                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                    class="bg-green progress-bar h-1" style="width: 0%;">
                                </div>
                            </div>
                        </div>
                        <div class=" mt-0 px-6 flex flex-wrap items-baseline ">
                            <h4
                                class="mt-2  flex w-full text-lg leading-tight text-gray-700  hover:text-blue-800  font-bold font-serif ">
                                <a href="{{ route('blog.show_ministery', $ministery->slug) }}">{{ $ministery->name }}</a>
                            </h4>
                        </div>

                        <div class="py-2 px-6">
                            <div class="flex-grow items-center  justify-between ">
                                <h1 class="mb-3 text-gray-600 ">
                                    {{ Illuminate\Support\Str::limit($ministery->extract, 100, '...') }}</h1>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            {{ $ministeries->links() }}
        </div>
    </div>
</div>
