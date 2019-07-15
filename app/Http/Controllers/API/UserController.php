<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreFavorieRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use App\Movie;

class UserController extends Controller
{
    public function index()
    {
        return User::latest()->paginate(10);
    }

    public function store(User $user,  StoreUserRequest $request)
    {
        $newUser = $user->store_user_to_database($request);
        return $newUser;
    }

    public function show(User $user)
    {
        //Add movies to The user model
        $user->movies;
        return ['user' => $user];
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        return ['message' => 'updated'];
    }

    public function destroy(User $user)
    {
        $user->delete();
        return ['message' => 'user deleted'];
    }

    public function findUser()
    {
        if ($search = \Request::get('q')) {
            $user = User::where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");
            })->paginate(20);
        } else {
            $user = User::latest()->paginate(10);
        }
        return $user;
    }
    public function favorite(StoreFavorieRequest $request)
    {
        $user = User::find($request['user_id']);
        $user->movies()->syncWithoutDetaching($request['movie_id']);
        return ['message' => 'favorite Added'];
    }
}
