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

// Route::get('/', function () {
//     return view('welcome');
// });



Auth::routes();
// Route::get('top/login', 'Auth\LoginController.php@index')->name('login');

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'TopController@top')->name('top');


Route::prefix('mentee')->group(function () {
    Route::get('register', 'MenteeController@register')->name('mentee.register');
    Route::get('register-confirm', 'MenteeController@register_confirm')->name('mentee.register_confirm');
    Route::get('profile/edit', 'MenteeController@edit_profile')->name('mentee.profile_edit');
    Route::get('question', 'MenteeController@survey_question')->name('mentee.survey.question');
    Route::get('reason', 'MenteeController@survey_reason')->name('mentee.survey.reason');
    Route::get('cancel-reason', 'MenteeController@survey_cancel_reason')->name('mentee.survey.cancel');
    Route::get('inquiry', 'MenteeController@inquiry')->name('mentee.inquiry');
    Route::get('request-list', 'MenteeController@request_list')->name('mentee.request_list');
    Route::get('chat/{thread_id}', 'ChatController@mentee_chat')->name('mentee.chat')->middleware('auth');
});

Route::prefix('mentor')->group(function () {
    Route::get('register', 'MentorController@register')->name('mentor.register');
    Route::get('register-confirm', 'MentorController@register_confirm')->name('mentor.register');
    Route::get('profile/edit', 'MentorController@edit_profile')->name('mentor.profile_edit');
    Route::get('request-list', 'MentorController@request_list')->name('mentor.request_list');
    Route::get('chat/{thread_id}', 'ChatController@mentor_chat')->name('mentor.chat')->middleware('auth');
});

//Call
Route::get('/call', 'CallController@index')->name('call');

// search
Route::get('/search', 'SearchController@index')->name('search');
Route::post('/search', 'SearchController@result')->name('search_result');

// ticket
Route::get('/ticket', 'TicketController@index')->name('mentee.ticket');
Route::post('/ticket/purchase', 'TicketController@purchase')->name('ticket.purchase');
Route::post('/ticket/consume', 'TicketController@consume')->name('ticket.consume');

Route::get('/schedule', function () {
    return view('schedule.index');
});

//mail
Route::get('/mail/mentor-schedule-adjustment-remind-mail', 'Api\MailController@sendToMentorScheduleAdjustmentRemindMail');
Route::post('mail/mentor-schedule-adjustment-remind-mail', 'Api\MailController@sendToMentorScheduleAdjustmentRemindMail');
Route::get('mail/both-request-cancel', 'Api\MailController@sendToBothRequestCancelMail');
Route::post('mail/both-request-cancel', 'Api\MailController@sendToBothRequestCancelMail');
Route::get('mail/mentee-request-confirm', 'Api\MailController@sendToMenteeRequestConfirmMail');
Route::post('mail/mentee-request-confirm', 'Api\MailController@sendToMenteeRequestConfirmMail');
Route::get('mail/both-the-day-before-remind', 'Api\MailController@sendToBothTheDayBeforeRemindMail');
Route::post('mail/both-the-day-before-remind', 'Api\MailController@sendToBothTheDayBeforeRemindMail');

Route::get('/privacy-policy', 'AgreementController@privacy_policy')->name('agreement.privacy_policy');
Route::get('/terms-of-service', 'AgreementController@terms_of_service')->name('agreement.terms_of_service');
