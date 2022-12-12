<?php

use App\Http\Controllers\BlockController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeLineController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\PieceStoreController;
use App\Http\Controllers\ShipPolicyController;
use App\Http\Controllers\ShipPolicyRecordController;
use App\Http\Controllers\StripController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Models\Block;
use App\Models\Employee;
use App\Models\EmployeeLine;
use App\Models\Machine;
use App\Models\Material;
use App\Models\OrderItem;
use App\Models\Piece;
use App\Models\Strip;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::view('/test' , 'test');


Route::get('/login', [UserController::class, 'showLogin'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest')->name('login');
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');

Route::redirect('/', '/knooz-misr/factory-7/home');

Route::prefix('/knooz-misr/factory-7')->middleware('auth')->group(function () {

    Route::get('/', [HomeController::class , 'index'])->name('home');
    Route::get('/home', [HomeController::class , 'index']);
    Route::get('/statistics', [HomeController::class , 'index']);

    Route::prefix('/blocks')->as('blocks.')->group(function () {
        Route::get('/all', [BlockController::class, 'all'])->name('all');
        Route::get('/current', [BlockController::class, 'current'])->name('current');
        Route::get('/cut', [BlockController::class, 'cut'])->name('cut');


    Route::get('/producity', [BlockController::class, 'producity'])->name('producity');

        Route::get('/create', [BlockController::class, 'create'])->name('create');
        Route::post('/store', [BlockController::class, 'store'])->name('store');
        Route::get('/{block}/edit', [BlockController::class, 'edit'])->name('edit');
        Route::post('/{block}/update', [BlockController::class, 'update'])->name('update');
        Route::get('/{block}/delete', [BlockController::class, 'destroy'])->name('delete')->can('delete' , Block::class);
    });

    Route::prefix('/materials')->as('materials.')->group(function () {

        Route::get('/all', [MaterialController::class, 'all'])->name('all');

        Route::get('/create', [MaterialController::class, 'create'])->name('create');
        Route::post('/store', [MaterialController::class, 'store'])->name('store');
        Route::get('/{material}/edit', [MaterialController::class, 'edit'])->name('edit');
        Route::post('/{material}/update', [MaterialController::class, 'update'])->name('update');
        Route::get('/{material}/delete', [MaterialController::class, 'destroy'])->name('delete')->can('delete' , Material::class);
    });

    Route::prefix('/strips')->as('strips.')->group(function () {

        Route::get('/all', [StripController::class, 'all'])->name('all');
        Route::get('/current', [StripController::class, 'current'])->name('current');
        Route::get('/cut', [StripController::class, 'cut'])->name('cut');

        // for block
        Route::get('/{block}/create', [StripController::class, 'createToBlock'])->name('block.create');
        Route::post('/{block}/store', [StripController::class, 'storeToBlock'])->name('block.store');

        Route::get('/create', [StripController::class, 'create'])->name('create');
        Route::post('/store', [StripController::class, 'store'])->name('store');
        Route::get('/{strip}/edit', [StripController::class, 'edit'])->name('edit');
        Route::post('/{strip}/update', [StripController::class, 'update'])->name('update');
        Route::get('/{strip}/delete', [StripController::class, 'destroy'])->name('delete')->can('delete' , Strip::class);
    });

    Route::prefix('/pieces')->as('pieces.')->group(function () {

        Route::get('/all', [PieceController::class, 'all'])->name('all');
        Route::get('/sizes', [PieceController::class, 'sizes'])->name('sizes');
        Route::get('/shipped', [PieceController::class, 'shipped'])->name('shipped');

        // for block
        Route::get('/{block}/create', [StripController::class, 'createToBlock'])->name('block.create');
        Route::post('/{block}/store', [StripController::class, 'storeToBlock'])->name('block.store');


        Route::get('/create', [PieceController::class, 'create'])->name('create');
        Route::post('/store', [PieceController::class, 'store'])->name('store');
        Route::get('/{piece}/edit', [PieceController::class, 'edit'])->name('edit');
        Route::post('/{piece}/update', [PieceController::class, 'update'])->name('update');
        Route::get('/{piece}/delete', [PieceController::class, 'destroy'])->name('delete')->can('delete' , Piece::class);
    });


    // storage of the pices
    Route::prefix('/pieces-store')->as('pieces-store.')->group(function () {

        Route::get('/all', [PieceStoreController::class, 'all'])->name('all');
        Route::get('/sizes', [PieceStoreController::class, 'sizes'])->name('sizes');
        Route::get('/shipped', [PieceStoreController::class, 'shipped'])->name('shipped');

        Route::get('/create', [PieceStoreController::class, 'create'])->name('create');
        Route::post('/store', [PieceStoreController::class, 'store'])->name('store');
        Route::get('/{pieceStore}/edit', [PieceStoreController::class, 'edit'])->name('edit');
        Route::post('/{pieceStore}/update', [PieceStoreController::class, 'update'])->name('update');
        Route::get('/{pieceStore}/delete', [PieceStoreController::class, 'destroy'])->name('delete')->can('delete' , Piece::class);
    });

    Route::prefix('/orders')->as('orders.')->group(function () {

        Route::get('/all', [OrderController::class, 'all'])->name('all');
        Route::get('/current', [OrderController::class, 'current'])->name('current');
        Route::get('/done', [OrderController::class, 'done'])->name('done');

        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::post('/store', [OrderController::class, 'store'])->name('store');
        Route::get('/{order}/edit', [OrderController::class, 'edit'])->name('edit');
        Route::post('/{order}/update', [OrderController::class, 'update'])->name('update');
        Route::get('/{order}/delete', [OrderController::class, 'destroy'])->name('delete')->can('delete' , Order::class);

        Route::get('/{order}/start', [OrderController::class, 'start'])->name('start');
        Route::get('/{order}/stop', [OrderController::class, 'stop'])->name('stop');
        Route::get('/{order}/finish', [OrderController::class, 'finish'])->name('finish');


        // items
        Route::get('/{order}/items', [OrderItemController::class, 'index'])->name('items');
        Route::get('/{order}/items/create', [OrderItemController::class, 'create'])->name('items.create');
        Route::post('/{order}/items/store', [OrderItemController::class, 'store'])->name('items.store');

        Route::get('/items/{orderItem}/edit', [OrderItemController::class, 'edit'])->name('items.edit');
        Route::post('/items/{orderItem}/update', [OrderItemController::class, 'update'])->name('items.update');
        Route::get('/items/producty/{orderItem}/create', [OrderItemController::class, 'createProducty'])->name('items.producty.create');
        Route::post('/items/producty/{orderItem}/store', [OrderItemController::class, 'storeProducty'])->name('items.producty.store');
        Route::get('/items/shipped/{orderItem}/create', [OrderItemController::class, 'createShipped'])->name('items.shipped.create');
        Route::post('/items/shipped/{orderItem}/store', [OrderItemController::class, 'storeShipped'])->name('items.shipped.store');
        Route::get('/items/{orderItem}/finish', [OrderItemController::class, 'finish'])->name('items.finish');
        Route::get('/items/{orderItem}/delete', [OrderItemController::class, 'destroy'])->name('items.destroy');


        // files
        Route::get('/{order}/files', [FileController::class, 'index'])->name('files');
        Route::get('/{order}/files/create', [FileController::class, 'create'])->name('files.create');
        Route::post('/{order}/files/store', [FileController::class, 'store'])->name('files.store');

        Route::get('/{order}/files/{file}/delete', [FileController::class, 'destroy'])->name('files.destroy');

        // ships policy
        Route::get('/{order}/ship-policies', [ShipPolicyController::class, 'index'])->name('ship-policies');
        Route::get('/{order}/ship-policies/create', [ShipPolicyController::class, 'create'])->name('ship-policies.create');
        Route::post('/{order}/ship-policies/store', [ShipPolicyController::class, 'store'])->name('ship-policies.store');
        Route::get('/{order}/ship-policies/{shipPolicy}//delete', [ShipPolicyController::class, 'destroy'])->name('ship-policies.destroy');

        // ships policy records
        Route::get('/{order}/ship-policies/{shipPolicy}/records', [ShipPolicyRecordController::class, 'index'])->name('ship-policies.records');
        Route::get('/{order}/ship-policies/{shipPolicy}/records/print', [ShipPolicyRecordController::class, 'print'])->name('ship-policies.records.print');
        Route::get('/{order}/ship-policies/{shipPolicy}/records/create', [ShipPolicyRecordController::class, 'create'])->name('ship-policies.records.create');
        Route::post('/{order}/ship-policies/{shipPolicy}/records/store', [ShipPolicyRecordController::class, 'store'])->name('ship-policies.records.store');

        Route::get('/{order}/ship-policies/{shipPolicy}/records/{shipPolicyRecord}/delete', [ShipPolicyRecordController::class, 'destroy'])->name('ship-policies.records.destroy');
    });

    Route::prefix('/machines')->as('machines.')->group(function () {
        Route::get('/all', [MachineController::class, 'all'])->name('all');

        Route::get('/create', [MachineController::class, 'create'])->name('create');
        Route::post('/store', [MachineController::class, 'store'])->name('store');
        Route::get('/{machine}/edit', [MachineController::class, 'edit'])->name('edit');
        Route::post('/{machine}/update', [MachineController::class, 'update'])->name('update');
        Route::get('/{machine}/delete', [MachineController::class, 'destroy'])->name('delete')->can('delete' , Machine::class);
    });

    Route::prefix('/employees')->as('employees.')->group(function () {
        Route::get('/all', [EmployeeController::class, 'all'])->name('all');
        Route::get('/attendance', [EmployeeController::class, 'attendance'])->name('attendance');

        Route::get('/create', [EmployeeController::class, 'create'])->name('create');
        Route::post('/store', [EmployeeController::class, 'store'])->name('store');
        Route::get('/{employee}/edit', [EmployeeController::class, 'edit'])->name('edit');
        Route::post('/{employee}/update', [EmployeeController::class, 'update'])->name('update');
        Route::get('/{employee}/delete', [EmployeeController::class, 'destroy'])->name('delete')->can('delete' , Employee::class);

        Route::prefix('/lines')->as('lines.')->group(function () {
            Route::get('/all', [EmployeeLineController::class, 'all'])->name('all');

            Route::get('/create', [EmployeeLineController::class, 'create'])->name('create');
            Route::post('/store', [EmployeeLineController::class, 'store'])->name('store');
            Route::get('/edit', [EmployeeLineController::class, 'edit'])->name('edit');
            Route::post('/update', [EmployeeLineController::class, 'update'])->name('update');
            Route::get('/delete', [EmployeeLineController::class, 'destroy'])->name('delete')->can('delete' , EmployeeLine::class);
        });
    });

    Route::prefix('/users')->as('users.')->group(function () {
        Route::get('/all', [UserController::class, 'all'])->name('all');

        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::post('/{user}/update', [UserController::class, 'update'])->name('update');
        Route::get('/{user}/delete', [UserController::class, 'destroy'])->name('delete')->can('delete' , User::class);
    });



});
