<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
class ListingController extends Controller
{
	public function add_image_urls($model, $id){
		for($i=1;$i<=4;$i++){
			$model['image_'.$i]=asset(
				'images/'.$id.'/Image_'.$i.'.jpg'
			);
		}
		return $model;
	}
    public function get_listing_api(Listing $listing){
    	$model = $listing->toArray();
    	$model = $this->add_image_urls($model, $listing->id);
    	//we use the response helper with json method to pass the array into fields
    	return response()->json($model);
    }
    public function get_listing_web(Listing $listing){
    	$model = $listing->toArray();
    	$model = $this->add_image_urls($model, $listing->id);
    	//dd($model);
    	return view('app', ['model'=>$model]);
    }
}
