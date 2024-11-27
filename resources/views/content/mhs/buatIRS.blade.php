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
            <!-- Dropdown Tambah Mata Kuliah -->
            <div class="flex items-center mb-4">
                <div class="w-full h-5  bg-gray-200 rounded dark:bg-gray-700 mr-2">
                    <div class="h-5 bg-yellow-300 rounded" style="width: 70%"></div>
                </div>
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">18 SKS</span>
            </div>
            <div class="mt-6">
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
            </div>
        </div>
        <!-- Mata Kuliah Ditampilkan -->
        <div class="mt-6">
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
                <tbody>
                    <tr>
                        <td class="border border-gray-300 p-2 text-center">06:00</td>
                        <td class="border border-gray-300 p-2">
                            <!-- <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Read more
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            </div> -->
                        </td>
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
                                <!-- Judul Mata Kuliah -->
                                <h5 class="mb-2 text-xs font-bold text-gray-900">
                                    Komputasi Tersebar dan Paralel
                                </h5>

                                <!-- Informasi Mata Kuliah -->
                                <p class="text-xs text-red-500 font-semibold">WAJIB (KM2020)</p>
                                <p class="text-xs text-gray-700">(SMT 5) (3 SKS)</p>
                                <p class="text-xs text-gray-700">Kelas: C <span class="text-red-500 font-bold">3/3 SKS</span></p>

                                <!-- Waktu -->
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
                                <!-- Judul Mata Kuliah -->
                                <h5 class="mb-2 text-xs font-bold text-gray-900">
                                    Komputasi Tersebar dan Paralel
                                </h5>

                                <!-- Informasi Mata Kuliah -->
                                <p class="text-xs text-red-500 font-semibold">WAJIB (KM2020)</p>
                                <p class="text-xs text-gray-700">(SMT 5) (3 SKS)</p>
                                <p class="text-xs text-gray-700">Kelas: C <span class="text-red-500 font-bold">3/3 SKS</span></p>

                                <!-- Waktu -->
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
                                <!-- Judul Mata Kuliah -->
                                <h5 class="mb-2 text-xs font-bold text-gray-900">
                                    Komputasi Tersebar dan Paralel
                                </h5>

                                <!-- Informasi Mata Kuliah -->
                                <p class="text-xs text-red-500 font-semibold">WAJIB (KM2020)</p>
                                <p class="text-xs text-gray-700">(SMT 5) (3 SKS)</p>
                                <p class="text-xs text-gray-700">Kelas: C <span class="text-red-500 font-bold">3/3 SKS</span></p>

                                <!-- Waktu -->
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
                                <!-- Judul Mata Kuliah -->
                                <h5 class="mb-2 text-xs font-bold text-gray-900">
                                    Komputasi Tersebar dan Paralel
                                </h5>

                                <!-- Informasi Mata Kuliah -->
                                <p class="text-xs text-red-500 font-semibold">WAJIB (KM2020)</p>
                                <p class="text-xs text-gray-700">(SMT 5) (3 SKS)</p>
                                <p class="text-xs text-gray-700">Kelas: C <span class="text-red-500 font-bold">3/3 SKS</span></p>

                                <!-- Waktu -->
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
                        <div class="w-40 h-32 p-2 bg-white border-l-4 border-blue-500 rounded-lg shadow-lg">
                                <!-- Judul Mata Kuliah -->
                                <h5 class="mb-2 text-xs font-bold text-gray-900">
                                    Komputasi Tersebar dan Paralel
                                </h5>

                                <!-- Informasi Mata Kuliah -->
                                <p class="text-xs text-red-500 font-semibold">WAJIB (KM2020)</p>
                                <p class="text-xs text-gray-700">(SMT 5) (3 SKS)</p>
                                <p class="text-xs text-gray-700">Kelas: C <span class="text-red-500 font-bold">3/3 SKS</span></p>

                                <!-- Waktu -->
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
