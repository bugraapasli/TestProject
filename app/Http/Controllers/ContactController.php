<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function send(Request $request){
        if($request->type == "contact"){
            $content = array(
                'name' => $request->name,
                'email' => $request->email,
                'subject'=>$request->subject,
                'message'=>$request->messages,
            );

            DB::table('p_message')->insert([
                'type' => 'contact',
                'email' => $request->email,
                'content' => json_encode($content),
                'ip_address' => $request->ip(),
            ]);

    //         $params = json_encode(array(
    //             "Name" => htmlspecialchars_decode($request->name, ENT_QUOTES),
    //             "E-Mail" => htmlspecialchars_decode($request->email, ENT_QUOTES),
    //             "Phone"=>htmlspecialchars_decode($request->phone, ENT_QUOTES),
    //             'Business Name'=>htmlspecialchars_decode($request->business_name, ENT_QUOTES),
    //             'Position In The Company'=>htmlspecialchars_decode($request->position_in_the_company, ENT_QUOTES),
    //             /* "Konu"=>htmlspecialchars_decode($request->subject, ENT_QUOTES), */
    //             "Info" => htmlspecialchars_decode($request->info, ENT_QUOTES),
    //             'Date' => date('d.m.Y'),
    //         ));

    //         $mailgonder = $this->mailgonder('25eaa7bc4ead15f839e6e001dca5b013', 'HTML', $params, $request->input('email'), 'A communication message as below was received via the website.', 'New Contact Message');

    //         if($mailgonder) {
    //             alert()->success('', __('panel.controller.message.send-success'));
    //             return redirect()->back();
    //         } else {
    //             alert()->error('', __('panel.controller.message.error'));
    //             return redirect()->back();
    //         }
    //     } else if($request->type == "newsletter"){
    //         if(!DB::table('p_message')->where(['email' => $request->email, 'deleted' => false])->first()){
    //             alert()->error('', __('panel.controller.message.error-information'));
    //             return redirect()->back();
    //         } else {
    //             DB::table('p_message')->insert([
    //                 'type' => 'newsletter',
    //                 'email' => $request->email,
    //                 'ip_address' => $request->ip(),
    //             ]);

    //             alert()->success('', __('panel.controller.message.send-success'));
    //             return redirect()->back();
    //         }
    //     } else {
    //         alert()->error('', __('panel.controller.message.error'));
             return redirect()->back();
    //     }
    }

    // protected function mailgonder($api_key, $msg_type, $params, $reply_to, $mini_text = '', $subject = '', $tag = ''){
    //     header('Content-Type: text/html; charset=utf-8');
    //     $ch = curl_init();
    //     $ADDRESS = "http://ant.argenova.com.tr/system_mail_api.php";
    //     curl_setopt($ch, CURLOPT_URL, $ADDRESS);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
    //     curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     $list = array(
    //         "reply_to" => $reply_to,
    //         "api_key"  => $api_key,
    //         "msg_type" => $msg_type,
    //         "parameters" => $params,
    //         "mini_text" => $mini_text,
    //         "subject" => $subject,
    //         'tag' => $tag,
    //         "html" => null
    //     );
    //     $param = "";
    //     $ind = 0;
    //     foreach ($list as $key => $x) {
    //         if ($ind > 0) {
    //             $param =  $param . "&";
    //         }
    //         $param = $param . $key . "=" . $x;
    //         $ind++;
    //     }
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
    //     $server_output = curl_exec($ch);

    //     if ($server_output === false) {
    //         return 0;
    //     }
    //     $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    //     switch ($httpcode) {
    //         case "200":
    //             return 1;
    //             break;
    //         default:
    //             return 2;
    //             break;
    //     }
    //     curl_close($ch);
    }
}
