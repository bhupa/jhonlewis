<?php
namespace App\Repositories;



use App\Models\Notification;

Class NotificationRepository extends BaseRepository {

    public function __construct(Notification $notificaiton){

        $this->model = $notificaiton;

    }

}
