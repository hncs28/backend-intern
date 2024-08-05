<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Mail\BookingOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Front\order;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
{
    $order = DB::table('order')
                ->join('customers', 'order.customerID', '=', 'customers.customerID')
                ->join('employee', 'order.employeeID', '=','employee.employeeID')
                ->join('services', 'order.serviceID', '=','services.serviceID' )
                ->select('order.*', 'customerName', 'employeeName', 'serviceName')
                ->get();
    return response()->json($order);}

    public function byUser($customerID) {
    
        $userorder = order::where('customerID', '=', $customerID)->select('*')->first();
        if (empty($userorder)) {
            return ('404 NOT FOUND');
        }
        return response() -> json($userorder);    
    }
    public function store(Request $request) {
        \Log::info('message',['request' => $request->all()]);
        $order = new order;
        $order->customerName = $request->input('customerName');
        $order->customerPhone = $request->input('customerPhone');
        $order->customerEmail = $request->input('customerEmail');
        $order->employeeName = $request->input('employeeName');
        $order->bookingTime = $request->input('bookingTime');
        $order->serviceName = $request->input('serviceName');
        $order->customerID = $request->customerID;
        $order->price = $request->input('price');
        $order->save();

        try {
            $data = [
                "name" => "Foo Bar",
                'order' => $order,
            ];
        
            $to = $request->input('customerEmail');
            if (empty($to) || !filter_var($to, FILTER_VALIDATE_EMAIL)) {
                throw new \Exception('Invalid email address');
            }
        
            \Log::info('Attempting to send email', ['to' => $to, 'data' => $data]);
        
            Mail::send('booking-mail', $data, function ($message) use ($to) {
                $message->from('from@email.com', 'Phòng khám mắt OK');
                $message->subject("Xác nhận đặt lịch");
                $message->to($to);
            });
            // Mail::to($request->input('customerEmail'))->send(new BookingOrder($order));
        } catch (\Exception $exception) {
            \Log::error('email exception', ['e' => $exception]);
        }

    }
    public function search($customerID) {
        $searchOrder = order::where('customerID', '=', $customerID)->select('*')->get();
       
        return response()->json($searchOrder);

    }
    

}

