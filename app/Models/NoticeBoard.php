<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticeBoard extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'notice_date',
        'publish_date',
        'message',
    ];

    static public function getNotice()
    {
        return self::select('notice_boards.*', 'users.name as createdby')
                    ->join('users', 'users.id', 'notice_boards.created_by')
                    ->orderBy('notice_boards.id', 'desc')
                    ->paginate(20);
    }
}
