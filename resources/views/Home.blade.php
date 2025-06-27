@extends('layouts.app')
@section('styles')
<style>
    /* Root Variables for Brand Identity */
    :root {
        --primary-color: #8B4513;
        --secondary-color: #D6943F;
        --accent-color: #CD853F;
        --dark-brown: #5D4037;
        --light-brown: #A0522D;
        --cream: #F5F5DC;
        --white: #FFFFFF;
        --black: #2C2C2C;
        --gray: #6C6C6C;
        --shadow: rgba(0, 0, 0, 0.15);
        --hover-shadow: rgba(0, 0, 0, 0.25);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --border-radius: 12px;
        --font-primary: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        --font-secondary: 'Georgia', serif;
    }

    /* Reset and Base Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: var(--font-primary);
        line-height: 1.6;
        color: var(--black);
        overflow-x: hidden;
    }

    /* Hero Slider Styles */
    .slider-container {
        position: relative;
        width: 100%;
        height: 100vh;
        min-height: 600px;
        overflow: hidden;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    }

    .slider {
        display: flex;
        width: 300%;
        height: 100%;
        transition: transform 1s cubic-bezier(0.645, 0.045, 0.355, 1);
    }

    .slide {
        position: relative;
        flex: 0 0 33.333%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        color: var(--white);
        overflow: hidden;
    }

    .slide::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        animation: zoomEffect 20s infinite alternate;
        z-index: 1;
    }

    .slide-1::before {
        background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('../images/img1.webp');
    }

    .slide-2::before {
        background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('../images/img2.webp');
    }

    .slide-3::before {
        background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('../images/img3.webp');
    }

    @keyframes zoomEffect {
        0% { transform: scale(1); }
        100% { transform: scale(1.1); }
    }

    .slide-content {
        position: relative;
        z-index: 2;
        padding: 2rem;
        margin-left: clamp(2rem, 8vw, 8rem);
        max-width: 600px;
        opacity: 0;
        transform: translateY(50px);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1) 0.3s;
    }

    .slide.active .slide-content {
        opacity: 1;
        transform: translateY(0);
    }

    .slide-content span {
        display: block;
        font-size: clamp(1rem, 2vw, 1.2rem);
        color: var(--secondary-color);
        font-weight: 600;
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .slide-content h1 {
        font-size: clamp(2.5rem, 6vw, 4.5rem);
        font-weight: 700;
        color: var(--white);
        margin-bottom: 1.5rem;
        line-height: 1.1;
        font-family: var(--font-secondary);
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .shop-btn {
        display: inline-block;
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
        color: var(--white);
        padding: 1rem 2.5rem;
        font-size: 1.1rem;
        font-weight: 600;
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-radius: var(--border-radius);
        transition: var(--transition);
        box-shadow: 0 4px 15px rgba(214, 148, 63, 0.3);
        border: none;
        cursor: pointer;
    }

    .shop-btn:hover {
        background: linear-gradient(135deg, var(--accent-color), var(--secondary-color));
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(214, 148, 63, 0.4);
        color: var(--white);
    }

    /* Navigation Controls */
    .nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        color: var(--white);
        border: none;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        font-size: 1.5rem;
        cursor: pointer;
        z-index: 10;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .nav-btn:hover {
        background: var(--white);
        color: var(--primary-color);
        transform: translateY(-50%) scale(1.1);
    }

    .prev-btn { left: 2rem; }
    .next-btn { right: 2rem; }

    .slider-nav {
        position: absolute;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 1rem;
        z-index: 10;
    }

    .slider-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: var(--transition);
    }

    .slider-dot.active {
        background: var(--white);
        transform: scale(1.3);
    }

    /* Section Styles */
    .section {
        padding: 5rem 0;
    }

    .section-title {
        text-align: center;
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 3rem;
        font-family: var(--font-secondary);
        position: relative;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, var(--secondary-color), var(--accent-color));
        border-radius: 2px;
    }

    /* Category Section */
    .category-section {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        padding: 5rem 0;
    }

    .category-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .category-card {
        position: relative;
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: 0 10px 30px var(--shadow);
        transition: var(--transition);
        background: var(--white);
        height: 300px;
    }

    .category-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px var(--hover-shadow);
    }

    .category-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition);
    }

    .category-card:hover img {
        transform: scale(1.1);
    }

    .category-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(139, 69, 19, 0.8), rgba(214, 148, 63, 0.8));
        opacity: 0;
        transition: var(--transition);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 2rem;
    }

    .category-card:hover .category-overlay {
        opacity: 1;
    }

    .category-overlay h3 {
        color: var(--white);
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    }

    .category-btn {
        background: var(--white);
        color: var(--primary-color);
        padding: 0.8rem 2rem;
        border: none;
        border-radius: 50px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: var(--transition);
        text-decoration: none;
        display: inline-block;
    }

    .category-btn:hover {
        background: var(--secondary-color);
        color: var(--white);
        transform: scale(1.05);
    }

    /* Popular Products Section */
    .popular-section {
        background: var(--white);
        padding: 5rem 0;
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
        gap: 2rem;
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .product-card {
        position: relative;
        border-radius: var(--border-radius);
        overflow: hidden;
        height: 400px;
        box-shadow: 0 15px 35px var(--shadow);
        transition: var(--transition);
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 50px var(--hover-shadow);
    }

    .product-bg {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-size: cover;
        background-position: center;
        transition: var(--transition);
    }

    .product-card:hover .product-bg {
        transform: scale(1.1);
    }

    .product-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(0,0,0,0.8));
        padding: 3rem 2rem 2rem;
        color: var(--white);
        transform: translateY(20px);
        transition: var(--transition);
    }

    .product-card:hover .product-content {
        transform: translateY(0);
    }

    .product-content h5 {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        font-family: var(--font-secondary);
    }

    .product-content p {
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
        opacity: 0.9;
    }

    .product-btn {
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
        color: var(--white);
        padding: 0.8rem 2rem;
        border: none;
        border-radius: 50px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: var(--transition);
        text-decoration: none;
        display: inline-block;
    }

    .product-btn:hover {
        background: linear-gradient(135deg, var(--accent-color), var(--light-brown));
        color: var(--white);
        transform: scale(1.05);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .slider-container {
            height: 70vh;
            min-height: 500px;
        }

        .slide-content {
            margin-left: 1rem;
            padding: 1rem;
        }

        .nav-btn {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
        }

        .prev-btn { left: 1rem; }
        .next-btn { right: 1rem; }

        .category-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .product-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .section {
            padding: 3rem 0;
        }
    }

    @media (max-width: 480px) {
        .slide-content {
            margin-left: 0.5rem;
        }

        .category-grid {
            grid-template-columns: 1fr;
            padding: 0 0.5rem;
        }

        .product-grid {
            padding: 0 0.5rem;
        }

        .nav-btn {
            width: 45px;
            height: 45px;
            font-size: 1rem;
        }

        .slider-nav {
            bottom: 1rem;
        }
    }

    /* Loading Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-in-up {
        animation: fadeInUp 0.8s ease-out;
    }

    /* Smooth Scrolling */
    html {
        scroll-behavior: smooth;
    }
</style>
@endsection

@section('content')
<!-- Hero Slider Section -->
<div class="slider-container">
    <div class="slider">
        <div class="slide slide-1 active">
            <div class="slide-content">
                <span>Discount Up To 50% Off</span>
                <h1>Tasty Cappuccino Coffee</h1>
                <a href="#categories" class="shop-btn">SHOP NOW</a>
            </div>
        </div>
        <div class="slide slide-2">
            <div class="slide-content">
                <span>Premium Quality Beans</span>
                <h1>Freshly Roasted Coffee</h1>
                <a href="#categories" class="shop-btn">SHOP NOW</a>
            </div>
        </div>
        <div class="slide slide-3">
            <div class="slide-content">
                <span>Artisan Crafted</span>
                <h1>Perfect Coffee Experience</h1>
                <a href="#categories" class="shop-btn">SHOP NOW</a>
            </div>
        </div>
    </div>

    <button class="nav-btn prev-btn" aria-label="Previous slide">❮</button>
    <button class="nav-btn next-btn" aria-label="Next slide">❯</button>

    <div class="slider-nav">
        <div class="slider-dot active" data-slide="0"></div>
        <div class="slider-dot" data-slide="1"></div>
        <div class="slider-dot" data-slide="2"></div>
    </div>
</div>

<!-- Categories Section -->
<section id="categories" class="category-section">
    <div class="container">
        <h2 class="section-title fade-in-up">Shop By Category</h2>
        <div class="category-grid">
            <div class="category-card fade-in-up">
                <img src="{{asset('images/catogry/p1.avif')}}" alt="Cappuccino Coffee">
                <div class="category-overlay">
                    <h3>Cappuccino Coffee</h3>
                    <a href="#" class="category-btn">SEE NOW</a>
                </div>
            </div>
            <div class="category-card fade-in-up">
                <img src="{{asset('images/catogry/p2.avif')}}" alt="Espresso Coffee">
                <div class="category-overlay">
                    <h3>Espresso Coffee</h3>
                    <a href="#" class="category-btn">SEE NOW</a>
                </div>
            </div>
            <div class="category-card fade-in-up">
                <img src="{{asset('images/catogry/p3.avif')}}" alt="Ristretto Coffee">
                <div class="category-overlay">
                    <h3>Ristretto Coffee</h3>
                    <a href="#" class="category-btn">SEE NOW</a>
                </div>
            </div>
            <div class="category-card fade-in-up">
                <img src="{{asset('images/catogry/p4.avif')}}" alt="Iced Espresso">
                <div class="category-overlay">
                    <h3>Iced Espresso</h3>
                    <a href="#" class="category-btn">SEE NOW</a>
                </div>
            </div>
            <div class="category-card fade-in-up">
                <img src="{{asset('images/catogry/p5.avif')}}" alt="Cortado Coffee">
                <div class="category-overlay">
                    <h3>Cortado Coffee</h3>
                    <a href="#" class="category-btn">SEE NOW</a>
                </div>
            </div>
            <div class="category-card fade-in-up">
                <img src="{{asset('images/catogry/p6.avif')}}" alt="Macchiato Coffee">
                <div class="category-overlay">
                    <h3>Macchiato Coffee</h3>
                    <a href="#" class="category-btn">SEE NOW</a>
                </div>
            </div>
            <div class="category-card fade-in-up">
                <img src="{{asset('images/catogry/p7.avif')}}" alt="Cuban Espresso">
                <div class="category-overlay">
                    <h3>Cuban Espresso</h3>
                    <a href="#" class="category-btn">SEE NOW</a>
                </div>
            </div>
            <div class="category-card fade-in-up">
                <img src="{{asset('images/catogry/p8.jpg')}}" alt="Garrett Ode">
                <div class="category-overlay">
                    <h3>Garrett Ode</h3>
                    <a href="#" class="category-btn">SEE NOW</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular Products Section -->
<section class="popular-section">
    <div class="container">
        <h2 class="section-title fade-in-up">Popular Products</h2>
        <div class="product-grid">
            <div class="product-card fade-in-up">
                <div class="product-bg" style="background-image: url('../images/hero3.webp');"></div>
                <div class="product-content">
                    <h5>Italian Roasted Coffee</h5>
                    <p>Hot & Delicious - Premium Quality</p>
                    <a href="#" class="product-btn">SEE NOW</a>
                </div>
            </div>
            <div class="product-card fade-in-up">
                <div class="product-bg" style="background-image: url('../images/hero4.webp');"></div>
                <div class="product-content">
                    <h5>Hot Cappuccino Coffee</h5>
                    <p>Hot & Delicious - Artisan Crafted</p>
                    <a href="#" class="product-btn">SEE NOW</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Slider functionality
    const slider = document.querySelector('.slider');
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.slider-dot');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');

    let currentIndex = 0;
    let autoSlideInterval;
    const slideCount = slides.length;

    function updateSlider() {
        const offset = -currentIndex * 33.333;
        slider.style.transform = `translateX(${offset}%)`;

        slides.forEach((slide, index) => {
            slide.classList.toggle('active', index === currentIndex);
        });

        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
    }

    function goToSlide(index) {
        currentIndex = index;
        updateSlider();
        resetAutoSlide();
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % slideCount;
        updateSlider();
        resetAutoSlide();
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + slideCount) % slideCount;
        updateSlider();
        resetAutoSlide();
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(nextSlide, 6000);
    }

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }

    // Event listeners
    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => goToSlide(index));
    });

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowRight') nextSlide();
        if (e.key === 'ArrowLeft') prevSlide();
    });

    // Touch/swipe support
    let touchStartX = 0;
    let touchEndX = 0;

    slider.addEventListener('touchstart', function(e) {
        touchStartX = e.changedTouches[0].screenX;
    });

    slider.addEventListener('touchend', function(e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });

    function handleSwipe() {
        const swipeThreshold = 50;
        const swipeDistance = touchEndX - touchStartX;
        
        if (Math.abs(swipeDistance) > swipeThreshold) {
            if (swipeDistance > 0) {
                prevSlide();
            } else {
                nextSlide();
            }
        }
    }

    // Initialize slider
    updateSlider();
    startAutoSlide();

    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationDelay = Math.random() * 0.3 + 's';
                entry.target.classList.add('fade-in-up');
            }
        });
    }, observerOptions);

    // Observe all animated elements
    document.querySelectorAll('.category-card, .product-card, .section-title').forEach(el => {
        observer.observe(el);
    });

    // Pause auto-slide when user hovers over slider
    const sliderContainer = document.querySelector('.slider-container');
    sliderContainer.addEventListener('mouseenter', () => clearInterval(autoSlideInterval));
    sliderContainer.addEventListener('mouseleave', startAutoSlide);
});
</script>
@endsection