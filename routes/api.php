<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Abilities
    Route::apiResource('abilities', 'AbilitiesController', ['only' => ['index']]);

    // Locales
    Route::get('locales/languages', 'LocalesController@languages')->name('locales.languages');
    Route::get('locales/messages', 'LocalesController@messages')->name('locales.messages');

    // Dashboard
    Route::get('dashboard', 'DashboardApiController@index')->name('dashboard');

    // Permissions
    Route::resource('permissions', 'PermissionsApiController');

    // Roles
    Route::resource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::resource('users', 'UsersApiController');

    // Courses
    Route::post('courses/media', 'CoursesApiController@storeMedia')->name('courses.storeMedia');
    Route::resource('courses', 'CoursesApiController');

    // Lessons
    Route::post('lessons/media', 'LessonsApiController@storeMedia')->name('lessons.storeMedia');
    Route::resource('lessons', 'LessonsApiController');

    // Tests
    Route::resource('tests', 'TestsApiController');

    // Questions
    Route::post('questions/media', 'QuestionsApiController@storeMedia')->name('questions.storeMedia');
    Route::resource('questions', 'QuestionsApiController');

    // Question Options
    Route::resource('question-options', 'QuestionOptionsApiController');

    // Test Results
    Route::resource('test-results', 'TestResultsApiController');

    // Test Answers
    Route::resource('test-answers', 'TestAnswersApiController');

    // Reviews
    Route::resource('reviews', 'ReviewsApiController');

    // Banner
    Route::post('banners/media', 'BannerApiController@storeMedia')->name('banners.storeMedia');
    Route::resource('banners', 'BannerApiController');

    // Product Category
    Route::post('product-categories/media', 'ProductCategoryApiController@storeMedia')->name('product-categories.storeMedia');
    Route::resource('product-categories', 'ProductCategoryApiController');

    // Product Tag
    Route::resource('product-tags', 'ProductTagApiController');

    // Product
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::resource('products', 'ProductApiController');

    // Faq Category
    Route::resource('faq-categories', 'FaqCategoryApiController');

    // Faq Question
    Route::resource('faq-questions', 'FaqQuestionApiController');

    // Notification
    Route::resource('notifications', 'NotificationApiController');

    // Chapter
    Route::resource('chapters', 'ChapterApiController');

    // Topic
    Route::resource('topics', 'TopicApiController');

    // Kelas
    Route::resource('kelas', 'KelasApiController');

    // Learn Progress
    Route::resource('learn-progresses', 'LearnProgressApiController');

    // List Payment
    Route::post('list-payments/media', 'ListPaymentApiController@storeMedia')->name('list-payments.storeMedia');
    Route::resource('list-payments', 'ListPaymentApiController');

    // Schedule
    Route::resource('schedules', 'ScheduleApiController');

    // Transaction
    Route::resource('transactions', 'TransactionApiController');
});
