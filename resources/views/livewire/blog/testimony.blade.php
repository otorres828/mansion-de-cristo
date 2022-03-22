<div class="mr-3 ml-3
        z-10
        mb-10
        -mt-64
        xl:mx-32
        relative
        rounded-lg
        bg-gray-100
        shadow">

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
    
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mx-auto">
                    @foreach ($testimonies as $testimony)
                        <div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-9">
                            <a href="{{route('blog.show_testimony',$testimony->slug)}}">
                                <div class="flex justify-center md:justify-end -mt-16">
                                    <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" src="@if($testimony->image){{asset('storage/'.$testimony->image->url)}}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif">
                                </div>
                                <div>
                                    <h2 class="text-gray-800 text-2xl font-semibold">{{$testimony->name}}</h2>
                                </div>
                                <div class="flex justify-end mt-4">
                                    <a href="#" class="text-xl font-medium text-indigo-500">{{$testimony->autor}}</a>
                                </div>        
                            </a>
                        </div>
                    @endforeach
                </div>
                {{$testimonies->links()}}
            </div>
        </div>   
</div>
