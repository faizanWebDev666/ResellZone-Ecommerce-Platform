@extends('frontend.layouts.main')
@section('title', 'Privacy Policy | ResellZone')

@section('main-container')
<div class="aboutbanner innerbanner"
style="background: linear-gradient(135deg, #0db893, #0db893); color: white; padding: 80px 0; position: relative; text-align: center;">
<div class="inner-breadcrumb" style="background:  #0db893(0, 0, 0, 0.5); padding: 20px; border-radius: 10px;">
    <div class="container" style="max-width: 1200px; margin: 0 auto;">
        <div class="row align-items-center text-center">
            <div class="col-md-12 col-12">
                <br><br>
                <h2 class="breadcrumb-title"
                    style="font-size: 3rem; font-family: 'Poppins';margin-top:7%; sans-serif; margin-bottom: 20px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
                    Privacy Policy
                </h2>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb"
                        style="display: inline-block; background: none; padding: 0; margin: 0; font-size: 1.2rem; font-family: 'Roboto', sans-serif; color: white; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                       
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-body p-4">

                    <h1 class="card-title text-center mb-4">Privacy Policy</h1>
<p class="text-muted text-center">Last Updated: {{ $policy->updated_at->format('F d, Y') }}</p>

<div class="card-body">
    {!! $policy->content !!}
</div>
            </div>
        </div>
    </div>
</div>
@endsection
