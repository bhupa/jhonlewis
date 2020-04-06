<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\SalesResportRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    protected $sales;

    public function __construct(SalesResportRepository $sales)
    {
        $this->sales = $sales;
    }

    public function changeStatus(Request $request)
    {

        $sales = $this->sales->find($request->get('id'));
        if ($sales->dispatch == 0) {
            $status = '1';
            $message = 'sales with serial number "' . $sales->serial_number . '" is dispatch.';
        } else {
            $status = '0';
            $message = 'sales with serial number "' . $sales->serial_number . '" is not dispatch.';
        }

        $this->sales->changeStatus( $sales->id, $status);
        $this->sales->update($sales->id, array('dispatch' => $status));
        $updated = $this->sales->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'sales' => $updated], 200);
    }
    public function getReturn(Request $request)
    {

        $sales = $this->sales->find($request->get('id'));

        if ($sales->return == 0) {
            $status = '1';
            $message = 'sales with serial number "' . $sales->serial_number . '" is return.';
        } else {
            $status = '0';
            $message = 'sales with serial number "' . $sales->serial_number . '" is not retutn.';
        }

        $this->sales->changeStatus( $sales->id, $status);
        $this->sales->update($sales->id, array('return' => $status));
        $updated = $this->sales->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'sales' => $updated], 200);
    }
    public function destroy($id)
    {
        $sales = $this->sales->find($id);

        if($this->sales->destroy($sales->id)){

            $message = 'Sales item delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'products cannot be delete'],422);
    }
}
