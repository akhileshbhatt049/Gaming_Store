// Province -> City -> Area dynamic selection (example, can expand as needed)
    const cityData = {
        "Koshi": ["Biratnagar", "Dharan"],
        "Madhesh": ["Janakpur", "Birgunj"],
        "Bagmati": ["Kathmandu", "Lalitpur"],
        "Gandaki": ["Pokhara", "Baglung"],
        "Lumbini": ["Butwal", "Tansen"],
        "Karnali": ["Birendranagar", "Jumla"],
        "Sudurpashchim": ["Dhangadhi", "Mahendranagar"]
    };

    const areaData = {
        "Biratnagar": ["Area1", "Area2"], "Dharan": ["Area1", "Area2"],
        "Janakpur": ["Area1","Area2"], "Birgunj":["Area1","Area2"],
        "Kathmandu":["Thamel","Boudha"], "Lalitpur":["Patan","Godawari"],
        "Pokhara":["Lakeside","Lekhnath"], "Baglung":["Area1","Area2"],
        "Butwal":["Area1","Area2"], "Tansen":["Area1","Area2"],
        "Birendranagar":["Area1","Area2"], "Jumla":["Area1","Area2"],
        "Dhangadhi":["Area1","Area2"], "Mahendranagar":["Suda","Daijee"]
    };

    function updateCities() {
        const province = document.getElementById("province").value;
        const citySelect = document.getElementById("city");
        const areaSelect = document.getElementById("area");
        citySelect.innerHTML = "<option value=''>--Select City--</option>";
        areaSelect.innerHTML = "<option value=''>--Select Area--</option>";
        areaSelect.disabled = true;
        if (province) {
            citySelect.disabled = false;
            cityData[province].forEach(city => {
                const opt = document.createElement("option");
                opt.value = city;
                opt.textContent = city;
                citySelect.appendChild(opt);
            });
        } else {
            citySelect.disabled = true;
        }
    }

    document.getElementById("city").addEventListener("change", function() {
        const city = this.value;
        const areaSelect = document.getElementById("area");
        areaSelect.innerHTML = "<option value=''>--Select Area--</option>";
        if(city){
            areaSelect.disabled = false;
            areaData[city].forEach(area => {
                const opt = document.createElement("option");
                opt.value = area;
                opt.textContent = area;
                areaSelect.appendChild(opt);
            });
        } else {
            areaSelect.disabled = true;
        }
    });

    // Get product info from URL
    const params = new URLSearchParams(window.location.search);
    const name = params.get('name') || "Unknown Product";
    const price = params.get('price') || 0;
    const image = params.get('image') || "default.png"; // default image if not provided

    document.getElementById("productNameDisplay").textContent = name;
    document.getElementById("productPriceDisplay").textContent = price;
    document.getElementById("productImageDisplay").src = "Assets/Images/" + image;

    document.getElementById("productName").value = name;
    document.getElementById("productPrice").value = price;
    document.getElementById("productImage").value = image;
