<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\VisitorDetail;
use Illuminate\Database\Seeder;
use App\Models\GroupbookingOrder;
use App\Models\ProductAccomodation;

class GroupbookingOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // GroupbookingOrder::create([
        //     'check_in'           => '2025-06-01',
        //     'check_out'          => '2025-06-02',
        //     'event_type'         => 'Gathering',
        //     'hotel_id'           => ProductAccomodation::inRandomOrder()->first()->id,
        //     'qty_room'           => 20,
        //     'extrabed'           => 10,
        //     'adult'              => 41,
        //     'child'              => 10,
        //     'baby'               => 4,
        //     'night'              => 1,
        //     'rate_desc'          => 'Fullboard Package',
        //     'package'            => 'fullboard Package',
        //     'single_room'        => '0', //revisi key, jadinya product dipecah jadi single,twin, sama triple
        //     'twin_room'          => '26', //revisi key, jadinya product dipecah jadi single,twin, sama triple
        //     'triple_room'        => '15', //revisi key, jadinya product dipecah jadi single,twin, sama triple
        //     'child_room'         => '10', //revisi key, jadinya product dipecah jadi single,twin, sama triple
        //     'singleroom_price'   => 0,
        //     'twinroom_price'     => 750000,
        //     'tripleroom_price'   => 700000,
        //     'childroom_price'    => 375000,
        //     'deposit'            => 15000000,
        //     'sales_id'           => Employee::inRandomOrder()->first()->id, // ganti sesuai data yang ada
        //     'group_id'           => VisitorDetail::inRandomOrder()->first()->id, // ganti sesuai data yang ada
        // ]);
        // GroupbookingOrder::create([
        //     'check_in'           => '2025-06-02',
        //     'check_out'          => '2025-06-04',
        //     'event_type'         => 'Gathering',
        //     'hotel_id'           => ProductAccomodation::inRandomOrder()->first()->id,
        //     'qty_room'           => 15,
        //     'extrabed'           => 10,
        //     'adult'              => 40,
        //     'child'              => 0,
        //     'baby'               => 3,
        //     'night'              => 1,
        //     'rate_desc'          => 'Fullboard Package',
        //     'package'            => 'fullboard Package',
        //     'single_room'        => '0', //revisi key, jadinya product dipecah jadi single,twin, sama triple
        //     'twin_room'          => '0', //revisi key, jadinya product dipecah jadi single,twin, sama triple
        //     'triple_room'        => '10', //revisi key, jadinya product dipecah jadi single,twin, sama triple
        //     'child_room'         => '0', //revisi key, jadinya product dipecah jadi single,twin, sama triple
        //     'singleroom_price'   => 0,
        //     'twinroom_price'     => 0,
        //     'tripleroom_price'   => 700000,
        //     'childroom_price'    => 0,
        //     'deposit'            => 10000000,
        //     'sales_id'           => Employee::inRandomOrder()->first()->id, // ganti sesuai data yang ada
        //     'group_id'           => VisitorDetail::inRandomOrder()->first()->id, // ganti sesuai data yang ada
        // ]);
    }
}
