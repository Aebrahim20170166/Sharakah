<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OpportunityController as AdminOpportunityController;
use App\Http\Controllers\Admin\OpportunityCostsController;
use App\Http\Controllers\Admin\SectorController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Web\InvestmentController;
use App\Http\Controllers\Admin\InvestmentController as AdminInvestmentController;
use App\Http\Controllers\Web\OpportunityController;
use App\Http\Controllers\Web\SupportController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [OpportunityController::class, 'home'])->name('home');
Route::get('/myInvestments', [InvestmentController::class, 'myInvestments'])->name('myInvestments')->middleware('auth');

Route::get('/opportunities/all', [OpportunityController::class, 'all'])->name('opportunities');
Route::get('/daily/{id}', [OpportunityController::class, 'daily'])->name('daily');

Route::get('/opportunities/filter', [OpportunityController::class, 'filter'])->name('opportunities.filter');


Route::get('/opportunity/{opportunity}', [OpportunityController::class, 'show'])->name('opportunity');
// route for investment on some opportunity
Route::post('/opportunity/{opportunity}/invest', [InvestmentController::class, 'store'])->name('opportunity.invest');



Route::get('/support', [SupportController::class, 'index'])->name('support');

Route::post('/support', [SupportController::class, 'store'])->name('support.store');

Route::get('/registeration', [UserController::class, 'login_page'])->name('registeration');

Route::post('/login', [UserController::class, 'login'])->name('web.login');

Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// group dashboard route here
Route::prefix('dashboard')->group(function () {
    
    Route::get('/support', [SupportController::class, 'index'])->name('support');
    
    Route::post('/support', [SupportController::class, 'store'])->name('support.store');

    Route::get('/login-page', [AuthController::class, 'loginPage'])->name('login-page');

    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/sign-up', [AuthController::class, 'signUp'])->name('sign-up');
    Route::prefix('/')->middleware('Admin')->group(function(){

        Route::get('/', [HomeController::class, 'index'])->name('dashboard');
        //sectors routes
        Route::get('/sectors', [SectorController::class, 'index'])->name('dashboard.sectors.index');
        Route::get('/sectors/create', [SectorController::class, 'create'])->name('dashboard.sectors.create');
        Route::post('/sectors', [SectorController::class, 'store'])->name('dashboard.sectors.store');
        Route::get('/sectors/{id}/edit', [SectorController::class, 'edit'])->name('dashboard.sectors.edit');
        Route::put('/sectors/{id}', [SectorController::class, 'update'])->name('dashboard.sectors.update');
        Route::delete('/sectors/{id}', [SectorController::class, 'destroy'])->name('dashboard.sectors.destroy');
    
        // branches routes
        Route::get('/branches', [BranchController::class, 'index'])->name('branches.index');
        Route::get('/branches/create', [BranchController::class, 'create'])->name('branches.create');
        Route::post('/branches', [BranchController::class, 'store'])->name('branches.store');
        Route::get('/branches/{id}/edit', [BranchController::class, 'edit'])->name('branches.edit');
        Route::put('/branches/{id}', [BranchController::class, 'update'])->name('branches.update');
        Route::delete('/branches/{id}', [BranchController::class, 'destroy'])->name('branches.destroy');
    
        // cities routes
        Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
        Route::get('/cities/create', [CityController::class, 'create'])->name('cities.create');
        Route::post('/cities', [CityController::class, 'store'])->name('cities.store');
        Route::get('/cities/{id}/edit', [CityController::class, 'edit'])->name('cities.edit');
        Route::post('/cities/{id}', [CityController::class, 'update'])->name('cities.update');
        Route::get('/cities/{id}', [CityController::class, 'destroy'])->name('cities.destroy');
    
        //countries routes
        Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');
        Route::get('/countries/create', [CountryController::class, 'create'])->name('countries.create');
        Route::post('/countries', [CountryController::class, 'store'])->name('countries.store');
        Route::get('/countries/{id}/edit', [CountryController::class, 'edit'])->name('countries.edit');
        Route::post('/countries/{id}', [CountryController::class, 'update'])->name('countries.update');
        Route::get('/countries/{id}', [CountryController::class, 'destroy'])->name('countries.destroy');
    
        //opportunities routes
        Route::get('/opportunities', [AdminOpportunityController::class, 'index'])->name('opportunities.index');
        Route::get('/opportunities/create', [AdminOpportunityController::class, 'create'])->name('opportunities.create');
        Route::post('/opportunities', [AdminOpportunityController::class, 'store'])->name('opportunities.store');
        Route::get('/opportunities/{id}/edit', [AdminOpportunityController::class, 'edit'])->name('opportunities.edit');
        Route::post('/opportunities/{id}', [AdminOpportunityController::class, 'update'])->name('opportunities.update');
        Route::get('/opportunities/{id}', [AdminOpportunityController::class, 'destroy'])->name('opportunities.destroy');
    
        // users routes
        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
        Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [AdminUserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [AdminUserController::class, 'destroy'])->name('users.destroy');
    
        // cities routes
        Route::get('/costs', [OpportunityCostsController::class, 'index'])->name('dashboard.opportunity_costs.index');
        Route::get('/costs/create', [OpportunityCostsController::class, 'create'])->name('dashboard.opportunity_costs.create');
        Route::post('/costs', [OpportunityCostsController::class, 'store'])->name('dashboard.opportunity_costs.store');
        Route::get('/costs/{id}/edit', [OpportunityCostsController::class, 'edit'])->name('dashboard.opportunity_costs.edit');
        Route::put('/costs/{id}', [OpportunityCostsController::class, 'update'])->name('dashboard.opportunity_costs.update');
        Route::delete('/costs/{id}', [OpportunityCostsController::class, 'destroy'])->name('dashboard.opportunity_costs.destroy');


        // cities routes
        Route::get('/invistmints', [AdminInvestmentController::class, 'index'])->name('dashboard.invistmints.index');
        Route::get('/invistmints/{id}', [AdminInvestmentController::class, 'show'])->name('dashboard.invistmints.show');
        Route::post('/invistmints/{id}/approve', [AdminInvestmentController::class, 'approve'])->name('dashboard.invistmints.approve');
        Route::post('/invistmints/{id}/reject', [AdminInvestmentController::class, 'reject'])->name('dashboard.invistmints.reject');
        Route::post('/invistmints/{id}/cancel', [AdminInvestmentController::class, 'cancel'])->name('dashboard.invistmints.cancel');
        Route::post('/invistmints/bulk-action', [AdminInvestmentController::class, 'bulkAction'])->name('dashboard.invistmints.bulk-action');
        Route::get('/invistmints/export', [AdminInvestmentController::class, 'export'])->name('dashboard.invistmints.export');


        Route::get('/daily_report/{id}', [AdminInvestmentController::class, 'daily_report'])->name('dashboard.invistmints.daily_report');
        Route::post('/daily_report/store', [AdminInvestmentController::class, 'daily_report_store'])->name('dashboard.invistmints.daily_report_store');

    });
});
