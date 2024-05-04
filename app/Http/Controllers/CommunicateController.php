<?php

namespace App\Http\Controllers;

use App\Models\NoticeBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunicateController extends Controller
{
    public function noticeBoard()
    {  
        $data['get_notices'] = NoticeBoard::getNotice();
        $data['header_title'] = 'Notice Board';
        return view('admin.communicate.noticeboard.list', $data);
    }

    public function addNoticeBoard()
    {
        $data['header_title'] = 'Add New Notice';
        return view('admin.communicate.noticeboard.add', $data);
    }

    public function insertNoticeBoard(Request $request)
    { 
        $notice = NoticeBoard::make($request->except('created_by'));
        $notice->created_by =  Auth::user()->id;
        $notice->save();

        toastr()->addsuccess('Notice Successfully Created');
        return redirect()->route('admin.communicate.notice_board');
    }
}
