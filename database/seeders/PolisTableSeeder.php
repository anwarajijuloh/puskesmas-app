<?php

namespace Database\Seeders;

use App\Models\Poli;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Poli::create([
            'nama' => 'Umum',
            'deskripsi' => 'Merupakan layanan dasar yang menangani keluhan kesehatan umum seperti infeksi saluran pernapasan atas (ISPA), batuk, pilek, demam, sakit kepala, diare, dan keluhan lainnya.',
        ]);
        Poli::create([
            'nama' => 'Lansia',
            'deskripsi' => 'Menangani kesehatan khusus bagi para lansia, seperti skrining kesehatan geriatri, deteksi dini penyakit kronis pada lansia (hipertensi, diabetes, stroke), dan konseling kesehatan.',
        ]);
        Poli::create([
            'nama' => 'KIA',
            'deskripsi' => 'Layanan di unit KIA meliputi pemeriksaan kehamilan, pemeriksaan bayi dan balita, pemberian imunisasi sesuai jadwal, konseling menyusui, dan edukasi kesehatan ibu dan anak.',
        ]);
        Poli::create([
            'nama' => 'Gigi',
            'deskripsi' => 'Menangani kesehatan gigi dan mulut, seperti pemeriksaan gigi, penambalan gigi, pencabutan gigi, pembersihan karang gigi, dan pembuatan gigi palsu.',
        ]);
        Poli::create([
            'nama' => 'Psikologi',
            'deskripsi' => 'Memberikan layanan konseling dan psikoterapi untuk mengatasi masalah kesehatan mental seperti kecemasan, depresi, stres, dan trauma.',
        ]);
        Poli::create([
            'nama' => 'Sanitasi',
            'deskripsi' => 'Menangani masalah kesehatan lingkungan dan sanitasi, seperti penyuluhan tentang higiene dan sanitasi yang benar, pemeriksaan kualitas air, dan pembinaan kesehatan lingkungan.',
        ]);
        Poli::create([
            'nama' => 'Gizi',
            'deskripsi' => 'Memberikan layanan konseling gizi untuk membantu masyarakat dalam mencapai pola makan yang sehat dan seimbang.',
        ]);
        Poli::create([
            'nama' => 'Balita',
            'deskripsi' => 'Menyediakan layanan kesehatan khusus untuk balita, seperti pemeriksaan tumbuh kembang balita, pemberian imunisasi sesuai jadwal, dan konseling gizi balita.',
        ]);
        
    }
}
