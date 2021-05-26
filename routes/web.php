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
Route::group(['middleware' => 'locale'], function () {

    Route::get('change-language/{lang}', 'IndexController@getChangeLanguage')->name('home.change-language');

    Route::get('/', 'IndexController@getHomePage')->name('home.index');

    Route::get('/vi', 'IndexController@getHome')->name('home.index_vi');

    Route::get('/en', 'IndexController@getHome')->name('home.index_en');

    Route::get('/vi/tim-kiem', 'IndexController@getSearch')->name('home.search_vi');

    Route::get('/en/search', 'IndexController@getSearch')->name('home.search_en');

    Route::get('/vi/hoi-te-bao-goc', 'IndexController@getCells')->name('home.cells_vi');

    Route::get('/en/stem-cell-society', 'IndexController@getCells')->name('home.cells_en');

    Route::get('/vi/te-bao-goc', 'IndexController@getStemCells')->name('home.stem_cells_vi');

    Route::get('/en/stem-cells', 'IndexController@getStemCells')->name('home.stem_cells_en');

    Route::get('/vi/tri-lieu-te-bao-goc', 'IndexController@getStemCellsTherapy')->name('home.stem_cells_therapy_vi');

    Route::get('/en/stem-cells-therapy', 'IndexController@getStemCellsTherapy')->name('home.stem_cells_therapy_en');

    Route::get('/vi/nghien-cuu-dao-tao-te-bao-goc', 'IndexController@getResearchTrainingStemCells')->name('home.research_training_sc_vi');

    Route::get('/en/research-training-stem-cells', 'IndexController@getResearchTrainingStemCells')->name('home.research_training_sc_en');

    Route::get('/vi/cong-trinh-nghien-cuu-cua-hoi-vien', 'IndexController@getMemberResearchWork')->name('home.member_research_work_vi');

    Route::get('/en/member-research-work', 'IndexController@getMemberResearchWork')->name('home.member_research_work_en');

    Route::get('/vi/hoi-dap', 'IndexController@getQuestion')->name('home.question_vi');

    Route::get('/en/q-a', 'IndexController@getQuestion')->name('home.question_en');

    Route::get('/vi/hoi-dap/{slug}', 'IndexController@getSingleQuestion')->name('home.question-single_vi');

    Route::get('/en/q-a/{slug}', 'IndexController@getSingleQuestion')->name('home.question-single_en');

    Route::get('/vi/tai-nguyen', 'IndexController@getResources')->name('home.resources_vi');

    Route::get('/en/resources', 'IndexController@getResources')->name('home.resources_en');

    Route::get('/vi/tai-nguyen/{slug}', 'IndexController@getSingleResources')->name('home.resources-single_vi');

    Route::get('/en/resources/{slug}', 'IndexController@getSingleResources')->name('home.resources-single_en');

    Route::get('/vi/tin-tuc', 'IndexController@getListNews')->name('home.news_vi');

    Route::get('/en/news', 'IndexController@getListNews')->name('home.news_en');

    Route::get('/vi/tin-tuc/{slug}', 'IndexController@getSingleNews')->name('home.news-single_vi');

    Route::get('/en/news/{slug}', 'IndexController@getSingleNews')->name('home.news-single_en');

    Route::get('/vi/lien-he', 'IndexController@getContact')->name('home.contact_vi');

    Route::get('/en/contact', 'IndexController@getContact')->name('home.contact_en');

    Route::post('/lien-he', 'IndexController@postContact')->name('home.post-contact');

    // Thông báo
    Route::get('/vi/thong-bao/{slug}', 'IndexController@getSingleNotification')->name('home.notification-single_vi');

    Route::get('/en/notification/{slug}', 'IndexController@getSingleNotification')->name('home.notification-single_en');

    Route::get('/refresh-captcha', 'IndexController@refreshCaptcha')->name('home.refresh-captcha');

});

Route::group(['namespace' => 'Admin'], function () {

    Route::group(['prefix' => 'backend', 'middleware' => 'auth'], function () {
       	Route::get('/home', 'HomeController@index')->name('backend.home');

        Route::resource('users', 'UserController', ['except' => [
            'show'
        ]]);
        Route::resource('image', 'ImageController', ['except' => [
            'show'
        ]]);
        Route::post('image/postMultiDel', ['as' => 'image.postMultiDel', 'uses' => 'ImageController@deleteMuti']);
        // Bài viết
        Route::resource('posts', 'PostController', ['except' => ['show']]);
        Route::post('posts/postMultiDel', ['as' => 'posts.postMultiDel', 'uses' => 'PostController@deleteMuti']);
        Route::get('posts/get-slug', 'PostController@getAjaxSlug')->name('posts.get-slug');
        // Thông báo
        Route::resource('notification', 'NotificationController', ['except' => ['show']]);
        Route::post('notification/postMultiDel', ['as' => 'notification.postMultiDel', 'uses' => 'NotificationController@deleteMuti']);
        Route::get('notification/get-slug', 'NotificationController@getAjaxSlug')->name('NotificationController.get-slug');

        Route::resource('question', 'QuestionController', ['except' => ['show']]);
        Route::post('question/postMultiDel', ['as' => 'question.postMultiDel', 'uses' => 'QuestionController@deleteMuti']);

        Route::resource('resources', 'ResourcesController', ['except' => ['show']]);
        Route::post('resources/postMultiDel', ['as' => 'resources.postMultiDel', 'uses' => 'ResourcesController@deleteMuti']);
        Route::get('resources/get-slug', 'ResourcesController@getAjaxSlug')->name('resources.get-slug');
        
        Route::resource('construction', 'ConstructionController', ['except' => ['show']]);
        Route::post('construction/postMultiDel', ['as' => 'construction.postMultiDel', 'uses' => 'ConstructionController@deleteMuti']);

        // Liên hệ
        Route::group(['prefix' => 'contact'], function () {
            Route::get('/', ['as' => 'get.list.contact', 'uses' => 'ContactController@getListContact']);
            Route::post('/delete-muti', ['as' => 'contact.postMultiDel', 'uses' => 'ContactController@postDeleteMuti']);
            Route::get('{id}/edit', ['as' => 'contact.edit', 'uses' => 'ContactController@getEdit']);
            Route::post('{id}/edit', ['as' => 'contact.post', 'uses' => 'ContactController@postEdit']);
            Route::delete('{id}/delete', ['as' => 'contact.destroy', 'uses' => 'ContactController@getDelete']);
        });

       
        Route::group(['prefix' => 'pages'], function() {
            Route::get('/', ['as' => 'pages.list', 'uses' => 'PagesController@getListPages']);
            Route::get('build', ['as' => 'pages.build', 'uses' => 'PagesController@getBuildPages']);
            Route::post('build', ['as' => 'pages.build.post', 'uses' => 'PagesController@postBuildPages']);
            Route::post('/create', ['as' => 'pages.create', 'uses' => 'PagesController@postCreatePages']);
        });

        Route::group(['prefix' => 'options'], function() {
            Route::get('/general', 'SettingController@getGeneralConfig')->name('backend.options.general');
            Route::post('/general', 'SettingController@postGeneralConfig')->name('backend.options.general.post');

            Route::get('/developer-config', 'SettingController@getDeveloperConfig')->name('backend.options.developer-config');
            Route::post('/developer-config', 'SettingController@postDeveloperConfig')->name('backend.options.developer-config.post');

            Route::get('/about', 'SettingController@getAboutConfig')->name('backend.options.about');
            Route::post('/about', 'SettingController@postAboutConfig')->name('backend.options.about.post');

            Route::get('/contact', 'SettingController@getContactConfig')->name('backend.options.contact');
            Route::post('/contact', 'SettingController@postContactConfig')->name('backend.options.contact.post');
        });

        Route::group(['prefix' => 'menu'], function () {
            Route::get('/', ['as' => 'setting.menu', 'uses' => 'MenuController@getListMenu']);
            Route::get('edit/{id}', ['as' => 'backend.config.menu.edit', 'uses' => 'MenuController@getEditMenu']);
            Route::post('add-item/{id}', ['as' => 'setting.menu.addItem', 'uses' => 'MenuController@postAddItem']);
            Route::post('update', ['as' => 'setting.menu.update', 'uses' => 'MenuController@postUpdateMenu']);
            Route::get('delete/{id}', ['as' => 'setting.menu.delete', 'uses' => 'MenuController@getDelete']);
            Route::get('edit-item/{id}', ['as' => 'setting.menu.geteditItem', 'uses' => 'MenuController@getEditItem']);
            Route::post('edit', ['as' => 'setting.menu.editItem', 'uses' => 'MenuController@postEditItem']);
        });

       Route::get('/get-layout', 'HomeController@getLayOut')->name('get.layout');


    });
});

Auth::routes(
    [
        'register' => false,
        'verify' => false,
        'reset' => false,
    ]
);
