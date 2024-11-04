@vite(['resources/css/app.css','resources/js/app.js'])
<nav class="">
  <div class="w-full flex flex-wrap items-center justify-between p-1 bg-yellow-500">
    <a href="{{ route('dosen.dashboard.index') }}" class="flex items-center space-x-2 rtl:space-x-reverse mx-4">
        <img src="/assets/logo.png" class=" h-14" alt="Logo" />
    </a>
    <div class="logout group flex flex-row">
      <svg class="mt-2" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M5 5v14a1 1 0 0 0 1 1h3v-2H7V6h2V4H6a1 1 0 0 0-1 1zm14.242-.97-8-2A1 1 0 0 0 10 3v18a.998.998 0 0 0 1.242.97l8-2A1 1 0 0 0 20 19V5a1 1 0 0 0-.758-.97zM15 12.188a1.001 1.001 0 0 1-2 0v-.377a1 1 0 1 1 2 .001v.376z"></path>
      </svg>
      <a href="{{ route('logout') }}" class="btn m-2 bg-gray-800 font-semibold text-white hover:bg-gray-950">Logout</a>
    </div>
  </div>
  <div class="flex justify-center font-sans py-2 m-2 ">
    <div class="flex-1 text-center text-l hover:text-yellow-500 cursor-pointer font-semibold ease-in-out duration-200">
      <a href="{{ route('dosen.dashboard.index') }}">Dashboard</a>
    </div>
    <div class="contents"></div>
    <div class="flex-1 text-center text-l hover:text-yellow-500 cursor-pointer font-semibold ease-in-out duration-200">
      <a href="{{ route('dosen.akademik.index') }}">Akademik</a>
    </div>
    <div class="flex-1 text-center text-l hover:text-yellow-500 cursor-pointer font-semibold ease-in-out duration-200">
      <a href="{{ route('dosen.perwalian.index') }}">Perwalian</a>
    </div>
  </div>
</nav>
  