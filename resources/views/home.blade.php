<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🍽️RecipeMaster - Your Smart Meal Planning Solution</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #ff7f50;
            --secondary-color: #2c3e50;
        }

    html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    }

body {
      background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),  
     url('/images/background.jpg'); 
    background-size: cover;
    background-position: center; */
    background-repeat: no-repeat; */
    background-attachment: fixed;
}

        
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80'));
            background-size: cover;
            background-position: center;
            height: 80vh;
            display: flex;
            align-items: center;
            color: white;
        }
       
        
        .feature-card {
            transition: transform 0.3s;
            border: none;
            border-radius: 15px;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .dietary-tag {
            background: var(--primary-color);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            margin: 5px;
        }
        
        .cta-section {
            background: var(--secondary-color);
            color: white;
            padding: 4rem 0;
        }
        .food-health-section {
    background: linear-gradient(135deg, #222, #111);
    color: #fff;
    padding: 80px 20px;
    border-radius: 15px;
    margin: 50px auto;
    width: 90%;
    box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.1);
}

.food-health-section h2 {
    font-size: 2.5rem;
    text-shadow: 2px 2px 10px rgba(255, 255, 255, 0.2);
}

.food-health-section p {
    font-size: 1.2rem;
    max-width: 700px;
    margin: auto;
    opacity: 0.9;
}

.btn:hover {
    opacity: 0.9;
    transform: scale(1.03);
}

.nav-link:hover{
    opacity: 0.9;
    transform: scale(1.03);
}

    </style>

<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  integrity="sha512-yYoV6Z2utmiI8nB0AknnQa4D2b+w5GJYr7aGVIVJhP9H+XPKdI0ZT2s/SkGyTPQoXCRDyLoxGLFgRYPv1A4ZgA=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>

</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand text-primary" href="#">
            <i class="fas fa-utensils me-2"></i>RecipeMaster
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto fs-5">
                <li class="nav-item">
                    <a class="nav-link" href="#features">
                        <i class="fas fa-star me-1"></i>Features
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/recipes">
                        <i class="fas fa-book me-1"></i>Recipes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/meal-plans">
                        <i class="fas fa-calendar-alt me-1"></i>Meal Plans
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/shopping-list">
                        <i class="fas fa-shopping-cart me-1"></i>Cart
                    </a>
                </li>
                <li class="nav-item">
                <a href="/" class="btn ms-4 px-4 py-2 fs-6 text-white"
   style="background: linear-gradient(90deg, #1e90ff, #00bfff); border-radius: 50px; transition: 0.3s;">
   <i class="fas fa-rocket me-2"></i>Get Started
</a>

                </li>
            </ul>
        </div>
    </div>
</nav>



    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center">
            <h1 class="display-4 mb-4">Transform Your Meal Planning</h1>
            <p class="lead mb-4">Discover recipes, create meal plans, and generate shopping lists effortlessly</p>


            <form action="{{ route('externalrecipe.search') }}" method="GET" class="p-3 w-50 mx-auto mt-4 rounded-lg">
    <div class="input-group">
        <input type="text" 
               name="search" 
               class="form-control form-control-sm" 
               placeholder="🍽️ Enter recipe name..." 
               required>
        <button type="submit" class="btn btn-success btn-sm">Search</button>
    </div>
</form>
        </div>
    </section>
    <div class="modal fade" id="foodHealthModal" tabindex="-1" aria-labelledby="foodHealthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white p-4 rounded">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="foodHealthModalLabel">✨ Health & Food Tip ✨</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h3 class="fw-bold">"Healthy Food, Healthy Life"</h3>
                <p class="mt-3">
                    Good nutrition is the foundation of a strong body and a sharp mind.  
                    Choose wisely, eat healthily, and stay happy! 🌱🍎
                </p>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Got it!</button>
            </div>
        </div>
    </div>
</div>


    <!-- Featured Recipes -->
    <section class="py-5" id="recipes">
        <div class="container">
            <h2 class="text-center mb-5 text-white">Popular Recipes</h2>
            <div class="row g-4">
                <!-- Recipe Cards -->
                <div class="col-md-4">
                    <div class="card feature-card h-100">
                        <img src="https://images.unsplash.com/photo-1540189549336-e6e99c3679fe" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Vegetarian Pasta</h5>
                            <div class="d-flex justify-content-between text-muted">
                                <span><i class="fas fa-clock"></i> 30 mins</span>
                                <span><i class="fas fa-utensils"></i> 4 servings</span>
                            </div>
                            <div class="mt-2">
                                <span class="dietary-tag">Vegetarian</span>
                                <span class="dietary-tag">Italian</span>
                            </div>                
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card h-100">
                        <img src="https://i0.wp.com/thegastronomicbong.com/wp-content/uploads/2018/10/Dim-Kosha-Bengali-Spicy-Egg-Masala_4.jpg?fit=3072%2C4608&ssl=1" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Egg Masala</h5>
                            <div class="d-flex justify-content-between text-muted">
                                <span><i class="fas fa-clock"></i> 40 mins</span>
                                <span><i class="fas fa-utensils"></i> 4 servings</span>
                            </div>
                            <div class="mt-2">
                                <span class="dietary-tag">Non-Vegetarian</span>
                                <span class="dietary-tag">Hyderabadi</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card feature-card h-100">
                        <img src="https://shwetainthekitchen.com/wp-content/uploads/2016/07/Paneer-Butter-Masala.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Panner Butter Masala</h5>
                            <div class="d-flex justify-content-between text-muted">
                                <span><i class="fas fa-clock"></i> 60 mins</span>
                                <span><i class="fas fa-utensils"></i> 4 servings</span>
                            </div>
                            <div class="mt-2">
                                <span class="dietary-tag">Vegetarian</span>
                                <span class="dietary-tag">Italian</span>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Add more recipe cards -->
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-light py-5" id="features">
    <div class="container">
        <h2 class="text-center mb-5">How It Works</h2>
        <div class="row g-4">
            <!-- Step 1 -->
            <div class="col-md-4">
    <a href="#" class="text-decoration-none text-dark">
        <div class="card feature-card h-100 p-3">
            <div class="text-center text-primary fs-1 mb-3">
                <i class="fas fa-search"></i>
            </div>
            <h3 class="h4 text-center">1. Find Recipes</h3>
            <p class="text-center">Search by ingredients, dietary needs, or cuisine type</p>
        </div>
    </a>
</div>


            <!-- Step 2 -->
            <div class="col-md-4">
    <a href="/recipes" class="text-decoration-none text-dark">
        <div class="card feature-card h-100 p-3">
            <div class="text-center text-success fs-1 mb-3">
                <i class="fas fa-heart"></i>
            </div>
            <h3 class="h4 text-center">2. Recipes</h3>
            <p class="text-center">Bookmark recipes you love for quick access later</p>
        </div>
    </a>
</div>

           <!-- Step 3 -->
<div class="col-md-4">
    <a href="/meal-plans" class="text-decoration-none text-dark">
        <div class="card feature-card h-100 p-3">
            <div class="text-center text-warning fs-1 mb-3">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <h3 class="h4 text-center">3. Plan Your Meals</h3>
            <p class="text-center">Organize your weekly meals and generate shopping lists</p>
        </div>
    </a>
</div>

</section>

    <section class="py-5 bg-light" id="top-chefs">
    <div class="container">
        <h2 class="text-center mb-5">Top Indian Chefs</h2>
        <div class="row g-4">
            <!-- Chef Sanjeev Kapoor -->
            <div class="col-md-4">
                <div class="card feature-card h-100 text-center p-3">
                    <img src="https://www.ssca.edu.in/assets/images/ChefSanjeev.jpg" class="rounded-circle mx-auto d-block" alt="Chef Sanjeev Kapoor" width="150" height="150" style="object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Chef Sanjeev Kapoor</h5>
                        <p class="text-muted">Renowned for his expertise in Indian cuisine and fusion recipes.</p>
                    </div>
                </div>
            </div>

            <!-- Chef Vikas Khanna -->
            <div class="col-md-4">
                <div class="card feature-card h-100 text-center p-3">
                    <img src="https://images.moneycontrol.com/static-mcnews/2024/02/Vikas-Khanna.jpg?impolicy=website" class="rounded-circle mx-auto d-block" alt="Chef Vikas Khanna" width="150" height="150" style="object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Chef Vikas Khanna</h5>
                        <p class="text-muted">Michelin-starred chef bringing innovation to traditional flavors.</p>
                    </div>
                </div>
            </div>

            <!-- Chef Ranveer Brar -->
            <div class="col-md-4">
                <div class="card feature-card h-100 text-center p-3">
                    <img src="https://blackhattalent.com/wp-content/uploads/2023/07/1672315886_ranveer-profile-1-cms.jpg" class="rounded-circle mx-auto d-block" alt="Chef Ranveer Brar" width="150" height="150" style="object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Chef Ranveer Brar</h5>
                        <p class="text-muted">A storyteller and master of authentic Indian and modern recipes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Testimonials Section -->
<section class="py-5" id="testimonials">
    <div class="container">
        <h2 class="text-center mb-5 text-white">What Our Users Say</h2>
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="text-center text-white">
                        <p class="fs-4">"RecipeMaster has changed the way I cook and plan meals. Super easy to use!"</p>
                        <h5>- Priya Sharma</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="text-center text-white">
                        <p class="fs-4">"Love the meal planner feature! It helps me save time and eat healthy."</p>
                        <h5>- Rahul Verma</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="text-center text-white">
                        <p class="fs-4">"So many amazing recipes! The shopping list feature is a game-changer."</p>
                        <h5>- Anjali Mehta</h5>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>
</section>

<section class="py-5 bg-light" id="diet-plans">
    <div class="container">
        <h2 class="text-center mb-5">Healthy Diet Plans</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card feature-card h-100 p-3">
                    <h5 class="card-title">Keto Diet</h5>
                    <p>A low-carb, high-fat diet that helps in weight loss and improving metabolism.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card h-100 p-3">
                    <h5 class="card-title">Vegan Diet</h5>
                    <p>A plant-based diet rich in nutrients and free from animal products.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card h-100 p-3">
                    <h5 class="card-title">Mediterranean Diet</h5>
                    <p>Balanced meals with fruits, vegetables, whole grains, and healthy fats.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cooking Tips Section -->
<section class="py-5 bg-dark text-white" id="cooking-tips">
    <div class="container">
        <h2 class="text-center mb-5">Cooking Tips & Tricks</h2>
        <div class="row g-4 align-items-stretch">
            <!-- Left Column (Cards) -->
            <div class="col-lg-6 d-flex flex-column justify-content-between">
                <div class="card feature-card mb-3 p-4 bg-light text-dark border-0 shadow-sm">
                    <h5 class="card-title">Knife Skills</h5>
                    <p>Learn how to chop, dice, and slice like a pro to make cooking easier.</p>
                </div>
                <div class="card feature-card mb-3 p-4 bg-light text-dark border-0 shadow-sm">
                    <h5 class="card-title">Perfect Seasoning</h5>
                    <p>Understand how to balance flavors and use the right spices.</p>
                </div>
                <div class="card feature-card p-4 bg-light text-dark border-0 shadow-sm">
                    <h5 class="card-title">Meal Prepping</h5>
                    <p>Plan and prepare meals in advance to save time during the week.</p>
                </div>
            </div>

            <!-- Right Column (Embedded Video) -->
            <div class="col-lg-6 d-flex">
                <div class="w-100 h-100">
                    <iframe class="w-100 h-100"
                        src="https://www.youtube.com/embed/VB0Bqw4BSWc"
                        title="No Steamer? No problem! Do this!"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container text-center">
            <h2 class="mb-4">Ready to Transform Your Cooking?</h2>
            <p class="mb-4">Join thousands of happy users managing their meals effortlessly</p>
            <a href="/meal-plans/create" class="btn btn-light btn-lg px-5">
                Start Planning Now <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>RecipeMaster</h5>
                    <p>Making meal planning simple and enjoyable</p>
                </div>
                <div class="col-md-4">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light">About Us</a></li>
                        <li><a href="#" class="text-light">Contact</a></li>
                        <li><a href="#" class="text-light">Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Connect</h5>
                    <div class="social-links">
                        <a href="#" class="text-light me-3"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        <script>
    document.addEventListener("DOMContentLoaded", function() {
        var myModal = new bootstrap.Modal(document.getElementById('foodHealthModal'));
        myModal.show();
    });
</script>
        </script>



</body>
</html>