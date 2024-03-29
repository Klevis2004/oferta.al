<?php

namespace App;

use App\Models\Kartela;
use App\Models\Preferencat;
use App\Models\Sherbimi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

function liked($product_id) {
    $kartela = Preferencat::where('artikujs_id', $product_id)->where('user_id', Auth::id())->first();
    
    return $kartela;
}
function getName($user_id) {
    // dd($user_id);
    $user = User::where('id', $user_id)
    ->select('name')
    ->first('name');
    return  $user;
}



