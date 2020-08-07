<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TicketDetail extends  Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'tblticket_details';

    protected $fillable = [
        'ticket_id', 'agent_id', 'description',
    ];

}
