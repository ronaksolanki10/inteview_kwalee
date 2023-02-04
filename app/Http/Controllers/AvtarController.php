<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BuyItem;
use App\Http\Requests\DressUp;
use App\Http\Resources\BuyItem as ResourcesBuyItem;
use App\Http\Resources\CurrentAvtar;
use App\Http\Resources\DressUp as ResourcesDressUp;
use App\Interfaces\Category as CategoryInterface;
use App\Interfaces\Item as ItemInterface;
use App\Interfaces\UserDressUp as UserDressUpInterface;
use App\Interfaces\UserInventoryItem as UserInventoryItemInterface;
use App\Interfaces\Wallet as WalletInterface;
use App\Interfaces\UserDressUpItem as UserDressUpItemInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AvtarController extends Controller
{
    private UserDressUpInterface $userDressup;
    private UserInventoryItemInterface $userInventoryItem;
    private ItemInterface $item;
    private WalletInterface $wallet;
    private CategoryInterface $category;
    private UserDressUpItemInterface $userDressupItem;

    public function __construct(UserDressUpInterface $userDressup, UserInventoryItemInterface $userInventoryItem, ItemInterface $item, WalletInterface $wallet, CategoryInterface $category, UserDressUpItemInterface $userDressupItem)
    {
        $this->userDressup = $userDressup;
        $this->userInventoryItem = $userInventoryItem;
        $this->item = $item;
        $this->wallet = $wallet;
        $this->category = $category;
        $this->userDressupItem = $userDressupItem;
    }
    public function currentAvtar()
    {
        $user = Auth::user();
        $currentAvtar = $this->userDressup->findWhere([
            [
                'column' => 'user_id',
                'operator' => '=',
                'value' => $user->id
            ],
            [
                'column' => 'is_current',
                'operator' => '=',
                'value' => true
            ]
        ]);
        $unlockedItems = $this->userInventoryItem->findWhere([
            [
                'column' => 'user_id',
                'operator' => '=',
                'value' => $user->id
            ]
        ]);

        return new CurrentAvtar([
            'current_avtar' => $currentAvtar,
            'unlocked_items' => $unlockedItems
        ]);
    }
    public function buyItem(BuyItem $request)
    {
        $user = Auth::user();
        $userInventoryItem = $this->userInventoryItem->findWhere(
            [
                [
                    'column' => 'user_id',
                    'operator' => '=',
                    'value' => $user->id
                ],
                [
                    'column' => 'item_id',
                    'operator' => '=',
                    'value' => $request->item_id
                ]
            ]
        );
        if ($userInventoryItem->count() == 0) {
            $item = $this->item->find($request->item_id);
            $balance = $this->wallet->getBalance($user->id);
            if ($balance < $item->price) {
                return new ResourcesBuyItem([
                    'message' => trans('avtar.error.insufficient_balance'),
                    'status' => Response::HTTP_UNPROCESSABLE_ENTITY
                ]);
            }
            $this->wallet->debit($user->id, $item->price);
            $this->userInventoryItem->create([
                'user_id' => $user->id,
                'item_id' => $request->item_id
            ]);
            return new ResourcesBuyItem([
                'message' => '',
                'status' => Response::HTTP_OK
            ]);
        } else {
            return new ResourcesBuyItem([
                'message' => trans('avtar.error.item_already_purchased'),
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY
            ]);
        }
    }
    public function dressUp(DressUp $request)
    {
        $user = Auth::user();
        $categories = $this->category->get();
        if ($categories->count() != count($request->item_ids)) {
            return new ResourcesDressUp([
                'message' => trans('avtar.error.select_all_items'),
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY
            ]);
        }
        if (count(array_unique($request->item_ids)) != count($request->item_ids)) {
            return new ResourcesDressUp([
                'message' => trans('avtar.error.single_item_within_category'),
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY
            ]);
        }
        $selectedItems = $this->item->findIn('id', $request->item_ids);
        if ($selectedItems->count() != $categories->count()) {
            return new ResourcesDressUp([
                'message' => trans('avtar.error.some_item_not_available'),
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY
            ]);
        }
        if (count(array_unique($selectedItems->pluck('category_id')->toArray())) != $categories->count()) {
            return new ResourcesDressUp([
                'message' => trans('avtar.error.single_item_within_category'),
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY
            ]);
        }
        foreach ($selectedItems as $item) {
            $userInventoryItem = $this->userInventoryItem->findWhere([
                [
                    'column' => 'user_id',
                    'operator' => '=',
                    'value' => $user->id
                ],
                [
                    'column' => 'item_id',
                    'operator' => '=',
                    'value' => $item->id
                ]
            ]);
            if ($userInventoryItem->count () < 1) {
                $didNotPurchasedItems[] = $item->name;
            }
        }
        if (isset($didNotPurchasedItems) && !empty($didNotPurchasedItems)) {
            return new ResourcesDressUp([
                'message' => trans('avtar.error.did_not_purchase_item'). implode(', ', $didNotPurchasedItems),
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY
            ]);
        }
        $this->userDressup->makeAllNonCurrent($user->id);
        $this->userDressup->create([
            'user_id' => $user->id,
            'is_current' => true,
        ]);
        $userDressUp = $this->userDressup->findWhere([
            [
                'column' => 'user_id',
                'operator' => '=',
                'value' => $user->id
            ],
            [
                'column' => 'is_current',
                'operator' => '=',
                'value' => true
            ]
        ]);
        foreach ($selectedItems as $item) {
            $this->userDressupItem->create([
                'user_dress_up_id' => $userDressUp->id,
                'item_id' => $item->id
            ]);
        }
        return new ResourcesDressUp([
            'message' => trans('avtar.success.dressup_successfull'),
            'status' => Response::HTTP_OK
        ]);
    }
}