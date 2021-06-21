<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Student;
use App\User;
use App\Lecturer;

class UserController extends Controller
{
    public function destroy(User $user){
        // $user = User::find($id);
        if($user->role=='Lecturer'){
            $user->lecturer->students()->detach();
            $user->lecturer->attendances()->delete();
            $user->lecturer->delete();
        }
        else if($user->role=='Student'){
            if($user->student->file!=NULL){
                $user->student->file->delete();
            }
            if($user->student->lecturers()->wherePivot('order',1)->first()){
                $lecturer = Lecturer::find($user->student->lecturers()->wherePivot('order',1)->first()->id);
                $lecturer->slot++;
                $lecturer->save();
            }
            $user->student->lecturers()->detach();
            $user->student->attendances()->delete();
            $user->student->delete();
        }
        $user->delete();
        return redirect('/super_admin/dashboard/data_overview')->with('success','Delete Success');
    }
    public function verif(User $user){
        // $user = User::find($id);
        $user->email_verified_at = Carbon::now()->toDateTimeString();
        $user->save();
        return redirect('/super_admin/dashboard/data_overview')->with('verif','Success');
    }
}
