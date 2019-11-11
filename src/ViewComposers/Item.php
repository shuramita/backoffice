<?php

namespace Shura\BackOffice\ViewComposers;


use Illuminate\Http\Request;

class Item
{
    public $title;
    public $route;
    public $permission;
    public $icon;
    public $has_sub = false;
    public $sub = [];
    public $params;

    public function __construct($title, $route, $permission, $icon, $params = [])
    {

        $this->title = $title;
        $this->route = $route;
        $this->permission = $permission;
        $this->icon = $icon;
        $this->params = $params;

    }

    /**
     * @return array
     */
    public function getSubItems(): array
    {
        return $this->sub;
    }
    public function getCurrentURl(Request $request)
    {
        return $request->getUri();
    }
    public function hasSubItem(){
        return $this->has_sub === true;
    }
}
