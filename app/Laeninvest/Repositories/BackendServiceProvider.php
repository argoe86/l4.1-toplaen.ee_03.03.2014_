<?php namespace Laeninvest\Repositories;
use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider{

	public function register()
	{
		$this->app->bind(
			'Laeninvest\Repositories\ReminderRepositoryInterface',
			'Laeninvest\Repositories\ReminderRepository'
			 );

	}
}