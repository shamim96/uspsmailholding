<?php

namespace App\Http\Controllers;

use App\ScriptDispute;
use App\ScriptHeader;
use App\ScriptThankYou;
use Illuminate\Http\Request;
use Session;

class ScriptController extends Controller
{
    //Header Script
    public function addHeaderScript(){
        return view('admin.scripts.addHeaderScript');
    }

    public function addHeaderScriptPost(Request $request){
        ScriptHeader::create($request->all());
        $request->session()->flash('msg-success','Script saved');
        return redirect()->route('admin.allHeaderScripts');
    }

    public function allHeaderScripts(){
        $all = ScriptHeader::orderBy('id','desc')->get();
        return view('admin.scripts.allHeaderScripts',compact('all'));
    }

    public function deleteHeaderScript($id){
        $script = ScriptHeader::findOrFail($id);
        $script->delete();
        Session::flash('msg-danger','Script Deleted');
        return redirect()->back();
    }


    public function editHeaderScript($id){
        $script = ScriptHeader::findOrFail($id);
        return view('admin.scripts.editHeaderScript',compact('script'));
    }
    public function updateHeaderScript(Request $request,$id){
        $script = ScriptHeader::findOrFail($id);
        $script->update($request->all());
        Session::flash('msg-success','Script updated');
        return redirect()->back();
    }



    //Thank You Script

    public function allThankYouScripts(){
        $all = ScriptThankYou::orderBy('id','desc')->get();
        return view('admin.scripts.allThankYouScripts',compact('all'));
    }

    public function addThankYouScript(){
        return view('admin.scripts.addThankYouScript');
    }
    public function addThankYouScriptPost(Request $request){
        ScriptThankYou::create($request->all());
        $request->session()->flash('msg-success','Script saved');
        return redirect()->route('admin.allThankYouScripts');
    }

    public function editThankYouScript($id){
        $script = ScriptThankYou::findOrFail($id);
        return view('admin.scripts.editThankYouScript',compact('script'));
    }
    public function updateThankYouScript(Request $request,$id){
        $script = ScriptThankYou::findOrFail($id);
        $script->update($request->all());
        Session::flash('msg-success','Script updated');
        return redirect()->back();
    }
    public function deleteThankYouScript($id){
        $script = ScriptThankYou::findOrFail($id);
        $script->delete();
        Session::flash('msg-danger','Script Deleted');
        return redirect()->back();
    }

    //Dispute Script
    public function addDisputeScript(){
        return view('admin.scripts.addDisputeScript');
    }

    public function addDisputeScriptPost(Request $request){
        ScriptDispute::create($request->all());
        $request->session()->flash('msg-success','Script saved');
        return redirect()->route('admin.allDisputeScripts');
    }

    public function allDisputeScripts(){
        $all = ScriptDispute::orderBy('id','desc')->get();
        return view('admin.scripts.allDisputeScripts',compact('all'));
    }

    public function deleteDisputeScript($id){
        $script = ScriptDispute::findOrFail($id);
        $script->delete();
        Session::flash('msg-danger','Script Deleted');
        return redirect()->back();
    }


    public function editDisputeScript($id){
        $script = ScriptDispute::findOrFail($id);
        return view('admin.scripts.editDisputeScript',compact('script'));
    }
    public function updateDisputeScript(Request $request,$id){
        $script = ScriptDispute::findOrFail($id);
        $script->update($request->all());
        Session::flash('msg-success','Script updated');
        return redirect()->back();
    }
}
