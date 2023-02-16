<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allItems = User::paginate();
        return UserResource::collection($allItems);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:20',
            'e_mail' => 'unique:users|email|max:40',
            'full_name' => 'unique:users|string|max:40',
            'superintendent_id' => 'nullable|int|exists:users,id'
        ]);

        if(empty($request->superintendent_id)){
           $request->superintendent_id = null;
        }

        $user = User::create($validated);
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:20',
            'e_mail' => 'email|max:40',
            'full_name' => 'string|max:40',
            'superintendent_id' => 'nullable|int|exists:users,id'
        ]);

        if(empty($request->superintendent_id)){
           $request->superintendent_id = null;
        }

        $user->update($validated);
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Display a listing of a singular resource along with its related notifications.
     *
     * @return \Illuminate\Http\Response
     */
    public function notificationIndex(Request $request, int $userID){
        $user = User::find($userID);
        if(!is_null($user->superintendent_id)){
            $notifications = \App\Models\Notification::where('user_id', $userID)->get();
        } else {
            $notifications = \App\Models\Notification::where('superintendent_id', $userID)->get();
        }

        return $this->returnJsonResponse($notifications);
    }

    /**
     * Display a listing of a singular resource along with its related Shifts
     *
     * @return \Illuminate\Http\Response
     */
    public function shiftIndex(Request $request, int $userID){
        $shifts = User::find($userID)->shifts()->get();
        return $this->returnJsonResponse($shifts);
    }

    /**
     * Display a listing of a singular resource along with its related Roles.
     *
     * @return \Illuminate\Http\Response
     */
    public function roleIndex(Request $request, int $userID){
        $roles = User::find($userID)->roles()->get();
        return $this->returnJsonResponse($roles);
    }

    /**
     * Display a listing of a singular resource along with its related Super intendent Users
     *
     * @return \Illuminate\Http\Response
     */
    public function superintendentIndex(Request $request, int $userID){
        $user = User::find($userID);
        $superIntendents = User::where('id', $user->superintendent_id)->get();

        return $this->returnJsonResponse($superIntendents);
    }

    /**
     * Stuctures the response for non-resourced calls.
     *
     * @return \Illuminate\Http\Response
     */
    public function returnJsonResponse($data) {
        $data = ['data' => $data];

        return response()->json($data, 200)->header('Content-Type', 'application/json');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'e_mail' => ['required', 'email'],
            'password' => ['required'],
        ]);



        if (Auth::attempt($credentials)) {
            $authenticatedUser = User::where('e_mail', $request->get('e_mail'))->first();

            return $this->returnJsonResponse(['is_authenticated' => true, 'user_id' => $authenticatedUser->id]);
        } else {
            return response()->json(['data' => ['is_authenticated' => false]], 401)->header('Content-Type', 'application/json');
        }
    }
}
