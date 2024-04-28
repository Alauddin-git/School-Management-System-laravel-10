<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommunicateController extends Controller
{
    public function noticeBoard()
    {
        $data['header_title'] = 'Notice Board';
        return view('admin.communicate.noticeboard.list', $data);
    }
}
