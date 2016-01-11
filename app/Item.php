<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public static function get($search = null) {
        if ($search) {
            return self::where('code', 'like', "%$search%")->orwhere('name', 'like', "%$search%")->paginate(15);
        } else {
            return self::paginate(15);
        }
    }
}
