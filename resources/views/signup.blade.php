<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            padding: 30px;
            max-width: 450px;
            width: 100%;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-custom {
            background: #ff4b5c;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            padding: 10px;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background: #ff1e42;
        }
        .text-custom {
            color: #ff4b5c;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center text-custom fw-bold">Create an Account</h3>
                    <form action="{{ url('signup') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label fw-semibold">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="+1234567890" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
                        </div>
                        <button type="submit" class="btn btn-custom w-100">Sign Up</button>
                    </form>
                    <p class="text-center mt-3">Already have an account? <a href="{{ url('login') }}" class="text-custom fw-bold">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
