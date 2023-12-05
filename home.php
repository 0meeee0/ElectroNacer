<?php
include 'log.php';

$servername = "localhost";
    $username = "root";
    $password = "123";
    $dbname = "electronacer";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn === false) {
    die("Error: " . mysqli_connect_error());
}

// Fetch categories from the database
$categoriesResult = $conn->query("SELECT DISTINCT categorie FROM produits");

// Fetch products based on the selected category filter
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : null;

$stockFilter = isset($_GET['stock']) && $_GET['stock'] === 'low' ? true : false;

if ($categoryFilter) {
   
    $categoryString = "'" . implode("','", $categoryFilter) . "'";


    $sql = "SELECT * FROM produits WHERE categorie IN ($categoryString)";
    
  
    if ($stockFilter) {
        $sql .= " AND quantite_stock <= quantite_min";
    }
    
    $result = $conn->query($sql);
} else {
    
    $result = $conn->query("SELECT * FROM produits");

    
    if ($stockFilter) {
        $result = $conn->query("SELECT * FROM produits WHERE quantite_stock <= quantite_min");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imgs/electric.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Home | ElectroNacer</title>
</head>
<body>
    <nav style="background: yellow;">
        <div id="divlwl" style="display: flex; justify-content: space-around;">
            <h1 id="hedr"><u>ElectroNacer</u></h1>
            <div style="display: flex;">
                <h4 style="padding-top: .7rem;">Welcome <b><?php echo $_SESSION['id']?></b></h4>
                <a style="padding-top: 1rem; padding-left: 1rem;" href="index.php"><i class="fa fa-sign-out" style="font-size:24px"></i></a>
            </div>
        </div>

    </nav>
    <div class="container mt-4">
        <form action="" method="get" class="col mt-4 justify-content-center">
        <h1>Categories:</h1>
        <?php
        // Display checkboxes for each category
        while ($row = $categoriesResult->fetch_assoc()) {
            $categoryName = $row['categorie'];
            ?>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="category[]" value="<?php echo $categoryName; ?>" <?php if (is_array($categoryFilter) && in_array($categoryName, $categoryFilter)) echo 'checked'; ?>>
                <label class="form-check-label"><?php echo $categoryName; ?></label>
            </div>
            <?php
        }
        ?>
         <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="stock" value="low" <?php if ($stockFilter) echo 'checked'; ?>>
            <label class="form-check-label">repture</label>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Filter</button>
    </form>

    <div class="row my-5">
        <?php
        // Display products based on the filter
        while ($item = $result->fetch_assoc()) {
            ?>
            <div class="col-md-3 mb-5">
                <div class="card">
                    <img src="<?php echo $item['image_url']; ?>" class="card-img-top" alt="<?php echo $item['libelle']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item['libelle']; ?></h5>
                        <p class="card-text">
                            Reference: <?php echo $item['reference']; ?><br>
                            Price: <?php echo $item['unit_price']; ?><br>
                            Stock: <?php echo $item['quantite_stock']; ?><br>
                            Category: <?php echo $item['categorie']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

    <?php
        
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>