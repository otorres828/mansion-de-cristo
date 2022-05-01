<li class="swiper-slide p-2 itembotoneshome ">
    <article
        class="transition duration-300 hover:opacity-90 rounded-lg shadow w-full h-80 bg-cover bg-center "
        style="background-image: url(@if ($item->image) {{ Storage::url($item->image->url) }}@else https://cdn.pixabay.com/photo/2022/01/26/05/56/stairs-6968125_960_720.jpg @endif)">
        <div class="w-full h-full px-8 flex flex-col justify-center text-center">
            <h1 class="transition duration-300 rounded-lg text-3xl text-white leading-8 font-bold p-4 hover:bg-sky-800">
                <a href="{{ $slot }}" >
                    {{ $item->name }}
                </a>
            </h1>
        </div>
    </article>
</li>