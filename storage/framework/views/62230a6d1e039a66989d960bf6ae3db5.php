<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
<link rel="stylesheet" href="https://rsms.me/inter/inter.css">

<!-- Header -->
<nav class="bg-black border-b border-gray-200 px-4 py-3 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
    <div class="flex flex-wrap justify-between items-center">
        <!-- Toggle Sidebar -->
        <button
            data-drawer-target="drawer-navigation"
            data-drawer-toggle="drawer-navigation"
            aria-controls="drawer-navigation"
            class="p-2 mr-2 text-yellow-400 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
        >
            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path
                    fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"
                ></path>
            </svg>
        </button>

        <!-- Logo -->
        <a 
            href="<?php echo e(route(
                $user->role === 'dosen' ? 'dosen.dashboard.index' : 
                ($user->role === 'mhs' ? 'mhs.dashboard.index' : 
                ($user->role === 'akademik' ? 'akademik.dashboard.index' : 
                ($user->role === 'kaprodi' ? 'kaprodi.dashboard.index' : 
                ($user->role === 'dekan' ? 'dekan.dashboard.index' : 'home'))))
            )); ?>" 
            class="flex items-center md:pl-10 md:justify-start justify-center md:w-auto"
        >
            <img src="<?php echo e(asset('img/fix.png')); ?>" class="mr-5 h-10" alt="SiGMA Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-yellow-400 dark:text-white">SiGMA</span>
        </a>

        <!-- User Menu -->
        <div class="relative inline-block text-left">
            <button
                type="button"
                class="flex items-center px-3 py-1 text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button"
                aria-expanded="false"
            >
                <!-- Nama dan Foto User -->
                <?php if($user): ?>
                    <span class="hidden md:block self-center text-sm font-light whitespace-nowrap dark:text-white bg-yellow-400 text-black px-2 py-1 rounded-lg">
                        <b><?php echo e($user->name); ?></b>
                    </span>
                <?php else: ?>
                    <span class="hidden md:block self-center text-sm font-light whitespace-nowrap dark:text-white bg-yellow-400 text-black px-2 py-1 rounded-lg">
                        <b>Guest</b>
                    </span>
                <?php endif; ?>
                <img class="hidden md:block w-10 h-10 rounded-full ml-4" src="<?php echo e(asset('img/user.png')); ?>" alt="user photo" />
                <!-- Ikon Kebab -->
                <svg
                    class="w-6 h-6 text-yellow-400 ml-2"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        d="M12 7C12.55 7 13 6.55 13 6C13 5.45 12.55 5 12 5C11.45 5 11 5.45 11 6C11 6.55 11.45 7 12 7Z"
                        stroke-width="2"
                    />
                    <path
                        d="M12 13C12.55 13 13 12.55 13 12C13 11.45 12.55 11 12 11C11.45 11 11 11.45 11 12C11 12.55 11.45 13 12 13Z"
                        stroke-width="2"
                    />
                    <path
                        d="M12 19C12.55 19 13 18.55 13 18C13 17.45 12.55 17 12 17C11.45 17 11 17.45 11 18C11 18.55 11.45 19 12 19Z"
                        stroke-width="2"
                    />
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div
                id="dropdown"
                class="hidden absolute right-0 z-50 mt-2 w-56 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-gray-700 dark:divide-gray-600"
            >
                <!-- Nama dan Foto User (Visible on Small Screens) -->
                <div class="block md:hidden px-4 py-2 flex items-center">
                    <img class="w-10 h-10 rounded-full mr-2" src="<?php echo e(asset('img/user.png')); ?>" alt="user photo" />
                    <span class="text-gray-900 dark:text-white text-sm font-normal">
                        <?php echo e($user ? $user->name : 'Guest'); ?>

                    </span>
                </div>
                <div class="py-1">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">My profile</a>
                </div>
                <div class="py-1">
                    <a href="<?php echo e(route('logout')); ?>" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">Log out</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const userMenuButton = document.getElementById('user-menu-button');
        const dropdownMenu = document.getElementById('dropdown');

        if (userMenuButton && dropdownMenu) {
            userMenuButton.addEventListener('click', function () {
                dropdownMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function (event) {
                const isClickInside = userMenuButton.contains(event.target) || dropdownMenu.contains(event.target);
                if (!isClickInside) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        }
    });
</script>
<?php /**PATH C:\00 KULIAH\00 SEMESTER 5\SiGMA\SigmaPPL\resources\views/components/header.blade.php ENDPATH**/ ?>