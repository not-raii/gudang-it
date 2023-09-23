

// Date and Time
window.addEventListener("load", () => {
    clock();
    function clock() {
        const today = new Date();

        const hours = today.getHours();
        const minutes = today.getMinutes();
        const seconds = today.getSeconds();

        const hour = hours < 10 ? "0" + hours : hours;
        const minute = minutes < 10 ? "0" + minutes : minutes;
        const second = seconds < 10 ? "0" + seconds : seconds;
        const hourTime = hour > 12 ? hour - 12 : hour;
        const ampm = hour < 12 ? " AM " : " PM ";

        const month = today.getMonth();
        const year = today.getFullYear();
        const day = today.getDate();

        const monthList = [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
        ];

        const date = day + " " + monthList[month] + ", " + year;
        const time = hourTime + ":" + minute + ":" + second + ampm;

        document.getElementById("date").innerHTML = date;
        setTimeout(clock, 1000);
        document.getElementById("time").innerHTML = time;
        setTimeout(clock, 1000);
    }
});

// custom input date
