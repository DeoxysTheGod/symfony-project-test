console.log('This is from start')

if (localStorage.getItem("lang")) {
    document.documentElement.lang = localStorage.getItem("lang");
}
