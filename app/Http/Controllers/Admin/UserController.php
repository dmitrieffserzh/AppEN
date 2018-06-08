<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller {

	public function __construct() {
		// $this->middleware('auth');
	}


	public function index() {
		$articles = Article::latest()->paginate(5);
		return view('admin.story.index',compact('articles'))
			->with('i', (request()->input('page', 1) - 1) * 5);
	}


	public function create() {
		return view('admin.story.create');
	}


	public function store(Request $request) {
		request()->validate([
			'title' => 'required',
			'body' => 'required',
		]);
		Article::create($request->all());
		return redirect()->route('admin.story.index')
		                 ->with('success','Article created successfully');
	}


	public function show($id) {
		$article = Article::find($id);
		return view('admin.story.show',compact('article'));
	}


	public function edit($id) {
		$article = Article::find($id);
		return view('admin.story.edit',compact('article'));
	}


	public function update(Request $request, $id) {
		request()->validate([
			'title' => 'required',
			'body' => 'required',
		]);
		Article::find($id)->update($request->all());
		return redirect()->route('admin.story.index')
		                 ->with('success','Article updated successfully');
	}


	public function destroy($id) {
		Article::find($id)->delete();
		return redirect()->route('admin.story.index')
		                 ->with('success','Article deleted successfully');
	}
}
