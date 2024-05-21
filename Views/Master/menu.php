   <!-- Menu Start -->
    <div class="menu-container flex-grow-1">
        <ul id="menu" class="menu">
            <li>
                <a href="/tiket">
                    <i data-acorn-icon="shop" class="icon" data-acorn-size="18"></i>
                    <span class="label">Dashboard</span>
                </a>
            </li>
            <?php if($_SESSION['email'] == "admin@gmail.com") { ?>
            <li>
                <a href="../Bus/index.php">
                    <i data-acorn-icon="shop" class="icon" data-acorn-size="18"></i>
                    <span class="label">Bus</span>
                </a>
            </li>
             <li>
                <a href="../Transaksi/index.php">
                    <i data-acorn-icon="cart" class="icon" data-acorn-size="18"></i>
                    <span class="label">Transaksi</span>
                </a>
            </li>
            <?php } ?>
            <li>
                <a href="../Pesan/index.php">
                    <i data-acorn-icon="cart" class="icon" data-acorn-size="18"></i>
                    <span class="label">Pesan Tiket</span>
                </a>
            </li>
           <li>
                <a href="../Tiket/index.php">
                    <i data-acorn-icon="wallet" class="icon" data-acorn-size="18"></i>
                    <span class="label">Tiket Anda</span>
                </a>
            </li>
           
                    
        </ul>
    </div>
    <!-- Menu End -->