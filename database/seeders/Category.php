<?php

namespace Database\Seeders;

use App\Interfaces\Category as CategoryInterface;
use Illuminate\Database\Seeder;

class Category extends Seeder
{
    private CategoryInterface $category;

    public function __construct(CategoryInterface $category)
    {
        $this->category = $category;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Head', 'Hairs', 'Eyes', 'Lips', 'Neck', 'Torso', 'Hand', 'Vest', 'Pants', 'Shoes', 'Skin'];
        $position = 1;
        foreach ($categories as $category) {
            $this->category->create([
                'name' => $category,
                'image' => 'http://placeimg.com/480/'.($position*100).'/any',
                'position' => $position
            ]);
            $position++;
        }
    }
}
