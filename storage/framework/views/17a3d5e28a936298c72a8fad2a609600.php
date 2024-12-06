<!-- Navbar -->
<nav class="bg-black border-b border-gray-200 px-4 py-3 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
    <div class="flex justify-between items-center">
        <div class="flex justify-start items-center">
            <!-- Logo SiGMA -->
            <a href="http://127.0.0.1:8000/dashboard-doswal" class="flex items-center pl-4">
                <img src="<?php echo e(asset('img/fix.png')); ?>" class="mr-5 h-10" alt="SiGMA Logo" />
                <span class="text-2xl font-semibold whitespace-nowrap text-yellow-400 dark:text-white">SiGMA</span>
            </a>
        </div>

        <!-- Hamburger menu for mobile -->
        <div class="lg:hidden flex items-center">
            <button type="button" class="text-yellow-400 hover:text-white focus:outline-none" onclick="toggleMobileMenu()" aria-controls="mobile-menu" aria-expanded="false">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Desktop Menu Items -->
        <div class="hidden lg:flex items-center lg:order-2">
            <!-- Notifikasi -->
            <button type="button" data-dropdown-toggle="notification-dropdown" class="p-2 mr-1 text-yellow-400 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                <span class="sr-only">View notifications</span>
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                </svg>
            </button>

            <!-- User menu button -->
            <div class="relative inline-block text-left">
                <button type="button" class="flex items-center mx-3 px-3 py-1 text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false">
                    <span class="sr-only">Open user menu</span>
                    <span class="text-l font-semibold whitespace-nowrap dark:text-white bg-yellow-400 text-black px-2 py-1 rounded-lg">Rizzelle Marie Regal</span>
                    <img class="w-10 h-10 rounded-full ml-4" src="<?php echo e(asset('img/user.png')); ?>" alt="user photo" />
                    <svg class="w-6 h-6 text-yellow-400 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12 7C12.55 7 13 6.55 13 6C13 5.45 12.55 5 12 5C11.45 5 11 5.45 11 6C11 6.55 11.45 7 12 7Z" stroke-width="2" />
                        <path d="M12 13C12.55 13 13 12.55 13 12C13 11.45 12.55 11 12 11C11.45 11 11 11.45 11 12C11 12.55 11.45 13 12 13Z" stroke-width="2" />
                        <path d="M12 19C12.55 19 13 18.55 13 18C13 17.45 12.55 17 12 17C11.45 17 11 17.45 11 18C11 18.55 11.45 19 12 19Z" stroke-width="2" />
                    </svg>
                </button>

                <!-- User dropdown -->
                <div id="dropdown" class="hidden absolute right-0 z-50 mt-2 w-56 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-gray-700 dark:divide-gray-600">
                    <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">Log out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="hidden lg:hidden" id="mobile-menu">
        <ul class="space-y-2 py-4">
            <li>
                <a href="http://127.0.0.1:8000/dashboard-doswal" class="block text-yellow-400 hover:text-white text-base font-semibold px-4">Dashboard</a>
            </li>
            <li>
                <a href="#" class="block text-yellow-400 hover:text-white text-base font-semibold px-4">Notifications</a>
            </li>
            <li>
                <a href="#" class="block text-yellow-400 hover:text-white text-base font-semibold px-4">Log out</a>
            </li>
        </ul>
    </div>
</nav>
<?php /**PATH C:\PPL\SiGMA\resources\views/components/headerMHS.blade.php ENDPATH**/ ?>