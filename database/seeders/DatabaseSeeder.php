<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Owner;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@mcast.edu.mt'],
            [
                'name'     => 'Main Administrator',
                'password' => bcrypt('password123'),   // better than bcrypt()
                'role'     => 'admin',
            ]
        );

        User::factory()->create([
            'name'     => 'Sarah Realtor',
            'email'    => 'sarah@realestate.mt',
            'password' => bcrypt('agent123'),
        ]);

        User::factory()->create([
            'name'     => 'Mark Agent',
            'email'    => 'mark@realestate.mt',
            'password' => bcrypt('agent123'),
        ]);

        $categoryNames = ['Apartment', 'Villa', 'Penthouse', 'Maisonette', 'Farmhouse'];
        foreach ($categoryNames as $name) {
            Category::firstOrCreate(['name' => $name]);
        }

        $ownersData = [
            [
                'name'    => 'Joseph Camilleri',
                'email'   => 'joseph.camilleri@gmail.com',
                'phone'   => '+356 9944 1122',
                'address' => 'Triq il-Kbira, 45, Sliema SLM 1545',
            ],
            [
                'name'    => 'Maria Borg',
                'email'   => 'maria.borg82@hotmail.com',
                'phone'   => '+356 7922 3344',
                'address' => 'Triq San Pawl, 12, Valletta VLT 1112',
            ],
            [
                'name'    => 'Anthony Vella',
                'email'   => 'tony.vella.properties@outlook.com',
                'phone'   => '+356 9988 7766',
                'address' => 'Triq il-Mosta, 78, Mosta MST 9010',
            ],
            [
                'name'    => 'Sofia Zammit',
                'email'   => 'sofia.zammit77@yahoo.com',
                'phone'   => '+356 7911 2233',
                'address' => 'Triq il-Knisja, 3, Rabat RBT 2051',
            ],
        ];

        foreach ($ownersData as $data) {
            Owner::firstOrCreate(
                ['email' => $data['email']],
                $data
            );
        }

        $propertiesData = [
            [
                'description'   => 'Bright 2-bedroom apartment with sea views, balcony and modern kitchen.',
                'address'       => 'Triq il-Kbira 45, Tower Road',
                'city'          => 'Sliema',
                'country'       => 'Malta',
                'price'         => 385000,
                'bedrooms'      => 2,
                'bathrooms'     => 2,
                'property_type' => 'Apartment',
                'listing_date'  => now()->subDays(45),
            ],
        ];

        $owners = Owner::all();
        $agents = User::where('email', '!=', 'admin@mcast.edu.mt')->get();

        if ($agents->isEmpty()) {
            $this->command->error('No agents found! Please create at least one non-admin user.');
            return;
        }

        foreach ($propertiesData as $data) {
            Property::create([
                'owner_id'      => $owners->random()->id,
                'agent_id'      => $agents->random()->id,
                'category_id'   => null,  
                'description'   => $data['description'],
                'address'       => $data['address'],
                'city'          => $data['city'],
                'country'       => $data['country'],
                'price'         => $data['price'],
                'bedrooms'      => $data['bedrooms'],
                'bathrooms'     => $data['bathrooms'],
                'property_type' => $data['property_type'],
                'listing_date'  => $data['listing_date'],
            ]);
        }

        $imagePool = [
            'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
            'https://images.unsplash.com/photo-1600563438938-a9a0e3d8d6a4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
            'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
            'https://images.unsplash.com/photo-1600585154526-990dced4db0d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
            'https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
            'https://images.unsplash.com/photo-1613490493576-7fde63acd811?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
            'https://images.unsplash.com/photo-1583608205776-b928249ac1a7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
            'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
            'https://images.unsplash.com/photo-1600210492493-0946911123ea?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
            'https://images.unsplash.com/photo-1600585152220-90363fe7e115?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
        ];

        $properties = Property::all();

        foreach ($properties as $property) {
            $numberOfImages = rand(2, 5);
            $selectedImages = collect($imagePool)->shuffle()->take($numberOfImages);

            foreach ($selectedImages as $index => $url) {
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_path'  => $url,
                    'order'       => $index + 1,
                ]);
            }
        }

        $this->command->info('Database seeded successfully!');
        $this->command->info('Users: ' . User::count());
        $this->command->info('Owners: ' . Owner::count());
        $this->command->info('Properties: ' . Property::count());
        $this->command->info('Images: ' . PropertyImage::count());
    }
}