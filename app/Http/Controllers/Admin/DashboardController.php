<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PaymentEnum;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Payment;
use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $data = [
            'countPosts' => $this->getCountPosts(),
            'countDocuments' => $this->getCountDocuments(),
            'countPayments' => $this->getCountPayments(),
            'notications' => $this->getNotifications()
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


    private function getCountDocuments(): int
    {
        return Document::count('id');
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
