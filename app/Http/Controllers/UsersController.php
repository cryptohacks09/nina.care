<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UsersController extends Controller
{
    public function index(Request $request)
{
    $query = User::query();
    
    // User based on age
    if ($request->filled('age')) {
        $query->where('age', $request->age);
    }
    // Users based on location
    if ($request->filled('location_id')) {
        $query->where('location_id', $request->location_id);
    }
   //  Users based on Relationships
    if ($request->filled('relationship_id')) {
        $query->where('relationship_id', $request->relationship_id);
    }
    // Users based on Personalities
    if ($request->filled('personality_id')) {
        $query->where('personality_id', $request->personality_id);
    }
   //  Users based on Language Proefficiency
    
    if ($request->filled('language_id')) {
        $query->where('language_id', $request->language_id);
    }
    //  Users based on Religion
    if ($request->filled('religion_id')) {
        $query->where('religion_id', $request->religion_id);
    }
    //  Users based on Language Diet wishlist
    
    if ($request->filled('dietary_id')) {
        $query->where('dietary_id', $request->dietary_id);
    }
    //  Users based on Types of Allergies 

    if ($request->filled('allergy_id')) {
        $query->where('allergy_id', $request->allergy_id);
    }
    //  Users  Collection based on above inputs
    
    $users = $query->get();
    
    return response()->json($users);
}


public function UsingBigQuery(Request $request)
    {
        $bigQuery = new BigQueryClient([
            'projectId' => 'your-project-id',
            'keyFile' => json_decode(file_get_contents('/path/to/your/keyfile.json'), true),
        ]);
        
        $query = $bigQuery->query()
            ->select('*')
            ->from('your-dataset.users');
            
        if ($request->has('age')) {
            $query->where('age', '=', $request->age);
        }
        
        if ($request->has('location_id')) {
           $query->where('location_id', '=', $request->location_id);
        }
        
        if ($request->has('relationship_id')) {
            $query->where('relationship_id', '=', $request->relationship_id);
        }
        
        if ($request->has('personality_id')) {
            $query->where('personality_id', '=', $request->personality_id);
        }
        
        if ($request->has('language_id')) {
            $query->where('language_id', '=', $request->language_id);
        }
        
        if ($request->has('religion_id')) {
            $query->where('religion_id', '=', $request->religion_id);
        }
        
        if ($request->has('dietary_id')) {
            $query->where('dietary_id', '=', $request->dietary_id);
        }
        
        if ($request->has('allergy_id')) {
            $query->where('allergy_id', '=', $request->allergy_id);
        }
        
        $results = $query->execute();
        
        return response()->json($results->rows());
    }

}
