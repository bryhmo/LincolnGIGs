<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Listing;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Listing::factory(6)->create();

        Listing::create([
            
                'title'=>'Laravel Senior Developer',
                'tags'=>'Laravel,Javascript',
                'company'=>'Acme Corp',
                'location'=>'Boston,MA',
                'email'=>'acme@gmail.com',
                'website'=>'https://www.acme.com',
                'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Aliquid, porro perferendis dolores eaque tempora commodi beatae, 
                                facilis adipisci harum ducimus incidunt tempore corporis ullam 
                                molestias voluptas nulla veritatis et ut!',
        ]);
        Listing::create([
            
            'title'=>'Full-Stack Engineer',
            'tags'=>'Laravel,backend,api',
            'company'=>'Stark Indutries',
            'location'=>'New York,NY',
            'email'=>'stark@gmail.com',
            'website'=>'https://www.starkindustries.com',
            'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Aliquid, porro perferendis dolores eaque tempora commodi beatae, 
                            facilis adipisci harum ducimus incidunt tempore corporis ullam 
                            molestias voluptas nulla veritatis et ut!',
        ]);
        Listing::create([
            
            'title'=>'Junior FullStack Developer',
            'tags'=>'Laravel,vue Js',
            'company'=>'multilent Developer',
            'location'=>'Abuja NG',
            'email'=>'multilent@gmail.com',
            'website'=>'https://www.multilent.com',
            'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Aliquid, porro perferendis dolores eaque tempora commodi beatae, 
                            facilis adipisci harum ducimus incidunt tempore corporis ullam 
                            molestias voluptas nulla veritatis et ut!',
        ]);
            
        
    }
}
