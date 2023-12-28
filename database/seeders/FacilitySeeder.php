<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Jubah mandi dan sandal', 'desc' => 'Untuk bersantai dengan nyaman'],
            ['name' => 'Pembuat kopi atau teh', 'desc' => 'Nikmati minuman hangat di pagi hari'],
            ['name' => 'Dock iPod/speaker Bluetooth', 'desc' => 'Putar musik favorit Anda'],
            ['name' => 'Perapian (untuk daerah dingin)', 'desc' => 'Menambah suasana hangat dan nyaman'],
            ['name' => 'Konsol game', 'desc' => 'Hiburan tambahan untuk Anda'],
            ['name' => 'Buku dan majalah', 'desc' => 'Bacaan ringan untuk bersantai'],
            ['name' => 'Area kerja/meja menulis', 'desc' => 'Ruang khusus untuk bekerja'],
            ['name' => 'Printer/scanner', 'desc' => 'Cetak atau pindai dokumen dengan mudah'],
            ['name' => 'Kabel LAN/adaptor stopkontak internasional', 'desc' => 'Akses internet kabel dan kompatibilitas stopkontak'],
            ['name' => 'Layanan pesan/fax', 'desc' => 'Kirim dan terima pesan atau faks'],
            ['name' => 'Alat olahraga dalam kamar', 'desc' => 'Bantal yoga, matras, atau peralatan ringan lainnya'],
            ['name' => 'Spa dalam kamar', 'desc' => 'Massage atau perawatan spa tanpa meninggalkan kamar'],
            ['name' => 'Balkon/teras', 'desc' => 'Nikmati pemandangan dan udara segar'],
            ['name' => 'Akses langsung ke kolam renang/pantai', 'desc' => 'Kenyamanan ekstra untuk pecinta air'],
            ['name' => 'Pelayan pribadi', 'desc' => 'Bantuan untuk segala kebutuhan Anda'],
            ['name' => 'Kamar mandi terpisah', 'desc' => 'Bak mandi dan shower terpisah'],
            ['name' => 'Perlengkapan mandi mewah', 'desc' => 'Produk perawatan dari merek terkenal'],
            ['name' => 'Minibar lengkap', 'desc' => 'Pilihan minuman dan makanan ringan yang lebih beragam'],
            ['name' => 'Bioskop mini', 'desc' => 'Layar lebar dan sound system untuk pengalaman menonton film privat']
        ];

        foreach ($data as $item) {
            DB::table('facilities')->insert([
                'name' => $item['name'],
                'desc' => $item['desc'],
            ]);
        }
    }
}
