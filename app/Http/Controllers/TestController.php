<?php

namespace App\Http\Controllers;

use App\Services\Admin\SendEmailService;
use Illuminate\Http\Request;
use Illuminate\Log\LogManager;

class TestController extends Controller
{

    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index(Service $service)
    {
//        $log->info("asdsdf");
        dd($this->request);
        $service->process($this->mapRequestToService($this->request));
        return 'it works!';
    }

    // \App\Services\Admin\SendEmailService
    public function index2(SendEmailService $service)
    {
        return $service->sendEmail();
    }

    private function mapRequestToService() {
        return [];
    }
}
