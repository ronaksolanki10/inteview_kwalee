<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\Item;
use App\Interfaces\Item as ItemInterface;

class ItemController extends Controller
{
    private ItemInterface $item;
    
    public function __construct(ItemInterface $item)
    {
        $this->item = $item;
    }
    public function get()
    {
        $items = $this->item->get();

        return new Item($items);
    }
}