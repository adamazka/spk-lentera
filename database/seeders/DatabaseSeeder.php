<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;
use App\Models\Kriteria;
use App\Models\Indikator;
use App\Models\Pertanyaan;
use App\Models\Role;
use App\Models\User;
use App\Models\Periode;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Role::create([
            'role_name' => 'Admin',
            'deskripsi' => 'admin untuk semua menu'
        ]);

        Role::create([
            'role_name' => 'Penilai',
            'deskripsi' => 'penilai untuk melakukan penilaian '
        ]);
// 1
        Guru::create([
            'nama_guru' => 'Meri Krisna, S.Psi',
            'alamat_guru' => 'Kahuripan Nirwana Blok BA 2. No. 3A, Sumput - Sidoarjo',
            'tahun_masuk' => '2022-07-01',
            'tahun_keluar' => '2022-07-01',
            'tlp_guru' => '085755572379',
            'tempat_lahir' => 'Surabaya',
            'tanggal_lahir' => '1977-03-27',
            'no_ktp_guru' => '3515166703770002',
            'no_kk_guru' => '3515081207170002',
            'pen_akhir_guru' => 'S1 Psikologi',
            'jabatan_guru' => 'Kepala Sekolah',
            'status_aktif_guru' => '1'
        ]);
        // 2
        Guru::create([
            'nama_guru' => 'Amalia Latif, S.Pd',
            'alamat_guru' => 'Ds. Urangagung – Sumberrejo RT.13/RW.03, Wonoayu',
            'tahun_masuk' => '2022-07-01',
            'tahun_keluar' => '2022-07-01',
            'tlp_guru' => '089675622781',
            'tempat_lahir' => 'Sidoarjo',
            'tanggal_lahir' => '1971-03-21',
            'no_ktp_guru' => '3515166703770005',
            'no_kk_guru' => '3515081207170012',
            'pen_akhir_guru' => 'S1 Pendidikan',
            'jabatan_guru' => 'Wakil Kepala Sekolah',
            'status_aktif_guru' => '1'
        ]);
        // 3
        Guru::create([
            'nama_guru' => 'Siti Asmaul Fadilah, S.Pd',
            'alamat_guru' => 'Ds. Lebo RT.13/RW.04, Sidoarjo',
            'tahun_masuk' => '2022-07-01',
            'tahun_keluar' => '2022-07-01',
            'tlp_guru' => '085731918961',
            'tempat_lahir' => 'Sidoarjo',
            'tanggal_lahir' => '1990-11-28',
            'no_ktp_guru' => '3515166703770002',
            'no_kk_guru' => '3515081207170002',
            'pen_akhir_guru' => 'S1 Pendidikan',
            'jabatan_guru' => 'Bendahara',
            'status_aktif_guru' => '1'
        ]);
// 4
        Guru::create([
            'nama_guru' => 'Dewi Krisnawati, S. Psi',
            'alamat_guru' => 'Desa Urangagung – Sumberrejo RT.13/RW.03, Wonoayu',
            'tahun_masuk' => '2013-10-15',
            'tahun_keluar' => '2022-07-01',
            'tlp_guru' => '085731918961',
            'tempat_lahir' => 'Sidoarjo',
            'tanggal_lahir' => '1991-11-22',
            'no_ktp_guru' => '3515106211940001',
            'no_kk_guru' => '3515102501096307',
            'pen_akhir_guru' => 'S1 Psikologi',
            'jabatan_guru' => 'Guru',
            'status_aktif_guru' => '1'
        ]);
// 5
        Guru::create([
            'nama_guru' => 'Alfiyatur Rochmah, S.Pd.I',
            'alamat_guru' => 'Desa Nyamplung RT.23/RW.05, Sumokali – Candi',
            'tahun_masuk' => '2015-01-05',
            'tahun_keluar' => '2022-07-01',
            'tlp_guru' => '085731918961',
            'tempat_lahir' => 'Sidoarjo',
            'tanggal_lahir' => '1991-04-02',
            'no_ktp_guru' => '3515076804910001',
            'no_kk_guru' => '3515071805160020',
            'pen_akhir_guru' => 'S1 Pendididkan Islam',
            'jabatan_guru' => 'Guru',
            'status_aktif_guru' => '1'
        ]);
// 6
        Guru::create([
            'nama_guru' => 'Anik Mufidah, Amd.Kep',
            'alamat_guru' => 'Jl. Sedati RT.05/RW.03, Wedi Gedangan',
            'tahun_masuk' => '2015-12-22',
            'tahun_keluar' => '2022-07-01',
            'tlp_guru' => '085731918961',
            'tempat_lahir' => 'Sidoarjo',
            'tanggal_lahir' => '1993-04-23',
            'no_ktp_guru' => '3515166304930003',
            'no_kk_guru' => '3515162601090576',
            'pen_akhir_guru' => 'D3 Keperawatan',
            'jabatan_guru' => 'Guru',
            'status_aktif_guru' => '1'
        ]);
// 7
        Guru::create([
            'nama_guru' => 'Siti Rohmatul Ainiyah, S.Pd',
            'alamat_guru' => 'Desa Modong RT.01/RW.03, Tulangan',
            'tahun_masuk' => '2015-12-22',
            'tahun_keluar' => '2022-07-01',
            'tlp_guru' => '085731918961',
            'tempat_lahir' => 'Sidoarjo',
            'tanggal_lahir' => '1993-04-17',
            'no_ktp_guru' => '3515095704930001',
            'no_kk_guru' => '3515092601096754',
            'pen_akhir_guru' => 'S1 Bimbingan Konseling',
            'jabatan_guru' => 'Guru',
            'status_aktif_guru' => '1'
        ]);
// 8
        Guru::create([
            'nama_guru' => 'Dwi Darliani, S.Pd',
            'alamat_guru' => 'Asrama Kompi 2 Yon-B RT.02/RW.07, Porong',
            'tahun_masuk' => '2016-03-07',
            'tahun_keluar' => '2022-07-01',
            'tlp_guru' => '085731918961',
            'tempat_lahir' => 'Sidoarjo',
            'tanggal_lahir' => '1986-12-12',
            'no_ktp_guru' => '3515045212860003',
            'no_kk_guru' => '3515042501091154',
            'pen_akhir_guru' => 'S1 PGMI',
            'jabatan_guru' => 'Guru',
            'status_aktif_guru' => '1'
        ]);
// 9
        Guru::create([
            'nama_guru' => 'Sumaidah, S.Pd',
            'alamat_guru' => 'Dess Sidopurno RT.04/RW.01, Sidokepung – Buduran',
            'tahun_masuk' => '2016-10-04',
            'tahun_keluar' => '2022-07-01',
            'tlp_guru' => '085731918961',
            'tempat_lahir' => 'Sidoarjo',
            'tanggal_lahir' => '1992-02-24',
            'no_ktp_guru' => '3515156402920001',
            'no_kk_guru' => '3515152701092158',
            'pen_akhir_guru' => 'S1 Matematika',
            'jabatan_guru' => 'Guru',
            'status_aktif_guru' => '1'
        ]);
// 10
        Guru::create([
            'nama_guru' => 'Dian Isnawati, S.Psi',
            'alamat_guru' => 'Magersari III GG Langgar No.44 RT.03/RW.01, Sidoarjo',
            'tahun_masuk' => '2016-07-20',
            'tahun_keluar' => '2022-07-01',
            'tlp_guru' => '085731918961',
            'tempat_lahir' => 'Bontang',
            'tanggal_lahir' => '1990-05-27',
            'no_ktp_guru' => '3515042501091154',
            'no_kk_guru' => '3515045212860003',
            'pen_akhir_guru' => 'S1 Psikologi',
            'jabatan_guru' => 'Guru',
            'status_aktif_guru' => '1'
        ]);
// 11
        Guru::create([
            'nama_guru' => 'Jumrotul Ulah',
            'alamat_guru' => 'Desa Mojorangagung RT.03/RW.01 Wonoayu – Sidoarjo',
            'tahun_masuk' => '2016-09-05',
            'tahun_keluar' => '2022-07-01',
            'tlp_guru' => '085731918961',
            'tempat_lahir' => 'Sidoarjo',
            'tanggal_lahir' => '1996-10-25',
            'no_ktp_guru' => '3515106510960002',
            'no_kk_guru' => '3515102501096850',
            'pen_akhir_guru' => 'SMAN 4 SIDOARJO',
            'jabatan_guru' => 'Guru',
            'status_aktif_guru' => '1'
        ]);
// 12
        Guru::create([
            'nama_guru' => 'Septi Ayu Maulidia, Amd.Kep',
            'alamat_guru' => 'Desa Sedati Agung RT 01/ W 02, Sedati',
            'tahun_masuk' => '2017-01-10',
            'tahun_keluar' => '2022-07-01',
            'tlp_guru' => '085731918961',
            'tempat_lahir' => 'Sidoarjo',
            'tanggal_lahir' => '1994-09-12',
            'no_ktp_guru' => '3515175209940002',
            'no_kk_guru' => '3515170607170015',
            'pen_akhir_guru' => 'D3 Keperawatan',
            'jabatan_guru' => 'Guru',
            'status_aktif_guru' => '1'
        ]);
// 13
        Guru::create([
            'nama_guru' => 'Yunanto Setiawan, S. Pd',
            'alamat_guru' => 'Jln Raya Siwalan Panji RT 13/RW 04, Buduran - Sidoarjo',
            'tahun_masuk' => '2017-04-17',
            'tahun_keluar' => '2022-07-01',
            'tlp_guru' => '085731918961',
            'tempat_lahir' => 'Sidoarjo',
            'tanggal_lahir' => '1995-07-26',
            'no_ktp_guru' => '3515152006970004',
            'no_kk_guru' => '3515152601091001',
            'pen_akhir_guru' => 'S1 Pendidikan Sejarah',
            'jabatan_guru' => 'Guru',
            'status_aktif_guru' => '1'
        ]);
// 14
        Guru::create([
            'nama_guru' => 'Siti Anis Solikhah',
            'alamat_guru' => 'Desa Mojorangagung RT.03/RW.01 Wonoayu – Sidoarjo',
            'tahun_masuk' => '2017-05-09',
            'tahun_keluar' => '2022-07-01',
            'tlp_guru' => '085731918961',
            'tempat_lahir' => 'Sidoarjo',
            'tanggal_lahir' => '1996-06-25',
            'no_ktp_guru' => '3515100506980001',
            'no_kk_guru' => '3515102501096839',
            'pen_akhir_guru' => 'SMK YPM 11 WONOAYU',
            'jabatan_guru' => 'Guru',
            'status_aktif_guru' => '1'
        ]);
// 15
        Guru::create([
            'nama_guru' => 'Isnainiatus Sholihah, Amd. Kep.',
            'alamat_guru' => 'Desa Kalikajang RT. 16/RW.04, Gebang - Sidoarjo',
            'tahun_masuk' => '2016-06-07',
            'tahun_keluar' => '2022-07-01',
            'tlp_guru' => '085731918961',
            'tempat_lahir' => 'Sidoarjo',
            'tanggal_lahir' => '1995-05-15',
            'no_ktp_guru' => '3515085506950003',
            'no_kk_guru' => '3515041707200003',
            'pen_akhir_guru' => 'D3 Keperawatan',
            'jabatan_guru' => 'Guru',
            'status_aktif_guru' => '1'
        ]);

        User::create([
            'id_role' => '1',
            'id_guru' => '2',
            'username' => 'adminlentera',
            'password' => bcrypt('lentera123')
        ]);

        User::create([
            'id_role' => '2',
            'id_guru' => '3',
            'username' => 'penilailentera',
            'password' => bcrypt('lentera123')
        ]);
       
        Periode::create([
            "periode_penilaian" => '2022-05-02',
            'smt_periode' => 'Ganjil',
            'sts_periode' => '1'
        ]);

        Periode::create([
            "periode_penilaian" => '2022-08-02',
            'smt_periode' => 'Ganjil',
            'sts_periode' => '1'
        ]);

        Periode::create([
            "periode_penilaian" => '2022-11-02',
            'smt_periode' => 'Ganjil',
            'sts_periode' => '1'
        ]);
// Kriteria
        Kriteria::create([
            'nama_kriteria' => 'Pedagogik',
            "bobot_kriteria" => "29.7"
        ]);
        Kriteria::create([
            'nama_kriteria' => 'Kepribadian',
            "bobot_kriteria" => "18.2"
        ]);
        Kriteria::create([
            'nama_kriteria' => 'Sosial',
            "bobot_kriteria" => "15.7"
        ]);
        Kriteria::create([
            'nama_kriteria' => 'Profesional',
            "bobot_kriteria" => "18.6"
        ]);
        Kriteria::create([
            'nama_kriteria' => 'Kedisiplinan',
            "bobot_kriteria" => "21"
        ]);

        // Indikator
        Indikator::create([
            'id_kriteria' => '1',
            'nama_indikator' => "Menguasai Identifikasi dan asesmen peserta didik"
        ]);

        Indikator::create([
            'id_kriteria' => '1',
            'nama_indikator' => "Menguasai teori belajar dan prinsip-prinsip pembelajaran yang mendidik"
        ]);
        
        Indikator::create([
            'id_kriteria' => '1',
            'nama_indikator' => "Pengembangan perangakat pembelajaran"
        ]);

        Indikator::create([
            'id_kriteria' => '1',
            'nama_indikator' => "Kegiatan Pembelajaran yang Mendidik"
        ]);

        Indikator::create([
            'id_kriteria' => '1',
            'nama_indikator' => "Memahami dan mengembangkan potensi"
        ]);

        Indikator::create([
            'id_kriteria' => '1',
            'nama_indikator' => "Komunikasi dengan peserta didik"
        ]);

        Indikator::create([
            'id_kriteria' => '1',
            'nama_indikator' => "Komunikasi dengan peserta didik"
        ]);

        Indikator::create([
            'id_kriteria' => '1',
            'nama_indikator' => "Penilaian dan evaluasi "
        ]);

        Indikator::create([
            'id_kriteria' => '2',
            'nama_indikator' => "Bertindak sesuai dengan norma agama, hukum, sosial dan kebudayaan nasional Indonesia"
        ]);

        Indikator::create([
            'id_kriteria' => '2',
            'nama_indikator' => "Menunjukkan pribadi yang dewasa dan teladan"
        ]);

        Indikator::create([
            'id_kriteria' => '2',
            'nama_indikator' => "Etos kerja, tanggung jawab yang tinggi, dan rasa bangga menjadi guru"
        ]);

        Indikator::create([
            'id_kriteria' => '3',
            'nama_indikator' => "Bersikap inklusif, bertindak obyektif, serta tidak Diskriminatif"
        ]);

        Indikator::create([
            'id_kriteria' => '3',
            'nama_indikator' => "Komunikasi dengan sesama guru, tenaga kependidikan, orang tua peserta didik, dan masyarakat."
        ]);

        Indikator::create([
            'id_kriteria' => '4',
            'nama_indikator' => "Penguasaan materi struktur konsep dan pola pikir Keilmuan yang mendukung mata pelajaran yang diampu."
        ]);

        Indikator::create([
            'id_kriteria' => '4',
            'nama_indikator' => "Mengembangkan keprofesian melalui tindakan reflektif"
        ]);

        // Pertanyaan
        // -------------Pedagogik
        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '1',
            'pertanyaan' => "Guru dapat mengembangkan instrumen identifikasi dan asesmen informal untuk pembelajaran"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '1',
            'pertanyaan' => "Guru dapat melakukan identifikasi dan asesmen informal untuk pembelajaran"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '1',
            'pertanyaan' => "Guru dapat menyusun laporan hasil identifikasi dan asesmen informal untuk pembelajaran"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '2',
            'pertanyaan' => "Guru merencanakan kegiatan pembelajaran yang saling terkait satu sama lain, dengan memperhatikan tujuan pembelajaran maupun proses belajar peserta didik"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '2',
            'pertanyaan' => "Guru memberi kesempatan kepada peserta didik untuk menguasai materi pembelajaran sesuai potensi, kemampuan, hambatan dan kebutuhan belajarnya melalui pengaturan proses pembelajaran dan aktivitas yang bervariasi"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '2',
            'pertanyaan' => "Guru selalu memastikan tingkat pemahaman peserta didik terhadap materi pembelajaran tertentu dan menyesuaikan aktivitas pembelajaran berikutnya berdasarkan tingkat pemahaman tersebut"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '2',
            'pertanyaan' => "Guru dapat menjelaskan alasan pelaksanaan kegiatan/aktivitas yang dilakukannya, baik yang sesuai maupun yang berbeda dengan rencana pembelajaran,terkait keberhasilan pembelajaran"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '2',
            'pertanyaan' => "Guru menggunakan berbagai teknik untuk memotiviasi belajar peserta didik"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '2',
            'pertanyaan' => "Guru memperhatikan respon peserta didik yang memiliki hambatan dalam memahami materi pembelajaran yang diajarkan dan menggunakannya untuk memperbaiki rancangan pembelajaran"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '3',
            'pertanyaan' => "Guru dapat menyesuaiakan kurikulum berdasarkan hasil identifikasi dan asesmen untuk pengembangan RPP atau PPI"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '3',
            'pertanyaan' => "Guru memilih materi pembelajaran yang: a) sesuai dengan tujuan pembelajaran, b) tepat dan mutakhir, c) sesuai dengan kebutuhan dan tingkat kemampuan belajar peserta didik, d) dapat dilaksanakan di kelas, dan e) sesuai dengan konteks kehidupan sehari-hari peserta didik."
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '3',
            'pertanyaan' => "Guru menyusun instrumen penilaian hasil belajar dengan memperhatikan indikator, dan materi"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '4',
            'pertanyaan' => "Guru melaksanakan aktivitas pembelajaran sesuai dengan rancangan yang telah disusun secara lengkap dan pelaksanaan aktivitas tersebut mengindikasikan bahwa guru mengerti tentang tujuannya"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '4',
            'pertanyaan' => "Guru melaksanakan aktivitas pembelajaran yang bertujuan untuk membantu proses belajar peserta didik, bukan untuk menguji sehingga membuat peserta didik merasa tertekan"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '4',
            'pertanyaan' => "Guru mengkomunikasikan informasi baru sesuai dengan kebutuhan dan tingkat kemampuan belajar peserta didik."
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '4',
            'pertanyaan' => "Guru menyikapi kesalahan yang dilakukan peserta didik sebagai tahapan proses pembelajaran, bukan semata-mata kesalahan yang harus dikoreksi. Misalnya: dengan mengetahui terlebih dahulu peserta didik lain yang setuju/tidak setuju dengan jawaban tersebut, sebelum memberikan penjelasan tentang jawaban yang benar"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '4',
            'pertanyaan' => "Guru melaksanakan kegiatan pembelajaran sesuai isi kurikulum dan mengkaitkannya dengan konteks kehidupan sehari-hari peserta didik"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '4',
            'pertanyaan' => "Guru melakukan aktivitas pembelajaran secara bervariasi dengan waktu yang cukup sesuai dengan tingkat kemampuan belajar dan mempertahankan perhatian peserta didik"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '4',
            'pertanyaan' => "Guru mengelola kelas dengan efektif tanpa mendominasi atau sibuk dengan kegiatannya sendiri agar semua waktu peserta dapat termanfaatkan secara produktif"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '4',
            'pertanyaan' => "Guru mampu merancang aktivitas pembelajaran sesuai dengan kondisi kelas"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '4',
            'pertanyaan' => "Guru memberikan banyak kesempatan kepada peserta didik untuk bertanya, mempraktikkan dan berinteraksi dengan peserta didik lain"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '4',
            'pertanyaan' => "Guru mengatur pelaksanaan aktivitas pembelajaran secara sistematis untuk membantu proses belajar peserta didik. Sebagai contoh: guru menambah informasi baru setelah mengevaluasi pemahaman peserta didik terhadap materi sebelumnya"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '4',
            'pertanyaan' => "Guru menggunakan alat bantu mengajar, dan/atau audio visual (termasuk TIK) untuk meningkatkan motivasi belajar peserta didik dalam mencapai tujuan pembelajaran"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '5',
            'pertanyaan' => "Guru menganalisis hasil belajar berdasarkan segala bentuk penilaian terhadap setiap peserta didik untuk mengetahui tingkat kemajuan masing-masing"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '5',
            'pertanyaan' => "Guru merancang dan melaksanakan aktivitas pembelajaran yang mendorong peserta didik untuk belajar sesuai dengan kemampuan dan pola belajar masing-masing"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '5',
            'pertanyaan' => "Guru merancang dan melaksanakan aktivitas pembelajaran untuk memunculkan daya kreativitas dan kemampuan berfikir kritis peserta didik"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '5',
            'pertanyaan' => "Guru secara aktif membantu peserta didik dalam proses pembelajaran dengan memberikan perhatian kepada setiap individu"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '5',
            'pertanyaan' => "Guru dapat mengidentifikasi dengan benar tentang bakat, minat, potensi, dan kesulitan belajar masing- masing peserta didik"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '5',
            'pertanyaan' => "Guru memberikan kesempatan belajar kepada peserta didik sesuai dengan cara belajarnya masing- masing"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '5',
            'pertanyaan' => "Guru memusatkan perhatian pada interaksi dengan peserta didik dan mendorongnya untuk memahami dan menggunakan informasi yang disampaikan"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '6',
            'pertanyaan' => "Guru menggunakan pertanyaan untuk mengetahui pemahaman dan menjaga partisipasi peserta didik, termasuk memberikan pertanyaan terbuka yang menuntut peserta didik untuk menjawab dengan ide dan pengetahuan mereka"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '6',
            'pertanyaan' => "Guru memberikan perhatian dan mendengarkan semua pertanyaan dan tanggapan peserta didik, tanpa menginterupsi, kecuali jika diperlukan untuk membantu atau mengklarifikasi pertanyaan/tanggapan tersebut"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '6',
            'pertanyaan' => "Guru menanggapi pertanyaan peserta didik secara tepat, benar, dan mutakhir, sesuai tujuan pembelajaran dan isi kurikulum, tanpa mempermalukannya"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '6',
            'pertanyaan' => "Guru menyajikan kegiatan pembelajaran yang dapat menumbuhkan kerja sama yang baik antar peserta didik"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '6',
            'pertanyaan' => "Guru mendengarkan dan memberikan perhatian terhadap semua jawaban peserta didik baik yang benar maupun yang dianggap salah untuk mengukur tingkat pemahaman peserta didik"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '6',
            'pertanyaan' => "Guru memberikan perhatian terhadap pertanyaan peserta didik dan meresponnya secara lengkap dan relevan untuk menghilangkan kebingungan pada peserta didik"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '7',
            'pertanyaan' => "Guru menyusun alat penilaian yang sesuai dengan tujuan pembelajaran untuk mencapai kompetensi tertentu seperti yang tertulis dalam RPP/PPI"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '7',
            'pertanyaan' => "Guru melaksanakan penilaian dengan berbagai teknik dan jenis penilaian, selain penilaian formal yang dilaksanakan sekolah, dan mengumumkan hasil serta implikasinya kepada peserta didik, tentang tingkat pemahaman terhadap materi pembelajaran yang telah dan akan dipelajari"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '7',
            'pertanyaan' => "Guru menganalisis hasil penilaian untuk mengidentifikasi topik/kompetensi dasar yang sulit sehingga diketahui kekuatan dan kelemahan masing-masing peserta didik untuk keperluan remedial dan pengayaan"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '7',
            'pertanyaan' => "Guru memanfaatkan masukan dari peserta didik dan merefleksikannya untuk meningkatkan pembelajaran selanjutnya, dan dapat membuktikannya melalui catatan, jurnal pembelajaran, rancangan pembelajaran, materi tambahan, dan sebagainya"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '1',
            'id_indikator' => '7',
            'pertanyaan' => "Guru memanfatkan hasil penilaian sebagai bahan penyusunan rancangan pembelajaran yang akan dilakukan selanjutnya"
        ]);

         // ------------- Kepribadian
        Pertanyaan::create([
            'id_kriteria' => '2',
            'id_indikator' => '9',
            'pertanyaan' => "Guru menghargai dan mempromosikan prinsip-prinsip Pancasila sebagai dasar ideologi dan etika bagi semua warga negara Indonesia"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '2',
            'id_indikator' => '9',
            'pertanyaan' => "Guru mengembangkan kerjasama dan membina kebersamaan dengan teman sejawat tanpa memperhatikan perbedaan yang ada (misalnya: suku, agama, dan gender)"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '2',
            'id_indikator' => '9',
            'pertanyaan' => "Guru menghormati dan menghargai teman sejawat"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '2',
            'id_indikator' => '9',
            'pertanyaan' => "Guru memiliki rasa persatuan dan kesatuan sebagai bangsa Indonesia"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '2',
            'id_indikator' => '9',
            'pertanyaan' => "Guru mempunyai pandangan yang luas tentang keberagaman bangsa Indonesia (misalnya: budaya, suku, agama)"
        ]);

        Pertanyaan::create([
            'id_kriteria' => '2',
            'id_indikator' => '10',
            'pertanyaan' => "Guru bertingkah laku sopan dalam berbicara, berpenampilan, dan berbuat baik terhadap siswa, orang tua, teman sejawat, dan masyarakat sekitar."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '2',
            'id_indikator' => '10',
            'pertanyaan' => "Guru bersedia berbagi pengalaman dengan teman sejawat sebagai guru yang sopan dalam berbicara, berpenampilan, dan berbuat baik terhadap siswa, orang tua, teman sejawat, dan masyarakat sekitar."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '2',
            'id_indikator' => '10',
            'pertanyaan' => "Guru mampu memperlihatkan keteladanan melalui pengelola pembelajaran yang ramah sehingga siswa berpartisipasi aktif dalam proses pembelajaran."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '2',
            'id_indikator' => '10',
            'pertanyaan' => "Guru bersikap dewasa dalam menerima masukan dari siswa, teman sejawat, orang tua siswa dan masyarakat sekitar untuk peningkatan kualitas pembelajaran."
        ]);

        Pertanyaan::create([
            'id_kriteria' => '2',
            'id_indikator' => '11',
            'pertanyaan' => "Guru mengawali dan mengakhiri pembelajaran dengan tepat waktu."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '2',
            'id_indikator' => '11',
            'pertanyaan' => "Apabila guru harus meninggalkan kelas, guru mengaktifkan siswa dengan melakukan hal-hal produktif lain terkait dengan mata pelajaran, dan meminta gurupiket atau guru lain untuk mengawasi siswa dalam pelaksanaannya."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '2',
            'id_indikator' => '11',
            'pertanyaan' => "Guru memenuhi jam mengajar dan dapat melakukan semua kegiatan lain di luar jam mengajar berdasarkan ijin dan persetujuan pengelola sekolah."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '2',
            'id_indikator' => '11',
            'pertanyaan' => "Guru meminta ijin dan memberitahu lebih awal, dengan memberikan alasan dan bukti yang sah jika tidak menghadiri kegiatan yang telah direncanakan, termasuk proses pembelajaran dikelas."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '2',
            'id_indikator' => '11',
            'pertanyaan' => "Guru menyelesaikan semua tugas administratif dan non-administraif pembelajaran dengan tepat waktu sesuai standar yang ditetapkan"
        ]);
        Pertanyaan::create([
            'id_kriteria' => '2',
            'id_indikator' => '11',
            'pertanyaan' => "Guru memanfaatkan waktu luang selain mengajar untuk kegiatan yang produktif terkait dengan tugasnya."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '2',
            'id_indikator' => '11',
            'pertanyaan' => "Guru merasa bangga dengan profesinya sebagai guru Pendidikan Khusus."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '2',
            'id_indikator' => '11',
            'pertanyaan' => "Guru memberikan kontribusi terhadap pengembangan sekolah dan mempunyai prestasi yang berdampak positif terhadap nama baik sekolah."
        ]);

        // ------------- Sosial
        Pertanyaan::create([
            'id_kriteria' => '3',
            'id_indikator' => '12',
            'pertanyaan' => "Guru memperlakukan semua peserta didik secara adil, memberikan perhatian dan bantuan sesuai kebutuhan masing-masing, tanpa memperdulikan faktor personal."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '3',
            'id_indikator' => '12',
            'pertanyaan' => "Guru menjaga hubungan baik dan peduli dengan teman sejawat (bersifat inklusif), serta berkontribusi positif terhadap semua diskusi formal dan informal terkait dengan pekerjaannya."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '3',
            'id_indikator' => '12',
            'pertanyaan' => "Guru sering berinteraksi dengan peserta didik dan tidak membatasi perhatiannya hanya pada kelompok tertentu (misalnya: peserta didik yang pandai, kaya, berasal dari daerah yang sama dengan guru)."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '3',
            'id_indikator' => '13',
            'pertanyaan' => "Guru menyampaikan informasi tentang kemajuan, kesulitan, dan potensi peserta didik kepada orang tuanya, baik dalam pertemuan formal maupun tidak formal antara guru dan orang tua, teman sejawat, dan dapat menunjukkan buktinya."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '3',
            'id_indikator' => '13',
            'pertanyaan' => "Guru ikut berperan aktif dalam kegiatan di luar pembelajaran yang diselenggarakan oleh sekolah dan masyarakat dan dapat memberikan bukti keikutsertaannya."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '3',
            'id_indikator' => '13',
            'pertanyaan' => "Guru ikut berperan aktif dalam kegiatan di luar pembelajaran yang diselenggarakan oleh sekolah dan masyarakat dan dapat memberikan bukti keikutsertaannya."
        ]);

        // -------------- Profesional
        Pertanyaan::create([
            'id_kriteria' => '4',
            'id_indikator' => '14',
            'pertanyaan' => "Guru melakukan pemetaan standar kompetensi dan kompetensi dasar untuk mata pelajaran yang diampunya, mengidentifikasi materi pembelajaran yang dianggap sulit, melakukan perencanaan dan pelaksanaan pembelajaran, dan memperkirakan alokasi waktu yang diperlukan."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '4',
            'id_indikator' => '14',
            'pertanyaan' => "Guru menyertakan informasi yang tepat dan mutakhir di dalam perencanaan dan pelaksanaan pembelajaran."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '4',
            'id_indikator' => '14',
            'pertanyaan' => "Guru menyusun materi, perencanaan dan pelaksanaan pembelajaran berisi informasi yang tepat dan mutakhir, untuk membantu peserta didik dalam memahami konsep materi pembelajaran."
        ]);

        Pertanyaan::create([
            'id_kriteria' => '4',
            'id_indikator' => '15',
            'pertanyaan' => "Guru melakukan evaluasi diri secara spesifik, lengkap, dan didukung berdasarkan pengalaman diri sendiri."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '4',
            'id_indikator' => '15',
            'pertanyaan' => "Guru memiliki agenda pembelajaran, catatan masukan dari teman sejawat atau hasil penilaian proses pembelajaran sebagai bukti kinerjanya."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '4',
            'id_indikator' => '15',
            'pertanyaan' => "Guru mengembangkan perencanaan dan pelaksanaan pembelajaran selanjutnya berdasarkan bukti kinerjanya sebagai program Pengembangan Keprofesian Berkelanjutan (PKB)."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '4',
            'id_indikator' => '15',
            'pertanyaan' => "Guru dapat mengaplikasikan pengalaman PKB dalam perencanaan, pelaksanaan, penilaian pembelajaran dan tindak lanjutnya."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '4',
            'id_indikator' => '15',
            'pertanyaan' => "Guru melakukan penelitian, mengembangkan karya inovasi, mengikuti kegiatan ilmiah (misalnya seminar, konferensi), dan aktif dalam melaksanakan PKB."
        ]);
        Pertanyaan::create([
            'id_kriteria' => '4',
            'id_indikator' => '15',
            'pertanyaan' => "Guru dapat memanfaatkan TIK dalam berkomunikasi dan pelaksanaan PKB."
        ]);
    }
}
