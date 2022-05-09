<?php
use App\Http\Controllers\Frontend\UsersPainController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Users\LanguageController;
use App\Http\Controllers\Users\PainController;
Route::view('/', 'welcome')->name('home');
Route::view('/home', 'landing-page');
// Route::get('/',function(){
//     return view('language');
// })->middleware(['auth','verified'])->name('language');

// Route::get('/',[HomeController::class, 'redirect'])->middleware(['auth','verified'])->name('home');
// Route::get('/language',[LanguageController::class, 'index'])->middleware(['auth'])->name('language');
// Route::get('/male-pain',[PainController::class,'index'])->middleware(['auth'])->name('male-pain');
// Route::get('/female-pain',[PainController::class,'index'])->middleware(['auth'])->name('female-pain');
// Route::get('/get-pain-types',[PainController::class,'painTypes'])->middleware(['auth'])->name('get-pain-types');
// Route::get('/pain-type-translate',[PainController::class,'painTypeTranslate'])->middleware(['auth'])->name('pain-type-translate');
// Route::get('/selected-language',[LanguageController::class, 'storeLanguage'])->middleware(['auth'])->name('selected-language');
// Route::get('/severity',[PainController::class, 'severity'])->middleware(['auth'])->name('severity');
// Route::post('/user-record',[PainController::class, 'userRecord'])->middleware(['auth'])->name('user-record');
// Route::view('/testimonial','users.testimonial')->name('testimonial');
// Route::view('/about','users.about-us')->name('about');
// Route::view('/contact-us','users.contact-us')->name('contact-us');
// Route::get('generate-pdf', [PainController::class, 'generatePDF'])->middleware(['auth']);

Auth::routes(['verify'=>true]);


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/', 'HomeController@index')->name('home');
    // Route::get('/', function(){
    //     dd("asd");
    // })->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');
    Route::resource('newspaper', 'NewsPaperController');
    Route::delete('newspaper/destroy', 'NewsPaperController@massDestroy')->name('newspaper.massDestroy');

    Route::resource('newspaper-details', 'NewsPaperDetailController');
    Route::delete('newspaper-details/destroy', 'NewsPaperDetailController@massDestroy')->name('newspaper-details.massDestroy');
    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Pain
    Route::delete('pains/destroy', 'PainController@massDestroy')->name('pains.massDestroy');
    Route::resource('pains', 'PainController');

    //Selected pain destroy
    Route::post('pains/painsdestroy','PainController@painsDestroy')->name('pains.painsDestroy');
    //Selected paintypes destroy
    Route::post('pains/paintypesdestroy','PainTypeController@paintypesDestroy')->name('pains.paintypesDestroy');
    // Pain Type
    Route::delete('pain-types/destroy', 'PainTypeController@massDestroy')->name('pain-types.massDestroy');
    Route::resource('pain-types', 'PainTypeController');

    Route::resource('categories', 'CategoryController');
    Route::resource('sub-categories', 'SubCategoryController');
    Route::resource('products', 'ProductController');
    Route::resource('riders', 'RidersController');


});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {


    // Route::get('/dashboard', 'HomeController@index')->name('home');

    // // Permissions
    // Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    // Route::resource('permissions', 'PermissionsController');

    // // Roles
    // Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    // Route::resource('roles', 'RolesController');

    // // Users
    // Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    // Route::resource('users', 'UsersController');

    // // Pain
    // Route::delete('pains/destroy', 'PainController@massDestroy')->name('pains.massDestroy');
    // Route::resource('pains', 'PainController');

    // // Pain Type
    // Route::delete('pain-types/destroy', 'PainTypeController@massDestroy')->name('pain-types.massDestroy');
    // Route::resource('pain-types', 'PainTypeController');

    // Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    // Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    // Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    // Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');

});
// Route::get('/submit',[UsersPainController::class, 'selectedPain'])->name('selected-pain')->middleware('auth');
// Route::get('/painlist',[HomeController::class, 'list'])->name('pain-listing')->middleware('auth');
// Route::get('/paintypelist',[HomeController::class, 'paintypeList'])->name('pain-type-listing')->middleware('auth');
// Route::post('/submit',[HomeController::class, 'submit'])->name('submit')->middleware('auth');
// Route::get('/selectpain',[HomeController::class, 'selectPain'])->name('selectpain')->middleware('auth');


Route::group(['namespace' => 'Auth', 'middleware' => ['auth']], function () {
    /**
    * Verification Routes
    */
    Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');

});
Route::get('/testfile',[App\Http\Controllers\HomeController::class, 'test'])->name('testfile');


