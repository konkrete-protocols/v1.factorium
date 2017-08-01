<?php

namespace App\Http\Controllers;

use Session;
use Validator;
use App\User;
use App\Project;
use App\Http\Requests;
use App\InvestingJoint;
use App\ProjectSpvDetail;
use App\Mailers\AppMailer;
use App\InvestmentInvestor;
use App\UserInvestmentDocument;
use Illuminate\Http\Request;
use App\Jobs\SendReminderEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Jobs\SendInvestorNotificationEmail;
use App\Jobs\SendDeveloperNotificationEmail;


class OfferController extends Controller
{
    protected $form_session = 'submit_form';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function store(Request $request)
    {
        $project = Project::findOrFail($request->project_id);
        $user = Auth::user();
        $amount = floatval(str_replace(',', '', str_replace('A$ ', '', $request->amount_to_invest)));
        $amount_5 = $amount*0.05; //5 percent of investment
        $user->investments()->attach($project, ['investment_id'=>$project->investment->id,'amount'=>$amount,'project_site'=>url(),'investing_as'=>$request->investing_as]);
        $user->update($request->all());
        $investor = InvestmentInvestor::get()->last();
        if($request->investing_as != 'Individual Investor'){
            $investing_joint = new InvestingJoint;
            $investing_joint->project_id = $project->id;
            $investing_joint->investment_investor_id = $investor->id;
            $investing_joint->joint_investor_first_name = $request->joint_investor_first;
            $investing_joint->joint_investor_last_name = $request->joint_investor_last;
            $investing_joint->investing_company = $request->investing_company_name;
            $investing_joint->save();
        }
        $investor_joint = InvestingJoint::get()->last();
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
            $destinationPath = 'assets/users/'.$user->id.'/investments/'.$investor->id.'/normal_name/';
            $filename = $request->file('user_id_doc')->getClientOriginalName();
            $fileExtension = $request->file('user_id_doc')->getClientOriginalExtension();
            $request->file('user_id_doc')->move($destinationPath, $filename);
            $user_investment_doc = new UserInvestmentDocument(['type'=>'normal_name', 'filename'=>$filename, 'path'=>$destinationPath.$filename,'project_id'=>$project->id,'investing_joint_id'=>$investor_joint->id,'investment_investor_id'=>$investor->id,'extension'=>$fileExtension,'user_id'=>$user->id]);
            $project->investmentDocuments()->save($user_investment_doc);

        }
        $this->dispatch(new SendInvestorNotificationEmail($user,$project));
        $this->dispatch(new SendReminderEmail($user,$project));

        return view('projects.gform.thankyou', compact('project', 'user', 'amount_5', 'amount'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
