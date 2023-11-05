function toggleCollapsible() {
    var content = document.getElementById("collapsibleContent");

    if (content.style.maxHeight === "0px" || content.style.maxHeight === "") {
        content.style.maxHeight = content.scrollHeight + "px";
        setTimeout(function() {
            content.style.display = "block";
        }, 500); // 500 milliseconds (0.5 seconds) delay
    } else {
        content.style.maxHeight = "0";
        setTimeout(function() {
            content.style.display = "none";
        }, 500); // 500 milliseconds (0.5 seconds) delay
    }
}
