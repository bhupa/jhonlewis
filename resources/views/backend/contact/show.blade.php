<div class="modal fade" id="contact-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contact Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->

                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link">
                                    Name <span class="float-right badge bg-primary">{{$contact->firstname}} {{$contact->lastname}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link">
                                    Email <span class="float-right badge bg-success">{{$contact->email}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link">
                                    Subject <span class="float-right badge bg-info">{{$contact->subject}}</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link">
                                    Message
                                </a>
                                <p style="padding: 20px 20px;">{{$contact->message}}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
