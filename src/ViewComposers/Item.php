<?php
namespace Shura\BackOffice\ViewComposers;


use Illuminate\Http\Request;

class Item
{
    public $title;
    public $route;
    public $permission;
    public $icon;

    public function __construct($title,$route,$permission,$icon,$params=[])
    {

        $this->title = $title;
        $this->route = $route;
        $this->permission = $permission;
        $this->icon = $icon;

    }
    public function getCurrentURl(Request $request){
        return $request->getUri();
    }
}
