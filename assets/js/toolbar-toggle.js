/**
 * Toolbar toggle
 *
 * @since 1.0.0
 */


//
// add toolbar toggle
// ctrl + shift + w
//

document.addEventListener("keydown", (event) => {

    if (event.ctrlKey && event.shiftKey && event.key === "W") {
        console.log("Toggle adminbar");
        const toolbar = document.getElementById("wpadminbar");
        const html = document.documentElement;
        const dialog = document.querySelector(".wp-block-navigation__responsive-dialog");

        // Create a <style> tag for overriding styles
        let styleTag = document.getElementById("toolbar-toggle-style");
        if (!styleTag) {
            styleTag = document.createElement("style");
            styleTag.id = "toolbar-toggle-style";
            document.head.appendChild(styleTag);
        }

        if (toolbar) {
            if (toolbar.style.display === "none") {
                // Show the toolbar
                toolbar.style.display = "block";
                styleTag.textContent = ""; // Clear any overrides
                html.style.scrollPaddingTop = "46px";
                html.style.marginTop = "46px";

                // Reset dialog position
                if (dialog) {
                    dialog.style.marginTop = ""; // Use default positioning
                }
            } else {
                // Hide the toolbar
                toolbar.style.display = "none";
                styleTag.textContent = `
                    @media screen and (max-width: 782px) {
                        html { margin-top: 0 !important; }
                    }
                    html { margin-top: 0 !important; scroll-padding-top: 0 !important; }
                `;
                html.style.scrollPaddingTop = "0";
                html.style.marginTop = "0";

                // Adjust dialog position to account for no toolbar
                if (dialog) {
                    dialog.style.marginTop = "0"; // Reset margin-top
                }
            }
        }
    }
});
