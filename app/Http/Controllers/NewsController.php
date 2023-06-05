<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class NewsController extends Controller
{
    //All news
    public function index(){
        //dd(request()->tag);
        return view('news.index' , [
            'news' => news::latest()->filter(request(['tag' , 'search']))->paginate(6)
        ]);
    }

    //One news
    public function show(news $new){
        return view('news.show', [
            'new' => $new
        ]);
    }
    //Show create form
    public function create(){
        return view('news.create');
    }

    //store news data
    public function  store(Request $request){

        $formFields = $request->validate([
            'title' => 'required',
            'location' => 'required',
            'contact' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
            'day' => 'required',

        ]);
        if($request->hasFile('logo'))
        {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] =  auth()->id();

        news::create($formFields);
        return redirect('/news')->with('message' , 'Announcement created successfully!');
    }

    // Show edit form
    public function edit(news $new){
        return view('news.edit', ['new' => $new]);
    }

    //update data
    public function update(Request $request, news $new){

        //make sure the logged in user is the owner
        if($new->user_id != auth()->id()){
            abort(403,'Unauthorized Action!');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'location' => 'required',
            'contact' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
            'day' => 'required',

        ]);
        if($request->hasFile('logo'))
        {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $new->update($formFields);
        return redirect('/news')->with('message' , 'Announcement updated successfully!');
    }

    //Delete

    public function destroy(news $new){

        //make sure the logged in user is the owner
        if($new->user_id != auth()->id()){
            abort(403,'Unauthorized Action!');
        }

        $new->delete();
        return redirect('/news')->with('message' , 'Announcement deleted successfully!');
    }

    //manage news
    public function manage(){
        return view('news.manage', ['news'=>auth()->user()->news()->get()]);
    }
}
