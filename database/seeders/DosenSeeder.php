<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        $dosens = [
            ['nip_dosen' => '1965110719920310', 'nama_dosen' => 'Drs. Eko Adi Sarwoko, M.Komp.', 'email'=>null],
            ['nip_dosen'=>'1970070519970210', 'nama_dosen'=>'Priyo Sidik Sasongko, S.Si., M.Kom.', 'email'=>null],
            ['nip_dosen'=>'1971081119970210', 'nama_dosen' =>'Dr. Aris Sugiharto, S.Si., M.Kom.', 'email'=>null],
            ['nip_dosen'=>'1973082919980220', 'nama_dosen' =>'Beta Noranita, S.Si., M.Kom.', 'email'=>null],
            ['nip_dosen'=>'1974040119990310', 'nama_dosen' =>'Dr. Aris Puji Widodo, S.Si., M.T.', 'email'=>null],
            ['nip_dosen'=>'1976011020091220', 'nama_dosen' =>'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.', 'email'=>null],
            ['nip_dosen'=>'1978050220050120', 'nama_dosen' =>'Sukmawati Nur Endah, S.Si., M.Kom.', 'email'=>null],
            ['nip_dosen'=>'1978051620031210', 'nama_dosen' =>'Helmie Arif Wibawa, S.Si., M.Cs.', 'email'=>null],
            ['nip_dosen'=>'1979021220081210', 'nama_dosen' =>'Indra Waspada, S.T., M.TI', 'email'=>null],
            ['nip_dosen'=>'1979052420091210', 'nama_dosen' =>'Dr. Sutikno, S.T., M.Cs.', 'email'=>null],
            ['nip_dosen'=>'1979072020031210', 'nama_dosen' =>'Nurdin Bahtiar, S.Si., M.T.', 'email'=>null],
            ['nip_dosen'=>'1980091420060410', 'nama_dosen' =>'Edy Suharto, S.T., M.Kom', 'email'=>null],
            ['nip_dosen'=>'1980102120050110', 'nama_dosen' =>'Ragil Saputra, S.Si., M.Cs.', 'email'=>null],
            ['nip_dosen'=>'1981042020050120', 'nama_dosen' =>'Dr. Retno Kusumaningrum, S.Si., M.Kom.', 'email'=>null],
            ['nip_dosen'=>'1983020320060410', 'nama_dosen' =>'Satriyo Adhy, S.Si., M.T.', 'email'=>null],
            ['nip_dosen'=>'1989030320150420', 'nama_dosen' =>'Khadijah, S.Kom., M.Cs.', 'email'=>null],
            ['nip_dosen'=>'1985112520180320', 'nama_dosen' =>'Rismiyati, B.Eng, M.Cs', 'email'=>null],
            ['nip_dosen' =>'1982030920060410', 'nama_dosen'=> 'Dr.Eng. Adi Wibowo, S.Si., M.Kom.', 'email'=>null],
            ['nip_dosen' => '1984041120190310', 'nama_dosen' => 'Fajar Agung Nugroho, S.Kom., M.Cs.', 'email' => null],
            ['nip_dosen' => '1988032220201210', 'nama_dosen' => 'Prajanto Wahyu Adi, M.Kom.', 'email' => null],
            ['nip_dosen' => '1981062020150410', 'nama_dosen' => 'Muhammad Malik Hakim, S.T., M.T.I.', 'email' => null],
            ['nip_dosen' => '1980122720150410', 'nama_dosen' => 'Guruh Aryotejo, S.Kom., M.Sc', 'email' => null],
            ['nip_dosen' => '199112092024061001', 'nama_dosen' => 'Bambang Susanto, M.Kom', 'email' => 'bambangss@lecturer.com'],
            ['nip_dosen' => '199112092024061002', 'nama_dosen' => 'Agus Dwi Putra Yudhistira, S.Kom., M.Cs.', 'email' => 'agusdwi@lecturer.com'],
            ['nip_dosen' => '198712092024061003', 'nama_dosen' => 'Agus Santoso, S.Kom., M.Cs.', 'email' => 'kaprodi@lecturer.com'],
            ['nip_dosen' => '1991120920220410', 'nama_dosen' => 'Adhe Setya Pramayoga, S.Kom., M.T.', 'email'=>null],
            ['nip_dosen' => '1996030320220410', 'nama_dosen' => 'Sandy Kurniawan, S.Kom., M.Kom.', 'email'=>null],
            ['nip_dosen' => '1958090119860320', 'nama_dosen' => 'Prof. Dr. Dra. Sunarsih, M.Si.', 'email'=>null],
            ['nip_dosen' => '1985063020121210', 'nama_dosen' => 'Solikhin, S.Si., M.Sc.', 'email'=>null],
            ['nip_dosen' => '1969021419940320', 'nama_dosen' => 'Prof. Dr. Widowati, S.Si., M.Si.', 'email'=>null],
            ['nip_dosen' => '1965112319940310', 'nama_dosen' => 'Prof. Dr. Rahmat Gernowo, M.Si.', 'email'=>null],
            ['nip_dosen' => '1972031719980210', 'nama_dosen' => 'Prof. Dr. Kusworo Adi, S.Si., M.T.', 'email'=>null],
            ['nip_dosen' => '1963110519880310', 'nama_dosen' => 'Drs. Bayu Surarso, M.Sc., Ph.D.', 'email'=>null],
            ['nip_dosen' => '1973122020001210', 'nama_dosen' => 'Farikhin, S.Si., M.Si., Ph.D.', 'email'=>null],
            ['nip_dosen' => '1961092819860320', 'nama_dosen' => 'Dr. Dra. Tatik Widiharih, M.Si.', 'email'=>null],
            ['nip_dosen' => '1963070619910210', 'nama_dosen' => 'Dr. Drs. Tarno, M.Si.', 'email'=>null],
            ['nip_dosen' => '1975082419990310', 'nama_dosen' => 'Dr. Budi Warsito, S.Si., M.Si.', 'email'=>null],
            ['nip_dosen' => '1964051819920310', 'nama_dosen' => 'Dr.Drs. Catur Edi Widodo, M.T.', 'email'=>null],
            ['nip_dosen' => '1965022519920110', 'nama_dosen' => 'Dr.Drs. Rukun Santoso, M.Si.', 'email'=>null],
            ['nip_dosen' => '1972112119980210', 'nama_dosen' => 'Jatmiko Endro Suseno, S.Si., M.Si., Ph.D.', 'email'=>null],
            ['nip_dosen' => '1988061420221020', 'nama_dosen' => 'Yunila Dwi Putri Ariyanti, S.Kom., M.Kom.', 'email'=>null],
            ['nip_dosen' => '1992042520230720', 'nama_dosen' => 'Dr. Yeva Fadhilah Ashari, S.Si., M.Si.', 'email'=>null],
            ['nip_dosen' => '1996022120230720', 'nama_dosen' => 'Etna Vianita, S.Mat., M.Mat.', 'email'=>null]

            // Tambahkan data lainnya sesuai kebutuhan
        ];

        foreach ($dosens as $dosen) {
            Dosen::updateOrCreate(
                ['nip_dosen' => $dosen['nip_dosen']],
                [
                    'nama_dosen' => $dosen['nama_dosen'],
                    'email' => $dosen['email'], // Tetap NULL jika tidak diisi
                    'dosen' => '1',
                    'dosen_wali' => $dosen['email'] !== null ? '1' : '0', // Dosen wali hanya jika ada email
                    'kaprodi' => '0',
                    'dekan' => '0',
                    'kode_prodi' => 'INF123',
                ]
            );
        }
    }
}
