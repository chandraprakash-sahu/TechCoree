<?php
    session_start();
    include "Conn.php";
    if($_SERVER["REQUEST_METHOD"]=="POST"){

      $email=$_SESSION['email'];
      $user=$_SESSION['username'];
  $processor = $_POST['processor'];
$motherboard = $_POST['motherboard'];
$ram = $_POST['ram'];
$ssd = $_POST['ssd'];
$gpu = $_POST['gpu'];
$psu = $_POST['psu'];
$mouse = $_POST['mouse'];
$keyboard = $_POST['keyboard'];
$address = $_POST['address'];

// Insert into table
$sql = "INSERT INTO pc_build_details (email,username,processor, motherboard, ram, ssd, gpu, psu, mouse, keyboard, address)
        VALUES ('$email','$user','$processor', '$motherboard', '$ram', '$ssd', '$gpu', '$psu', '$mouse', '$keyboard', '$address')";

if ($conn->query($sql) === TRUE) {
  echo "<script>
  alert('✅ Your PC build details have been saved successfully!');
  window.location.href = 'index.php';
  </script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Custom PC Builder</title>
  <link rel="stylesheet" href="css/style.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="icons/css/all.min.css">
  <link rel="icon" type="image/png" href="img/TC logo.png">
</head>
<body class="body-01">
  <div class="conntainer">
    <a onclick="history.back()"><i class="fa-solid fa-arrow-left"></i></a>
    <header class="header-01">
      <h1><i class="fas fa-tools"></i> Build Your Custom PC</h1>
      <p>Choose compatible components and see your build come to life.</p>
    </header>

    <main class="builder-section">
      <div class="form-section">

        <!-- Wrap in form -->
        <form action="" method="POST">

          <div class="component">
            <label class="label-01"><i class="fas fa-microchip"></i> Processor:</label>
            <img src="images/i5.png" class="product-img" alt="Processor" />
            <input class="input-01" list="processors" name="processor" required placeholder="Select a processor" />
            <datalist id="processors">
              <option value="Intel i5 12400F">6 Cores / 12 Threads</option>
              <option value="Intel i7 13700K">16 Cores / P+E Architecture</option>
              <option value="AMD Ryzen 5 5600">Budget powerhouse</option>
              <option value="AMD Ryzen 7 5800X">High-end AM4 CPU</option>
            </datalist>
          </div>

          <div class="component">
            <label class="label-01"><i class="fas fa-motherboard"></i> Motherboard:</label>
            <img src="images/motherboard.png" class="product-img" alt="Motherboard" />
            <input class="input-01" list="motherboards" name="motherboard" required placeholder="Compatible Motherboard" />
            <datalist id="motherboards">
              <option value="B660M DDR4">Intel 12th Gen</option>
              <option value="Z790 Aorus Elite">Intel High-End</option>
              <option value="B550M DS3H">AMD Ryzen 5000</option>
              <option value="X570 Tomahawk">AMD High-End</option>
            </datalist>
          </div>

          <div class="component">
            <label class="label-01"><i class="fas fa-memory"></i> RAM:</label>
            <img src="images/ram.png" class="product-img" alt="RAM" />
            <input class="input-01" list="rams" name="ram" required />
            <datalist id="rams">
              <option value="16GB DDR4 3200MHz">Budget choice</option>
              <option value="32GB DDR5 6000MHz">High-performance</option>
            </datalist>
          </div>

          <div class="component">
            <label class="label-01"><i class="fas fa-hdd"></i> SSD:</label>
            <img src="images/ssd.png" class="product-img" alt="SSD" />
            <input class="input-01" list="ssds" name="ssd" required />
            <datalist id="ssds">
              <option value="512GB NVMe">Fast boot & gaming</option>
              <option value="1TB SATA">Value storage</option>
            </datalist>
          </div>

          <div class="component">
            <label class="label-01"><i class="fas fa-video"></i> GPU:</label>
            <img src="images/rtx4060.png" class="product-img" alt="GPU" />
            <input class="input-01" list="gpus" name="gpu" />
            <datalist id="gpus">
              <option value="RTX 4060 8GB">Great 1080p card</option>
              <option value="RX 6750XT 12GB">Best 1440p value</option>
            </datalist>
          </div>

          <div class="component">
            <label class="label-01"><i class="fas fa-plug"></i> Power Supply:</label>
            <img src="images/psu.png" class="product-img" alt="PSU" />
            <input class="input-01" list="psus" name="psu" required />
            <datalist id="psus">
              <option value="650W Bronze">Basic builds</option>
              <option value="750W Gold Modular">Future-proof</option>
            </datalist>
          </div>

          <div class="component">
            <label class="label-01"><i class="fas fa-mouse"></i> Mouse:</label>
            <img src="images/mouse.png" class="product-img" alt="Mouse" />
            <input class="input-01" list="mice" name="mouse" />
            <datalist id="mice">
              <option value="Logitech G203">Budget RGB</option>
              <option value="Razer Viper Mini">Lightweight gaming</option>
            </datalist>
          </div>

          <div class="component">
            <label class="label-01"><i class="fas fa-keyboard"></i> Keyboard:</label>
            <img src="images/keyboard.png" class="product-img" alt="Keyboard" />
            <input class="input-01" list="keyboards" name="keyboard" />
            <datalist id="keyboards">
              <option value="Red Switch Mechanical">Great for gaming</option>
              <option value="Logitech G213">Silent, durable</option>
            </datalist>
          </div>

          <!-- Address field -->
          <div class="component">
            <label class="label-01"><i class="fas fa-home"></i> Delivery Address:</label>
            <textarea class="input-01" name="address" required placeholder="Enter your full address"></textarea>
          </div>

          <button class="btnn-01" type="submit">Submit Your Build</button>
        </form>
      </div>

      <div class="summary">
        <h2>🧾 Build Summary</h2>
        <div id="summaryBox">Your selected components will appear here.</div>
      </div>
    </main>

    <footer class="footer-01">
      <p>💻 Custom PC Builder by YOU · 2025</p>
    </footer>
  </div>

  <script src="JS/script.js"></script>
</body>
</html>
