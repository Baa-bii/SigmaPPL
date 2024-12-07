<div class="tab-content hidden w-full" id="irs">
    <h2 class="text-center text-xl font-semibold">IRS</h2>
    <p class="text-center mt-2">Di sini kamu bisa membuat IRS baru untuk semester ini. cek cek cek masuk ga ini</p>
    {{-- <div id="tabs-content"> --}}
        <!-- Konten 2 IRS -->
        {{-- <div id="content-irs" class="bg-white rounded-lg border-gray-300 shadow dark:border-gray-600 h-auto mb-8 px-6">
            <div id="tabs-title" class="text-xl font-semibold pt-8 pb-6 text-center">Isian Rencana Semester</div>
            <!-- Accordion IRS content here -->
            <div id="accordion-irs">
                <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                    @foreach ($semesterAktifData as $index => $semester)
                        @php
                            // Periksa apakah semester ini sudah memiliki IRS
                            $hasIRSForSemester = App\Models\IRS::where('id_TA', $semester->id)->exists();
                        @endphp
    
                        @if (!$hasIRSForSemester)
                            <!-- Jika belum ada IRS, jangan tampilkan accordion untuk semester ini -->
                            @continue
                        @endif
                        
                        <h2 id="accordion-flush-heading-{{ $semester->id }}" class="pb-4">
                            <button type="button" class="flex items-center justify-between bg-gray-100 rounded-lg border-gray-300 w-full pl-3 pr-3 py-3 font-medium rtl:text-right text-black border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-{{ $semester->id }}" aria-expanded="false" aria-controls="accordion-flush-body-{{ $semester->id }}">
                                <div class="flex flex-col items-start">
                                    <span>Semester {{ $semester->semester }} | Tahun Ajaran {{ $semester->tahun_akademik }}</span>
                                    <span class="text-sm text-gray-500 mt-2">Jumlah SKS {{ $semester->jumlah_sks ?? 'N/A' }}</span>
                                </div>
                                <!-- Ikon defaultnya mengarah ke bawah, menggunakan rotate-0 -->
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                       
                        <div id="accordion-flush-body-{{ $semester->id }}" class="hidden" aria-labelledby="accordion-flush-heading-{{ $semester->id }}">  
                            <!-- Table -->
                            <div class="relative overflow-x-auto rounded-lg border border-gray-300 shadow-md mb-8 sm:rounded-lg">
                                <table class="w-full text-sm text-left roundertl:text-right text-gray-500 dark:text-gray-400">
                                    <caption class="p-5 text-center text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                        {{ $semester->statusIRS }} <!-- Menampilkan status IRS -->
                                    </caption>
                                    <thead class="text-xs text-yellow-400 uppercase rounded-lg border border-gray-300 bg-gray-800 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="border-r px-3 py-3">
                                                        No
                                            </th>
                                            <th scope="col" class="border-r px-4 py-3">
                                                        Kode
                                            </th>
                                            <th scope="col" class="border-r px-6 py-3">
                                                        Mata Kuliah
                                            </th>
                                            <th scope="col" class="border-r px-4 py-3 text-center">
                                                        Kelas
                                            </th>
                                            <th scope="col" class="border-r px-4 py-3 text-center">
                                                        SKS
                                            </th>
                                            <th scope="col" class="border-r px-4 py-3 text-center">
                                                        Ruang
                                            </th>
                                            <th scope="col" class="border-r px-4 py-3 text-center">
                                                        Status
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                        Nama Dosen
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($semester->irsData as $index => $ir)
                                            <!-- Baris Utama -->
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <th scope="row" class="px-4 py-4 border-r font-medium text-gray-900 whitespace-nowrap dark:text-white" rowspan="2">
                                                    {{ $index + 1 }}
                                                </th>
                                                <td class="px-4 py-4 border-r w-4">{{ $ir->matakuliah->kode_mk }}</td>
                                                <td class="px-6 py-4 border-r">{{ $ir->matakuliah->nama_mk }}</td>
                                                <td class="px-4 py-4 border-r text-center align-middle">{{ $ir->jadwal->kelas }}</td>
                                                <td class="px-4 py-4 border-r text-center align-middle">{{ $ir->matakuliah->sks }}</td>
                                                <td class="px-4 py-4 border-r text-center align-middle">{{ $ir->jadwal->ruang->gedung ?? 'N/A' }}{{ $ir->jadwal->ruang->nama ?? 'N/A' }}</td>
                                                <td class="px-4 py-4 border-r text-center align-middle">{{ $ir->status_mata_kuliah }}</td>
                                                <td class="px-6 py-4">
                                                    @if ($ir->matakuliah->dosen->isNotEmpty())
                                                        @foreach ($ir->matakuliah->dosen as $dosen)
                                                            {{ $dosen->nama_dosen }}<br>
                                                        @endforeach
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                            </tr>
                                            <!-- Baris Tambahan -->
                                            <tr class="bg-gray-50 border-b dark:bg-gray-700">
                                                <td colspan="7" class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                                    <strong>{{ $ir->jadwal->hari ?? 'N/A' }}</strong>
                                                    pukul 
                                                    @php
                                                        try {
                                                            // Pastikan jam_mulai valid dan format sesuai
                                                            if (!empty($ir->jadwal->waktu->jam_mulai)) {
                                                                // Format waktu mulai
                                                                $jamMulai = \Carbon\Carbon::createFromFormat('H:i', substr($ir->jadwal->waktu->jam_mulai, 0, 5));
                                                                
                                                                // Hitung waktu selesai berdasarkan SKS (1 SKS = 50 menit)
                                                                $durasi = $ir->matakuliah->sks * 50; // Durasi dalam menit
                                                                $jamSelesai = $jamMulai->copy()->addMinutes($durasi);
    
                                                                // Format hasil
                                                                $jamMulaiFormatted = $jamMulai->format('H:i'); // Format konsisten
                                                                $jamSelesaiFormatted = $jamSelesai->format('H:i'); // Format konsisten
                                                            } else {
                                                                $jamMulaiFormatted = 'N/A';
                                                                $jamSelesaiFormatted = 'N/A';
                                                            }
                                                        } catch (\Exception $e) {
                                                            $jamMulaiFormatted = 'Invalid Time';
                                                            $jamSelesaiFormatted = 'Invalid Time';
                                                        }
                                                    @endphp
                                                    <strong>{{ $jamMulaiFormatted }}</strong> - <strong>{{ $jamSelesaiFormatted }}</strong>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>  
                        </div>
                    @endforeach
                </div>
            </div> --}}
        {{-- </div> --}}
</div>
