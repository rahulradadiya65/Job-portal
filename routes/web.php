
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your applic.ation. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\job;
use Elasticsearch\ClientBuilder;

Route::post('/rahul3',['as' => 'rahul3', 'uses' => 'JobsearchController@Kinjal']);








Route::get('rahul1', function()
{
   return view ('apply_candidate_list');
});

Route::get('/','HomeController@index');
Auth::routes(['verify' => true]);


Route::post('/email',['as' => 'email', 'uses' => 'RegisterController@email']);
Auth::routes();


//Route::get('/test', 'ApplymailController@home');


Route::get('/job_list',['as' => '/job_list', 'uses' => 'job\JobsearchController@index']);
Route::post('/job_list/',['as' => '/job_list', 'uses' => 'job\JobsearchController@index']);




Route::post("job_list",function(\Illuminate\Http\Request $request){
    $search_location="{$request->search_location}";
    $category="{$request->category}";
    $text_search="{$request->text_search}";
   $url="/job_list/{$request->search_location}/{$request->category}/{$request->text_search}";
return redirect()->action('job\JobsearchController@index', ['l' => $search_location, 'c' => $category,'t' =>$text_search]); 
});

Route::get('/user_job_post_list',['as' => 'user_job_post_list', 'uses' => 'job\JobController@user_job_post_list']);
Route::get('/job_applied',['as' => 'job_applied', 'uses' => 'ApplyjobController@appliedjob']);
Route::get('/job_edit/{jobs_id}',['as' => 'job_edit', 'uses' => 'job\JobController@job_edit']);
Route::post('/jobupdate/{jobs_id}',['as' => 'jobupdate', 'uses' => 'job\JobController@jobupdate']);
Route::post('/job_create',['as'=>'job_create', 'uses'=>'job\JobController@job_create']);
Route::get('/job_post', 'job\JobController@job_post');
Route::get('/rahul', 'job\JobController@index');
Route::get('/job_show/{jobs_id}',['as'=>'job_show','uses' => 'job\JobController@job_show']);
Route::get('/bookmark', ['as' => 'bookmark', 'uses' => 'job\JobController@bookmark']);

Route::get('autocomplete', 'job\JobController@autocomplete')->name('autocomplete');

Route::get('/candidate_apply/{jobs_id}', ['as' => 'candidate_apply', 'uses' => 'CandidateController@candidate_apply_detail']);

//skill
Route::get('/skill', ['as' => 'skill', 'uses' => 'SkillController@Skill']);


//Route::resource('/resumes', 'ResumeController');
Route::get('/profile',['as' => 'profile', 'uses' => 'Resume\ResumeController@index']);
Route::get('/viewresume',['as' => 'viewresume', 'uses' => 'Resume\ResumeController@viewresume'])->middleware('verified');

Route::get('/password_update',['as' => 'password_update', 'uses'=> 'Resume\ResumeController@password_update']);
Route::get('/updateprofile',['as' => 'updateprofile', 'uses'=> 'Resume\ResumeController@updateprofile']);
Route::get('/Profile_detail_update',['as' => 'Profile_detail_update', 'uses'=> 'Resume\ResumeController@Profile_detail_update']);
Route::get('/deleteaccount',['as' => 'deleteaccount', 'uses'=> 'Resume\ResumeController@deleteaccount']);
//Route::post('/createexperience', 'Resume\ExperienceController@createexperience');
//Route::post('/experienceedit/{expreriences_id}', ['as'=> 'experienceedit', 'uses'=>'Resume\ExperienceController@experienceedit']);
//
//Route::post('/createeducation', 'Resume\ExprinceController@createeducation');

Route::get('/experience',['as' => 'experience', 'uses' => 'Resume\ExperienceController@index']);
Route::get('/experience_show',['as' => 'experience_show', 'uses' => 'Resume\ExperienceController@experience_show']);
Route::post('/experience_create',['as' => 'experience_create', 'uses' => 'Resume\ExperienceController@experience_create']);
Route::get('/experience_edit',['as' => 'experience_edit', 'uses' => 'Resume\ExperienceController@experience_edit']);
Route::get('/experience_delete',['as' => 'experience_delete', 'uses' => 'Resume\ExperienceController@experience_delete']);


Route::get('/education',['as' => 'education', 'uses' => 'Resume\EducationController@index']);
Route::get('/education_show',['as' => 'education_show', 'uses' => 'Resume\EducationController@education_show']);
Route::post('/education_create',['as' => 'education_create', 'uses' => 'Resume\EducationController@education_create']);
Route::get('/education_edit',['as' => 'education_edit', 'uses' => 'Resume\EducationController@education_edit']);
Route::get('/education_delete',['as' => 'education_delete', 'uses' => 'Resume\EducationController@education_delete']);

Route::get('/declaration',['as' => 'declaration', 'uses' => 'Resume\DeclarationController@index']);
Route::get('/declaration_show',['as' => 'declaration_show', 'uses' => 'Resume\DeclarationController@declaration_show']);
Route::post('/declaration_create',['as' => 'declaration_create', 'uses' => 'Resume\DeclarationController@declaration_create']);
Route::get('/declaration_edit',['as' => 'declaration_edit', 'uses' => 'Resume\DeclarationController@declaration_edit']);

Route::get('/career_objective', ['as' => 'career_objective', 'uses' => 'Resume\CareerObjectiveController@index']);
Route::get('/career_objective_show', ['as' => 'career_objective_show', 'uses' => 'Resume\CareerObjectiveController@career_objective_show']);
Route::post('/career_objective_create', ['as' => 'career_objective_create', 'uses' => 'Resume\CareerObjectiveController@career_objective_create']);
Route::get('/career_objective_edit', ['as' => 'career_objective_edit', 'uses' => 'Resume\CareerObjectiveController@career_objective_edit']);

Route::get('/language',['as' => 'language', 'uses' => 'Resume\LanguageController@index']);
Route::get('/language_show',['as' => 'language_show', 'uses' => 'Resume\LanguageController@language_show']);
Route::post('/language_create',['as' => 'language_create', 'uses' => 'Resume\LanguageController@language_create']);
Route::get('/language_delete',['as' => 'language_delete', 'uses' => 'Resume\LanguageController@language_delete']);

//Route::post('/apply/{jobs_id}',['as' => 'apply', 'uses' => 'ApplyjobController@apply'])->middleware('verified');
Route::get('/apply/{jobs_id}',['as' => 'apply', 'uses' => 'ApplyjobController@apply']);

Route::get('/appliedjob',['as' => 'appliedjob', 'uses' => 'ApplyjobController@appliedjob']);

//Route::get('findCityWithStateID/{id}','JobController@findCityWithStateID');
Route::post('findCityWithStateID','StateController@findCityWithStateID');
Route::get ('/location','stateController@location');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/company',['as' => 'company', 'uses' => 'Company\CompanyController@index']);
Route::get('/company_show',['as' => 'company_show', 'uses' => 'Company\CompanyController@company_show']);
Route::post('/company_create',['as' => 'company_create', 'uses' => 'Company\CompanyController@company_create']);
Route::get('/company_edit',['as' => 'company_edit', 'uses' => 'Company\CompanyController@company_edit']);
Route::get('/company_delete',['as' => 'company_delete', 'uses' => 'Company\CompanyController@company_delete']);


Route::get('/contact_us',['as' => 'contact_us', 'uses' => 'ContactUsController@index']);
Route::post('/contact_us_mail',['as' => 'contact_us_mail', 'uses' => 'ContactUsController@contact_us_mail']);

