<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class QuestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

    }

    public function get_quest(Request $request){
        $queryParams = $request->query();
        $amount = $queryParams['amount'];
        $category = $queryParams['category'];
        $difficulty = $queryParams['difficulty'];
        $type = $queryParams['type'];


        $response = Http::get('https://opentdb.com/api.php', [
            'amount' => $amount,
            'category' => $category,
            'difficulty' => $difficulty,
            'type' => 'boolean'
        ]);
        return $response->json();
    }

    public function categories(Request $request){
        $response = Http::get('https://opentdb.com/api_category.php');
        return $response->json();
    }

    
}
