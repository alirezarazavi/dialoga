<?php

namespace App\Http\ViewComposers;

use App\Repositories\MovieRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\View\View;

class SidebarComposer
{
    protected $movieRepository;
    protected $userRepository;

	/**
	 * Create a new profile composer.
	 *
	 * @param MovieRepositoryInterface $movieRepository
	 * @param UserRepositoryInterface $userRepository
	 */
    public function __construct(MovieRepositoryInterface $movieRepository, UserRepositoryInterface $userRepository)
    {
        $this->movieRepository = $movieRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (auth()->check()) {
            $view->with([
                'userPoints'    =>  $this->userRepository->getUserDialogPoints(auth()->user()->id),
            ]);
        }
        $view->with([
			'popularMovies' =>  $this->movieRepository->getPopularMovies(),
			'activeUsers' 	=>  $this->userRepository->getActiveUsers(),
		]);
    }
}