<?php
namespace App\Repositories;




use App\Models\EmailSubscribe;

Class EmailSubscribeRepository extends BaseRepository {

    public function __construct(EmailSubscribe $email){

        $this->model = $email;

    }

}
