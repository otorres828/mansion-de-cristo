<div class="pb-14">
    {{-- <div id="alert-1" class="flex p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200 alert-del" role="alert">
        <svg class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
          A simple info alert with an <a href="#" class="font-semibold underline hover:text-blue-800 dark:hover:text-blue-900">example link</a>. Give it a click if you like.
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300" data-dismiss-target="#alert-1" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
      </div> --}}
    
      <div class="container p-2">
        @if (session()->has('message'))
            @if (isset($validar->verif_email_status))
            {{ $validar->verif_email_status }}
            @else
            solo aepta gmail
            @endif
        @endif
    </div>
    <form wire:submit.prevent="suscribirse">

        <div class="container font-sans bg-green-100 rounded p-4 md:p-24 text-center mx-auto">
            <h2 class="font-bold break-normal text-2xl md:text-4xl">Subscribete</h2>
            <h3 class="font-bold break-normal  text-gray-600 text-base md:text-xl">Se el primero en obtener las
                ultimas noticias de MDC</h3>
            <div class="w-full text-center pt-4">
                <div class="max-w-sm mx-auto p-1 pr-0 flex flex-wrap items-center">
                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <input wire:model="email" type="email" name="email" placeholder="olivertorres@example.com"
                        class="flex-1 appearance-none rounded shadow p-3 text-gray-600 mr-2 focus:outline-none">
                    <button type="submit" 


                        class="flex-1 mt-4 md:mt-0 block md:inline-block appearance-none bg-green-500 text-white text-base font-semibold tracking-wider uppercase py-4 rounded shadow hover:bg-green-400">SUBSCRIBIRSE</button>
                </div>
            </div>
        </div>
    </form>
</div>
