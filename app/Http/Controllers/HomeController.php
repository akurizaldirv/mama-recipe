<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = array();
        $result = Recipe::all();
        foreach ($result as $res) {
            $createdBy = User::find($res->user_id);
            if ($createdBy) {
                $row = [
                    'id' => $res->id,
                    'title' => $res->title,
                    'description' => $res->description,
                    'postedBy' => $createdBy->name
                ];

                array_push($data, $row);
            }
        }

        return view('home', [
            'data' => $data
        ]);
    }
    public function addRecipe()
    {
        return view('addRecipe');
    }
}
