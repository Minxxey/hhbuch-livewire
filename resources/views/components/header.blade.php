<header x-data="{ open: false }" class="flex items-center justify-between relative md:items-start">
    <!-- Logo -->
    <img src="{{ asset('logos/logo-text.png') }}" alt="Logo Image" class="w-15 h-auto block m-auto mt-2 md:hidden">
    <img src="{{ asset('logos/logo-desktop.png') }}" alt="Logo Image" class="hidden md:block h-auto w-15 mx-2">

    <!-- Burger Menu Button -->
    <div  @click="open = !open"
         class="absolute top-1 right-1 h-[35px] w-[35px] grid place-content-center overflow-visible cursor-pointer z-3 md:hidden">
        <div
            class="relative w-[35px] h-[3px] rounded-full transition-all duration-300
           before:content-[''] before:absolute before:block before:w-[35px] before:h-[3px] before:bg-white before:rounded-full
           before:transition-all before:duration-300
           after:content-[''] after:absolute after:block after:w-[35px] after:h-[3px] after:bg-white after:rounded-full
           after:transition-all after:duration-300"
            :class="{
        'bg-white before:translate-y-[10px] before:rotate-0 after:translate-y-[-10px] after:rotate-0': !open,
        'bg-transparent before:translate-y-0 before:rotate-45 after:translate-y-0 after:-rotate-45': open
    }"
        ></div>

    </div>
    <nav
        x-show="open"
        x-transition:enter="transition transform duration-700"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition transform duration-700"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="mobile-nav md:hidden fixed top-0 right-0 h-dvh w-[100%] bg-slate-800 z-2 shadow-lg flex flex-col items-start py-6 px-3"
    >
        <ul class="text-white text-xl w-full">
            <li class="ml-[3px] mb-[10px]"><a href="{{route('home')}}">Home</a></li>
            <li class="btn-light-header"><a href="#">Upload</a></li>
        </ul>
    </nav>
    <nav class="desktop-nav hidden md:block mt-1">
        <ul class="text-white text-xl w-full flex flex-row items-end gap-2 mx-2">
            <li class="ml-[3px] mb-[10px]"><a href="{{route('home')}}">Home</a></li>
            <li class="btn-light-header"><a href="#">Upload</a></li>
        </ul>
    </nav>

</header>
