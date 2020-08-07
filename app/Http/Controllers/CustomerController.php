<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketHeaderRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Services\CmsService;
use Illuminate\Http\Request;

class CustomerController extends Controller {

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

        $data = $this->cmsService->getAllTicket(Auth::user()->id);
        return view('customer/customer_view',[
                           'data'=>$data,
                           'email'=>Auth::user()->email]);
    }

    /**
     * create Inquiry
     * @param TicketHeaderRequest $request
     */
    public function postCreateInquiry(TicketHeaderRequest $request) {

        if ($this->cmsService->createInquiry($request->all()) == true) {

            return redirect()
                ->back()
                ->with("message",  __ ( 'messages.create_inqry' ));
        }
            return redirect()
                ->back()
                ->with("messageWarning",  __ ( 'messages.messageWarning' ));

    }
}
