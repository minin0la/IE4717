<script>
document.getElementById("languages").addEventListener("change", function() {
    var otherLanguageInput = document.getElementById("otherLanguage");
    if (this.value === "other") {
        otherLanguageInput.style.display = "block";
        otherLanguageInput.required = true;
    } else {
        otherLanguageInput.style.display = "none";
        otherLanguageInput.required = false;
    }
});

document.getElementById("genre").addEventListener("change", function() {
    var otherLanguageInput = document.getElementById("otherGenre");
    if (this.value === "other") {
        otherGenreInput.style.display = "block";
        otherGenreInput.required = true;
    } else {
        otherGenerInput.style.display = "none";
        otherGenreInput.required = false;
    }
});
</script>
