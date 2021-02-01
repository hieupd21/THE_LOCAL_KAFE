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

// HOMEPAGE
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('home.about');
Route::get('/404', 'HomeController@error')->name('home.error');
Route::get('/search', 'HomeController@search')->name('home.search');
Route::get('/filter', 'HomeController@filter')->name('home.filter');
Route::post('/comment', 'HomeController@comment')->name('home.comment');
// HOME ARTICLE
Route::group(['prefix' => 'article'], function () {
    Route::get('/', 'HomeController@article')->name('home.article');
    Route::get('/detail/{id}/{slug}', 'HomeController@article_detail')->name('home.artdetail');
    Route::get('/category/{id}/{name}', 'HomeController@article_category')->name('home.artcategory');
});
// HOME HISTORY
Route::group(['prefix' => 'history'], function () {
    Route::get('/', 'HomeController@history')->name('history.index');
    Route::get('/{id}', 'HomeController@history_show')->name('history.show');
});
// HOME CONTACT
Route::group(['prefix' => 'contact'], function () {
    Route::get('/', 'HomeController@contact')->name('contact.index');
    Route::post('/add', 'HomeController@contact_add')->name('contact.add');
});
// HOME ACCOUNT
Route::group(['prefix' => 'account'], function () {
    Route::get('/', 'HomeController@account')->name('account.index');
    Route::get('/{id}', 'HomeController@account_edit')->name('account.edit');
    Route::post('/{id}', 'HomeController@account_update')->name('account.update');
});
// HOME PRODUCT
Route::group(['prefix' => 'product'], function () {
    Route::get('/detail/{id}', 'HomeController@detail')->name('home.proddetail');
    Route::get('/category/{id}/{name}', 'HomeController@category')->name('home.prodcategory');
});
// HOME CART
Route::group(['prefix' => 'cart'], function () {
    Route::get('/', 'CartController@show')->name('cart.show');
    Route::post('/update', 'CartController@update')->name('cart.update');
    Route::get('/add/{id}', 'CartController@quick_add')->name('cart.quickadd');
    Route::post('/add/{id}', 'CartController@add')->name('cart.add');
    Route::get('/{rowId}', 'CartController@delete')->name('cart.delete');
});
// HOME CHECKOUT
Route::group(['prefix' => 'checkout', 'middleware' => 'CheckLogedIn'], function () {
    Route::get('/', 'LoginController@getLogin')->name('getLogin');
    Route::post('/', 'LoginController@postLogin')->name('postLogin');
});
Route::group(['prefix' => 'checkout', 'middleware' => 'CheckCheckedOut'], function () {
    Route::get('/', 'CheckoutController@index')->name('checkout.index');
    Route::get('/alert', 'CheckoutController@alert')->name('checkout.alert');
    Route::post('/', 'CheckoutController@add')->name('checkout.add');
});

// ADMIN
Route::group(['namespace' => 'Admin'], function () {
    // LOG IN
    Route::group(['prefix' => 'login', 'middleware' => 'CheckLogedIn'], function () {
        Route::get('/', 'LoginController@getLogin')->name('getLogin');
        Route::post('/', 'LoginController@postLogin')->name('postLogin');
        Route::get('/redirect/{provider}', 'LoginController@redirect')->name('redirect');
        Route::get('/callback/{provider}', 'LoginController@callback');

    });

    // LOG OUT
    Route::get('/logout', 'DashboardController@logout')->name('logout');

    // REGISTER
    Route::group(['prefix' => 'register'], function () {
        Route::get('/', 'RegisterController@getRegister')->name('getRegister');
        Route::post('/', 'RegisterController@postRegister')->name('postRegister');
    });

    Route::group(['prefix' => 'dashboard', 'middleware' => 'CheckLogedOut'], function () {
        // DASHBOARD
        Route::get('/', 'DashboardController@index')->name('dashboard');

        // CATEGORY
        Route::group(['prefix' => 'category', 'middleware' => 'CheckRoleUser'], function () {
            // PRODUCT
            Route::group(['prefix' => 'product'], function () {
                Route::get('/', 'ProductCateController@index')->name('productcate.index');
                Route::post('/', 'ProductCateController@create')->name('productcate.create');
                Route::get('/{id}', 'ProductCateController@edit')->name('productcate.edit');
                Route::post('/{id}', 'ProductCateController@update')->name('productcate.update');
                Route::delete('/{id}', 'ProductCateController@delete')->name('productcate.delete');
            });

            Route::group(['prefix' => 'article'], function () {
                Route::get('/', 'ArticleCateController@index')->name('articlecate.index');
                Route::post('/', 'ArticleCateController@create')->name('articlecate.create');
                Route::get('/{id}', 'ArticleCateController@edit')->name('articlecate.edit');
                Route::post('/{id}', 'ArticleCateController@update')->name('articlecate.update');
                Route::delete('/{id}', 'ArticleCateController@delete')->name('articlecate.delete');
            });
        });

        // USER
        Route::group(['prefix' => 'user', 'middleware' => 'CheckRoleUser'], function () {
            Route::get('/', 'UserController@index')->name('user.index');
            Route::get('/show/{id}', 'UserController@show')->name('user.show');
            Route::post('/{id}', 'UserController@update')->name('user.update');
            Route::delete('/{id}', 'UserController@delete')->name('user.delete');
            Route::get('/{id}', 'UserController@edit')->name('user.edit');
        });

        // PRODUCT
        Route::group(['prefix' => 'product'], function () {
            Route::get('/', 'ProductController@index')->name('product.index');
            Route::post('/', 'ProductController@store')->name('product.store');
            Route::get('/create', 'ProductController@create')->name('product.create');
            Route::get('/show/{id}', 'ProductController@show')->name('product.show');
            Route::post('/{id}', 'ProductController@update')->name('product.update');
            Route::delete('/{id}', 'ProductController@delete')->name('product.delete');
            Route::get('/{id}', 'ProductController@edit')->name('product.edit');
        });

        // ARTICLE
        Route::group(['prefix' => 'article'], function () {
            Route::get('/', 'ArticleController@index')->name('article.index');
            Route::post('/', 'ArticleController@store')->name('article.store');
            Route::get('/create', 'ArticleController@create')->name('article.create');
            Route::get('/show/{id}', 'ArticleController@show')->name('article.show');
            Route::post('/{id}', 'ArticleController@update')->name('article.update');
            Route::delete('/{id}', 'ArticleController@delete')->name('article.delete');
            Route::get('/{id}', 'ArticleController@edit')->name('article.edit');
        });

        // ORDER
        Route::group(['prefix' => 'order'], function () {
            Route::get('/', 'OrderController@index')->name('order.index');
            Route::get('/show/{id}', 'OrderController@show')->name('order.show');
            Route::post('/{id}', 'OrderController@update')->name('order.update');
            Route::get('/{id}', 'OrderController@edit')->name('order.edit');
        });

        // COMMENT
        Route::group(['prefix' => 'comment'], function () {
            Route::get('/', 'CommentController@index')->name('comment.index');
            Route::delete('/{id}', 'CommentController@delete')->name('comment.delete');
        });

        // CONTACT
        Route::group(['prefix' => 'contact'], function () {
            Route::get('/', 'ContactController@index')->name('admincontact.index');
            Route::delete('/{id}', 'ContactController@delete')->name('admincontact.delete');
        });
    });
});
