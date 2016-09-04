<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Bus\DataBus;

class DataController extends Controller
{
    //
    public function setBooks(Request $request, DataBus $databus){
    	$databus->setBooks($request);
    }
    public function getBooks(DataBus $databus){
    	return $databus->getBooks()->toArray();
    }
    public function updateBooks(Request $request, DataBus $databus){
    	$databus->updateBooks($request);
    }
    public function deleteBooks(Request $request, DataBus $databus){
    	$databus->deleteBooks($request);
    }
}
