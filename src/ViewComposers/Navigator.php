<?php

namespace Shura\BackOffice\ViewComposers;

use Illuminate\View\View;
use App\User;


class Navigator
{
    public $items;

    public function __construct()
    {
        $this->items = [
            'dashboard'=>[
                'first'=>new Item('Dashboard','backoffice.dashboard',
                    ['admin','manager','maker'],
                    ['type'=>'svg','file'=>'vendor.backoffice.bo-home','mdi'=>'home']
                ),
                'has_sub'=>false,
                'order'=>0
            ]
        ];
    }


    public function registerNavigator($key,$item,$has_sub=false,$sub = [],$order=999){

        $this->items[$key] = [
            'first'=>$item,
            'has_sub'=>$has_sub,
            'sub'=>$sub,
            'order'=>$order
        ];
    }

    public function registerSubNavigator($key,$item){

        $this->items[$key]['has_sub'] = true;
        $this->items[$key]['sub'][] = $item;

    }

    public function getItems(){
        return $this->items;
    }

    public function filterByRole(User $user){

        $items = collect($this->items)->sortBy('order')->map(function($item) use ($user) {
            $first =  $item['first'];

            if(isset($first->icon)) {
                if(isset($first->icon['type']) && $first->icon['type'] == 'svg') $first->icon['svg'] = $this->buildIconSvg($first->icon['file']);
            }
            if($user->is($first->permission)) {
                $nav_item = [
                    'link'=>route($first->route),
                    'name'=>$first->title,
                    'icon'=>$first->icon,
                    'order'=>$item->order ?? 999,
                ];
                return $nav_item;
            }
        })->filter(function($value,$key){
            return !empty($value);
        });
        return $items;
    }
    public function buildIconSvg($name){
        return svg_image($name)->renderInline();
    }
}
