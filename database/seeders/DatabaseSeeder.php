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
                'name' => 'Main Administrator',
                'password' => bcrypt('password123'),
                'role' => 'admin',
            ]
        );

        User::factory()->create([
        'name' => 'Sarah Realtor',
        'email' => 'sarah@realestate.mt',
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
    [
        'description'   => 'Restored traditional Maltese farmhouse with large garden and private pool.',
        'address'       => 'Triq tal-Farm 12',
        'city'          => 'Rabat',
        'country'       => 'Malta',
        'price'         => 675000,
        'bedrooms'      => 4,
        'bathrooms'     => 3,
        'property_type' => 'Farmhouse',
        'listing_date'  => now()->subDays(90),
    ],
    [
        'description'   => 'Luxury 3-bed penthouse with rooftop terrace and panoramic sea views.',
        'address'       => 'Spinola Bay Penthouse, Level 8',
        'city'          => 'St Julian’s',
        'country'       => 'Malta',
        'price'         => 950000,
        'bedrooms'      => 3,
        'bathrooms'     => 3,
        'property_type' => 'Penthouse',
        'listing_date'  => now()->subDays(15),
    ],
    [
        'description'   => 'Renovated 2-storey townhouse in the heart of the capital.',
        'address'       => 'Triq ir-Repubblika 23',
        'city'          => 'Valletta',
        'country'       => 'Malta',
        'price'         => 520000,
        'bedrooms'      => 3,
        'bathrooms'     => 2,
        'property_type' => 'Townhouse',
        'listing_date'  => now()->subDays(60),
    ],
    [
        'description'   => 'Brand new 1-bedroom apartment in modern block with communal pool.',
        'address'       => 'Triq il-Knisja 8, Block A',
        'city'          => 'Mosta',
        'country'       => 'Malta',
        'price'         => 218000,
        'bedrooms'      => 1,
        'bathrooms'     => 1,
        'property_type' => 'Apartment',
        'listing_date'  => now()->subDays(10),
    ],
    ];

    $owners = Owner::all();
$agents = User::where('email', '!=', 'admin@mcast.edu.mt')->get();

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


    $imagePool = [
    'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',     // modern living room
    'https://images.unsplash.com/photo-1600563438938-a9a0e3d8d6a4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',     // kitchen interior
    'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',     // bedroom
    'https://images.unsplash.com/photo-1600585154526-990dced4db0d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',     // exterior modern house
    'https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',     // luxury apartment balcony
    'https://images.unsplash.com/photo-1613490493576-7fde63acd811?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',     // villa with pool
    'https://images.unsplash.com/photo-1583608205776-b928249ac1a7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',     // cozy townhouse
    'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',     // penthouse view
    'https://images.unsplash.com/photo-1600210492493-0946911123ea?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',     // bathroom
    'https://images.unsplash.com/photo-1600585152220-90363fe7e115?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',     // open plan living
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

    }
    } 
}
