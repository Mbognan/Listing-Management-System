<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Models\User;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    use FileUploadTrait;
    public function index():View{
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    public function updateAdmin(ProfileUpdateRequest $request):RedirectResponse{
        $avatarPath = $this->uploadImage($request, 'avatar',$request->old_avatar);
        $bannerPath = $this->uploadImage($request,'banner',$request->old_banner);

         $user = Auth::user();

         $user->avatar = !empty($avatarPath) ? $avatarPath : $request->old_avatar;
         $user->banner = !empty($bannerPath) ? $bannerPath : $request->old_banner;
         $user->name = $request->name;
         $user->email = $request->email;
         $user->phone = $request->phone;
         $user->about = $request->about;
         $user->address = $request->address;
         $user->website = $request->website;
         $user->fb_link = $request->fb_link;
         $user->insta_link = $request->insta_link;
         $user->x_link = $request->x_link;
         $user->git_link = $request->git_link;
         $user->save();






        toastr()->success('Updated user successfully!');
        return redirect()->back();
    }

    public function resetPassword(Request $request): RedirectResponse{

       $request->validate([
        'password' => ['required', 'min:8', 'confirmed']
       ]);

       $user = Auth::user();
       $user->password = bcrypt($request->password);
       $user->save();

       toastr()->success('Updated user password successfully!');
       return redirect()->back();
    }
}
