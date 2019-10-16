<?php
namespace Shura\BackOffice\Controllers\API;

use Illuminate\Http\Request;
use Shura\BackOffice\Controllers\Controller;

class NavigationController extends Controller
{
    function index(Request $request){
        $items = app('BackOfficeNavigator')->filterByRole($request->user('api'));

        return $this->jsonResponse($items,'List of Nav Item');
    }
}
