<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Traits\Filter;
use App\Services\Traits\Search;
use App\Services\Traits\Sort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserController extends Controller
{
    use Sort;
    use Filter;
    use Search;

    /**
     * @param Request $request
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $users = User::query();
        $users = $this->search($users, ['id', 'name', 'email', 'created_at']);

        if ($request->has('direction')) {
            $columns = $this->sortables($request);
            $users = $this->sort($users, $columns, $request->get('direction'));
        } else {
            $users = $users->orderBy('name', 'asc');
        }

        $users = $users->orderBy('name', 'asc')->paginate(100);
        $params = $request->all();

        return Inertia::render('Users/Index', [
            'users' => $users->withQueryString(),
            'params' => $params
        ]);
    }

    /**
     * @param $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return Inertia::render('Users/Create', [
            'edited_user' => $user

        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'unique:users,email,' . $user->id],
            'profile_photo_path' => ['nullable', 'image', 'max:2048'],
        ]);
        $data = $request->all();

        if ($request->get('password') || $request->get('current_password') || $request->get('password_confirmation')) {
            $this->validate($request, [
                'current_password' => ['required', 'password', 'different:password'],
                'password' => $this->passwordRules(),
            ]);
            $data['password'] = Hash::make($data['password']);
        } else {
            $data['password'] = Auth::user()->getAuthPassword();
        }
        unset($data['_method']);
        unset($data['current_password']);
        unset($data['password_confirmation']);
        unset($data['profile_photo_url']);

        if ($request->file('profile_photo_path')) {
            $data['profile_photo_path'] = 'storage/' . $request->file('profile_photo_path')->store('images', 'public');
        }

        $user->update($data);

        return redirect::route('users.index')->with('success', 'User updated successfully.');
    }
}
