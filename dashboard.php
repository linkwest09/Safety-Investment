<?php
session_start();

// Simulated logged-in user info (replace this with real DB user fetch)
$_SESSION['user'] = "fred lott"; // for demo
$user = $_SESSION['user'];
$balance = "₦0.00"; // you can later fetch this dynamically
$btc_wallet = "bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh"; // Example BTC wallet
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - Safety Investment</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <style>
    /* Your main styles here */
    
    /* ============================
       Mobile Top Navbar Styles
       ============================ */
    @media (max-width: 768px) {
      .header {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
      }

      .logo {
        height: 60px;
        margin-bottom: 0;
      }

      .nav-toggle {
        display: block;
        background: none;
        border: none;
        font-size: 2rem;
        cursor: pointer;
      }

      .nav-links {
        display: none;
        flex-direction: column;
        background-color: #ffffff;
        width: 100%;
        position: absolute;
        top: 70px;
        left: 0;
        border-top: 1px solid #eee;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        z-index: 10;
      }

      .nav-links.show {
        display: flex;
      }

      .nav-links a {
        padding: 1rem;
        text-align: center;
        color: #d00000;
        text-decoration: none;
        border-bottom: 1px solid #f0f0f0;
      }

      .container {
        width: 95%;
      }
    }
  </style>
</head>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fc;
      color: #333;
    }
    header {
      background-color: #ffffff;
      padding: 20px;
      text-align: center;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }
    .container {
      width: 90%;
      max-width: 800px;
      margin: 20px auto;
      background: #fff;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.03);
    }
    .balance-section {
      text-align: center;
      margin-bottom: 20px;
    }
    .balance-section h2 {
      font-size: 18px;
      color: #666;
    }
    .balance-section p {
      font-size: 32px;
      margin: 10px 0;
      color: #111;
    }
    .btn {
      background-color: #7c3aed;
      color: #fff;
      padding: 10px 20px;
      margin: 5px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      font-size: 14px;
    }
    .btn.copy {
      background-color: #10b981;
    }
    .section {
      margin-bottom: 25px;
    }
    .wallet-address {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: #f1f5f9;
      padding: 10px;
      border-radius: 8px;
      margin-top: 10px;
    }
    .investment-plan, .notification {
      background: #f9fafb;
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 10px;
      border-left: 5px solid #7c3aed;
    }
  </style>
  <script>
    function copyWallet() {
      const wallet = document.getElementById("btcWallet").textContent;
      navigator.clipboard.writeText(wallet);
      alert("Wallet address copied!");
    }
  </script>
</head>
<body>

<header>
  <h1>Welcome, <?= htmlspecialchars($user) ?> 👋</h1>
  <p>Let's make investments and grow your crypto!</p>
</header>

<div class="container">
  <div class="balance-section">
    <h2>Available Balance</h2>
    <p><?= $balance ?></p>
    <button class="btn">Transaction History</button>
    <button class="btn">Add Money</button>
  </div>

  <div class="section">
    <h3>Deposit via Bitcoin</h3>
    <p>Send BTC to this wallet address:</p>
    <div class="wallet-address">
      <span id="btcWallet"><?= $btc_wallet ?></span>
      <button class="btn copy" onclick="copyWallet()">Copy</button>
    </div>
  </div>

  <div class="section">
    <h3>Actions</h3>
    <button class="btn">Deposit</button>
    <button class="btn">Withdraw</button>
  </div>

  <div class="section">
    <h3>Investment Plans</h3>
    <div class="investment-plan">
      <strong>Starter Plan:</strong> ₦10,000 - ₦49,999 @ 10% ROI in 7 days
    </div>
    <div class="investment-plan">
      <strong>Pro Plan:</strong> ₦50,000 - ₦199,999 @ 15% ROI in 10 days
    </div>
    <div class="investment-plan">
      <strong>Elite Plan:</strong> ₦200,000+ @ 20% ROI in 15 days
    </div>
  </div>

  <div class="section">
    <h3>Notifications</h3>
    <div class="notification">
      🎉 You have ₦400 trial bonus waiting to be claimed!
    </div>
    <div class="notification">
      📢 New Investment Plan launching soon. Stay tuned!
    </div>
  </div>

  <div class="section">
    <h3>Profile Info</h3>
    <p><strong>Name:</strong> <?= htmlspecialchars($user) ?></p>
    <p><strong>Account Type:</strong> Crypto Investor</p>
    <p><strong>Status:</strong> Active</p>
  </div>

  <a href="logout.php" class="btn" style="background:#ef4444;">Logout</a>
</div>
<script>
  function toggleMenu() {
    const menu = document.getElementById('mobileMenu');
    menu.classList.toggle('show');
  }
</script>
</body>
</html>
