<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Todo;

use App\Http\Controllers\Controller;

class TodosController extends Controller {
 
	
	public function index(Todo $todo) {
 
		$todos = $todo->all();
		return response()->json(compact('todos'),200);
	}
 
	
	public function store(Todo $todo, Request $request) {
		
		$todo->fill($request->all());
        $todo->save();
		
		return response()->json(compact('todo'),200);
	}
 
	
	public function update(Request $request,$id) {

		$todo = Todo::find($id);
		$todo->update(['title'=>$request->title,'content'=>$request->content]);
        return response()->json(compact('todo'),200);
 
		
	}
 
	public function destroy($id) {

		$id =explode(",",$id);
		foreach($id as $i){
			Todo::destroy($i);
		}
	
	}
 
}
