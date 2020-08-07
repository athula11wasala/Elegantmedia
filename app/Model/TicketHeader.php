<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TicketHeader extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'tblticket_header';

    protected $fillable = [
       'id', 'cust_id', 'inquiry', 'status',
    ];


}
