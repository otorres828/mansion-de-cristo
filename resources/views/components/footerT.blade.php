
<footer class="p-4  rounded-lg shadow md:px-6 md:py-8 ">
    <div class="sm:flex sm:items-center sm:justify-between">
        <a class="flex items-center mb-4 sm:mb-0">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-gray-800">O.E.P. Mansion de Cristo</span>
        </a>
        <ul class="flex flex-wrap items-center mb-6 text-sm text-black sm:mb-0 dark:text-black">
            <li>
                <a href="{{ route('blog.acercade') }}" class="mr-4 hover:underline md:mr-6 ">Acerca de</a>
            </li>
            <li>
                <a href="/privacidad" class="mr-4 hover:underline md:mr-6">Politicas de Privacidad</a>
            </li>
			<li>
                <a href="/terminos" class="mr-4 hover:underline md:mr-6">Terminos y Condiciones</a>
            </li>
            <li>
                <a href="{{ route('blog.contact.index') }}" class="hover:underline">Contactanos</a>
            </li>
        </ul>
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
    <span class="block text-sm text-gray-800 sm:text-center dark:text-gray-800">© 2022 <a class="hover:underline"><i
                class="fa fa-telegram" aria-hidden="true">@otorres828</i></a>. Todos los derechos reservados.
    </span>
</footer>