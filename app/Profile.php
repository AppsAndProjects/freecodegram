<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ?   $this->image : 'profile/wCRll7fpGVkj9dJTzrN4b3TP5yWk1HsKRHWkWw9w.png';

        return '/storage/' . $imagePath;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public function user() {

return $this ->belongsTo(User::class);



    }
}
