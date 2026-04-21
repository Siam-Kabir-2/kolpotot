// Variables
const clubName = "Kolpopot";
let headerChanged = false;

// Array
const events = [
    "Beyond The Palette - Season 2",
    "Beyond The Palette - Season 3",
    "Beyond The Palette - Season 4",
    "Brush Stroke of Harmony - Season 3",
    "Club Fair 2025 Participation"
];

// Object
const club = {
    name: "Kolpopot",
    university: "KUET",
    location: "Khulna",
    type: "Artists' Society"
};

// Function with DOM + innerHTML
function changeText() {
    document.getElementById("aboutText").innerHTML =
        "Kolpopot is a creative student club of KUET that organizes exhibitions, competitions, and artistic programs for students.";
}

// Function using array + length
function countEvents() {
    document.getElementById("eventCount").innerHTML =
        "Total major events: " + events.length;
}

// Function using object
function showClubInfo() {
    document.getElementById("clubInfo").innerHTML =
        "Club Name: " + club.name + ", University: " + club.university +
        ", Location: " + club.location;
}

// Output with alert
function showAlert() {
    alert("Contact: kolpopotkuet@gmail.com");
}

// If else + style change
function toggleEmail() {
    let email = document.getElementById("emailText");

    if (email.style.display === "none") {
        email.style.display = "inline";
    } else {
        email.style.display = "none";
    }
}

// for loop example
function showEventsInConsole() {
    for (let i = 0; i < events.length; i++) {
        console.log(events[i]);
    }
}

// querySelector + addEventListener
const colorBtn = document.querySelector("#colorBtn");

colorBtn.addEventListener("click", function () {
    const header = document.querySelector(".header");

    if (headerChanged === false) {
        header.style.backgroundColor = "darkgreen";
        headerChanged = true;
    } else {
        header.style.backgroundColor = "#4b2e83";
        headerChanged = false;
    }
});

// Call function once
showEventsInConsole();