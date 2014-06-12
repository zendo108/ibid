<?php
 use Illuminate\Database\Schema\Blueprint;
 use Illuminate\Database\Migrations\Migration;
//
// NOTE Migration Created: 2014-06-12 02:17:34
// --------------------------------------------------
 
class CreateIbidDatabase extends Migration{
//
// NOTE - Make changes to the database.
// --------------------------------------------------
 
public function up()
{

//
// NOTE -- bids
// --------------------------------------------------
 
Schema::create('bids', function(Blueprint $table) {
 $table->increments('id');
 $table->string('amount');
 $table->timestamp('start_date')->nullable();
 $table->timestamp('end_date')->nullable();
 $table->string('notes')->nullable();
// $table->timestamp('created_at')->nullable();
// $table->timestamp(' updated_at')->nullable();
 $table->string('remember_token', 100)->nullable();
 $table->timestamps();
 $table->unsignedInteger('jobs_id');
 $table->unsignedInteger('users_id');
 });


//
// NOTE -- bids_has_jobs
// --------------------------------------------------
 
Schema::create('bids_has_jobs', function(Blueprint $table) {
 $table->unsignedInteger('bids_id');
 $table->unsignedInteger('jobs_id');
 $table->string('notes')->nullable();
// $table->timestamp('created_at')->nullable();
// $table->timestamp('updated_at')->nullable();
 $table->string('remember_token', 100)->nullable();
 $table->timestamps();
 });


//
// NOTE -- jobs
// --------------------------------------------------
 
Schema::create('jobs', function(Blueprint $table) {
 $table->increments('id');
 $table->string('amount');
 $table->timestamp('start_date')->nullable();
 $table->timestamp('end_date')->nullable();
 $table->string('description')->nullable();
 $table->string('notes')->nullable();
// $table->timestamp('created_at')->nullable();
// $table->timestamp(' updated_at')->nullable();
 $table->string('remember_token', 100)->nullable();
 $table->timestamps();
 $table->unsignedInteger('users_id');
 });


//
// NOTE -- ratings
// --------------------------------------------------
 
Schema::create('ratings', function(Blueprint $table) {
 $table->increments('id');
 $table->unsignedInteger('stars');
 $table->string('comment');
 $table->string('notes')->nullable();
// $table->timestamp('created_at')->nullable();
// $table->timestamp(' updated_at')->nullable();
 $table->string('remember_token', 100)->nullable();
 $table->timestamps();
 $table->unsignedInteger('bids_has_jobs_bids_id');
 $table->unsignedInteger('bids_has_jobs_jobs_id');
 });


//
// NOTE -- users
// --------------------------------------------------
 
Schema::create('users', function(Blueprint $table) {
 $table->increments('id');
 $table->string('first', 45)->nullable();
 $table->string('last', 45)->nullable();
 $table->string('rut', 45)->nullable();
 $table->string('email', 45)->nullable();
 $table->string('phone', 45)->nullable();
 $table->string('notes')->nullable();
 $table->string('username', 50);
 $table->string('password', 60);
 $table->string('remember_token', 100)->nullable();
 $table->unsignedInteger('usertypes_id');
// $table->timestamp('created_at')->nullable();
// $table->timestamp('updated_at')->nullable();
 $table->timestamps();
 });


//
// NOTE -- usertypes
// --------------------------------------------------
 
Schema::create('usertypes', function(Blueprint $table) {
 $table->increments('id');
 $table->string('type', 128);
 $table->string('notes')->nullable();
// $table->timestamp('created_at')->nullable();
// $table->timestamp('updated_at')->nullable();
 $table->string('remember_token', 100)->nullable();
 $table->timestamps();
 });


//
// NOTE -- bids_foreign
// --------------------------------------------------
 
Schema::table('bids', function(Blueprint $table) {
 $table->foreign('jobs_id')->references('id')->on('jobs');
 $table->foreign('users_id')->references('id')->on('users');
 });


//
// NOTE -- bids_has_jobs_foreign
// --------------------------------------------------
 
Schema::table('bids_has_jobs', function(Blueprint $table) {
 $table->foreign('bids_id')->references('id')->on('bids');
 $table->foreign('jobs_id')->references('id')->on('jobs');
 });


//
// NOTE -- jobs_foreign
// --------------------------------------------------
 
Schema::table('jobs', function(Blueprint $table) {
 $table->foreign('users_id')->references('id')->on('users');
 });


//
// NOTE -- ratings_foreign
// --------------------------------------------------
 
Schema::table('ratings', function(Blueprint $table) {
 $table->foreign('bids_has_jobs_bids_id')->references('bids_id')->on('bids_has_jobs');
 $table->foreign('bids_has_jobs_jobs_id')->references('jobs_id')->on('bids_has_jobs');
 });


//
// NOTE -- users_foreign
// --------------------------------------------------
 
Schema::table('users', function(Blueprint $table) {
 $table->foreign('usertypes_id')->references('id')->on('usertypes');
 });



}
 
//
// NOTE - Revert the changes to the database.
// --------------------------------------------------
 
public function down()
{

Schema::drop('bids');
Schema::drop('bids_has_jobs');
Schema::drop('jobs');
Schema::drop('ratings');
Schema::drop('users');
Schema::drop('usertypes');

}
}