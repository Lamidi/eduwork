<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']);
Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store']);
Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);
Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);

Route::resource('/authors', App\Http\Controllers\AuthorController::class);
Route::resource('/publishers', App\Http\Controllers\PublisherController::class);
Route::resource('/books', App\Http\Controllers\BookController::class);
Route::resource('/members', App\Http\Controllers\MemberController::class);
Route::resource('/transactions', App\Http\Controllers\TransactionController::class);

// Route::resource('/transactions', [App\Http\Controllers\TransactionController::class, 'index']);
// Route::resource('/transactions/create', [App\Http\Controllers\TransactionController::class, 'create']);
// Route::resource('/transactions', [App\Http\Controllers\TransactionController::class, 'store']);
// Route::resource('/transactions/{transaction}/edit', [App\Http\Controllers\TransactionController::class, 'edit']);
// Route::resource('/transactions/{transaction}', [App\Http\Controllers\TransactionController::class, 'update']);
// Route::resource('/transactions/{transaction}', [App\Http\Controllers\TransactionController::class, 'destroy']);

Route::get('api/authors', [App\Http\Controllers\AuthorController::class, 'api']);
Route::get('api/publishers', [App\Http\Controllers\PublisherController::class, 'api']);
Route::get('api/books', [App\Http\Controllers\BookController::class, 'api']);
Route::get('api/members', [App\Http\Controllers\MemberController::class, 'api']);
Route::get('api/transactions', [App\Http\Controllers\TransactionController::class, 'api']);

// Route::get('/transactions/{transaction}/edit', function () {
//     $books = App\Models\Book::get()->toArray();
//     return view('array', compact('books'));
// });

Route::get('/spatie', function () {
    // $role = Spatie\Permission\Models\Role::whereName('petugas')->exists() ?
    //     Spatie\Permission\Models\Role::whereName('petugas')->first() : Spatie\Permission\Models\Role::create(['name' => 'petugas']);
    // $permission = Spatie\Permission\Models\Permission::where(['name' => 'index petugas'])->exists() ?
    //     Spatie\Permission\Models\Permission::where(['name' => 'index petugas'])->first() : Spatie\Permission\Models\Permission::create(['name' => 'index petugas']);

    // $role->givePermissionTo($permission);
    // $permission->assignRole($role);

    $user = auth()->user();
    $user->assignRole('petugas');

    // $user = User::with('roles')->get();
    return $user;
    //     $user = User::where('id', 2)->first();
    //     if ($user) $user->removeRole('officer');

    return response()->json('Sukses');
});
