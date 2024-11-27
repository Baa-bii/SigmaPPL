<!-- BUAT IRS -->

<div class="tab-content flex flex-col lg:flex-row gap-6" id="buat-irs">
@if(isset($status) && $status === 'Aktif')
    <!-- Sidebar Informasi Mahasiswa -->
    <div class="bg-white p-6 w-full lg:w-1/3 border border-gray-300">
        
        <!-- Bagian Nama dan NIM -->
        <div class="border border-gray-300 p-4 mb-6">
            <div class="mb-4">
                <h3 class="font-semibold mb-2 text-xs">Nama: <span class="font-normal">{{ $mhs->nama_mhs }}</span></h3>
                <h3 class="font-semibold mb-2 text-xs">NIM: <span class="font-normal">{{ $mhs->nim }}</span></h3>
                <h3 class="font-semibold mb-2 text-xs">Semester: <span class="font-normal">{{ $mhs->semester_aktif->semester ?? 'Tidak Diketahui' }}</span></h3>
            </div>
            <!-- Garis pemisah -->
            <hr class="border-t-2 border-gray-300 mb-4">
            <!-- Bagian Informasi Akademik -->
            <div class>
                <p class="text-gray-600 mb-1 text-xs">Th. Ajaran: <span class="font-normal">{{ $mhs->semester_aktif->tahun_akademik ?? 'Tidak Diketahui' }}</span></p>
                <p class="text-gray-600 mb-1 text-xs">IPK (kumulatif): <span class="font-normal">4.0</span></p>
                <p class="text-gray-600 mb-1 text-xs">IPS (semester lalu): <span class="font-normal">4.0</span></p>
                <p class="text-gray-600 mb-1 text-xs">Max. Beban SKS: <span class="font-normal">24 SKS</span></p>
            </div>
        </div>

        <div class="daftar-mk">
            <!-- Progress Pilih SKS -->
            <div class="flex items-center mb-4">
                <div class="w-full h-5  bg-gray-200 rounded dark:bg-gray-700 mr-2">
                    <div class="h-5 bg-yellow-300 rounded" style="width: 70%"></div>
                </div>
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">18 SKS</span>
            </div>
            <!-- Dropdown Tambah Mata Kuliah -->
            <!-- <div class="mt-6">
                <h3 class="font-semibold mb-2 text-sm">+ Tambah Mata Kuliah</h3>
                <select name="mata-kuliah" id="mata-kuliah" class="w-full p-2 border rounded bg-gray-50">
                    <option value=""></option>
                    <option value="1">Pengembangan Berbasis Platform</option>
                    <option value="2">Kewirausahaan</option>
                    <option value="3">Komputasi Tersebar dan Paralel</option>
                    <option value="4">Proyek Perangkat Lunak</option>
                    <option value="5">Sistem Informasi</option>
                    <option value="6">Pembelajaran Mesin</option>
                    <option value="7">Keamanan Jaringan dan Jaminan Informasi</option>
                </select>
            </div> -->
            
            

            <!-- Dropdown menu -->
            <!-- <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                <div class="p-3">
                <label for="input-group-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    </div>
                    <input type="text" id="input-group-search" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mata Kuliah">
                </div>
                </div>
                <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownSearchButton">
                <li>
                    <div class="flex items-center ps-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                    <input id="checkbox-item-11" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="checkbox-item-11" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Bonnie Green</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center ps-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <input checked id="checkbox-item-12" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="checkbox-item-12" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Jese Leos</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center ps-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                    <input id="checkbox-item-13" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="checkbox-item-13" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Michael Gough</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center ps-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                    <input id="checkbox-item-14" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="checkbox-item-14" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Robert Wall</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center ps-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                    <input id="checkbox-item-15" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="checkbox-item-15" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Joseph Mcfall</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center ps-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                    <input id="checkbox-item-16" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="checkbox-item-16" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Leslie Livingston</label>
                    </div>
                </li>
                        <li>
                    <div class="flex items-center ps-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                    <input id="checkbox-item-17" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="checkbox-item-17" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Roberta Casas</label>
                    </div>
                </li>
            </a>
            </div> -->
            <!-- Dropdown menu -->
             <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch" data-dropdown-placement="bottom" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-64" type="button">Daftar Mata Kuliah Lain <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
            </button>
            <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                <div class="p-3">
                    <label for="input-group-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="text" id="input-group-search" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mata Kuliah">
                    </div>
                </div>
                <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownSearchButton">
                    @foreach ($mataKuliahDropdown as $mk)
                        <li>
                            <div class="flex items-center ps-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input type="checkbox" id="checkbox-{{ $mk->kode_mk }}" value="{{ $mk->kode_mk }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="checkbox-{{ $mk->kode_mk }}" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">
                                    {{ $mk->nama_mk }} - {{ $mk->sks }} SKS (Semester {{ $mk->semester }}) - {{ strtoupper($mk->jenis_mk) }}
                                </label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Mata Kuliah Ditampilkan -->
        <!-- <div class="mt-6">
            <h3 class="font-semibold text-sm mb-2">Mata Kuliah Ditampilkan</h3>
            <div class="p-4 bg-gray-50 rounded-lg shadow">
                <div class="flex items-center gap-2">
                    <i class="fas fa-check text-green-500"></i>
                    <div>
                        <h4 class="font-semibold text-sm">Pengembangan Berbasis Platform</h4>
                        <p class="text-xs">WAJIB (KM2020)</p>
                        <p class="text-xs">SMT 5</p>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Mata Kuliah Ditampilkan -->
        <div class="mt-6">
            <h3 class="font-semibold text-sm mb-2">Mata Kuliah Ditampilkan</h3>
            <div id="displayedCourses" class="space-y-3">
                @if ($mataKuliahDitampilkan->isEmpty())
                    <p class="text-xs text-gray-500">Tidak ada mata kuliah untuk semester ini.</p>
                @else
                    @foreach ($mataKuliahDitampilkan as $mk)
                        <div class="p-4 bg-gray-50 rounded-lg shadow mb-3">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-check text-green-500"></i>
                                <div>
                                    <h4 class="font-semibold text-sm">{{ $mk->nama_mk }}</h4>
                                    <p class="text-xs">{{ strtoupper($mk->jenis_mk) }} ({{ $mk->kode_mk }})</p>
                                    <p class="text-xs">SMT {{ $mk->semester }}</p>
                                    <p class="text-xs">{{ $mk->sks }} SKS</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>            
        </div>
    </div>
    

    <!-- Jadwal Mata Kuliah -->

    <div class="w-full lg:w-2/3 scroll-smooth">
        <!-- <div class="sticky-button-container flex items-center justify-end p-0 mb-0">
        <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">SKS</button>
        </div> -->
        <div class="overflow-x-auto">
           
            <!-- <div class="flex items-center mb-4">
                <div class="w-full h-5  bg-gray-200 rounded dark:bg-gray-700 mr-2">
                    <div class="h-5 bg-yellow-300 rounded" style="width: 70%"></div>
                </div>
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">18 SKS</span>
            </div> -->
            <table class="w-full border-collapse border border-gray-300 bg-white">
                <thead>
                    <tr>
                    <th class="border border-gray-300 p-2">WAKTU<br><span class="italic text-sm font-medium">TIME</span></th>
                        <th class="border border-gray-300 p-2">SENIN<br>
                            <span class="italic text-sm font-medium">MONDAY</span>
                        </th>
                        <th class="border border-gray-300 p-2">SELASA<br><span class="italic text-sm font-medium">TUESDAY</span></th>
                        <th class="border border-gray-300 p-2">RABU<br><span class="italic text-sm font-medium">WEDNESDAY</span></th>
                        <th class="border border-gray-300 p-2">KAMIS<br><span class="italic text-sm font-medium">THURSDAY</span></th>
                        <th class="border border-gray-300 p-2">JUMAT<br><span class="italic text-sm font-medium">FRIDAY</span></th>
                    </tr>
                </thead>
                <!-- <tbody>
                    <tr>
                        <td class="border border-gray-300 p-2 text-center">06:00</td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 text-center">07:00</td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"><div class="w-40 h-32 p-2 bg-white border-l-4 border-blue-500 rounded-lg shadow-lg">
                                
                                <h5 class="mb-2 text-xs font-bold text-gray-900">
                                    Komputasi Tersebar dan Paralel
                                </h5>

                               
                                <p class="text-xs text-red-500 font-semibold">WAJIB (KM2020)</p>
                                <p class="text-xs text-gray-700">(SMT 5) (3 SKS)</p>
                                <p class="text-xs text-gray-700">Kelas: C <span class="text-red-500 font-bold">3/3 SKS</span></p>

                              
                                <div class="flex items-center mt-2 text-xs text-gray-600">
                                    <svg class="w-4 h-4 mr-1 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m9-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    09.40 - 12.10
                                </div>
                            </div></td>
                        <td class="border border-gray-300 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 text-center">09:00</td>
                        <td class="border border-gray-300 p-2 align-top">
                            <div class="w-40 h-32 p-2 bg-white border-l-4 border-blue-500 rounded-lg shadow-lg">
                                
                                <h5 class="mb-2 text-xs font-bold text-gray-900">
                                    Komputasi Tersebar dan Paralel
                                </h5>

                        
                                <p class="text-xs text-red-500 font-semibold">WAJIB (KM2020)</p>
                                <p class="text-xs text-gray-700">(SMT 5) (3 SKS)</p>
                                <p class="text-xs text-gray-700">Kelas: C <span class="text-red-500 font-bold">3/3 SKS</span></p>

                              
                                <div class="flex items-center mt-2 text-xs text-gray-600">
                                    <svg class="w-4 h-4 mr-1 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m9-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    09.40 - 12.10
                                </div>
                            </div>
                        </td>
                        
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"><div class="w-40 h-32 p-2 bg-white border-l-4 border-blue-500 rounded-lg shadow-lg">
                                
                                <h5 class="mb-2 text-xs font-bold text-gray-900">
                                    Komputasi Tersebar dan Paralel
                                </h5>

                              
                                <p class="text-xs text-red-500 font-semibold">WAJIB (KM2020)</p>
                                <p class="text-xs text-gray-700">(SMT 5) (3 SKS)</p>
                                <p class="text-xs text-gray-700">Kelas: C <span class="text-red-500 font-bold">3/3 SKS</span></p>

                              
                                <div class="flex items-center mt-2 text-xs text-gray-600">
                                    <svg class="w-4 h-4 mr-1 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m9-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    09.40 - 12.10
                                </div>
                            </div></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 text-center">11:00</td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2">
                        <div class="w-40 h-32 p-2 bg-white border-l-4 border-blue-500 rounded-lg shadow-lg">
                                
                                <h5 class="mb-2 text-xs font-bold text-gray-900">
                                    Komputasi Tersebar dan Paralel
                                </h5>

                               
                                <p class="text-xs text-red-500 font-semibold">WAJIB (KM2020)</p>
                                <p class="text-xs text-gray-700">(SMT 5) (3 SKS)</p>
                                <p class="text-xs text-gray-700">Kelas: C <span class="text-red-500 font-bold">3/3 SKS</span></p>

                        
                                <div class="flex items-center mt-2 text-xs text-gray-600">
                                    <svg class="w-4 h-4 mr-1 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m9-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    09.40 - 12.10
                                </div>
                            </div>
                        </td>
                        
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2">
                       
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 text-center">13:00</td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 text-center">15:00</td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2">
                        </td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 text-center">16:00</td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 text-center">17:00</td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 text-center">18:00</td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 text-center">19:00</td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 text-center">20:00</td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 text-center">21:00</td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 text-center">22:00</td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2"></td>
                    </tr> 
                    
                </tbody>  -->
                <tbody>
                @foreach ($jadwal as $kode_mk => $kelasJadwal)
                    <tr>
                        <td class="border border-gray-300 p-2 text-center">{{ $kelasJadwal->first()->waktu->jam_mulai }}</td>
                        @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $hari)
                            <td class="border border-gray-300 p-2">
                                @foreach ($kelasJadwal->where('hari', $hari) as $jadwalItem)
                                    <div class="w-40 h-32 p-2 bg-white border-l-4 border-blue-500 rounded-lg shadow-lg mb-2">
                                        <h5 class="mb-2 text-xs font-bold text-gray-900">
                                            {{ $jadwalItem->matakuliah->nama_mk }}
                                        </h5>
                                        <p class="text-xs text-red-500 font-semibold">
                                            {{ strtoupper($jadwalItem->matakuliah->jenis_mk) }} ({{ $jadwalItem->matakuliah->kode_mk }})
                                        </p>
                                        <p class="text-xs text-gray-700">(SMT {{ $jadwalItem->matakuliah->semester }}) ({{ $jadwalItem->matakuliah->sks }} SKS)</p>
                                        <p class="text-xs text-gray-700">Kelas: {{ $jadwalItem->kelas }}</p>
                                        <div class="flex items-center mt-2 text-xs text-gray-600">
                                            <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m9-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ $jadwalItem->waktu->jam_mulai }} - {{ $jadwalItem->waktu->jam_selesai }}
                                        </div>
                                    </div>
                                @endforeach
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            </table>
            
            
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-2">Simpan</button>
            <button type="button" class="focus:outline-none text-white bg-purple-800 hover:bg-purple-700 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Lihat</button>
        
        </div>
    </div>
@else
    <div class="w-full bg-white p-6 text-center border border-gray-300">
        <h2 class="text-red-500 text-xl font-semibold">Tidak Dapat Membuat IRS</h2>
        <p class="text-gray-500 mt-2">Anda bukan mahasiswa aktif. Segera lakukan registrasi untuk membuat IRS</p>
    </div>
@endif
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('input-group-search');
    const dropdownList = document.querySelector('#dropdownSearch ul');
    const displayedCourses = document.querySelector('.mt-6 #displayedCourses');

    // Search functionality: Filter mata kuliah berdasarkan input
    searchInput.addEventListener('input', function (e) {
        const query = e.target.value.toLowerCase();
        const listItems = dropdownList.querySelectorAll('li');

        listItems.forEach((item) => {
            const label = item.querySelector('label').textContent.toLowerCase();
            if (label.includes(query)) {
                item.style.display = ''; // Tampilkan jika cocok
            } else {
                item.style.display = 'none'; // Sembunyikan jika tidak cocok
            }
        });
    });

    // Handle checkbox state changes
    dropdownList.addEventListener('change', function (e) {
        if (e.target.type === 'checkbox') {
            const checkbox = e.target;
            const kode_mk = checkbox.value;

            // Ambil data mata kuliah dari label checkbox
            const label = checkbox.nextElementSibling;
            const mataKuliahInfo = label.textContent.split(' - '); // Format label: [Nama MK] - [SKS] - [Semester] - [Jenis]
            const [nama_mk, sksText, semesterText, jenisText] = mataKuliahInfo;
            const sks = parseInt(sksText.match(/\d+/)[0]);
            const semester = parseInt(semesterText.match(/\d+/)[0]);
            const jenis_mk = jenisText.trim();

            if (checkbox.checked) {
                // Tambahkan mata kuliah ke "Mata Kuliah Ditampilkan"
                addToDisplayedCourses({
                    kode_mk,
                    nama_mk,
                    sks,
                    semester,
                    jenis_mk,
                });
            } else {
                // Hapus mata kuliah dari "Mata Kuliah Ditampilkan"
                removeFromDisplayedCourses(kode_mk);
            }
        }
    });

    // Tambahkan mata kuliah ke "Mata Kuliah Ditampilkan"
    function addToDisplayedCourses(mk) {
        const existingCourse = displayedCourses.querySelector(`#selected-${mk.kode_mk}`);
        if (existingCourse) return; // Cegah duplikasi

        const courseDiv = document.createElement('div');
        courseDiv.id = `selected-${mk.kode_mk}`;
        courseDiv.className = 'p-4 bg-gray-50 rounded-lg shadow mb-3';
        courseDiv.innerHTML = `
            <div class="flex items-center gap-2">
                <i class="fas fa-check text-green-500"></i>
                <div>
                    <h4 class="font-semibold text-sm">${mk.nama_mk}</h4>
                    <p class="text-xs">${mk.jenis_mk.toUpperCase()} (${mk.kode_mk})</p>
                    <p class="text-xs">SMT ${mk.semester}</p>
                    <p class="text-xs">${mk.sks} SKS</p>
                </div>
            </div>
        `;
        displayedCourses.appendChild(courseDiv);
    }

    // Hapus mata kuliah dari "Mata Kuliah Ditampilkan"
    function removeFromDisplayedCourses(kode_mk) {
        const courseDiv = displayedCourses.querySelector(`#selected-${kode_mk}`);
        if (courseDiv) {
            courseDiv.remove();
        }
    }
});


</script>

