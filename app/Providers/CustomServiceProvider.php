<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Category as CategoryInterface;
use App\Interfaces\Item as ItemInterface;
use App\Interfaces\User as UserInterface;
use App\Interfaces\UserDressUp as UserDressUpInterface;
use App\Interfaces\UserInventoryItem as UserInventoryItemInterface;
use App\Interfaces\UserDressUpItem as UserDressUpItemInterface;
use App\Interfaces\Wallet as WalletInterface;
use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use App\Models\UserDressUp;
use App\Models\UserDressUpItem;
use App\Models\UserInventoryItem;
use App\Models\Wallet;
use App\Repositories\Category as CategoryRepository;
use App\Repositories\Item as ItemRepository;
use App\Repositories\User as UserRepository;
use App\Repositories\UserDressUp as UserDressUpRepository;
use App\Repositories\UserInventoryItem as UserInventoryItemRepository;
use App\Repositories\Wallet as WalletRepository;
use App\Repositories\UserDressUpItem as UserDressUpItemRepository;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(CategoryInterface::class, function() {
            return new CategoryRepository(new Category());
        });
        app()->bind(ItemInterface::class, function() {
            return new ItemRepository(new Item(), new Category());
        });
        app()->bind(UserInterface::class, function() {
            return new UserRepository(new User());
        });
        app()->bind(UserDressUpInterface::class, function() {
            return new UserDressUpRepository(new UserDressUp());
        });
        app()->bind(UserInventoryItemInterface::class, function() {
            return new UserInventoryItemRepository(new UserInventoryItem());
        });
        app()->bind(WalletInterface::class, function() {
            return new WalletRepository(new Wallet());
        });
        app()->bind(UserDressUpItemInterface::class, function() {
            return new UserDressUpItemRepository(new UserDressUpItem());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
