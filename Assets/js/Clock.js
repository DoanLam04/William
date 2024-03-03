function countdown() {
    const countDate = new Date("2023-12-31 00:00:00").getTime();
    const now = new Date().getTime();
    const gap = countDate - now;

    const seconds = 1000;
    const minutes = seconds * 60;
    const hours = minutes * 60;
    const days = hours * 24;

    const textDays = Math.floor(gap / days);
    const textHours = Math.floor((gap % days) / hours);
    const textMinutes = Math.floor((gap % hours) / minutes);
    const textSeconds = Math.floor((gap % minutes) / seconds);

    document.getElementById("days").innerText = textDays;
    document.getElementById("hours").innerText = textHours;
    document.getElementById("minutes").innerText = textMinutes;
    document.getElementById("seconds").innerText = textSeconds;
}

setInterval(countdown, 1000);
