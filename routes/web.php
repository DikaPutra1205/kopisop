<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CashFlowController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\StockController;
use App\Exports\CashFlowExport;
use App\Exports\DeliveriesExport;
use App\Exports\PembelianMaterialExport;
use App\Exports\StocksExport;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\JobMixController;
use App\Http\Controllers\KonversiController;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\SolarController;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\CashFlow;
use App\Models\Konversi;
use App\Models\LogActivity;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/login/process', [LoginController::class, 'login_process'])->name('login-process');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');




Route::group(['middleware' => ['web', 'auth', 'CheckFinance']], function () {
    Route::get('/pembelian-material', [MaterialController::class, 'index'])->name('list-material');
    Route::get('/pembelian-material/create', [MaterialController::class, 'create'])->name('create-material');
    Route::post('/pembelian-material/store', [MaterialController::class, 'store'])->name('store-material');
    Route::get('/pembelian-material/{id}/edit', [MaterialController::class, 'edit'])->name('edit-material');
    Route::put('/material/{id}', [MaterialController::class, 'update'])->name('update-material');

    Route::get('export-cashflows', function () {
        return Excel::download(new CashFlowExport, 'cashflows.xlsx');
    })->name('export-cashflows');
});

Route::group(['middleware' => ['web', 'auth', 'CheckLogistic']], function () {
    Route::get('/stocks', [StockController::class, 'index'])->name('list-stocks');
    Route::get('/stocks/create', [StockController::class, 'create'])->name('create-stocks');
    Route::post('stocks/store', [StockController::class, 'store'])->name('store-stocks');
    Route::get('stocks/{id}/edit', [StockController::class, 'edit'])->name('edit-stocks');
    Route::put('stocks/{id}', [StockController::class, 'update'])->name('update-stocks');
    Route::delete('/stocks/{id}/delete', [StockController::class, 'destroy'])->name('delete-stocks');

    Route::get('/pemakaian-solar', [SolarController::class, 'index'])->name('list-solar');
    Route::get('/pemakaian-solar/create', [SolarController::class, 'create'])->name('create-solar');
    Route::post('/pemakaian-solar/store', [SolarController::class, 'store'])->name('store-solar');
    Route::get('solar/{id}/edit', [SolarController::class, 'edit'])->name('edit-solar');
    Route::put('solar/{id}', [SolarController::class, 'update'])->name('update-solar');
    Route::delete('solar/{id}', [SolarController::class, 'destroy'])->name('delete-solar');
});

Route::group(['middleware' => ['web', 'auth', 'CheckManagement']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/cashflows', [CashFlowController::class, 'index'])->name('list-cashflows');
    Route::get('/cashflows/create', [CashFlowController::class, 'create'])->name('create-cashflows');
    Route::post('/cashflows/store', [CashFlowController::class, 'store'])->name('store-cashflows');
    Route::get('/cashflows/{id}/edit', [CashFlowController::class, 'edit'])->name('edit-cashflow');
    Route::put('/cashflows/{id}', [CashFlowController::class, 'update'])->name('update-cashflow');

    Route::get('/pembelian-material', [MaterialController::class, 'index'])->name('list-material');
    Route::get('/pembelian-material/create', [MaterialController::class, 'create'])->name('create-material');
    Route::post('/pembelian-material/store', [MaterialController::class, 'store'])->name('store-material');
    Route::get('/pembelian-material/{id}/edit', [MaterialController::class, 'edit'])->name('edit-material');
    Route::put('/material/{id}', [MaterialController::class, 'update'])->name('update-material');

    Route::get('export-cashflows', function () {
        return Excel::download(new CashFlowExport, 'cashflows.xlsx');
    })->name('export-cashflows');

    Route::get('export-material', function () {
        return Excel::download(new PembelianMaterialExport, 'pembelian_material.xlsx');
    })->name('export-material');

    Route::get('/export-stocks', [StockController::class, 'exportStocks'])->name('export-stocks');

    Route::get('/export-stocks', function (Request $request) {
        $konversi = Konversi::find($request->konversi_id);
        return Excel::download(new StocksExport($konversi), 'stocks.xlsx');
    })->name('export-stocks');

    Route::get('/export-material/{id}', [MaterialController::class, 'export'])->name('export-material-single');

    Route::get('/stocks', [StockController::class, 'index'])->name('list-stocks');
    Route::get('/stocks/create', [StockController::class, 'create'])->name('create-stocks');
    Route::post('stocks/store', [StockController::class, 'store'])->name('store-stocks');
    Route::get('stocks/{id}/edit', [StockController::class, 'edit'])->name('edit-stocks');
    Route::put('stocks/{id}', [StockController::class, 'update'])->name('update-stocks');
    Route::delete('/stocks/{id}/delete', [StockController::class, 'destroy'])->name('delete-stocks');

    Route::get('/pemakaian-solar', [SolarController::class, 'index'])->name('list-solar');
    Route::get('/pemakaian-solar/create', [SolarController::class, 'create'])->name('create-solar');
    Route::post('/pemakaian-solar/store', [SolarController::class, 'store'])->name('store-solar');
    Route::get('solar/{id}/edit', [SolarController::class, 'edit'])->name('edit-solar');
    Route::put('solar/{id}', [SolarController::class, 'update'])->name('update-solar');
    Route::delete('solar/{id}', [SolarController::class, 'destroy'])->name('delete-solar');

    Route::get('/jobmix', [JobMixController::class, 'index'])->name('list-jobmix');
    Route::get('/jobmix/create', [JobMixController::class, 'create'])->name('create-jobmix');
    Route::post('/jobmix/store', [JobMixController::class, 'store'])->name('store-jobmix');
    Route::delete('/jobmix/{id}/delete-fa', [JobMixController::class, 'destroyfa'])->name('delete-jobmix-fa');
    Route::delete('/jobmix/{id}/delete-nfa', [JobMixController::class, 'destroynfa'])->name('delete-jobmix-nfa');
    Route::delete('/jobmix/{id}/delete-special', [JobMixController::class, 'destroyspecial'])->name('delete-jobmix-special');
    Route::get('/jobmix/{id}/edit-fa', [JobMixController::class, 'edit_fa'])->name('edit-jobmix-fa');
    Route::put('/jobmix/{id}/update-fa', [JobMixController::class, 'update_fa'])->name('update-jobmix-fa');
    Route::get('/jobmix/{id}/edit-nfa', [JobMixController::class, 'edit_nfa'])->name('edit-jobmix-nfa');
    Route::put('/jobmix/{id}/update-nfa', [JobMixController::class, 'update_nfa'])->name('update-jobmix-nfa');
    Route::get('/jobmix/{id}/edit-special', [JobMixController::class, 'edit_special'])->name('edit-jobmix-special');
    Route::put('/jobmix/{id}/update-special', [JobMixController::class, 'update_special'])->name('update-jobmix-special');


    Route::resource('deliveries', DeliveryController::class);
    Route::get('/pemakaian_aktual/{id}', [DeliveryController::class, 'create_actual'])->name('actual');
    Route::put('/pemakaian_aktual/{id}/update', [DeliveryController::class, 'store_actual'])->name('store-actual');
    Route::get('/get-mutu-options', [DeliveryController::class, 'getMutuOptions'])->name('get-mutu-options');

    Route::get('deliveries/export', function () {
        return Excel::download(new DeliveriesExport, 'deliveries.xlsx');
    })->name('export-deliveries');

    Route::get('/konversi', [KonversiController::class, 'index'])->name('list-konversi');
    Route::get('/konversi/{id}/edit', [KonversiController::class, 'edit'])->name('edit-konversi');
    Route::put('/konversi/{id}', [KonversiController::class, 'update'])->name('update-konversi');

    Route::get('/manuals', [ManualController::class, 'index'])->name('list-manuals');
    Route::get('/manuals/create', [ManualController::class, 'create'])->name('create-manuals');
    Route::post('/manuals/store', [ManualController::class, 'store'])->name('store-manuals');
    Route::get('/manuals/{id}/edit', [ManualController::class, 'edit'])->name('edit-manuals');
    Route::put('/manuals/{id}/update', [ManualController::class, 'update'])->name('update-manuals');
    Route::delete('/manuals/{id}', [ManualController::class, 'delete'])->name('delete-manuals');
});

Route::group(['middleware' => ['web', 'auth', 'CheckTaxStaff']], function () {
    Route::get('/cashflows', [CashFlowController::class, 'index'])->name('list-cashflows');
    Route::get('/cashflows/create', [CashFlowController::class, 'create'])->name('create-cashflows');
    Route::post('/cashflows/store', [CashFlowController::class, 'store'])->name('store-cashflows');
    Route::get('/cashflows/{id}/edit', [CashFlowController::class, 'edit'])->name('edit-cashflow');
    Route::put('/cashflows/{id}', [CashFlowController::class, 'update'])->name('update-cashflow');

    Route::get('export-cashflows', function () {
        return Excel::download(new CashFlowExport, 'cashflows.xlsx');
    })->name('export-cashflows');
});

Route::group(['middleware' => ['web', 'auth', 'CheckTechnician']], function () {
    Route::get('/konversi', [KonversiController::class, 'index'])->name('list-konversi');
    Route::get('/konversi/{id}/edit', [KonversiController::class, 'edit'])->name('edit-konversi');
    Route::put('/konversi/{id}', [KonversiController::class, 'update'])->name('update-konversi');

    Route::get('/jobmix', [JobMixController::class, 'index'])->name('list-jobmix');
    Route::get('/jobmix/create', [JobMixController::class, 'create'])->name('create-jobmix');
    Route::post('/jobmix/store', [JobMixController::class, 'store'])->name('store-jobmix');
    Route::delete('/jobmix/{id}/delete-fa', [JobMixController::class, 'destroyfa'])->name('delete-jobmix-fa');
    Route::delete('/jobmix/{id}/delete-nfa', [JobMixController::class, 'destroynfa'])->name('delete-jobmix-nfa');
    Route::delete('/jobmix/{id}/delete-special', [JobMixController::class, 'destroyspecial'])->name('delete-jobmix-special');
    Route::get('/jobmix/{id}/edit-fa', [JobMixController::class, 'edit_fa'])->name('edit-jobmix-fa');
    Route::put('/jobmix/{id}/update-fa', [JobMixController::class, 'update_fa'])->name('update-jobmix-fa');
    Route::get('/jobmix/{id}/edit-nfa', [JobMixController::class, 'edit_nfa'])->name('edit-jobmix-nfa');
    Route::put('/jobmix/{id}/update-nfa', [JobMixController::class, 'update_nfa'])->name('update-jobmix-nfa');
    Route::get('/jobmix/{id}/edit-special', [JobMixController::class, 'edit_special'])->name('edit-jobmix-special');
    Route::put('/jobmix/{id}/update-special', [JobMixController::class, 'update_special'])->name('update-jobmix-special');
});

Route::group(['middleware' => ['web', 'auth', 'CheckSales']], function () {
    Route::resource('deliveries', DeliveryController::class);
    Route::get('/pemakaian_aktual/{id}', [DeliveryController::class, 'create_actual'])->name('actual');
    Route::put('/pemakaian_aktual/{id}/update', [DeliveryController::class, 'store_actual'])->name('store-actual');
    Route::get('/get-mutu-options', [DeliveryController::class, 'getMutuOptions'])->name('get-mutu-options');
});
