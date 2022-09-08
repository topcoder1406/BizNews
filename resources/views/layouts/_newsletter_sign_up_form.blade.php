<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
    </div>
    <form class="bg-white text-center border border-top-0 p-3" method="POST" action="{{ route('subscribe-to-newsletter') }}">
        @csrf

        <div class="input-group mb-2" style="width: 100%;">
            <input type="email" name="email" class="form-control form-control-lg" placeholder="Your Email" required>
            <div class="input-group-append">
                <button class="btn btn-primary font-weight-bold px-3" type="submit">Sign Up</button>
            </div>
        </div>
        <small>We won't send any spam</small>
    </form>
</div>
