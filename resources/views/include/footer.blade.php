<link rel="stylesheet" href="{{asset('css/footer.css')}}">

<!-- Footer Start -->
<div class="container-fluid footer py-5" style="background-color: #5D4037; color: #F5F5DC;">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-uppercase mb-4" style="letter-spacing: 3px;">Get In Touch</h4>
                <p><i class="fa fa-map-marker-alt me-2"></i>Location, City, Country</p>
                <p><i class="fa fa-phone-alt me-2"></i>+01114751979</p>
                <p class="m-0"><i class="fa fa-envelope me-2"></i>info@example.com</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-uppercase mb-4" style="letter-spacing: 3px;">Follow Us</h4>
                <p>Amet elitr vero magna sed ipsum sit kasd sea elitr lorem rebum</p>
                <div class="d-flex">
                    <a class="btn btn-outline-light btn-square me-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-square me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-square me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-square me-2" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-square me-2" href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-uppercase mb-4" style="letter-spacing: 3px;">Open Hours</h4>
                <h6 class="text-uppercase">Monday - Friday</h6>
                <p>8.00 AM - 8.00 PM</p>
                <h6 class="text-uppercase">Saturday - Sunday</h6>
                <p>2.00 PM - 8.00 PM</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-uppercase mb-4" style="letter-spacing: 3px;">Newsletter</h4>
                <p>Amet elitr vero magna sed ipsum sit kasd sea elitr lorem rebum</p>
                <div class="position-relative d-flex">
                    <input type="text" class="form-control border-0 w-100   " style="height: 50px" placeholder="Your Email">
                    <button type="button" class="btn btn-primary " style="height:50px; width:100px">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .footer {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.footer h4 {
    font-family: 'Georgia', serif;
    margin-bottom: 1.5rem;
    position: relative;
}

.footer h4::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -10px;
    width: 50px;
    height: 2px;
    background-color: #D6943F;
}

.footer p {
    margin-bottom: 1rem;
}

.footer .btn-square {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 0;
}


@media (max-width: 768px) {
    .footer .col-md-6 {
        margin-bottom: 2rem;
    }
}
</style>