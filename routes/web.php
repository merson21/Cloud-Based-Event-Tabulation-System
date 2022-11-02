<?php

//use Illuminate\Routing\Route;

//Route::get('session/darkmode', 'HomeController@myStoredSession')->name('Home.myStoredSession');
Route::get('session/darkmode', 'admin\ComboboxController@myStoredSession')->name('Combobox.myStoredSession');

Route::get('/', 'HomePageController@index')->name('index');

//Route::redirect('/', '/login');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});


//User Verification
Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');


//E-Voting Dashboard
Route::get('e-voting/{slug}/login', 'ElectionController@login')->name('login');
Route::post('e-voting/{slug}/login', 'ElectionController@submit_login')->name('submit_login');

Route::group(['prefix' => 'e-voting', 'as' => 'e-voting.', 'middleware' => ['voter']], function () {
    Route::get('{slug}/', 'ElectionController@index')->name('index');
    Route::post('{slug}/', 'ElectionController@store')->name('store');
    Route::post('{slug}/logout', 'ElectionController@logout')->name('logout');
});


//Tabulation Dashboard
Route::get('tabulation/{slug}/login', 'TabulationController@login')->name('login');
Route::post('tabulation/{slug}/login', 'TabulationController@submit_login')->name('submit_login');

Route::group(['prefix' => 'tabulation', 'as' => 'tabulation.', 'middleware' => ['judge']], function () {
    Route::get('{slug}/', 'TabulationController@index')->name('index');
    Route::get('{slug}/{id}', 'TabulationController@category')->name('category');
    Route::post('{slug}/logout', 'TabulationController@logout')->name('logout');
    Route::get('{slug}/{id}/savescore', 'TabulationScoreController@savescore')->name('savescore');
    Route::get('{slug}/{id}/saveaverage', 'TabulationScoreController@saveaverage')->name('saveaverage');
    Route::get('{slug}/{id}/getscores', 'TabulationScoreController@getscores')->name('getscores');
    Route::get('{slug}/{id}/criterialock', 'TabulationScoreController@criterialock')->name('criterialock');
    Route::get('{slug}/{id}/categorylock', 'TabulationScoreController@categorylock')->name('categorylock');

});

//User Authentication
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // About
    Route::delete('abouts/destroy', 'AboutController@massDestroy')->name('abouts.massDestroy');
    Route::post('abouts/media', 'AboutController@storeMedia')->name('abouts.storeMedia');
    Route::post('abouts/ckmedia', 'AboutController@storeCKEditorImages')->name('abouts.storeCKEditorImages');
    Route::resource('abouts', 'AboutController');

    // Faq
    Route::delete('faqs/destroy', 'FaqController@massDestroy')->name('faqs.massDestroy');
    Route::resource('faqs', 'FaqController');

    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::resource('services', 'ServicesController');

    // Prices
    Route::delete('prices/destroy', 'PricesController@massDestroy')->name('prices.massDestroy');
    Route::resource('prices', 'PricesController');

    // Organization
    Route::delete('organizations/destroy', 'OrganizationController@massDestroy')->name('organizations.massDestroy');
    Route::resource('organizations', 'OrganizationController');

    // Position
    Route::delete('positions/destroy', 'PositionController@massDestroy')->name('positions.massDestroy');
    Route::resource('positions', 'PositionController');

    // Partylist
    Route::delete('partylists/destroy', 'PartylistController@massDestroy')->name('partylists.massDestroy');
    Route::post('partylists/media', 'PartylistController@storeMedia')->name('partylists.storeMedia');
    Route::post('partylists/ckmedia', 'PartylistController@storeCKEditorImages')->name('partylists.storeCKEditorImages');
    Route::resource('partylists', 'PartylistController');

    // Candidates
    Route::delete('candidates/destroy', 'CandidatesController@massDestroy')->name('candidates.massDestroy');
    Route::post('candidates/media', 'CandidatesController@storeMedia')->name('candidates.storeMedia');
    Route::post('candidates/ckmedia', 'CandidatesController@storeCKEditorImages')->name('candidates.storeCKEditorImages');
    Route::post('candidates/parse-csv-import', 'CandidatesController@parseCsvImport')->name('candidates.parseCsvImport');
    Route::post('candidates/process-csv-import', 'CandidatesController@processCsvImport')->name('candidates.processCsvImport');
    Route::resource('candidates', 'CandidatesController');

    // Voters
    Route::post('voters/generate', 'VotersController@generate')->name('voters.generate');
    Route::post('voters/sendid', 'VotersController@sendid')->name('voters.sendid');
    Route::delete('voters/destroy', 'VotersController@massDestroy')->name('voters.massDestroy');
    Route::post('voters/media', 'VotersController@storeMedia')->name('voters.storeMedia');
    Route::post('voters/ckmedia', 'VotersController@storeCKEditorImages')->name('voters.storeCKEditorImages');
    Route::post('voters/parse-csv-import', 'VotersController@parseCsvImport')->name('voters.parseCsvImport');
    Route::post('voters/process-csv-import', 'VotersController@processCsvImport')->name('voters.processCsvImport');
    Route::resource('voters', 'VotersController');

    // Title
    Route::delete('titles/destroy', 'TitleController@massDestroy')->name('titles.massDestroy');
    Route::resource('titles', 'TitleController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Criteria
    Route::delete('criteria/destroy', 'CriteriaController@massDestroy')->name('criteria.massDestroy');
    Route::resource('criteria', 'CriteriaController');

    // Judges
    Route::delete('judges/destroy', 'JudgesController@massDestroy')->name('judges.massDestroy');
    Route::post('judges/media', 'JudgesController@storeMedia')->name('judges.storeMedia');
    Route::post('judges/ckmedia', 'JudgesController@storeCKEditorImages')->name('judges.storeCKEditorImages');
    Route::resource('judges', 'JudgesController');

    // Participants
    Route::delete('participants/destroy', 'ParticipantsController@massDestroy')->name('participants.massDestroy');
    Route::post('participants/media', 'ParticipantsController@storeMedia')->name('participants.storeMedia');
    Route::post('participants/ckmedia', 'ParticipantsController@storeCKEditorImages')->name('participants.storeCKEditorImages');
    Route::resource('participants', 'ParticipantsController');

    // Monitor
    Route::get('monitors/loadData/{j_id}/{c_id}/{t_id}/', 'MonitorController@loadData')->name('monitors.loadData');
    Route::get('monitors/getscores/', 'MonitorController@getscores')->name('monitors.getscores');
    Route::get('monitors/loadAverage/{c_id}/{t_id}/', 'MonitorController@loadAverage')->name('monitors.loadAverage');
    Route::get('monitors/getaverage/', 'MonitorController@getaverage')->name('monitors.getaverage');

    Route::delete('monitors/destroy', 'MonitorController@massDestroy')->name('monitors.massDestroy');
    Route::resource('monitors', 'MonitorController');

    // Results
    Route::delete('results/destroy', 'ResultsController@massDestroy')->name('results.massDestroy');
    Route::resource('results', 'ResultsController');

    // Generate Results
    Route::get('generate-results/selectedCategory', 'GenerateResultsController@selectedCategory')->name('generate-results.selectedCategory');
    Route::get('generate-results/generateParticipant', 'GenerateResultsController@generateParticipant')->name('generate-results.generateParticipant');
    Route::get('generate-results/generateParticipantCriteria', 'GenerateResultsController@generateParticipantCriteria')->name('generate-results.generateParticipantCriteria');
    Route::get('generate-results/generateMoveElim', 'GenerateResultsController@generateMoveElim')->name('generate-results.generateMoveElim');

    Route::resource('generate-results', 'GenerateResultsController');

    // Homepage
    Route::delete('homepages/destroy', 'HomepageController@massDestroy')->name('homepages.massDestroy');
    Route::resource('homepages', 'HomepageController');

     // Audit Voters
     Route::delete('audit-voters/destroy', 'AuditVotersController@massDestroy')->name('audit-voters.massDestroy');
     Route::resource('audit-voters', 'AuditVotersController', ['except' => ['create', 'store', 'edit', 'update', 'show']]);


    // Audit Scores
    Route::delete('audit-scores/destroy', 'AuditScoresController@massDestroy')->name('audit-scores.massDestroy');
    Route::resource('audit-scores', 'AuditScoresController', ['except' => ['create', 'store', 'edit', 'update', 'show']]);

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
    Route::get('team-members', 'TeamMembersController@index')->name('team-members.index');
    Route::post('team-members', 'TeamMembersController@invite')->name('team-members.invite');

   // E-Voting Candidate load combobox
    Route::get('combobox/position', 'ComboboxController@position')->name('combobox.position');
    Route::get('combobox/partylist', 'ComboboxController@partylist')->name('combobox.partylist');

    // Tabulation Criteria load combobox
    Route::get('combobox/category', 'ComboboxController@category')->name('combobox.category');
    Route::get('combobox/criteria', 'ComboboxController@criteria')->name('combobox.criteria');
    Route::get('combobox/participant', 'ComboboxController@participant')->name('combobox.participant');

    Route::get('combobox/loadtab', 'ComboboxController@loadtab')->name('combobox.loadtab');
    // Route::get('combobox/position', [\App\Http\Controllers\ComboboxController::class, 'position'])
    // ->name('combobox.position');

});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
