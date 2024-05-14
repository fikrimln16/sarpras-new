<div class="sidebar">
   <div class="header">Sarpras</div>
   <ul class="menu">
       <li class="submenu"><a class="menu-item" href="">Overview</a></li>
       <li class="submenu" id="asset_management"><a class="menu-item">Asset Management</a>
           <ul class="dropdown">
               <li><a href="">Bangunan</a></li>
               <li><a href="">Ruangan</a></li>
               <li><a href="">Sarana</a></li>
               <li><a href="">Penempatan Dosen</a></li>
           </ul>
       </li>
       {{-- <li class="submenu"><a class="menu-item">Analytics</a></li> --}}
   </ul>
</div>




<style>
   .menu-item {
       padding: 10px;
       border-radius: 12px;

   }
   .menu-item:hover {
       background-color: #171B2D;
   }
   ul li {
       list-style-type: none;
       margin-top: 20px;
   }

   a {
       text-decoration: none;
       color: white;
       width: 100%;
       display: flex;
   }

   .sidebar {
       width: 20%;
       height: 100%;
       background-color: #222943;
       color: #fff;
       overflow-y: auto;
       padding: 24px 16px;
       margin-right: 32px;
   }

   .header {
       text-align: center;
       font-size: larger;
   }

   .menu {
       list-style: none;
       padding: 0;
       margin: 0;
   }

   .submenu {
       cursor: pointer;
       transition: background-color 0.3s ease;
       padding: 5px;
   }


   .dropdown {
       display: none;
       padding: 0;
   }

   .sidebar .dropdown {
       display: none;
   }

   .dropdown li a {
       padding: 10px;
       border-radius: 12px;
   }

   .dropdown li a:hover {
       background-color: #171B2D;
   }

   h1 {
       color: #333;
   }

   .selected {
       background-color: #383F4F;
   }
</style>



<script>
   document.addEventListener("DOMContentLoaded", function() {
       var assetManagement = document.getElementById("asset_management");
       var dropdown = assetManagement.querySelector(".dropdown");

       assetManagement.addEventListener("click", function(e) {
           e.preventDefault(); // Menghentikan perilaku default dari link
           dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
       });

       // Menangani setiap item dropdown untuk mencegah menutup dropdown saat salah satu item diklik
       var dropdownItems = dropdown.querySelectorAll("li");
       dropdownItems.forEach(function(item) {
           item.addEventListener("click", function(e) {
               e.stopPropagation(); 
               dropdown.style.display = "block";
           });
           
       });

       // Menangani peristiwa klik di luar dropdown untuk menutup dropdown
       document.addEventListener("click", function(e) {
           if (!assetManagement.contains(e.target)) {
               dropdown.style.display = "none";
           }
       });
   });
</script>
