<?php

namespace Shura\BackOffice\ViewComposers;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use App\User;


class Navigator
{
    public $items;

    public function __construct()
    {
        $this->items = [
            'dashboard' => [
                'first' => new Item('Dashboard', 'backoffice.dashboard',
                    ['admin', 'manager', 'maker'],
                    ['type' => 'svg', 'file' => 'vendor.backoffice.bo-home', 'mdi' => 'home']
                ),
                'hasSubItems' => false,
                'order' => 0
            ]
        ];
    }


    public function registerNavigator($key, $item, $hasSubItem = false, $subItems = [], $order = 999)
    {

        $this->items[$key] = [
            'first' => $item,
            'hasSubItems' => $hasSubItem,
            'subItems' => $subItems,
            'order' => $order
        ];
    }

    public function registerSubNavigator($key, $item)
    {

        $this->items[$key]['hasSubItems'] = true;
        $this->items[$key]['subItems'][] = $item;

    }

    public function getItems()
    {
        return $this->items;
    }

    public function filterByRole(User $user)
    {
        $items = collect($this->items)->sortBy('order')->map(function ($item) use ($user) {
            $first = $item['first'];
//            $nav_item = new \stdClass();
            $nav_item = $this->buildItem($user, $first);
            $nav_item['hasSubItems'] = $item['hasSubItems'];
            if ($item['hasSubItems']) {
                $nav_item['subItems'] =  collect($item['subItems'])
                    ->sortBy('order')
                    ->map(function ($item) use ($user) {
                        return $this->buildItem($user, $item);
                    });
            }
            return $nav_item;
        })->filter(function ($value, $key) {
            return !empty($value);
        });
        return $items;
    }

    private function buildItem(User $user, Item $item)
    {

        if (isset($item->icon)) {
            if (isset($item->icon['type']) && $item->icon['type'] == 'svg') $item->icon['svg'] = $this->buildIconSvg($item->icon['file']);
        }
        if ($user->is($item->permission)) {
//            var_dump($item->params);
            $nav_item = [
                'link' => route($item->route,$item->params),
                'name' => $item->title,
                'icon' => $item->icon,
                'order' => $item->order ?? 999,
                'meta'=> $item->params ?? new \stdClass(),
                'routeName'=>$item->route
            ];
            return $nav_item;
        }
    }

    public function buildIconSvg($name)
    {
        return svg_image($name)->renderInline();
    }
}
