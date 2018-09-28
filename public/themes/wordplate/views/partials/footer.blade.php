<footer class="sticky-footer bg-light py-3 sizable">
    <div class="container pt-4 text-center text-md-left">
        <div class="row align-items-start">
            <div class="mb-4 col-md-6 col-lg-12 col-xl-auto text-center">
                <img src="/themes/wordplate/assets/images/seal-footer.png" class="img-fluid" alt="Gulf county Clerk of Courts and Comptroller" >
            </div>
            <div class="mb-4 col-md-6 col-lg-auto text-secondary">
                <p class="text-uppercase mb-2"><strong>Custodian of Public Records</strong></p>
                {!! get_field('mailing_address','option') !!}
            </div>
            <div class="mb-4 col-md-6 col-lg-auto text-secondary">
                <p class="text-uppercase mb-2"><strong>Port St. Joe</strong></p>
                {!! get_field('psj_location','option') !!}
            </div>
            <div class="mb-4 col-md-6 col-lg-auto text-secondary">
                <p class="text-uppercase mb-2"><strong>Wewahitchka</strong></p>
                {!! get_field('wewa_location','option') !!}
            </div>
        </div>
    </div>
    <hr class="border-white">
    <p class="copyright text-center text-secondary text-uppercase">&copy;{{ date('Y') }} {{ get_bloginfo() }}. &nbsp; 
        <a class="text-underline d-block d-md-inline text-secondary text-uppercase" href="/privacy-policy" >Privacy&nbsp;Policy</a> 
        <span class="d-none d-md-inline ">|</span>
        <a class="text-underline d-block d-md-inline text-secondary text-uppercase" href="/privacy-policy" >Accessibility&nbsp;Policy</a> 
        <span class="d-none d-md-inline">|</span>
        <a class="text-underline d-block d-md-inline text-secondary text-uppercase" href="/privacy-policy" >Contact</a> 
        <span class="d-none d-md-inline">|</span>
        <a class="text-underline d-block d-md-inline text-secondary text-uppercase" href="/privacy-policy" >Site Map</a> 
    </p>
</footer>