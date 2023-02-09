<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Course;

class ArticleController extends Controller
{
    public function getArticles(Request $request)
    {
        return Article::where('title', 'LIKE', "%". $request->query('query') ."%")->paginate(12);
    }
    public function UploadImage(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        $imageName = time().'.'.$request->image->extension();

        $path = '/uploads/images/';
        $request->image->move(public_path($path), $imageName);

        return response()->json( $path.$imageName, 200);

    }
    public function showAllCourses(Request $request)
    {
        return Course::where('name', 'LIKE', "%". $request->query('query') ."%")->paginate(12);
    }
}
