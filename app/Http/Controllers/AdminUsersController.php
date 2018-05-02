<?php

namespace App\Http\Controllers;
use App\Access;
use App\Department;
use App\Job;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Auth;



class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();


        return view('admin.index',compact('users'));
    }
    /**
     * Search users
     *
     * @return \Illuminate\Http\Response
     */




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        $level = Access::pluck('role_name','id')->all();
        $roles = Job::pluck('job_id','id')->all();
        $depts = Department::pluck('department_id','id')->all();

        return view('admin.create')->with(compact('level','roles','depts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(trim($request->password)==''){
            $input = $request->except('password');
        }
        else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        if($file = $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        User::create($input);
        return redirect('admin/');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($search)
    {
//        $users = DB::table('users')->where('email', 'like', '%' .  $search . '%')->get();
//        return view('admin.search',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $users = User::findOrFail($id);
        $roles = Job::pluck('job_id','id')->all();
        $depts = Department::pluck('department_id','id')->all();
        $level = Access::pluck('role_name','id')->all();
        return view('admin.edit')->with(compact('users','roles','level','depts'));
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
        $user = User::findOrFail($id);
        if(trim($request->password)==''){
            $input = $request->except('password');
        }
        else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        if($file = $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $user->update($input);
        return redirect('admin/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('admin/');
    }


}
