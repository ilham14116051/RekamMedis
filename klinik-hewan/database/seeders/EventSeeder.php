<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $events = [
            ['title' => 'Demo Event-1', 'start' => '2021-07-11', 'end' => '2021-07-12'],
            ['title' => 'Demo Event-2', 'start' => '2021-07-11', 'end' => '2021-07-13'],
            ['title' => 'Demo Event-3', 'start' => '2021-07-14', 'end' => '2021-07-14'],
            ['title' => 'Demo Event-4', 'start' => '2021-07-17', 'end' => '2021-07-17'],
        ];
        foreach ($events as $key => $event) {
            Event::create($event);
        }
    }
}
