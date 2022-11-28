<?php

use App\Http\Controllers\Backend\aboutController;
use App\Http\Controllers\Backend\activityController;
use App\Http\Controllers\Backend\beneficiaryLocationsController;
use App\Http\Controllers\Backend\blogController;
use App\Http\Controllers\Backend\clientMessagesController;
use App\Http\Controllers\Backend\contactController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\developmentComponentController;
use App\Http\Controllers\Backend\eventController;
use App\Http\Controllers\Backend\faqController;
use App\Http\Controllers\Backend\foodDemandController;
use App\Http\Controllers\Backend\foodsController;
use App\Http\Controllers\Backend\foodValueController;
use App\Http\Controllers\Backend\imageGalleryController;
use App\Http\Controllers\Backend\knowledgeController;
use App\Http\Controllers\Backend\linksController;
use App\Http\Controllers\Backend\logoController;
use App\Http\Controllers\Backend\newsController;
use App\Http\Controllers\Backend\noticeController;
use App\Http\Controllers\Backend\partnerController;
use App\Http\Controllers\Backend\privacyController;
use App\Http\Controllers\Backend\productCategoryController;
use App\Http\Controllers\Backend\productController;
use App\Http\Controllers\Backend\productImageController;
use App\Http\Controllers\Backend\productSliderController;
use App\Http\Controllers\Backend\publicationController;
use App\Http\Controllers\Backend\recipeController;
use App\Http\Controllers\Backend\sliderController;
use App\Http\Controllers\Backend\successStoriesController;
use App\Http\Controllers\Backend\termsController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\videoGalleryController;
use App\Http\Controllers\Backend\workingAreaController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\frontend\frontHomeController;
use App\Http\Controllers\frontend\pageController;
use App\Http\Controllers\lanController;
use App\Http\Controllers\productPageController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

//frontend
Route::get('home', [frontHomeController::class, 'index']);
Route::get('faq', [pageController::class, 'faq']);
Route::get('gallery/photos', [pageController::class, 'photos']);
Route::get('gallery/videos', [pageController::class, 'videos']);
Route::get('overview', [pageController::class, 'overview']);
Route::get('goal', [pageController::class, 'goal']);
Route::get('mission', [pageController::class, 'mission']);
Route::get('workingarea', [pageController::class, 'workingarea']);
Route::get('entrepreneurs', [pageController::class, 'entrepreneurs']);
Route::get('success', [pageController::class, 'success']);
Route::get('calender', [pageController::class, 'calender']);
Route::get('events', [pageController::class, 'events']);
Route::get('event/{id}', [pageController::class, 'event']);
Route::get('newses', [pageController::class, 'news']);
Route::get('news/{id}', [pageController::class, 'newsMore']);
Route::get('blogs', [pageController::class, 'blogs']);
Route::get('blog/{id}', [pageController::class, 'blog']);
Route::get('notice/{id}', [pageController::class, 'notice']);
Route::get('notices', [pageController::class, 'notices']);
Route::get('capacity', [pageController::class, 'activities']);
Route::get('capacity/{id}', [pageController::class, 'activity']);
Route::get('stories', [pageController::class, 'stories']);
Route::get('story/{id}', [pageController::class, 'story']);
Route::post('message', [clientController::class, 'message']);
Route::get('download/{file}/{path}', [clientController::class, 'download']);
Route::get('privacy', [pageController::class, 'privacy']);
Route::get('terms', [pageController::class, 'terms']);
Route::get('language', [lanController::class,'language']);
//Route::get('products', [pageController::class,'products']);
//Route::get('product/{id}', [pageController::class,'product']);
Route::get('knowledge', [pageController::class,'knowledgeAll']);
Route::get('knowledge/{category}', [pageController::class,'knowledgeCat']);
Route::get('knowledge/show/{id}', [pageController::class,'knowledgeShow']);
Route::get('knowledge/download/{id}', [pageController::class,'knowledgeDownload']);
Route::get('/', [productPageController::class,'index']);
Route::get('products', [productPageController::class,'products']);
Route::get('product-item', [productPageController::class,'productItem']);
Route::get('product-about', [productPageController::class,'productAbout']);
Route::get('product-contact', [productPageController::class,'productContact']);





//Backend
Route::get('/login', function () {
    return view('auth/login');
});

Auth::routes();

// Route::get('/about', [App\Http\Controllers\HomeController::class, 'index'])->name('about');


// Backend Controllers

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('users', UsersController::class);
    Route::resource('about', aboutController::class);
    Route::resource('workingArea', workingAreaController::class);
    Route::resource('component', developmentComponentController::class);
    Route::resource('slider', sliderController::class);
    Route::resource('imageGallery', imageGalleryController::class);
    Route::resource('videoGallery', videoGalleryController::class);
    Route::resource('product', productController::class);
    Route::resource('blog', blogController::class);
    Route::resource('publication', publicationController::class);
    Route::resource('news', newsController::class);
    Route::resource('event', eventController::class);
    Route::resource('beneficiaryLocations', beneficiaryLocationsController::class);
    Route::resource('activity', activityController::class);
    Route::resource('knowledge', knowledgeController::class);
    Route::resource('notice', noticeController::class);
    Route::resource('foodValue', foodValueController::class);
    Route::resource('foodDemand', foodDemandController::class);
    Route::resource('recipe', recipeController::class);
    Route::resource('foods', foodsController::class);
    Route::resource('successStories', successStoriesController::class);
    Route::resource('contact', contactController::class);
    Route::resource('links', linksController::class);
    Route::resource('partner', partnerController::class);
    Route::resource('faq', faqController::class);
    Route::resource('logo', logoController::class);
    Route::resource('terms', termsController::class);
    Route::resource('privacy', privacyController::class);
    Route::resource('products', productController::class);
    Route::post('productImageGet', [productImageController::class,'getProductImage']);
    Route::post('deleteProductImage', [productImageController::class,'deleteImage']);
    Route::post('productImageAdd', [productImageController::class,'productImageAdd'])->name('productImageAdd');
    Route::resource('products_category', productCategoryController::class);
    Route::resource('products_slider', productSliderController::class);
    Route::resource('clientMessages', clientMessagesController::class);
});

//storage clear
Route::get('clear-all-developer', function () {
    Artisan::call('storage:link');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    return redirect()->back();
});

