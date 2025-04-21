<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Meal Planning</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for search icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .meal-card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s ease-in-out;
        }

        .meal-card:hover {
            transform: translateY(-5px);
        }

        .meal-image {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            height: 200px;
            object-fit: cover;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 0.95rem;
            color: #555;
        }

        .btn-meal {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .btn-meal:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <!-- Search Section -->
    <div class="container py-4">
        <div class="text-center mb-4">
            <h2>Search for Any Meal</h2>
            <p>Discover new recipes online</p>
        </div>
        <form action="https://www.allrecipes.com/search/results/" method="GET" target="_blank" class="d-flex justify-content-center">
            <input type="text" name="search" class="form-control w-50 me-2" placeholder="Search thousands of recipes..." required>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-search"></i> Search
            </button>
        </form>
    </div>

    <!-- Meal Cards Section -->
    <div class="container py-5">
        <h1 class="text-center mb-4">Healthy Meal Plans</h1>
        <div class="row g-4">
            <!-- Meal Card 1 -->
            <div class="col-md-4">
                <div class="card meal-card">
                    <img src="{{ asset('images/breakfast.jpg') }}" class="card-img-top meal-image" alt="Breakfast">
                    <div class="card-body">
                        <h5 class="card-title">Healthy Breakfast</h5>
                        <p class="card-text">Start your day right with oatmeal, fruits, and nuts.</p>
                        <a href="{{ route('recipes.breakfast') }}" class="btn btn-meal w-100">View Recipes</a>
                    </div>
                </div>
            </div>

            <!-- Meal Card 2 -->
            <div class="col-md-4">
                <div class="card meal-card">
                    <img src="{{ asset('images/lunch.jpg') }}" class="card-img-top meal-image" alt="Lunch">
                    <div class="card-body">
                        <h5 class="card-title">Nutritious Lunch</h5>
                        <p class="card-text">Power up with grilled chicken, veggies, and rice.</p>
                        <a href="{{ route('recipes.lunch') }}" class="btn btn-meal w-100">View Recipes</a>
                    </div>
                </div>
            </div>

            <!-- Meal Card 3 -->
            <div class="col-md-4">
                <div class="card meal-card">
                    <img src="{{ asset('images/dinner.jpg') }}" class="card-img-top meal-image" alt="Dinner">
                    <div class="card-body">
                        <h5 class="card-title">Light Dinner</h5>
                        <p class="card-text">End your day with soup, salad, and whole grain bread.</p>
                        <a href="{{ route('recipes.dinner') }}" class="btn btn-meal w-100">View Recipes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container mb-4">
    <form action="{{ route('meal.ai') }}" method="GET" target="_blank" class="d-flex justify-content-center">
        <input type="text" name="search" class="form-control w-50 me-2" placeholder="Search any meal (e.g., Pasta)" required>
        <button type="submit" class="btn btn-success">AI Recipe</button>
    </form>
</div>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
