// Dark light version
const themeCookieName = 'theme'
const themeDark = 'dark'
const themeLight = 'light'

const body = document.getElementsByTagName('body')[0]

function setCookie(cname, cvalue, exdays) {
    var d = new Date()
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000))
    var expires = "expires=" + d.toUTCString()
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/"
}

function getCookie(cname) {
    var name = cname + "="
    var ca = document.cookie.split(';')
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1)
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length)
        }
    }
    return ""
}

loadTheme()

function loadTheme() {
    var theme = getCookie(themeCookieName)
    body.classList.add(theme === "" ? themeLight : theme)
}

function switchTheme() {

    if (body.classList.contains(themeLight)) {
        body.classList.remove(themeLight)
        body.classList.add(themeDark)
        setCookie(themeCookieName, themeDark)

    } else {
        body.classList.remove(themeDark)
        body.classList.add(themeLight)
        setCookie(themeCookieName, themeLight)
    }
}

// Sidebar Menu

document.querySelectorAll('.sidebar-submenu').forEach(e => {
    e.querySelector('.sidebar-menu-dropdown').onclick = (event) => {
        event.preventDefault()
        e.querySelector('.sidebar-menu-dropdown .dropdown-icon').classList.toggle('active')

        let dropdown_content = e.querySelector('.sidebar-menu-dropdown-content')
        let dropdown_content_lis = dropdown_content.querySelectorAll('li')

        let active_height = dropdown_content_lis[0].clientHeight * dropdown_content_lis.length

        dropdown_content.classList.toggle('active')

        dropdown_content.style.height = dropdown_content.classList.contains('active') ? active_height + 'px' : '0'
    }
})


let overlay = document.querySelector('.overlay')
let sidebar = document.querySelector('.sidebar')
let sidebar_expand = document.querySelector('.sidebar-expand')

document.querySelector('#mobile-toggle').onclick = () => {

    sidebar_expand.classList.toggle('active')
    overlay.classList.toggle('active')
}

document.querySelector('#sidebar-close').onclick = () => {

    sidebar_expand.classList.toggle('active')
    overlay.classList.toggle('active')
}

document.addEventListener("DOMContentLoaded", () => {
    // Ambil URL halaman saat ini
    const currentUrl = window.location.href;

    // Cari semua link di sidebar
    const menuLinks = document.querySelectorAll(".sidebar-menu li a");

    // Loop untuk mencocokkan URL dan menambahkan class active
    menuLinks.forEach(link => {
        if (link.href === currentUrl) {
            link.classList.add("active");
        } else {
            link.classList.remove("active");
        }
    });
});

// Pegawai Edit Jadwal
document.addEventListener("DOMContentLoaded", function () {
    // Pilih elemen yang diperlukan
    const pilihPoli = document.getElementById("PilihPoli");
    const pilihDokter = document.getElementById("PilihDokter");
    const editJadwal = document.getElementById("EditJadwal");

    const poliBoxes = document.querySelectorAll(".custom-box");
    const backButton = document.getElementById("backButton");
    const backToDokterButton = document.getElementById("backToDokterButton");
    const editJadwalButton = document.querySelector(".gr-btn .btn"); // Tombol Edit Jadwal

    // ✅ Klik Poli → Tampilkan Pilih Dokter
    poliBoxes.forEach(box => {
        box.addEventListener("click", function () {
            pilihPoli.style.display = "none";
            pilihDokter.style.display = "block";
        });
    });

    // ✅ Klik Kembali di Pilih Dokter → Kembali ke Pilih Poli
    backButton.addEventListener("click", function () {
        pilihDokter.style.display = "none";
        pilihPoli.style.display = "block";
    });

    // ✅ Klik Edit Jadwal → Buka Halaman Edit Jadwal
    editJadwalButton.addEventListener("click", function () {
        pilihDokter.style.display = "none";
        editJadwal.style.display = "block";
    });

    // ✅ Klik Kembali di Edit Jadwal → Kembali ke Pilih Dokter
    backToDokterButton.addEventListener("click", function () {
        editJadwal.style.display = "none";
        pilihDokter.style.display = "block";
    });
});

// Event listener untuk memilih Poli
const poliItems = document.querySelectorAll(".custom-box");
poliItems.forEach(item => {
    item.addEventListener('click', function () {
        // Menyembunyikan Pilih Poli dan Menampilkan Pilih Dokter
        pilihPoli.style.display = 'none';
        pilihDokter.style.display = 'block';

        // Menyesuaikan judul berdasarkan Poli yang dipilih
        const poliName = item.querySelector('h3').innerText;
        document.querySelector('.main-title').innerText = `Edit Jadwal - ${poliName}`;
    });
});

// Event listener untuk kembali ke Pilih Poli
backButton.addEventListener('click', function () {
    // Menampilkan Pilih Poli dan Menyembunyikan Pilih Dokter
    pilihPoli.style.display = 'block';
    pilihDokter.style.display = 'none';

    // Reset judul kembali ke "Edit Jadwal"
    document.querySelector('.main-title').innerText = 'Edit Jadwal';
});


document.addEventListener("DOMContentLoaded", function () {
    let days = document.querySelectorAll(".day");
    let times = document.querySelectorAll(".time");

    let schedule = {};

    // Debugging: Periksa apakah elemen times terdeteksi
    console.log("Times:", times);

    times.forEach(time => {
        let day = time.getAttribute("data-day");
        let timeText = time.textContent.trim();
        
        console.log(`Day: ${day}, Time: "${timeText}"`); // Debugging

        // Jika ada jam praktek, tandai sebagai true
        if (timeText !== "") {
            schedule[day] = true;
        }
    });

    console.log("Schedule:", schedule); // Debugging

    days.forEach(day => {
        let dayName = day.getAttribute("data-day");
        
        console.log(`Checking ${dayName}:`, schedule[dayName]); // Debugging

        if (schedule[dayName]) {
            day.style.backgroundColor = "rgba(22, 120, 242, 0.2)";
            day.style.color = "#000";
            day.style.pointerEvents = "auto";
        } else {
            day.style.backgroundColor = "#ccc";
            day.style.color = "white";
            day.style.pointerEvents = "none";
        }
    });
});