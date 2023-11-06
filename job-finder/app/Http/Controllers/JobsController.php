<?php

namespace App\Http\Controllers;

use App\Models\job;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Queue\Job as QueueJob;
use Illuminate\Support\Facades\DB;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class JobsController extends Controller
{
    //Show all Jobs
    public function index ()
    {// ['abc'=>job::all()]);
        return view('Folder.index',
        // ['abc'=>job::latest()->look(request(['tag','search']))->get()]);   
        ['abc'=>job::latest()->look(request(['tag','search']))->paginate(8)]);       
    }
    //Show jobs with id
    public function show(job $var)
    {
        return view('Folder.show', ['opd' => $var]);
    }

    public function create()
    {
        return view('Folder.create');
    }
// Store data
    public function store(Request $request)
    {
      $ValidationForm = $request->validate([
        'job_name' =>'required',
        'tags'=>'required',
        'company' =>['required',Rule::unique('jobs','company')],
        'city'=>'required',
        'email' =>['required','email'],
        'website' =>'required',
        'description'=>'required'
      ]);
      if($request->hasFile('logo'))
      {
      $ValidationForm['logo']=$request->file('logo')->store('logos','public');
      }

      $ValidationForm['user_id'] = auth()->id();

       job::create($ValidationForm);
        return redirect('/')->with('Message','Your Job Add Sucesfuly');
    }

    public function edit(job $job)
    {
        // dd($job->id);
        return view('Folder.edit',['job'=>$job]);
    }

    public function update(Request $request,job $job)
    {
        // Make sure fi the login is the onwer
        if($job->user_id !=auth()->id())
        {
            abort(403,'Unauthorized Action');
        }
        $ValidationForm = $request->validate([
            'job_name' =>'required',
            'tags'=>'required',
            'company' =>'required',
            'city'=>'required',
            'email' =>['required','email'],
            'website' =>'required',
            'description'=>'required'
          ]);
          if($request->hasFile('logo'))
          {
          $ValidationForm['logo']=$request->file('logo')->store('logos','public');
          }
        $job->update($ValidationForm);
            return back()->with('Message','Your Job updated Sucesfuly');
        }

        public function destroy(job $para)
        {
            if($para->user_id !=auth()->id())
        {
            abort(403,'Unauthorized Action');
        }
            $para->delete();
            return redirect('/')->with('Message','Your Job deleted Sucesfuly');
        }



        public function manage()
        {
           
            return view ('/Folder/manage',['current'=>auth()->user()->job()->get()]);
        }
    }



