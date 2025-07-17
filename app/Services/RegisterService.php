<?php 

namespace App\Services;

use App\Http\Controllers\Auth\RegisterController;
use App\Repositories\RegisterRepository;

class RegisterService{
  protected $registerRepository;

  public function __construct(RegisterRepository $registerRepository){
    $this->registerRepository = $registerRepository;
  }

  public function registerUser(array $validated)
  {
      return $this->registerRepository->create($validated);
  }

  
}