<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\Admin\AdminController;
use App\Http\controllers\Admin\AdminProfileController;
use App\Http\controllers\Admin\UserController;
use App\Http\controllers\Admin\CityController;
use App\Http\controllers\Admin\CoachController;
use App\Http\controllers\Admin\ParentController;
use App\Http\controllers\Coach\CoachLoginController;
use App\Http\controllers\Coach\CoachCourseAddController;
use App\Http\controllers\Coach\CoachBatchAddController;
use App\Http\controllers\Coach\CoachClasseAddController;
use App\Http\controllers\Coach\CoachRegisterController;
use App\Http\controllers\Coach\CoachProfileController;
use App\Http\controllers\Parent\ParentLoginController;
use App\Http\controllers\Parent\ParentCityController;
use App\Http\controllers\Parent\ParentRegisterController;
use App\Http\controllers\Parent\ParentProfileController;
use App\Http\controllers\Student\StudentLoginController;
use App\Http\controllers\Student\StudentRegisterController;
use App\Http\controllers\Student\StudentProfileController;
use App\Http\controllers\Student\StudentCityController;

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

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('login', [AdminController::class, 'authenticate']);
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
});
Route::middleware(['auth'=>'isAdmin'])->group(function () {                       
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/profileview', [AdminProfileController::class, 'profileview'])->name(('admin.profileview'));
    Route::get('/admin/profile/edit/{id}', [AdminProfileController::class, 'profileEdit'])->name(('admin.profile.edit'));
    Route::post('/admin/profile/update/{id}', [AdminProfileController::class, 'update'])->name(('admin.profile.update'));

    Route::get('/admin/cities', [CityController::class, 'index'])->name('admin.cities');
    Route::get('/admin/cities/add', [CityController::class, 'create'])->name(('admin.city.addcity'));
    Route::post('/admin/cities/store', [CityController::class, 'store'])->name(('admin.city.store'));
    Route::get('/admin/cities/edit/{id}', [CityController::class, 'edit'])->name(('admin.city.edit'));
    Route::post('/admin/cities/update/{id}', [CityController::class, 'update'])->name(('admin.city.update'));
    Route::get('/admin/cities/view/{id}', [CityController::class, 'view'])->name(('admin.city.view'));
    Route::get('/admin/cities/changeStatus/{id}', [CityController::class, 'changeStatus'])->name('changeStatus');
    Route::get('/admin/cities/delete/{id}', [CityController::class, 'delete'])->name(('admin.city.delete'));

    Route::get('/admin/coaches', [CoachController::class, 'index'])->name('admin.coaches');
    Route::get('/admin/coach/add', [CoachController::class, 'create'])->name(('admin.coach.add'));
    Route::post('/admin/coach/store', [CoachController::class, 'store'])->name(('admin.coach.store'));
    Route::get('/admin/coach/edit/{id}', [CoachController::class, 'edit'])->name(('admin.coach.edit'));
    Route::post('/admin/coach/update/{id}', [CoachController::class, 'update'])->name(('admin.coach.update'));
    Route::get('/admin/coach/change_status/{id}', [CoachController::class, 'changeStatus'])->name('change_status');
    Route::get('/admin/coach/delete/{id}', [CoachController::class, 'delete'])->name(('admin.coach.delete'));

    Route::get('/admin/parents', [ParentController::class, 'index'])->name('admin.parents');
    Route::get('/admin/parent/add', [ParentController::class, 'create'])->name(('admin.parent.add'));
    Route::post('/admin/parent/store', [ParentController::class, 'store'])->name(('admin.parent.store'));
    Route::get('/admin/parent/edit/{id}', [ParentController::class, 'edit'])->name(('admin.parent.edit'));
    Route::post('/admin/parent/update/{id}', [ParentController::class, 'update'])->name(('admin.parent.update'));
    Route::get('/admin/parent/status/{id}', [ParentController::class, 'status'])->name('parent.status');
    Route::get('/admin/parent/delete/{id}', [ParentController::class, 'delete'])->name(('admin.parent.delete'));
});
Route::group(['prefix' => 'coach'], function () {
    Route::get('login', [CoachLoginController::class, 'login'])->name('coach.login');
    Route::post('login', [CoachLoginController::class, 'authenticate']);
    Route::get('logout', [CoachLoginController::class, 'logout'])->name('coach.logout');
    Route::get('register', [CoachRegisterController::class, 'register'])->name('coach.register');
    Route::post('register', [CoachRegisterController::class, 'post_register']);
});

Route::middleware(['auth'=>'isCoach'])->group(function () {                       
    Route::get('/coach/dashboard', [CoachLoginController::class, 'dashboard'])->name('coach.dashboard');

    Route::get('/coach/profileview', [CoachProfileController::class, 'profileview'])->name(('coach.profileview'));
    Route::get('/coach/profile/edit/{id}', [CoachProfileController::class, 'profileEdit'])->name(('coach.profile.edit'));
    Route::post('/coach/profile/update/{id}', [CoachProfileController::class, 'update'])->name(('coach.profile.update'));

    Route::get('/coach/courses', [CoachCourseAddController::class, 'index'])->name('coach.courses');
    Route::get('/coach/course/add', [CoachCourseAddController::class, 'create'])->name(('coach.course.add'));
    Route::post('/coach/course/store', [CoachCourseAddController::class, 'store'])->name(('coach.course.store'));
    Route::get('/coach/course/edit/{id}', [CoachCourseAddController::class, 'edit'])->name(('coach.course.edit'));
    Route::post('/coach/course/update/{id}', [CoachCourseAddController::class, 'update'])->name(('coach.course.update'));
    Route::get('/coach/course/change_status/{id}', [CoachCourseAddController::class, 'changeStatus'])->name('change_status');
    Route::get('/coach/course/delete/{id}', [CoachCourseAddController::class, 'delete'])->name(('coach.course.delete'));

    Route::get('/coach/classes', [CoachClasseAddController::class, 'index'])->name('coach.classes');
    Route::get('/coach/class/add', [CoachClasseAddController::class, 'create'])->name(('coach.class.add'));
    Route::post('/coach/class/store', [CoachClasseAddController::class, 'store'])->name(('coach.class.store'));
    Route::get('/coach/class/edit/{id}', [CoachClasseAddController::class, 'edit'])->name(('coach.class.edit'));
    Route::post('/coach/class/update/{id}', [CoachClasseAddController::class, 'update'])->name(('coach.class.update'));
    Route::get('/coach/class/change_status/{id}', [CoachClasseAddController::class, 'changeStatus'])->name('change_status');
    Route::get('/coach/class/delete/{id}', [CoachClasseAddController::class, 'delete'])->name(('coach.class.delete'));

    Route::get('/coach/batches', [CoachBatchAddController::class, 'index'])->name('coach.batches');
    Route::get('/coach/batch/add', [CoachBatchAddController::class, 'create'])->name(('coach.batch.add'));
    Route::post('/coach/batch/store', [CoachBatchAddController::class, 'store'])->name(('coach.batch.store'));
    Route::get('/coach/batch/edit/{id}', [CoachBatchAddController::class, 'edit'])->name(('coach.batch.edit'));
    Route::post('/coach/batch/update/{id}', [CoachBatchAddController::class, 'update'])->name(('coach.batch.update'));
    Route::get('/coach/batch/change_status/{id}', [CoachBatchAddController::class, 'changeStatus'])->name('change_status');
    Route::get('/coach/batch/delete/{id}', [CoachBatchAddController::class, 'delete'])->name(('coach.batch.delete'));


});

Route::group(['prefix' => 'parent'], function () {
    Route::get('login', [ParentLoginController::class, 'login'])->name('parent.login');
    Route::post('login', [ParentLoginController::class, 'authenticate']);
    Route::get('logout', [ParentLoginController::class, 'logout'])->name('parent.logout');
    Route::get('register', [ParentRegisterController::class, 'register'])->name('parent.register');
    Route::post('register', [ParentRegisterController::class, 'post_register']);
});

Route::middleware(['auth'=>'isParent'])->group(function () {                       
    Route::get('/parent/dashboard', [ParentLoginController::class, 'dashboard'])->name('parent.dashboard');

    Route::get('/parent/cities', [ParentCityController::class, 'index'])->name('parent.cities');
    Route::get('/parent/cities/view/{id}', [ParentCityController::class, 'view'])->name(('parent.city.view'));

    Route::get('/parent/profileview', [ParentProfileController::class, 'profileview'])->name(('parent.profileview'));
    Route::get('/parent/profile/edit/{id}', [ParentProfileController::class, 'profileEdit'])->name(('parent.profile.edit'));
    Route::post('/parent/profile/update/{id}', [ParentProfileController::class, 'update'])->name(('parent.profile.update'));
});

Route::group(['prefix' => 'student'], function () {
    Route::get('login', [StudentLoginController::class, 'login'])->name('student.login');
    Route::post('login', [StudentLoginController::class, 'authenticate']);
    Route::get('/logout', [StudentLoginController::class, 'logout'])->name('student.logout');
    Route::get('register', [StudentRegisterController::class, 'register'])->name('student.register');
    Route::post('register', [StudentRegisterController::class, 'post_register']);
});

Route::middleware(['auth'=>'isStudent'])->group(function () {                       
    Route::get('/student/dashboard', [StudentLoginController::class, 'dashboard'])->name('student.dashboard');

    Route::get('/student/profileview', [StudentProfileController::class, 'profileview'])->name(('student.profileview'));
    Route::get('/student/profile/edit/{id}', [StudentProfileController::class, 'profileEdit'])->name(('student.profile.edit'));
    Route::post('/student/profile/update/{id}', [StudentProfileController::class, 'update'])->name(('student.profile.update'));

    Route::get('/student/cities', [StudentCityController::class, 'index'])->name('student.cities');
    Route::get('/student/cities/view/{id}', [StudentCityController::class, 'view'])->name(('student.city.view'));
});