<!-- <div class="sidebar">
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
</div> -->


<div class="sidebar">
    <div class="datetime">14/5/2024 - 10.56.19</div>
    <div class="welcome">
        Selamat datang, AAN KOMARIAH<br>
        Unit Sarpras PT Universitas<br>
        Pendidikan Indonesia
    </div>
    <div class="menu-item" id="manajemenAset">Manajemen Aset</div>
    <div class="submenu" id="submenu">
        <div class="menu-item">Prasarana</div>
        <div class="menu-item">Sarana</div>
        <div class="menu-item">Inventaris</div>
    </div>
</div>

<style>
    .sidebar {
        width: 300px;
        height: 100vh;
        background-color: #304250;
        padding: 20px;
        color: white;
        box-sizing: border-box;
    }

    .sidebar .datetime {
        font-size: 20px;
        color: #DDD;
    }

    .sidebar .welcome {
        margin-top: 20px;
        font-size: 18px;
        line-height: 1.4;
    }

    .menu-item {
        margin-top: 20px;
        padding: 10px;
        background-color: #444;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .menu-item:hover {
        background-color: #555;
    }

    .submenu {
        display: none;
        margin-left: 20px;
    }

    .submenu .menu-item {
        background-color: #555;
    }

    .submenu .menu-item:hover {
        background-color: #666;
    }
</style>

<!-- <style>
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
</style> -->



<script>
    document.getElementById('manajemenAset').addEventListener('click', function() {
        var submenu = document.getElementById('submenu');
        if (submenu.style.display === 'none' || submenu.style.display === '') {
            submenu.style.display = 'block';
        } else {
            submenu.style.display = 'none';
        }
    });
</script>