languageCode = localStorage.getItem("lang");

if (!languageCode) {
  localStorage.setItem("lang", "fr");
  languageCode = "fr";
}

document.documentElement.lang = languageCode;
