<footer class="bg-dark text-white pt-5 pb-4">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-md-3 col-12 mb-4">
                <h5 class="text-uppercase mb-4">About Us</h5>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui at repudiandae accusantium aliquid
                    provident maiores cum asperiores atque id quidem.</p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-3 col-6 mb-4">
                <h5 class="text-uppercase mb-4">Quick Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/" class="text-white text-decoration-none">Home</a></li>
                    <li class="mb-2"><a href="{{ route('profile') }}"
                            class="text-white text-decoration-none">profile</a></li>
                    <li class="mb-2"><a href="" class="text-white text-decoration-none">Privacy Policy</a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-md-3 col-6 mb-4">
                <h5 class="text-uppercase mb-4">Contact Us</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fas fa-envelope me-2"></i>
                        contact@example.com
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-phone me-2"></i>
                        +1 234 567 890
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        123 Street, City, Country
                    </li>
                </ul>
            </div>

            <!-- Social Media -->
            <div class="col-md-3 col-12 mb-4">
                <h5 class="text-uppercase mb-4">Follow Us</h5>
                <div class="d-flex gap-3">
                    <a href="https://www.facebook.com/people/John-Elylar-Tan/pfbid02BwFeqxqVxUXmF9pbvkFxPFE7baGrsDEkmAAGUmDVWxdjtskVBvq8o24yfxKcrBXpl/"
                        class="text-white text-decoration-none fs-4">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-white text-decoration-none fs-4">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-white text-decoration-none fs-4">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-white text-decoration-none fs-4">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="row pt-4 border-top">
            <div class="col-12 text-center">
                <p class="mb-0">&copy; {{ date('Y') }} Learning Hub. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

<style>
    footer a:hover {
        color: #20c997 !important;
        transition: color 0.3s ease;
    }

    .fab:hover {
        transform: scale(1.2);
        transition: transform 0.3s ease;
    }
</style>
