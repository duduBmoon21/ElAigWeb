@extends('layouts.admin')

@section('content')
<section id="contact" class="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                    <h3>Get In Touch</h3>
                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.</p>

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                            </div>
                            <div class="col-12">
                                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="form-control" rows="6" placeholder="Message" required></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
