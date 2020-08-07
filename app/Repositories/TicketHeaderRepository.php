<?php

namespace App\Repositories;

use DB;
use App\Model\TicketHeader;
use Illuminate\Support\Facades\Config;

class TicketHeaderRepository {

    /**
     * add ticket
     * @param $data
     * @param $customet_id
     * @return bool
     */
    public  function  addTicket($data,$customet_id){


        try {
            $objTicket = new TicketHeader;
            $objTicket->cust_id = $customet_id;
            $objTicket->inquiry = $data['input_inqry'];
            $objTicket->tel_no = $data['input_tel'];
            $objTicket->save();
        }
        catch (\PDOException $ex){
            print_r($ex->getMessage()); die();
             return false;
        }
       return true;
    }


    /**
     * get all ticket
     * @return mixed
     */
    public function  getAllTicket($cust_id = 0){

        $result =  DB::table('tblticket_header')->select('tblticket_header.id as id','tblticket_header.cust_id','tblticket_header.inquiry','tblticket_header.status',
                         'tblusers.email as name','tblticket_details.description as feedback')
         ->leftjoin('tblusers', 'tblusers.id', '=', 'tblticket_header.cust_id')
         ->leftjoin('tblticket_details', 'tblticket_details.ticket_id', '=', 'tblticket_header.id');

        if(!empty($cust_id)){

            $result = $result->where('tblticket_header.cust_id', "=",$cust_id)
                              ->orderBy('tblticket_header.id','DESC');
        }else {

            $result=
                  $result->orderBy('tblticket_header.status','DESC');


        }
        $result =     $result->get();

        return  $result;
    }



    /**retive ticket according the id
     * @param $id
     * @return mixed
     */
    public function getTicket($id){

        $result =  DB::table('tblticket_header')->
        select('tblticket_header.id as ticket_id', 'tblticket_header.cust_id','tblticket_header.inquiry','tblticket_header.status',
            'tblusers.email as name')
            ->leftjoin('tblusers', 'tblusers.id', '=', 'tblticket_header.cust_id')
            ->where('tblticket_header.id',$id)
            ->first();

        return  $result;
    }


}