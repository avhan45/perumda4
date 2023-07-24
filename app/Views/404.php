<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #1a1a1a;
            overflow: hidden;
        }

        .container {
            position: relative;
            width: 100%;
            height: 100vh;
        }

        .moon {
            position: absolute;
            top: 15%;
            left: 50%;
            width: 120px;
            height: 120px;
            border: 4px solid #d4d4d4;
            border-radius: 50%;
            background-color: #1a1a1a;
        }

        .moon__crater {
            position: absolute;
            background-color: #d4d4d4;
            border-radius: 50%;
        }

        .moon__crater1 {
            top: 15%;
            left: 10%;
            width: 25px;
            height: 40px;
        }

        .moon__crater2 {
            top: 40%;
            right: 10%;
            width: 35px;
            height: 60px;
        }

        .moon__crater3 {
            bottom: 30%;
            left: 50%;
            width: 20px;
            height: 35px;
        }

        .star {
            position: absolute;
            background-color: #fff;
            border-radius: 50%;
        }

        .star1 {
            top: 10%;
            left: 15%;
            width: 5px;
            height: 5px;
        }

        .star2 {
            top: 20%;
            right: 10%;
            width: 7px;
            height: 7px;
        }

        .star3 {
            top: 25%;
            left: 5%;
            width: 4px;
            height: 4px;
        }

        .star4 {
            bottom: 15%;
            right: 5%;
            width: 6px;
            height: 6px;
        }

        .star5 {
            bottom: 30%;
            left: 10%;
            width: 8px;
            height: 8px;
        }

        .error {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
        }

        .error__title {
            font-size: 8rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .error__subtitle {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .error__button {
            display: inline-block;
            padding: 10px 20px;
            border: 2px solid #fff;
            border-radius: 5px;
            background-color: transparent;
            color: #fff;
            font-size: 1.2rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .error__button:hover {
            background-color: #fff;
            color: #1a1a1a;
        }

        @media (max-width: 768px) {
            .error__title {
                font-size: 6rem;
            }

            .error__subtitle {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="moon"></div>
        <div class="moon__crater moon__crater1"></div>
        <div class="moon__crater moon__crater2"></div>
        <div class="moon__crater moon__crater3"></div>

        <div class="star star1"></div>
        <div class="star star2"></div>
        <div class="star star3"></div>
        <div class="star star4"></div>
        <div class="star star5"></div>

        <div class="error">
            <div class="error__title">404</div>
            <div class="error__subtitle">Oops! Page not found</div>
            <a class="error__button" href="/">Back to Home</a>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>