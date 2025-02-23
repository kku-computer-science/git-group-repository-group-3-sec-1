<?php

namespace App\Http\Controllers;

use App\Models\Educaton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class ProfileuserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {

        //return view('dashboards.admins.index');
        $users = User::get();
        $user = auth()->user();
        //$user->givePermissionTo('readpaper');
        //return view('home');
        return view('dashboards.users.index', compact('users'));
    }

    function profile()
    {
        return view('dashboards.users.profile');
    }
    function settings()
    {
        return view('dashboards.users.settings');
    }

    function updateInfo(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'fname_en' => 'required',
            'lname_en' => 'required',
            'fname_th' => 'required',
            'lname_th' => 'required',
            'fname_cn' => 'required',
            'lname_cn' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,

        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $id = Auth::user()->id;

            if ($request->title_name_en == "Mr.") {
                $title_name_th = 'นาย';
                $title_name_cn = '先生';
            }
            if ($request->title_name_en == "Miss") {
                $title_name_th = 'นางสาว';
                $title_name_cn = '女士';
            }
            if ($request->title_name_en == "Mrs.") {
                $title_name_th = 'นาง';
                $title_name_cn = '小姐';
            }
            // $pos_en='';
            // $pos_th='';
            // $doctoral = '';
            $pos_eng = '';
            $pos_thai = '';
            $pos_cn = '';
            if (Auth::user()->hasRole('admin') or Auth::user()->hasRole('student') ) {
                $request->academic_ranks_en = null;
                $request->academic_ranks_th = null;
                $request->academic_ranks_cn = null;
                $pos_eng = null;
                $pos_thai = null;
                $pos_cn = null;
                $doctoral = null;
            } else {
                if ($request->academic_ranks_en == "Professor") {
                    $pos_en = 'Prof.';
                    $pos_th = 'ศ.';
                    $pos_cn = '教授';
                    $academic_ranks_cn = '教授';
                }
                if ($request->academic_ranks_en == "Associate Professor") {
                    $pos_en = 'Assoc. Prof.';
                    $pos_th = 'รศ.';
                    $pos_cn = '副教授';
                    $academic_ranks_cn = '副教授';
                }
                if ($request->academic_ranks_en == "Assistant Professor") {
                    $pos_en = 'Asst. Prof.';
                    $pos_th = 'ผศ.';
                    $pos_cn = '助理教授';
                    $academic_ranks_cn = '助理教授';
                }
                if ($request->academic_ranks_en == "Lecturer") {
                    $pos_en = 'Lecturer';
                    $pos_th = 'อ.';
                    $pos_cn = '讲师';
                    $academic_ranks_cn = '讲师';
                }
                if ($request->has('pos')) {
                    $pos_eng = $pos_en;
                    $pos_thai = $pos_th;
                    $pos_cn = $pos_cn;
                    //$doctoral = null ;
                } else {
                    if ($pos_en == "Lecturer") {
                        $pos_eng = $pos_en;
                        $pos_thai = $pos_th . 'ดร.';
                        $pos_cn = $pos_cn . '博士';
                        $doctoral = 'Ph.D.';
                    } else {
                        $pos_eng = $pos_en . ' Dr.';
                        $pos_thai = $pos_th . 'ดร.';
                        $pos_cn = $pos_cn . '博士';
                        $doctoral = 'Ph.D.';
                    }
                }
            }
            $query = User::find($id)->update([
                'fname_en' => $request->fname_en,
                'lname_en' => $request->lname_en,
                'fname_th' => $request->fname_th,
                'lname_th' => $request->lname_th,
                'fname_cn' => $request->fname_cn,
                'lname_cn' => $request->lname_cn,
                'email' => $request->email,
                'academic_ranks_en' => $request->academic_ranks_en,
                'academic_ranks_th' => $request->academic_ranks_th,
                'academic_ranks_cn' => $request->academic_ranks_cn,
                'position_en' => $pos_eng,
                'position_th' => $pos_thai,
                'position_cn' => $pos_cn,
                'title_name_en' => $request->title_name_en,
                'title_name_th' => $title_name_th,
                'title_name_cn' => $title_name_cn,
                'doctoral_degree' => $doctoral,

            ]);

            if (!$query) {
                return response()->json(['status' => 0, 'msg' => 'Something went wrong.']);
            } else {
                return response()->json(['status' => 1, 'msg' => 'success']);
            }
        }
    }

    function updatePicture(Request $request)
    {
        $path = 'images/imag_user/';
        //return 'aaaaaa';
        $file = $request->file('admin_image');
        $new_name = 'UIMG_' . date('Ymd') . uniqid() . '.jpg';

        //dd(public_path());
        //Upload new image
        $upload = $file->move(public_path($path), $new_name);
        //$filename = time() . '.' . $file->getClientOriginalExtension();
        //$upload = $file->move('user/images', $filename);


        if (!$upload) {
            return response()->json(['status' => 0, 'msg' => 'Something went wrong, upload new picture failed.']);
        } else {
            //Get Old picture
            $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];

            if ($oldPicture != '') {
                if (\File::exists(public_path($path . $oldPicture))) {
                    \File::delete(public_path($path . $oldPicture));
                }
            }

            //Update DB
            $update = User::find(Auth::user()->id)->update(['picture' => $new_name]);

            if (!$upload) {
                return response()->json(['status' => 0, 'msg' => 'Something went wrong, updating picture in db failed.']);
            } else {
                return response()->json(['status' => 1, 'msg' => 'Your profile picture has been updated successfully']);
            }
        }
    }


    function changePassword(Request $request)
    {
        //Validate form
        $validator = \Validator::make($request->all(), [
            'oldpassword' => [
                'required', function ($attribute, $value, $fail) {
                    if (!\Hash::check($value, Auth::user()->password)) {
                        return $fail(__('The current password is incorrect'));
                    }
                },
                'min:8',
                'max:30'
            ],
            'newpassword' => 'required|min:8|max:30',
            'cnewpassword' => 'required|same:newpassword'
        ], [
            'oldpassword.required' => 'Enter your current password',
            'oldpassword.min' => 'Old password must have atleast 8 characters',
            'oldpassword.max' => 'Old password must not be greater than 30 characters',
            'newpassword.required' => 'Enter new password',
            'newpassword.min' => 'New password must have atleast 8 characters',
            'newpassword.max' => 'New password must not be greater than 30 characters',
            'cnewpassword.required' => 'ReEnter your new password',
            'cnewpassword.same' => 'New password and Confirm new password must match'
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $update = User::find(Auth::user()->id)->update(['password' => \Hash::make($request->newpassword)]);

            if (!$update) {
                return response()->json(['status' => 0, 'msg' => 'Something went wrong, Failed to update password in db']);
            } else {
                return response()->json(['status' => 1, 'msg' => 'Your password has been changed successfully']);
            }
        }
    }
}