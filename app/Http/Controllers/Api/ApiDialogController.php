<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DialogResource;
use App\Models\Dialog;
use App\Repositories\DialogRepositoryInterface;

class ApiDialogController extends Controller
{
	protected $dialogRepository;

	/**
	 * ApiDialogController constructor.
	 * @param $dialogRepository
	 */
	public function __construct(DialogRepositoryInterface $dialogRepository)
	{
		$this->dialogRepository = $dialogRepository;
	}

	/**
	 * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
	 */
	public function index() {
		return DialogResource::collection($this->dialogRepository->findAll());
	}

	/**
	 * @param Dialog $dialog
	 * @return DialogResource
	 */
	public function show(Dialog $dialog) {
		return new DialogResource($dialog);
	}




}