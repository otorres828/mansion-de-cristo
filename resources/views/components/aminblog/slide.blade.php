<div>

    <div class="relative mx-auto">
        <div class="swiper general">
            <div class="next-prev absolute inset-y-0 left-0 z-10 flex items-center">
                <button
                    class="bg-white flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none text-blue-400">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <ul class="swiper-wrapper">
                {{ $slot }}
            </ul>
            <div class="next-next absolute inset-y-0 right-0 z-10 flex items-center">
                <button
                    class="bg-white  flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none text-blue-400">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>