
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="tech, mobile, apps, electronacer">
    <meta name="author" content="Nacer">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="imgs/electric.png" type="image/x-icon">
    <title>ElectroNacer</title>
</head>
<body>
    <h1 class="text-center pt-3 text-white">ElectroNacer</h1>
    <form action="log.php" class=" brdr text-bg-dark" method="POST">
        <h2 class="text-">Bienvenue!</h2>
        <input class="bb ma bg-transparent border-0 txt mt-3" type="text" name="username" id="un" placeholder="Username" required>
        <input class="ma bg-transparent border-0 txt" type="password" name="pass" id="pw" placeholder="Password" required>
        <button class="px-0 w-25 ma btn btn-outline-warning">Login</button>
        <div>
            <input class="form-check-input" type="checkbox">
            <span class="text-white-50">Remember me</span>
        </div>
    </form>
</body>
</html>