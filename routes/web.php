<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//public routes for web usage
$router->group(['prefix' => 'api/v1'], function () use ($router) {

  // todo need to get candidates by location

  // states
  $router->get('states',  ['uses' => 'StateController@GetStates']);
  $router->get('states/{id}', ['uses' => 'StateController@GetState']);

  $router->get('states/{id}/cities',  ['uses' => 'StateController@GetCitiesInState']);
  $router->get('states/{state_id}/cities/{city_id}', ['uses' => 'StateController@GetCityInState']);

  $router->get('states/{id}/counties',  ['uses' => 'StateController@GetCountiesInState']);
  $router->get('states/{state_id}/counties/{city_id}', ['uses' => 'StateController@GetCountyInState']);
  
  $router->get('states/{id}/districts',  ['uses' => 'StateController@GetDistrictsInState']);
  $router->get('states/{state_id}/districts/{district_id}', ['uses' => 'StateController@GetDistrictInState']);
  

  // districts
  $router->get('districts',  ['uses' => 'DistrictController@GetDistricts']);
  $router->get('districts/{id}', ['uses' => 'DistrictController@GetDistrict']);
  

  // cities
  $router->get('cities',  ['uses' => 'CityController@GetCities']);
  $router->get('cities/{id}', ['uses' => 'CityController@GetCity']);


  // counties
  $router->get('counties',  ['uses' => 'CountyController@GetCounties']);
  $router->get('counties/{id}', ['uses' => 'CountyController@GetCounty']);


  // positions
  $router->get('positions',  ['uses' => 'PositionController@GetPositions']);
  $router->get('positions/{id}', ['uses' => 'PositionController@GetPosition']);


  // parties
  $router->get('parties',  ['uses' => 'PartyController@GetParties']);
  $router->get('parties/{id}', ['uses' => 'PartyController@GetParty']);

  
  // issues
  $router->get('issues',  ['uses' => 'IssueController@GetIssues']);
  $router->get('issues/{id}', ['uses' => 'IssueController@GetIssue']);


  // candidates
  $router->get('candidates',  ['uses' => 'CandidateController@GetCandidates']);
  $router->get('candidates/{id}', ['uses' => 'CandidateController@GetCandidate']);

  $router->get('candidates/{id}/issues', ['uses' => 'CandidateController@GetCandidateIssues']);
  $router->get('candidates/{candidate_id}/issues/{issue_id}', ['uses' => 'CandidateController@GetCandidateIssue']);

});


// authenticated routes for admin usage
$router->group(['prefix' => 'api/v1', 'middleware' => 'auth'], function () use ($router) {

  // todo: move delete and approve endpoints to admin specific middleware
  // todo: make moderator specifc middleware for rest of these calls


  // counties
  $router->post('counties', ['uses' => 'CountyController@create']);
  $router->delete('counties/{id}', ['uses' => 'CountyController@delete']);
  $router->put('counties/{id}', ['uses' => 'CountyController@update']);


  // cities
  $router->post('cities', ['uses' => 'CityController@create']);
  $router->delete('cities/{id}', ['uses' => 'CityController@delete']);
  $router->put('cities/{id}', ['uses' => 'CityController@update']);


  // districts
  $router->post('districts', ['uses' => 'DistrictController@create']);
  $router->delete('districts/{id}', ['uses' => 'DistrictController@delete']);
  $router->put('districts/{id}', ['uses' => 'DistrictController@update']);


  // positions
  $router->post('positions', ['uses' => 'PositionController@create']);
  $router->delete('positions/{id}', ['uses' => 'PositionController@delete']);
  $router->put('positions/{id}', ['uses' => 'PositionController@update']);


  // parties
  $router->post('parties', ['uses' => 'PartyController@create']);
  $router->delete('parties/{id}', ['uses' => 'PartyController@delete']);
  $router->put('parties/{id}', ['uses' => 'PartyController@update']);


  // issues
  $router->post('issues', ['uses' => 'IssueController@create']);
  $router->delete('issues/{id}', ['uses' => 'IssueController@delete']);
  $router->put('issues/{id}', ['uses' => 'IssueController@update']);
  $router->patch('issues/{id}/approve', ['uses' => 'IssueController@approve']);


  // candidates
  $router->post('candidates', ['uses' => 'CandidateController@createCandidate']);
  $router->delete('candidates/{id}', ['uses' => 'CandidateController@deleteCandidate']);
  $router->put('candidates/{id}', ['uses' => 'CandidateController@updateCandidate']);

  $router->post('candidates/{id}/issues', ['uses' => 'CandidateController@createIssue']);
  $router->delete('candidates/{candidate_id}/issues/{issue_id}', ['uses' => 'CandidateController@deleteIssue']);
  $router->put('candidates/{candidate_id}/issues/{issue_id}', ['uses' => 'CandidateController@updateIssue']);
  // todo: need a way to add multiple candidate issues in one call
  
});