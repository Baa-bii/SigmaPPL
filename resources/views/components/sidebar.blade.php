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
            @if($user->role === 'dosen')
                <!-- Menu Dosen -->
                <li>
                    <a
                        href="{{ route('dosen.dashboard.index') }}"
                        class="flex items-center p-2 text-base font-medium rounded-lg group
                        {{ Request::is('dosen/dashboard') ? 'bg-yellow-400 text-black' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}"
                    >
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="..."></path>
                        </svg>
                        <span class="ml-3">Dashboard Dosen</span>
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('dosen.perwalian.index') }}"
                        class="flex items-center p-2 text-base font-medium rounded-lg group
                        {{ Request::is('dosen/perwalian') ? 'bg-yellow-400 text-black' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}"
                    >
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="..."></path>
                        </svg>
                        <span class="ml-3">Perwalian</span>
                    </a>
                </li>
            @elseif($user->role === 'dekan')
                <!-- Menu Dekan -->
                <li>
                    <a href="{{ route('dekan.dashboard.index') }}" class="flex items-center p-2 text-base font-medium rounded-lg group
                        {{ Request::is('dekan/dashboard') ? 'bg-yellow-400 text-black' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="..."></path>
                        </svg>
                        <span class="ml-3">Dashboard Dekan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dekan.usulan.jadwal.kuliah') }}" class="flex items-center p-2 text-base font-medium rounded-lg group">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="..."></path>
                        </svg>
                        <span class="ml-3">Usulan Jadwal Kuliah</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dekan.usulan.ruang.kuliah') }}" class="flex items-center p-2 text-base font-medium rounded-lg group">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="..."></path>
                        </svg>
                        <span class="ml-3">Usulan Ruang Kuliah</span>
                    </a>
                </li>
            @elseif($user->role === 'kaprodi')
                <!-- Menu Kaprodi -->
                <li>
                    <a href="{{ route('kaprodi.dashboard.index') }}" class="flex items-center p-2 text-base font-medium rounded-lg group">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="..."></path>
                        </svg>
                        <span class="ml-3">Dashboard Kaprodi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('kaprodi.kelola.mata.kuliah') }}" class="flex items-center p-2 text-base font-medium rounded-lg group">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="..."></path>
                        </svg>
                        <span class="ml-3">Kelola Mata Kuliah</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('kaprodi.kelola.jadwal') }}" class="flex items-center p-2 text-base font-medium rounded-lg group">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="..."></path>
                        </svg>
                        <span class="ml-3">Kelola Jadwal</span>
                    </a>
                </li>
            @elseif($user->role === 'akademik')
                <!-- Menu Akademik -->
                <li>
                    <a href="{{ route('akademik.dashboard.index') }}" class="flex items-center p-2 text-base font-medium rounded-lg group">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="..."></path>
                        </svg>
                        <span class="ml-3">Dashboard Akademik</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('akademik.kelola.ruangan') }}" class="flex items-center p-2 text-base font-medium rounded-lg group">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="..."></path>
                        </svg>
                        <span class="ml-3">Ruangan</span>
                    </a>
                </li>
            @endif
        </ul>

        <!-- Calendar Section -->
        <ul class="pt-20 mt-20 space-y-2">
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
