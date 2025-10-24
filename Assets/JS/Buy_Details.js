const placesByProvince = {
  koshi: ["Biratnagar", "Dharan", "Itahari", "Dhankuta"],
  madhesh: ["Janakpur", "Birgunj", "Rajbiraj"],
  bagmati: ["Kathmandu", "Lalitpur", "Bhaktapur", "Hetauda"],
  gandaki: ["Pokhara", "Gorkha", "Baglung"],
  lumbini: ["Butwal", "Bhairahawa", "Kapilvastu"],
  karnali: ["Birendranagar", "Jumla", "Dolpa"],
  sudurpaschim: ["Dhangadhi", "Mahendranagar", "Dadeldhura", "Baitadi"]
};

// Areas mapped to specific cities
const areasByCity = {
  biratnagar: ["Biratnagar-1", "Biratnagar-2", "Tintoliya"],
  dharan: ["Bishnupaduka", "Ward 6", "Ward 7"],
  itahari: ["Itahari-4", "Itahari-8", "Tarahara"],
  dhankuta: ["Hile", "Leguwa", "Pakhribas"],
  kathmandu: ["Baneshwor", "Koteshwor", "Kalanki", "Thamel"],
  lalitpur: ["Jawalakhel", "Patan", "Bhaisepati"],
  bhaktapur: ["Suryabinayak", "Kamalbinayak", "Balkot"],
  hetauda: ["Hetauda-1", "Hetauda-2", "Kamane"],
  pokhara: ["Lakeside", "Mahendrapool", "Begnas"],
  gorkha: ["Gorkha Bazar", "Barpak", "Sulikot"],
  baglung: ["Baglung Bazar", "Bihunkot"],
  butwal: ["Traffic Chowk", "Devinagar", "Kalikanagar"],
  bhairahawa: ["Siddharthanagar", "Belhiya"],
  kapilvastu: ["Taulihawa", "Krishnanagar"],
  birendranagar: ["Mangalgadi", "Birendranagar-6"],
  jumla: ["Khalanga", "Tatopani"],
  dolpa: ["Tripurakot", "Dunai"],
  dhangadhi: ["Campus Road", "Hasanpur", "Chauraha"],
  mahendranagar: ["Mahendranagar-2", "Bhasi", "Raikawar"],
  dadeldhura: ["Bagarkot", "Ajayameru"],
  baitadi: ["Gokuleshwar", "Melauli"],
  janakpur: ["Janakpur-1", "Janakpur-2", "Mithila"],
  birgunj: ["Birgunj-3", "Birgunj-5", "Gahawa"],
  rajbiraj: ["Rajbiraj-4", "Rajbiraj-7", "Saptari"]
};

function updatePlaces() {
  const provinceSelect = document.getElementById("province");
  const placesSelect = document.getElementById("places");
  const areasSelect = document.getElementById("areas");
  const selectedProvince = provinceSelect.value;

  // Reset both selects
  placesSelect.innerHTML = '<option value="">--Select City--</option>';
  areasSelect.innerHTML = '<option value="">--Select Area--</option>';
  areasSelect.disabled = true;

  // Enable or disable city dropdown
  if (selectedProvince && placesByProvince[selectedProvince]) {
    placesSelect.disabled = false;
    placesByProvince[selectedProvince].forEach(place => {
      const option = document.createElement("option");
      option.value = place.toLowerCase();
      option.textContent = place;
      placesSelect.appendChild(option);
    });
  } else {
    placesSelect.disabled = true;
  }
}

function updateAreas() {
  const placesSelect = document.getElementById("places");
  const areasSelect = document.getElementById("areas");
  const selectedCity = placesSelect.value;

  // Reset previous options
  areasSelect.innerHTML = '<option value="">--Select Area--</option>';

  // Enable and fill areas if found
  if (selectedCity && areasByCity[selectedCity]) {
    areasSelect.disabled = false;
    areasByCity[selectedCity].forEach(area => {
      const option = document.createElement("option");
      option.value = area.toLowerCase();
      option.textContent = area;
      areasSelect.appendChild(option);
    });
  } else {
    areasSelect.disabled = true;
  }
}
