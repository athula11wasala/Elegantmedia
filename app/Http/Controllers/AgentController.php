<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketDetailRequest;
use App\Http\Requests\TicketHeaderRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Services\CmsService;
use Illuminate\Http\Request;


class AgentController extends Controller {

    private $cmsService;

    /**
     * CustomerController constructor.
     * @param CmsService $cmsService
     */
    public function __construct(CmsService $cmsService) {
        $this->cmsService = $cmsService;
    }

    /** this is used for initial loading
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

        $data = $this->cmsService->gePendingTicket();
        return view('agent/agent_view',['data'=>$data,'email'=>Auth::user()->email]);
    }

    /**
     * create Inquiry
     * @param TicketHeaderRequest $request
     */
    public function updateInquiry(TicketDetailRequest $request) {

        if ($this->cmsService->createAgentFeedBack($request->all()) == true) {

            return redirect('agent/')
                  ->with("message",  __ ( 'messages.create_feedback' ) );
        }
        return redirect()
            ->back()
            ->with("messageWarning",  __ ( 'messages.messageWarning' ));
 }

    /**
     * retrive ticket ccoeding to the ticket Id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function retriveTicket($id)
    {
        $ticket_status = $this->cmsService->TicketHeaderStatus();
        $data = $this->cmsService->gePendingTicket();
        $ticket = $this->cmsService->retriveTicket($id);

        return view('agent/agent_update_view',
                           ['data'=>$data,
                            'ticket'=>$ticket,
                            'email'=>Auth::user()->email, 'drp_status'=>$ticket_status  ]);

    }
}
