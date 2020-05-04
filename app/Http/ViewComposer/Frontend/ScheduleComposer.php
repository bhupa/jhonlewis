<?php

namespace App\Http\ViewComposer\Frontend;

use App\Repositories\AppointmentScheduleRepository;

use Illuminate\View\View;
use Session;


class ScheduleComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepositorya
     */
    protected  $schedule;

    /**
     * Create a new profile Composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(
        AppointmentScheduleRepository $schedule
    )
    {
        $this->schedule = $schedule;

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $date =today()->format('Y-m-d');
        $schedules = $this->schedule->where('date','>=',$date)->orderBy('created_at','desc')->get();

        $schedul=[];
            foreach( $schedules as $item){
                $schedul[] = date('d/m/Y', strtotime($item->date));
            }

        $view->withSchedules($schedules);

    }
}
