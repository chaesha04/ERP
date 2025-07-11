<?php

namespace Database\Seeders;

use App\Models\Banqueteventorder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BanqueteventorderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banqueteventorder::create([
            'note_housekeeping'=>'Mohon diperhatikan mengenai kebersihan area Hotel,  # Mohon dibantu diarahkan ke Pangrango resto pada saat kedatangan',
            'note_engineer'=>'Mohon diperhatikan mengenai kebersihan area Hotel',
            'note_accounting'=>'Mohon dibantu dibuatkan Invoice sesuai penggunaan',
            'note_kitchen'=>'Mohon disiapkan 1x Breakfast, 1x Lunch & 1x Dinner',
            'note_sport'=>'Mohon dibantu diarahkan ke Lalassa Beach Club untuk kegiatan Watersport',
            'note_fnb'=>'Mohon disiapkan 1x Breakfast, 1x Lunch & 1x Dinner',
            'note_lalassa'=>'Kegiatan Watersport di charge @90.000/Voucher',
            'gb_id'=>'1',
        ]);
    }
}
