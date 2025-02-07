@extends('layouts.app', ['hideHeader' => true])

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <!-- Card for Verification Content -->
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 text-center">
                        <!-- Heading -->
                        <h2 class="card-title mb-4 fw-bold">Verify Your Email Address</h2>

                        <!-- Success Message -->
                        @if (session('message'))
                            <div class="alert alert-success mb-4" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <!-- Instructions -->
                        <p class="text-muted mb-3">
                            Before proceeding, please check your email for a verification link.
                        </p>
                        <p class="text-muted mb-4">
                            If you did not receive the email, click the button below to resend it.
                        </p>

                        <!-- Resend Verification Form -->
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-primary btn-lg">
                                Resend Verification Email
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
