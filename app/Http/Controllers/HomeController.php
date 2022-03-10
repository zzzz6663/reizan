<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Poll;
use App\Models\User;
use App\Models\Barcode;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use App\Notifications\SendSms;
use App\Notifications\SendKaveCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public function  logout(){
        // $exitCode = Artisan::call('cache:clear');
        // $exitCode = Artisan::call('config:cache');
        // $exitCode = Artisan::call('optimize:clear');
        // dd(3);
        Auth::logout();
        alert()->success('شما با موفقیت از حساب کاربری خود خارج شدید ');
        return \redirect()->route('admin.login');
    }
    public function index(){
//        $produce=\App\Models\Barcode::whereDate('created_at', \Carbon\Carbon::today())->count();
//        $serive=\App\Models\Repair:: whereDate('created_at', \Carbon\Carbon::today())->count();
//        $sell=\App\Models\Barcode::whereDate('sell', \Carbon\Carbon::today())->count();
//        $invitedUser = new User();
//        $invitedUser->notify(new SendKaveCode( '09121498571','daily-report',$produce,$serive,$sell));
//        dd(Crypt::encryptString('12345'));
//        $user=\auth()->user();
//        $user->notify(new SendKaveCode( '09373699317' ,'send-verify','1212','',''));
//      $user->notify(new ;SendSms( 'salam' ,'09191190940'));
        $vow=Carbon::now();
//        $text=
//            "مشتری گرامی $user->name دستگاه $user->level با بارکد  $user->level در تاریخ $vow جهت بررسی فنی دریافت شد
//          نتایج متعاقبا از طریق همین سامانه به اطلاع خواهد رسید
//        " ;
//        dd(Jalalian::now()->format('Y-m-d H:i:s'));
//        $text =trim($text);
//        $user->notify(new SendSms( $text,'09373699317'));
        return view('home.home');
   }
   public function agency(){
        return view('home.agency');
   }
   public function services(Service $service){
        return view('home.services',compact('service'));
   }
   public function contact(){
        return view('home.contact');
   }
    public function about(){
        $user=\auth()->user();
//        $user->notify(new SendKaveCode( '09373699317','submit-sms','سیس','سی','23','ssd'));
//        $user->notify(new SendKaveCode( '09373699317','submit-sms','کد یک ','کد دو ','کد سه','کد چهار',null));
        return view('home.about');
    }
    public function check(Request $request){

        if ($request->has('mobile')){

            $data=$request->validate([
                'mobile'=>'required|min:11|max:11',
            ]);
//            ساهخت یوزر

            $user=User::where('mobile',$data['mobile'])->first();
            if (!$user){
                $user= User::create([
                    'mobile'=>$data['mobile'],
                    'level'=>'poll',
                ]);
            }
            Auth::loginUsingId($user->id);

//            ارسال پیامک
            $digits = 4;
            $rand= rand(pow(10, $digits-1), pow(10, $digits)-1);
            session()->put('payam',$rand);
            $user->notify(new SendKaveCode( $data['mobile'],'send-verify',$rand,'','','',''));

            return \Redirect::route('home.check.mobile', $user->id);


        }

        $mobile=null;
        $check=null;
        return view('home.check',compact(['mobile','check']));
    }
   public function check_mobile (User $user ,Request $request){
        if ($request->has('payam')){

            $code=session()->get('payam');
          if ($request->payam !=$code){

              return back()->withErrors(['پیام '=>'کد همخوانی ندارد']);
          }
            return \Redirect::route('home.check.product', $user->id);
        }
       return view('home.check.check_mobile',compact(['user']));

   }
   public function check_info  (Poll $poll ,Request $request){
        $user=$poll->user;

        if ($request->has('name')){
            $data=$request->validate([
                'name'=>'nullable',
                'family'=>'nullable',
                'how_reizan'=>'nullable',
                'visit'=>'nullable',
                'how_web'=>'nullable',
                'introduction'=>'nullable',
                'guidance'=>'nullable',
                'other'=>'nullable',
                'why'=>'nullable',
                'service'=>'nullable',
                'follow_up'=>'nullable',
                'installation_collision'=>'nullable',
                'wage'=>'nullable',
                'bar'=>'nullable',
                'packing'=>'nullable',
                'info_packing'=>'nullable',
                'appearance'=>'nullable',
                'info_appearance'=>'nullable',
                'possi'=>'nullable',
                'info_possi'=>'nullable',
                'wa'=>'nullable',
                'info_wa'=>'nullable',
                'color'=>'nullable',
                'info_color'=>'nullable',
                'qua'=>'nullable',
                'info_qua'=>'nullable',
                'value'=>'nullable',
                'info_value'=>'nullable',
                'worst'=>'nullable',
                'best'=>'nullable',
                'rebuy'=>'nullable',
                'offer'=>'nullable',
                'finish'=>'nullable',
            ]);
            $poll->update($data);
            $user->update($data);
            $this->poll_sms($user->mobile,$user->name);

       alert()->success('نظر شما با موفقیت ثبت شد ')->autoclose(5000);;
       return redirect()->route('login');

        }
       return view('home.check.check_info',compact(['poll']));
   }
    public function poll_sms( $mobile,$name   ){
        $user=auth()->user();
        if ($user){
            $user->notify(new SendKaveCode( $mobile,'finish-comment',$name,'','','','' ));

        }
//        $user->notify(new SendKaveCode( $mobile,'ready-sms',$name,$barcode ,'',$product,$date ));
//        $user->notify(new SendSms( $text,$mobile));
    }
   public function check_product  (User $user ,Request $request){

        if ($request->has('product_id')){
            $data=$request->validate([
                'product_id'=>'required',
                'barcode_id'=>'required|min:4',
                'current'=>'required|min:1',
            ]);
            $barcode=Barcode::whereCode($data['barcode_id'])->first();
            if (!$barcode){
                return back()->withErrors(['پیام '=>'    اطلاعات ارسالی صحیح نمیباشد']);
            }
            if ( $barcode->product->current !=$data['current'] || $barcode->product->id !=$data['product_id'] ){

                return back()->withErrors(['پیام '=>'    اطلاعات ارسالی صحیح نمیباشد']);
            }
            $data['barcode_id']=$barcode->id;
            $pool=$user->polls()->create($data);
            return \Redirect::route('home.check.info', $pool->id);
        }
       return view('home.check.check_product',compact(['user']));

   }
   public function produce (Product $product){
       $images=$product->gallery()->latest()->get();
        return view('home.produce',compact(['product','images']));
   }
    public function admin_login()
    {
       if (Auth::check()){

           $user=\auth()->user();
          switch(   $user->level){
              case 'admin':
                  return redirect()->route('admin.index');
                  break;
              case 'qc':
              case 'operator':
                  return redirect()->route('barcode.index');
                  break;
              case 'service':
                  return redirect()->route('repair.index');
                  break;
              case 'accountant':
                  return redirect()->route('admin.accountant.all');
                  break;
          }

       }

        return view('admin.login');
    }
    public function check_login(Request $request){
        $exist_user=User::where('username',$request->username)->first();
        if ($exist_user){
           if (Crypt::decryptString($exist_user->password)==$request->password){
               Auth::loginUsingId($exist_user->id,'true');
               switch($exist_user->level){
                   case 'admin':
                    return redirect()->route('admin.index');
                    break;
                    case 'operator':
                        return redirect()->route('barcode.index');
                        break;
                    case 'service':
                        return redirect()->route('repair.index');
                        break;
                    case 'accountant':
                        return redirect()->route('admin.accountant.all');
                        break;
               }

           }


       }

        alert()->error('اطلاعات شما صحیح نیست ');
       return back();


    }
}
