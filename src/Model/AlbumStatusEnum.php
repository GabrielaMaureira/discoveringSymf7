<?php

namespace   App\Model;

enum AlbumStatusEnum: string
{
    case INPROGRESS = "in progress";
    case WAITING = "waiting";
    case COMPLETE = "complete";
}