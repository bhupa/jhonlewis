<?php
namespace App\Repositories;

use App\Models\Testimonial;

Class TestimonialRepository extends BaseRepository {

    public function __construct(Testimonial $testimonial){

        $this->model = $testimonial;

    }

}
