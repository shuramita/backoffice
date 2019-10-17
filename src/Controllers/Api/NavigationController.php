<?php
namespace Shura\BackOffice\Controllers\API;

use Illuminate\Http\Request;
use Shura\BackOffice\Controllers\Controller;

/**
 * @group Shura BackOffice
 *
 */
class NavigationController extends Controller
{
    /**
     * Get a list of navigation item for each authenticated user
     *
     * */
    function index(Request $request){
        $items = app('BackOfficeNavigator')->filterByRole($request->user('api'));

        return $this->jsonResponse($items,'List of Nav Item');
    }
}
