<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UsersController extends Controller
{
    public function searchUsers(Request $request)
{
    $userQuery = User::query();
    
    // Filter users based on age
    $this->applyFilter($userQuery, 'age', $request->input('age'));
    
    // Filter users based on location
    $this->applyFilter($userQuery, 'location_id', $request->input('location_id'));
    
    // Filter users based on relationship
    $this->applyFilter($userQuery, 'relationship_id', $request->input('relationship_id'));
    
    // Filter users based on personality
    $this->applyFilter($userQuery, 'personality_id', $request->input('personality_id'));
    
    // Filter users based on language proficiency
    $this->applyFilter($userQuery, 'language_id', $request->input('language_id'));
    
    // Filter users based on religion
    $this->applyFilter($userQuery, 'religion_id', $request->input('religion_id'));
    
    // Filter users based on dietary preferences
    $this->applyFilter($userQuery, 'dietary_id', $request->input('dietary_id'));
    
    // Filter users based on allergies
    $this->applyFilter($userQuery, 'allergy_id', $request->input('allergy_id'));
    
    // Retrieve the filtered users and return as a JSON response
    $users = $userQuery->get();
    return response()->json($users);
}

/**
 * Apply a filter to the user query if the filter value is not empty.
 *
 * @param \Illuminate\Database\Eloquent\Builder $query
 * @param string $filterName
 * @param mixed $filterValue
 * @return void
 */
private function applyFilter($query, $filterName, $filterValue)
{
    if (!empty($filterValue)) {
        $query->where($filterName, $filterValue);
    }
}
}
