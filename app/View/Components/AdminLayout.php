<?php

namespace App\View\Components;

use App\Models\AttendanceError;
use Illuminate\View\Component;

class AdminLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    // アドミン用
    public function render()
    {
        $userError = AttendanceError::where('error_info', '')->get();
        $errorNum = $userError->count();
        
        return view('layouts.admin', compact('errorNum'));
    }
}
