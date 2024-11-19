@vite(['resources/css/app.css','resources/js/app.js'])
<link rel="stylesheet" href="https://rsms.me/inter/inter.css">

<!-- Sidebar -->
<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 mt-3 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav"
    id="drawer-navigation"
>
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
        <ul class="space-y-2">
            @if($user->role === 'dosen')  <!-- Menu Dosen -->
                <!-- Dashboard Dosen -->
                <li>
                    <a
                        href="{{ route('dosen.dashboard.index') }}"
                        class="flex items-center p-2 text-base font-medium rounded-lg group
                        {{ Request::is('dosen/dashboard') ? 'bg-yellow-400 text-black' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}"
                    >
                        <svg
                            aria-hidden="true"
                            class="w-6 h-6 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white
                            {{ Request::is('dosen/dashboard') ? 'text-black' : 'text-gray-500 dark:text-gray-400' }}"
                            fill="currentColor"
                            viewBox="0 0 36 36"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                class="clr-i-solid clr-i-solid-path-1"
                                d="M33,19a1,1,0,0,1-.71-.29L18,4.41,3.71,18.71a1,1,0,0,1-1.41-1.41l15-15a1,1,0,0,1,1.41,0l15,15A1,1,0,0,1,33,19Z"
                            ></path>
                            <path
                                class="clr-i-solid clr-i-solid-path-2"
                                d="M18,7.79,6,19.83V32a2,2,0,0,0,2,2h7V24h6V34h7a2,2,0,0,0,2-2V19.76Z"
                            ></path>
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>

                <!-- Perwalian -->
                <li>
                    <a
                        href="{{ route('dosen.perwalian.index') }}"
                        class="flex items-center p-2 text-base font-medium rounded-lg group
                        {{ Request::is('dosen/perwalian') ? 'bg-yellow-400 text-black' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}"
                    >
                        <svg
                            class="w-6 h-6 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white
                            {{ Request::is('dosen/perwalian') ? 'text-black' : 'text-gray-500 dark:text-gray-400' }}"
                            fill="currentColor"
                            viewBox="0 0 52 52"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M42,22.3c-2.8-1.1-3.2-2.2-3.2-3.3s0.8-2.2,1.8-3c1.7-1.4,2.6-3.5,2.6-5.8c0-4.4-2.9-8.2-8-8.2c-4.7,0-7.5,3.2-7.9,7.1c0,0.4,0.2,0.7,0.5,0.9c3.8,2.4,6.1,6.6,6.1,11.7c0,3.8-1.5,7.2-4.2,9.6c-0.2,0.2-0.2,0.6,0,0.8c0.7,0.5,2.3,1.2,3.3,1.7c0.3,0.1,0.5,0.2,0.8,0.2h12.1c2.3,0,4.1-1.9,4.1-4v-0.6C50,25.9,46.2,24,42,22.3z"
                            ></path>
                            <path
                                d="M28.6,36.2c-3.4-1.4-3.9-2.6-3.9-3.9c0-1.3,1-2.6,2.1-3.6c2-1.7,3.1-4.1,3.1-6.9c0-5.2-3.4-9.7-9.6-9.7c-6.1,0-9.6,4.5-9.6,9.7c0,2.8,1.1,5.2,3.1,6.9c1.1,1,2.1,2.3,2.1,3.6c0,1.3-0.5,2.6-4,3.9c-5,2-9.9,4.3-9.9,8.5V45v1c0,2.2,1.8,4,4.1,4h27.7c2.3,0,4.2-1.8,4.2-4v-1v-0.4C38,40.5,33.6,38.2,28.6,36.2z"
                            ></path>
                        </svg>
                        <span class="ml-3">Perwalian</span>
                    </a>
                </li>

            @elseif($user->role === 'dekan')  <!-- Menu Dekan -->
                <!-- Dashboard Dekan -->
                <li>
                    <a
                        href="{{ route('dekan.dashboard.index') }}"
                        class="flex items-center p-2 text-base font-medium rounded-lg group
                        {{ Request::is('dekan/home') ? 'bg-yellow-400 text-black' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}"
                    >
                        <svg
                            aria-hidden="true"
                            class="w-6 h-6 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white
                            {{ Request::is('dekan/home') ? 'text-black' : 'text-gray-500 dark:text-gray-400' }}"
                            fill="currentColor"
                            viewBox="0 0 36 36"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                class="clr-i-solid clr-i-solid-path-1"
                                d="M33,19a1,1,0,0,1-.71-.29L18,4.41,3.71,18.71a1,1,0,0,1-1.41-1.41l15-15a1,1,0,0,1,1.41,0l15,15A1,1,0,0,1,33,19Z"
                            ></path>
                            <path
                                class="clr-i-solid clr-i-solid-path-2"
                                d="M18,7.79,6,19.83V32a2,2,0,0,0,2,2h7V24h6V34h7a2,2,0,0,0,2-2V19.76Z"
                            ></path>
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>

                <!-- Usulan Jadwal Kuliah -->
                <li>
                    <a
                        href="{{ route('dekan.jadwal.index') }}"
                        class="flex items-center p-2 text-base font-medium rounded-lg group
                        {{ Request::is('dekan/jadwal') ? 'bg-yellow-400 text-black' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}"
                    >
                        <svg
                            class="w-6 h-6 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white
                            {{ Request::is('dekan/jadwal') ? 'text-black' : 'text-gray-500 dark:text-gray-400' }}"
                            fill="currentColor"
                            viewBox="0 0 52 52"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M42,22.3c-2.8-1.1-3.2-2.2-3.2-3.3s0.8-2.2,1.8-3c1.7-1.4,2.6-3.5,2.6-5.8c0-4.4-2.9-8.2-8-8.2c-4.7,0-7.5,3.2-7.9,7.1c0,0.4,0.2,0.7,0.5,0.9c3.8,2.4,6.1,6.6,6.1,11.7c0,3.8-1.5,7.2-4.2,9.6c-0.2,0.2-0.2,0.6,0,0.8c0.7,0.5,2.3,1.2,3.3,1.7c0.3,0.1,0.5,0.2,0.8,0.2h12.1c2.3,0,4.1-1.9,4.1-4v-0.6C50,25.9,46.2,24,42,22.3z"
                            ></path>
                            <path
                                d="M28.6,36.2c-3.4-1.4-3.9-2.6-3.9-3.9c0-1.3,1-2.6,2.1-3.6c2-1.7,3.1-4.1,3.1-6.9c0-5.2-3.4-9.7-9.6-9.7c-6.1,0-9.6,4.5-9.6,9.7c0,2.8,1.1,5.2,3.1,6.9c1.1,1,2.1,2.3,2.1,3.6c0,1.3-0.5,2.6-4,3.9c-5,2-9.9,4.3-9.9,8.5V45v1c0,2.2,1.8,4,4.1,4h27.7c2.3,0,4.2-1.8,4.2-4v-1v-0.4C38,40.5,33.6,38.2,28.6,36.2z"
                            ></path>
                        </svg>
                        <span class="ml-3">Jadwal Kuliah</span>
                    </a>
                </li>

                <!-- Usulan Ruang Kuliah -->
                <li>
                    <a
                        href="{{ route('dekan.ruang.index') }}"
                        class="flex items-center p-2 text-base font-medium rounded-lg group
                        {{ Request::is('dekan/ruang') ? 'bg-yellow-400 text-black' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}"
                    >
                        <svg
                            class="w-6 h-6 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white
                            {{ Request::is('dekan/ruang') ? 'text-black' : 'text-gray-500 dark:text-gray-400' }}"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M12 2C8.14 2 5 5.14 5 9c0 1.66.64 3.17 1.69 4.32L12 22l5.31-8.68A6.977 6.977 0 0019 9c0-3.86-3.14-7-7-7zm0 11c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3z"
                            ></path>
                        </svg>
                        <span class="ml-3">Ruang Kuliah</span>
                    </a>
                </li>

            @elseif($user->role === 'kaprodi')  <!-- Menu Kaprodi -->
                <!-- Dashboard Kaprodi -->
                <li>
                    <a
                        href="{{ route('kaprodi.dashboard.index') }}"
                        class="flex items-center p-2 text-base font-medium rounded-lg group
                        {{ Request::is('kaprodi/home') ? 'bg-yellow-400 text-black' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}"
                    >
                        <svg
                            aria-hidden="true"
                            class="w-6 h-6 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white
                            {{ Request::is('kaprodi/home') ? 'text-black' : 'text-gray-500 dark:text-gray-400' }}"
                            fill="currentColor"
                            viewBox="0 0 36 36"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                class="clr-i-solid clr-i-solid-path-1"
                                d="M33,19a1,1,0,0,1-.71-.29L18,4.41,3.71,18.71a1,1,0,0,1-1.41-1.41l15-15a1,1,0,0,1,1.41,0l15,15A1,1,0,0,1,33,19Z"
                            ></path>
                            <path
                                class="clr-i-solid clr-i-solid-path-2"
                                d="M18,7.79,6,19.83V32a2,2,0,0,0,2,2h7V24h6V34h7a2,2,0,0,0,2-2V19.76Z"
                            ></path>
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>

                <!-- Kelola Mata Kuliah -->
                <li>
                    <a
                        href="{{ route('kaprodi.matakuliah.index') }}"
                        class="flex items-center p-2 text-base font-medium rounded-lg group
                        {{ Request::is('kaprodi/matakuliah') ? 'bg-yellow-400 text-black' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}"
                    >
                        <svg
                            class="w-6 h-6 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white
                            {{ Request::is('kaprodi/matakuliah') ? 'text-black' : 'text-gray-500 dark:text-gray-400' }}"
                            fill="currentColor"
                            viewBox="0 0 52 52"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M42,22.3c-2.8-1.1-3.2-2.2-3.2-3.3s0.8-2.2,1.8-3c1.7-1.4,2.6-3.5,2.6-5.8c0-4.4-2.9-8.2-8-8.2c-4.7,0-7.5,3.2-7.9,7.1c0,0.4,0.2,0.7,0.5,0.9c3.8,2.4,6.1,6.6,6.1,11.7c0,3.8-1.5,7.2-4.2,9.6c-0.2,0.2-0.2,0.6,0,0.8c0.7,0.5,2.3,1.2,3.3,1.7c0.3,0.1,0.5,0.2,0.8,0.2h12.1c2.3,0,4.1-1.9,4.1-4v-0.6C50,25.9,46.2,24,42,22.3z"
                            ></path>
                            <path
                                d="M28.6,36.2c-3.4-1.4-3.9-2.6-3.9-3.9c0-1.3,1-2.6,2.1-3.6c2-1.7,3.1-4.1,3.1-6.9c0-5.2-3.4-9.7-9.6-9.7c-6.1,0-9.6,4.5-9.6,9.7c0,2.8,1.1,5.2,3.1,6.9c1.1,1,2.1,2.3,2.1,3.6c0,1.3-0.5,2.6-4,3.9c-5,2-9.9,4.3-9.9,8.5V45v1c0,2.2,1.8,4,4.1,4h27.7c2.3,0,4.2-1.8,4.2-4v-1v-0.4C38,40.5,33.6,38.2,28.6,36.2z"
                            ></path>
                        </svg>
                        <span class="ml-3">Mata Kuliah</span>
                    </a>
                </li>

                <!-- Kelola Jadwal -->
                <li>
                    <a
                        href="{{ route('kaprodi.jadwal.index') }}"
                        class="flex items-center p-2 text-base font-medium rounded-lg group
                        {{ Request::is('kaprodi/jadwal') ? 'bg-yellow-400 text-black' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}"
                    >
                        <svg
                            class="w-6 h-6 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white
                            {{ Request::is('kaprodi/jadwal') ? 'text-black' : 'text-gray-500 dark:text-gray-400' }}"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M12 2C8.14 2 5 5.14 5 9c0 1.66.64 3.17 1.69 4.32L12 22l5.31-8.68A6.977 6.977 0 0019 9c0-3.86-3.14-7-7-7zm0 11c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3z"
                            ></path>
                        </svg>
                        <span class="ml-3">Jadwal</span>
                    </a>
                </li>

            @elseif($user->role === 'akademik')  <!-- Menu Akademik -->
                <!-- Dashboard Akademik -->
                <li>
                    <a
                        href="{{ route('akademik.dashboard.index') }}"
                        class="flex items-center p-2 text-base font-medium rounded-lg group
                        {{ Request::is('akademik/home') ? 'bg-yellow-400 text-black' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}"
                    >
                        <svg
                            aria-hidden="true"
                            class="w-6 h-6 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white
                            {{ Request::is('akademik/home') ? 'text-black' : 'text-gray-500 dark:text-gray-400' }}"
                            fill="currentColor"
                            viewBox="0 0 36 36"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                class="clr-i-solid clr-i-solid-path-1"
                                d="M33,19a1,1,0,0,1-.71-.29L18,4.41,3.71,18.71a1,1,0,0,1-1.41-1.41l15-15a1,1,0,0,1,1.41,0l15,15A1,1,0,0,1,33,19Z"
                            ></path>
                            <path
                                class="clr-i-solid clr-i-solid-path-2"
                                d="M18,7.79,6,19.83V32a2,2,0,0,0,2,2h7V24h6V34h7a2,2,0,0,0,2-2V19.76Z"
                            ></path>
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>

                <!-- Ruangan -->
                <li>
                    <a
                        href="{{ route('akademik.ruang.index') }}"
                        class="flex items-center p-2 text-base font-medium rounded-lg group
                        {{ Request::is('akademik/ruang') ?  'bg-yellow-400 text-black' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}"
                    >
                        <svg
                            class="w-6 h-6 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white
                            {{ Request::is('akademik/ruang') ?  'text-black' : 'text-gray-500 dark:text-gray-400' }}"
                            fill="currentColor"
                            viewBox="0 0 52 52"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M42,22.3c-2.8-1.1-3.2-2.2-3.2-3.3s0.8-2.2,1.8-3c1.7-1.4,2.6-3.5,2.6-5.8c0-4.4-2.9-8.2-8-8.2c-4.7,0-7.5,3.2-7.9,7.1c0,0.4,0.2,0.7,0.5,0.9c3.8,2.4,6.1,6.6,6.1,11.7c0,3.8-1.5,7.2-4.2,9.6c-0.2,0.2-0.2,0.6,0,0.8c0.7,0.5,2.3,1.2,3.3,1.7c0.3,0.1,0.5,0.2,0.8,0.2h12.1c2.3,0,4.1-1.9,4.1-4v-0.6C50,25.9,46.2,24,42,22.3z"
                            ></path>
                            <path
                                d="M28.6,36.2c-3.4-1.4-3.9-2.6-3.9-3.9c0-1.3,1-2.6,2.1-3.6c2-1.7,3.1-4.1,3.1-6.9c0-5.2-3.4-9.7-9.6-9.7c-6.1,0-9.6,4.5-9.6,9.7c0,2.8,1.1,5.2,3.1,6.9c1.1,1,2.1,2.3,2.1,3.6c0,1.3-0.5,2.6-4,3.9c-5,2-9.9,4.3-9.9,8.5V45v1c0,2.2,1.8,4,4.1,4h27.7c2.3,0,4.2-1.8,4.2-4v-1v-0.4C38,40.5,33.6,38.2,28.6,36.2z"
                            ></path>
                        </svg>
                        <span class="ml-3">Ruangan</span>
                    </a>
                </li>
            @endif
        </ul>

        <!-- Calendar Section -->
        <ul class="pt-28 mt-28 space-y-3">
            <li>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden dark:bg-gray-700">
                    <div class="flex items-center justify-between px-4 py-3 bg-black">
                        <button id="prevMonth" class="text-white text-sm">Prev</button>
                        <h2 id="currentMonth" class="text-white font-medium text-sm">March</h2>
                        <button id="nextMonth" class="text-white text-sm">Next</button>
                    </div>
                    <div class="grid grid-cols-7 gap-2 p-2" id="calendar">
                        <!-- Calendar Days Go Here -->
                    </div>
                    <div id="myModal" class="modal hidden fixed inset-0 flex items-center justify-center z-50">
                        <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
                        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                            <div class="modal-content py-4 text-left px-6">
                                <div class="flex justify-between items-center pb-3">
                                    <p class="text-lg font-bold">Selected Date</p>
                                    <button id="closeModal" class="modal-close px-3 py-1 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring">✕</button>
                                </div>
                                <div id="modalDate" class="text-lg font-semibold"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <script>
      function generateCalendar(year, month) {
          const calendarElement = document.getElementById('calendar');
          const currentMonthElement = document.getElementById('currentMonth');
          
          const firstDayOfMonth = new Date(year, month, 1);
          const daysInMonth = new Date(year, month + 1, 0).getDate();
          
          calendarElement.innerHTML = '';
          const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
          currentMonthElement.innerText = `${monthNames[month]} ${year}`;
          
          const firstDayOfWeek = firstDayOfMonth.getDay();
          const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
          daysOfWeek.forEach(day => {
              const dayElement = document.createElement('div');
              dayElement.className = 'text-center font-semibold';
              dayElement.style.fontSize = '13px';
              dayElement.innerText = day;
              calendarElement.appendChild(dayElement);
          });

          for (let i = 0; i < firstDayOfWeek; i++) {
              const emptyDayElement = document.createElement('div');
              calendarElement.appendChild(emptyDayElement);
          }

          for (let day = 1; day <= daysInMonth; day++) {
              const dayElement = document.createElement('div');
              dayElement.className = 'text-center py-2 border cursor-pointer';
              dayElement.style.fontSize = '13px';
              dayElement.innerText = day;

              const currentDate = new Date();
              if (year === currentDate.getFullYear() && month === currentDate.getMonth() && day === currentDate.getDate()) {
                  dayElement.classList.add('bg-yellow-400', 'text-white');
              }

              dayElement.addEventListener('click', () => showModal(`${monthNames[month]} ${day}, ${year}`));

              calendarElement.appendChild(dayElement);
          }
      }

      const currentDate = new Date();
      let currentYear = currentDate.getFullYear();
      let currentMonth = currentDate.getMonth();
      generateCalendar(currentYear, currentMonth);

      document.getElementById('prevMonth').addEventListener('click', () => {
          currentMonth--;
          if (currentMonth < 0) {
              currentMonth = 11;
              currentYear--;
          }
          generateCalendar(currentYear, currentMonth);
      });

      document.getElementById('nextMonth').addEventListener('click', () => {
          currentMonth++;
          if (currentMonth > 11) {
              currentMonth = 0;
              currentYear++;
          }
          generateCalendar(currentYear, currentMonth);
      });

      function showModal(selectedDate) {
          const modal = document.getElementById('myModal');
          const modalDateElement = document.getElementById('modalDate');
          modalDateElement.innerText = selectedDate;
          modal.classList.remove('hidden');
      }

      document.getElementById('closeModal').addEventListener('click', () => {
          document.getElementById('myModal').classList.add('hidden');
      });
    </script>
</aside>
