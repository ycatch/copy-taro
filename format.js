// format.js
// Change format in the Form

window.onload = function() {

    let pageTitle = document.getElementById('pageTitle');
    let pageAddress = document.getElementById('pageAddress');
    let copyArea = document.getElementById('copyArea');
    let checkOption = document.getElementsByName('format');
    
    checkOption.forEach(function(event) {
        event.addEventListener("click", function() {
            let format_value = document.querySelector("input:checked[name=format]").value; 
            switch(Number(format_value)) {
                case 0: // Planetext
                    setFormat(pageTitle.innerText + "\n" + pageAddress.innerText);
                    break;
                case 1: // markdown-List
                    setFormat("- " + pageTitle.innerText + "\n" + "  " + pageAddress.innerText);
                    break;
                case 2: // markdown-Link
                    setFormat("[" + pageTitle.innerText + "](" + pageAddress.innerText + ")");
                    break;
                case 3:
                    setFormat("<a href='" + pageAddress.innerText + "'>" + pageTitle.innerText + "</a>");
                    break;
                default:
                    //Don't call this
                    setFormat(format_value + pageTitle.innerText + "\n" + "default"); 
            }
        });
    });

    let setFormat = function(format_text) {
        copyArea.value = format_text;
    };
};