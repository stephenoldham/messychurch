<?php

namespace App\Http\Controllers;

use App\Present;
use Illuminate\Http\Request;

class PresentsController extends Controller
{
    /**
     * Store a present in the database
     *
     * @return Response
     **/
    public function store(Request $request)
    {
		$quantity = $request->number;
		$count    = Present::count();

    	for ($i = 1; $i <= $quantity; $i++) { 
    		$present = new Present;
			// 
			$present->number = $count + $i;
			$present->name   = $request->name;
			$present->age    = $request->age;
			$present->gender = $request->gender;
			// 
			$present->save();	
    	}

		return redirect()->back();
    }

    /**
     * Get all presents
     *
     * @return json
     **/
    public function getAll()
    {
    	$presents = Present::get(['number', 'name', 'age', 'gender']);

    	$presents->map(function($present){
    		// Pad number
    		$present->number = str_pad($present->number, 3, '0', STR_PAD_LEFT);

    		// Format gender
    		$present->gender = $present->formatGender();

    		// Get color
    		$present->color = $present->getColor();
    	});

    	return $presents;
    }
}
