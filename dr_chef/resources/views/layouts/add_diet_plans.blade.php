<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Title Page-->
<title>ADD Diet Plan</title>

<!-- Icons font CSS-->
<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
<link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

<!-- Font special for pages-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

<!-- Vendor CSS-->
<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">

{{-- Favicon --}}
<link rel="icon" type="image/png" href="images/favicon.png">

<link href="{{ asset('css/add_diet_plan.css') }}" rel="stylesheet" media="all">
<link rel="stylesheet" href="{{ asset('css/navbar.css') }}" media="all">
<link rel="stylesheet" href="{{ asset('css/footer.css') }}">

<body>
    {{-- Navbar Code Block Start --}}
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dietitian/portal') }}">
                <img src="/images/logo.png" alt="Logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav d-flex align-items-center"">
                    <li class="nav-item">
                        <a class="nav-link px-3 active" href="{{ route('dietitian/portal') }}">Portal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="{{ route('dietitian/recipes/display') }}">Recipes</a>
                    </li>
                    @php
                        $dttnLoginData = session('dietitian_login_data');
                        $dttnProfilePic = $dttnLoginData['dietitian_profile_pic'];
                    @endphp
                    <li class="nav-item dropdown disable-hover">
                        <a class="nav-link px-3 dropdown-toggle" href="#" id="contact-dropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="circular-image">
                                <img src="{{ asset('/images/dietitian_profile_images/' . $dttnProfilePic) }}"
                                    alt="Profile Picture" class="profile-picture">
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('dietitian/profile/setting') }}">Profile</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('dlogout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- Navbar Code Block End --}}
    <br><br>

    <form method="post" action="{{ route('add_diet_plan') }}" enctype="multipart/form-data"
        style="margin-bottom: 200px">
        @csrf
        <div class="container">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-6" style="background-color: #EBD7CC; border-radius: 15px;">
                        <div class="p-3">
                            <h2 class="mb-5 text-center text-dark">Add Diet Plan</h2>
                            <div class="mb-4 pb-2">
                                <label style="font-weight:bold; font-size:14px" for="">Diet Plan Duration
                                    (Days)</label>
                                <input type="number" placeholder="Plan Duration" class="form-control border-0"
                                    name="diet_plan_duration"
                                    value="{{ old('diet_plan_duration', $data['diet_plan_duration'] ?? '') }}">
                                @error('diet_plan_duration')
                                    <label style="color: red; ">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="mb-4 pb-2">
                                <label style="font-weight:bold; font-size:14px" for="">Compatible For</label>
                                <select required placeholder="Recipe Category" class="form-control border-0"
                                    name="diet_plan_user_type">
                                    <option value=""
                                        {{ old('diet_plan_user_type', $data['diet_plan_user_type'] ?? '') == '' ? 'selected' : '' }}
                                        selected disabled>Compatible For</option>
                                    <option value="healthy person"
                                        {{ old('diet_plan_user_type', $data['diet_plan_user_type'] ?? '') == 'healthy person' ? 'selected' : '' }}>
                                        Healthy Person</option>
                                    <option value="diabetic patient"
                                        {{ old('diet_plan_user_type', $data['diet_plan_user_type'] ?? '') == 'diabetic patient' ? 'selected' : '' }}>
                                        Diabetic Patient</option>
                                    <option value="cardiac patient"
                                        {{ old('diet_plan_user_type', $data['diet_plan_user_type'] ?? '') == 'cardiac patient' ? 'selected' : '' }}>
                                        Cardiac Patient</option>
                                    <option value="blood pressure patient"
                                        {{ old('diet_plan_user_type', $data['diet_plan_user_type'] ?? '') == 'blood pressure patient' ? 'selected' : '' }}>
                                        Blood Pressure Patient</option>
                                </select>
                                @error('diet_plan_user_type')
                                    <label style="color: red; ">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="mb-4 pb-2">
                                <label style="font-weight:bold; font-size:14px" for="">Diet Plan Type</label>
                                <select required name="diet_plan_type" class="form-control border-0">
                                    <option value="" selected disabled hidden>Select Diet Plan Type</option>
                                    <option value="gain weight"
                                        {{ old('diet_plan_type', $data['diet_plan_type'] ?? '') == 'gain weight' ? 'selected' : '' }}>
                                        Gain Weight</option>
                                    <option value="lose weight"
                                        {{ old('diet_plan_type', $data['diet_plan_type'] ?? '') == 'lose weight' ? 'selected' : '' }}>
                                        Lose Weight</option>
                                </select>
                                @error('diet_plan_type')
                                    <label style="color: red; ">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="mb-4 pb-2">
                                <label style="font-weight:bold; font-size:14px" for="">Weight Goal
                                    (Kg)</label>
                                <input type="text" class="form-control border-0"
                                    placeholder="Enter Weight Goal (Kg)" name="diet_plan_weight_goal"
                                    value="{{ old('diet_plan_weight_goal', $data['diet_plan_weight_goal'] ?? '') }}">
                                @error('diet_plan_weight_goal')
                                    <label style="color: red; ">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="mb-4 pb-2">
                                <label style="font-weight:bold; font-size:14px" for="">Upload Diet Plan
                                    (PDF)</label>
                                <input type="file" placeholder="Upload Diet Plan (PDF)"
                                    class="form-control border-0" name="diet_plan_meals" accept="application/pdf"
                                    value="{{ old('diet_plan_meals', $data['diet_plan_meals'] ?? '') }}">
                                @error('diet_plan_meals')
                                    <label style="color: red; ">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="text-center mb-4 pb-2">
                                <button type="submit" class="text-center btn btn--brown w-5"
                                    data-mdb-ripple-color="dark">Add Diet Plan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- Footer Code Block Start --}}
    <footer>
        <div class="container padding-t">
            <div class="row">
                <div class="col-lg-6" style="margin-right: 100px">
                    <h3 style="font-weight: bold">Dr. Chef</h3>
                    <ul class="list-unstyled">
                        <li class="justify-col1">Our website provides a platform where chefs and dietitians can share
                            their delicious recipes
                            and effective diet plans. People can browse through our extensive collection of recipes and
                            diet plans, and even track their daily calorie intake for a healthier lifestyle. Join us
                            today and start your journey towards a healthier you!</li>
                    </ul>
                </div>
                <div class="col pd-top">
                    <h5>Explore</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('calorietracker/today') }}">Calorie Tracker</a></li><br>
                        <li><a href="{{ route('display_diet_plans') }}">Diet Plans</a></li><br>
                        <li><a href="{{ route('recipes/display') }}">Recipes</a></li>
                    </ul>
                </div>
                <div class="col pd-top">
                    <h5>Useful Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('index') }}">Home</a></li><br>
                        <li><a href="{{ route('chefs/signupform') }}">Share Recipes</a></li><br>
                        <li><a href="{{ route('dietitians/signupform') }}">Share Diet Plans</a></li>
                    </ul>
                </div>
                <div class="col pd-top">
                    <h5>Social</h5>
                    <ul class="list-unstyled">
                        <li><a href="https://www.facebook.com/profile.php?id=100092157263113&mibextid=ZbWKwL"><span
                                    class="material-icons"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-facebook"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                    </svg></span></li>
                        <li><a href="https://instagram.com/dr.chef25?igshid=MmJiY2I4NDBkZg== "><span
                                    class="material-icons">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                    </svg>
                                </span></li>
                        <li><a href="https://twitter.com/drchef25?t=48c6X2FSeFi7UQ-PaWr5Zw&s=08 "><span
                                    class="material-icons">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                        <path
                                            d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                    </svg>
                                </span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="text-center py-3">
            <hr>
            Copyright &copy;2023 Dr. Chef
        </div>

    </footer>
    {{-- Footer Code Block End --}}
</body>

</html>