<style>
    /* Dropdown container */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown button */
    .dropbtn {
        font-size: 30px;
        background: none;
        color: #fff;
        border: none;
        cursor: pointer;
        padding-left: 180px;
    }

    /* Dropdown content (hidden by default) */
    .dropdown-content {
        display: none;
        border-radius: 5px;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        border-radius: 5px;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    /* Show the dropdown menu on button click */
    .show {
        display: block;
    }
</style>
<div class="dropdown">
    <button onclick="toggleDropdown()" class="dropbtn"><i class="fa-solid fa-bars"></i></button>
    <div id="myDropdown" class="dropdown-content">
        <a href="#link1">Profile</a>
        <a href="#link2">Help</a>
        <a href="\myweb\Jewellery-website\admin\settings_data.php">Settings</a>

        <?php
       @include('helper.php');


        if (is_loggged_in()) { ?>
            <a href="\myweb\Jewellery-website\admin\login\admin_logout.php">Sign Out</a> 
            <?php
        } else { ?>
             <a href="\myweb\Jewellery-website\admin\login\admin_login.php">Sign In</a>    
            <?php
        }


        ?>
        </a>
    </div>
    <script>function toggleDropdown() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.dropbtn') && !event.target.matches('.dropbtn *')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

    </script>
</div>