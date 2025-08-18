// For Class shorten
let p = document.querySelector(".shorten");
let full = p.innerText;
let short = full.substring(0, 50) + "...";
p.innerHTML = short + ' <a href="#" id="toggle">More</a>';

document.addEventListener("click", e => {
    if (e.target.id === "toggle") {
        e.preventDefault();
        p.innerHTML = e.target.innerText === "More"
            ? full + ' <a href="#" id="toggle">Less</a>'
            : short + ' <a href="#" id="toggle">More</a>';
    }
});