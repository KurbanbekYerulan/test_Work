<?php

namespace App\Http\Controllers;

use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Mail\SendEmail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = User::orderBy('id', 'desc')->where('role_id', [Role::ROLE_MANAGER_ID])->get();
        return new ViewResponse('staff.index', ['data' => $staff]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return new ViewResponse('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => Role::ROLE_MANAGER_ID,
        ]);
        $message = 'For ' . $request->first_name . ' ' . $request->last_name . ' was created account';
        $data = [
            'email' => $request->email,
            'message' => $message
        ];
        Mail::to($request->email)->send(new SendEmail($data));
        return new RedirectResponse(route('staff.index'), ['flash_success' => 'Успешно сохранено']);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $staff = User::find($id);
        return new ViewResponse('staff.edit', ['data' => $staff]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $staff = User::find($id);
        $staff->first_name = $request->first_name;
        $staff->last_name = $request->last_name;
        $staff->email = $request->email;
        if (!empty($request->password)) {
            $staff->password = Hash::make($request->password);
        }
        $staff->update();
        return new RedirectResponse(route('staff.index'), ['flash_success' => 'Успешно обновлено']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (User::destroy($id)) {
            return new RedirectResponse(route('staff.index'), ['flash_success' => 'Успешно удалено']);
        }

        return new RedirectResponse(route('staff.index'), ['flash_error' => 'Не удалось удалить']);
    }
}
