document.addEventListener("DOMContentLoaded", function () {
    const dashboardLink = document.getElementById("Dashboard");
    const addProductLink = document.getElementById("Add-products");
    const dashboardSection = document.getElementById("Dashboard-Section");
    const formSection = document.getElementById("Add-Product-Form");

    dashboardLink.addEventListener("click", function () {
        dashboardSection.style.display = "block";
        formSection.style.display = "none";
    });

    addProductLink.addEventListener("click", function () {
        dashboardSection.style.display = "none";
        formSection.style.display = "block";
    });
});