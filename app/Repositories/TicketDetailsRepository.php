<?php

namespace App\Repositories;

use DB;
use App\Model\TicketHeader;
use App\Model\TicketDetail;
use Illuminate\Support\Facades\Config;

class TicketDetailsRepository {


    public  function  addTicketFeedBack($data,$agent_id){

        try {
            $objTicketDetail = new TicketDetail();
            $objTicketDetail->ticket_id = $data['hnd_ticket_id'];
            $objTicketDetail->agent_id = $agent_id;
            $objTicketDetail->description = $data['input_feed_back'];

            if($objTicketDetail->save()){
                $objTicketHeader = TicketHeader::find($data['hnd_ticket_id']);
                $objTicketHeader->status =   $data['drp_stauts'];
                $objTicketHeader->save();
            }

        }
        catch (\PDOException $ex){
            return false;
        }
        return true;
    }
  }