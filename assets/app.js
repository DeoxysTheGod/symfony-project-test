console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

document.addEventListener("DOMContentLoaded", async function () {
    const apiUrl = "http://127.0.0.1:8001"; // Remplace par l'URL de ton API
    const languageList = document.getElementById("language-list");
    const languageBtn = document.getElementById("language-btn");
    const currentFlag = document.getElementById("current-flag");
    const currentLang = document.getElementById("current-lang");

    try {
        const response = await fetch(`${apiUrl}/api/languages`);
        const data = await response.json();

        const languages = data.member;

        languages.forEach(lang => {
            const li = document.createElement("li");
            const flagUrl = `${apiUrl}${lang.flag}`;
            li.innerHTML = `<img src="${flagUrl}" alt="${lang.name}"> ${lang.name}`;
            li.addEventListener("click", () => {
              changeLanguage(lang.code, flagUrl, lang.name);
              location.reload()
            });
            languageList.appendChild(li);
            if (lang.code === localStorage.getItem("lang")) {
                changeLanguage(lang.code, flagUrl, lang.name);
            }
        });

        languageBtn.classList.remove("invisible");
    } catch (error) {
      console.error("Error during languages loading:", error);
    }

    function changeLanguage(code, flag, name) {
      currentFlag.src = flag;
      currentFlag.alt = name;
      currentLang.textContent = name;
      document.documentElement.lang = code;
      localStorage.setItem("lang", code);
      fetch(`/change-locale/${code}`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        }
      });
    }
});
