<?php

namespace App\Http\Controllers;

use App\Credit;
use App\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAuthRequest;
use App\Http\Requests\UserRequest;
use App\InvestmentInvestor;
use App\Invite;
use App\Mailers\AppMailer;
use App\Role;
use App\User;
use App\Project;
use Carbon\Carbon;
use App\IdDocument;
use App\Investment;
use App\InvestingJoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use App\SiteConfiguration;
use Barryvdh\DomPDF\Facade as PDF;

class UsersController extends Controller
{
    /**
     * constructor for UsersController
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'login', 'store', 'authenticate']]);
        $this->middleware('guest', ['only' => ['create', 'login']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $url = url();
        $user = Auth::user();
        $roles = $user->roles;
        if ($roles->contains('role', 'admin') || $roles->contains('role', 'master')) {
            $users = User::paginate(100)->where('registration_site',$url);
            return view('users.index', compact('users'));
        }

        return redirect()->route('users.show', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $color = Color::where('project_site',url())->first();
        $siteConfiguration = SiteConfiguration::all();
        $siteConfiguration = $siteConfiguration->where('project_site',url())->first();
        return view('users.create',compact('color', 'siteConfiguration'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(UserRequest $request, AppMailer $mailer)
    {
        if (!$request['username']) {
            $request['username']= str_slug($request->first_name.' '.$request->last_name.' '.rand(1, 9999));
            $request['password']= bcrypt($request->password);
        }
        $role = Role::whereRole($request->role)->firstOrFail();

        $user = User::create($request->all());
        $time_now = Carbon::now();
        $user->roles()->attach($role);

        $mailer->sendEmailConfirmationTo($user);

        if ($request->wantsJson()) {
            return $user;
        } else {
            return redirect()->route('users.login')->withMessage('<p class="alert alert-success text-center">Successfully Registered User, please log in.</p>');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $color = Color::where('project_site',url())->first();
        $user = Auth::user();
        $roles = $user->roles;
        if ($roles->contains('role', 'admin') || $roles->contains('role', 'master')) {
            $user = User::findOrFail($id);
            return view('users.show', compact('user','color'));
        } else {
            if($user->id == $id) {
                return view('users.show', compact('user','color'));
            }
        }
        return redirect()->route('users.show', $user)->withMessage('<p class="alert text-center alert-warning">You can not access that profile.</p>');
    }
    public function book($id)
    {
        $user = User::findOrFail($id);
        return view('users.book', compact('user'));
    }
    public function bookUser($id)
    {
        $user = User::whereUsername($username)->firstOrFail();
        return view('users.book', compact('user'));
    }
    public function submit($id)
    {
        $color = Color::where('project_site',url())->first();
        $user = User::findOrFail($id);
        return view('users.submit', compact('user','color'));
    }
    /**
     * Display the specified user
     * @param  string $username
     * @return view
     */
    public function showUser($username)
    {
        $color = Color::where('project_site',url())->first();
        $user = User::whereUsername($username)->firstOrFail();
        return view('users.show', compact('user','color'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $color = Color::where('project_site',url())->first();
        $user = Auth::user();
        $roles = $user->roles;
        if ($roles->contains('role', 'admin') || $roles->contains('role', 'master')) {
            $user = User::findOrFail($id);
            return view('users.edit', compact('user','color'));
        } else {
            if($user->id == $id) {
                return view('users.edit', compact('user','color'));
            }
        }
        return redirect()->route('users.edit', $user)->withMessage('<p class="alert text-center alert-warning">You can not access that profile.</p>');
    }
    public function fbedit($id)
    {
        $color = Color::where('project_site',url())->first();
        $user = Auth::user();
        $roles = $user->roles;
        if ($roles->contains('role', 'admin') || $roles->contains('role', 'master')) {
            $user = User::findOrFail($id);
            return view('users.edit', compact('user','color'));
        } else {
            if($user->id == $id) {
                return view('users.edit', compact('user','color'));
            }
        }
        return redirect()->route('users.edit', $user)->withMessage('<p class="alert text-center alert-warning">You can not access that profile.</p>');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = Auth::user();
        $roles = $user->roles;
        $access = 0;
        if ($roles->contains('role', 'admin') || $roles->contains('role', 'master')) {
            $access = 1;
        } else {
            if($user->id == $id) {
                $access =1;
            }
        }

        if($access){
            $user = User::findOrFail($id);
            $status = $user->update($request->all());
            if ($status) {
                return redirect()->route('users.show', [$user])->withMessage('<p class="alert alert-success text-center">Updated Successfully</p>');
            }
        }
        return redirect()->route('users.edit', [$user])->withMessage('<p class="alert alert-danger text-center">Not updated Successfully</p>');
    }
    public function fbupdate(Request $request, $id)
    {
        $this->validate($request, ['first_name'=>'required','last_name'=>'required','phone_number'=>'required']);
        $user = Auth::user();
        $roles = $user->roles;
        $access = 0;
        if ($roles->contains('role', 'admin') || $roles->contains('role', 'master')) {
            $access = 1;
        } else {
            if($user->id == $id) {
                $access =1;
            }
        }

        if($access){
            $status = $user->update($request->all());
            // dd($status);
            if ($status) {
                // dd($status);
                // return view('users.registrationFinish', compact('user'));
                return redirect()->route('users.registrationFinish')->withMessage('<p class="alert alert-success text-center"> Successfully</p>');
            }
        }
        return redirect()->back()->withMessage('<p class="alert alert-danger text-center">Not updated Successfully</p>');
        // return view('users.registrationFinish', compact('user'));
    }

    public function registrationFinish1(){
        $color = Color::where('project_site',url())->first();
        $user = Auth::user();
        return view('users.registrationFinish', compact('user','color'));
    }

    /**
     * Changes role after Registration
     * @return [type] [description]
     */
    public function changeRole(Request $request){
        $user = Auth::user();
        $user->roles()->detach();
        $role = Role::whereRole($request->role)->firstOrFail();
        $user->roles()->attach($role);
        // $user->roles()->updateExistingPivot($userRole->id,$role);
        return redirect('/#projects')->withCookie(\Cookie::forget('referrer'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        #code
    }

    public function verification($id)
    {
        $color = Color::where('project_site',url())->first();
        $user = User::findOrFail($id);
        return view('users.verify', compact('user','color'));
    }

    public function verificationUpload(Request $request, AppMailer $mailer, $id)
    {
        $this->validate($request, ['photo' => 'required','photo_with_id' => 'required']);
        $user = User::findOrFail($id);
        $destinationPath = 'assets/users/';
        $time_now = time();
        $filename = $user->first_name.'_'.$user->id.'_'.$time_now;
        $status1 = Image::make(base64_decode($request->photo))->fit(400, 300)->flip('h')->save($destinationPath.$filename.'.jpg');
        $status2 = Image::make(base64_decode($request->photo_with_id))->fit(400, 300)->save($destinationPath.$filename.'_with_id.jpg');
        if($status1 && $status2) {
            $id_image = new \App\IdImage(['filename'=>$filename.'.jpg', 'path'=>$destinationPath.$filename.'.jpg', 'filename_for_id'=>$filename.'_with_id.jpg', 'path_for_id'=>$destinationPath.$filename.'_with_id.jpg']);
            $user->idImage()->save($id_image);
            $user->profile_picture = $destinationPath.$filename.'.jpg';
            $user->save();
        }
        $credit = Credit::create(['user_id'=>$user->id, 'amount'=>50, 'type'=>'verification docs']);
        $status = $user->update(['verify_id'=>'1']);
        $mailer->sendVerificationNotificationToUser($user, '1', $id_image);
        $mailer->sendIdVerificationEmailToAdmin($user);
        return redirect()->route('users.verification.status', $user)->withMessage('<p class="alert alert-success">Thank You, we will verify the images.</p>');
    }

    public function verificationStatus($id)
    {
        $color = Color::where('project_site',url())->first();
        $user = User::findOrFail($id);
        return view('users.verificationStatus', compact('user','color'));
    }

    public function showInterests($id)
    {
        $color = Color::where('project_site',url())->first();
        $user = User::findOrFail($id);
        $pledged_investments = InvestmentInvestor::all();
        $interests = $user->investments;
        return view('users.interests', compact('user','interests', 'pledged_investments','color'));
    }

    public function showInvitation($id)
    {
        $color = Color::where('project_site',url())->first();
        $user = User::findOrFail($id);
        return view('users.invitation', compact('user','color'));
    }

    public function sendInvitation(Request $request, $id, AppMailer $mailer)
    {
        $user = User::findOrFail($id);
        $this->validate($request, ['email' => 'required']);
        $str = $request->email;
        $email_array = explode(";",$str);
        $failed_emails = "";
        $sent_emails = "";
        foreach ($email_array as $key => $email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $failed_emails = $failed_emails." ".$email;
            } else {
                $user_email_count = count(User::whereEmail("$email")->get());
                $invite_email_count = count(Invite::whereEmail("$email")->get());
                if ($user_email_count != 0 || $invite_email_count != 0) {
                    $failed_emails = $failed_emails." ".$email;
                } else {
                    $token = str_random(60);
                    $invite = Invite::create(['email'=>$email, 'user_id'=>$id, 'token'=>$token]);
                    $mailer->sendInviteToUser($email, $user, $token);
                    $sent_emails = $sent_emails." ".$email;
                }
            }
        }
        if($failed_emails != "" ) {
            if($sent_emails != "") {
                return redirect()->back()->withMessage('<p class="alert alert-success text-center">Your invitation to '.$sent_emails.' was sent succesfully, we will notify when your invite was accepted.</p><br><p class="alert alert-warning text-center">You can not send Invitation to '.$failed_emails.'</p>');
            } else {
                return redirect()->back()->withMessage('<p class="alert alert-warning text-center">You can not send Invitation to '.$failed_emails.'</p>');
            }
        }
        return redirect()->back()->withMessage('<p class="alert alert-success text-center">Your invitation to '.$sent_emails.' was sent succesfully, we will notify when your invite was accepted.</p>');
    }

    /**
     * add investor role to user
     * @param User $users
     */
    public function addInvestor($users)
    {
        $user = User::findOrFail($users);

        if(!$user->id == Auth::user()->id)
        {
            return back()->withMessage('<p class="alert alert-warning text-center">Unauthorized action.</p>');
        }

        if ($user->roles->contains('role', 'investor')) {
            return back()->withMessage('<p class="alert alert-warning text-center">Already Investor</p>');
        }

        $role = Role::whereRole('investor')->firstOrFail();

        $user->roles()->attach($role);

        return back()->withMessage('<p class="alert alert-success text-center">Successfully Added Investor Role</p>');
    }

    /**
     * add Developer role to user
     * @param User $users
     */
    public function addDeveloper($users)
    {
        $user = User::findOrFail($users);

        if(!$user->id == Auth::user()->id)
        {
            return back()->withMessage('<p class="alert alert-warning text-center">Unauthorized action.</p>');
        }

        if ($user->roles->contains('role', 'developer')) {
            return back()->withMessage('<p class="alert alert-warning text-center">Already Developer</p>');
        }

        $role = Role::whereRole('developer')->firstOrFail();

        $user->roles()->attach($role);

        return back()->withMessage('<p class="alert alert-success text-center">Successfully Added Developer Role</p>');

    }

    /**
     * Delete Investor role from user
     * @param  User $users
     */
    public function destroyInvestor($users)
    {
        $user = User::findOrFail($users);

        if(!$user->id == Auth::user()->id)
        {
            return back()->withMessage('<p class="alert alert-warning text-center">Unauthorized action.</p>');
        }

        if ($user->roles->contains('role', 'investor') && $user->roles->count() > 1) {
           $role = Role::whereRole('investor')->firstOrFail();

           $user->roles()->detach($role);

           return back()->withMessage('<p class="alert alert-success text-center">Successfully Deleted Investor Role</p>');
       }

       return back()->withMessage('<p class="alert alert-warning text-center">Unauthorized action.</p>');

   }

    /**
     * delete Developer role from user
     * @param  User $users
     */
    public function destroyDeveloper($users)
    {
        $user = User::findOrFail($users);

        if(!$user->id == Auth::user()->id)
        {
            return back()->withMessage('<p class="alert alert-warning text-center">Unauthorized action.</p>');
        }

        if ($user->roles->contains('role', 'developer') && $user->roles->count() > 1) {
           $role = Role::whereRole('developer')->firstOrFail();

           $user->roles()->detach($role);

           return back()->withMessage('<p class="alert alert-success text-center">Successfully Deleted Developer Role</p>');
       }

       return back()->withMessage('<p class="alert alert-warning text-center">Unauthorized action.</p>');

   }

    /**
     * get user investments
     * @param  User $user_id
     */
    public function usersInvestments($user_id)
    {
        $color = Color::where('project_site',url())->first();
        $user = User::findOrFail($user_id);
        $investments = InvestmentInvestor::where('user_id', $user->id)
        ->where('project_site', url())->get();
        return view('users.investments', compact('user','color', 'investments'));
    }

    /**
     * render share certificateof the user
     * @param  InvestmentInvestor $investment_id
     */
    public function viewShareCertificate($investment_id)
    {
        $investment_id = base64_decode($investment_id);
        $color = Color::where('project_site',url())->first();
        $investment = InvestmentInvestor::find($investment_id);
        // dd($investment->project);
        $shareStart = $investment->share_number;
        $shareStart =  explode('-',$shareStart);
        $shareEnd = $shareStart[1];
        $shareStart = $shareStart[0];
        $investing = InvestingJoint::where('investment_investor_id', $investment->id)->get()->last();
        $project = $investment->project;
        $user = $investment->user;
        return view('pdf.invoiceHtml',compact('investment','color','user','project','investing','shareEnd','shareStart'));
        // $pdf->setPaper('a4', 'landscape');
        // $pdf->setOptions(['Content-Type' => 'application/pdf','images' => true]);
        // return $pdf->stream('invoice.pdf',200,['Content-Type' => 'application/pdf','Content-Disposition' => 'inline']);


        // $filename = 'app/invoices/Share-Certificate-'.base64_decode($investment_id).'.pdf';
        // $path = storage_path($filename);
        // return response()->download($path);
        // return \Response::make(file_get_contents($path), 200, [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'inline; filename="'.$filename.'"'
        // ]);
        // $filename = 'app/invoices/Share-Certificate-'.base64_decode($investment_id).'.pdf';
        // $path = storage_path($filename);
        // // return response()->download($path);
        // return \Response::make(file_get_contents($path), 200, [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'inline; filename="'.$filename.'"'
        // ]);
    }

    public function viewUnitCertificate($investment_id)
    {
        $investment_id = base64_decode($investment_id);
        $color = Color::where('project_site',url())->first();
        $investment = InvestmentInvestor::find($investment_id);
        // dd($investment->project);
        $shareStart = $investment->share_number;
        $shareStart =  explode('-',$shareStart);
        $shareEnd = $shareStart[1];
        $shareStart = $shareStart[0];
        $investing = InvestingJoint::where('investment_investor_id', $investment->id)->get()->last();
        $project = $investment->project;
        $user = $investment->user;
        return view('pdf.invoiceHtml',compact('investment','color','user','project','investing','shareEnd','shareStart'));
        // return view('pdf.invoice',compact('investment','color','user','project','investing','shareEnd','shareStart'));
    }

    public function usersNotifications($user_id)
    {
        $color = Color::where('project_site',url())->first();
        $user = User::findOrFail($user_id);
        $investments = InvestmentInvestor::where('user_id', $user->id)
        ->where('project_site', url())->get()->groupBy('project_id');
        $project_prog = array();
        if($investments->count()){
            foreach ($investments as $projectId => $investment) {
                $project_progs = Project::findOrFail($projectId)->project_progs;
                if($project_progs->count()){
                    foreach ($project_progs as $key => $value) {
                        array_push($project_prog, $value);
                    }
                }
            }
        }
        $project_prog = collect($project_prog);
        return view('users.notification', compact('user','project_prog', 'color'));
    }

    public function documents(Request $request,$id)
    {
        $color = Color::where('project_site',url())->first();
        $user = User::find($id);
        return view('users.idDoc',compact('color','user'));
    }
    public function uploadDocuments(Request $request,$id)
    {
        $validation_rules = array(
            'joint_investor_id_doc'   => 'mimes:jpeg,jpg,png,pdf',
            'trust_or_company_docs'   => 'mimes:jpeg,jpg,png,pdf',
            'user_id_doc'   => 'mimes:jpeg,jpg,png,pdf'
        );
        $validator = Validator::make($request->all(), $validation_rules);
        $color = Color::where('project_site',url())->first();
        $user = User::find($id);
        if($request->hasFile('joint_investor_id_doc'))
        {
            $destinationPath = 'assets/users/'.$user->id.'/investments/'.$investor->id.'/'.$request->joint_investor_first.'_'.$request->joint_investor_last.'/';
            $filename = $request->file('joint_investor_id_doc')->getClientOriginalName();
            $fileExtension = $request->file('joint_investor_id_doc')->getClientOriginalExtension();
            $request->file('joint_investor_id_doc')->move($destinationPath, $filename);
            $user_investment_doc = new UserInvestmentDocument(['type'=>'joint_investor', 'filename'=>$filename, 'path'=>$destinationPath.$filename,'project_id'=>$project->id,'investing_joint_id'=>$investor_joint->id,'investment_investor_id'=>$investor->id,'extension'=>$fileExtension,'user_id'=>$user->id]);
            $project->investmentDocuments()->save($user_investment_doc);

        }
        if($request->hasFile('trust_or_company_docs'))
        {
            $destinationPath = 'assets/users/'.$user->id.'/investments/'.$investor->id.'/'.$request->investing_company_name.'/';
            $filename = $request->file('trust_or_company_docs')->getClientOriginalName();
            $fileExtension = $request->file('trust_or_company_docs')->getClientOriginalExtension();
            $request->file('trust_or_company_docs')->move($destinationPath, $filename);
            $user_investment_doc = new UserInvestmentDocument(['type'=>'trust_or_company', 'filename'=>$filename, 'path'=>$destinationPath.$filename,'project_id'=>$project->id,'investing_joint_id'=>$investor_joint->id,'investment_investor_id'=>$investor->id,'extension'=>$fileExtension,'user_id'=>$user->id]);
            $project->investmentDocuments()->save($user_investment_doc);

        }
        if($request->hasFile('user_id_doc'))
        {
            $destinationPath = 'assets/users/'.$user->id.'/normal_name/';
            $filename = $request->file('user_id_doc')->getClientOriginalName();
            $fileExtension = $request->file('user_id_doc')->getClientOriginalExtension();
            $request->file('user_id_doc')->move($destinationPath, $filename);
            // dd($request);
            $user_doc = new IdDocument(['type'=>'Document', 'filename'=>$filename, 'path'=>$destinationPath.$filename,'user_id'=>$user->id,'extension'=>$fileExtension,'investing_as'=>$request->investing_as]);
            $user->idDoc()->save($user_doc);

        }
        return redirect()->back()->withMessage('Successfully Uploaded documents');
    }
}
