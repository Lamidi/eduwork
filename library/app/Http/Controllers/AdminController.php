<?php
// app/Http/Controllers/AdminController.php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    /**
     * Grocery CRUD Example
     *
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function transaction()
    {
        if (auth()->user()->role('officer')) {
            $books = Book::all();
            $members = Member::all();
            return view('admin.transaction.index', compact('books', 'members'));
        } else {
            return abort('403');
            // }
            // $role = Role::create(['name' => 'officer']);
            // $permission = Permission::create(['name' => 'index transactions']);

            // $role->givePermissionTo($permission);
            // $permission->assignRole($role);

            // $user = auth()->user();
            // $user->assignRole('officer');

            // $user = User::with('roles')->get();

            // $user = User::where('id', 2)->first();
            // $user->removeRole('officer');
            //return $user;
        }
    }
}
