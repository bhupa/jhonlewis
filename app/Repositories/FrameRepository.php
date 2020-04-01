<?php
namespace App\Repositories;


use App\Models\Frame;

Class FrameRepository extends BaseRepository {

    public function __construct(Frame $frame){

        $this->model = $frame;

    }

}
