<?php

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

Route::get('/test', function(){
    dd(phpinfo());
});

Route::get('/', 'IndexController@home')->name('index');
// Route::get('/about-us/our-history', 'MainController@ourHistory')->name('history');
// Route::get('/about-us/founders', 'MainController@ourFounders')->name('founders');
// Route::get('/about-us/our-core-values', 'AboutController@viewCoreValues')->name('coreValues');
// Route::get('/about-us/statement-of-purpose', 'MainController@statementPurpose')->name('statementPurpose');
// Route::get('/about-us/our-beliefs', 'AboutController@viewOurBeliefs')->name('ourBeliefs');
// Route::get('/about-us/faith-declaration', 'MainController@faithDeclaration')->name('faithDeclaration');
// Route::get('/about-us/regional-pastor', 'AboutController@viewRegionalPastor')->name('regionalPastor');
// Route::get('/about-us/resident-pastor','AboutController@viewResidentPastor')->name('residentPastor');
// Route::get('/message', 'MessageController@viewMessage')->name('sermon');
// Route::get('/member-login', 'MemberController@viewMemberLogin')->name('memberLogin');
// Route::get('/welcome-msg', 'MainController@welcomeMessage')->name('welcome');

Route::get('/contact', 'IndexController@contact')->name('contact');
Route::get('/about', 'IndexController@about')->name('about');
Route::post('/contact', 'IndexController@sendContact')->name('contact.send');
Route::get('districts/view', 'IndexController@showDistricts')->name('districts');
Route::get('assemblies/view', 'IndexController@showAssesmblies')->name('assemblies');
Route::get('/media-gallery', 'IndexController@media')->name('media.gallery');
Route::get('church-leadership', 'IndexController@leadership')->name('church-leadership');
Route::get('view-media/{id}', 'IndexController@viewMedia')->name('media.view');
Route::get('view-purchase/{id}', 'IndexController@purchaseMedia')->name('media.purchase');
Route::get('livestream/mixlr', 'IndexController@mixlrLink')->name('livestream.mixlr');
Route::get('livestream/youtube', 'IndexController@youtube')->name('livestream.youtube');
Route::get('donate', 'IndexController@donate')->name('donate');
Route::post('donate/cart', 'IndexController@donateCart')->name('donate.cart');

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback')->name('handle');

// Admin Dashboard routes
Route::middleware(['auth'])->group (function() {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('transactions', 'TransactionController');
    Route::get('update_profile', 'SettingController@profileIndex')->name('updateprofile');
    Route::patch('save_profile', 'SettingController@storeProfile')->name('saveprofile');
    Route::get('download-paid/{id}', 'IndexController@paidMedia')->name('media.paid');

});
Route::middleware(['auth', 'admin'])->group (function() {
    Route::resource('districts', 'DistrictController');
    Route::resource('assemblys', 'AssemblyController');
    Route::resource('leadership', 'LeadershipController');
    Route::resource('media', 'MediaController');
    Route::resource('users', 'UserController');
    Route::resource('slider', 'SliderController');
    Route::get('setting', 'SettingController@edit')->name('setting.edit');
    Route::post('add-core-value', 'SettingController@addVal')->name('add-core-value');
    
    Route::patch('updateseeting', 'SettingController@update')->name('updateseeting');
    Route::get('single/{id}', 'IndexController@singleDistrict')->name('district.single');
    Route::get('download-paid2/{id}', 'MediaController@paidMedia2')->name('media.paid2');

    Route::post('ckeditor-image-upload', function(Request $request){
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('images'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image successfully uploaded'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    })->name('image-upload');

    
});


Auth::routes();
