<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use App\Mail\LowRatingAlert;
use Carbon\Carbon;

class CheckLowRatedProducts extends Command
{
    protected $signature = 'products:check-low-ratings';
    protected $description = 'Send daily emails to sellers if product rating is below 3.';

    public function handle()
    {
        $products = Product::with(['ratings', 'seller'])->get();

        foreach ($products as $product) {
            $avgRating = $product->ratings->avg('rating');

            if ($avgRating !== null && $avgRating < 3 && $product->seller && $product->seller->type === 'seller') {
                $lastSent = $product->last_low_rating_alert_sent_at;

                if (!$lastSent || Carbon::parse($lastSent)->lt(now()->subDay())) {
                    Mail::to($product->seller->email)->send(new LowRatingAlert($product));

                    $product->last_low_rating_alert_sent_at = now();
                    $product->save();
                }
            }
        }

        $this->info('Low rating alerts sent.');
    }
}
