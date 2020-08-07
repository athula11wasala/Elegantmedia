<?php

namespace App\Services;

use App\Repositories\TicketHeaderRepository;
use App\Repositories\TicketDetailsRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class CmsService {

    private $ticketHeaderRepository;
    private $ticketDetailRepository;

    /**
     * CmsService constructor.
     * @param TicketHeaderRepository $ticketHeaderRepository
     * @param TicketDetailsRepository $ticketDetailRepository
     */
    public function __construct(TicketHeaderRepository $ticketHeaderRepository,TicketDetailsRepository $ticketDetailRepository) {

        $this->ticketHeaderRepository = $ticketHeaderRepository;
        $this->ticketDetailRepository = $ticketDetailRepository;
    }

    /**
     * create inquiry
     * @param $data
     * @return bool
     */
    public function createInquiry($data) {

        return $this->ticketHeaderRepository->addTicket($data,Auth::user()->id);
    }

    /**create feddback for customer inquiry
     * @param $data
     * @return bool
     */
    public function createAgentFeedBack($data) {

        return $this->ticketDetailRepository->addTicketFeedBack($data,Auth::user()->id);

    }

    /**
     * get select inquiry
     * @param $id
     * @return mixed
     */
    public function retriveTicket($id) {

        return $this->ticketHeaderRepository->getTicket($id);
    }

    /** get all inquiry
     * @return mixed
     */
    public function getAllTicket($cust_id) {

        return $this->ticketHeaderRepository->getAllTicket($cust_id);

    }

    /** get all inquiry
     * @return mixed
     */
    public function gePendingTicket() {

        return $this->ticketHeaderRepository->getAllTicket();

    }

    /**
     * populate Ticket Heade Status
     * @return mixed
     */
    public  function  TicketHeaderStatus(){

        return Config::get ( 'custom_config.TICKET_HEADER_STATUS' );

    }

}

