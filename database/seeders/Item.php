<?php

namespace Database\Seeders;

use App\Interfaces\Item as ItemInterface;
use Illuminate\Database\Seeder;

class Item extends Seeder
{

    private ItemInterface $item;
    public function __construct(ItemInterface $item)
    {
        $this->item = $item;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'category_id' => 1,
                'name' => 'Oval',
                'image' => 'http://placeimg.com/480/100/any',
                'price' => 10.20
            ],
            [
                'category_id' => 1,
                'name' => 'Round',
                'image' => 'http://placeimg.com/480/200/any',
                'price' => 50.00
            ],
            [
                'category_id' => 1,
                'name' => 'Square',
                'image' => 'http://placeimg.com/480/300/any',
                'price' => 80.00
            ],
            [
                'category_id' => 1,
                'name' => 'Diamond',
                'image' => 'http://placeimg.com/480/400/any',
                'price' => 10.00
            ],
            [
                'category_id' => 1,
                'name' => 'Heart',
                'image' => 'http://placeimg.com/480/500/any',
                'price' => 20.00
            ],
            [
                'category_id' => 1,
                'name' => 'Pear',
                'image' => 'http://placeimg.com/480/600/any',
                'price' => 100.00
            ],
            [
                'category_id' => 1,
                'name' => 'Bblong',
                'image' => 'http://placeimg.com/480/700/any',
                'price' => 215.00
            ],
            [
                'category_id' => 2,
                'name' => 'Bangs',
                'image' => 'http://placeimg.com/480/800/any',
                'price' => 15.00
            ],
            [
                'category_id' => 2,
                'name' => 'Chignon',
                'image' => 'http://placeimg.com/480/900/any',
                'price' => 40.00
            ],
            [
                'category_id' => 2,
                'name' => 'Coiffure',
                'image' => 'http://placeimg.com/490/100/any',
                'price' => 60.00
            ],
            [
                'category_id' => 2,
                'name' => 'Crop',
                'image' => 'http://placeimg.com/490/200/any',
                'price' => 80.00
            ],
            [  
                'category_id' => 3,
                'name' => 'Round',
                'image' => 'http://placeimg.com/420/100/any',
                'price' => 80.00
            ],
            [  
                'category_id' => 3,
                'name' => 'Monolid',
                'image' => 'http://placeimg.com/420/200/any',
                'price' => 90.00
            ],
            [  
                'category_id' => 3,
                'name' => 'Hooded',
                'image' => 'http://placeimg.com/420/300/any',
                'price' => 12.00
            ],
            [  
                'category_id' => 4,
                'name' => 'Round',
                'image' => 'http://placeimg.com/430/100/any',
                'price' => 5.00
            ],
            [  
                'category_id' => 4,
                'name' => "Cupid's Bow",
                'image' => 'http://placeimg.com/430/200/any',
                'price' => 7.00
            ],
            [  
                'category_id' => 4,
                'name' => "Heart-Shaped",
                'image' => 'http://placeimg.com/430/300/any',
                'price' => 8.00
            ],
            [  
                'category_id' => 4,
                'name' => "Thin",
                'image' => 'http://placeimg.com/430/400/any',
                'price' => 2.00
            ],
            [  
                'category_id' => 5,
                'name' => "Short",
                'image' => 'http://placeimg.com/410/100/any',
                'price' => 100.00
            ],
            [  
                'category_id' => 5,
                'name' => "Fat",
                'image' => 'http://placeimg.com/410/200/any',
                'price' => 110.00
            ],
            [
                  
                'category_id' => 6,
                'name' => "Ectomorph",
                'image' => 'http://placeimg.com/500/100/any',
                'price' => 500.00
            ],
            [
                  
                'category_id' => 6,
                'name' => "Mesomorph",
                'image' => 'http://placeimg.com/500/200/any',
                'price' => 700.00
            ],
            [
                  
                'category_id' => 7,
                'name' => "Fire",
                'image' => 'http://placeimg.com/510/100/any',
                'price' => 50.00
            ],
            [
                  
                'category_id' => 7,
                'name' => "Water",
                'image' => 'http://placeimg.com/510/200/any',
                'price' => 70.00
            ],
            [    
                'category_id' => 7,
                'name' => "Earth",
                'image' => 'http://placeimg.com/510/300/any',
                'price' => 80.00
            ],
            [    
                'category_id' => 7,
                'name' => "Air",
                'image' => 'http://placeimg.com/510/400/any',
                'price' => 90.00
            ],
            [    
                'category_id' => 8,
                'name' => "Sleeveless",
                'image' => 'http://placeimg.com/520/100/any',
                'price' => 15.00
            ],
            [    
                'category_id' => 8,
                'name' => "Tank",
                'image' => 'http://placeimg.com/520/200/any',
                'price' => 15.00
            ],
            [    
                'category_id' => 8,
                'name' => "Square",
                'image' => 'http://placeimg.com/520/300/any',
                'price' => 20.00
            ],
            [    
                'category_id' => 8,
                'name' => "Crew",
                'image' => 'http://placeimg.com/520/400/any',
                'price' => 20.00
            ],
            [    
                'category_id' => 8,
                'name' => "Crew",
                'image' => 'http://placeimg.com/520/400/any',
                'price' => 20.00
            ],
            [    
                'category_id' => 9,
                'name' => "Chino",
                'image' => 'http://placeimg.com/540/100/any',
                'price' => 500.00
            ],
            [    
                'category_id' => 9,
                'name' => "Jeans",
                'image' => 'http://placeimg.com/540/200/any',
                'price' => 600.00
            ],
            [    
                'category_id' => 9,
                'name' => "Formal",
                'image' => 'http://placeimg.com/540/300/any',
                'price' => 300.00
            ],
            [    
                'category_id' => 9,
                'name' => "Jogger",
                'image' => 'http://placeimg.com/540/400/any',
                'price' => 400.00
            ],
            [    
                'category_id' => 10,
                'name' => "Athletic shoes",
                'image' => 'http://placeimg.com/560/100/any',
                'price' => 400.00
            ],
            [    
                'category_id' => 10,
                'name' => "Dress shoes",
                'image' => 'http://placeimg.com/560/200/any',
                'price' => 500.00
            ],
            [    
                'category_id' => 10,
                'name' => "Sandals",
                'image' => 'http://placeimg.com/560/300/any',
                'price' => 100.00
            ],
            [    
                'category_id' => 10,
                'name' => "Boots",
                'image' => 'http://placeimg.com/560/400/any',
                'price' => 200.00
            ],
            [    
                'category_id' => 11,
                'name' => "Normal",
                'image' => 'http://placeimg.com/600/100/any',
                'price' => 10.00
            ],
            [    
                'category_id' => 11,
                'name' => "Normal",
                'image' => 'http://placeimg.com/600/100/any',
                'price' => 10.00
            ],
            [    
                'category_id' => 11,
                'name' => "Dry",
                'image' => 'http://placeimg.com/600/200/any',
                'price' => 50.00
            ],
            [    
                'category_id' => 11,
                'name' => "Oily",
                'image' => 'http://placeimg.com/600/300/any',
                'price' => 5.00
            ],
        ];
        foreach ($items as $item) {
            $this->item->create($item);
        }
    }
}
