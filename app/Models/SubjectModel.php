<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    use HasFactory;

    protected $table = 'subject';

    static public function getRecord()
    {
        $return = self::select('subject.*','users.name as created_by_name') 
        -> join('users','users.id','subject.created_by')
        ->orderBy('subject.id','asc');
    if(!empty(request()->get('name')))
    {
        $return = $return->where('subject.name','like','%'.request()->get('name').'%');

    }
    if(!empty(request()->get('type')))
    {
        $return = $return->where('subject.type','=',request()->get('type'));

    }
    if (!empty(request()->get('date'))) {
        $return = $return->whereDate('subject.created_at' ,'=' ,request()->get('date'));
    }             
    $return = $return   ->where('subject.is_delete','=',0) 
                        -> orderBy('subject.id','asc')
                        -> paginate(5);
                return $return;
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

}
