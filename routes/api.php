<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Team
    Route::apiResource('teams', 'TeamApiController');

    // About
    Route::post('abouts/media', 'AboutApiController@storeMedia')->name('abouts.storeMedia');
    Route::apiResource('abouts', 'AboutApiController');

    // Faq
    Route::apiResource('faqs', 'FaqApiController');

    // Services
    Route::apiResource('services', 'ServicesApiController');

    // Prices
    Route::apiResource('prices', 'PricesApiController');

    // Organization
    Route::apiResource('organizations', 'OrganizationApiController');

    // Position
    Route::apiResource('positions', 'PositionApiController');

    // Partylist
    Route::post('partylists/media', 'PartylistApiController@storeMedia')->name('partylists.storeMedia');
    Route::apiResource('partylists', 'PartylistApiController');

    // Candidates
    Route::post('candidates/media', 'CandidatesApiController@storeMedia')->name('candidates.storeMedia');
    Route::apiResource('candidates', 'CandidatesApiController');

    // Voters
    Route::post('voters/media', 'VotersApiController@storeMedia')->name('voters.storeMedia');
    Route::apiResource('voters', 'VotersApiController');

    // Title
    Route::apiResource('titles', 'TitleApiController');

    // Category
    Route::apiResource('categories', 'CategoryApiController');

    // Criteria
    Route::apiResource('criteria', 'CriteriaApiController');

    // Judges
    Route::post('judges/media', 'JudgesApiController@storeMedia')->name('judges.storeMedia');
    Route::apiResource('judges', 'JudgesApiController');

    // Participants
    Route::post('participants/media', 'ParticipantsApiController@storeMedia')->name('participants.storeMedia');
    Route::apiResource('participants', 'ParticipantsApiController');

    // Homepage
    Route::apiResource('homepages', 'HomepageApiController');
});
