    <header>
        <nav class="navbar navbar-expand-lg navbar-light  bg-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="/Horticulture/Shop/imgs/Icon.png" alt="Bootstrap" style="height: 60px;">
                </a>
                <button class=" navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ">Disabled</a>
                        </li>
                        <div class="search-bar">
                            <div class="searchresult">
                                <i class="fa fa-search"> </i>
                                <input type="text" id="item-search" name="" placeholder="Searching ...">
                            </div>

                            <div class="product-list">


                            </div>

                        </div>




                    </ul>
                    <?php
                      
                        if(isset($_SESSION['UserName']) && isset($_SESSION['UserImg'])!= 'Not Set'){
                        
                                echo '<div class="userpartation"> <div class="img-circle text-center mb-3">
                 
                                    <img class="shadow" id="profileimg"
                                        src="data:image/jpg;charset=utf8;base64,'.base64_encode($_SESSION['UserImg']).'" alt="image" />
                                </div>
                                <!-- <i class="fa-solid fa-gear fa-xl dropdown-toggle" -->
                                <i class="fa-solid fa-cart-plus fa-2xl" id="cart" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                                <div class="btn-group dropstart dropdown-left">
                                    <i class="fa-solid fa-gear fa-2xl" data-bs-toggle="dropdown" aria-expanded="false">
                                    </i>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/Horticulture/account-settings/index.php">Account Setting</a>
                                        </li>
                                        <li><a class="dropdown-item" href="/Horticulture/LoginSystem/includes/logout.inc.php">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div> ';
                            

                      }else if(isset($_SESSION['UserImg'])== 'Not Set'){
        
                        
                                echo '<div class="userpartation"> <div class="img-circle text-center mb-3">
                 
                                    <img class="shadow" id="profileimg"
                                        src="/Horticulture/Shop/imgs/default.png" alt="image" />
                                </div>
                                <!-- <i class="fa-solid fa-gear fa-xl dropdown-toggle" -->
                                <i class="fa-solid fa-cart-plus fa-2xl" id="cart" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                                <div class="btn-group dropstart dropdown-left">
                                    <i class="fa-solid fa-gear fa-2xl" data-bs-toggle="dropdown" aria-expanded="false">
                                    </i>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/Horticulture/account-settings/index.php">Account Setting</a>
                                        </li>
                                        <li><a class="dropdown-item" href="/Horticulture/LoginSystem/includes/logout.inc.php">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div> ';
                
        }
        else{


        echo '
        <a href="/Horticulture/signup.php"><button type="button" class="btn btn-light">Sign in</button></a>
        <a href="/Horticulture/login.php" class="header-login-a"> <button type="button"
                class="btn btn-light">Login</button></a>';
        }
        ?>




                </div>
            </div>
        </nav>


    </header>