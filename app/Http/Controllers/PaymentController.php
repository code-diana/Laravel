<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;


class PaymentController extends Controller
{
    //
    private $apiContext;

    public function __construct(){

        $paypal_config = Config::get('paypal');


        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $paypal_config['client_id'],     // ClientID
                $paypal_config['secret']     // ClientSecret
            )
        );
    }

    public function payWithPayPal(Request $request){
        // After Step 2
        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal('1.00');
        $amount->setCurrency('EUR');

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);

        $callback=url('status');
        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl($callback)
            ->setCancelUrl($callback);

        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);


        // After Step 3
        try {
            $payment->create($this->apiContext);
            // echo $payment;

            return redirect()->away($payment->getApprovalLink());
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }
            }

        public function payPalStatus(Request $request){
            $paymentId= $request->input('paymentId');       
            $payer= $request->input('payerID');     
            $token= $request->input('token');

            if (!$paymentId || !$payer || !$token){
                $status='No se pudo proceder con el pago a través de PayPal';
                return redirect('/paypal/failed')->with(compact('status'));
            }

            Payment::get($paymentId, $this->apiContext);

            $execution=new PaymentExecution();
            $execution->setPayerId($payer);

            //Execute the payment
            $result = $payment->execute($execution, $this->apiContext);
            
            if ($result->getStatae() === 'approved'){
                $status = 'Gracias! El pago a través de PayPal se ha realizado correctamente';
                return redirect('/results')->with(compact('status'));
            }

            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar';
            return redirect('/results')->with(compact('status'));
        
        }

        public function payPalView(){
            echo 'aaaaa';
        }
}
?>