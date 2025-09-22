<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;

class ActorController extends Controller
{
    public function create()
    {
        return view('actors.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|unique:actors,email',
            'description' => 'required',
        ]);

        $description = $request->description;

        // Use regex extraction instead of mock
        $data = $this->extractActorDetails($description);

        // Check required fields
        if (empty($data['first_name']) || empty($data['last_name']) || empty($data['address'])) {
            return back()->withErrors([
                'description' => 'Please add first name, last name, and address to your description.'
            ]);
        }

        // Save to DB
        Actor::create([
            'email' => $request->email,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'address' => $data['address'],
            'height' => $data['height'],
            'weight' => $data['weight'],
            'gender' => $data['gender'],
            'age' => $data['age'],
        ]);

        return redirect()->route('actors.index');
    }


    public function index()
    {
        $actors = Actor::all();
        return view('actors.index', compact('actors'));
    }

    public function promptValidation()
    {
        return response()->json(['message' => 'text_prompt']);
    }

private function extractActorDetails($description)
{
    $mockFile = storage_path('app/mock_actors.json');
    $actors = json_decode(file_get_contents($mockFile), true);

    foreach ($actors as $actor) {
        if (
            stripos($description, $actor['first_name']) !== false &&
            stripos($description, $actor['last_name']) !== false
        ) {
            // Check if address is also mentioned in the description
            if (stripos($description, $actor['address']) !== false) {
                return $actor;
            }

            // Return actor but wipe out address if missing in description
            $actor['address'] = null;
            return $actor;
        }
    }

    // return empty if no match found
    return [
        'first_name' => null,
        'last_name'  => null,
        'address'    => null,
        'height'     => null,
        'weight'     => null,
        'gender'     => null,
        'age'        => null,
    ];
}


}
