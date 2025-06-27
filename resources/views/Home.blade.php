@extends('layouts.app')
@section('styles')
<style>
        * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }

                body {
                    font-family: 'Arial', sans-serif;
                    overflow-x: hidden;
                }

            .slider-container {
            position: relative;
            width: 100%;
            height: 700px;
            overflow: hidden;
        }

        .slider {
            display: flex;
            width: 300%;
            height: 100%;
            transition: transform 3s cubic-bezier(0.645, 0.355, 1);
        }

        .slide {
            position: relative;
            flex: 0 0 33.333%;
            min-width: 33.333%;
            height: 100%;
            display: flex;
            justify-content: start;
            align-items: center;
            text-align: start;
            color: white;
            overflow: hidden;
        }

        .slide1 {
            position: relative;
            flex: 0 0 33.333%;
            min-width: 33.333%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
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
            animation: zoomEffect 30s infinite alternate;
            z-index: -1;
        }

        .slide-1::before {
            background-image: url('../images/img1.webp');
        }

        .slide-2::before {
            background-image: url('../images/img2.webp');
        }

        .slide-3::before {
            background-image: url('../images/img3.webp');
        }

        @keyframes zoomEffect {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(1.2);
            }
        }

        .slide {
            background-image: none !important;
        }
        .slide-1 {
           background-image: url('../images/img1.webp');
        }

        .slide-2 {
           background-image: url('../images/img2.webp');
        }

        .slide-3 {
           background-image: url('../images/img3.webp');
         }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .slide-content {
            position: relative;
            z-index: 2;
            padding: 30px;
           margin-left: 100px;
            max-width: 800px;
            opacity: 0;
            top: -10px;
            transform: translateY(50px);
            transition: all 0.8s ease 0.3s;
            font-family: 'اسم_الخط', serif;

        }

        .slide.active .slide-content {
            opacity: 1;
            transform: translateY(0);
        }

        h1 {
            font-size: 4rem;
            margin-bottom: 20px;
            font-weight: 600;
            color: rgb(34, 34, 34);
            letter-spacing: 3px;
        }

        span{
            font-size: 1.5rem;
            margin-bottom: 40px;
            line-height: 1.6;
             color: rgb(34, 34, 34);

        }

        .shop-btn {
            display: inline-block;
            background-color:white;
            color: black;
            border: none;
            padding: 15px 40px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.4s ease;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .shop-btn:hover {
      background-color: rgb(214, 159, 67);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }

        .slider-nav {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            z-index: 10;
        }

        .slider-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.5);
            margin: 0 10px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .slider-dot.active {
            background-color: white;
            transform: scale(1.3);
        }

        .nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255,255,255,0.2);
            color: white;
            border: none;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            font-size: 1.8rem;
            cursor: pointer;
            z-index: 10;
            transition: all 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(3px);
        }

        .nav-btn:hover {
            background-color: white;
        }

        .prev-btn {
            left: 30px;
        }

        .next-btn {
            right: 30px;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 3rem;
            }

            span {
                font-size: 1.2rem;
            }

            .nav-btn {
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
            }
        }
      .card {
      border: none;
      border-radius: 10px;
      overflow: hidden;
      position: relative;
      color: white;
    }


    .card:hover .card-bg{
        transform:  scale(1.1);
       transition: all 1s ease;

    }
    .card-bg {
      background-size: cover;
      background-position: center;
      height: 300px;
      border-radius: 10px 10px 0 0;
    }
    .card-body {
      position: absolute;
      top: 50%;
     color: rgb(34, 34, 34);

      right: 10px;
      transform: translateY(-50%);
      padding: 20px;
    }
    .btn {
      background-color: rgb(214, 159, 67);
      color: white;
    }
    /* catogery */


.catogrey {
  overflow-x: hidden;
  background: #f9f9f9;
}
.box-container {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
}
.box {

  border-radius: 0.5rem;
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
  overflow: hidden;
  position: relative;
  flex: 1 1 30rem;
  border: 0.1rem solid rgba(0, 0, 0, 0.2);
}

.box img {
  height: 300px;
  width: 100%;
  object-fit:initial;
}
.box h3 {
  position: absolute;
  top: -100%;
  left: 0;
  background: RGBA(214, 159, 67, 0.5);
  font-weight: bold;
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}
.box a {
  position: absolute;
  bottom: -100%;
  left: 50%;
  transform: translateX(-50%);
  width: 100px;
  height: 40px;
  background-color: white;
  font-weight: bold;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: bottom 0.3s ease, background-color 0.3s ease;
}
.box:hover h3 {
  top: 0;
}
.box:hover a {
  bottom: 80px;
  background-color: #5D4037;
  color: white;
}
.box:hover img {
  transform: scale(1.1);
}



</style>
@endsection
@section('content')

 <div class="slider-container">
        <div class="slider">
            <div class="slide slide-1 active">
                <div class="overlay"></div>
                <div class="slide-content">
                 <span>Discount Up To 50 % Off</span>

                    <h1>Tasty Cappuccino Coffee</h1>
                    <a href="#" class="shop-btn">SHOP NOW</a>
                </div>
            </div>
            <div class="slide slide-2">
                <div class="overlay"></div>
                <div class="slide-content">
             <span>Discount Up To 50 % Off</span>

                    <h1>Tasty Cappuccino Coffee</h1>
                    <a href="#" class="shop-btn">SHOP NOW</a>
                </div>
            </div>
            <div class="slide1 slide-3">
                <div class="overlay"></div>
                <div class="slide-content1">
             <span>Discount Up To 50 % Off</span>

                    <h1>Tasty Cappuccino Coffee</h1>
                    <a href="#" class="shop-btn">SHOP NOW</a>
                </div>
            </div>
        </div>

        <button class="nav-btn prev-btn">❮</button>
        <button class="nav-btn next-btn">❯</button>

        <div class="slider-nav">
            <div class="slider-dot active" data-slide="0"></div>
            <div class="slider-dot" data-slide="1"></div>
            <div class="slider-dot" data-slide="2"></div>
        </div>
    </div>


    {{-- catogrey --}}
<div class="container mt-5">
    <section class="catogrey">
      <h2 class="text-center mb-5">Shop By Category</h2>
      <div class="box-container">
        <div class="row">
        <div class="col-3">
        <div class="box mt-3">
            <img src="{{asset('images/catogry/p1.avif')}}" alt="">
          <h3>Cappuccino Coffee</h3>
         <a href="#" class="btn">SEE NOW</a>

        </div>
        </div>
        <div class="col-3">
        <div class="box mt-3">
            <img src="{{asset('images/catogry/p2.avif')}}" alt="">
          <h3>Espresso Coffee</h3>
                   <a href="#" class="btn">SEE NOW</a>

        </div>
        </div>
        <div class="col-3">
        <div class="box mt-3">
            <img src="{{asset('images/catogry/p3.avif')}}" alt="">
          <h3>Ristretto Coffee</h3>
                   <a href="#" class="btn">SEE NOW</a>

        </div>
        </div>
        <div class="col-3">
        <div class="box mt-3">
            <img src="{{asset('images/catogry/p4.avif')}}" alt="">
          <h3>Iced Espresso</h3>
                   <a href="#" class="btn">SEE NOW</a>

        </div>
        </div>
        <div class="col-3">
        <div class="box mt-3">
            <img src="{{asset('images/catogry/p5.avif')}}" alt="">
          <h3>Cortado Coffee</h3>
          <a href="#" class="btn">SEE NOW</a>

        </div>
        </div>
        <div class="col-3">
        <div class="box mt-3">
            <img src="{{asset('images/catogry/p6.avif')}}" alt="">
          <h3>Macchiato Coffee</h3>
         <a href="#" class="btn">SEE NOW</a>

        </div>
        </div>
        <div class="col-3">
        <div class="box mt-3">
            <img src="{{asset('images/catogry/p7.avif')}}" alt="">
          <h3>Cuban Espresso</h3>
          <a href="#" class="btn">SEE NOW</a>

        </div>
        </div>
        <div class="col-3">
        <div class="box mt-3">
            <img src="{{asset('images/catogry/p8.jpg')}}" alt="">
          <h3>Garrett Ode</h3>
                   <a href="#" class="btn">SEE NOW</a>

        </div>
        </div>

      </div>
    </section>
    </div>

    {{-- Popular Products --}}
       <div class="container mt-5">
        <h3 class="text-center my-5">Popular Products</h3>
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-bg" style="background-image: url('../images/hero3.webp');"></div> <!-- خلفية الصورة -->
          <div class="card-body">
            <h5 class="card-title">Italian Roasted Coffee</h5>
            <p class="card-text">Hot & Delicious</p>
            <a href="#" class="btn">SEE NOW</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-bg" style="background-image: url('../images/hero4.webp');"></div> <!-- خلفية الصورة -->
          <div class="card-body">
            <h5 class="card-title">Hot Cappuccino Coffee</h5>
            <p class="card-text">Hot & Delicious</p>
            <a href="#" class="btn">SEE NOW</a>
          </div>
        </div>
      </div>
    </div>
  </div>


   {{-- <div class="container mt-5">
    <div class="row">
      <div class="col-3">
        <div class="card2">
            <img src="{{asset('images/hero3.webp')}}" alt="">
            <h4>Cappuccino Coffee</h4>
            <a href="#" class="">VIEW MORE</a>

        </div>
      </div>
    </div>
</div> --}}
@endsection
@section('script')
    <script>

 document.addEventListener('DOMContentLoaded', function() {
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
        autoSlideInterval = setInterval(nextSlide, 5000);
    }

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }

    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => goToSlide(index));
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowRight') {
            nextSlide();
        } else if (e.key === 'ArrowLeft') {
            prevSlide();
        }
    });

    updateSlider();
    startAutoSlide();
});
            </script>

@endsection
