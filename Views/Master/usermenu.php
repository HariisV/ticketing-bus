<?php
session_start();
?>
<div class="user-container d-flex">
        <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="profile" alt="profile" src="../../Public/img/profile/profile-1.webp" />
            <div class="name">
                <?php echo $_SESSION["email"] ?>
                </div>
            </a>
        <div class="dropdown-menu dropdown-menu-end user-menu wide">
            <div class="row mb-1 ms-0 me-0">
              
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <form action="/Api/AuthApi/logoutApi.php" method="post">
                                <button type="submit" class="w-100 btn btn-primary">LOGOUT</button>
                            </form>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>