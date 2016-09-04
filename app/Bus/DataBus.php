<?php

namespace App\Bus;


use App\Books;
/**
* 
*/
class DataBus
{
	public function setBooks($data){
		$book = new Books();
		$book->nama = $data->nama;
		$book->kategori = $data->kategori;
		$book->deskripsi = $data->deskripsi;
		$book->save();
	}
	public function getBooks(){
		return Books::all();
	}
	public function updateBooks($data){
		$book = Books::find($data->id);
		$book->nama = $data->nama;
		$book->kategori = $data->kategori;
		$book->deskripsi = $data->deskripsi;
		$book->save();
	}
	public function deleteBooks($data){
		return Books::where('id','=',$data->id)->delete();
	}
}