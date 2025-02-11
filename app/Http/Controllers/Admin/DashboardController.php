<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PaymentEnum;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\CourseDocument;
use App\Models\Payment;
use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $data = [
            'countPosts' => $this->getCountPosts(),
            'countCourseDocuments' => $this->getCourseDocuments(),
            'countPayments' => $this->getCountPayments(),
            'notifications' => $this->getNotifications()
        ];

        return view('admin.dashboard.index', $data);
    }

    private function getCountPosts(): int
    {
        return Post::count('id');
    }

    private function getCountPayments(): int
    {
        return Payment::where('status', '=', PaymentEnum::SUCCESS->value)
            ->count('id');
    }


    private function getCourseDocuments(): int
    {
        return CourseDocument::count('id');
    }

    private function getNotifications(): Collection
    {
        return Auth::user()->notifications()
            ->limit(5)
            ->orderByDesc('updated_at')
            ->orderByDesc('created_at')
            ->get()
        ;
    }
}
