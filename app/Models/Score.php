<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'n1',
        'n2',
        'n3',
        'n4',
        'p1',
        'pt1',
        
        'n5',
        'n6',
        'n7',
        'n8',
        'p2',

        'n9',
        'n10',
        'n11',
        'p3',
        'pt2',

        'pf2',

        'period',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
