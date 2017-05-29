<?php

namespace App\Http\Controllers;
use App\Suggestion;

use Illuminate\Http\Request;

class SuggestionsController extends Controller
{
    public function index() {
        $suggestions = Suggestion::All()->sortByDesc('created_at');
        return view('welcome', compact('suggestions'));
    }

    public function store() {
        $request = request()->all();

        $this->validate(request(), [
            'name' => 'required|min:2',
            'description' => 'required|min:5'
        ]);

        Suggestion::forceCreate([
            'name' => request('name'),
            'description' => request('description')
        ]);

        return ['message' => 'Project created!'];

    }

}
