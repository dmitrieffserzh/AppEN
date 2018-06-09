<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin\User;
use App\Models\Admin\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use Dotenv\Validator;

class NewsController extends Controller {

	public function __construct() {
		// $this->middleware('auth');
	}


	public function index() {
		$articles = News::latest()->paginate(5);
		return view('admin.news.index',compact('articles'))
			->with('i', (request()->input('page', 1) - 1) * 5);
	}


	public function create() {
		return view('admin.news.create');
	}


	public function store(Request $request) {

		request()->validate([
			'title' => 'required',
			'content' => 'required',
		]);

		$news = new News();
		$news->user_id = Auth::id();
		$news->title = $request['title'];
		$news->content = $request['content'];
		$news->published = 1;
		$news->category_id = 1;
		$news->save();

		return redirect()->route('admin.news.index')
		                 ->with('success','Article created successfully');
	}


	public function show($id) {
		$article = News::find($id);
		return view('admin.news.show',compact('article'));
	}


	public function edit($id) {
		$article = News::find($id);
		return view('admin.news.edit',compact('article'));
	}


	public function update(Request $request, $id) {
//		request()->validate([
//			'title' => 'required',
//			'content' => 'required',
//
//		]);

		News::find($id)->update($request->all());
		return redirect()->route('admin.news.index')
		                 ->with('success','Article updated successfully');
	}


	public function destroy($id) {
		News::find($id)->delete();
		return redirect()->route('admin.news.index')
		                 ->with('success','Article deleted successfully');
	}
}
