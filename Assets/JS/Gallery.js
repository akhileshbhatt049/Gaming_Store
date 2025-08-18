// Images display
const images = [
    "Assets/Images/Keyboard1.jpg",
    "Assets/Images/Keyboard2.jpg",
    "Assets/Images/Mouse1.jpg",
    "Assets/Images/Mouse2.jpg",
    "Assets/Images/head3.jpeg",
    "Assets/Images/mon1.jpeg",
    "Assets/Images/mon3.jpeg",
    "Assets/Images/chair5.jpeg"
];

const container = document.getElementById("imageContainer");

images.forEach((src, index) => {
    const img = document.createElement("img");
    img.src = src;
    img.alt = `Image ${index + 1}`;
    container.appendChild(img);
});

