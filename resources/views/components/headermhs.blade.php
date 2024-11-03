@vite(['resources/css/app.css','resources/js/app.js'])
<nav class="">
  <div class="w-full flex flex-wrap items-center justify-between p-1 bg-yellow-500">
    <a href="{{ route('dosen.dashboard.index') }}" class="flex items-center space-x-2 rtl:space-x-reverse mx-4">
        <img src="/assets/logo.png" class="h-12" alt="Logo" />
    </a>
    <div class="logout group">
      <a href="{{ route('logout') }}" class="btn m-2 bg-gray-800 font-semibold text-white hover:bg-gray-950">Logout</a>
    </div>
  </div>
  <div class="flex justify-center font-sans py-2">
    <div class="flex-1 text-center text-l hover:text-yellow-500 cursor-pointer font-semibold">
      <a href="{{ route('dosen.dashboard.index') }}"></a>
      Dashboard
    </div>
    <div class="contents"></div>
    <div class="flex-1 text-center text-l hover:text-yellow-500 cursor-pointer font-semibold">
      <a href="#"></a>
      Akademik
    </div>
    <div class="flex-1 text-center text-l hover:text-yellow-500 cursor-pointer font-semibold">
      <a href="#"></a>
      Jadwal
    </div>
  </div>
</nav>
  