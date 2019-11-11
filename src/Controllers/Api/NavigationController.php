<?php
namespace Shura\BackOffice\Controllers\API;

use Illuminate\Http\Request;
use Shura\BackOffice\Controllers\Controller;
use Shura\BackOffice\Facades\Navigator;

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
        $items = Navigator::filterByRole($request->user('api'));

        return $this->jsonResponse($items,'List of Nav Item');
    }
}
