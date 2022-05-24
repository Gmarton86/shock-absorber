<php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserController extends Controller
{

    public function formSubmit(Request $request)
    {
    	return response()->json([$request->all()]);
    }
}